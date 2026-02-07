<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('industries_sections')->delete();

        $records = [
            [
                'title' => 'Industries We Serve',
                'subtitle' => 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.',
            ],
        ];

        foreach ($records as $record) {
            DB::table('industries_sections')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
