<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\InstagramPortfolioController;

class PageController extends Controller
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

            $settings = DB::table('site_settings')->pluck('value', 'key')->toArray();
            
            $siteLogoUrl = !empty($settings['site_logo_url']) 
                ? $this->normalizeUrl($settings['site_logo_url'])
                : $this->normalizeUrl($navbar?->logo_url);

            return [
                'settings' => [
                    'site_logo_url' => $siteLogoUrl,
                    'site_name' => $settings['site_name'] ?? null,
                    'website_url' => $settings['website_url'] ?? null,
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
            Log::error('PageController: Failed to load homepage data - ' . $e->getMessage());
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
    
    /**
     * Fetch page data directly from database (independent from API)
     */
    protected function fetchPageData($table, $settingsOnly = false)
    {
        try {
            if (empty($table) && $settingsOnly) {
                $settings = DB::table('site_settings')->pluck('value', 'key')->toArray();
                return [
                    'settings' => [
                        'site_name' => $settings['site_name'] ?? null,
                        'website_url' => $settings['website_url'] ?? null,
                    ],
                ];
            }
            
            if (empty($table)) {
                return null;
            }
            
            $page = DB::table($table)->first();
            $settings = DB::table('site_settings')->pluck('value', 'key')->toArray();
            
            if ($settingsOnly) {
                return [
                    'settings' => [
                        'site_name' => $settings['site_name'] ?? null,
                        'website_url' => $settings['website_url'] ?? null,
                    ],
                ];
            }
            
            if (!$page) {
                return null;
            }
            
            $pageArray = (array) $page;
            
            // Normalize URLs in page data
            if (isset($pageArray['og_image'])) {
                $pageArray['og_image'] = $this->normalizeUrl($pageArray['og_image']);
            }
            if (isset($pageArray['image_url'])) {
                $pageArray['image_url'] = $this->normalizeUrl($pageArray['image_url']);
            }
            
            return [
                'page' => $pageArray,
                'settings' => [
                    'site_name' => $settings['site_name'] ?? null,
                    'website_url' => $settings['website_url'] ?? null,
                ],
            ];
        } catch (\Exception $e) {
            Log::error("PageController: Failed to fetch page data from {$table} - " . $e->getMessage());
            return null;
        }
    }
    
    /**
     * About page
     */
    public function about()
    {
        $homepageData = $this->getHomepageData();
        $pageData = $this->fetchPageData('about_pages');
        
        return view('website.pages.about', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => $pageData ? null : 'Unable to load about content.',
            'isPage' => true,
        ]);
    }
    
    /**
     * Services page
     */
    public function services()
    {
        $homepageData = $this->getHomepageData();
        $pageData = $this->fetchPageData('services_pages');
        
        return view('website.pages.services', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => $pageData ? null : 'Unable to load services content.',
            'isPage' => true,
        ]);
    }
    
    /**
     * Contact page
     */
    public function contact()
    {
        $homepageData = $this->getHomepageData();
        
        try {
            $page = DB::table('contact_pages')->first();
            $contactSection = DB::table('contact_sections')->first();
            $contactDetails = $contactSection
                ? DB::table('contact_details')->where('contact_section_id', $contactSection->id)->orderBy('sort_order')->get()
                : collect();
            $settings = DB::table('site_settings')->pluck('value', 'key')->toArray();
            
            $pageData = [
                'page' => $page ? (array) $page : null,
                'contact_details' => $contactDetails->map(fn($item) => (array) $item)->toArray(),
                'settings' => [
                    'site_name' => $settings['site_name'] ?? null,
                    'website_url' => $settings['website_url'] ?? null,
                    'contact_email' => $settings['contact_email'] ?? null,
                    'contact_phone_primary' => $settings['contact_phone_primary'] ?? null,
                    'contact_phone_secondary' => $settings['contact_phone_secondary'] ?? null,
                    'contact_address' => $settings['contact_address'] ?? null,
                ],
            ];
        } catch (\Exception $e) {
            Log::error('PageController: Failed to load contact page - ' . $e->getMessage());
            $pageData = null;
        }
        
        return view('website.pages.contact', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => $pageData ? null : 'Unable to load contact content.',
            'isPage' => true,
        ]);
    }
    
    /**
     * Portfolio page
     */
    public function portfolio()
    {
        $homepageData = $this->getHomepageData();
        
        // Fetch Instagram portfolio directly
        try {
            $instagramController = new InstagramPortfolioController();
            $request = new Request(['limit' => 50]);
            $instagramResponse = $instagramController->index($request);
            $instagramData = json_decode($instagramResponse->getContent(), true);
            $instagramItems = $instagramData['data'] ?? [];
            $error = '';
        } catch (\Exception $e) {
            $instagramItems = [];
            $error = 'Unable to load portfolio.';
            Log::error('Failed to fetch Instagram portfolio: ' . $e->getMessage());
        }
        
        return view('website.pages.portfolio', [
            'homepageData' => $homepageData,
            'instagramItems' => $instagramItems,
            'isLoading' => false,
            'error' => $error,
            'isPage' => true,
        ]);
    }
    
    /**
     * Industries page
     */
    public function industries()
    {
        $homepageData = $this->getHomepageData();
        $pageData = $this->fetchPageData('industries_pages');
        
        return view('website.pages.industries', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => $pageData ? null : 'Unable to load industries content.',
            'isPage' => true,
        ]);
    }
    
    /**
     * Privacy page
     */
    public function privacy()
    {
        $homepageData = $this->getHomepageData();
        $pageData = $this->fetchPageData('privacy_pages');
        
        return view('website.pages.privacy', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => $pageData ? null : 'Unable to load privacy content.',
            'isPage' => true,
        ]);
    }
    
    /**
     * Terms and Conditions page
     */
    public function terms()
    {
        $homepageData = $this->getHomepageData();
        $pageData = $this->fetchPageData('terms_pages');
        
        return view('website.pages.terms', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => $pageData ? null : 'Unable to load terms content.',
            'isPage' => true,
        ]);
    }
    
    /**
     * Service detail page
     */
    public function service($service, $subservice = null)
    {
        $homepageData = $this->getHomepageData();
        
        try {
            // Query service page directly from database
            $serviceSlug = $subservice ? "{$service}/{$subservice}" : $service;
            $page = DB::table('service_pages')
                ->where('slug', $serviceSlug)
                ->orWhere('slug', $service)
                ->first();
            
            if ($page) {
                $pageData = [
                    'page' => (array) $page,
                    'settings' => $this->fetchPageData('', true)['settings'] ?? [],
                ];
            } else {
                $pageData = [
                    'page' => [
                        'title' => $service ? ucfirst(str_replace('-', ' ', $service)) : 'Service',
                        'description' => 'Professional AV services for your event needs.'
                    ],
                    'settings' => [],
                ];
            }
        } catch (\Exception $e) {
            Log::error('PageController: Failed to load service page - ' . $e->getMessage());
            $pageData = [
                'page' => [
                    'title' => $service ? ucfirst(str_replace('-', ' ', $service)) : 'Service',
                    'description' => 'Professional AV services for your event needs.'
                ],
                'settings' => [],
            ];
        }
        
        return view('website.pages.service', [
            'homepageData' => $homepageData,
            'pageData' => $pageData['page'] ?? $pageData,
            'service' => $service,
            'subservice' => $subservice,
            'loading' => false,
            'error' => ($pageData && isset($pageData['page']) && !empty($pageData['page']['title'])) ? null : 'Service page not found',
            'isPage' => true,
        ]);
    }
}
