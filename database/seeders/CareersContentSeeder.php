<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareersContentSeeder extends Seeder
{
    public function run()
    {
        $careersContent = [
            // Header Section
            [
                'key' => 'careers_main_title',
                'value' => 'Careers',
            ],
            [
                'key' => 'careers_subtitle',
                'value' => '<span>Explore</span> <span class="description-title">Opportunities</span>',
            ],

            // Description Paragraphs
            [
                'key' => 'careers_description_paragraph1',
                'value' => 'At Mendoza Tugano & Co., we encourage people within the firm to be their best and our culture empowers individuality.',
            ],
            [
                'key' => 'careers_description_paragraph2',
                'value' => 'The firm\'s goal is to promote a working environment where individual differences are respected and valued, and everyone has the opportunity to excel. With this insight, we are able to offer better commercial solutions.',
            ],
            [
                'key' => 'careers_description_paragraph3',
                'value' => 'Join Mendoza Tugano & Co. and you will discover an ambitious firm with strong leadership and a shared direction. We provide exceptional service to our clients, stimulating work and excellent development for our people. Our working culture is inclusive, collaborative and supportive. We want to allow our employees to reach their full potential.',
            ],
            [
                'key' => 'careers_description_paragraph4',
                'value' => 'We believe in rewarding outstanding performance as we want to retain our talent.',
            ],

            // Career Card 1: Current Vacancies
            [
                'key' => 'career_card1_title',
                'value' => 'Current Vacancies',
            ],
            [
                'key' => 'career_card1_description',
                'value' => 'Explore our current job openings and become part of our growing team.',
            ],
            [
                'key' => 'career_card1_icon',
                'value' => 'bi bi-megaphone',
            ],

            // Career Card 2: Experienced Professionals
            [
                'key' => 'career_card2_title',
                'value' => 'Experienced Professionals',
            ],
            [
                'key' => 'career_card2_description',
                'value' => 'Bring your expertise and advance your career in a dynamic work environment.',
            ],
            [
                'key' => 'career_card2_icon',
                'value' => 'bi bi-person-badge',
            ],

            // Career Card 3: Graduate
            [
                'key' => 'career_card3_title',
                'value' => 'Graduate',
            ],
            [
                'key' => 'career_card3_description',
                'value' => 'Start your professional journey with structured learning and mentorship.',
            ],
            [
                'key' => 'career_card3_icon',
                'value' => 'bi bi-mortarboard',
            ],

            // Career Card 4: Internship Opportunities
            [
                'key' => 'career_card4_title',
                'value' => 'Internship Opportunities',
            ],
            [
                'key' => 'career_card4_description',
                'value' => 'Gain valuable real-world experience through our internship programs.',
            ],
            [
                'key' => 'career_card4_icon',
                'value' => 'bi bi-journal-code',
            ],
        ];

        foreach ($careersContent as $content) {
            DB::table('contents')->updateOrInsert(
                ['key' => $content['key']],
                [
                    'value' => $content['value'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
