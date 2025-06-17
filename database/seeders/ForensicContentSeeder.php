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
                'value' => 'Protecting your interests with expert investigation and legal support.',
            ],

            // Service Image
            [
                'key' => 'forensic_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'forensic_overview_title',
                'value' => 'Protecting Your Interests',
            ],
            [
                'key' => 'forensic_overview_paragraph1',
                'value' => 'Legal challenges come in many forms. When these challenges need to be resolved through litigation, you require effective support that will protect your interests.',
            ],

            // Approach Section
            [
                'key' => 'forensic_approach_title',
                'value' => 'Our Approach',
            ],
            [
                'key' => 'forensic_approach_item1_title',
                'value' => 'Comprehensive Investigation',
            ],
            [
                'key' => 'forensic_approach_item1_description',
                'value' => 'We provide a range of investigation services for contractual and commercial disputes, forensic investigations, valuations, and individual and family disputes.',
            ],
            [
                'key' => 'forensic_approach_item2_title',
                'value' => 'Expert Skills',
            ],
            [
                'key' => 'forensic_approach_item2_description',
                'value' => 'We offer experts with skills in a variety of areas and experience in all types of dispute, globally.',
            ],
            [
                'key' => 'forensic_approach_item3_title',
                'value' => 'Litigation Ready',
            ],
            [
                'key' => 'forensic_approach_item3_description',
                'value' => 'Our team provides effective support through all stages of legal proceedings, from investigation to expert testimony.',
            ],

            // Services Section
            [
                'key' => 'forensic_services_title',
                'value' => 'We Regularly Advise Clients On:',
            ],
            [
                'key' => 'forensic_service1',
                'value' => 'Commercial and contractual disputes and mediation involving business or share valuations',
            ],
            [
                'key' => 'forensic_service2',
                'value' => 'Expert witness and quantification of loss',
            ],
            [
                'key' => 'forensic_service3',
                'value' => 'Forensic investigations, particularly in relation to fraud claims, tax investigations and asset tracing',
            ],

            // CTA Section
            [
                'key' => 'forensic_cta_text',
                'value' => 'Get Expert Support',
            ],

            // Sidebar Content
            [
                'key' => 'forensic_sidebar_cta_title',
                'value' => 'Get Expert Support',
            ],
            [
                'key' => 'forensic_sidebar_cta_description',
                'value' => 'Speak with our forensic specialists and legal support team to protect your interests.',
            ],
            [
                'key' => 'forensic_sidebar_cta_button_text',
                'value' => 'Contact Us Now',
            ],

            // Quick Facts
            [
                'key' => 'forensic_fact1_label',
                'value' => 'Cases Investigated',
            ],
            [
                'key' => 'forensic_fact1_value',
                'value' => '100+',
            ],
            [
                'key' => 'forensic_fact2_label',
                'value' => 'Expert Witness Roles',
            ],
            [
                'key' => 'forensic_fact2_value',
                'value' => '50+',
            ],
            [
                'key' => 'forensic_fact3_label',
                'value' => 'Years of Experience',
            ],
            [
                'key' => 'forensic_fact3_value',
                'value' => '15+',
            ],

            // Related Services
            [
                'key' => 'forensic_related_title',
                'value' => 'Related Services',
            ],
            [
                'key' => 'forensic_related_service1',
                'value' => 'Risk & Restructuring',
            ],
            [
                'key' => 'forensic_related_service2',
                'value' => 'Corporate Advisory',
            ],
            [
                'key' => 'forensic_related_service3',
                'value' => 'Compliance Services',
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
