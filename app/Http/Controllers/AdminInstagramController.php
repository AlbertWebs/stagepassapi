<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class AdminInstagramController extends Controller
{
    public function fetch(): RedirectResponse
    {
        $exitCode = Artisan::call('instagram:fetch-media', ['--limit' => 50]);
        $output = trim(Artisan::output());

        if ($exitCode !== 0) {
            return redirect()
                ->route('admin.dashboard')
                ->with('error', $output ?: 'Failed to fetch Instagram media.');
        }

        return redirect()
            ->route('admin.dashboard')
            ->with('status', $output ?: 'Instagram media fetched successfully.');
    }
}
