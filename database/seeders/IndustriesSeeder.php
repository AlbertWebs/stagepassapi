<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        // Create or update industries section
        $industriesSection = DB::table('industries_sections')->where('id', 1)->first();
        
        if ($industriesSection) {
            // Update existing section
            DB::table('industries_sections')->where('id', 1)->update([
                'title' => 'Industries We Serve',
                'subtitle' => 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.',
                'updated_at' => $now,
            ]);
            $industriesSectionId = $industriesSection->id;
        } else {
            // Create new section
            $industriesSectionId = DB::table('industries_sections')->insertGetId([
                'title' => 'Industries We Serve',
                'subtitle' => 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Clear existing industries for this section
        DB::table('industries')->where('industries_section_id', $industriesSectionId)->delete();

        $industries = [
            [
                'title' => 'Corporate & Business Events',
                'description' => 'Professional audio-visual solutions for corporate gatherings, conferences, and business events.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-1.5 text-xs">Services include:</p><ul class="list-disc list-inside mb-2 space-y-0.5 text-xs"><li>Conferences & summits</li><li>Product launches</li><li>AGMs & shareholder meetings</li><li>Award ceremonies</li><li>Team-building events</li></ul><p class="font-semibold text-yellow-400 mb-1 text-xs">AV Needs:</p><p class="text-xs">Sound systems, LED screens, stage lighting, live streaming, interpretation systems</p></div>',
                'icon_name' => 'Building2',
            ],
            [
                'title' => 'Entertainment & Live Shows',
                'description' => 'Immersive audio-visual experiences for concerts, festivals, and live performances.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-1.5 text-xs">Services include:</p><ul class="list-disc list-inside mb-2 space-y-0.5 text-xs"><li>Concerts & music festivals</li><li>Comedy shows</li><li>Theatre productions</li><li>Cultural performances</li></ul><p class="font-semibold text-yellow-400 mb-1 text-xs">AV Needs:</p><p class="text-xs">Line array sound systems, moving lights, LED backdrops, special effects, stage design</p></div>',
                'icon_name' => 'Music',
            ],
            [
                'title' => 'Exhibitions & Trade Shows',
                'description' => 'Engaging displays and interactive solutions for exhibitions and trade shows.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-1.5 text-xs">Services include:</p><ul class="list-disc list-inside mb-2 space-y-0.5 text-xs"><li>Exhibition stands</li><li>Product demo booths</li><li>Brand activations</li><li>Expo pavilions</li></ul><p class="font-semibold text-yellow-400 mb-1 text-xs">AV Needs:</p><p class="text-xs">Touch screens, video walls, digital signage, interactive displays, booth lighting</p></div>',
                'icon_name' => 'Clapperboard',
            ],
            [
                'title' => 'Education & Training',
                'description' => 'Comprehensive AV solutions for educational institutions and training centers.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-1.5 text-xs">Services include:</p><ul class="list-disc list-inside mb-2 space-y-0.5 text-xs"><li>University lecture halls</li><li>Training centers</li><li>E-learning environments</li><li>Graduation ceremonies</li></ul><p class="font-semibold text-yellow-400 mb-1 text-xs">AV Needs:</p><p class="text-xs">Projectors, smart boards, recording systems, lecture capture, hybrid learning setups</p></div>',
                'icon_name' => 'Building2',
            ],
            [
                'title' => 'Religious Institutions',
                'description' => 'Professional AV systems for worship services, conferences, and religious events.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-1.5 text-xs">Services include:</p><ul class="list-disc list-inside mb-2 space-y-0.5 text-xs"><li>Weekly worship services</li><li>Conferences & crusades</li><li>Religious festivals</li></ul><p class="font-semibold text-yellow-400 mb-1 text-xs">AV Needs:</p><p class="text-xs">Installed sound systems, IMAG screens, stage lighting, live broadcast systems</p></div>',
                'icon_name' => 'Building2',
            ],
            [
                'title' => 'Hospitality & Tourism',
                'description' => 'Elegant AV solutions for hotels, resorts, and destination events.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-1.5 text-xs">Services include:</p><ul class="list-disc list-inside mb-2 space-y-0.5 text-xs"><li>Hotel conferences</li><li>Destination weddings</li><li>Gala dinners</li><li>Resort entertainment</li></ul><p class="font-semibold text-yellow-400 mb-1 text-xs">AV Needs:</p><p class="text-xs">Ballroom AV, ambient lighting, outdoor sound systems, projection mapping</p></div>',
                'icon_name' => 'Gem',
            ],
            [
                'title' => 'Healthcare & Medical',
                'description' => 'Specialized AV solutions for medical conferences and healthcare facilities.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-1.5 text-xs">Services include:</p><ul class="list-disc list-inside mb-2 space-y-0.5 text-xs"><li>Medical conferences</li><li>Hospital auditoriums</li><li>Surgical training broadcasts</li></ul><p class="font-semibold text-yellow-400 mb-1 text-xs">AV Needs:</p><p class="text-xs">Presentation systems, live surgery streaming, recording systems, interpretation systems</p></div>',
                'icon_name' => 'Building2',
            ],
            [
                'title' => 'Government & Public Sector',
                'description' => 'Large-scale AV solutions for government functions and public events.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-1.5 text-xs">Services include:</p><ul class="list-disc list-inside mb-2 space-y-0.5 text-xs"><li>National celebrations</li><li>Policy summits</li><li>State functions</li><li>Public forums</li></ul><p class="font-semibold text-yellow-400 mb-1 text-xs">AV Needs:</p><p class="text-xs">Large-scale sound systems, LED screens, live broadcasting, security-compliant AV solutions</p></div>',
                'icon_name' => 'Building2',
            ],
            [
                'title' => 'Retail & Brand Experiences',
                'description' => 'Dynamic displays and interactive experiences for retail and brand activations.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-1.5 text-xs">Services include:</p><ul class="list-disc list-inside mb-2 space-y-0.5 text-xs"><li>Store launches</li><li>Mall activations</li><li>Pop-up brand experiences</li></ul><p class="font-semibold text-yellow-400 mb-1 text-xs">AV Needs:</p><p class="text-xs">Digital signage, LED displays, interactive screens, ambient lighting</p></div>',
                'icon_name' => 'Palette',
            ],
            [
                'title' => 'Media, Film & Broadcasting',
                'description' => 'Professional studio and broadcast solutions for media production.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-1.5 text-xs">Services include:</p><ul class="list-disc list-inside mb-2 space-y-0.5 text-xs"><li>TV studios</li><li>Podcast studios</li><li>Film premieres</li><li>Live broadcasts</li></ul><p class="font-semibold text-yellow-400 mb-1 text-xs">AV Needs:</p><p class="text-xs">Studio lighting, broadcast cameras, control rooms, virtual sets, streaming systems</p></div>',
                'icon_name' => 'Clapperboard',
            ],
        ];

        foreach ($industries as $index => $industry) {
            DB::table('industries')->insert([
                'industries_section_id' => $industriesSectionId,
                'title' => $industry['title'],
                'description' => $industry['description'],
                'overlay_description' => $industry['overlay_description'] ?? null,
                'icon_name' => $industry['icon_name'] ?? null,
                'icon_url' => $industry['icon_url'] ?? null,
                'image_url' => $industry['image_url'] ?? null,
                'video_url' => $industry['video_url'] ?? null,
                'link_url' => $industry['link_url'] ?? null,
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
