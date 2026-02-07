<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioItemsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('portfolio_items')->delete();

        $records = [
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/1.jpg',
                'title' => 'Corporate Event 2024',
                'youtube_id' => null,
                'sort_order' => 1,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/2.jpg',
                'title' => 'Concert Production',
                'youtube_id' => null,
                'sort_order' => 2,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/3.jpg',
                'title' => 'Festival Setup',
                'youtube_id' => null,
                'sort_order' => 3,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'video',
                'thumbnail' => 'uploads/portfolio/4.jpg',
                'title' => 'Stage Lighting Design',
                'youtube_id' => 'sJSNvegZDoI',
                'sort_order' => 4,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/5.jpg',
                'title' => 'Audio Visual Setup',
                'youtube_id' => null,
                'sort_order' => 5,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/6.jpg',
                'title' => 'Conference Production',
                'youtube_id' => null,
                'sort_order' => 6,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/7.jpg',
                'title' => 'Exhibition Event',
                'youtube_id' => null,
                'sort_order' => 7,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/8.jpg',
                'title' => 'Gala Dinner Setup',
                'youtube_id' => null,
                'sort_order' => 8,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/9.jpg',
                'title' => 'New Portfolio Item 1',
                'youtube_id' => null,
                'sort_order' => 9,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/10.jpg',
                'title' => 'New Portfolio Item 2',
                'youtube_id' => null,
                'sort_order' => 10,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/11.jpg',
                'title' => 'New Portfolio Item 3',
                'youtube_id' => null,
                'sort_order' => 11,
            ],
            [
                'portfolio_section_id' => 1,
                'type' => 'image',
                'thumbnail' => 'uploads/portfolio/12.jpg',
                'title' => 'New Portfolio Item 4',
                'youtube_id' => null,
                'sort_order' => 12,
            ],
        ];

        foreach ($records as $record) {
            DB::table('portfolio_items')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
