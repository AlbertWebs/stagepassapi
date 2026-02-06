<?php

use App\Http\Controllers\AdminBackupController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminInstagramController;
use App\Http\Controllers\AdminInstagramToolsController;
use App\Http\Controllers\AdminLogsController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminMaintenanceController;
use App\Http\Controllers\AdminSectionController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\InstagramPortfolioController;
use App\Http\Controllers\QuoteRequestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

// API Routes for Frontend
Route::middleware(['cors', 'accept.json'])->group(function () {
Route::get('/api/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'API endpoints are accessible! All systems operational. 🚀',
        'timestamp' => now()->toIso8601String(),
        'server' => 'StagePass API',
        'version' => '1.0.0'
    ], 200)->header('Access-Control-Allow-Origin', '*');
});
Route::get('/api/portfolio/instagram', [InstagramPortfolioController::class, 'index']);
Route::get('/instagram/callback', [InstagramPortfolioController::class, 'callback']);
Route::post('/api/contact/submit', [ContactController::class, 'submit']);
Route::post('/api/quote/submit', [QuoteRequestController::class, 'submit']);
Route::get('/api/content/homepage', [ContentController::class, 'homepage']);
    Route::get('/api/content/about', [ContentController::class, 'about']);
    Route::get('/api/content/services', [ContentController::class, 'services']);
    Route::get('/api/content/service/{service}', [ContentController::class, 'service']);
    Route::get('/api/content/service/{service}/{subservice}', [ContentController::class, 'service']);
    Route::get('/api/content/our-work', [ContentController::class, 'ourWork']);
    Route::get('/api/content/industries', [ContentController::class, 'industries']);
    Route::get('/api/content/industry/{id}', [ContentController::class, 'industry']);
    Route::get('/api/content/contact', [ContentController::class, 'contact']);
    Route::get('/api/content/terms-and-conditions', [ContentController::class, 'terms']);
    Route::get('/api/content/privacy', [ContentController::class, 'privacy']);
    Route::options('/api/{any}', function () {
        return response('', 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, Accept, Origin, X-CSRF-TOKEN')
            ->header('Access-Control-Allow-Credentials', 'true')
            ->header('Access-Control-Max-Age', '86400');
    })->where('any', '.*');
});

Route::get('/manifest.json', function () {
    $settings = DB::table('site_settings')->pluck('value', 'key')->toArray();
    $faviconUrl = null;
    
    if (!empty($settings['favicon_url'])) {
        $faviconUrl = str_starts_with($settings['favicon_url'], 'http') 
            ? $settings['favicon_url'] 
            : '/' . ltrim($settings['favicon_url'], '/');
    } else {
        // Check if logo/favicon.png exists, otherwise use favicon.ico
        if (file_exists(public_path('logo/favicon.png'))) {
            $faviconUrl = '/logo/favicon.png';
        } else {
            $faviconUrl = '/favicon.ico';
        }
    }
    
    // Only include icons if favicon exists (check local files only, skip external URLs)
    $icons = [];
    if ($faviconUrl) {
        $isExternal = str_starts_with($faviconUrl, 'http');
        $fileExists = $isExternal || file_exists(public_path(ltrim(parse_url($faviconUrl, PHP_URL_PATH), '/')));
        
        if ($fileExists) {
            $iconType = str_ends_with(strtolower($faviconUrl), '.ico') ? 'image/x-icon' : 'image/png';
            $icons = [
                [
                    'src' => $faviconUrl,
                    'sizes' => '192x192',
                    'type' => $iconType,
                    'purpose' => 'any maskable'
                ],
                [
                    'src' => $faviconUrl,
                    'sizes' => '512x512',
                    'type' => $iconType,
                    'purpose' => 'any maskable'
                ]
            ];
        }
    }
    
    $manifest = [
        'short_name' => $settings['site_name'] ?? 'StagePass',
        'name' => $settings['site_name'] ?? 'StagePass Audio Visual',
        'description' => $settings['seo_meta_description'] ?? "Kenya's leading Audio Visual and Event Production company",
        'icons' => $icons,
        'start_url' => '/',
        'display' => 'standalone',
        'theme_color' => '#172455',
        'background_color' => '#ffffff',
        'orientation' => 'portrait-primary',
        'scope' => '/',
        'categories' => ['business', 'productivity'],
        'screenshots' => [],
        'shortcuts' => []
    ];
    
    // Only add shortcuts with icons if favicon exists
    if (!empty($icons)) {
        $iconType = str_ends_with(strtolower($faviconUrl), '.ico') ? 'image/x-icon' : 'image/png';
        $manifest['shortcuts'] = [
            [
                'name' => 'Contact',
                'short_name' => 'Contact',
                'description' => 'Get in touch with us',
                'url' => '/contact',
                'icons' => [['src' => $faviconUrl, 'sizes' => '192x192', 'type' => $iconType]]
            ],
            [
                'name' => 'Services',
                'short_name' => 'Services',
                'description' => 'View our services',
                'url' => '/services',
                'icons' => [['src' => $faviconUrl, 'sizes' => '192x192', 'type' => $iconType]]
            ]
        ];
    }
    
    return response()->json($manifest)
        ->header('Content-Type', 'application/manifest+json')
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Origin')
        ->header('Cache-Control', 'public, max-age=3600');
})->name('manifest');

