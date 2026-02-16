<?php

namespace App\Http\Controllers;

use App\Models\InstagramMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class InstagramPortfolioController extends Controller
{
    public function callback(Request $request)
    {
        $code = $request->query('code');
        if (!$code) {
            return response()->json(['message' => 'Missing authorization code.'], 400);
        }

        $clientId = config('services.instagram.client_id');
        $clientSecret = config('services.instagram.client_secret');
        $redirectUri = url('/instagram/callback');

        if (!$clientId || !$clientSecret) {
            return response()->json(['message' => 'Instagram client credentials are not configured.'], 500);
        }

        $tokenResponse = Http::asForm()->post('https://api.instagram.com/oauth/access_token', [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => 'authorization_code',
            'redirect_uri' => $redirectUri,
            'code' => $code,
        ]);

        if ($tokenResponse->failed()) {
            return response()->json([
                'message' => 'Failed to exchange code for token.',
                'details' => $tokenResponse->json(),
            ], 502);
        }

        $shortToken = $tokenResponse->json('access_token');
        if (!$shortToken) {
            return response()->json(['message' => 'No access token returned.'], 502);
        }

        $longTokenResponse = Http::get('https://graph.instagram.com/access_token', [
            'grant_type' => 'ig_exchange_token',
            'client_secret' => $clientSecret,
            'access_token' => $shortToken,
        ]);

        if ($longTokenResponse->failed()) {
            return response()->json([
                'message' => 'Failed to exchange for long-lived token.',
                'details' => $longTokenResponse->json(),
            ], 502);
        }

        $longToken = $longTokenResponse->json('access_token');
        if (!$longToken) {
            return response()->json(['message' => 'No long-lived token returned.'], 502);
        }

        DB::table('site_settings')->updateOrInsert(
            ['key' => 'instagram_access_token'],
            ['value' => $longToken, 'updated_at' => now()]
        );

        return response()->json([
            'message' => 'Instagram token stored.',
            'access_token' => $longToken,
        ]);
    }

    public function index(Request $request)
    {
        $limit = (int) $request->query('limit', 12);
        if ($limit < 1) {
            $limit = 12;
        }
        if ($limit > 50) {
            $limit = 50;
        }
        $media = InstagramMedia::query()
            ->orderByDesc('posted_at')
            ->limit($limit)
            ->get([
                'instagram_id',
                'media_type',
                'media_url',
                'thumbnail_url',
                'permalink',
                'caption',
                'posted_at',
            ]);

        // Convert to array to ensure proper JSON serialization
        $mediaArray = $media->map(function ($item) {
            return [
                'instagram_id' => $item->instagram_id,
                'media_type' => $item->media_type,
                'media_url' => $item->media_url,
                'thumbnail_url' => $item->thumbnail_url,
                'permalink' => $item->permalink,
                'caption' => $item->caption,
                'posted_at' => $item->posted_at ? $item->posted_at->toIso8601String() : null,
            ];
        })->toArray();

        return response()
            ->json(['data' => $mediaArray])
            ->header('Access-Control-Allow-Origin', '*');
    }
}
