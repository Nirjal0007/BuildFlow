<?php

namespace App\Services;

use RuntimeException;

class OpenAiBlogService
{
    protected string $apiKey;
    protected string $model;

    public function __construct()
    {
        $this->apiKey = config('services.groq.api_key') ?? '';
        $this->model = config('services.groq.model', 'llama-3.3-70b-versatile');
    }

    public function generateBlogPost(string $topic, string $tone = 'professional'): array
    {
        if (empty($this->apiKey)) {
            throw new RuntimeException('Groq API key is not configured. Add GROQ_API_KEY to your .env file.');
        }

        $prompt = $this->buildPrompt($topic, $tone);

        $payload = json_encode([
            'model' => $this->model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a professional construction industry blog writer. Always respond in the exact format requested.',
                ],
                [
                    'role' => 'user',
                    'content' => $prompt,
                ],
            ],
            'temperature' => 0.7,
            'max_tokens' => 2048,
        ]);

        $ch = curl_init('https://api.groq.com/openai/v1/chat/completions');
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apiKey,
            ],
            CURLOPT_TIMEOUT => 60,
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($curlError) {
            throw new RuntimeException('Network error contacting Groq API: ' . $curlError);
        }

        if ($httpCode !== 200) {
            $error = json_decode($response, true);
            $message = $error['error']['message'] ?? 'Unknown error from Groq API (HTTP ' . $httpCode . ')';
            throw new RuntimeException('Groq API error: ' . $message);
        }

        $data = json_decode($response, true);
        $text = $data['choices'][0]['message']['content'] ?? '';

        if (empty($text)) {
            throw new RuntimeException('Groq returned an empty response. Please try again.');
        }

        return $this->parseResponse($text, $topic);
    }

    protected function buildPrompt(string $topic, string $tone): string
    {
        return <<<PROMPT
Write a complete blog post about: "{$topic}"
Tone: {$tone}

Use this EXACT format:

TITLE: [compelling title here]

EXCERPT: [1-2 sentence summary here]

CONTENT:
[full blog post in HTML using <h2>, <p>, <ul>, <li> tags — minimum 400 words]

Only output these three sections. No extra text before or after.
PROMPT;
    }

    protected function parseResponse(string $text, string $topic): array
    {
        $title = $topic;
        $excerpt = '';
        $content = '';

        if (preg_match('/TITLE:\s*(.+?)(?:\n|$)/i', $text, $matches)) {
            $title = trim($matches[1]);
        }

        if (preg_match('/EXCERPT:\s*(.+?)(?=CONTENT:|$)/is', $text, $matches)) {
            $excerpt = trim($matches[1]);
        }

        if (preg_match('/CONTENT:\s*(.+)/is', $text, $matches)) {
            $content = trim($matches[1]);
        }

        if (empty($content)) {
            $content = '<p>' . nl2br(htmlspecialchars($text)) . '</p>';
        }

        return compact('title', 'excerpt', 'content');
    }
}