<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSettingsController extends Controller
{
    public function edit()
    {
        $settings = DB::table('site_settings')->pluck('value', 'key')->toArray();
        
        // Set defaults for missing settings
        $defaults = [
            'portfolio_source' => 'instagram',
            'site_name' => 'StagePass Audio Visual Limited',
            'site_tagline' => '',
            'website_url' => 'https://stagepass.co.ke',
            'contact_email' => '',
            'support_email' => '',
            'contact_phone_primary' => '',
            'contact_phone_secondary' => '',
            'whatsapp_number' => '',
            'contact_address' => 'Jacaranda Close, Ridgeways,\nNairobi, Kenya',
            'business_hours' => '',
            'facebook_url' => '',
            'twitter_url' => '',
            'instagram_url' => '',
            'linkedin_url' => '',
            'youtube_url' => '',
            'seo_meta_description' => '',
            'seo_meta_keywords' => '',
            'instagram_access_token' => '',
            'instagram_graph_user_id' => '',
            'instagram_graph_api_version' => '',
            'instagram_app_id' => '',
            'instagram_app_secret' => '',
        ];
        
        $settings = array_merge($defaults, $settings);

        return view('admin.settings', [
            'sectionKey' => 'settings',
            'settings' => $settings,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->all();
        
        // Handle portfolio source toggle
        $portfolioSource = $request->has('portfolio_use_instagram')
            ? 'instagram'
            : 'uploaded';
        
        DB::table('site_settings')->updateOrInsert(
            ['key' => 'portfolio_source'],
            ['value' => $portfolioSource, 'updated_at' => now()]
        );
        
        // Update all other settings
        $settingsToUpdate = [
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
            'instagram_graph_user_id',
            'instagram_graph_api_version',
            'instagram_app_id',
            'instagram_app_secret',
        ];
        
        foreach ($settingsToUpdate as $key) {
            if ($request->has($key)) {
                DB::table('site_settings')->updateOrInsert(
                    ['key' => $key],
                    ['value' => $request->input($key), 'updated_at' => now()]
                );
            }
        }

        return back()->with('status', 'Settings updated successfully.');
    }
}
