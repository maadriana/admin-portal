<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutsourcingContentSeeder extends Seeder
{
    public function run()
    {
        $outsourcingContent = [
            // Header Section
            [
                'key' => 'outsourcing_page_title',
                'value' => 'Business Outsourcing',
            ],
            [
                'key' => 'outsourcing_page_subtitle',
                'value' => 'Tailored bookkeeping and financial support to help optimize your business resources and focus on growth.',
            ],

            // Service Image
            [
                'key' => 'outsourcing_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'outsourcing_overview_title',
                'value' => 'Tailored Solutions for Every Need',
            ],
            [
                'key' => 'outsourcing_overview_paragraph1',
                'value' => 'At Mendoza Tugano & Co., CPAs (MTC), we have an outsourcing division to provide our clients with tailored solutions for all bookkeeping requirements.',
            ],
            [
                'key' => 'outsourcing_overview_paragraph2',
                'value' => 'Our approach focuses on building strong relationships with our clients to understand their unique business needs and provide strategic insights that drive growth and success.',
            ],

            // Key Service Areas (Dynamic Service Items)
            [
                'key' => 'outsourcing_services_title',
                'value' => 'Our Outsourcing Services',
            ],
            [
                'key' => 'outsourcing_service_item1_title',
                'value' => 'Bookkeeping & Accounting',
            ],
            [
                'key' => 'outsourcing_service_item1_description',
                'value' => 'Stay compliant and organized with our expert accounting and ledger maintenance services. We provide comprehensive bookkeeping solutions tailored to your business needs.',
            ],
            [
                'key' => 'outsourcing_service_item2_title',
                'value' => 'Payroll Processing',
            ],
            [
                'key' => 'outsourcing_service_item2_description',
                'value' => 'Efficient payroll processing services that ensure accuracy, timeliness, and compliance with Philippine labor regulations and tax requirements.',
            ],
            [
                'key' => 'outsourcing_service_item3_title',
                'value' => 'Financial Reporting',
            ],
            [
                'key' => 'outsourcing_service_item3_description',
                'value' => 'Professional financial reporting services that provide accurate, timely reports to support informed business decision-making and regulatory compliance.',
            ],
            [
                'key' => 'outsourcing_service_item4_title',
                'value' => 'Tax Compliance Support',
            ],
            [
                'key' => 'outsourcing_service_item4_description',
                'value' => 'Comprehensive tax compliance support to ensure your business meets all Philippine tax requirements while minimizing risks and maximizing efficiency.',
            ],

            // Value Proposition Section
            [
                'key' => 'outsourcing_value_title',
                'value' => 'Focus on What Matters Most',
            ],
            [
                'key' => 'outsourcing_value_description',
                'value' => 'By outsourcing your financial and administrative functions to our experienced team, you can focus on core business activities while ensuring accuracy, compliance, and cost-efficiency in your back-office operations.',
            ],

            // CTA Section
            [
                'key' => 'outsourcing_cta_text',
                'value' => 'Explore Outsourcing Solutions',
            ],

            // Sidebar Content
            [
                'key' => 'outsourcing_sidebar_cta_title',
                'value' => 'Ready to Streamline Operations?',
            ],
            [
                'key' => 'outsourcing_sidebar_cta_description',
                'value' => 'Talk to us about outsourcing solutions that can make your operations leaner, smarter, and more efficient.',
            ],
            [
                'key' => 'outsourcing_sidebar_cta_button_text',
                'value' => 'Contact Our Team',
            ],
        ];

        foreach ($outsourcingContent as $content) {
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
