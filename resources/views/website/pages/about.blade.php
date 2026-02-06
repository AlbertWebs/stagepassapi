@php
    $homepageData = $homepageData ?? [];
    $pageData = $pageData ?? null;
    $loadError = $loadError ?? null;
@endphp
@extends('website.layouts.app')

@section('title', ($pageData['page']['title'] ?? 'About Us') . ' - StagePass Audio Visual Limited | Professional AV Services in Kenya')
@section('description', $pageData['page']['meta_description'] ?? 'Learn about StagePass Audio Visual Limited, Kenya\'s leading events and audio-visual company providing professional sound systems, event production, video conferencing, and technical event support.')
@section('keywords', $pageData['page']['meta_keywords'] ?? 'about StagePass, audio visual company Kenya, event production company, AV services Nairobi')
@section('og_image', $pageData['page']['og_image'] ?? asset('uploads/StagePass-LOGO-y.png'))

@section('structured_data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "AboutPage",
    "name": "About Us - StagePass Audio Visual Limited",
    "description": "Learn about StagePass Audio Visual Limited, Kenya's leading events and audio-visual company providing professional sound systems, event production, and technical event support.",
    "url": "https://stagepass.co.ke/about",
    "mainEntity": {
        "@type": "Organization",
        "name": "StagePass Audio Visual Limited",
        "description": "Professional audio visual and event production company in Kenya"
    }
}
</script>
@endsection

@section('content')
<div class="min-h-screen bg-white">
    @if($loadError)
        <div class="bg-red-50 text-red-700 text-center py-4 font-semibold mt-20">{{ $loadError }}</div>
    @endif
    
    <!-- Breadcrumb -->
    <div class="pt-28 pb-4">
        <div class="mx-auto max-w-4xl px-6">
            @include('website.partials.breadcrumb', ['items' => [['label' => 'About', 'path' => '/about']]])
        </div>
    </div>
    
    <!-- Homepage About Section -->
    @include('website.partials.about', ['data' => $homepageData['about'] ?? null])
    
    <!-- Page-specific content -->
    @if($pageData && isset($pageData['page']))
        <main class="mx-auto max-w-4xl px-6 py-16">
            @if(!empty($pageData['page']['hero_title']))
                <h1 class="text-4xl md:text-5xl font-black text-[#172455] mb-4">{{ $pageData['page']['hero_title'] }}</h1>
            @endif
            @if(!empty($pageData['page']['hero_subtitle']))
                <p class="text-lg text-gray-600 mb-8">{{ $pageData['page']['hero_subtitle'] }}</p>
            @endif
            @if(!empty($pageData['page']['image_url']))
                <div class="mb-8">
                    <img src="{{ $pageData['page']['image_url'] }}" alt="{{ $pageData['page']['hero_title'] ?? 'About' }}" class="w-full rounded-lg shadow-lg" />
                </div>
            @endif
            @if(!empty($pageData['page']['content']))
                <div class="prose prose-lg max-w-none text-gray-700 leading-7">{!! $pageData['page']['content'] !!}</div>
            @endif
        </main>
    @endif
</div>
@endsection
