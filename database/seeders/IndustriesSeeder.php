<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('industries')->delete();

        $records = [
            [
                'industries_section_id' => 1,
                'title' => 'Corporate & Business Events',
                'description' => 'Professional audio-visual solutions for corporate gatherings, conferences, and business events.',
                'overlay_description' => '<div class=\"text-left\"><p class=\"text-[#172455] mb-1.5 text-xs\" style=\"font-weight: 700;\">Services include:</p><ul class=\"list-disc list-inside mb-2 space-y-0.5 text-xs\"><li>Conferences & summits</li><li>Product launches</li><li>AGMs & shareholder meetings</li><li>Award ceremonies</li><li>Team-building events</li></ul><p class=\"text-[#172455] mb-1 text-xs\" style=\"font-weight: 700;\">AV Needs:</p><p class=\"text-xs\">Sound systems, LED screens, stage lighting, live streaming, interpretation systems</p></div>',
                'icon_name' => 'Building2',
                'icon_url' => null,
                'image_url' => null,
                'video_url' => null,
                'link_url' => null,
                'sort_order' => 1,
            ],
            [
                'industries_section_id' => 1,
                'title' => 'Entertainment & Live Shows',
                'description' => 'Immersive audio-visual experiences for concerts, festivals, and live performances.',
                'overlay_description' => '<div class=\"text-left\"><p class=\"text-[#172455] mb-1.5 text-xs\" style=\"font-weight: 700;\">Services include:</p><ul class=\"list-disc list-inside mb-2 space-y-0.5 text-xs\"><li>Concerts & music festivals</li><li>Comedy shows</li><li>Theatre productions</li><li>Cultural performances</li></ul><p class=\"text-[#172455] mb-1 text-xs\" style=\"font-weight: 700;\">AV Needs:</p><p class=\"text-xs\">Line array sound systems, moving lights, LED backdrops, special effects, stage design</p></div>',
                'icon_name' => 'Music',
                'icon_url' => null,
                'image_url' => null,
                'video_url' => null,
                'link_url' => null,
                'sort_order' => 2,
            ],
            [
                'industries_section_id' => 1,
                'title' => 'Exhibitions & Trade Shows',
                'description' => 'Engaging displays and interactive solutions for exhibitions and trade shows.',
                'overlay_description' => '<div class=\"text-left\"><p class=\"text-[#172455] mb-1.5 text-xs\" style=\"font-weight: 700;\">Services include:</p><ul class=\"list-disc list-inside mb-2 space-y-0.5 text-xs\"><li>Exhibition stands</li><li>Product demo booths</li><li>Brand activations</li><li>Expo pavilions</li></ul><p class=\"text-[#172455] mb-1 text-xs\" style=\"font-weight: 700;\">AV Needs:</p><p class=\"text-xs\">Touch screens, video walls, digital signage, interactive displays, booth lighting</p></div>',
                'icon_name' => 'Clapperboard',
                'icon_url' => null,
                'image_url' => null,
                'video_url' => null,
                'link_url' => null,
                'sort_order' => 3,
            ],
            [
                'industries_section_id' => 1,
                'title' => 'Education & Training',
                'description' => 'Comprehensive AV solutions for educational institutions and training centers.',
                'overlay_description' => '<div class=\"text-left\"><p class=\"text-[#172455] mb-1.5 text-xs\" style=\"font-weight: 700;\">Services include:</p><ul class=\"list-disc list-inside mb-2 space-y-0.5 text-xs\"><li>University lecture halls</li><li>Training centers</li><li>E-learning environments</li><li>Graduation ceremonies</li></ul><p class=\"text-[#172455] mb-1 text-xs\" style=\"font-weight: 700;\">AV Needs:</p><p class=\"text-xs\">Projectors, smart boards, recording systems, lecture capture, hybrid learning setups</p></div>',
                'icon_name' => 'Building2',
                'icon_url' => null,
                'image_url' => null,
                'video_url' => null,
                'link_url' => null,
                'sort_order' => 4,
            ],
            [
                'industries_section_id' => 1,
                'title' => 'Religious Institutions',
                'description' => 'Professional AV systems for worship services, conferences, and religious events.',
                'overlay_description' => '<div class=\"text-left\"><p class=\"text-[#172455] mb-1.5 text-xs\" style=\"font-weight: 700;\">Services include:</p><ul class=\"list-disc list-inside mb-2 space-y-0.5 text-xs\"><li>Weekly worship services</li><li>Conferences & crusades</li><li>Religious festivals</li></ul><p class=\"text-[#172455] mb-1 text-xs\" style=\"font-weight: 700;\">AV Needs:</p><p class=\"text-xs\">Installed sound systems, IMAG screens, stage lighting, live broadcast systems</p></div>',
                'icon_name' => 'Building2',
                'icon_url' => null,
                'image_url' => null,
                'video_url' => null,
                'link_url' => null,
                'sort_order' => 5,
            ],
            [
                'industries_section_id' => 1,
                'title' => 'Hospitality & Tourism',
                'description' => 'Elegant AV solutions for hotels, resorts, and destination events.',
                'overlay_description' => '<div class=\"text-left\"><p class=\"text-[#172455] mb-1.5 text-xs\" style=\"font-weight: 700;\">Services include:</p><ul class=\"list-disc list-inside mb-2 space-y-0.5 text-xs\"><li>Hotel conferences</li><li>Destination weddings</li><li>Gala dinners</li><li>Resort entertainment</li></ul><p class=\"text-[#172455] mb-1 text-xs\" style=\"font-weight: 700;\">AV Needs:</p><p class=\"text-xs\">Ballroom AV, ambient lighting, outdoor sound systems, projection mapping</p></div>',
                'icon_name' => 'Gem',
                'icon_url' => null,
                'image_url' => null,
                'video_url' => null,
                'link_url' => null,
                'sort_order' => 6,
            ],
            [
                'industries_section_id' => 1,
                'title' => 'Healthcare & Medical',
                'description' => 'Specialized AV solutions for medical conferences and healthcare facilities.',
                'overlay_description' => '<div class=\"text-left\"><p class=\"text-[#172455] mb-1.5 text-xs\" style=\"font-weight: 700;\">Services include:</p><ul class=\"list-disc list-inside mb-2 space-y-0.5 text-xs\"><li>Medical conferences</li><li>Hospital auditoriums</li><li>Surgical training broadcasts</li></ul><p class=\"text-[#172455] mb-1 text-xs\" style=\"font-weight: 700;\">AV Needs:</p><p class=\"text-xs\">Presentation systems, live surgery streaming, recording systems, interpretation systems</p></div>',
                'icon_name' => 'Building2',
                'icon_url' => null,
                'image_url' => null,
                'video_url' => null,
                'link_url' => null,
                'sort_order' => 7,
            ],
            [
                'industries_section_id' => 1,
                'title' => 'Government & Public Sector',
                'description' => 'Large-scale AV solutions for government functions and public events.',
                'overlay_description' => '<div class=\"text-left\"><p class=\"text-[#172455] mb-1.5 text-xs\" style=\"font-weight: 700;\">Services include:</p><ul class=\"list-disc list-inside mb-2 space-y-0.5 text-xs\"><li>National celebrations</li><li>Policy summits</li><li>State functions</li><li>Public forums</li></ul><p class=\"text-[#172455] mb-1 text-xs\" style=\"font-weight: 700;\">AV Needs:</p><p class=\"text-xs\">Large-scale sound systems, LED screens, live broadcasting, security-compliant AV solutions</p></div>',
                'icon_name' => 'Building2',
                'icon_url' => null,
                'image_url' => null,
                'video_url' => null,
                'link_url' => null,
                'sort_order' => 8,
            ],
            [
                'industries_section_id' => 1,
                'title' => 'Retail & Brand Experiences',
                'description' => 'Dynamic displays and interactive experiences for retail and brand activations.',
                'overlay_description' => '<div class=\"text-left\"><p class=\"text-[#172455] mb-1.5 text-xs\" style=\"font-weight: 700;\">Services include:</p><ul class=\"list-disc list-inside mb-2 space-y-0.5 text-xs\"><li>Store launches</li><li>Mall activations</li><li>Pop-up brand experiences</li></ul><p class=\"text-[#172455] mb-1 text-xs\" style=\"font-weight: 700;\">AV Needs:</p><p class=\"text-xs\">Digital signage, LED displays, interactive screens, ambient lighting</p></div>',
                'icon_name' => 'Palette',
                'icon_url' => null,
                'image_url' => null,
                'video_url' => null,
                'link_url' => null,
                'sort_order' => 9,
            ],
            [
                'industries_section_id' => 1,
                'title' => 'Media, Film & Broadcasting',
                'description' => 'Professional studio and broadcast solutions for media production.',
                'overlay_description' => '<div class=\"text-left\"><p class=\"text-[#172455] mb-1.5 text-xs\" style=\"font-weight: 700;\">Services include:</p><ul class=\"list-disc list-inside mb-2 space-y-0.5 text-xs\"><li>TV studios</li><li>Podcast studios</li><li>Film premieres</li><li>Live broadcasts</li></ul><p class=\"text-[#172455] mb-1 text-xs\" style=\"font-weight: 700;\">AV Needs:</p><p class=\"text-xs\">Studio lighting, broadcast cameras, control rooms, virtual sets, streaming systems</p></div>',
                'icon_name' => 'Clapperboard',
                'icon_url' => null,
                'image_url' => null,
                'video_url' => null,
                'link_url' => null,
                'sort_order' => 10,
            ],
        ];

        foreach ($records as $record) {
            DB::table('industries')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
