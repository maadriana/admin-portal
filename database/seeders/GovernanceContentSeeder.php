<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernanceContentSeeder extends Seeder
{
    public function run()
    {
        $governanceContent = [
            // Header Section
            [
                'key' => 'governance_page_title',
                'value' => 'Governance & Risk Management',
            ],
            [
                'key' => 'governance_page_subtitle',
                'value' => 'Comprehensive governance frameworks and risk management solutions to strengthen your organization\'s foundation and ensure sustainable growth.',
            ],

            // Service Image
            [
                'key' => 'governance_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'governance_overview_title',
                'value' => 'Building Strong Foundations',
            ],
            [
                'key' => 'governance_overview_paragraph1',
                'value' => 'At Mendoza Tugano & Co., CPAs (MTC), we help organizations establish robust governance structures and effective risk management frameworks that promote transparency, accountability, and long-term sustainability.',
            ],

            // Key Approaches (Dynamic Approach Items)
            [
                'key' => 'governance_approach_title',
                'value' => 'Our Approach',
            ],
            [
                'key' => 'governance_approach_item1_title',
                'value' => 'Comprehensive Framework Design',
            ],
            [
                'key' => 'governance_approach_item1_description',
                'value' => 'We develop tailored governance structures that align with your organization\'s objectives while ensuring compliance with regulatory requirements and industry best practices.',
            ],
            [
                'key' => 'governance_approach_item2_title',
                'value' => 'Risk Assessment & Management',
            ],
            [
                'key' => 'governance_approach_item2_description',
                'value' => 'Our systematic approach to risk identification, assessment, and mitigation helps protect your organization from potential threats while enabling strategic decision-making.',
            ],
            [
                'key' => 'governance_approach_item3_title',
                'value' => 'Continuous Monitoring & Improvement',
            ],
            [
                'key' => 'governance_approach_item3_description',
                'value' => 'We implement monitoring systems and regular reviews to ensure your governance and risk management frameworks remain effective and adapt to changing business environments.',
            ],

            // Value Proposition Section
            [
                'key' => 'governance_value_title',
                'value' => 'Strategic Risk Management Excellence',
            ],
            [
                'key' => 'governance_value_description',
                'value' => 'Our governance and risk management solutions integrate seamlessly with your business operations, providing strategic insights that drive informed decision-making. We combine industry expertise with proven methodologies to deliver frameworks that not only protect your organization but also enable growth and innovation in an increasingly complex business environment.',
            ],

            // CTA Section
            [
                'key' => 'governance_cta_text',
                'value' => 'Strengthen Your Governance',
            ],

            // Sidebar Content
            [
                'key' => 'governance_sidebar_cta_title',
                'value' => 'Strengthen Your Governance',
            ],
            [
                'key' => 'governance_sidebar_cta_description',
                'value' => 'Ready to build a stronger governance framework? Let\'s discuss how we can help secure your organization\'s future.',
            ],
            [
                'key' => 'governance_sidebar_cta_button_text',
                'value' => 'Contact Us Now',
            ],
        ];

        foreach ($governanceContent as $content) {
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
