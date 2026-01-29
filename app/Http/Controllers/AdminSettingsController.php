<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSettingsController extends Controller
{
    public function edit()
    {
        $settings = DB::table('site_settings')->pluck('value', 'key');

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
            'portfolio_source' => 'instagram',
        ];

        $settings = $settings->mapWithKeys(function ($value, $key) {
            return [$key => $value];
        })->toArray();

        $mergedSettings = array_merge($defaults, $settings);

        return view('admin.settings', [
            'settings' => $mergedSettings,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $keys = [
            'site_name',
            'site_tagline',
            'website_url',
            'contact_email',
            'support_email',
            'contact_phone_primary',
            'contact_phone_secondary',
            'whatsapp_number',
            'contact_address',
            'business_hours',
            'facebook_url',
            'twitter_url',
            'instagram_url',
            'linkedin_url',
            'youtube_url',
            'seo_meta_description',
            'seo_meta_keywords',
            'instagram_access_token',
            'instagram_app_id',
            'instagram_app_secret',
        ];

        $source = $request->boolean('portfolio_use_instagram') ? 'instagram' : 'uploaded';
        DB::table('site_settings')->updateOrInsert(
            ['key' => 'portfolio_source'],
            ['value' => $source, 'updated_at' => now()]
        );

        foreach ($keys as $key) {
            $value = $request->input($key);
            DB::table('site_settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value ?? '', 'updated_at' => now()]
            );
        }

        return redirect()->route('admin.settings')->with('status', 'Settings saved.');
    }
}
