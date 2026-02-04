<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminSettingsController extends Controller
{
    public function edit()
    {
        $settings = DB::table('site_settings')->pluck('value', 'key')->toArray();
        
        // Set defaults for missing settings
        $defaults = [
            'portfolio_source' => 'instagram',
            'site_logo_url' => '',
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
        
        // Handle logo upload
        if ($request->hasFile('site_logo_upload')) {
            $file = $request->file('site_logo_upload');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadsPath = public_path('uploads');
            
            // Ensure uploads directory exists
            if (!file_exists($uploadsPath)) {
                mkdir($uploadsPath, 0755, true);
            }
            
            $file->move($uploadsPath, $filename);
            $logoUrl = 'uploads/' . $filename;
            
            DB::table('site_settings')->updateOrInsert(
                ['key' => 'site_logo_url'],
                ['value' => $logoUrl, 'updated_at' => now()]
            );
        }
        
        // Update all other settings
        $settingsToUpdate = [
            'site_logo_url',
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
            // Skip logo_url if it was uploaded (already handled above)
            if ($key === 'site_logo_url' && $request->hasFile('site_logo_upload')) {
                continue;
            }
            
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
