@extends('website.layouts.app')

@section('title', 'The Best Audio Visual Company in Kenya — StagePass Audio Visual Limited')
@section('description', 'StagePass Audio Visual Limited is Kenya\'s leading events and audio-visual company — offering professional sound systems, event production, video conferencing, stage lighting, LED screens and technical event support in Nairobi and across Kenya.')

@section('structured_data')
@php
    $logoUrl = $homepageData['settings']['site_logo_url'] ?? $homepageData['navigation']['logo_url'] ?? asset('uploads/StagePass-LOGO-y.png');
@endphp
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'StagePass Audio Visual Limited',
    'url' => 'https://stagepass.co.ke',
    'logo' => $logoUrl,
    'image' => $logoUrl,
    'description' => 'StagePass Audio Visual Limited provides professional audio visual, sound engineering, stage lighting, LED screens, and event production services across Kenya.',
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Jacaranda Close, Ridgeways',
        'addressLocality' => 'Nairobi',
        'addressRegion' => 'Nairobi',
        'addressCountry' => 'KE'
    ],
    'geo' => [
        '@type' => 'GeoCoordinates',
        'latitude' => -1.2210922,
        'longitude' => 36.8443046
    ],
    'areaServed' => [['@type' => 'Country', 'name' => 'Kenya']],
    'priceRange' => '$$',
    'telephone' => '+254 729 171 351',
    'email' => 'info@stagepass.co.ke',
    'sameAs' => [
        'https://facebook.com/stagepass',
        'https://twitter.com/stagepass',
        'https://linkedin.com/company/stagepass'
    ]
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')
<div class="min-h-screen bg-gray-900">
    @php
        $heroData = $homepageData['hero'] ?? null;
        if ($heroData && !is_array($heroData)) {
            $heroData = (array) $heroData;
        }
    @endphp
    <main id="home" class="relative">
        @include('website.partials.hero-video', ['data' => $heroData])
    </main>

    @include('website.partials.about', ['data' => $homepageData['about'] ?? null])
    @include('website.partials.services', ['data' => $homepageData['services'] ?? null])
    @include('website.partials.stats-video', ['data' => $homepageData['stats'] ?? null])
    @include('website.partials.industries', ['data' => $homepageData['industries'] ?? null])
    @include('website.partials.portfolio', ['data' => $homepageData['portfolio'] ?? null, 'portfolioSource' => $homepageData['settings']['portfolio_source'] ?? 'database'])
    @include('website.partials.clients', ['data' => $homepageData['clients'] ?? null])
    @include('website.partials.contact', ['data' => $homepageData['contact'] ?? null])
</div>
@endsection
