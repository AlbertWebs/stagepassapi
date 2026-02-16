@php
    $homepageData = $homepageData ?? [];
    $pageData = $pageData ?? null;
    $loadError = $loadError ?? null;
@endphp
@extends('website.layouts.app')

@section('title', ($pageData['page']['title'] ?? 'Our Services') . ' - Professional AV & Event Production | StagePass')
@section('description', $pageData['page']['meta_description'] ?? 'StagePass offers comprehensive audio visual services including sound systems, stage lighting, LED screens, video conferencing, and full event production in Kenya.')
@section('keywords', $pageData['page']['meta_keywords'] ?? 'AV services Kenya, sound systems, stage lighting, LED screens, event production, video conferencing')
@section('og_image', $pageData['page']['og_image'] ?? asset('uploads/StagePass-LOGO-y.png'))

@section('structured_data')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "Audio Visual Services",
    "provider": {
        "@type": "LocalBusiness",
        "name": "StagePass Audio Visual Limited"
    },
    "areaServed": {
        "@type": "Country",
        "name": "Kenya"
    }
}
</script>
@endsection
@endverbatim

@section('content')
<div class="min-h-screen bg-white">
    @if($loadError)
        <div class="bg-red-50 text-red-700 text-center py-4 font-semibold mt-20">{{ $loadError }}</div>
    @endif
    
    <!-- Breadcrumb -->
    <div class="pt-28 pb-4">
        <div class="mx-auto max-w-4xl px-6">
            @include('website.partials.breadcrumb', ['items' => [['label' => 'Services', 'path' => '/services']]])
        </div>
    </div>
    
    <!-- Homepage Services Section -->
    @include('website.partials.services', ['data' => $homepageData['services'] ?? null])
    
    <!-- Page-specific content -->
    @if($pageData && isset($pageData['page']))
        <main class="mx-auto max-w-4xl px-6 py-16">
            @if(!empty($pageData['page']['hero_title']))
                <h1 class="text-4xl md:text-5xl font-black text-[#172455] mb-4">{{ $pageData['page']['hero_title'] }}</h1>
            @endif
            @if(!empty($pageData['page']['hero_subtitle']))
                <p class="text-lg text-gray-600 mb-8">{{ $pageData['page']['hero_subtitle'] }}</p>
            @endif
            @if(!empty($pageData['page']['content']))
                <div class="prose prose-lg max-w-none text-gray-700 leading-7">{!! $pageData['page']['content'] !!}</div>
            @endif
        </main>
    @endif
</div>
@endsection
