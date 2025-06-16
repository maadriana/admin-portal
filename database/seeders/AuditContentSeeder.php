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
                'value' => 'Audit and Assurance Services',
            ],
            [
                'key' => 'audit_page_subtitle',
                'value' => 'Professional audit services that go beyond basic compliance to help drive your business forward.',
            ],

            // Service Image
            [
                'key' => 'audit_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'audit_overview_title',
                'value' => 'Beyond Basic Compliance',
            ],
            [
                'key' => 'audit_overview_paragraph1',
                'value' => 'We recognise the commercial importance of providing assurance on your business controls and ultimately, satisfying regulatory requirements. We offer much more than just a basic compliance service.',
            ],
            [
                'key' => 'audit_overview_paragraph2',
                'value' => 'Our approach focuses on building strong relationships with our clients to understand their unique business needs and provide strategic insights that drive growth and success.',
            ],

            // Approach Section
            [
                'key' => 'audit_approach_title',
                'value' => 'Our Approach',
            ],
            [
                'key' => 'audit_approach_item1_title',
                'value' => 'Client-Focused Strategy',
            ],
            [
                'key' => 'audit_approach_item1_description',
                'value' => 'We understand the need to provide advice to help you develop your business and achieve your commercial objectives. Our team works closely with you to identify opportunities for improvement and growth.',
            ],
            [
                'key' => 'audit_approach_item2_title',
                'value' => 'Strong Partnerships',
            ],
            [
                'key' => 'audit_approach_item2_description',
                'value' => 'The key to a valuable compliance service is the strength of the relationship between the client and service team. We invest time in understanding your business to provide tailored solutions.',
            ],
            [
                'key' => 'audit_approach_item3_title',
                'value' => 'Expert Team Involvement',
            ],
            [
                'key' => 'audit_approach_item3_description',
                'value' => 'By involving the most experienced members of our team right from the start, we focus on your specific strategic needs and ensure the highest quality of service delivery.',
            ],

            // Services Section
            [
                'key' => 'audit_services_title',
                'value' => 'Our Services Include',
            ],
            [
                'key' => 'audit_service1_title',
                'value' => 'External Audit of Financial Statements',
            ],
            [
                'key' => 'audit_service1_description',
                'value' => 'Comprehensive external audits of financial statements to ensure accuracy, compliance with accounting standards, and regulatory requirements. We provide detailed insights and recommendations for financial reporting improvements.',
            ],
            [
                'key' => 'audit_service2_title',
                'value' => 'Other Assurance and Attestation Services',
            ],
            [
                'key' => 'audit_service2_description',
                'value' => 'Specialized assurance services including internal control reviews, compliance audits, and attestation services. We help ensure your business operations meet industry standards and regulatory requirements.',
            ],

            // Benefits Section
            [
                'key' => 'audit_benefits_title',
                'value' => 'Benefits of Our Audit Services',
            ],
            [
                'key' => 'audit_benefit1_title',
                'value' => 'Enhanced Credibility',
            ],
            [
                'key' => 'audit_benefit1_description',
                'value' => 'Independent audit opinions enhance stakeholder confidence and business credibility.',
            ],
            [
                'key' => 'audit_benefit2_title',
                'value' => 'Risk Management',
            ],
            [
                'key' => 'audit_benefit2_description',
                'value' => 'Identify and mitigate financial and operational risks through comprehensive reviews.',
            ],
            [
                'key' => 'audit_benefit3_title',
                'value' => 'Regulatory Compliance',
            ],
            [
                'key' => 'audit_benefit3_description',
                'value' => 'Ensure compliance with all relevant accounting standards and regulatory requirements.',
            ],
            [
                'key' => 'audit_benefit4_title',
                'value' => 'Process Improvement',
            ],
            [
                'key' => 'audit_benefit4_description',
                'value' => 'Receive recommendations for improving internal controls and business processes.',
            ],

            // Sidebar Content
            [
                'key' => 'audit_cta_title',
                'value' => 'Get Started Today',
            ],
            [
                'key' => 'audit_cta_description',
                'value' => 'Contact us to discuss your audit and assurance needs. Our experienced team is ready to help.',
            ],
            [
                'key' => 'audit_cta_button_text',
                'value' => 'Contact Us Now',
            ],

            // Quick Facts
            [
                'key' => 'audit_fact1_label',
                'value' => 'Years of Experience',
            ],
            [
                'key' => 'audit_fact1_value',
                'value' => '10+',
            ],
            [
                'key' => 'audit_fact2_label',
                'value' => 'Team Members',
            ],
            [
                'key' => 'audit_fact2_value',
                'value' => '50+',
            ],
            [
                'key' => 'audit_fact3_label',
                'value' => 'Client Focus',
            ],
            [
                'key' => 'audit_fact3_value',
                'value' => '100%',
            ],

            // Related Services
            [
                'key' => 'audit_related_service1',
                'value' => 'Business Advisory',
            ],
            [
                'key' => 'audit_related_service2',
                'value' => 'Taxation Services',
            ],
            [
                'key' => 'audit_related_service3',
                'value' => 'Accounting Services',
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
