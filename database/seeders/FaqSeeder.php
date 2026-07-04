<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            ['question' => 'What types of construction projects do you handle?', 'answer' => 'We handle residential, commercial, and infrastructure projects of all sizes, from single-family homes to large-scale commercial developments and public infrastructure.'],
            ['question' => 'How long does a typical construction project take?', 'answer' => 'Project timelines vary based on scope and complexity. A residential build typically takes 4-8 months, while commercial projects can range from 6 months to 2 years.'],
            ['question' => 'Do you provide free project estimates?', 'answer' => 'Yes, we offer free, no-obligation quotes for all project types. Simply fill out our request a quote form and our team will respond within 24-48 hours.'],
            ['question' => 'Are you licensed and insured?', 'answer' => 'Yes, BuildFlow is fully licensed and insured in every region we operate in, giving you complete peace of mind throughout your project.'],
            ['question' => 'What warranty do you offer on completed work?', 'answer' => 'We provide a comprehensive workmanship warranty on all completed projects, with specific terms detailed in your project contract.'],
        ];

        foreach ($faqs as $index => $faq) {
            Faq::create([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'order' => $index,
                'is_active' => true,
            ]);
        }
    }
}
