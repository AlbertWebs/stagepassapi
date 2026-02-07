<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Clear existing records
        DB::table('site_settings')->delete();

        $records = [
            [
                'key' => 'portfolio_source',
                'value' => 'instagram',
            ],
            [
                'key' => 'site_name',
                'value' => 'StagePass Audio Visual',
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Creative Solutions • Technical Excellence',
            ],
            [
                'key' => 'website_url',
                'value' => 'https://stagepass.co.ke',
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@stagepass.co.ke',
            ],
            [
                'key' => 'support_email',
                'value' => 'info@stagepass.co.ke',
            ],
            [
                'key' => 'contact_phone_primary',
                'value' => '+254 729 171 351',
            ],
            [
                'key' => 'contact_phone_secondary',
                'value' => null,
            ],
            [
                'key' => 'whatsapp_number',
                'value' => null,
            ],
            [
                'key' => 'contact_address',
                'value' => 'Jacaranda Close, Ridgeways,
Nairobi, Kenya',
            ],
            [
                'key' => 'business_hours',
                'value' => 'Mon - Fri: 9:00 AM - 6:00 PM
Sat: 10:00 AM - 4:00 PM',
            ],
            [
                'key' => 'facebook_url',
                'value' => 'https://www.facebook.com/stagepassAv/',
            ],
            [
                'key' => 'twitter_url',
                'value' => 'https://twitter.com/stagepassav',
            ],
            [
                'key' => 'instagram_url',
                'value' => 'https://www.instagram.com/stagepassav/',
            ],
            [
                'key' => 'linkedin_url',
                'value' => 'https://www.linkedin.com/company/stagepass-audio-visual-limited/',
            ],
            [
                'key' => 'youtube_url',
                'value' => 'https://youtube.com/@stagepassav-ke',
            ],
            [
                'key' => 'seo_meta_description',
                'value' => null,
            ],
            [
                'key' => 'seo_meta_keywords',
                'value' => null,
            ],
            [
                'key' => 'instagram_access_token',
                'value' => 'EAARQZCEY3Hp0BQv5JDn7tG1KZAL00sAbOGF764R2TqOh1VvLA6I2No5vAgBrpcE9RQDOcN2o9x2Pow4NUaOwiDDkTuYa1vNitNZCNZBd9hKSvZAwftdXaoHqZBX4qwmRrEmQJORpRUzCl9BuO2BtUK3dIvKuzXycH61QCWvtkNJcxZCn3yeHK5MxkUtFBYp4WI9N5DaqRlufR5u',
            ],
            [
                'key' => 'instagram_app_id',
                'value' => null,
            ],
            [
                'key' => 'instagram_app_secret',
                'value' => null,
            ],
            [
                'key' => 'instagram_graph_user_id',
                'value' => '17841403996469818',
            ],
            [
                'key' => 'instagram_graph_api_version',
                'value' => 'v20.0',
            ],
            [
                'key' => 'site_logo_url',
                'value' => 'uploads/1770221831_6983710720720.png',
            ],
        ];

        foreach ($records as $record) {
            DB::table('site_settings')->insert(array_merge($record, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }
    }
}
