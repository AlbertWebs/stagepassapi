<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSocialLinksSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('footer_social_links')->delete();

        $records = [
            [
                'footer_settings_id' => 1,
                'platform' => 'Facebook',
                'url' => '#',
                'sort_order' => 1,
            ],
            [
                'footer_settings_id' => 1,
                'platform' => 'Twitter',
                'url' => '#',
                'sort_order' => 2,
            ],
            [
                'footer_settings_id' => 1,
                'platform' => 'Instagram',
                'url' => '#',
                'sort_order' => 3,
            ],
            [
                'footer_settings_id' => 1,
                'platform' => 'Linkedin',
                'url' => '#',
                'sort_order' => 4,
            ],
            [
                'footer_settings_id' => 1,
                'platform' => 'Youtube',
                'url' => '#',
                'sort_order' => 5,
            ],
        ];

        foreach ($records as $record) {
            DB::table('footer_social_links')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
