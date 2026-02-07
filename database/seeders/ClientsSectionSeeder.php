<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('clients_sections')->delete();

        $records = [
            [
                'badge_label' => 'The Power Behind Us',
                'title' => 'Our Clients',
                'description' => 'With forward-thinking brands and organizations that demand reliability, creativity, and flawless execution. From corporate leaders to global innovators, our clients trust us to elevate their events.',
            ],
        ];

        foreach ($records as $record) {
            DB::table('clients_sections')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
