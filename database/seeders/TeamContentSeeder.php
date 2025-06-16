<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamContentSeeder extends Seeder
{
    public function run()
    {
        $teamContent = [
            // Header Section
            [
                'key' => 'team_main_title',
                'value' => 'People',
            ],
            [
                'key' => 'team_subtitle',
                'value' => '<span>Our Hardworking</span> <span class="description-title">People</span>',
            ],

            // Team Member 1: Emmanuel Y. Mendoza
            [
                'key' => 'team_member1_name',
                'value' => 'Emmanuel Y. Mendoza',
            ],
            [
                'key' => 'team_member1_role',
                'value' => 'Managing Partner',
            ],
            [
                'key' => 'team_member1_slug',
                'value' => 'emmanuel-y-mendoza',
            ],
            [
                'key' => 'team_member1_twitter',
                'value' => '',
            ],
            [
                'key' => 'team_member1_facebook',
                'value' => '',
            ],
            [
                'key' => 'team_member1_instagram',
                'value' => '',
            ],
            [
                'key' => 'team_member1_linkedin',
                'value' => '',
            ],

            // Team Member 2: Ephraim T. Tugano
            [
                'key' => 'team_member2_name',
                'value' => 'Ephraim T. Tugano',
            ],
            [
                'key' => 'team_member2_role',
                'value' => 'Partner',
            ],
            [
                'key' => 'team_member2_slug',
                'value' => 'ephraim-t-tugano',
            ],
            [
                'key' => 'team_member2_twitter',
                'value' => '',
            ],
            [
                'key' => 'team_member2_facebook',
                'value' => '',
            ],
            [
                'key' => 'team_member2_instagram',
                'value' => '',
            ],
            [
                'key' => 'team_member2_linkedin',
                'value' => '',
            ],

            // Team Member 3: Pamela Grace S. Tangso
            [
                'key' => 'team_member3_name',
                'value' => 'Pamela Grace S. Tangso',
            ],
            [
                'key' => 'team_member3_role',
                'value' => 'Partner',
            ],
            [
                'key' => 'team_member3_slug',
                'value' => 'pamela-grace-s-tangso',
            ],
            [
                'key' => 'team_member3_twitter',
                'value' => '',
            ],
            [
                'key' => 'team_member3_facebook',
                'value' => '',
            ],
            [
                'key' => 'team_member3_instagram',
                'value' => '',
            ],
            [
                'key' => 'team_member3_linkedin',
                'value' => '',
            ],

            // Team Member 4: Jekell G. Salosagcol
            [
                'key' => 'team_member4_name',
                'value' => 'Jekell G. Salosagcol',
            ],
            [
                'key' => 'team_member4_role',
                'value' => 'External Quality Assurance Consultant',
            ],
            [
                'key' => 'team_member4_slug',
                'value' => 'jekell-g-salosagcol',
            ],
            [
                'key' => 'team_member4_twitter',
                'value' => '',
            ],
            [
                'key' => 'team_member4_facebook',
                'value' => '',
            ],
            [
                'key' => 'team_member4_instagram',
                'value' => '',
            ],
            [
                'key' => 'team_member4_linkedin',
                'value' => '',
            ],
        ];

        foreach ($teamContent as $content) {
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
