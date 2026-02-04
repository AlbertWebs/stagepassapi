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
use App\Http\Controllers\ContentController;
use App\Http\Controllers\InstagramPortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// API Routes for Frontend
Route::middleware('cors')->group(function () {
Route::get('/api/portfolio/instagram', [InstagramPortfolioController::class, 'index']);
Route::get('/instagram/callback', [InstagramPortfolioController::class, 'callback']);
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
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
    })->where('any', '.*');
});

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
