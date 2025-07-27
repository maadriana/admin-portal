<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PamelaContentSeeder extends Seeder
{
    public function run()
    {
        $pamelaContent = [
            // Basic Information
            [
                'key' => 'pamela_full_name',
                'value' => 'Pamela Grace S. Tangso',
            ],
            [
                'key' => 'pamela_position',
                'value' => 'Partner',
            ],
            [
                'key' => 'pamela_email',
                'value' => 'pamelagrace.tangso@mtco.com.ph',
            ],
            [
                'key' => 'pamela_company',
                'value' => 'Mendoza Tugano & Co., CPAs',
            ],
            [
                'key' => 'pamela_profile_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Hero Stats
            [
                'key' => 'pamela_stat1_value',
                'value' => '17+',
            ],
            [
                'key' => 'pamela_stat1_label',
                'value' => 'Years Total Experience',
            ],
            [
                'key' => 'pamela_stat2_value',
                'value' => '10+',
            ],
            [
                'key' => 'pamela_stat2_label',
                'value' => 'Industries Served',
            ],
            [
                'key' => 'pamela_stat3_value',
                'value' => 'Tax',
            ],
            [
                'key' => 'pamela_stat3_label',
                'value' => 'Head - OIC',
            ],

            // Professional Badge
            [
                'key' => 'pamela_badge_title',
                'value' => 'CPA',
            ],
            [
                'key' => 'pamela_badge_subtitle',
                'value' => 'Tax Specialist',
            ],

            // Biography Sections
            [
                'key' => 'pamela_bio_section1_title',
                'value' => 'Foundation Years at Mendoza Querido & Co.',
            ],
            [
                'key' => 'pamela_bio_section1_content',
                'value' => 'Pam embarked on her professional journey with seven formative years at Mendoza Querido & Co., where she expertly conducted audits and handled comprehensive tax services for a remarkably diverse array of companies spanning multiple industries. Her extensive clientele encompassed manufacturing companies, manning agencies, merchandising firms, stock brokerage houses, banking institutions, online gaming enterprises, trusts, non-profit organizations, cooperatives, power generation companies, property management firms, and Business Process Outsourcing (BPO) entities.',
            ],
            [
                'key' => 'pamela_bio_section2_title',
                'value' => 'Corporate Tax Leadership Excellence',
            ],
            [
                'key' => 'pamela_bio_section2_content',
                'value' => 'Transitioning to the private sector for a transformative decade, Pam assumed various pivotal tax-related roles that showcased her strategic expertise and leadership capabilities. Her most recent and distinguished position was with Global Business Power Corporation, a wholly-owned subsidiary of Meralco PowerGen Corporation (MGen). As Tax Head – Officer-in-Charge, she adeptly oversaw comprehensive tax compliance and planning functions, offering sophisticated taxation services across the entire organization. Pam played a pivotal role in initiating and implementing a comprehensive range of innovative tax strategies specifically aimed at mitigating the company\'s tax risks and optimizing fiscal efficiency.',
            ],
            [
                'key' => 'pamela_bio_section3_title',
                'value' => 'Partnership & Strategic Return',
            ],
            [
                'key' => 'pamela_bio_section3_content',
                'value' => 'In 2022, bringing together her comprehensive experience from both public practice and corporate leadership, Pam made the strategic decision to rejoin Mendoza Querido & Co. (now Mendoza Tugano & Co.) as a Partner. Her return represents the culmination of her professional evolution, combining deep technical expertise in taxation with proven leadership capabilities and extensive cross-industry experience.',
            ],

            // Education
            [
                'key' => 'pamela_education1_degree',
                'value' => 'Bachelor of Science in Accountancy',
            ],
            [
                'key' => 'pamela_education1_institution',
                'value' => 'University of Santo Tomas',
            ],
            [
                'key' => 'pamela_education2_degree',
                'value' => '',
            ],
            [
                'key' => 'pamela_education2_institution',
                'value' => '',
            ],

            // Professional Affiliations (Updated keys to match website)
            [
                'key' => 'pamela_affiliation1_name',
                'value' => 'PICPA',
            ],
            [
                'key' => 'pamela_affiliation1_description',
                'value' => 'Philippine Institute of Certified Public Accountants',
            ],
            [
                'key' => 'pamela_affiliation2_name',
                'value' => '',
            ],
            [
                'key' => 'pamela_affiliation2_description',
                'value' => '',
            ],

            // Accreditation (New section based on website)
            [
                'key' => 'pamela_accreditation1_name',
                'value' => 'PICPA',
            ],
            [
                'key' => 'pamela_accreditation1_description',
                'value' => 'Philippine Institute of Certified Public Accountants',
            ],
            [
                'key' => 'pamela_accreditation2_name',
                'value' => 'TMAP',
            ],
            [
                'key' => 'pamela_accreditation2_description',
                'value' => 'Tax Management Association of the Philippines',
            ],

            // Quote/Philosophy
            [
                'key' => 'pamela_quote',
                'value' => 'Strategic tax planning combined with comprehensive risk management creates sustainable value for organizations across diverse industry landscapes.',
            ],
        ];

        foreach ($pamelaContent as $content) {
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
