@extends('admin.layout')

@section('page_title', 'Settings')
@section('page_subtitle', 'Control app preferences and integrations.')

@section('content')
    <div class="rounded-2xl border border-slate-800 bg-slate-900/60 p-6">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-bold text-white">Site Settings</h2>
                <p class="text-sm text-slate-400 mt-2">Toggle how the portfolio gallery is powered.</p>
            </div>
            @if (session('status'))
                <span class="text-sm text-emerald-400 font-semibold">{{ session('status') }}</span>
            @endif
        </div>

        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="mt-6 space-y-8">
            @csrf
            <div class="rounded-xl border border-slate-800 p-5 flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-400">Portfolio source</p>
                    <p class="text-lg font-semibold text-white mt-2">
                        {{ $settings['portfolio_source'] === 'instagram' ? 'Instagram feeds' : 'Uploaded portfolio' }}
                    </p>
                    <p class="text-xs text-slate-500 mt-1">
                        Switch between Instagram feeds or uploaded portfolio items.
                    </p>
                </div>
                <label class="inline-flex items-center cursor-pointer">
                    <input
                        type="checkbox"
                        name="portfolio_use_instagram"
                        class="sr-only peer"
                        {{ $settings['portfolio_source'] === 'instagram' ? 'checked' : '' }}
                    />
                    <div class="w-14 h-8 bg-slate-800 rounded-full peer peer-checked:bg-yellow-500 transition relative">
                        <div class="absolute top-1 left-1 h-6 w-6 rounded-full bg-white transition peer-checked:translate-x-6"></div>
                    </div>
                </label>
            </div>

            <div class="grid gap-6 lg:grid-cols-2">
                <div class="rounded-xl border border-slate-800 p-5 space-y-4">
                    <h3 class="text-base font-bold text-white">Site Identity</h3>
                    <div>
                        <label class="text-sm text-slate-400">Site Logo</label>
                        <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                            <div>
                                <label class="text-xs uppercase tracking-wide text-slate-500">Upload Logo</label>
                                <input type="file" name="site_logo_upload" accept="image/*" class="mt-2 block w-full text-sm text-slate-200">
                                <p class="mt-1 text-xs text-slate-500">PNG, JPG, or SVG recommended. Recommended size: 200x60px for header logo.</p>
                            </div>
                            @if(!empty($settings['site_logo_url']))
                            <div class="mt-3">
                                <p class="text-xs text-slate-500 mb-2">Current Logo:</p>
                                <img src="{{ str_starts_with($settings['site_logo_url'], 'http') ? $settings['site_logo_url'] : asset($settings['site_logo_url']) }}" alt="Site logo preview" class="max-w-full h-auto rounded-lg border border-slate-800 bg-slate-900 object-contain max-h-24">
                            </div>
                            @endif
                            <input type="hidden" name="site_logo_url" value="{{ $settings['site_logo_url'] ?? '' }}">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Footer Logo</label>
                        <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                            <div>
                                <label class="text-xs uppercase tracking-wide text-slate-500">Upload Footer Logo</label>
                                <input type="file" name="footer_logo_upload" accept="image/*" class="mt-2 block w-full text-sm text-slate-200">
                                <p class="mt-1 text-xs text-slate-500">PNG, JPG, or SVG recommended. Recommended size: 200x60px for footer logo. This logo will be displayed in the footer.</p>
                            </div>
                            @if(!empty($settings['footer_logo_url']))
                            <div class="mt-3">
                                <p class="text-xs text-slate-500 mb-2">Current Footer Logo:</p>
                                <img src="{{ str_starts_with($settings['footer_logo_url'], 'http') ? $settings['footer_logo_url'] : asset($settings['footer_logo_url']) }}" alt="Footer logo preview" class="max-w-full h-auto rounded-lg border border-slate-800 bg-slate-900 object-contain max-h-24">
                            </div>
                            @endif
                            <input type="hidden" name="footer_logo_url" value="{{ $settings['footer_logo_url'] ?? '' }}">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Favicon</label>
                        <div class="mt-2 space-y-3 rounded-xl border border-slate-800 bg-slate-950/60 p-4">
                            <div>
                                <label class="text-xs uppercase tracking-wide text-slate-500">Upload Favicon</label>
                                <input type="file" name="favicon_upload" accept="image/png,image/x-icon,image/vnd.microsoft.icon" class="mt-2 block w-full text-sm text-slate-200">
                                <p class="mt-1 text-xs text-slate-500">PNG or ICO format. Recommended sizes: 32x32px, 192x192px, or 512x512px for PWA support.</p>
                            </div>
                            @if(!empty($settings['favicon_url']))
                            <div class="mt-3">
                                <p class="text-xs text-slate-500 mb-2">Current Favicon:</p>
                                <img src="{{ str_starts_with($settings['favicon_url'], 'http') ? $settings['favicon_url'] : asset($settings['favicon_url']) }}" alt="Favicon preview" class="w-16 h-16 rounded-lg border border-slate-800 bg-slate-900 object-contain">
                            </div>
                            @endif
                            <input type="hidden" name="favicon_url" value="{{ $settings['favicon_url'] ?? '' }}">
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Site name</label>
                        <input type="text" name="site_name" value="{{ $settings['site_name'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Tagline</label>
                        <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Website URL</label>
                        <input type="text" name="website_url" value="{{ $settings['website_url'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                </div>

                <div class="rounded-xl border border-slate-800 p-5 space-y-4">
                    <h3 class="text-base font-bold text-white">Contact Info</h3>
                    <div>
                        <label class="text-sm text-slate-400">Primary email</label>
                        <input type="email" name="contact_email" value="{{ $settings['contact_email'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Support email</label>
                        <input type="email" name="support_email" value="{{ $settings['support_email'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="text-sm text-slate-400">Primary phone</label>
                            <input type="text" name="contact_phone_primary" value="{{ $settings['contact_phone_primary'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                        </div>
                        <div>
                            <label class="text-sm text-slate-400">Secondary phone</label>
                            <input type="text" name="contact_phone_secondary" value="{{ $settings['contact_phone_secondary'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">WhatsApp number</label>
                        <input type="text" name="whatsapp_number" value="{{ $settings['whatsapp_number'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                </div>

                <div class="rounded-xl border border-slate-800 p-5 space-y-4">
                    <h3 class="text-base font-bold text-white">Location & Hours</h3>
                    <div>
                        <label class="text-sm text-slate-400">Address</label>
                        <textarea name="contact_address" rows="3" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100">{{ $settings['contact_address'] }}</textarea>
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Business hours</label>
                        <textarea name="business_hours" rows="3" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100">{{ $settings['business_hours'] }}</textarea>
                    </div>
                </div>

                <div class="rounded-xl border border-slate-800 p-5 space-y-4">
                    <h3 class="text-base font-bold text-white">Social Links</h3>
                    <div>
                        <label class="text-sm text-slate-400">Facebook</label>
                        <input type="text" name="facebook_url" value="{{ $settings['facebook_url'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Twitter / X</label>
                        <input type="text" name="twitter_url" value="{{ $settings['twitter_url'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Instagram</label>
                        <input type="text" name="instagram_url" value="{{ $settings['instagram_url'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">LinkedIn</label>
                        <input type="text" name="linkedin_url" value="{{ $settings['linkedin_url'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">YouTube</label>
                        <input type="text" name="youtube_url" value="{{ $settings['youtube_url'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                </div>

                <div class="rounded-xl border border-slate-800 p-5 space-y-4">
                    <h3 class="text-base font-bold text-white">SEO</h3>
                    <div>
                        <label class="text-sm text-slate-400">Meta description</label>
                        <textarea name="seo_meta_description" rows="3" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100">{{ $settings['seo_meta_description'] }}</textarea>
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Meta keywords</label>
                        <input type="text" name="seo_meta_keywords" value="{{ $settings['seo_meta_keywords'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                </div>

                <div class="rounded-xl border border-slate-800 p-5 space-y-4">
                    <h3 class="text-base font-bold text-white">Instagram API</h3>
                    <div>
                        <label class="text-sm text-slate-400">Access token</label>
                        <input type="password" name="instagram_access_token" value="{{ $settings['instagram_access_token'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Graph API User ID</label>
                        <input type="text" name="instagram_graph_user_id" value="{{ $settings['instagram_graph_user_id'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">Graph API Version</label>
                        <input type="text" name="instagram_graph_api_version" value="{{ $settings['instagram_graph_api_version'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">App ID</label>
                        <input type="text" name="instagram_app_id" value="{{ $settings['instagram_app_id'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-400">App Secret</label>
                        <input type="password" name="instagram_app_secret" value="{{ $settings['instagram_app_secret'] }}" class="mt-2 w-full rounded-xl bg-slate-950 border border-slate-800 px-4 py-2 text-sm text-slate-100" />
                    </div>
                </div>
            </div>

            <div>
                <button class="px-5 py-2.5 rounded-full bg-yellow-500 text-slate-900 text-sm font-semibold hover:bg-yellow-400 transition">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
@endsection
