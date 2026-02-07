<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BottomNavLinksSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('bottom_nav_links')->delete();

        $records = [
            [
                'label' => 'Home',
                'href' => '#home',
                'icon' => 'Home',
                'sort_order' => 1,
            ],
            [
                'label' => 'About',
                'href' => '#about',
                'icon' => 'Info',
                'sort_order' => 2,
            ],
            [
                'label' => 'Services',
                'href' => '#services',
                'icon' => 'Briefcase',
                'sort_order' => 3,
            ],
            [
                'label' => 'Work',
                'href' => '#portfolio',
                'icon' => 'Camera',
                'sort_order' => 4,
            ],
            [
                'label' => 'Contact',
                'href' => '#contact',
                'icon' => 'Mail',
                'sort_order' => 5,
            ],
        ];

        foreach ($records as $record) {
            DB::table('bottom_nav_links')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
