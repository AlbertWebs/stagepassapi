<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactDetailsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('contact_details')->delete();

        $records = [
            [
                'contact_section_id' => 1,
                'label' => 'Location',
                'value' => 'Jacaranda Close, Ridgeways, Nairobi, Kenya',
                'icon' => 'MapPin',
                'sort_order' => 1,
            ],
            [
                'contact_section_id' => 1,
                'label' => 'Phone',
                'value' => '+254 729 171 351',
                'icon' => 'Phone',
                'sort_order' => 2,
            ],
            [
                'contact_section_id' => 1,
                'label' => 'Email',
                'value' => 'info@stagepass.co.ke',
                'icon' => 'Mail',
                'sort_order' => 3,
            ],
            [
                'contact_section_id' => 1,
                'label' => 'Business Hours',
                'value' => 'Mon - Fri: 9:00 AM - 6:00 PM
Sat: 10:00 AM - 4:00 PM',
                'icon' => 'Clock',
                'sort_order' => 4,
            ],
        ];

        foreach ($records as $record) {
            DB::table('contact_details')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
