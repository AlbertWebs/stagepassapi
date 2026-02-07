<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatsSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('stats_sections')->delete();

        $records = [
            [
                'headline' => 'Sound reinforcement for 70,000 pax during',
                'subheadline' => 'EVERTON VS KARIOBANGI SHARKS Football Match',
                'background_video_url' => 'https://api.stagepass.co.ke/uploads/video/zuchu.mp4',
            ],
        ];

        foreach ($records as $record) {
            DB::table('stats_sections')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
