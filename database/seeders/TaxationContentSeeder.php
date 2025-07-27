<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxationContentSeeder extends Seeder
{
    public function run()
    {
        $taxationContent = [
            // Header Section
            [
                'key' => 'taxation_page_title',
                'value' => 'Tax Advisory and Compliance',
            ],
            [
                'key' => 'taxation_page_subtitle',
                'value' => 'Precisely tailored tax solutions for individuals and businesses in an ever-changing environment.',
            ],

            // Service Image
            [
                'key' => 'taxation_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'taxation_overview_title',
                'value' => 'Strategic Tax Guidance',
            ],
            [
                'key' => 'taxation_overview_paragraph1',
                'value' => 'Our Taxation services provide businesses with clarity, compliance, and strategic guidance in an evolving tax landscape. We advise clients on Philippine tax laws including compliance with BIR regulations, tax planning, and audit support.',
            ],
            [
                'key' => 'taxation_overview_paragraph2',
                'value' => 'Our services include preparation and filing of tax returns, representation in BIR assessments and tax court cases, and guidance on tax-efficient structures under Philippine laws.',
            ],

            // Key Service Areas (Dynamic Service Items)
            [
                'key' => 'taxation_services_title',
                'value' => 'Our Core Services',
            ],
            [
                'key' => 'taxation_service_item1_title',
                'value' => 'Tax Compliance & Preparation',
            ],
            [
                'key' => 'taxation_service_item1_description',
                'value' => 'Comprehensive preparation and filing of tax returns ensuring full compliance with BIR regulations and Philippine tax laws.',
            ],
            [
                'key' => 'taxation_service_item2_title',
                'value' => 'BIR Assessments & Tax Court Representation',
            ],
            [
                'key' => 'taxation_service_item2_description',
                'value' => 'Expert representation in BIR assessments and tax court cases, providing strategic defense and resolution of tax disputes.',
            ],
            [
                'key' => 'taxation_service_item3_title',
                'value' => 'Tax-Efficient Structures & Planning',
            ],
            [
                'key' => 'taxation_service_item3_description',
                'value' => 'Guidance on tax-efficient structures under Philippine laws, helping clients optimize their tax position while maintaining compliance.',
            ],

            // Value Proposition Section
            [
                'key' => 'taxation_value_title',
                'value' => 'Our Commitment',
            ],
            [
                'key' => 'taxation_value_description',
                'value' => 'We help clients manage tax risk while identifying opportunities for savings and compliance efficiency. Our approach ensures you stay compliant with evolving Philippine tax regulations while maximizing your tax benefits.',
            ],

            // CTA Section
            [
                'key' => 'taxation_cta_text',
                'value' => 'Optimize Your Tax Strategy',
            ],

            // Sidebar Content
            [
                'key' => 'taxation_sidebar_cta_title',
                'value' => 'Ready to Optimize?',
            ],
            [
                'key' => 'taxation_sidebar_cta_description',
                'value' => 'Contact our experienced tax team to discuss your compliance needs and strategic tax planning opportunities.',
            ],
            [
                'key' => 'taxation_sidebar_cta_button_text',
                'value' => 'Contact Our Team',
            ],
        ];

        foreach ($taxationContent as $content) {
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
