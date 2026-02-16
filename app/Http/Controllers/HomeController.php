<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Normalize URL - handle relative and absolute URLs
     */
    protected function normalizeUrl($url)
    {
        if (empty($url)) {
            return null;
        }
        
        if (str_starts_with($url, 'http://') || str_starts_with($url, 'https://')) {
            return $url;
        }
        
        return asset(ltrim($url, '/'));
    }
    
    /**
     * Get homepage data directly from database (independent from API)
     */
    protected function getHomepageData()
    {
        try {
            $navbar = DB::table('navbar_settings')->first();
            $navbarLinks = DB::table('navbar_links')->orderBy('sort_order')->get();
            $bottomLinks = DB::table('bottom_nav_links')->orderBy('sort_order')->get();

            $hero = DB::table('hero_sections')->first();

            $about = DB::table('about_sections')->first();
            $aboutHighlights = $about
                ? DB::table('about_highlights')->where('about_section_id', $about->id)->orderBy('sort_order')->get()
                : collect();

            $servicesSection = DB::table('services_sections')->first();
            $services = $servicesSection
                ? DB::table('services')->where('services_section_id', $servicesSection->id)->orderBy('sort_order')->get()
                : collect();

            $statsSection = DB::table('stats_sections')->first();
            $stats = $statsSection
                ? DB::table('stats')->where('stats_section_id', $statsSection->id)->orderBy('sort_order')->get()
                : collect();

            $portfolioSection = DB::table('portfolio_sections')->first();
            $portfolioItems = $portfolioSection
                ? DB::table('portfolio_items')->where('portfolio_section_id', $portfolioSection->id)->orderBy('sort_order')->get()
                : collect();

            $industriesSection = DB::table('industries_sections')->first();
            $industries = $industriesSection
                ? DB::table('industries')->where('industries_section_id', $industriesSection->id)->orderBy('sort_order')->get()
                : collect();

            $clientsSection = DB::table('clients_sections')->first();
            $clientLogos = $clientsSection
                ? DB::table('client_logos')->where('clients_section_id', $clientsSection->id)->orderBy('sort_order')->get()
                : collect();

            $contactSection = DB::table('contact_sections')->first();
            $contactDetails = $contactSection
                ? DB::table('contact_details')->where('contact_section_id', $contactSection->id)->orderBy('sort_order')->get()
                : collect();

            $footer = DB::table('footer_settings')->first();
            $footerSocialLinks = $footer
                ? DB::table('footer_social_links')->where('footer_settings_id', $footer->id)->orderBy('sort_order')->get()
                : collect();
            $footerQuickLinks = $footer
                ? DB::table('footer_quick_links')->where('footer_settings_id', $footer->id)->orderBy('sort_order')->get()
                : collect();
            $footerMoreLinks = $footer
                ? DB::table('footer_more_links')->where('footer_settings_id', $footer->id)->orderBy('sort_order')->get()
                : collect();
            $footerServiceItems = $footer
                ? DB::table('footer_service_items')->where('footer_settings_id', $footer->id)->orderBy('sort_order')->get()
                : collect();

            $portfolioSource = DB::table('site_settings')
                ->where('key', 'portfolio_source')
                ->value('value') ?? 'database';

            $settings = DB::table('site_settings')->pluck('value', 'key')->toArray();
            
            // Get site logo URL from settings, fallback to navbar logo_url
            $siteLogoUrl = !empty($settings['site_logo_url']) 
                ? $this->normalizeUrl($settings['site_logo_url'])
                : $this->normalizeUrl($navbar?->logo_url);

            // Get favicon URL from settings
            $faviconUrl = !empty($settings['favicon_url']) 
                ? $this->normalizeUrl($settings['favicon_url'])
                : null;

            // Get footer logo URL from settings
            $footerLogoUrl = !empty($settings['footer_logo_url']) 
                ? $this->normalizeUrl($settings['footer_logo_url'])
                : null;

            return [
                'settings' => [
                    'portfolio_source' => $portfolioSource,
                    'site_logo_url' => $siteLogoUrl,
                    'footer_logo_url' => $footerLogoUrl,
                    'favicon_url' => $faviconUrl,
                    'site_name' => $settings['site_name'] ?? null,
                    'site_tagline' => $settings['site_tagline'] ?? null,
                    'website_url' => $settings['website_url'] ?? null,
                    'contact_email' => $settings['contact_email'] ?? null,
                    'contact_phone_primary' => $settings['contact_phone_primary'] ?? null,
                    'contact_phone_secondary' => $settings['contact_phone_secondary'] ?? null,
                    'contact_address' => $settings['contact_address'] ?? null,
                    'business_hours' => $settings['business_hours'] ?? null,
                    'facebook_url' => $settings['facebook_url'] ?? null,
                    'twitter_url' => $settings['twitter_url'] ?? null,
                    'instagram_url' => $settings['instagram_url'] ?? null,
                    'linkedin_url' => $settings['linkedin_url'] ?? null,
                    'youtube_url' => $settings['youtube_url'] ?? null,
                ],
                'navigation' => [
                    'logo_url' => $siteLogoUrl,
                    'cta_label' => $navbar?->cta_label,
                    'cta_href' => $navbar?->cta_href,
                    'links' => $navbarLinks->map(fn($item) => (array) $item)->toArray(),
                    'bottom_links' => $bottomLinks->map(fn($item) => (array) $item)->toArray(),
                ],
                'hero' => $hero ? array_merge((array) $hero, [
                    'headline' => $hero->headline ?? null,
                    'background_video_url' => $this->normalizeUrl($hero->background_video_url ?? null),
                    'thumbnail_url' => $this->normalizeUrl($hero->thumbnail_url ?? null),
                ]) : null,
                'about' => [
                    'section' => $about ? array_merge((array) $about, [
                        'image_url' => $this->normalizeUrl($about->image_url ?? null),
                    ]) : null,
                    'highlights' => $aboutHighlights->map(fn($item) => (array) $item)->toArray(),
                ],
                'services' => [
                    'section' => $servicesSection ? (array) $servicesSection : null,
                    'items' => $services->map(fn($item) => (array) $item)->toArray(),
                ],
                'stats' => [
                    'section' => $statsSection ? (array) $statsSection : null,
                    'items' => $stats->map(fn($item) => (array) $item)->toArray(),
                ],
                'portfolio' => [
                    'section' => $portfolioSection ? (array) $portfolioSection : null,
                    'items' => $portfolioItems->map(function ($item) {
                        $item->thumbnail = $this->normalizeUrl($item->thumbnail);
                        return (array) $item;
                    })->toArray(),
                ],
                'industries' => [
                    'section' => $industriesSection ? (array) $industriesSection : null,
                    'items' => $industries->map(fn($item) => (array) $item)->toArray(),
                ],
                'clients' => [
                    'section' => $clientsSection ? (array) $clientsSection : null,
                    'logos' => $clientLogos->map(function ($logo) {
                        $logo->logo_path = $this->normalizeUrl($logo->logo_path);
                        return (array) $logo;
                    })->toArray(),
                ],
                'contact' => [
                    'section' => $contactSection ? (array) $contactSection : null,
                    'details' => $contactDetails->map(fn($item) => (array) $item)->toArray(),
                ],
                'footer' => [
                    'section' => [
                        'logo_url' => $this->normalizeUrl($footer?->logo_url),
                        'description' => $footer?->description,
                        'copyright' => $footer?->copyright,
                    ],
                    'social_links' => $footerSocialLinks->map(fn($item) => (array) $item)->toArray(),
                    'quick_links' => $footerQuickLinks->map(fn($item) => (array) $item)->toArray(),
                    'more_links' => $footerMoreLinks->map(fn($item) => (array) $item)->toArray(),
                    'service_items' => $footerServiceItems->map(fn($item) => (array) $item)->toArray(),
                ],
            ];
        } catch (\Exception $e) {
            Log::error('HomeController: Failed to load homepage data - ' . $e->getMessage());
            // Return empty structure so page can still render
            return [
                'settings' => [],
                'navigation' => [],
                'hero' => null,
                'about' => ['section' => null, 'highlights' => []],
                'services' => ['section' => null, 'items' => []],
                'stats' => ['section' => null, 'items' => []],
                'portfolio' => ['section' => null, 'items' => []],
                'industries' => ['section' => null, 'items' => []],
                'clients' => ['section' => null, 'logos' => []],
                'contact' => ['section' => null, 'details' => []],
                'footer' => ['section' => [], 'social_links' => [], 'quick_links' => [], 'more_links' => [], 'service_items' => []],
            ];
        }
    }
    
    public function index()
    {
        $homepageData = $this->getHomepageData();
        
        return view('website.pages.home', [
            'homepageData' => $homepageData,
            'isPage' => false,
        ]);
    }
}
