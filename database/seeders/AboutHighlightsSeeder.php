<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutHighlightsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('about_highlights')->delete();

        $records = [
            [
                'about_section_id' => 1,
                'text' => 'Integrated technical consulting',
                'sort_order' => 1,
            ],
            [
                'about_section_id' => 1,
                'text' => 'Professional event planning & design',
                'sort_order' => 2,
            ],
            [
                'about_section_id' => 1,
                'text' => 'Complete implementation support',
                'sort_order' => 3,
            ],
            [
                'about_section_id' => 1,
                'text' => 'Africa-wide operations',
                'sort_order' => 4,
            ],
        ];

        foreach ($records as $record) {
            DB::table('about_highlights')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
