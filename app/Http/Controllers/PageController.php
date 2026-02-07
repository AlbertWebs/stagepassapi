<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\InstagramPortfolioController;

class PageController extends Controller
{
    protected $contentController;
    
    public function __construct()
    {
        $this->contentController = new ContentController();
    }
    
    /**
     * Get homepage data for views (same as API route)
     */
    protected function getHomepageData()
    {
        $response = $this->contentController->homepage();
        return json_decode($response->getContent(), true);
    }
    
    /**
     * Fetch data from ContentController (same as API route)
     */
    protected function fetchPageData($method, ...$args)
    {
        try {
            $response = call_user_func_array([$this->contentController, $method], $args);
            return json_decode($response->getContent(), true);
        } catch (\Exception $e) {
            \Log::error("Failed to fetch data via {$method}: " . $e->getMessage());
            return null;
        }
    }
    
    /**
     * About page
     */
    public function about()
    {
        $homepageData = $this->getHomepageData();
        $pageData = $this->fetchPageData('about');
        
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
        $pageData = $this->fetchPageData('services');
        
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
        $pageData = $this->fetchPageData('contact');
        
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
        
        // Fetch Instagram portfolio (same as API route)
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
            \Log::error('Failed to fetch Instagram portfolio: ' . $e->getMessage());
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
        $pageData = $this->fetchPageData('industries');
        
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
        $pageData = $this->fetchPageData('privacy');
        
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
        $pageData = $this->fetchPageData('terms');
        
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
        $pageData = $this->fetchPageData('service', $service, $subservice);
        
        $content = $pageData['page'] ?? $pageData ?? [
            'title' => $service ? ucfirst(str_replace('-', ' ', $service)) : 'Service',
            'description' => 'Professional AV services for your event needs.'
        ];
        
        return view('website.pages.service', [
            'homepageData' => $homepageData,
            'pageData' => $content,
            'service' => $service,
            'subservice' => $subservice,
            'loading' => false,
            'error' => ($pageData && isset($pageData['page'])) ? null : 'Service page not found',
            'isPage' => true,
        ]);
    }
}
