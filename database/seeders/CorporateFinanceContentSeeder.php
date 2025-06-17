<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorporateFinanceContentSeeder extends Seeder
{
    public function run()
    {
        $financeContent = [
            // Header Section
            [
                'key' => 'finance_page_title',
                'value' => 'Corporate Finance and Advisory',
            ],
            [
                'key' => 'finance_page_subtitle',
                'value' => 'Strategic solutions to support your financial growth and business goals.',
            ],

            // Service Image
            [
                'key' => 'finance_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'finance_overview_title',
                'value' => 'Achieving Your Business Ambitions',
            ],
            [
                'key' => 'finance_overview_paragraph1',
                'value' => 'Whatever ambitions you have for your business, Mendoza Tugano & Co., CPAs\' corporate finance specialists can help you to achieve them.',
            ],

            // Approach Section
            [
                'key' => 'finance_approach_title',
                'value' => 'Our Approach',
            ],
            [
                'key' => 'finance_approach_item1_title',
                'value' => 'Specialist Expertise',
            ],
            [
                'key' => 'finance_approach_item1_description',
                'value' => 'We provide specialist skills, practical experience, know-how and objectivity to assist you in your future plans, whether you are looking to expand, merge or sell your business.',
            ],
            [
                'key' => 'finance_approach_item2_title',
                'value' => 'Comprehensive Services',
            ],
            [
                'key' => 'finance_approach_item2_description',
                'value' => 'We provide a comprehensive range of partner-led advisory and transaction support services across a wide variety of industry sectors both locally and overseas.',
            ],
            [
                'key' => 'finance_approach_item3_title',
                'value' => 'Growth Identification',
            ],
            [
                'key' => 'finance_approach_item3_description',
                'value' => 'Our team of professionals have the capability of identifying growth opportunities for businesses from start-up ventures to established enterprises.',
            ],

            // Services Section
            [
                'key' => 'finance_services_title',
                'value' => 'Our Services Include:',
            ],
            [
                'key' => 'finance_service1',
                'value' => 'Financial due diligence',
            ],
            [
                'key' => 'finance_service2',
                'value' => 'Valuations',
            ],
            [
                'key' => 'finance_service3',
                'value' => 'Initial public offerings',
            ],
            [
                'key' => 'finance_service4',
                'value' => 'Mergers and acquisitions',
            ],

            // CTA Section
            [
                'key' => 'finance_cta_text',
                'value' => 'Start Your Journey Today',
            ],

            // Sidebar Content
            [
                'key' => 'finance_sidebar_cta_title',
                'value' => 'Start Your Journey Today',
            ],
            [
                'key' => 'finance_sidebar_cta_description',
                'value' => 'Let\'s talk about how we can help your business meet its corporate finance goals.',
            ],
            [
                'key' => 'finance_sidebar_cta_button_text',
                'value' => 'Contact Us Now',
            ],

            // Quick Facts
            [
                'key' => 'finance_fact1_label',
                'value' => 'Years of Experience',
            ],
            [
                'key' => 'finance_fact1_value',
                'value' => '20+',
            ],
            [
                'key' => 'finance_fact2_label',
                'value' => 'Team Strength',
            ],
            [
                'key' => 'finance_fact2_value',
                'value' => 'Partner-Led',
            ],
            [
                'key' => 'finance_fact3_label',
                'value' => 'Sectors Served',
            ],
            [
                'key' => 'finance_fact3_value',
                'value' => '15+',
            ],

            // Related Services
            [
                'key' => 'finance_related_title',
                'value' => 'Related Services',
            ],
            [
                'key' => 'finance_related_service1',
                'value' => 'Business Advisory',
            ],
            [
                'key' => 'finance_related_service2',
                'value' => 'Audit & Assurance',
            ],
            [
                'key' => 'finance_related_service3',
                'value' => 'Risk & Restructuring',
            ],
        ];

        foreach ($financeContent as $content) {
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
