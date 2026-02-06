<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
     * Get homepage data for views
     */
    protected function getHomepageData()
    {
        $homepageResponse = $this->contentController->homepage();
        return json_decode($homepageResponse->getContent(), true);
    }
    
    /**
     * About page
     */
    public function about()
    {
        $homepageData = $this->getHomepageData();
        $pageResponse = $this->contentController->about();
        $pageData = json_decode($pageResponse->getContent(), true);
        
        return view('website.pages.about', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => null,
            'isPage' => true,
        ]);
    }
    
    /**
     * Services page
     */
    public function services()
    {
        $homepageData = $this->getHomepageData();
        $pageResponse = $this->contentController->services();
        $pageData = json_decode($pageResponse->getContent(), true);
        
        return view('website.pages.services', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => null,
            'isPage' => true,
        ]);
    }
    
    /**
     * Contact page
     */
    public function contact()
    {
        $homepageData = $this->getHomepageData();
        $pageResponse = $this->contentController->contact();
        $pageData = json_decode($pageResponse->getContent(), true);
        
        return view('website.pages.contact', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => null,
            'isPage' => true,
        ]);
    }
    
    /**
     * Portfolio page
     */
    public function portfolio()
    {
        $homepageData = $this->getHomepageData();
        
        // Fetch Instagram portfolio
        $instagramController = new InstagramPortfolioController();
        $instagramResponse = $instagramController->index(new Request(['limit' => 50]));
        $instagramData = json_decode($instagramResponse->getContent(), true);
        
        $instagramItems = $instagramData['data'] ?? [];
        $isLoading = false;
        $error = '';
        
        return view('website.pages.portfolio', [
            'homepageData' => $homepageData,
            'instagramItems' => $instagramItems,
            'isLoading' => $isLoading,
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
        $pageResponse = $this->contentController->industries();
        $pageData = json_decode($pageResponse->getContent(), true);
        
        return view('website.pages.industries', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => null,
            'isPage' => true,
        ]);
    }
    
    /**
     * Privacy page
     */
    public function privacy()
    {
        $homepageData = $this->getHomepageData();
        $pageResponse = $this->contentController->privacy();
        $pageData = json_decode($pageResponse->getContent(), true);
        
        return view('website.pages.privacy', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => null,
            'isPage' => true,
        ]);
    }
    
    /**
     * Terms and Conditions page
     */
    public function terms()
    {
        $homepageData = $this->getHomepageData();
        $pageResponse = $this->contentController->terms();
        $pageData = json_decode($pageResponse->getContent(), true);
        
        return view('website.pages.terms', [
            'homepageData' => $homepageData,
            'pageData' => $pageData,
            'loadError' => null,
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
            $pageResponse = $this->contentController->service($service, $subservice);
            $pageData = json_decode($pageResponse->getContent(), true);
            
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
                'error' => null,
                'isPage' => true,
            ]);
        } catch (\Exception $e) {
            return view('website.pages.service', [
                'homepageData' => $homepageData,
                'pageData' => null,
                'service' => $service,
                'subservice' => $subservice,
                'loading' => false,
                'error' => 'Service page not found',
                'isPage' => true,
            ]);
        }
    }
}
