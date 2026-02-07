<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurWorkPageSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('our_work_pages')->delete();

        $records = [
            [
                'title' => 'Our Work - Portfolio | StagePass Audio Visual Projects',
                'meta_description' => 'Explore StagePass Audio Visual\'s portfolio of successful events, corporate productions, and technical installations across Kenya. See our work in action.',
                'meta_keywords' => 'stagepass portfolio, av projects kenya, event case studies, corporate events nairobi, successful av installations, event production examples, stagepass work, av projects showcase, event photography kenya',
                'og_image' => '/uploads/og-portfolio.jpg',
                'hero_title' => 'Our Work & Portfolio',
                'hero_subtitle' => 'Showcasing our successful projects and the exceptional audio-visual experiences we\'ve created for clients across various industries.',
                'content' => '<p>Our portfolio represents a diverse range of successful projects, from intimate corporate gatherings to large-scale public events. Each project showcases our commitment to excellence and attention to detail.</p><p>Browse through our gallery to see how we\'ve helped clients achieve their vision through innovative audio-visual solutions and professional event production.</p>',
            ],
        ];

        foreach ($records as $record) {
            DB::table('our_work_pages')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
