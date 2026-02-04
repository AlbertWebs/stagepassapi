@extends('layouts.app')

@section('title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited')

@php
    $homepageData = $homepageData ?? [];
    $hero = $homepageData['hero'] ?? null;
    $about = $homepageData['about'] ?? null;
    $services = $homepageData['services'] ?? null;
    $stats = $homepageData['stats'] ?? null;
    $portfolio = $homepageData['portfolio'] ?? null;
    $industries = $homepageData['industries'] ?? null;
    $clients = $homepageData['clients'] ?? null;
    $contact = $homepageData['contact'] ?? null;
    $settings = $homepageData['settings'] ?? [];
    $portfolioSource = $settings['portfolio_source'] ?? 'instagram';
@endphp

@section('content')
<div class="min-h-screen bg-gray-900">
    <!-- Hero Section -->
    @include('sections.hero', ['data' => $hero])
    
    <!-- About Section -->
    @include('sections.about', ['data' => $about])
    
    <!-- Services Section -->
    @include('sections.services', ['data' => $services])
    
    <!-- Stats Section -->
    @include('sections.stats', ['data' => $stats])
    
    <!-- Portfolio Section -->
    @include('sections.portfolio', ['data' => $portfolio, 'portfolioSource' => $portfolioSource])
    
    <!-- Industries Section -->
    @include('sections.industries', ['data' => $industries])
    
    <!-- Clients Section -->
    @include('sections.clients', ['data' => $clients])
    
    <!-- Contact Section -->
    @include('sections.contact', ['data' => $contact])
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/homepage.js') }}"></script>
@endpush
