<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesPageSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('industries_pages')->delete();

        $records = [
            [
                'title' => 'Industries We Serve - AV Solutions for Every Sector | StagePass',
                'meta_description' => 'StagePass provides specialized audio-visual solutions for corporate, entertainment, education, healthcare, hospitality, and government sectors across Kenya.',
                'meta_keywords' => 'corporate av solutions, entertainment industry kenya, education technology, healthcare av systems, hospitality av services, government events kenya, sector-specific av solutions, industry av services nairobi',
                'og_image' => '/uploads/og-industries.jpg',
                'hero_title' => 'Industries We Serve',
                'hero_subtitle' => 'Specialized audio-visual solutions tailored to the unique needs of different industries and sectors.',
                'content' => '<p>StagePass serves a diverse range of industries, each with unique audio-visual requirements. From corporate boardrooms to entertainment venues, educational institutions to healthcare facilities, we understand the specific needs of each sector.</p><p>Our industry expertise allows us to deliver solutions that not only meet technical requirements but also align with industry standards and best practices.</p>',
            ],
        ];

        foreach ($records as $record) {
            DB::table('industries_pages')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
