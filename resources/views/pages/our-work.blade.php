@extends('layouts.marketing')

@section('title', 'Our Work - ' . config('app.name', 'StagePass'))
@section('meta_description', 'See how ' . config('app.name', 'StagePass') . ' partners with brands to deliver premium digital experiences and measurable growth.')
@section('canonical', url('/our-work'))
@section('og_title', 'Our Work by ' . config('app.name', 'StagePass'))
@section('og_description', 'Highlights of premium digital experiences built to elevate brands and drive results.')
@section('og_image', url('/favicon.ico'))

@section('breadcrumb', 'Our Work')
@section('page_title', 'Results with a signature feel.')
@section('page_intro', 'A curated view of projects that combine taste, clarity, and measurable outcomes.')

@section('content')
    <div class="mt-6 space-y-6 text-sm leading-7 text-[#706f6c] dark:text-[#A1A09A]">
        <p>
            Every engagement is tailored to the brand, audience, and commercial goals. We focus on the moments that
            matter most: the story you tell, the experience you deliver, and the actions you want customers to take.
        </p>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Featured capabilities</h2>
            <ul class="mt-3 space-y-2">
                <li>• Brand refreshes that modernize without losing trust.</li>
                <li>• Marketing sites designed to convert and scale.</li>
                <li>• Product experiences refined for clarity and retention.</li>
            </ul>
        </div>
        <p>
            Want to explore a tailored case study? Reach out and we’ll share work relevant to your industry.
        </p>
    </div>
@endsection

@section('structured_data')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "Our Work - {{ config('app.name', 'StagePass') }}",
            "url": "{{ url('/our-work') }}",
            "description": "See how {{ config('app.name', 'StagePass') }} partners with brands to deliver premium digital experiences and measurable growth."
        }
    </script>
@endsection
