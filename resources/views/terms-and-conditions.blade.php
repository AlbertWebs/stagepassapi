@extends('layouts.marketing')

@section('title', 'Terms and Conditions - ' . config('app.name', 'StagePass'))
@section('meta_description', 'Review the terms and conditions that govern your use of ' . config('app.name', 'StagePass') . '.')
@section('canonical', url('/terms-and-conditions'))
@section('og_title', 'Terms and Conditions - ' . config('app.name', 'StagePass'))
@section('og_description', 'The terms that govern your use of our website and services.')
@section('og_image', url('/favicon.ico'))

@section('breadcrumb', 'Terms')
@section('page_title', 'Terms and Conditions')
@section('page_intro', 'Last updated: ' . now()->toFormattedDateString())

@section('content')
    <section class="mt-8 space-y-6 text-sm leading-7 text-[#706f6c] dark:text-[#A1A09A]">
        <p>
            These Terms and Conditions govern your use of {{ config('app.name', 'StagePass') }}. By accessing
            or using our website, you agree to comply with these terms.
        </p>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Use of the Website</h2>
            <p class="mt-2">
                You agree to use the website only for lawful purposes and in a way that does not infringe
                the rights of others or restrict their use of the site.
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Service Information</h2>
            <p class="mt-2">
                We strive to keep all information accurate and up to date. We reserve the right to modify or
                discontinue any content or service without notice.
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Intellectual Property</h2>
            <p class="mt-2">
                All content on this site, including text, graphics, and media, is the property of
                {{ config('app.name', 'StagePass') }} unless otherwise stated.
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Limitation of Liability</h2>
            <p class="mt-2">
                We are not liable for any indirect or consequential loss arising from the use of the website
                or any services provided.
            </p>
        </div>
    </section>
@endsection

@section('structured_data')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "Terms and Conditions - {{ config('app.name', 'StagePass') }}",
            "url": "{{ url('/terms-and-conditions') }}",
            "description": "Review the terms and conditions that govern your use of {{ config('app.name', 'StagePass') }}."
        }
    </script>
@endsection