// Add OPTIONS route for manifest.json CORS preflight
Route::options('/manifest.json', function () {
    return response('', 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Origin')
        ->header('Access-Control-Max-Age', '86400');
});

// Handle frontend static file requests
// Option 1: Return 204 No Content to prevent 404 errors (frontend should use paths from API settings)
Route::get('/static/css/main.css', function () {
    return response('', 204)
        ->header('Content-Type', 'text/css')
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate');
});

Route::get('/static/js/main.js', function () {
    return response('', 204)
        ->header('Content-Type', 'application/javascript')
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate');
});

// Option 2: Redirect to frontend domain if configured
// Uncomment and configure if you want to redirect these requests
/*
Route::get('/static/css/main.css', function () {
    $frontendUrl = config('app.frontend_url', 'https://stagepass.co.ke');
    return redirect($frontendUrl . '/static/css/main.css', 301);
});

Route::get('/static/js/main.js', function () {
    $frontendUrl = config('app.frontend_url', 'https://stagepass.co.ke');
    return redirect($frontendUrl . '/static/js/main.js', 301);
});
*/

Route::get('/sitemap.xml', function () {
    $baseUrl = 'http://stagepass.co.ke';
    $lastmod = now()->toDateString();
    $urls = [
        [
            'loc' => $baseUrl . '/',
            'lastmod' => $lastmod,
            'changefreq' => 'weekly',
            'priority' => '1.0',
        ],
        [
            'loc' => $baseUrl . '/about',
            'lastmod' => $lastmod,
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ],
        [
            'loc' => $baseUrl . '/services',
            'lastmod' => $lastmod,
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ],
        [
            'loc' => $baseUrl . '/our-work',
            'lastmod' => $lastmod,
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ],
        [
            'loc' => $baseUrl . '/portfolio',
            'lastmod' => $lastmod,
            'changefreq' => 'weekly',
            'priority' => '0.8',
        ],
        [
            'loc' => $baseUrl . '/industries',
            'lastmod' => $lastmod,
            'changefreq' => 'monthly',
            'priority' => '0.7',
        ],
        [
            'loc' => $baseUrl . '/contact',
            'lastmod' => $lastmod,
            'changefreq' => 'monthly',
            'priority' => '0.6',
        ],
        [
            'loc' => $baseUrl . '/sitemap',
            'lastmod' => $lastmod,
            'changefreq' => 'monthly',
            'priority' => '0.5',
        ],
        [
            'loc' => $baseUrl . '/terms-and-conditions',
            'lastmod' => $lastmod,
            'changefreq' => 'yearly',
            'priority' => '0.4',
        ],
        [
            'loc' => $baseUrl . '/privacy',
            'lastmod' => $lastmod,
            'changefreq' => 'yearly',
            'priority' => '0.4',
        ],
    ];

    return response()
        ->view('sitemap', ['urls' => $urls])
        ->header('Content-Type', 'application/xml');
});

// Admin Login Routes (Public)
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware('admin.session')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    $sections = config('admin_sections.sections', []);
    if (empty($sections)) {
        $sections = [
            'navigation' => [],
            'hero' => [],
            'about' => [],
            'services' => [],
            'stats' => [],
            'portfolio' => [],
            'industries' => [],
            'clients' => [],
            'contact' => [],
            'footer' => [],
            'instagram-media' => [],
            'contact-messages' => [],
            'quote-requests' => [],
        ];
    }
    foreach ($sections as $slug => $section) {
        Route::get("/{$slug}", [AdminSectionController::class, 'index'])
            ->name("admin.{$slug}")
            ->defaults('sectionKey', $slug);
    }

    Route::post('/section/{sectionKey}/{table}', [AdminSectionController::class, 'store'])
        ->name('admin.section.store');
    Route::put('/section/{sectionKey}/{table}/{id}', [AdminSectionController::class, 'update'])
        ->name('admin.section.update');
    Route::delete('/section/{sectionKey}/{table}/{id}', [AdminSectionController::class, 'destroy'])
        ->name('admin.section.delete');

    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile');
    Route::post('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');

    Route::get('/settings', [AdminSettingsController::class, 'edit'])->name('admin.settings');
    Route::post('/settings', [AdminSettingsController::class, 'update'])->name('admin.settings.update');

    Route::get('/logs', [AdminLogsController::class, 'index'])->name('admin.logs');

    Route::get('/cron-jobs', [App\Http\Controllers\AdminCronJobsController::class, 'index'])->name('admin.cron-jobs');

    Route::get('/backup', [AdminBackupController::class, 'index'])->name('admin.backup');
    Route::post('/backup', [AdminBackupController::class, 'run'])->name('admin.backup.run');

    Route::get('/maintain', [AdminMaintenanceController::class, 'index'])->name('admin.maintain');
    Route::post('/maintain/{task}', [AdminMaintenanceController::class, 'run'])->name('admin.maintain.run');

    Route::get('/email-test', [App\Http\Controllers\AdminEmailTestController::class, 'index'])->name('admin.email-test');
    Route::post('/email-test', [App\Http\Controllers\AdminEmailTestController::class, 'test'])->name('admin.email-test.test');

    Route::get('/logout', function () {
        return view('admin.logout');
    })->name('admin.logout');

    Route::post('/instagram/fetch', [AdminInstagramController::class, 'fetch'])
        ->name('admin.instagram.fetch');

    Route::get('/instagram/tools', [AdminInstagramToolsController::class, 'index'])
        ->name('admin.instagram.tools');
    Route::post('/instagram/tools/fetch', [AdminInstagramToolsController::class, 'fetch'])
        ->name('admin.instagram.tools.fetch');
});
