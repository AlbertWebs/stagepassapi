<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContentController;

class HomeController extends Controller
{
    public function index()
    {
        // Use the same ContentController method as the API route
        $contentController = new ContentController();
        $homepageResponse = $contentController->homepage();
        $homepageData = json_decode($homepageResponse->getContent(), true);
        
        return view('website.pages.home', [
            'homepageData' => $homepageData ?? [],
            'isPage' => false,
        ]);
    }
}
