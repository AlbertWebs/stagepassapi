@php
    $homepageData = $homepageData ?? [];
    $pageData = $pageData ?? null;
    $loadError = $loadError ?? null;
@endphp
@extends('website.layouts.app')

@section('title', ($pageData['page']['title'] ?? 'Privacy Policy') . ' - StagePass Audio Visual')
@section('description', $pageData['page']['meta_description'] ?? 'Privacy Policy for StagePass Audio Visual Limited')
@section('keywords', $pageData['page']['meta_keywords'] ?? 'privacy policy, data protection, StagePass privacy')
@section('og_image', $pageData['page']['og_image'] ?? asset('uploads/StagePass-LOGO-y.png'))

@section('content')
<div class="min-h-screen bg-white">
    @if($loadError)
        <div class="bg-red-50 text-red-700 text-center py-4 font-semibold mt-20">{{ $loadError }}</div>
    @endif
    
    <!-- Breadcrumb -->
    <div class="pt-28 pb-4">
        <div class="mx-auto max-w-4xl px-6">
            @include('website.partials.breadcrumb', ['items' => [['label' => 'Privacy Policy', 'path' => '/privacy']]])
        </div>
    </div>
    
    <main class="mx-auto max-w-4xl px-6 py-16">
        @if($pageData && isset($pageData['page']))
            @if(!empty($pageData['page']['hero_title']))
                <h1 class="text-4xl md:text-5xl font-black text-[#172455] mb-4">{{ $pageData['page']['hero_title'] }}</h1>
            @endif
            @if(!empty($pageData['page']['hero_subtitle']))
                <p class="text-lg text-gray-600 mb-4">{{ $pageData['page']['hero_subtitle'] }}</p>
            @endif
            @if(!empty($pageData['page']['last_updated']))
                <p class="text-sm text-gray-500 mb-8">Last updated: {{ \Carbon\Carbon::parse($pageData['page']['last_updated'])->format('F j, Y') }}</p>
            @endif
            @if(!empty($pageData['page']['content']))
                <div class="prose prose-lg max-w-none text-gray-700 leading-7">{!! $pageData['page']['content'] !!}</div>
            @endif
        @else
            <div class="text-center py-12">
                <p class="text-gray-500">Content coming soon...</p>
            </div>
        @endif
    </main>
</div>
@endsection
