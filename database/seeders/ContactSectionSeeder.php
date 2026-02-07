<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('contact_sections')->delete();

        $records = [
            [
                'badge_label' => 'Get In Touch',
                'title' => 'Let\'s Create Something Amazing Together',
                'subtitle' => null,
                'description' => 'Ready to elevate your next event? Contact us today for a quote or consultation.',
            ],
        ];

        foreach ($records as $record) {
            DB::table('contact_sections')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
