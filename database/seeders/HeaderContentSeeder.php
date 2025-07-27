<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;

class HeaderContentSeeder extends Seeder
{
    public function run()
    {
        $headerContent = [
            // Top Bar Contact Information
            'header_contact_email' => 'contact@mtco.com.ph',
            'header_contact_phone' => '+632 8887 1888',

            // Social Media Links
            'header_social_twitter' => '',
            'header_social_facebook' => '',
            'header_social_instagram' => '',
            'header_social_linkedin' => '',

            // Logo (will be empty until uploaded)
            'header_logo' => '',

            // Main Navigation Menu
            'nav_home_text' => 'Home',
            'nav_about_text' => 'About',
            'nav_services_text' => 'Services',
            'nav_news_text' => 'News & Updates',
            'nav_careers_text' => 'Careers',
            'nav_international_text' => 'International',
            'nav_mtc_care_text' => 'MTC Care',

            // About Submenu
            'nav_about_history' => 'History',
            'nav_about_partners' => 'Partners',
            'nav_about_contact' => 'Contact Us',

            // Services Submenu
            'nav_service_audit' => 'Audit and Assurance',
            'nav_service_advisory' => 'Business Advisory',
            'nav_service_outsourcing' => 'Outsourcing',
            'nav_service_restructuring' => 'Business Restructuring and Insolvency',
            'nav_service_finance' => 'Corporate Finance and Advisory',
            'nav_service_forensic' => 'Forensic and Litigation Support',
            'nav_service_governance' => 'Governance, Risk and Internal Audit',
            'nav_service_taxation' => 'Taxation',

            // News & Updates Submenu
            'nav_news_updates' => 'News & Updates',

            // Careers Submenu
            'nav_career_vacancies' => 'Current Vacancies',
            'nav_career_professionals' => 'Experienced Professionals',
            'nav_career_graduate' => 'Graduate',
            'nav_career_internship' => 'How to Apply',

            // MTC Care Submenu
            'nav_csr_text' => 'CSR',
            'nav_galleries_text' => 'Galleries',
        ];

        foreach ($headerContent as $key => $value) {
            Content::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $this->command->info('Header content seeded successfully!');
    }
}
