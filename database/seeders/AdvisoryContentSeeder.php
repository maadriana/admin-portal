<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvisoryContentSeeder extends Seeder
{
    public function run()
    {
        $advisoryContent = [
            // Header Section
            [
                'key' => 'advisory_page_title',
                'value' => 'Business Advisory',
            ],
            [
                'key' => 'advisory_page_subtitle',
                'value' => 'Empowering companies to navigate change, seize opportunities, and resolve operational challenges through deep industry knowledge and practical insights.',
            ],

            // Service Image
            [
                'key' => 'advisory_service_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Service Overview
            [
                'key' => 'advisory_overview_title',
                'value' => 'Driving Performance and Long-Term Value',
            ],
            [
                'key' => 'advisory_overview_paragraph1',
                'value' => 'Our Business Advisory services empower companies to navigate change, seize opportunities, and resolve operational challenges. We combine deep industry knowledge with practical insights to help clients drive performance and long-term value.',
            ],
            [
                'key' => 'advisory_overview_paragraph2',
                'value' => 'We assist with business planning, internal control enhancement, process improvement, financial modeling, and performance management. Whether you are launching a new venture or improving an existing one, we provide hands-on support that will help transform your goals into measurable results.',
            ],

            // Key Service Areas (Dynamic Service Items)
            [
                'key' => 'advisory_services_title',
                'value' => 'Our Core Advisory Services',
            ],
            [
                'key' => 'advisory_service_item1_title',
                'value' => 'Business Planning & Strategy',
            ],
            [
                'key' => 'advisory_service_item1_description',
                'value' => 'Comprehensive business planning and strategic guidance to help you define clear objectives, identify growth opportunities, and develop actionable roadmaps for success.',
            ],
            [
                'key' => 'advisory_service_item2_title',
                'value' => 'Process Improvement & Internal Controls',
            ],
            [
                'key' => 'advisory_service_item2_description',
                'value' => 'Enhancement of internal controls and operational processes to improve efficiency, reduce risks, and strengthen organizational governance frameworks.',
            ],
            [
                'key' => 'advisory_service_item3_title',
                'value' => 'Financial Modeling & Performance Management',
            ],
            [
                'key' => 'advisory_service_item3_description',
                'value' => 'Advanced financial modeling and performance management systems to support data-driven decision making and monitor key business metrics.',
            ],
            [
                'key' => 'advisory_service_item4_title',
                'value' => 'New Venture & Operational Support',
            ],
            [
                'key' => 'advisory_service_item4_description',
                'value' => 'Hands-on support for new ventures and operational improvements, providing practical guidance to transform business goals into measurable results.',
            ],

            // Value Proposition Section
            [
                'key' => 'advisory_value_title',
                'value' => 'Transforming Goals into Results',
            ],
            [
                'key' => 'advisory_value_description',
                'value' => 'Our approach combines strategic thinking with practical implementation. We work closely with your team to understand your unique challenges and opportunities, delivering customized solutions that drive sustainable growth and operational excellence.',
            ],

            // CTA Section
            [
                'key' => 'advisory_cta_text',
                'value' => 'Schedule Your Advisory Consultation',
            ],

            // Sidebar Content
            [
                'key' => 'advisory_sidebar_cta_title',
                'value' => 'Ready to Transform Your Business?',
            ],
            [
                'key' => 'advisory_sidebar_cta_description',
                'value' => 'Contact our advisory team to explore how we can help you navigate challenges and drive performance improvements.',
            ],
            [
                'key' => 'advisory_sidebar_cta_button_text',
                'value' => 'Contact Our Team',
            ],
        ];

        foreach ($advisoryContent as $content) {
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
