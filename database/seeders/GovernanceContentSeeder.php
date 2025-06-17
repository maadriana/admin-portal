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
            [
                'key' => 'governance_overview_paragraph2',
                'value' => 'Our comprehensive approach combines industry best practices with tailored solutions to address your organization\'s unique governance challenges and risk profile, ensuring compliance while driving strategic objectives.',
            ],

            // Approach Section
            [
                'key' => 'governance_approach_title',
                'value' => 'Our Approach',
            ],
            [
                'key' => 'governance_approach_item1_title',
                'value' => 'Strategic Framework Development',
            ],
            [
                'key' => 'governance_approach_item1_description',
                'value' => 'Design and implement governance structures that align with your business objectives, regulatory requirements, and stakeholder expectations while promoting effective decision-making.',
            ],
            [
                'key' => 'governance_approach_item2_title',
                'value' => 'Risk Assessment & Mitigation',
            ],
            [
                'key' => 'governance_approach_item2_description',
                'value' => 'Identify, assess, and develop strategies to manage operational, financial, and strategic risks that could impact your organization\'s performance and reputation.',
            ],
            [
                'key' => 'governance_approach_item3_title',
                'value' => 'Continuous Monitoring',
            ],
            [
                'key' => 'governance_approach_item3_description',
                'value' => 'Establish ongoing monitoring and evaluation processes to ensure governance effectiveness and risk management protocols remain current with evolving business environments.',
            ],

            // Services Section
            [
                'key' => 'governance_services_title',
                'value' => 'Our Services Include',
            ],
            [
                'key' => 'governance_service1_title',
                'value' => 'Corporate Governance Advisory',
            ],
            [
                'key' => 'governance_service1_description',
                'value' => 'Board effectiveness reviews, governance policy development, and compliance frameworks. We help establish clear roles, responsibilities, and accountability structures across your organization.',
            ],
            [
                'key' => 'governance_service2_title',
                'value' => 'Risk Management Solutions',
            ],
            [
                'key' => 'governance_service2_description',
                'value' => 'Enterprise risk management, internal control systems, and crisis management planning. Our solutions help you anticipate, prepare for, and respond to potential business disruptions.',
            ],

            // Benefits Section
            [
                'key' => 'governance_benefits_title',
                'value' => 'Benefits of Our Governance Services',
            ],
            [
                'key' => 'governance_benefit1_title',
                'value' => 'Enhanced Compliance',
            ],
            [
                'key' => 'governance_benefit1_description',
                'value' => 'Strengthen compliance with regulatory requirements and industry standards while reducing legal and operational risks.',
            ],
            [
                'key' => 'governance_benefit2_title',
                'value' => 'Improved Decision-Making',
            ],
            [
                'key' => 'governance_benefit2_description',
                'value' => 'Establish clear governance structures that facilitate informed, timely, and strategic decision-making processes.',
            ],
            [
                'key' => 'governance_benefit3_title',
                'value' => 'Stakeholder Confidence',
            ],
            [
                'key' => 'governance_benefit3_description',
                'value' => 'Build trust with investors, regulators, and other stakeholders through transparent and accountable governance practices.',
            ],
            [
                'key' => 'governance_benefit4_title',
                'value' => 'Business Resilience',
            ],
            [
                'key' => 'governance_benefit4_description',
                'value' => 'Develop organizational resilience through effective risk management and crisis preparedness strategies.',
            ],

            // Sidebar Content
            [
                'key' => 'governance_cta_title',
                'value' => 'Strengthen Your Governance',
            ],
            [
                'key' => 'governance_cta_description',
                'value' => 'Ready to build a stronger governance framework? Let\'s discuss how we can help secure your organization\'s future.',
            ],
            [
                'key' => 'governance_cta_button_text',
                'value' => 'Get Started',
            ],

            // Quick Facts
            [
                'key' => 'governance_fact1_label',
                'value' => 'Governance Frameworks',
            ],
            [
                'key' => 'governance_fact1_value',
                'value' => '25+',
            ],
            [
                'key' => 'governance_fact2_label',
                'value' => 'Risk Assessments',
            ],
            [
                'key' => 'governance_fact2_value',
                'value' => '100+',
            ],
            [
                'key' => 'governance_fact3_label',
                'value' => 'Client Satisfaction',
            ],
            [
                'key' => 'governance_fact3_value',
                'value' => '98%',
            ],

            // Related Services
            [
                'key' => 'governance_related_service1',
                'value' => 'Audit & Assurance',
            ],
            [
                'key' => 'governance_related_service2',
                'value' => 'Business Advisory',
            ],
            [
                'key' => 'governance_related_service3',
                'value' => 'Forensic & Litigation',
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
