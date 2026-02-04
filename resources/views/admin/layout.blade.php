<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'StagePass Admin') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="h-full text-slate-100">
        @php
            $navItems = [
                ['key' => 'dashboard', 'label' => 'Dashboard', 'href' => route('admin.dashboard')],
                ['key' => 'navigation', 'label' => 'Navigation', 'href' => route('admin.navigation')],
                ['key' => 'hero', 'label' => 'Hero', 'href' => route('admin.hero')],
                ['key' => 'about', 'label' => 'About', 'href' => route('admin.about')],
                ['key' => 'services', 'label' => 'Services', 'href' => route('admin.services')],
                ['key' => 'stats', 'label' => 'Stats', 'href' => route('admin.stats')],
                ['key' => 'portfolio', 'label' => 'Portfolio', 'href' => route('admin.portfolio')],
                ['key' => 'industries', 'label' => 'Industries', 'href' => route('admin.industries')],
                ['key' => 'clients', 'label' => 'Clients', 'href' => route('admin.clients')],
                ['key' => 'contact', 'label' => 'Contact', 'href' => route('admin.contact')],
                ['key' => 'footer', 'label' => 'Footer', 'href' => route('admin.footer')],
                ['key' => 'instagram-media', 'label' => 'Instagram Media', 'href' => route('admin.instagram-media')],
                ['key' => 'instagram-tools', 'label' => 'Instagram Tools', 'href' => route('admin.instagram.tools')],
                ['key' => 'contact-messages', 'label' => 'Contact Messages', 'href' => route('admin.contact-messages')],
                ['key' => 'quote-requests', 'label' => 'Quote Requests', 'href' => route('admin.quote-requests')],
            ];
            
            $pageItems = [
                ['key' => 'about-page', 'label' => 'About Page', 'href' => route('admin.about-page')],
                ['key' => 'services-page', 'label' => 'Services Page', 'href' => route('admin.services-page')],
                ['key' => 'our-work-page', 'label' => 'Our Work Page', 'href' => route('admin.our-work-page')],
                ['key' => 'industries-page', 'label' => 'Industries Page', 'href' => route('admin.industries-page')],
                ['key' => 'contact-page', 'label' => 'Contact Page', 'href' => route('admin.contact-page')],
                ['key' => 'terms-page', 'label' => 'Terms & Conditions', 'href' => route('admin.terms-page')],
                ['key' => 'privacy-page', 'label' => 'Privacy Policy', 'href' => route('admin.privacy-page')],
            ];
            
            $activeKey = $sectionKey ?? 'dashboard';
            $isPageActive = in_array($activeKey, array_column($pageItems, 'key'));
        @endphp

        <div class="min-h-full flex">
            <aside class="w-72 shrink-0 border-r border-slate-800 bg-gradient-to-b from-slate-950 to-slate-900 flex flex-col">
                <div class="px-6 py-8 border-b border-slate-800 bg-gradient-to-br from-slate-900 to-slate-950">
                    <div class="flex items-center gap-2 mb-3">
                        <div class="w-2 h-2 rounded-full bg-yellow-500 animate-pulse"></div>
                    <div class="text-xs uppercase tracking-[0.3em] text-yellow-400 font-semibold">StagePass</div>
                    </div>
                    <div class="text-2xl font-black text-white mt-2 bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">Admin Console</div>
                    <p class="text-slate-400 text-sm mt-2 leading-relaxed">
                        Manage every section with precision and clarity.
                    </p>
                </div>

                <nav class="px-4 py-6 space-y-1 overflow-y-auto">
                    @foreach ($navItems as $item)
                        <a
                            href="{{ $item['href'] }}"
                            class="group flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200
                                {{ $activeKey === $item['key'] ? 'bg-gradient-to-r from-yellow-500/20 via-yellow-500/10 to-slate-900 text-yellow-300 shadow-lg shadow-yellow-500/10' : 'text-slate-300 hover:text-white hover:bg-slate-900/60 hover:translate-x-1' }}"
                        >
                            <div class="flex-1 flex items-center gap-3">
                                <div class="w-1.5 h-1.5 rounded-full {{ $activeKey === $item['key'] ? 'bg-yellow-500' : 'bg-slate-600 group-hover:bg-yellow-500/50' }} transition-colors"></div>
                            <span>{{ $item['label'] }}</span>
                            </div>
                        </a>
                    @endforeach
                    
                    {{-- Pages Dropdown --}}
                    <div class="mt-4 pt-4 border-t border-slate-800" x-data="{ open: {{ $isPageActive ? 'true' : 'false' }} }">
                        <button
                            type="button"
                            @click="open = !open"
                            class="w-full group flex items-center justify-between px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-200
                                {{ $isPageActive ? 'bg-gradient-to-r from-yellow-500/20 via-yellow-500/10 to-slate-900 text-yellow-300 shadow-lg shadow-yellow-500/10' : 'text-slate-300 hover:text-white hover:bg-slate-900/60' }}"
                        >
                            <div class="flex items-center gap-3">
                                <div class="w-1.5 h-1.5 rounded-full {{ $isPageActive ? 'bg-yellow-500' : 'bg-slate-600 group-hover:bg-yellow-500/50' }} transition-colors"></div>
                                <span>Pages</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs px-2 py-0.5 rounded-full {{ $isPageActive ? 'bg-yellow-500/20 text-yellow-300' : 'bg-slate-800 text-slate-500 group-hover:bg-slate-700 group-hover:text-slate-300' }} transition-colors">7</span>
                                <svg 
                                    class="w-4 h-4 text-slate-400 transition-transform duration-200"
                                    :class="{ 'rotate-180': open }"
                                    viewBox="0 0 20 20" 
                                    fill="currentColor"
                                >
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.25a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                        
                        <div
                            x-cloak
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="mt-2 ml-7 space-y-1 border-l-2 border-slate-800/50 pl-4"
                        >
                            @foreach ($pageItems as $pageItem)
                                <a
                                    href="{{ $pageItem['href'] }}"
                                    class="group flex items-center gap-2 block px-3 py-2 rounded-lg text-sm font-medium transition-all duration-200
                                        {{ $activeKey === $pageItem['key'] ? 'bg-slate-900/80 text-yellow-300 shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-900/60 hover:translate-x-1' }}"
                                >
                                    <div class="w-1 h-1 rounded-full {{ $activeKey === $pageItem['key'] ? 'bg-yellow-500' : 'bg-slate-600 group-hover:bg-yellow-500/50' }} transition-colors"></div>
                                    <span>{{ $pageItem['label'] }}</span>
                        </a>
                    @endforeach
                        </div>
                    </div>
                </nav>

                <div class="mt-auto px-6 py-6 border-t border-slate-800 bg-gradient-to-t from-slate-900 to-slate-950">
                    <div class="rounded-2xl bg-gradient-to-br from-slate-900/80 to-slate-950/80 border border-slate-800/50 p-4 shadow-lg">
                        <div class="flex items-center gap-2 mb-2">
                            <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                            <p class="text-xs uppercase text-slate-400 tracking-widest font-semibold">System Status</p>
                        </div>
                        <p class="text-sm text-slate-200 font-semibold">All systems normal</p>
                        <p class="text-xs text-slate-500 mt-1.5">Last backup: 2 hours ago</p>
                    </div>
                </div>
            </aside>

            <div class="flex-1 flex flex-col">
                <header class="flex items-center justify-between px-8 py-6 border-b border-slate-800 bg-slate-950/70 backdrop-blur">
                    <div>
                        <h1 class="text-2xl font-black text-white">@yield('page_title')</h1>
                        <p class="text-sm text-slate-400">@yield('page_subtitle')</p>
                    </div>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-full bg-slate-900 text-slate-200 text-sm font-semibold hover:bg-slate-800 transition">
                            Quick Actions
                        </a>

                        <div class="relative" x-data="{ open: false }">
                            <button
                                type="button"
                                @click="open = !open"
                                class="flex items-center gap-3 rounded-full bg-slate-900 px-3 py-2 text-sm font-semibold text-slate-100 hover:bg-slate-800 transition"
                            >
                                <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-yellow-500 text-slate-900 font-bold">
                                    SA
                                </span>
                                <span class="text-left">
                                    <span class="block text-sm font-semibold">StagePass Admin</span>
                                    <span class="block text-xs text-slate-400">superadmin</span>
                                </span>
                                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.94l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.25a.75.75 0 0 1-1.06 0L5.21 8.29a.75.75 0 0 1 .02-1.08Z" clip-rule="evenodd"/>
                                </svg>
                            </button>

                            <div
                                x-cloak
                                x-show="open"
                                @click.outside="open = false"
                                x-transition
                                class="absolute right-0 mt-3 w-52 rounded-2xl bg-slate-900 shadow-xl border border-slate-800 overflow-hidden z-20"
                            >
                                <a href="{{ route('admin.profile') }}" class="block px-4 py-3 text-sm text-slate-200 hover:bg-slate-800">Profile</a>
                                <a href="{{ route('admin.settings') }}" class="block px-4 py-3 text-sm text-slate-200 hover:bg-slate-800">Settings</a>
                                <a href="{{ route('admin.backup') }}" class="block px-4 py-3 text-sm text-slate-200 hover:bg-slate-800">Backup</a>
                                <a href="{{ route('admin.maintain') }}" class="block px-4 py-3 text-sm text-slate-200 hover:bg-slate-800">Maintain</a>
                                <div class="border-t border-slate-800"></div>
                                <a href="{{ route('admin.logout') }}" class="block px-4 py-3 text-sm text-red-300 hover:bg-slate-800">Logout</a>
                            </div>
                        </div>
                    </div>
                </header>

                <main class="flex-1 px-8 py-8 bg-slate-950">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
