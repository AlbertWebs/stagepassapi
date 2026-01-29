@extends('admin.layout')

@section('page_title', 'Instagram Tools')
@section('page_subtitle', 'Find the Instagram Graph User ID for your connected pages.')

@section('content')
    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-white">Get IG User ID</h2>
                <p class="text-sm text-slate-400 mt-2">
                    Paste your Graph API access token to list Facebook pages and their Instagram Business IDs.
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.instagram.tools.fetch') }}" class="mt-6 space-y-4">
            @csrf
            <div>
                <label class="text-sm text-slate-400">Access token</label>
                <input
                    type="password"
                    name="instagram_access_token"
                    placeholder="Paste Graph API access token"
                    class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100"
                />
                <p class="text-xs text-slate-500 mt-2">
                    The token will be saved to site settings and used for fetches.
                </p>
            </div>
            <div>
                <button type="submit" class="px-5 py-2.5 rounded-full bg-yellow-500 text-slate-900 text-sm font-semibold hover:bg-yellow-400 transition">
                    Fetch IG User IDs
                </button>
            </div>
        </form>

        @if ($error)
            <div class="mt-6 rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-300">
                {{ $error }}
            </div>
        @endif

        @if (!empty($results))
            <div class="mt-6 overflow-hidden rounded-xl border border-slate-800">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-900">
                        <tr class="text-slate-400">
                            <th class="px-4 py-3 font-semibold">Page Name</th>
                            <th class="px-4 py-3 font-semibold">Page ID</th>
                            <th class="px-4 py-3 font-semibold">IG User ID</th>
                            <th class="px-4 py-3 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $item)
                            <tr class="border-t border-slate-800">
                                <td class="px-4 py-3 text-white">{{ $item['page_name'] }}</td>
                                <td class="px-4 py-3 text-slate-400">{{ $item['page_id'] }}</td>
                                <td class="px-4 py-3 text-slate-200">
                                    {{ $item['ig_user_id'] ?? 'Not connected' }}
                                </td>
                                <td class="px-4 py-3 text-slate-400">
                                    {{ $item['ig_user_id'] ? 'Connected' : 'No IG account' }}
                                </td>
                            </tr>
                            @if (!empty($item['raw']))
                                <tr class="border-t border-slate-800">
                                    <td colspan="4" class="px-4 py-3 text-xs text-red-300">
                                        {{ json_encode($item['raw']) }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        @if (empty($results) && !$error)
            <div class="mt-6 rounded-xl border border-slate-800 bg-slate-900/40 px-4 py-3 text-sm text-slate-400">
                No results yet. Click "Fetch IG User IDs" to load your pages.
            </div>
        @endif
    </div>
@endsection
