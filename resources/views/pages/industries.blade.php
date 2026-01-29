@extends('layouts.marketing')

@section('title', 'Industries - ' . config('app.name', 'StagePass'))
@section('meta_description', 'We support high-growth teams across technology, hospitality, entertainment, and more with premium digital experiences.')
@section('canonical', url('/industries'))
@section('og_title', 'Industries We Serve - ' . config('app.name', 'StagePass'))
@section('og_description', 'Premium digital experiences tailored to the unique needs of fast-moving industries.')
@section('og_image', url('/favicon.ico'))

@section('breadcrumb', 'Industries')
@section('page_title', 'Built for ambitious teams.')
@section('page_intro', 'We partner with industries that demand high performance, elevated aesthetics, and fast execution.')

@section('content')
    <div class="mt-6 space-y-6 text-sm leading-7 text-[#706f6c] dark:text-[#A1A09A]">
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Industries we know</h2>
            <ul class="mt-3 grid gap-2 sm:grid-cols-2">
                <li>• Entertainment & events</li>
                <li>• Hospitality & travel</li>
                <li>• Technology & SaaS</li>
                <li>• Lifestyle & retail</li>
                <li>• Sports & experiences</li>
                <li>• Professional services</li>
            </ul>
        </div>
        <p>
            Every industry comes with unique constraints. We adapt our process to your compliance, timelines, and
            audience expectations without sacrificing polish.
        </p>
    </div>
@endsection

@section('structured_data')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "Industries - {{ config('app.name', 'StagePass') }}",
            "url": "{{ url('/industries') }}",
            "description": "We support high-growth teams across technology, hospitality, entertainment, and more with premium digital experiences."
        }
    </script>
@endsection
