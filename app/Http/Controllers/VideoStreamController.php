<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Serves video files with HTTP Range (206 Partial Content) support.
 * Safari requires Range requests to play HTML5 video reliably.
 */
class VideoStreamController extends Controller
{
    public function stream(Request $request, string $path): StreamedResponse|\Illuminate\Http\Response
    {
        // Restrict to uploads/video (no directory traversal)
        $path = str_replace(['../', '..\\'], '', $path);
        $path = ltrim($path, '/\\');
        $path = 'uploads/video/' . $path;
        if (strpos($path, 'uploads/video/') !== 0) {
            abort(404);
        }

        $fullPath = public_path($path);
        if (!is_file($fullPath) || !is_readable($fullPath)) {
            abort(404);
        }

        $size = filesize($fullPath);
        $mime = match (strtolower(pathinfo($fullPath, PATHINFO_EXTENSION))) {
            'mp4' => 'video/mp4',
            'webm' => 'video/webm',
            'mov' => 'video/quicktime',
            default => 'application/octet-stream',
        };

        $rangeHeader = $request->header('Range');
        if (empty($rangeHeader) || strpos($rangeHeader, 'bytes=') !== 0) {
            return response()->file($fullPath, [
                'Content-Type' => $mime,
                'Accept-Ranges' => 'bytes',
                'Content-Length' => $size,
            ]);
        }

        $range = substr($rangeHeader, 6);
        $parts = explode('-', $range, 2);
        $start = isset($parts[0]) && $parts[0] !== '' ? (int) $parts[0] : 0;
        $end = isset($parts[1]) && $parts[1] !== '' ? (int) $parts[1] : $size - 1;
        $end = min($end, $size - 1);
        if ($start > $end) {
            $start = 0;
            $end = $size - 1;
        }
        $length = $end - $start + 1;

        return response()->stream(function () use ($fullPath, $start, $length) {
            $handle = fopen($fullPath, 'rb');
            if ($handle === false) {
                return;
            }
            fseek($handle, $start);
            $remaining = $length;
            $chunkSize = 8192;
            while ($remaining > 0 && !feof($handle)) {
                $read = min($chunkSize, $remaining);
                echo fread($handle, $read);
                $remaining -= $read;
                if (ob_get_level()) {
                    ob_flush();
                }
                flush();
            }
            fclose($handle);
        }, 206, [
            'Content-Type' => $mime,
            'Content-Length' => $length,
            'Content-Range' => sprintf('bytes %d-%d/%d', $start, $end, $size),
            'Accept-Ranges' => 'bytes',
        ]);
    }
}
