<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavbarLinksSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('navbar_links')->delete();

        $records = [
            [
                'navbar_settings_id' => 1,
                'label' => 'Home',
                'href' => '#home',
                'sort_order' => 1,
            ],
            [
                'navbar_settings_id' => 1,
                'label' => 'About Us',
                'href' => '#about',
                'sort_order' => 2,
            ],
            [
                'navbar_settings_id' => 1,
                'label' => 'Services',
                'href' => '#services',
                'sort_order' => 3,
            ],
            [
                'navbar_settings_id' => 1,
                'label' => 'Our Work',
                'href' => '#portfolio',
                'sort_order' => 4,
            ],
            [
                'navbar_settings_id' => 1,
                'label' => 'Industries',
                'href' => '#industries',
                'sort_order' => 5,
            ],
            [
                'navbar_settings_id' => 1,
                'label' => 'Contact Us',
                'href' => '#contact',
                'sort_order' => 6,
            ],
        ];

        foreach ($records as $record) {
            DB::table('navbar_links')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
