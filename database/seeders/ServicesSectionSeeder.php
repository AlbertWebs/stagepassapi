<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSectionSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('services_sections')->delete();

        $records = [
            [
                'badge_label' => 'Our Capabilities',
                'title' => 'One-Stop Solution For All Your AV Services',
                'description' => 'From concept to set-up to on-site support, we\'re here every step of the way to deliver the exceptional product and service you deserve.',
                'people_title' => 'Our People',
                'people_description' => 'While we\'ve got the most trusted audiovisual, staging and lighting brands available to you, it is our unparalleled team that will exceed your expectations.',
            ],
        ];

        foreach ($records as $record) {
            DB::table('services_sections')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
