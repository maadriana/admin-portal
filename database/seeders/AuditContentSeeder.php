<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuditContentSeeder extends Seeder
{
    public function run()
    {
        $auditContent = [
            // Header Section
            [
                'key' => 'audit_page_title',
                'value' => 'Audit and Assurance',
            ],
            [
                'key' => 'audit_page_subtitle',
                'value' => 'Building public trust through independent and risk-based audits that enhance transparency, accountability, and reliability of financial information.',
            ],

            // Service Image
            [
                'key' => 'audit_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'audit_overview_title',
                'value' => 'Building Public Trust',
            ],
            [
                'key' => 'audit_overview_paragraph1',
                'value' => 'Audit and assurance services build public trust by enhancing transparency, accountability, and the reliability of financial information. Our audit teams provide independent and risk-based audits that support stakeholder confidence and compliance with Philippine Financial Reporting Standards.',
            ],
            [
                'key' => 'audit_overview_paragraph2',
                'value' => 'Our services include statutory audits, internal control evaluations, and regulatory compliance checks, all tailored to Philippine SEC and BIR requirements. We focus on delivering insights that strengthen governance and support sound business decisions.',
            ],

            // Key Service Areas (Dynamic Service Items)
            [
                'key' => 'audit_services_title',
                'value' => 'Our Core Services',
            ],
            [
                'key' => 'audit_service_item1_title',
                'value' => 'Statutory Audits',
            ],
            [
                'key' => 'audit_service_item1_description',
                'value' => 'Independent financial statement audits ensuring compliance with Philippine Financial Reporting Standards and regulatory requirements for SEC and BIR submissions.',
            ],
            [
                'key' => 'audit_service_item2_title',
                'value' => 'Internal Control Evaluations',
            ],
            [
                'key' => 'audit_service_item2_description',
                'value' => 'Comprehensive assessment of internal controls to identify weaknesses, enhance operational efficiency, and strengthen governance frameworks.',
            ],
            [
                'key' => 'audit_service_item3_title',
                'value' => 'Regulatory Compliance Checks',
            ],
            [
                'key' => 'audit_service_item3_description',
                'value' => 'Specialized compliance audits tailored to Philippine SEC and BIR requirements, ensuring adherence to local regulations and standards.',
            ],

            // Value Proposition Section
            [
                'key' => 'audit_value_title',
                'value' => 'Our Commitment',
            ],
            [
                'key' => 'audit_value_description',
                'value' => 'Together, our audit and assurance services promote sustainable financial practices and protect the interests of investors, regulators, and the public. We deliver insights that strengthen governance and support sound business decisions while ensuring full compliance with Philippine standards.',
            ],

            // CTA Section
            [
                'key' => 'audit_cta_text',
                'value' => 'Schedule Your Audit Consultation',
            ],

            // Sidebar Content
            [
                'key' => 'audit_sidebar_cta_title',
                'value' => 'Ready to Get Started?',
            ],
            [
                'key' => 'audit_sidebar_cta_description',
                'value' => 'Contact our experienced audit team to discuss your assurance needs and ensure compliance with Philippine standards.',
            ],
            [
                'key' => 'audit_sidebar_cta_button_text',
                'value' => 'Contact Our Team',
            ],
        ];

        foreach ($auditContent as $content) {
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
