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
                ['key' => 'contact-messages', 'label' => 'Contact Messages', 'href' => route('admin.contact-messages')],
                ['key' => 'quote-requests', 'label' => 'Quote Requests', 'href' => route('admin.quote-requests')],
            ];
            $activeKey = $sectionKey ?? 'dashboard';
        @endphp

        <div class="min-h-full flex">
            <aside class="w-72 shrink-0 border-r border-slate-800 bg-slate-950">
                <div class="px-6 py-8 border-b border-slate-800">
                    <div class="text-xs uppercase tracking-[0.3em] text-yellow-400 font-semibold">StagePass</div>
                    <div class="text-2xl font-black text-white mt-2">Admin Console</div>
                    <p class="text-slate-400 text-sm mt-2">
                        Manage every section with precision and clarity.
                    </p>
                </div>

                <nav class="px-4 py-6 space-y-1">
                    @foreach ($navItems as $item)
                        <a
                            href="{{ $item['href'] }}"
                            class="group flex items-center justify-between px-4 py-3 rounded-xl text-sm font-semibold transition
                                {{ $activeKey === $item['key'] ? 'bg-gradient-to-r from-yellow-500/20 to-slate-900 text-yellow-300' : 'text-slate-300 hover:text-white hover:bg-slate-900/60' }}"
                        >
                            <span>{{ $item['label'] }}</span>
                            <span class="text-xs text-slate-500 group-hover:text-slate-300">CRUD</span>
                        </a>
                    @endforeach
                </nav>

                <div class="mt-auto px-6 py-6 border-t border-slate-800">
                    <div class="rounded-2xl bg-slate-900/70 p-4">
                        <p class="text-xs uppercase text-slate-400 tracking-widest">System</p>
                        <p class="text-sm text-slate-200 font-semibold mt-2">All systems normal</p>
                        <p class="text-xs text-slate-500 mt-1">Last backup: 2 hours ago</p>
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
