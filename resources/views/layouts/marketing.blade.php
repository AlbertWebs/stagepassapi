<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('meta_description')">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="@yield('canonical')">
        <meta name="theme-color" content="#FDFDFC">

        <meta property="og:site_name" content="{{ config('app.name', 'StagePass') }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="@yield('og_title')">
        <meta property="og:description" content="@yield('og_description')">
        <meta property="og:url" content="@yield('canonical')">
        <meta property="og:image" content="@yield('og_image')">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('og_title')">
        <meta name="twitter:description" content="@yield('og_description')">
        <meta name="twitter:image" content="@yield('og_image')">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @yield('structured_data')
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
            <div class="flex items-center justify-between">
                <a href="/" class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">
                    {{ config('app.name', 'StagePass') }}
                </a>
                <a href="/contact" class="text-[#f53003] dark:text-[#FF4433] underline underline-offset-4">
                    Let’s talk
                </a>
            </div>
        </header>

        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                    <nav class="mb-6">
                        <ol class="flex items-center gap-2 text-[11px] uppercase tracking-widest text-[#706f6c] dark:text-[#A1A09A]">
                            <li>
                                <a href="/" class="text-[#f53003] dark:text-[#FF4433] underline underline-offset-4">Home</a>
                            </li>
                            <li class="opacity-60">/</li>
                            <li class="text-[#1b1b18] dark:text-[#EDEDEC]">@yield('breadcrumb')</li>
                        </ol>
                    </nav>

                    <h1 class="mb-2 text-3xl font-semibold">@yield('page_title')</h1>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">@yield('page_intro')</p>

                    @yield('content')
                </div>
                <div class="bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/60 via-[#fff2f2] to-[#f7d7d7] dark:from-[#2a0b0d] dark:via-[#1D0002] dark:to-[#120003] opacity-80"></div>
                    <div class="relative z-10 h-full p-8 lg:p-12 flex flex-col justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-[0.3em] text-[#706f6c] dark:text-[#A1A09A]">Signature</p>
                            <h2 class="mt-3 text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">
                                @yield('accent_title', 'Premium digital experiences')
                            </h2>
                            <p class="mt-3 text-sm text-[#706f6c] dark:text-[#A1A09A]">
                                @yield('accent_subtitle', 'Clarity, craft, and measurable growth for modern brands.')
                            </p>
                        </div>
                        <div class="text-xs text-[#706f6c] dark:text-[#A1A09A]">
                            @yield('accent_footer', 'Strategy • Design • Development')
                        </div>
                    </div>
                    <div class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"></div>
                </div>
            </main>
        </div>
    </body>
</html>
