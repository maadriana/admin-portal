<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterContentSeeder extends Seeder
{
    public function run()
    {
        $footerContent = [
            // Company Information
            [
                'key' => 'footer_address_line1',
                'value' => '16F The Salcedo Towers',
            ],
            [
                'key' => 'footer_address_line2',
                'value' => '169 H.V. de la Costa St.',
            ],
            [
                'key' => 'footer_address_line3',
                'value' => 'Salcedo Village',
            ],
            [
                'key' => 'footer_address_line4',
                'value' => 'Makati City 1227',
            ],
            [
                'key' => 'footer_address_line5',
                'value' => 'Philippines',
            ],
            [
                'key' => 'footer_phone',
                'value' => '+632 8887 1888',
            ],
            [
                'key' => 'footer_email',
                'value' => 'contact@mtco.com.ph',
            ],

            // Useful Links Section
            [
                'key' => 'footer_useful_links_title',
                'value' => 'Useful Links',
            ],
            [
                'key' => 'footer_link1_text',
                'value' => 'Home',
            ],
            [
                'key' => 'footer_link2_text',
                'value' => 'About us',
            ],
            [
                'key' => 'footer_link3_text',
                'value' => 'Careers',
            ],
            [
                'key' => 'footer_link4_text',
                'value' => 'People',
            ],

            // Services Section
            [
                'key' => 'footer_services_title',
                'value' => 'Our Services',
            ],
            [
                'key' => 'footer_service1_text',
                'value' => 'Audit and Assurance',
            ],
            [
                'key' => 'footer_service2_text',
                'value' => 'Business Advisory',
            ],
            [
                'key' => 'footer_service3_text',
                'value' => 'Outsourcing',
            ],
            [
                'key' => 'footer_service4_text',
                'value' => 'Business Restructuring and Insolvency',
            ],
            [
                'key' => 'footer_service5_text',
                'value' => 'Corporate Finance and Advisory',
            ],
            [
                'key' => 'footer_service6_text',
                'value' => 'Forensic and Litigation Support',
            ],
            [
                'key' => 'footer_service7_text',
                'value' => 'Governance, Risk and Internal Audit',
            ],
            [
                'key' => 'footer_service8_text',
                'value' => 'Taxation',
            ],

            // Contact Section
            [
                'key' => 'footer_contact_title',
                'value' => 'Get In Touch',
            ],
            [
                'key' => 'footer_contact_description',
                'value' => 'For inquiries, you may call us through our hotline at (02) 8887-1888 or send an email to contact@mtco.com.ph',
            ],

            // Social Media Links
            [
                'key' => 'footer_social_twitter',
                'value' => '',
            ],
            [
                'key' => 'footer_social_facebook',
                'value' => '',
            ],
            [
                'key' => 'footer_social_instagram',
                'value' => '',
            ],
            [
                'key' => 'footer_social_linkedin',
                'value' => '',
            ],

            // Copyright Section
            [
                'key' => 'footer_copyright_text',
                'value' => '©',
            ],
            [
                'key' => 'footer_company_name',
                'value' => 'BizLand',
            ],
            [
                'key' => 'footer_rights_text',
                'value' => 'All Rights Reserved',
            ],
            [
                'key' => 'footer_credits_text',
                'value' => 'Designed by',
            ],
            [
                'key' => 'footer_credits_link',
                'value' => 'https://github.com/maadriana/',
            ],
            [
                'key' => 'footer_credits_name',
                'value' => 'Col',
            ],
        ];

        foreach ($footerContent as $content) {
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
