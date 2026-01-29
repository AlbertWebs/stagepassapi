<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class AdminLogsController extends Controller
{
    public function index()
    {
        $logPath = storage_path('logs/laravel.log');
        $lines = [];

        if (File::exists($logPath)) {
            $fileLines = file($logPath, FILE_IGNORE_NEW_LINES);
            $lines = array_slice($fileLines, -200);
        }

        return view('admin.logs', [
            'sectionKey' => 'logs',
            'logPath' => $logPath,
            'logLines' => $lines,
        ]);
    }
}
