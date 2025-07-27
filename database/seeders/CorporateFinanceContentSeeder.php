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
                'value' => 'Supporting critical business transactions with end-to-end guidance that drives sound investment decisions and optimizes shareholder value.',
            ],

            // Service Image
            [
                'key' => 'finance_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'finance_overview_title',
                'value' => 'Supporting Critical Business Transactions',
            ],
            [
                'key' => 'finance_overview_paragraph1',
                'value' => 'We support critical business transactions through our Corporate Finance and Advisory services. From mergers and acquisitions to business valuations and capital raising, we provide end-to-end guidance that drives sound investment decisions.',
            ],
            [
                'key' => 'finance_overview_paragraph2',
                'value' => 'Our team conducts due diligence, financial modeling, deal structuring, and transaction support. We help businesses unlock opportunities, manage risks, and optimize shareholder value.',
            ],

            // Core Services (Dynamic Service Items)
            [
                'key' => 'finance_services_title',
                'value' => 'Our Core Services',
            ],
            [
                'key' => 'finance_service_item1_title',
                'value' => 'Mergers and Acquisitions',
            ],
            [
                'key' => 'finance_service_item1_description',
                'value' => 'Comprehensive M&A advisory including deal origination, due diligence, valuation, negotiation support, and transaction execution to maximize value for all stakeholders.',
            ],
            [
                'key' => 'finance_service_item2_title',
                'value' => 'Business Valuations & Financial Modeling',
            ],
            [
                'key' => 'finance_service_item2_description',
                'value' => 'Professional business valuations and sophisticated financial modeling to support strategic decision-making, investment planning, and transaction structuring.',
            ],
            [
                'key' => 'finance_service_item3_title',
                'value' => 'Capital Raising & Deal Structuring',
            ],
            [
                'key' => 'finance_service_item3_description',
                'value' => 'Strategic capital raising solutions and optimal deal structuring to secure funding, optimize capital structure, and achieve business growth objectives.',
            ],

            // Advisory Approach Section
            [
                'key' => 'finance_approach_title',
                'value' => 'Our Advisory Approach',
            ],
            [
                'key' => 'finance_approach_description',
                'value' => 'Our advisory approach blends technical expertise with strategic insight. We combine deep financial analysis with practical market knowledge to deliver solutions that unlock opportunities, manage risks, and create sustainable value for your business and stakeholders.',
            ],

            // CTA Section
            [
                'key' => 'finance_cta_text',
                'value' => 'Discuss Your Transaction Needs',
            ],

            // Sidebar Content
            [
                'key' => 'finance_sidebar_cta_title',
                'value' => 'Ready to Unlock Value?',
            ],
            [
                'key' => 'finance_sidebar_cta_description',
                'value' => 'Let our corporate finance experts help you navigate complex transactions and optimize your business value.',
            ],
            [
                'key' => 'finance_sidebar_cta_button_text',
                'value' => 'Get Expert Guidance',
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
