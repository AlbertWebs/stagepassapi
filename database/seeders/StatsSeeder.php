<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('stats')->delete();

        $records = [
            [
                'stats_section_id' => 1,
                'value' => '43,234',
                'label' => 'AV Equipment',
                'icon' => 'Package',
                'sort_order' => 1,
            ],
            [
                'stats_section_id' => 1,
                'value' => '421',
                'label' => 'Happy Clients',
                'icon' => 'Users',
                'sort_order' => 2,
            ],
            [
                'stats_section_id' => 1,
                'value' => '2,362',
                'label' => 'Events',
                'icon' => 'Calendar',
                'sort_order' => 3,
            ],
        ];

        foreach ($records as $record) {
            DB::table('stats')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
