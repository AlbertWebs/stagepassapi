@php
    $homepageData = $homepageData ?? [];
    $pageData = $pageData ?? null;
    $service = $service ?? '';
    $subservice = $subservice ?? null;
    $loading = $loading ?? false;
    $error = $error ?? null;
    
    $content = $pageData ?? [
        'title' => $service ? ucfirst(str_replace('-', ' ', $service)) : 'Service',
        'description' => 'Professional AV services for your event needs.'
    ];
    
    $pageTitle = !empty($content['title']) 
        ? $content['title'] . ' - StagePass Audio Visual Services'
        : 'Service - StagePass Audio Visual';
    
    $breadcrumbItems = [
        ['label' => 'Home', 'path' => '/'],
        ['label' => 'Services', 'path' => '/services'],
        ['label' => $content['title'] ?? 'Service', 'path' => '/services/' . $service . ($subservice ? '/' . $subservice : '')]
    ];
@endphp
@extends('website.layouts.app')

@section('title', $pageTitle)
@section('description', $content['description'] ?? 'Professional ' . ($content['title'] ?? '') . ' services from StagePass Audio Visual Limited in Kenya.')
@section('keywords', ($content['title'] ?? '') . ', audio visual services Kenya, AV services Nairobi, event production')
@section('og_image', $content['og_image'] ?? asset('uploads/StagePass-LOGO-y.png'))

@section('content')
@if($loading)
    <div class="min-h-screen bg-white flex items-center justify-center">
        <div class="h-12 w-12 rounded-full border-4 border-yellow-200 border-t-yellow-500 animate-spin"></div>
    </div>
@else
    <div class="min-h-screen bg-white">
        @if($error && !$pageData)
            <div class="pt-28 pb-4">
                <div class="mx-auto max-w-4xl px-6">
                    @include('website.partials.breadcrumb', ['items' => $breadcrumbItems])
                </div>
            </div>
            <main class="mx-auto max-w-4xl px-6 py-16">
                <h1 class="text-4xl md:text-5xl font-black text-[#172455] mb-6">{{ $content['title'] ?? 'Service' }}</h1>
                <p class="text-xl text-gray-700 leading-relaxed mb-8">{{ $error }}</p>
            </main>
        @else
            <!-- Breadcrumb -->
            <div class="pt-28 pb-4">
                <div class="mx-auto max-w-4xl px-6">
                    @include('website.partials.breadcrumb', ['items' => $breadcrumbItems])
                </div>
            </div>
            
            <!-- Service Content -->
            <main class="mx-auto max-w-4xl px-6 py-16">
                <h1 class="text-4xl md:text-5xl font-black text-[#172455] mb-6">{{ $content['title'] ?? 'Service' }}</h1>
                
                @if(!empty($content['description']))
                    <p class="text-xl text-gray-700 leading-relaxed mb-8">{{ $content['description'] }}</p>
                @endif
                
                @if(!empty($content['content']))
                    <div class="prose prose-lg max-w-none text-gray-700 leading-7 mb-8">{!! $content['content'] !!}</div>
                @else
                    <div class="prose prose-lg max-w-none text-gray-700 leading-7 mb-8">
                        <p>Content for this service page is being prepared. Please check back soon or contact us for more information.</p>
                    </div>
                @endif
            </main>
        @endif
    </div>
@endif
@endsection
