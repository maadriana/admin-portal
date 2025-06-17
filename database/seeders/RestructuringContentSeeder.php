<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestructuringContentSeeder extends Seeder
{
    public function run()
    {
        $restructuringContent = [
            // Header Section
            [
                'key' => 'restructuring_page_title',
                'value' => 'Business Restructuring and Insolvency',
            ],
            [
                'key' => 'restructuring_page_subtitle',
                'value' => 'Guiding businesses through financial difficulty with expert recovery solutions.',
            ],

            // Service Image
            [
                'key' => 'restructuring_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'restructuring_overview_title',
                'value' => 'Expert Financial Recovery',
            ],
            [
                'key' => 'restructuring_overview_paragraph',
                'value' => 'We help and advise business owners with financial problems every day. We have an acute awareness of how stressful it can be when your business runs into difficulty.',
            ],

            // Approach Section
            [
                'key' => 'restructuring_approach_title',
                'value' => 'Our Approach',
            ],
            [
                'key' => 'restructuring_approach_item1_title',
                'value' => 'Specialist Expertise',
            ],
            [
                'key' => 'restructuring_approach_item1_description',
                'value' => 'Financial and operational problems require specialist skills and our extensive experience helps us plan the best path for you and your business.',
            ],
            [
                'key' => 'restructuring_approach_item2_title',
                'value' => 'Collaborative Approach',
            ],
            [
                'key' => 'restructuring_approach_item2_description',
                'value' => 'We work closely with bankers, venture capital funds and lawyers to restructure and refinance struggling organisations across multiple sectors.',
            ],
            [
                'key' => 'restructuring_approach_item3_title',
                'value' => 'Recovery Focused',
            ],
            [
                'key' => 'restructuring_approach_item3_description',
                'value' => 'The priority is to focus on recovery — both the business and its corporate structure. Many businesses can avoid administration or liquidation.',
            ],

            // Services Section
            [
                'key' => 'restructuring_services_title',
                'value' => 'Our Approach Includes:',
            ],
            [
                'key' => 'restructuring_service1',
                'value' => 'Business restructuring and refinancing',
            ],
            [
                'key' => 'restructuring_service2',
                'value' => 'Insolvency and administration guidance',
            ],
            [
                'key' => 'restructuring_service3',
                'value' => 'Cross-border and multi-jurisdictional solutions',
            ],
            [
                'key' => 'restructuring_service4',
                'value' => 'Early intervention and recovery planning',
            ],

            // Benefits Section
            [
                'key' => 'restructuring_benefits_title',
                'value' => 'Why Work With Us',
            ],
            [
                'key' => 'restructuring_benefit1_title',
                'value' => 'Discreet Advisory',
            ],
            [
                'key' => 'restructuring_benefit1_description',
                'value' => 'We handle sensitive financial matters with discretion and professionalism.',
            ],
            [
                'key' => 'restructuring_benefit2_title',
                'value' => 'Strategic Recovery',
            ],
            [
                'key' => 'restructuring_benefit2_description',
                'value' => 'Our focus is always to protect value and plan for sustainable business recovery.',
            ],

            // Sidebar Content
            [
                'key' => 'restructuring_cta_title',
                'value' => 'Get Expert Help Today',
            ],
            [
                'key' => 'restructuring_cta_description',
                'value' => 'If your business is in distress, talk to our recovery specialists for guidance and support.',
            ],
            [
                'key' => 'restructuring_cta_button_text',
                'value' => 'Contact Us Now',
            ],

            // Quick Facts
            [
                'key' => 'restructuring_fact1_label',
                'value' => 'Cases Handled',
            ],
            [
                'key' => 'restructuring_fact1_value',
                'value' => '300+',
            ],
            [
                'key' => 'restructuring_fact2_label',
                'value' => 'Sectors Served',
            ],
            [
                'key' => 'restructuring_fact2_value',
                'value' => '25+',
            ],
            [
                'key' => 'restructuring_fact3_label',
                'value' => 'Success Rate',
            ],
            [
                'key' => 'restructuring_fact3_value',
                'value' => '91%',
            ],

            // Related Services
            [
                'key' => 'restructuring_related_service1',
                'value' => 'Business Advisory',
            ],
            [
                'key' => 'restructuring_related_service2',
                'value' => 'Risk Management',
            ],
            [
                'key' => 'restructuring_related_service3',
                'value' => 'Audit & Assurance',
            ],
        ];

        foreach ($restructuringContent as $content) {
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
