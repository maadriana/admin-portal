<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeaderContentSeeder extends Seeder
{
    public function run()
    {
        $headerContent = [
            // Top Bar Contact Information
            [
                'key' => 'header_contact_email',
                'value' => 'contact@mtco.com.ph',
            ],
            [
                'key' => 'header_contact_phone',
                'value' => '+632 8887 1888',
            ],

            // Social Media Links
            [
                'key' => 'header_social_twitter',
                'value' => '',
            ],
            [
                'key' => 'header_social_facebook',
                'value' => '',
            ],
            [
                'key' => 'header_social_instagram',
                'value' => '',
            ],
            [
                'key' => 'header_social_linkedin',
                'value' => '',
            ],

            // Logo (will be empty until uploaded)
            [
                'key' => 'header_logo',
                'value' => '',
            ],

            // Main Navigation Menu
            [
                'key' => 'nav_home_text',
                'value' => 'Home',
            ],
            [
                'key' => 'nav_services_text',
                'value' => 'Services',
            ],
            [
                'key' => 'nav_people_text',
                'value' => 'People',
            ],
            [
                'key' => 'nav_careers_text',
                'value' => 'Careers',
            ],
            [
                'key' => 'nav_international_text',
                'value' => 'International',
            ],
            [
                'key' => 'nav_contact_text',
                'value' => 'Contact',
            ],
            [
                'key' => 'nav_about_text',
                'value' => 'About',
            ],

            // Services Submenu
            [
                'key' => 'nav_service_audit',
                'value' => 'Audit and Assurance',
            ],
            [
                'key' => 'nav_service_advisory',
                'value' => 'Business Advisory',
            ],
            [
                'key' => 'nav_service_outsourcing',
                'value' => 'Outsourcing',
            ],
            [
                'key' => 'nav_service_restructuring',
                'value' => 'Business Restructuring and Insolvency',
            ],
            [
                'key' => 'nav_service_finance',
                'value' => 'Corporate Finance and Advisory',
            ],
            [
                'key' => 'nav_service_forensic',
                'value' => 'Forensic and Litigation Support',
            ],
            [
                'key' => 'nav_service_governance',
                'value' => 'Governance, Risk and Internal Audit',
            ],
            [
                'key' => 'nav_service_taxation',
                'value' => 'Taxation',
            ],

            // Careers Submenu
            [
                'key' => 'nav_career_vacancies',
                'value' => 'Current Vacancies',
            ],
            [
                'key' => 'nav_career_professionals',
                'value' => 'Experienced Professionals',
            ],
            [
                'key' => 'nav_career_graduate',
                'value' => 'Graduate',
            ],
            [
                'key' => 'nav_career_internship',
                'value' => 'Internship Opportunities',
            ],
        ];

        foreach ($headerContent as $content) {
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
