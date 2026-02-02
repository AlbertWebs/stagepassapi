<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login - {{ config('app.name', 'StagePass') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="h-full text-slate-100 overflow-hidden">
        <div class="min-h-full flex items-center justify-center relative">
            <!-- Background gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950"></div>
            
            <!-- Animated background elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-yellow-500/5 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-yellow-500/5 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            </div>

            <!-- Login Card -->
            <div class="relative z-10 w-full max-w-md px-6">
                <div class="rounded-2xl border border-slate-800 bg-gradient-to-br from-slate-900/90 to-slate-950/90 backdrop-blur-xl shadow-2xl p-8 space-y-8">
                    <!-- Header -->
                    <div class="text-center space-y-4">
                        <div class="flex items-center justify-center gap-3 mb-4">
                            <div class="w-3 h-3 rounded-full bg-yellow-500 animate-pulse"></div>
                            <div class="text-xs uppercase tracking-[0.3em] text-yellow-400 font-semibold">StagePass</div>
                        </div>
                        <h1 class="text-3xl font-black text-white bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">
                            Admin Console
                        </h1>
                        <p class="text-slate-400 text-sm leading-relaxed">
                            Sign in to access the admin dashboard
                        </p>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 space-y-1">
                            @foreach ($errors->all() as $error)
                                <p class="text-sm text-red-300">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('admin.login') }}" class="space-y-6" x-data="{ loading: false }">
                        @csrf
                        
                        <!-- Username Field -->
                        <div class="space-y-2">
                            <label for="username" class="block text-sm font-semibold text-slate-300">
                                Username
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    value="{{ old('username') }}"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    class="w-full pl-12 pr-4 py-3 rounded-xl bg-slate-950/50 border border-slate-800 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500/50 transition-all"
                                    placeholder="Enter your username"
                                />
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="space-y-2">
                            <label for="password" class="block text-sm font-semibold text-slate-300">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    class="w-full pl-12 pr-4 py-3 rounded-xl bg-slate-950/50 border border-slate-800 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-yellow-500/50 focus:border-yellow-500/50 transition-all"
                                    placeholder="Enter your password"
                                />
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            @click="loading = true"
                            :disabled="loading"
                            class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-yellow-500 to-yellow-600 text-slate-900 text-sm font-bold hover:from-yellow-400 hover:to-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500/50 focus:ring-offset-2 focus:ring-offset-slate-900 transition-all duration-200 shadow-lg shadow-yellow-500/20 hover:shadow-yellow-500/30 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2"
                        >
                            <span x-show="!loading">Sign In</span>
                            <span x-show="loading" class="flex items-center gap-2">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Signing in...
                            </span>
                        </button>
                    </form>

                    <!-- Footer -->
                    <div class="pt-6 border-t border-slate-800">
                        <div class="flex items-center justify-center gap-2 text-xs text-slate-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            <span>Secure admin access</span>
                        </div>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mt-6 text-center">
                    <p class="text-xs text-slate-600">
                        © {{ date('Y') }} StagePass. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
