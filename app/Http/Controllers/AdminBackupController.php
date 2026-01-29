<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminBackupController extends Controller
{
    public function index()
    {
        $files = collect(Storage::disk('local')->files('backups'))
            ->filter(fn (string $path) => str_ends_with($path, '.sqlite'))
            ->map(function (string $path) {
                return [
                    'path' => $path,
                    'name' => basename($path),
                    'size' => Storage::disk('local')->size($path),
                    'last_modified' => Storage::disk('local')->lastModified($path),
                ];
            })
            ->sortByDesc('last_modified')
            ->values();

        return view('admin.backup', [
            'sectionKey' => 'backup',
            'backups' => $files,
        ]);
    }

    public function run(): RedirectResponse
    {
        $source = database_path('database.sqlite');
        if (!File::exists($source)) {
            return back()->with('error', 'Database file not found.');
        }

        $destinationDir = storage_path('app/backups');
        File::ensureDirectoryExists($destinationDir);

        $timestamp = now()->format('Ymd_His');
        $destination = $destinationDir . DIRECTORY_SEPARATOR . "database_{$timestamp}.sqlite";
        File::copy($source, $destination);

        return back()->with('status', 'Backup created: ' . basename($destination));
    }
}
