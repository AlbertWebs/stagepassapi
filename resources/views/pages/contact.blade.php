@extends('layouts.marketing')

@section('title', 'Contact - ' . config('app.name', 'StagePass'))
@section('meta_description', 'Start your next project with ' . config('app.name', 'StagePass') . '. Tell us about your goals and we will respond within two business days.')
@section('canonical', url('/contact'))
@section('og_title', 'Contact ' . config('app.name', 'StagePass'))
@section('og_description', 'Start your next project with our studio. Share your goals and we will respond within two business days.')
@section('og_image', url('/favicon.ico'))

@section('breadcrumb', 'Contact')
@section('page_title', 'Let’s build something premium.')
@section('page_intro', 'Tell us about your goals, timeline, and expectations. We will map the fastest path to impact.')

@section('content')
    <div class="mt-6 space-y-6 text-sm leading-7 text-[#706f6c] dark:text-[#A1A09A]">
        <p>
            We keep engagements focused and senior-led. Share a short brief and we’ll follow up with a tailored plan.
        </p>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Email</h2>
            <p class="mt-2">
                <a href="mailto:hello@stagepass.com" class="text-[#f53003] dark:text-[#FF4433] underline underline-offset-4">
                    hello@stagepass.com
                </a>
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Phone</h2>
            <p class="mt-2">
                <a href="tel:+15550100000" class="text-[#f53003] dark:text-[#FF4433] underline underline-offset-4">
                    +1 (555) 010-0000
                </a>
            </p>
        </div>
        <div>
            <h2 class="text-base font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Office hours</h2>
            <p class="mt-2">Monday–Friday, 9am–6pm.</p>
        </div>
    </div>
@endsection

@section('structured_data')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ContactPage",
            "name": "Contact {{ config('app.name', 'StagePass') }}",
            "url": "{{ url('/contact') }}",
            "description": "Start your next project with {{ config('app.name', 'StagePass') }}. Tell us about your goals and we will respond within two business days."
        }
    </script>
@endsection
