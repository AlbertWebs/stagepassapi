@extends('layouts.marketing')

@section('title', 'Privacy Policy - ' . config('app.name', 'StagePass'))
@section('meta_description', 'Read how ' . config('app.name', 'StagePass') . ' collects, uses, and protects your information.')
@section('canonical', url('/privacy'))
@section('og_title', 'Privacy Policy - ' . config('app.name', 'StagePass'))
@section('og_description', 'How we collect, use, and protect your information.')
@section('og_image', url('/favicon.ico'))

@section('breadcrumb', 'Privacy')
@section('page_title', 'Privacy Policy')
@section('page_intro', 'Last updated: ' . now()->toFormattedDateString())

@section('content')
    <section class="mt-8 space-y-6 text-sm leading-7 text-[#706f6c] dark:text-[#A1A09A]">
        <p>
            This Privacy Policy explains how {{ config('app.name', 'StagePass') }} collects, uses, and protects
            your information when you use our website or contact us.
        </p>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Information We Collect</h2>
            <p class="mt-2">
                We collect the information you provide when you submit a contact form, request a quote, or
                communicate with us directly. This may include your name, email address, phone number, and
                any details you choose to share.
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">How We Use Information</h2>
            <p class="mt-2">
                We use your information to respond to inquiries, provide services, improve our offerings,
                and communicate important updates. We do not sell or rent your personal information.
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Data Retention</h2>
            <p class="mt-2">
                We retain information only as long as needed to fulfill the purposes described in this policy,
                unless a longer retention period is required by law.
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Your Rights</h2>
            <p class="mt-2">
                You can request access to, correction of, or deletion of your personal data by contacting us
                using the details provided on our website.
            </p>
        </div>
    </section>
@endsection

@section('structured_data')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebPage",
            "name": "Privacy Policy - {{ config('app.name', 'StagePass') }}",
            "url": "{{ url('/privacy') }}",
            "description": "Read how {{ config('app.name', 'StagePass') }} collects, uses, and protects your information."
        }
    </script>
@endsection
