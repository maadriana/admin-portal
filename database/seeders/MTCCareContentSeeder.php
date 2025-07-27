<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MTCCareContentSeeder extends Seeder
{
    public function run()
    {
        $mtcCareContent = [
            // MTC Care Main Section
            [
                'key' => 'mtc_care_title',
                'value' => 'MTC CARE',
            ],
            [
                'key' => 'mtc_care_subtitle',
                'value' => '<span>Corporate Social</span> <span class="description-title">Responsibility & Galleries</span>',
            ],

            // CSR Card
            [
                'key' => 'mtc_care_csr_title',
                'value' => 'Corporate Social Responsibility',
            ],
            [
                'key' => 'mtc_care_csr_description',
                'value' => 'Our CSR programs reflect our values of service, compassion, and shared growth. We support causes that promote education, environmental sustainability, financial literacy, and community welfare. Whether it\'s organizing donation drives, tree-planting, or community outreach, we take pride in giving back.',
            ],

            // Galleries Card
            [
                'key' => 'mtc_care_galleries_title',
                'value' => 'Galleries',
            ],
            [
                'key' => 'mtc_care_galleries_description',
                'value' => 'Explore our visual showcase of CSR events, milestones, and team stories. From outreach missions to firm-wide celebrations, these moments capture the heart and passion of MTC.',
            ],

            // CSR Content
            [
                'key' => 'csr_hero_title',
                'value' => 'Corporate<br><span style="font-weight: 600; color: #326D78;">Social Responsibility</span>',
            ],
            [
                'key' => 'csr_hero_subtitle',
                'value' => 'At MTC, we believe that true success goes beyond financial results. Through MTC CARE, we are committed to making a positive and lasting impact.',
            ],
            [
                'key' => 'csr_cta_overview',
                'value' => 'Our Philosophy',
            ],
            [
                'key' => 'csr_cta_programs',
                'value' => 'Our Programs',
            ],
            [
                'key' => 'csr_overview_badge',
                'value' => 'Our Philosophy',
            ],
            [
                'key' => 'csr_overview_title',
                'value' => 'Beyond Financial Success',
            ],
            [
                'key' => 'csr_overview_paragraph1',
                'value' => 'At MTC, we believe that true success goes beyond financial results. Through MTC CARE, our Corporate Social Responsibility (CSR) initiative, we are committed to making a positive and lasting impact on our communities, our people, and the environment.',
            ],
            [
                'key' => 'csr_overview_paragraph2',
                'value' => '"MTC CARE is more than a program. It\'s our way of expressing gratitude and giving purpose to our profession."',
            ],
            [
                'key' => 'csr_programs_badge',
                'value' => 'Our Impact Areas',
            ],
            [
                'key' => 'csr_programs_title',
                'value' => 'How We Make a Difference',
            ],
            [
                'key' => 'csr_programs_description',
                'value' => 'Our CSR programs reflect our values of service, compassion, and shared growth. We support causes that promote education, environmental sustainability, financial literacy, and community welfare.',
            ],

            // Education Program
            [
                'key' => 'csr_education_title',
                'value' => 'Education',
            ],
            [
                'key' => 'csr_education_description',
                'value' => 'We support causes that promote education and financial literacy through meaningful community partnerships and educational initiatives.',
            ],
            [
                'key' => 'csr_education_focus',
                'value' => 'Educational outreach and literacy programs',
            ],

            // Environmental Program
            [
                'key' => 'csr_environment_title',
                'value' => 'Environmental Sustainability',
            ],
            [
                'key' => 'csr_environment_description',
                'value' => 'We participate in tree-planting activities and environmental conservation efforts to contribute to a more sustainable future.',
            ],
            [
                'key' => 'csr_environment_focus',
                'value' => 'Tree planting and conservation activities',
            ],

            // Community Program
            [
                'key' => 'csr_community_title',
                'value' => 'Community Welfare',
            ],
            [
                'key' => 'csr_community_description',
                'value' => 'Whether it\'s organizing donation drives, participating in tree-planting activities, or supporting local and non-profit communities, we take pride in being a firm that gives back. Through these initiatives, we aim to uplift lives and contribute to a more sustainable and inclusive future.',
            ],
            [
                'key' => 'csr_community_donation',
                'value' => 'Donation Drives',
            ],
            [
                'key' => 'csr_community_support',
                'value' => 'Non-profit Support',
            ],

            // Galleries Content
            [
                'key' => 'galleries_hero_title',
                'value' => 'Galleries',
            ],
            [
                'key' => 'galleries_hero_subtitle',
                'value' => 'Moments that matter deserve to be shared. Discover our visual showcase of CSR activities, team events, and community engagements.',
            ],
            [
                'key' => 'galleries_cta_csr',
                'value' => 'CSR Activities',
            ],
            [
                'key' => 'galleries_cta_team',
                'value' => 'Team Events',
            ],
            [
                'key' => 'galleries_overview_badge',
                'value' => 'Visual Showcase',
            ],
            [
                'key' => 'galleries_overview_title',
                'value' => 'Capturing Our Journey',
            ],
            [
                'key' => 'galleries_overview_paragraph1',
                'value' => 'In this section, you\'ll find a visual showcase of our CSR activities, team-building events, firm milestones, and community engagements.',
            ],
            [
                'key' => 'galleries_overview_paragraph2',
                'value' => 'From outreach missions and volunteer efforts to company celebrations and employee-led initiatives, our gallery highlights the heart of MTC, our people and their passion for making a difference.',
            ],

            // CSR Gallery Section
            [
                'key' => 'csr_gallery_badge',
                'value' => 'CSR Activities',
            ],
            [
                'key' => 'csr_gallery_title',
                'value' => 'CSR Activities & Community Outreach',
            ],
            [
                'key' => 'csr_gallery_description',
                'value' => 'Our commitment to social responsibility through various community programs and environmental initiatives.',
            ],
            [
                'key' => 'csr_gallery_item1_title',
                'value' => 'Medical Mission',
            ],
            [
                'key' => 'csr_gallery_item2_title',
                'value' => 'Tree Planting Activity',
            ],
            [
                'key' => 'csr_gallery_item3_title',
                'value' => 'Scholarship Program',
            ],

            // Team Gallery Section
            [
                'key' => 'team_gallery_badge',
                'value' => 'Team Events',
            ],
            [
                'key' => 'team_gallery_title',
                'value' => 'Team Building & Company Events',
            ],
            [
                'key' => 'team_gallery_description',
                'value' => 'Celebrating milestones, building relationships, and fostering the MTC family spirit through memorable events and activities.',
            ],
            [
                'key' => 'team_gallery_item1_title',
                'value' => 'Annual Company Celebration',
            ],
            [
                'key' => 'team_gallery_item2_title',
                'value' => 'Team Building Activities',
            ],

            // Gallery Image Placeholders (will be empty until uploaded)
            [
                'key' => 'csr_gallery_image1',
                'value' => '',
            ],
            [
                'key' => 'csr_gallery_image2',
                'value' => '',
            ],
            [
                'key' => 'csr_gallery_image3',
                'value' => '',
            ],
            [
                'key' => 'csr_gallery_image4',
                'value' => '',
            ],
            [
                'key' => 'team_gallery_image1',
                'value' => '',
            ],
            [
                'key' => 'team_gallery_image2',
                'value' => '',
            ],
            [
                'key' => 'team_gallery_image3',
                'value' => '',
            ],
        ];

        foreach ($mtcCareContent as $content) {
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
