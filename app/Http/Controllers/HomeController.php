<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ContentController;

class HomeController extends Controller
{
    public function index()
    {
        // Use the same logic as ContentController but return view instead of JSON
        $contentController = new ContentController();
        $homepageData = json_decode($contentController->homepage()->getContent(), true);
        
        return view('website.pages.home', [
            'homepageData' => $homepageData,
            'isPage' => false,
        ]);
    }
}
