<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JekellContentSeeder extends Seeder
{
    public function run()
    {
        $jekellContent = [
            // Basic Information
            [
                'key' => 'jekell_full_name',
                'value' => 'Jekell G. Salosagcol',
            ],
            [
                'key' => 'jekell_position',
                'value' => 'External Quality Assurance Consultant',
            ],
            [
                'key' => 'jekell_email',
                'value' => 'ekell.salosagcol@mtco.com.ph',
            ],
            [
                'key' => 'jekell_company',
                'value' => 'Mendoza Tugano & Co., CPAs',
            ],
            [
                'key' => 'jekell_profile_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Hero Stats
            [
                'key' => 'jekell_stat1_value',
                'value' => '26+',
            ],
            [
                'key' => 'jekell_stat1_label',
                'value' => 'Years Experience',
            ],
            [
                'key' => 'jekell_stat2_value',
                'value' => '2nd',
            ],
            [
                'key' => 'jekell_stat2_label',
                'value' => 'CPA Board Placer',
            ],
            [
                'key' => 'jekell_stat3_value',
                'value' => '2',
            ],
            [
                'key' => 'jekell_stat3_label',
                'value' => 'Published Books',
            ],

            // Professional Badge
            [
                'key' => 'jekell_badge_title',
                'value' => 'Prof.',
            ],
            [
                'key' => 'jekell_badge_subtitle',
                'value' => 'CPA, Academic',
            ],

            // Biography Sections
            [
                'key' => 'jekell_bio_section1_title',
                'value' => 'Academic Excellence & SGV Foundation',
            ],
            [
                'key' => 'jekell_bio_section1_content',
                'value' => 'Prof. Salosagcol graduated with a Bachelor of Science in Accountancy from the Technological Institute of the Philippines in 1994, achieving exceptional academic distinction by placing second in the Philippine CPA Licensure Examination in May 1995. He began his professional career as an Auditor at SyCip, Gorres, Velayo & Company from 1995 to 1997, establishing a solid foundation in public accounting practice at the Philippines\' premier accounting firm.',
            ],
            [
                'key' => 'jekell_bio_section2_title',
                'value' => 'Academic Leadership & Scholarly Contributions',
            ],
            [
                'key' => 'jekell_bio_section2_content',
                'value' => 'From 1997 to 2002, Prof. Salosagcol served as a distinguished professor at De La Salle University and St. Scholastica\'s College, sharing his expertise with the next generation of accounting professionals. Currently, he continues his academic leadership as a CPA reviewer and major shareholder at CRC-ACE Review School. His scholarly contributions include authoring and publishing two significant works: "Basic Accounting Theory and Concepts" and "A Guide in Understanding the Philippine Standards on Auditing", establishing him as both an educator and thought leader in the accounting profession.',
            ],
            [
                'key' => 'jekell_bio_section3_title',
                'value' => 'Government & Corporate Advisory Excellence',
            ],
            [
                'key' => 'jekell_bio_section3_content',
                'value' => 'Prof. Salosagcol has provided critical assistance to major government institutions including the Commission on Audit (COA) in adopting Public Sector Accounting Standards, the Cooperative Development Authority (CDA) in developing the Financial Reporting Framework for Cooperatives, and the Bureau of Internal Revenue (BIR) in reconciling PFRS rules with BIR regulations. His consulting expertise extends to prestigious listed companies and government agencies including San Miguel, Meralco, Innodata, Petron, Ayala Land, Social Security System, Philippine Health Insurance, Energy Regulatory Board, Regulatory Toll Board, and Civil Aviation Authority of the Philippines, among others.',
            ],

            // Education & Achievement
            [
                'key' => 'jekell_education1_degree',
                'value' => 'Bachelor of Science in Accountancy',
            ],
            [
                'key' => 'jekell_education1_institution',
                'value' => 'Technological Institute of the Philippines',
            ],
            [
                'key' => 'jekell_education1_year',
                'value' => '1994',
            ],
            [
                'key' => 'jekell_education1_achievement',
                'value' => '2nd Place - CPA Licensure Exam (May 1995)',
            ],
            [
                'key' => 'jekell_current_role_title',
                'value' => 'CPA Reviewer & Major Shareholder',
            ],
            [
                'key' => 'jekell_current_role_institution',
                'value' => 'CRC-ACE Review School',
            ],

            // Published Works
            [
                'key' => 'jekell_publication1_title',
                'value' => 'Basic Accounting Theory and Concepts',
            ],
            [
                'key' => 'jekell_publication1_description',
                'value' => 'Comprehensive guide to fundamental accounting principles',
            ],
            [
                'key' => 'jekell_publication2_title',
                'value' => 'A Guide in Understanding the Philippine Standards on Auditing',
            ],
            [
                'key' => 'jekell_publication2_description',
                'value' => 'Essential reference for auditing standards and practices',
            ],

            // Committee Memberships
            [
                'key' => 'jekell_committee1',
                'value' => 'CPA Board Examination Syllabus Revision Committee (Board of Accountancy)',
            ],
            [
                'key' => 'jekell_committee2',
                'value' => 'Committee for Code of Ethics for Professional Accountants Adoption',
            ],
            [
                'key' => 'jekell_committee3',
                'value' => 'Technical Working Group - Philippine Interpretations Committee',
            ],
            [
                'key' => 'jekell_committee4',
                'value' => 'Ethics & Quality Assurance Review Committee (PICPA)',
            ],
            [
                'key' => 'jekell_committee5',
                'value' => 'Auditing Standards & Practices Committee (ACPAPP)',
            ],

            // Notable Clients
            [
                'key' => 'jekell_client1',
                'value' => 'San Miguel',
            ],
            [
                'key' => 'jekell_client2',
                'value' => 'Meralco',
            ],
            [
                'key' => 'jekell_client3',
                'value' => 'Petron',
            ],
            [
                'key' => 'jekell_client4',
                'value' => 'Ayala Land',
            ],
            [
                'key' => 'jekell_client5',
                'value' => 'SSS',
            ],
            [
                'key' => 'jekell_client6',
                'value' => 'PhilHealth',
            ],
            [
                'key' => 'jekell_client7',
                'value' => 'ERC',
            ],
            [
                'key' => 'jekell_client8',
                'value' => 'CAAP',
            ],

            // Professional Affiliations
            [
                'key' => 'jekell_affiliation1_name',
                'value' => 'PICPA',
            ],
            [
                'key' => 'jekell_affiliation1_description',
                'value' => 'Philippine Institute of Certified Public Accountants',
            ],
            [
                'key' => 'jekell_affiliation2_name',
                'value' => 'ACPAPP',
            ],
            [
                'key' => 'jekell_affiliation2_description',
                'value' => 'Association of CPAs in Public Practice',
            ],

            // Quote/Philosophy
            [
                'key' => 'jekell_quote',
                'value' => 'Excellence in accounting education and professional practice requires continuous learning, ethical leadership, and unwavering commitment to advancing the standards of our profession for future generations.',
            ],
        ];

        foreach ($jekellContent as $content) {
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
