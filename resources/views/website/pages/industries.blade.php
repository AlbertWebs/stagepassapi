@php
    $homepageData = $homepageData ?? [];
    $pageData = $pageData ?? null;
    $loadError = $loadError ?? null;
@endphp
@extends('website.layouts.app')

@section('title', ($pageData['page']['title'] ?? 'Our Industries') . ' - StagePass Audio Visual')
@section('description', $pageData['page']['meta_description'] ?? 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.')
@section('keywords', $pageData['page']['meta_keywords'] ?? 'industries, event industries, corporate events, concerts, fashion shows')
@section('og_image', $pageData['page']['og_image'] ?? asset('uploads/StagePass-LOGO-y.png'))

@section('content')
<div class="min-h-screen bg-white">
    @if($loadError)
        <div class="bg-red-50 text-red-700 text-center py-4 font-semibold mt-20">{{ $loadError }}</div>
    @endif
    
    <!-- Breadcrumb -->
    <div class="pt-28 pb-4">
        <div class="mx-auto max-w-4xl px-6">
            @include('website.partials.breadcrumb', ['items' => [['label' => 'Industries', 'path' => '/industries']]])
        </div>
    </div>
    
    <!-- Homepage Industries Section -->
    @include('website.partials.industries', ['data' => $homepageData['industries'] ?? null])
    
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
