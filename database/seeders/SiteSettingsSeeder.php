<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('site_settings')->updateOrInsert(
            ['key' => 'portfolio_source'],
            ['value' => 'instagram', 'created_at' => $now, 'updated_at' => $now]
        );

        $defaults = [
            'site_name' => 'StagePass Audio Visual',
            'site_tagline' => 'Creative Solutions • Technical Excellence',
            'website_url' => 'https://stagepass.co.ke',
            'contact_email' => 'info@stagepass.co.ke',
            'support_email' => 'info@stagepass.co.ke',
            'contact_phone_primary' => '+254 729 171 351',
            'contact_phone_secondary' => '',
            'whatsapp_number' => '',
            'contact_address' => "Paa ya Paa Lane, Off Ridgeways Road\nNairobi, Kenya",
            'business_hours' => "Mon - Fri: 9:00 AM - 6:00 PM\nSat: 10:00 AM - 4:00 PM",
            'facebook_url' => '#',
            'twitter_url' => '#',
            'instagram_url' => '#',
            'linkedin_url' => '#',
            'youtube_url' => '#',
            'seo_meta_description' => '',
            'seo_meta_keywords' => '',
            'instagram_access_token' => '',
            'instagram_app_id' => '',
            'instagram_app_secret' => '',
            'instagram_graph_user_id' => '',
            'instagram_graph_api_version' => 'v20.0',
        ];

        foreach ($defaults as $key => $value) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value, 'created_at' => $now, 'updated_at' => $now]
            );
        }
    }
}
