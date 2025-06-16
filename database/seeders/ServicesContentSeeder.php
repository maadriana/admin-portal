<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesContentSeeder extends Seeder
{
    public function run()
    {
        $servicesContent = [
            // Header Section
            [
                'key' => 'services_main_title',
                'value' => 'Services',
            ],
            [
                'key' => 'services_subtitle',
                'value' => '<span>Check Our</span> <span class="description-title" style="font-weight: bold;">Services</span>',
            ],
            [
                'key' => 'services_description_paragraph1',
                'value' => 'Mendoza Tugano & Co., CPAs (MTC) operates as a comprehensive firm, offering an array of services that encompass accounting services, assurance, tax services, financial advisory, and consulting. We extend our expertise to both privately held enterprises and publicly listed companies. Our commitment to excellence and leadership is exemplified by the unwavering dedication of our highly skilled and passionate experts.',
            ],
            [
                'key' => 'services_description_paragraph2',
                'value' => 'Each of our client enjoys the benefits of collaborative teamwork, bringing together diverse skills and proficiencies. This collaborative synergy is expertly guided by our partners, all of whom are committed to addressing your unique requirements. The solutions provided by MTC consistently adhere to the highest standards of quality, ensuring they are delivered with precision, timeliness, responsiveness, and thoroughness.',
            ],

            // Service 1: Audit and Assurance
            [
                'key' => 'service1_title',
                'value' => 'Audit and Assurance',
            ],
            [
                'key' => 'service1_description',
                'value' => 'Professional audit services ensuring compliance and accuracy',
            ],

            // Service 2: Business Advisory
            [
                'key' => 'service2_title',
                'value' => 'Business Advisory',
            ],
            [
                'key' => 'service2_description',
                'value' => 'Strategic guidance to drive business growth and success',
            ],

            // Service 3: Outsourcing
            [
                'key' => 'service3_title',
                'value' => 'Outsourcing',
            ],
            [
                'key' => 'service3_description',
                'value' => 'Comprehensive outsourcing solutions for operational efficiency',
            ],

            // Service 4: Business Restructuring
            [
                'key' => 'service4_title',
                'value' => 'Business Restructuring and Insolvency',
            ],
            [
                'key' => 'service4_description',
                'value' => 'Expert restructuring and insolvency advisory services',
            ],

            // Service 5: Corporate Finance
            [
                'key' => 'service5_title',
                'value' => 'Corporate Finance and Advisory',
            ],
            [
                'key' => 'service5_description',
                'value' => 'Strategic financial advisory and investment solutions',
            ],

            // Service 6: Forensic
            [
                'key' => 'service6_title',
                'value' => 'Forensic and Litigation Support',
            ],
            [
                'key' => 'service6_description',
                'value' => 'Forensic accounting and litigation support expertise',
            ],

            // Service 7: Governance
            [
                'key' => 'service7_title',
                'value' => 'Governance, Risk and Internal Audit',
            ],
            [
                'key' => 'service7_description',
                'value' => 'Comprehensive governance and risk management solutions',
            ],

            // Service 8: Taxation
            [
                'key' => 'service8_title',
                'value' => 'Taxation',
            ],
            [
                'key' => 'service8_description',
                'value' => 'Expert tax planning and compliance services',
            ],
        ];

        foreach ($servicesContent as $content) {
            DB::table('contents')->updateOrInsert(
                ['key' => $content['key']],
                [
                    'value' => $content['value'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
