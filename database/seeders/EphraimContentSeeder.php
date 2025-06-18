<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EphraimContentSeeder extends Seeder
{
    public function run()
    {
        $ephraimContent = [
            // Basic Information
            [
                'key' => 'ephraim_full_name',
                'value' => 'Ephraim T. Tugano',
            ],
            [
                'key' => 'ephraim_position',
                'value' => 'Partner',
            ],
            [
                'key' => 'ephraim_email',
                'value' => 'ephraim.tugano@mtco.com.ph',
            ],
            [
                'key' => 'ephraim_company',
                'value' => 'Mendoza Tugano & Co., CPAs',
            ],
            [
                'key' => 'ephraim_profile_image',
                'value' => '', // Will be populated if user uploads image
            ],

            // Hero Stats
            [
                'key' => 'ephraim_stat1_value',
                'value' => '12+',
            ],
            [
                'key' => 'ephraim_stat1_label',
                'value' => 'Years Public Accounting',
            ],
            [
                'key' => 'ephraim_stat2_value',
                'value' => '8+',
            ],
            [
                'key' => 'ephraim_stat2_label',
                'value' => 'Industry Sectors',
            ],
            [
                'key' => 'ephraim_stat3_value',
                'value' => 'CFO',
            ],
            [
                'key' => 'ephraim_stat3_label',
                'value' => 'Executive Experience',
            ],

            // Biography Sections
            [
                'key' => 'ephraim_bio_section1_title',
                'value' => 'Assurance Partner & Ethics Director',
            ],
            [
                'key' => 'ephraim_bio_section1_content',
                'value' => 'Ephraim is a seasoned Certified Public Accountant with an impressive career spanning over twelve years in public accounting, encompassing both assurance and non-assurance services. His distinguished tenure includes a prominent role as former Assurance Partner and Ethics Director at Mendoza Querido & Co. His extensive industry expertise covers a diverse spectrum including manufacturing, retail, pharmaceuticals, services, mining, hospitality, real estate, regional operating headquarters, foundations, and non-profit organizations.',
            ],
            [
                'key' => 'ephraim_bio_section2_title',
                'value' => 'Strategic Management & Advisory',
            ],
            [
                'key' => 'ephraim_bio_section2_content',
                'value' => 'Ephraim has held critical managerial positions overseeing various audit engagements for private entities, including specialized projects funded by the European Union (EU). His expertise extends to conducting comprehensive due diligence exercises and actively contributing to purchase price allocations, goodwill valuation, and impairment testing across a wide array of entities. As a key contributor to his former firm, Ephraim played a pivotal role in implementing cutting-edge audit software and spearheading the comprehensive revision of audit and quality assurance manuals, demonstrating his commitment to operational excellence and innovation.',
            ],
            [
                'key' => 'ephraim_bio_section3_title',
                'value' => 'Executive & Consulting Leadership',
            ],
            [
                'key' => 'ephraim_bio_section3_content',
                'value' => 'Demonstrating his multifaceted financial acumen, Ephraim served as Chief Financial Officer for a non-audit client, showcasing his ability to translate audit expertise into executive financial leadership. His hands-on experience extends to accounting and consulting assignments where he played crucial roles in complex system implementations. His technical expertise includes successfully migrating accounting records to facilitate the implementation of computerized accounting systems, demonstrating his proficiency in both traditional accounting practices and modern financial technology solutions.',
            ],

            // Education
            [
                'key' => 'ephraim_education1_degree',
                'value' => 'Bachelor\'s Degree in Accountancy',
            ],
            [
                'key' => 'ephraim_education1_institution',
                'value' => 'Far Eastern University',
            ],
            [
                'key' => 'ephraim_education2_degree',
                'value' => '',
            ],
            [
                'key' => 'ephraim_education2_institution',
                'value' => '',
            ],

            // Professional Affiliations
            [
                'key' => 'ephraim_affiliation1_name',
                'value' => 'PICPA',
            ],
            [
                'key' => 'ephraim_affiliation1_description',
                'value' => 'Philippine Institute of Certified Public Accountants',
            ],
            [
                'key' => 'ephraim_affiliation2_name',
                'value' => '',
            ],
            [
                'key' => 'ephraim_affiliation2_description',
                'value' => '',
            ],
            [
                'key' => 'ephraim_affiliation3_name',
                'value' => '',
            ],
            [
                'key' => 'ephraim_affiliation3_description',
                'value' => '',
            ],
            [
                'key' => 'ephraim_affiliation4_name',
                'value' => '',
            ],
            [
                'key' => 'ephraim_affiliation4_description',
                'value' => '',
            ],

            // Industry Expertise
            [
                'key' => 'ephraim_industry1',
                'value' => 'Manufacturing',
            ],
            [
                'key' => 'ephraim_industry2',
                'value' => 'Retail',
            ],
            [
                'key' => 'ephraim_industry3',
                'value' => 'Pharmaceuticals',
            ],
            [
                'key' => 'ephraim_industry4',
                'value' => 'Services',
            ],
            [
                'key' => 'ephraim_industry5',
                'value' => 'Mining',
            ],
            [
                'key' => 'ephraim_industry6',
                'value' => 'Hospitality',
            ],
            [
                'key' => 'ephraim_industry7',
                'value' => 'Real Estate',
            ],
            [
                'key' => 'ephraim_industry8',
                'value' => 'Non-Profit',
            ],

            // Core Competencies
            [
                'key' => 'ephraim_competency1',
                'value' => 'Due Diligence & Valuation',
            ],
            [
                'key' => 'ephraim_competency2',
                'value' => 'Audit Software Implementation',
            ],
            [
                'key' => 'ephraim_competency3',
                'value' => 'Quality Assurance Management',
            ],
            [
                'key' => 'ephraim_competency4',
                'value' => 'Financial System Migration',
            ],
            [
                'key' => 'ephraim_competency5',
                'value' => 'Ethics & Compliance Leadership',
            ],

            // Quote/Philosophy
            [
                'key' => 'ephraim_quote',
                'value' => 'Precision in audit practice stems from unwavering commitment to ethical standards, innovative methodologies, and deep understanding of diverse industry complexities.',
            ],
        ];

        foreach ($ephraimContent as $content) {
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
