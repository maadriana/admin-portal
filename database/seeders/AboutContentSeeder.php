<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutContentSeeder extends Seeder
{
    public function run()
    {
        $aboutContent = [
            // Hero Section
            [
                'key' => 'about_hero_title',
                'value' => 'Preserving<br><span style="font-weight: 600; color: #326D78;">Excellence</span>',
            ],
            [
                'key' => 'about_hero_subtitle',
                'value' => 'A legacy of trust, precision, and unwavering dedication to client success since our founding.',
            ],
            [
                'key' => 'about_years_legacy',
                'value' => '20+',
            ],
            [
                'key' => 'about_clients_served',
                'value' => '100+',
            ],
            [
                'key' => 'about_circular_quote',
                'value' => '"Passion for Excellence"',
            ],

            // Story Section
            [
                'key' => 'about_story_badge',
                'value' => 'Our Foundation',
            ],
            [
                'key' => 'about_story_title',
                'value' => 'Built on <span style="font-weight: 600; color: #326D78;">Legacy</span>',
            ],
            [
                'key' => 'about_story_paragraph1',
                'value' => 'Emmanuel Y. Mendoza redefined the audit and accounting landscape, founding an institution built on unwavering dedication, precision, and integrity.',
            ],
            [
                'key' => 'about_story_paragraph2',
                'value' => 'Today, Mendoza Tugano & Co., CPAs continues this legacy, representing not just continuity but an elevation of the principles that have earned client trust for decades.',
            ],

            // Cards Section
            [
                'key' => 'about_card1_title',
                'value' => 'Continuous Excellence',
            ],
            [
                'key' => 'about_card1_description',
                'value' => 'Our commitment to delivering precise, ethical, and personalized financial solutions mirrors the trust and reliability clients expect from our lineage.',
            ],
            [
                'key' => 'about_card2_title',
                'value' => 'Digital Innovation',
            ],
            [
                'key' => 'about_card2_description',
                'value' => 'As we embrace the opportunities of the digital age, we do so with the same unwavering commitment to client success that has defined our heritage.',
            ],
            [
                'key' => 'about_card3_title',
                'value' => 'Heritage Promise',
            ],
            [
                'key' => 'about_card3_description',
                'value' => '"Passion for Excellence" isn\'t merely our motto — it\'s a pledge rooted in a heritage of trust and dedication to your success.',
            ],

            // Vision & Mission
            [
                'key' => 'about_vision_text',
                'value' => 'To lead the audit and accounting industry through our unwavering "Passion for Excellence", becoming a trusted standard for ethical innovation and generational impact.',
            ],
            [
                'key' => 'about_mission_text',
                'value' => 'To deliver outstanding, ethical, and client-focused financial services that empower businesses to grow confidently in a dynamic world — anchored in our legacy of trust and excellence.',
            ],

            // Core Values
            [
                'key' => 'about_value1_title',
                'value' => 'Excellence',
            ],
            [
                'key' => 'about_value1_description',
                'value' => 'We set high standards in everything we do, delivering with precision and pride.',
            ],
            [
                'key' => 'about_value2_title',
                'value' => 'Integrity',
            ],
            [
                'key' => 'about_value2_description',
                'value' => 'We are honest, ethical, and transparent in our commitments.',
            ],
            [
                'key' => 'about_value3_title',
                'value' => 'Innovation',
            ],
            [
                'key' => 'about_value3_description',
                'value' => 'We embrace change and lead with forward-thinking solutions.',
            ],
            [
                'key' => 'about_value4_title',
                'value' => 'Professional Growth',
            ],
            [
                'key' => 'about_value4_description',
                'value' => 'We encourage lifelong learning and support our people\'s development.',
            ],
            [
                'key' => 'about_value5_title',
                'value' => 'Teamwork',
            ],
            [
                'key' => 'about_value5_description',
                'value' => 'We thrive in collaboration, valuing the strength of collective effort.',
            ],
            [
                'key' => 'about_value6_title',
                'value' => 'Employee Care',
            ],
            [
                'key' => 'about_value6_description',
                'value' => 'We prioritize wellbeing and inclusion within our firm.',
            ],
            [
                'key' => 'about_value7_title',
                'value' => 'Community Engagement',
            ],
            [
                'key' => 'about_value7_description',
                'value' => 'We give back to society and act as responsible corporate citizens.',
            ],
        ];

        foreach ($aboutContent as $content) {
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
