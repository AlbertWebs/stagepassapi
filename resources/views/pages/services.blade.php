@extends('layouts.marketing')

@section('title', 'Services - ' . config('app.name', 'StagePass'))
@section('meta_description', 'Explore premium brand strategy, design, and development services from ' . config('app.name', 'StagePass') . ' tailored to help your business grow.')
@section('canonical', url('/services'))
@section('og_title', 'Services by ' . config('app.name', 'StagePass'))
@section('og_description', 'Premium strategy, design, and development services built to convert attention into measurable growth.')
@section('og_image', url('/favicon.ico'))

@section('breadcrumb', 'Services')
@section('page_title', 'Premium services, end to end.')
@section('page_intro', 'A focused set of offerings that align brand, product, and marketing into a single growth story.')

@section('content')
    <div class="mt-6 space-y-6 text-sm leading-7 text-[#706f6c] dark:text-[#A1A09A]">
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Brand & experience strategy</h2>
            <p class="mt-2">
                Positioning, messaging, and journey mapping that clarifies your story and makes every touchpoint feel intentional.
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Design systems & UI</h2>
            <p class="mt-2">
                Premium, conversion-focused design systems that scale across web, product, and campaign experiences.
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Web & product development</h2>
            <p class="mt-2">
                High-performing builds with modern stacks, optimized for speed, accessibility, and SEO.
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Launch & growth support</h2>
            <p class="mt-2">
                Analytics, iteration, and ongoing optimization to keep performance and engagement climbing.
            </p>
        </div>
    </div>
@endsection

@section('structured_data')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "Services - {{ config('app.name', 'StagePass') }}",
            "url": "{{ url('/services') }}",
            "description": "Explore premium brand strategy, design, and development services from {{ config('app.name', 'StagePass') }} tailored to help your business grow."
        }
    </script>
@endsection
