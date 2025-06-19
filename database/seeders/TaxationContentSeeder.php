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
                'value' => 'Precisely Tailored Solutions',
            ],
            [
                'key' => 'taxation_overview_paragraph1',
                'value' => 'The tax issues confronting every individual and every public, private and multinational company are unique. That is why we specialise in providing precisely tailored tax solutions.',
            ],

            // Approach Section
            [
                'key' => 'taxation_approach_title',
                'value' => 'Our Approach',
            ],
            [
                'key' => 'taxation_approach_item1_title',
                'value' => 'Individual Business Needs',
            ],
            [
                'key' => 'taxation_approach_item1_description',
                'value' => 'Our priority is to provide you with an outcome that best meets your individual business needs while delivering practical business solutions that drive your success.',
            ],
            [
                'key' => 'taxation_approach_item2_title',
                'value' => 'Philippines Expertise',
            ],
            [
                'key' => 'taxation_approach_item2_description',
                'value' => 'With our unique experience in the Philippines, we offer practical solutions to assist clients who face an ever changing environment in this economy.',
            ],
            [
                'key' => 'taxation_approach_item3_title',
                'value' => 'Comprehensive Advisory',
            ],
            [
                'key' => 'taxation_approach_item3_description',
                'value' => 'We regularly advise clients on investment strategies, cross-border M&A issues, corporate restructurings, pre-IPO tax planning, and field-audit investigations.',
            ],

            // Services Section
            [
                'key' => 'taxation_services_title',
                'value' => 'Our Services Include:',
            ],
            [
                'key' => 'taxation_service1',
                'value' => 'Tax planning and advisory',
            ],
            [
                'key' => 'taxation_service2',
                'value' => 'Tax compliance services',
            ],
            [
                'key' => 'taxation_service3',
                'value' => 'Tax assessments and claims assistance',
            ],
            [
                'key' => 'taxation_service4',
                'value' => 'Estate tax advisory',
            ],

            // CTA Section
            [
                'key' => 'taxation_cta_text',
                'value' => 'Optimize Your Tax Strategy',
            ],

            // Sidebar Content
            [
                'key' => 'taxation_sidebar_cta_title',
                'value' => 'Optimize Your Tax Strategy',
            ],
            [
                'key' => 'taxation_sidebar_cta_description',
                'value' => 'Contact us to discuss your tax planning needs. Our experienced team is ready to help you navigate the complex tax landscape.',
            ],
            [
                'key' => 'taxation_sidebar_cta_button_text',
                'value' => 'Contact Us Now',
            ],

            // Quick Facts
            [
                'key' => 'taxation_related_title',
                'value' => 'Quick Facts',
            ],
            [
                'key' => 'taxation_fact1_label',
                'value' => 'Years of Experience',
            ],
            [
                'key' => 'taxation_fact1_value',
                'value' => '15+',
            ],
            [
                'key' => 'taxation_fact2_label',
                'value' => 'Tax Cases Handled',
            ],
            [
                'key' => 'taxation_fact2_value',
                'value' => '500+',
            ],
            [
                'key' => 'taxation_fact3_label',
                'value' => 'Client Satisfaction',
            ],
            [
                'key' => 'taxation_fact3_value',
                'value' => '100%',
            ],

            // Related Services
            [
                'key' => 'taxation_related_service1',
                'value' => 'Business Advisory',
            ],
            [
                'key' => 'taxation_related_service2',
                'value' => 'Audit & Assurance',
            ],
            [
                'key' => 'taxation_related_service3',
                'value' => 'Corporate Finance',
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
