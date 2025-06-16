<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvisoryContentSeeder extends Seeder
{
    public function run()
    {
        $advisoryContent = [
            // Header Section
            [
                'key' => 'advisory_page_title',
                'value' => 'Business Advisory Services',
            ],
            [
                'key' => 'advisory_page_subtitle',
                'value' => 'Strategic consulting to drive business growth and long-term success.',
            ],

            // Service Overview
            [
                'key' => 'advisory_overview_title',
                'value' => 'Targeted Consulting Advice',
            ],
            [
                'key' => 'advisory_overview_paragraph',
                'value' => 'Our breadth of experience allows you to benefit from specific and targeted consulting advice to support your long-term growth plans.',
            ],

            // Approach Section
            [
                'key' => 'advisory_approach_title',
                'value' => 'Our Approach',
            ],
            [
                'key' => 'advisory_approach_item1_title',
                'value' => 'Deep Understanding',
            ],
            [
                'key' => 'advisory_approach_item1_description',
                'value' => 'By developing a real understanding of your business and the issues and challenges you face, our advisory teams use local and global knowledge to help you achieve your goals.',
            ],
            [
                'key' => 'advisory_approach_item2_title',
                'value' => 'Risk Mitigation & Success',
            ],
            [
                'key' => 'advisory_approach_item2_description',
                'value' => 'Not only do we help you understand and plan to mitigate your vulnerabilities, we also help you to establish a clear pathway to success.',
            ],
            [
                'key' => 'advisory_approach_item3_title',
                'value' => 'Proven Track Record',
            ],
            [
                'key' => 'advisory_approach_item3_description',
                'value' => 'We have experience working with a range of clients — from family-owned businesses to public companies and from entrepreneurial start-ups to established global entities.',
            ],

            // Services Section
            [
                'key' => 'advisory_services_title',
                'value' => 'Our Services Include:',
            ],
            [
                'key' => 'advisory_service1',
                'value' => 'Business consulting',
            ],
            [
                'key' => 'advisory_service2',
                'value' => 'Strategic planning',
            ],

            // Benefits Section
            [
                'key' => 'advisory_benefits_title',
                'value' => 'Why Choose Us',
            ],
            [
                'key' => 'advisory_benefit1_title',
                'value' => 'Growth-Focused Planning',
            ],
            [
                'key' => 'advisory_benefit1_description',
                'value' => 'We provide actionable strategies designed to help your business grow and thrive.',
            ],
            [
                'key' => 'advisory_benefit2_title',
                'value' => 'Strategic Partnerships',
            ],
            [
                'key' => 'advisory_benefit2_description',
                'value' => 'We build long-term relationships to provide consistent and effective advisory services.',
            ],

            // Sidebar Content
            [
                'key' => 'advisory_cta_title',
                'value' => 'Get Started Today',
            ],
            [
                'key' => 'advisory_cta_description',
                'value' => 'Contact us to explore how our advisory services can support your growth journey.',
            ],
            [
                'key' => 'advisory_cta_button_text',
                'value' => 'Contact Us Now',
            ],

            // Quick Facts
            [
                'key' => 'advisory_fact1_label',
                'value' => 'Clients Served',
            ],
            [
                'key' => 'advisory_fact1_value',
                'value' => '200+',
            ],
            [
                'key' => 'advisory_fact2_label',
                'value' => 'Industries Covered',
            ],
            [
                'key' => 'advisory_fact2_value',
                'value' => '20+',
            ],
            [
                'key' => 'advisory_fact3_label',
                'value' => 'Advisory Accuracy',
            ],
            [
                'key' => 'advisory_fact3_value',
                'value' => '98%',
            ],

            // Related Services
            [
                'key' => 'advisory_related_service1',
                'value' => 'Taxation Services',
            ],
            [
                'key' => 'advisory_related_service2',
                'value' => 'Audit & Assurance',
            ],
            [
                'key' => 'advisory_related_service3',
                'value' => 'Accounting Services',
            ],
        ];

        foreach ($advisoryContent as $content) {
            DB::table('contents')->updateOrInsert(
                ['key' => $content['key']],
                [
                    'key' => $content['key'],
                    'value' => $content['value'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
