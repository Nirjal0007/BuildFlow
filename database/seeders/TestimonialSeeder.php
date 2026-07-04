<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['client_name' => 'Michael Torres', 'client_role' => 'Business Owner', 'message' => 'BuildFlow delivered our office renovation ahead of schedule with outstanding craftsmanship throughout.'],
            ['client_name' => 'Olivia Nguyen', 'client_role' => 'Real Estate Agent', 'message' => 'Professional, transparent, and reliable from start to finish. I recommend them to every client looking to build.'],
            ['client_name' => 'James Harrison', 'client_role' => 'Property Developer', 'message' => 'Their attention to detail and commitment to quality made our commercial project a complete success.'],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create([
                'client_name' => $testimonial['client_name'],
                'client_role' => $testimonial['client_role'],
                'message' => $testimonial['message'],
                'rating' => 5,
                'is_active' => true,
            ]);
        }
    }
}
