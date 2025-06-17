<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmmanuelContentSeeder extends Seeder
{
    public function run()
    {
        $emmanuelContent = [
            // Basic Information
            [
                'key' => 'emmanuel_full_name',
                'value' => 'Emmanuel Y. Mendoza',
            ],
            [
                'key' => 'emmanuel_position',
                'value' => 'Managing Partner',
            ],
            [
                'key' => 'emmanuel_email',
                'value' => 'eymendoza@mtco.com.ph',
            ],
            [
                'key' => 'emmanuel_company',
                'value' => 'Mendoza Tugano & Co., CPAs',
            ],
            [
                'key' => 'emmanuel_profile_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Hero Stats
            [
                'key' => 'emmanuel_stat1_value',
                'value' => '10+',
            ],
            [
                'key' => 'emmanuel_stat1_label',
                'value' => 'Years at SGV & Co.',
            ],
            [
                'key' => 'emmanuel_stat2_value',
                'value' => '3',
            ],
            [
                'key' => 'emmanuel_stat2_label',
                'value' => 'Board Positions',
            ],
            [
                'key' => 'emmanuel_stat3_value',
                'value' => '2015',
            ],
            [
                'key' => 'emmanuel_stat3_label',
                'value' => 'Independent Director Since',
            ],

            // Biography Sections
            [
                'key' => 'emmanuel_bio_section1_title',
                'value' => 'Foundation Years at SGV & Co.',
            ],
            [
                'key' => 'emmanuel_bio_section1_content',
                'value' => 'Mr. Emmanuel Y. Mendoza commenced his distinguished career with a decade of service at SyCip, Gorres, Velayo & Co (SGV & Co.), the Philippines\' premier accounting firm. During this foundational period, he developed expertise across a comprehensive range of financial services including auditing, due diligence reviews for mergers and acquisitions, bond offerings, initial public offerings, and sophisticated investment valuation methodologies.',
            ],
            [
                'key' => 'emmanuel_bio_section2_title',
                'value' => 'Executive Banking Leadership',
            ],
            [
                'key' => 'emmanuel_bio_section2_content',
                'value' => 'Transitioning into the complex world of banking operations, Mr. Mendoza served as First Vice President and Financial Controller of Global Business Bank (GLOBALBANK), a prestigious affiliate of Metrobank and Tokai Bank of Japan. His multifaceted role encompassed Deputy Compliance Officer responsibilities, serving as Liaison Officer with the Bangko Sentral ng Pilipinas, and maintaining active membership in critical committees including the Bank\'s Asset Liability Committee (ALCO) and Operations and Compliance Committee. His strategic leadership proved instrumental during the successful three-way merger between GLOBALBANK, Philippine Banking Corporation, and Asianbank Corporation, where he expertly navigated complex regulatory requirements, sophisticated tax planning initiatives, comprehensive computer system integration, and the harmonization of organizational policies and procedures.',
            ],
            [
                'key' => 'emmanuel_bio_section3_title',
                'value' => 'Current Leadership & Governance',
            ],
            [
                'key' => 'emmanuel_bio_section3_content',
                'value' => 'Mr. Mendoza\'s influence extends significantly into corporate governance as an Independent Director of a publicly listed universal bank since 2015, where he presides as Chairman of the Audit Committee and actively participates in the institution\'s IT Steering Committee. His technical expertise proved crucial in leading the evaluation team that selected the bank\'s core banking system. His governance expertise extends to his role as Independent Director of Medicard Philippines, one of the nation\'s largest Health Maintenance Organizations, where he serves as Chairman of the Audit and Risk Committee. Additionally, he contributes his strategic insights as Independent Director of the Makati Sports Club, taking on the leadership role of Chairman of the Planning and Development Committee.',
            ],

            // Education
            [
                'key' => 'emmanuel_education1_degree',
                'value' => 'Master\'s in Management',
            ],
            [
                'key' => 'emmanuel_education1_institution',
                'value' => 'Asian Institute of Management',
            ],
            [
                'key' => 'emmanuel_education2_degree',
                'value' => 'Bachelor in Business Administration',
            ],
            [
                'key' => 'emmanuel_education2_institution',
                'value' => 'Accountancy • University of the Philippines',
            ],

            // Professional Affiliations
            [
                'key' => 'emmanuel_affiliation1_name',
                'value' => 'PICPA',
            ],
            [
                'key' => 'emmanuel_affiliation1_description',
                'value' => 'Philippine Institute of Certified Public Accountants',
            ],
            [
                'key' => 'emmanuel_affiliation2_name',
                'value' => 'ACPAPP',
            ],
            [
                'key' => 'emmanuel_affiliation2_description',
                'value' => 'Association of CPAs in Public Practice',
            ],
            [
                'key' => 'emmanuel_affiliation3_name',
                'value' => 'Bank Institute of the Philippines',
            ],
            [
                'key' => 'emmanuel_affiliation3_description',
                'value' => 'Professional Banking Association',
            ],
            [
                'key' => 'emmanuel_affiliation4_name',
                'value' => 'ACPAPP Committee',
            ],
            [
                'key' => 'emmanuel_affiliation4_description',
                'value' => 'Auditing Standards and Practices',
            ],

            // Quote/Philosophy
            [
                'key' => 'emmanuel_quote',
                'value' => 'Excellence in professional practice comes from the intersection of technical expertise, ethical leadership, and unwavering commitment to client success.',
            ],
        ];

        foreach ($emmanuelContent as $content) {
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
