<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('about_sections')->delete();

        $records = [
            [
                'badge_label' => 'About Us',
                'title' => 'Who We Are',
                'description_primary' => 'StagePass Audio-Visual Limited is an integrated technical, consulting, planning, design and implementation provider for professional event planning and design based in Nairobi and operating within Africa. <br><br> We specialize in rentals of audio-visual technology including sound, screens, lighting, content management, digital and Interactive technology and scenic design.',
                'description_secondary' => null,
                'image_url' => 'uploads/1770219282_6983671296d2b.jpg',
                'stat_value' => '2362+',
                'stat_label' => 'Successful Events',
                'button_label' => 'Learn More About Us',
                'vision_title' => 'Our Vision',
                'vision_text' => 'TO BE AFRICA\'S REVOLUTIONARY EVENTS TECHNOLOGY EXPERTS',
            ],
        ];

        foreach ($records as $record) {
            DB::table('about_sections')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
