<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavbarSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('navbar_settings')->delete();

        $records = [
            [
                'logo_url' => 'https://stagepass.nuhiluxurytravel.com/uploads/StagePass-LOGO-y.png',
                'favicon_url' => null,
                'cta_label' => 'Get AV Quote',
                'cta_href' => null,
            ],
        ];

        foreach ($records as $record) {
            DB::table('navbar_settings')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
