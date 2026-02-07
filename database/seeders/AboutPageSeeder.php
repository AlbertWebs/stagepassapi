<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('about_pages')->delete();

        $records = [
            [
                'title' => 'About Us - StagePass Audio Visual | Professional AV Solutions in Kenya',
                'meta_description' => 'Learn about StagePass Audio Visual, Kenya\'s leading provider of professional audio-visual solutions, event production services, and technical excellence since our founding.',
                'meta_keywords' => 'about stagepass, audio visual company kenya, av solutions nairobi, event production kenya, professional av services, stagepass team, av technology kenya, sound systems kenya, lighting solutions nairobi',
                'og_image' => '/uploads/og-about.jpg',
                'hero_title' => 'About StagePass Audio Visual',
                'hero_subtitle' => 'Delivering exceptional audio-visual experiences with cutting-edge technology and unmatched expertise across Kenya and East Africa.',
                'content' => '<p>StagePass Audio Visual is a premier provider of professional audio-visual solutions, serving clients across Kenya and East Africa. With years of experience in event production, corporate presentations, and technical installations, we bring creativity and technical excellence to every project.</p><p>Our team of skilled professionals is dedicated to delivering exceptional results that exceed expectations. From intimate corporate gatherings to large-scale events, we have the expertise and equipment to make your vision a reality.</p>',
                'image_url' => '/uploads/about-image.jpg',
            ],
        ];

        foreach ($records as $record) {
            DB::table('about_pages')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
