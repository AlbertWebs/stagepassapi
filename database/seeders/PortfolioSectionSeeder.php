<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('portfolio_sections')->delete();

        $records = [
            [
                'badge_label' => 'Our Work',
                'title' => 'Portfolio Gallery',
                'description' => 'Explore our recent projects and see how we bring events to life with cutting-edge technology and creative excellence.',
            ],
        ];

        foreach ($records as $record) {
            DB::table('portfolio_sections')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
