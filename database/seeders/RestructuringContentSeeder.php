<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestructuringContentSeeder extends Seeder
{
    public function run()
    {
        $restructuringContent = [
            // Header Section
            [
                'key' => 'restructuring_page_title',
                'value' => 'Business Restructuring and Insolvency',
            ],
            [
                'key' => 'restructuring_page_subtitle',
                'value' => 'Guiding businesses through financial challenges with strategic recovery solutions that preserve value and protect stakeholder interests.',
            ],

            // Service Image
            [
                'key' => 'restructuring_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'restructuring_overview_title',
                'value' => 'Strategic Recovery Solutions',
            ],
            [
                'key' => 'restructuring_overview_paragraph1',
                'value' => 'We help businesses in distress develop recovery strategies that preserve value and protect stakeholder interests. Our restructuring and insolvency services guide companies through turnaround efforts and financial rehabilitation.',
            ],
            [
                'key' => 'restructuring_overview_paragraph2',
                'value' => 'With a multidisciplinary team, we assess financial viability, recommend strategic options, and support clients in navigating complex restructuring scenarios. We aim to restore stability and sustainability during periods of uncertainty.',
            ],

            // Key Service Areas
            [
                'key' => 'restructuring_services_title',
                'value' => 'Our Core Services',
            ],
            [
                'key' => 'restructuring_service_item1_title',
                'value' => 'Financial Viability Assessment',
            ],
            [
                'key' => 'restructuring_service_item1_description',
                'value' => 'Comprehensive evaluation of your business\'s financial health and assessment of recovery potential through detailed analysis and strategic planning.',
            ],
            [
                'key' => 'restructuring_service_item2_title',
                'value' => 'Turnaround Strategies',
            ],
            [
                'key' => 'restructuring_service_item2_description',
                'value' => 'Development and implementation of strategic options to navigate complex restructuring scenarios and restore operational stability.',
            ],
            [
                'key' => 'restructuring_service_item3_title',
                'value' => 'Stakeholder Protection',
            ],
            [
                'key' => 'restructuring_service_item3_description',
                'value' => 'Balanced approach to protect the interests of all stakeholders while working toward sustainable business recovery and value preservation.',
            ],

            // Value Proposition Section
            [
                'key' => 'restructuring_value_title',
                'value' => 'Our Commitment to Recovery',
            ],
            [
                'key' => 'restructuring_value_description',
                'value' => 'Our goal is to help businesses emerge stronger from financial challenges. Through our multidisciplinary approach and strategic guidance, we work to restore stability and create sustainable pathways to recovery during periods of uncertainty.',
            ],

            // CTA Section
            [
                'key' => 'restructuring_cta_text',
                'value' => 'Discuss Your Recovery Strategy',
            ],

            // Sidebar Content
            [
                'key' => 'restructuring_sidebar_cta_title',
                'value' => 'Need Recovery Guidance?',
            ],
            [
                'key' => 'restructuring_sidebar_cta_description',
                'value' => 'Our restructuring specialists are ready to help you develop effective recovery strategies and navigate financial challenges.',
            ],
            [
                'key' => 'restructuring_sidebar_cta_button_text',
                'value' => 'Contact Our Specialists',
            ],
        ];

        foreach ($restructuringContent as $content) {
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
