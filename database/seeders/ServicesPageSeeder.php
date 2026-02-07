<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesPageSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('services_pages')->delete();

        $records = [
            [
                'title' => 'Our Services - Professional AV Solutions | StagePass Audio Visual',
                'meta_description' => 'Comprehensive audio-visual services including sound systems, lighting, video production, event staging, and technical support for corporate events, conferences, and live productions in Kenya.',
                'meta_keywords' => 'av services kenya, sound systems nairobi, event lighting kenya, video production services, corporate av solutions, live event production, stage setup kenya, audio visual rental, av equipment kenya, event technology services',
                'og_image' => '/uploads/og-services.jpg',
                'hero_title' => 'Our Professional AV Services',
                'hero_subtitle' => 'Comprehensive audio-visual solutions tailored to your event needs, from corporate presentations to large-scale productions.',
                'content' => '<p>StagePass offers a complete range of audio-visual services designed to elevate your events. Our services include professional sound systems, state-of-the-art lighting solutions, high-definition video production, and comprehensive event staging.</p><p>Whether you\'re hosting a corporate conference, product launch, concert, or private event, we provide the technology and expertise to ensure flawless execution.</p>',
            ],
        ];

        foreach ($records as $record) {
            DB::table('services_pages')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
