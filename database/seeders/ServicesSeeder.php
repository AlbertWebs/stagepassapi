<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('services')->delete();

        $records = [
            [
                'services_section_id' => 1,
                'title' => 'Full Production and  Event Packages',
                'description' => 'Complete event production services from start to finish, handling all technical needs.',
                'icon' => 'Box',
                'gradient' => 'from-yellow-400 to-yellow-600',
                'sort_order' => 1,
            ],
            [
                'services_section_id' => 1,
                'title' => 'Visual',
                'description' => 'Stunning visual displays with cutting-edge screen technology and sharp imagery.',
                'icon' => 'Monitor',
                'gradient' => 'from-[#172455] to-[#1e3a8a]',
                'sort_order' => 2,
            ],
            [
                'services_section_id' => 1,
                'title' => 'Staging Services',
                'description' => 'Safe and creative staging solutions for any event requirement.',
                'icon' => 'Stage',
                'gradient' => 'from-yellow-400 to-yellow-600',
                'sort_order' => 3,
            ],
            [
                'services_section_id' => 1,
                'title' => 'Lighting',
                'description' => 'Intelligent lighting design that creates emotion through color, texture and movement.',
                'icon' => 'Lightbulb',
                'gradient' => 'from-[#172455] to-[#1e3a8a]',
                'sort_order' => 4,
            ],
            [
                'services_section_id' => 1,
                'title' => 'Rigging & Truss Services',
                'description' => 'Professional rigging and truss services with legal and technical compliance.',
                'icon' => 'Grid3x3',
                'gradient' => 'from-yellow-400 to-yellow-600',
                'sort_order' => 5,
            ],
            [
                'services_section_id' => 1,
                'title' => 'Graphics',
                'description' => 'Eye-catching visual content including signs, posters, and printed materials.',
                'icon' => 'Palette',
                'gradient' => 'from-[#172455] to-[#1e3a8a]',
                'sort_order' => 6,
            ],
            [
                'services_section_id' => 1,
                'title' => 'Audio',
                'description' => 'Crystal clear sound systems with complex control and diverse inputs.',
                'icon' => 'Volume2',
                'gradient' => 'from-yellow-400 to-yellow-600',
                'sort_order' => 7,
            ],
            [
                'services_section_id' => 1,
                'title' => 'Design Services',
                'description' => 'Flawless design planning for lighting, staging, audio and overall event aesthetics.',
                'icon' => 'PenTool',
                'gradient' => 'from-[#172455] to-[#1e3a8a]',
                'sort_order' => 8,
            ],
            [
                'services_section_id' => 1,
                'title' => 'Equipment Rentals & Sales',
                'description' => 'Massive inventory of the best audiovisual technology available for rent or purchase.',
                'icon' => 'Package',
                'gradient' => 'from-yellow-400 to-yellow-600',
                'sort_order' => 9,
            ],
        ];

        foreach ($records as $record) {
            DB::table('services')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
