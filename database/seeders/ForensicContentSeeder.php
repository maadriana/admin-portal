<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForensicContentSeeder extends Seeder
{
    public function run()
    {
        $forensicContent = [
            // Header Section
            [
                'key' => 'forensic_page_title',
                'value' => 'Forensic and Litigation Support',
            ],
            [
                'key' => 'forensic_page_subtitle',
                'value' => 'Uncovering facts, quantifying losses, and supporting legal proceedings with credible financial evidence.',
            ],

            // Service Image
            [
                'key' => 'forensic_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'forensic_overview_title',
                'value' => 'Uncovering Facts and Supporting Justice',
            ],
            [
                'key' => 'forensic_overview_paragraph1',
                'value' => 'Our forensic services help uncover facts, quantify losses, and support legal proceedings with credible financial evidence. We work with companies, law firms, and regulatory bodies to investigate fraud, resolve disputes, and mitigate financial crime.',
            ],
            [
                'key' => 'forensic_overview_paragraph2',
                'value' => 'We specialize in forensic accounting, asset tracing, fraud risk assessments, and expert witness services. Our team adheres to Philippine legal and ethical standards to deliver objective findings in a timely and defensible manner.',
            ],

            // Key Service Areas (Dynamic Service Items)
            [
                'key' => 'forensic_services_title',
                'value' => 'Our Specialized Services',
            ],
            [
                'key' => 'forensic_service_item1_title',
                'value' => 'Forensic Accounting',
            ],
            [
                'key' => 'forensic_service_item1_description',
                'value' => 'Detailed financial investigations to uncover fraud, embezzlement, and financial misconduct using advanced accounting techniques and data analysis.',
            ],
            [
                'key' => 'forensic_service_item2_title',
                'value' => 'Asset Tracing & Recovery',
            ],
            [
                'key' => 'forensic_service_item2_description',
                'value' => 'Comprehensive asset tracing services to locate and recover misappropriated funds and assets through complex financial transactions and structures.',
            ],
            [
                'key' => 'forensic_service_item3_title',
                'value' => 'Fraud Risk Assessments',
            ],
            [
                'key' => 'forensic_service_item3_description',
                'value' => 'Proactive evaluation of organizational vulnerabilities to fraud, implementing controls and procedures to prevent financial crimes before they occur.',
            ],
            [
                'key' => 'forensic_service_item4_title',
                'value' => 'Expert Witness Services',
            ],
            [
                'key' => 'forensic_service_item4_description',
                'value' => 'Professional testimony and expert witness support for legal proceedings, providing clear and credible financial evidence to support litigation cases.',
            ],

            // Value Proposition Section
            [
                'key' => 'forensic_value_title',
                'value' => 'Restoring Integrity and Enterprise Value',
            ],
            [
                'key' => 'forensic_value_description',
                'value' => 'Together, we help restore integrity and protect enterprise value. Our forensic services provide the clarity and evidence needed to resolve disputes, mitigate risks, and strengthen your organization against future financial crimes.',
            ],

            // CTA Section
            [
                'key' => 'forensic_cta_text',
                'value' => 'Get Forensic Support',
            ],

            // Sidebar Content
            [
                'key' => 'forensic_sidebar_cta_title',
                'value' => 'Need Forensic Expertise?',
            ],
            [
                'key' => 'forensic_sidebar_cta_description',
                'value' => 'Contact our forensic specialists to discuss your investigation needs and protect your organization\'s interests.',
            ],
            [
                'key' => 'forensic_sidebar_cta_button_text',
                'value' => 'Contact Our Experts',
            ],
        ];

        foreach ($forensicContent as $content) {
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
