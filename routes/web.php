<?php

use App\Http\Controllers\AdminBackupController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminInstagramController;
use App\Http\Controllers\AdminLogsController;
use App\Http\Controllers\AdminMaintenanceController;
use App\Http\Controllers\AdminSectionController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\InstagramPortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/portfolio/instagram', [InstagramPortfolioController::class, 'index']);
Route::get('/instagram/callback', [InstagramPortfolioController::class, 'callback']);
Route::get('/api/content/homepage', [ContentController::class, 'homepage']);

Route::prefix('admin')->middleware('admin.basic')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    $sections = config('admin_sections.sections', []);
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

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('admin.profile');

    Route::get('/settings', [AdminSettingsController::class, 'edit'])->name('admin.settings');
    Route::post('/settings', [AdminSettingsController::class, 'update'])->name('admin.settings.update');

    Route::get('/logs', [AdminLogsController::class, 'index'])->name('admin.logs');

    Route::get('/backup', [AdminBackupController::class, 'index'])->name('admin.backup');
    Route::post('/backup', [AdminBackupController::class, 'run'])->name('admin.backup.run');

    Route::get('/maintain', [AdminMaintenanceController::class, 'index'])->name('admin.maintain');
    Route::post('/maintain/{task}', [AdminMaintenanceController::class, 'run'])->name('admin.maintain.run');

    Route::get('/logout', function () {
        return view('admin.logout');
    })->name('admin.logout');

    Route::post('/instagram/fetch', [AdminInstagramController::class, 'fetch'])
        ->name('admin.instagram.fetch');
});
