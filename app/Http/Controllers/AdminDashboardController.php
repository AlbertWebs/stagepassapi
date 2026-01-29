<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $sectionCount = count(config('admin_sections.sections', []));
        $instagramCount = DB::table('instagram_media')->count();
        $contactCount = DB::table('contact_messages')->count();
        $quoteCount = DB::table('quote_requests')->count();

        return view('admin.dashboard', [
            'sectionKey' => 'dashboard',
            'sectionCount' => $sectionCount,
            'instagramCount' => $instagramCount,
            'contactCount' => $contactCount,
            'quoteCount' => $quoteCount,
        ]);
    }
}
