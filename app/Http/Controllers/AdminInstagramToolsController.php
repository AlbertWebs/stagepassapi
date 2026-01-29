<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AdminInstagramToolsController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.instagram-tools', [
            'results' => $request->session()->get('ig_tools_results'),
            'error' => $request->session()->get('ig_tools_error'),
        ]);
    }

    public function fetch(): RedirectResponse
    {
        $submittedToken = request()->input('instagram_access_token');
        if ($submittedToken) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => 'instagram_access_token'],
                ['value' => $submittedToken, 'updated_at' => now()]
            );
        }

        $accessToken = $submittedToken
            ?: config('services.instagram.access_token')
            ?: DB::table('site_settings')->where('key', 'instagram_access_token')->value('value');
        $verifySsl = (bool) config('services.instagram.verify_ssl', true);

        if (!$accessToken) {
            return redirect()
                ->route('admin.instagram.tools')
                ->with('ig_tools_error', 'Instagram access token is not configured.');
        }

        $meResponse = Http::withOptions(['verify' => $verifySsl])->get(
            'https://graph.facebook.com/v20.0/me',
            ['access_token' => $accessToken]
        );

        if ($meResponse->failed()) {
            return redirect()
                ->route('admin.instagram.tools')
                ->with('ig_tools_error', $meResponse->body() ?: 'Failed to validate access token.');
        }

        $accountsResponse = Http::withOptions(['verify' => $verifySsl])->get(
            'https://graph.facebook.com/v20.0/me/accounts',
            ['access_token' => $accessToken]
        );

        if ($accountsResponse->failed()) {
            return redirect()
                ->route('admin.instagram.tools')
                ->with('ig_tools_error', $accountsResponse->body() ?: 'Failed to load Facebook pages.');
        }

        $pages = $accountsResponse->json('data') ?? [];
        if (empty($pages)) {
            return redirect()
                ->route('admin.instagram.tools')
                ->with('ig_tools_error', 'No Facebook pages returned. Ensure token is a User token tied to a user with admin access to pages.')
                ->with('ig_tools_results', [
                    [
                        'page_id' => '-',
                        'page_name' => 'Diagnostics',
                        'ig_user_id' => null,
                        'raw' => [
                            'me' => $meResponse->json(),
                            'me_accounts' => $accountsResponse->json(),
                        ],
                    ],
                ]);
        }
        $results = [];

        foreach ($pages as $page) {
            $pageId = $page['id'] ?? null;
            if (!$pageId) {
                continue;
            }

            $igResponse = Http::withOptions(['verify' => $verifySsl])->get(
                "https://graph.facebook.com/v20.0/{$pageId}",
                [
                    'fields' => 'instagram_business_account',
                    'access_token' => $accessToken,
                ]
            );

            $igId = $igResponse->json('instagram_business_account.id');

            $results[] = [
                'page_id' => $pageId,
                'page_name' => $page['name'] ?? 'Unknown',
                'ig_user_id' => $igId,
                'raw' => $igResponse->failed() ? $igResponse->json() : null,
            ];
        }

        return redirect()
            ->route('admin.instagram.tools')
            ->with('ig_tools_results', $results);
    }
}
