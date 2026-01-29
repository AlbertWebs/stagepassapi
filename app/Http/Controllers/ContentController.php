<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function homepage(): JsonResponse
    {
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
            ->value('value') ?? 'instagram';

        $settings = DB::table('site_settings')->pluck('value', 'key')->toArray();

        return response()
            ->json([
                'settings' => [
                    'portfolio_source' => $portfolioSource,
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
                    'logo_url' => $this->normalizeUrl($navbar?->logo_url),
                    'cta_label' => $navbar?->cta_label,
                    'cta_href' => $navbar?->cta_href,
                    'links' => $navbarLinks,
                    'bottom_links' => $bottomLinks,
                ],
                'hero' => $hero,
                'about' => [
                    'section' => $about,
                    'highlights' => $aboutHighlights,
                ],
                'services' => [
                    'section' => $servicesSection,
                    'items' => $services,
                ],
                'stats' => [
                    'section' => $statsSection,
                    'items' => $stats,
                ],
                'portfolio' => [
                    'section' => $portfolioSection,
                    'items' => $portfolioItems->map(function ($item) {
                        $item->thumbnail = $this->normalizeUrl($item->thumbnail);
                        return $item;
                    }),
                ],
                'industries' => [
                    'section' => $industriesSection,
                    'items' => $industries,
                ],
                'clients' => [
                    'section' => $clientsSection,
                    'logos' => $clientLogos->map(function ($logo) {
                        $logo->logo_path = $this->normalizeUrl($logo->logo_path);
                        return $logo;
                    }),
                ],
                'contact' => [
                    'section' => $contactSection,
                    'details' => $contactDetails,
                ],
                'footer' => [
                    'section' => [
                        'logo_url' => $this->normalizeUrl($footer?->logo_url),
                        'description' => $footer?->description,
                        'copyright' => $footer?->copyright,
                    ],
                    'social_links' => $footerSocialLinks,
                    'quick_links' => $footerQuickLinks,
                    'more_links' => $footerMoreLinks,
                    'service_items' => $footerServiceItems,
                ],
            ])
            ->header('Access-Control-Allow-Origin', '*');
    }

    private function normalizeUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return asset($path);
    }
}
