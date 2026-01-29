@extends('layouts.marketing')

@section('title', 'About Us - ' . config('app.name', 'StagePass'))
@section('meta_description', 'Discover the team behind ' . config('app.name', 'StagePass') . ' and how we craft premium digital experiences that turn attention into revenue.')
@section('canonical', url('/about'))
@section('og_title', 'About ' . config('app.name', 'StagePass'))
@section('og_description', 'Meet the team and philosophy behind ' . config('app.name', 'StagePass') . '. We design and build premium brand experiences that perform.')
@section('og_image', url('/favicon.ico'))

@section('breadcrumb', 'About')
@section('page_title', 'We design for momentum.')
@section('page_intro', 'A focused studio blending strategy, design, and engineering to move ambitious brands forward.')

@section('content')
    <div class="mt-6 space-y-6 text-sm leading-7 text-[#706f6c] dark:text-[#A1A09A]">
        <p>
            {{ config('app.name', 'StagePass') }} helps teams clarify their story, elevate their digital presence,
            and create experiences that feel premium while performing like a growth engine.
        </p>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Our approach</h2>
            <p class="mt-2">
                We start with deep discovery, shape a strategy you can rally around, and translate it into design
                systems and digital products that scale.
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">What makes us different</h2>
            <p class="mt-2">
                Senior-led delivery, tasteful craft, and a commitment to measurable outcomes in every engagement.
            </p>
        </div>
    </div>
@endsection

@section('structured_data')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "About {{ config('app.name', 'StagePass') }}",
            "url": "{{ url('/about') }}",
            "description": "Discover the team behind {{ config('app.name', 'StagePass') }} and how we craft premium digital experiences that turn attention into revenue."
        }
    </script>
@endsection
