@php
    $homepageData = $homepageData ?? [];
    $pageData = $pageData ?? null;
    $loadError = $loadError ?? null;
@endphp
@extends('website.layouts.app')

@section('title', 'Contact Us - Get Your AV Quote | StagePass Audio Visual')
@section('description', $pageData['page']['meta_description'] ?? 'Contact StagePass Audio Visual Limited for professional audio visual services, event production, and technical support in Kenya. Get a free quote today.')
@section('keywords', $pageData['page']['meta_keywords'] ?? 'contact StagePass, AV quote Kenya, event production contact, audio visual services Nairobi')
@section('og_image', $pageData['page']['og_image'] ?? asset('uploads/StagePass-LOGO-y.png'))

@section('structured_data')
@verbatim
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Contact Us - StagePass Audio Visual Limited",
    "description": "Get in touch with StagePass Audio Visual Limited for professional audio visual and event production services in Kenya.",
    "url": "https://stagepass.co.ke/contact",
    "mainEntity": {
        "@type": "LocalBusiness",
        "name": "StagePass Audio Visual Limited",
        "telephone": "+254 729 171 351",
        "email": "info@stagepass.co.ke",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jacaranda Close, Ridgeways",
            "addressLocality": "Nairobi",
            "addressCountry": "KE"
        }
    }
}
</script>
@endverbatim
@endsection

@section('content')
<div class="min-h-screen bg-white">
    @if($loadError)
        <div class="bg-red-50 text-red-700 text-center py-4 font-semibold mt-20">{{ $loadError }}</div>
    @endif
    
    <!-- Breadcrumb -->
    <div class="pt-28 pb-4">
        <div class="mx-auto max-w-4xl px-6">
            @include('website.partials.breadcrumb', ['items' => [['label' => 'Contact', 'path' => '/contact']]])
        </div>
    </div>
    
    <!-- Homepage Contact Section -->
    @include('website.partials.contact', ['data' => $homepageData['contact'] ?? null])
    
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
                <div class="prose prose-lg max-w-none text-gray-700 leading-7 mb-8">{!! $pageData['page']['content'] !!}</div>
            @endif
            @if(!empty($pageData['page']['form_title']))
                <h2 class="text-2xl font-bold text-[#172455] mb-2">{{ $pageData['page']['form_title'] }}</h2>
            @endif
            @if(!empty($pageData['page']['form_description']))
                <p class="text-gray-600 mb-6">{{ $pageData['page']['form_description'] }}</p>
            @endif
        </main>
    @endif
    
    <!-- Google Maps Section -->
    <section class="mx-auto max-w-6xl px-6 py-12">
        <div class="rounded-2xl overflow-hidden shadow-2xl border-2 border-gray-200">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.912275276431!2d36.843964!3d-1.2210802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1607cace031f%3A0xf92242b77a4956a5!2sStagePass%20Audio%20Visual%20Limited!5e0!3m2!1sen!2ske!4v1769701077953!5m2!1sen!2ske" 
                width="100%" 
                height="450" 
                style="border: 0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"
                class="w-full"
                title="StagePass Audio Visual Location">
            </iframe>
        </div>
    </section>
</div>
@endsection
