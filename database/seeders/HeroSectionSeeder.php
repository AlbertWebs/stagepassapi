<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('hero_sections')->delete();

        $records = [
            [
                'headline' => 'We Create the Most Engaging Events in the World Using Technology',
                'background_video_url' => 'https://api.stagepass.co.ke/uploads/stagepass-audio-visual-safaricom-ceo-awade.mp4',
                'thumbnail_url' => 'uploads/1770274880_6984404038b84.webp',
            ],
        ];

        foreach ($records as $record) {
            DB::table('hero_sections')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
