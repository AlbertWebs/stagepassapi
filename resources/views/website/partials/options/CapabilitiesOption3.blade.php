@php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Our Capabilities') : ($section->title ?? 'Our Capabilities');
    $subtitle = is_array($section) ? ($section['subtitle'] ?? 'From creative direction to technical execution, we deliver end-to-end AV experiences built for impact.') : ($section->subtitle ?? 'From creative direction to technical execution, we deliver end-to-end AV experiences built for impact.');
    $video = is_array($section) ? ($section['background_video_url'] ?? null) : ($section->background_video_url ?? null);
    $youtubeId = 'sJSNvegZDoI';
    if (is_string($video) && $video !== '') {
        if (preg_match('~(?:youtube\.com/watch\?v=|youtu\.be/|youtube\.com/embed/)([A-Za-z0-9_-]{11})~', $video, $matches)) {
            $youtubeId = $matches[1];
        }
    }
@endphp

<section class="relative py-24 overflow-hidden text-white">
    <style>
        @keyframes cap3Pulse {
            0%, 100% { transform: scale(1); opacity: .65; }
            50% { transform: scale(1.05); opacity: .9; }
        }
        .cap3-card {
            position: relative;
            overflow: hidden;
            isolation: isolate;
            border-radius: 1.25rem;
            border: 1px solid rgba(255,255,255,0.14);
            background: linear-gradient(160deg, rgba(15,23,42,.62), rgba(15,23,42,.38));
            backdrop-filter: blur(12px);
            box-shadow: 0 10px 30px rgba(2,6,23,.22);
            transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease, background .3s ease;
        }
        .cap3-card:hover {
            transform: translateY(-6px);
            border-color: rgba(251,191,36,.45);
            box-shadow: 0 20px 45px rgba(0,0,0,.35);
            background: linear-gradient(160deg, rgba(15,23,42,.72), rgba(15,23,42,.46));
        }
        .cap3-card:focus-within {
            border-color: rgba(251,191,36,.55);
            box-shadow: 0 0 0 2px rgba(251,191,36,.24), 0 20px 45px rgba(0,0,0,.35);
        }
        .cap3-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,.10) 45%, transparent 65%);
            transform: translateX(-120%);
            transition: transform .65s ease;
            pointer-events: none;
        }
        .cap3-card:hover::before { transform: translateX(120%); }
        .cap3-card::after {
            content: "";
            position: absolute;
            left: -12%;
            top: -22%;
            width: 54%;
            height: 54%;
            border-radius: 9999px;
            background: radial-gradient(circle, rgba(251,191,36,.2), transparent 65%);
            pointer-events: none;
            z-index: -1;
        }
        .cap3-chip-dot { animation: cap3Pulse 2.4s ease-in-out infinite; }
        .cap3-bg-video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 177.78%;
            height: 100%;
            min-width: 100%;
            min-height: 177.78%;
            transform: translate(-50%, -50%) scale(1.12);
            opacity: .36;
            filter: brightness(.62) saturate(.72) contrast(1.05);
            border: 0;
            pointer-events: none;
        }
        @media (prefers-reduced-motion: reduce) {
            .cap3-chip-dot { animation: none; }
            .cap3-card,
            .cap3-card::before { transition: none; }
        }
    </style>
    <div class="absolute inset-0 bg-[#030712]"></div>
    @if($youtubeId)
        <iframe
            class="cap3-bg-video"
            src="https://www.youtube.com/embed/{{ $youtubeId }}?autoplay=1&mute=1&loop=1&playlist={{ $youtubeId }}&controls=0&showinfo=0&modestbranding=1&rel=0&playsinline=1"
            title="Capabilities background video"
            frameborder="0"
            allow="autoplay; encrypted-media; picture-in-picture"
            referrerpolicy="strict-origin-when-cross-origin"
            aria-hidden="true"></iframe>
    @elseif($video)
        <video class="absolute inset-0 w-full h-full object-cover" autoplay muted loop playsinline aria-hidden="true">
            <source src="{{ $video }}" type="video/mp4">
        </video>
    @endif
    <div class="absolute inset-0 bg-gradient-to-br from-[#020617]/88 via-[#0f172a]/76 to-black/82"></div>
    <div class="relative container mx-auto px-6 lg:px-12">
        <div class="max-w-4xl">
            <p class="inline-flex items-center rounded-full border border-amber-300/35 bg-amber-300/10 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.2em] text-amber-200">
                Core Capabilities
            </p>
            <h2 class="mt-5 text-3xl sm:text-4xl lg:text-6xl font-black leading-tight">{{ $title }}</h2>
            <p class="mt-5 max-w-3xl text-slate-200/95 text-base sm:text-lg">{{ $subtitle }}</p>
        </div>
        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-7">
            @forelse($items as $idx => $item)
                @php
                    $titleItem = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                    $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                    $delay = ($idx % 6) * 50;
                @endphp
                <article class="cap3-card h-full flex flex-col p-7 lg:p-8">
                    <p class="absolute right-5 top-5 text-[11px] font-bold tracking-[0.18em] text-white/35">
                        {{ str_pad((string) ($idx + 1), 2, '0', STR_PAD_LEFT) }}
                    </p>
                    <div class="flex items-center gap-3">
                        <span class="cap3-chip-dot inline-block h-2.5 w-2.5 rounded-full bg-amber-300"></span>
                    </div>
                    <h3 class="mt-4 text-xl sm:text-2xl font-bold leading-snug text-white">{{ $titleItem }}</h3>
                    <p class="mt-4 text-white/85 text-sm lg:text-base leading-relaxed">
                        {{ $desc ?: 'Tailored production support designed to elevate event experiences from planning to live delivery.' }}
                    </p>
                    <div class="mt-auto pt-6 h-px w-full bg-gradient-to-r from-amber-300/75 via-white/45 to-transparent"></div>
                </article>
            @empty
                <article class="cap3-card p-7 lg:p-8 md:col-span-2 xl:col-span-3">
                    <h3 class="text-xl font-bold text-white">Capabilities coming soon</h3>
                    <p class="mt-3 text-white/80">We are preparing a refreshed capabilities lineup for this page.</p>
                </article>
            @endforelse
        </div>
    </div>
</section>
