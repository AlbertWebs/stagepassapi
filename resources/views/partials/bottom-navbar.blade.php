@php
    $homepageData = $homepageData ?? [];
    $bottomLinks = $homepageData['navigation']['bottom_links'] ?? [];
    $isPage = $isPage ?? false;
    
    if (!$isPage && empty($bottomLinks)) {
        $bottomLinks = [
            ['label' => 'Home', 'href' => '#home', 'icon' => 'Home'],
            ['label' => 'About', 'href' => '#about', 'icon' => 'Info'],
            ['label' => 'Services', 'href' => '#services', 'icon' => 'Briefcase'],
            ['label' => 'Work', 'href' => '#portfolio', 'icon' => 'Camera'],
            ['label' => 'Contact', 'href' => '#contact', 'icon' => 'Mail'],
        ];
    }
@endphp

<div class="fixed bottom-0 left-0 right-0 bg-[#0f1b3d] border-t border-[#172455]/10 shadow-lg lg:hidden z-50">
    <div class="flex justify-around items-center h-16">
        @foreach($bottomLinks as $link)
            @php
                $href = $link['href'] ?? '#';
                $label = $link['label'] ?? '';
                $icon = $link['icon'] ?? 'Home';
            @endphp
            <a
                href="{{ $href }}"
                class="flex flex-col items-center justify-center text-xs font-bold transition-colors duration-200 text-gray-300 hover:text-white"
            >
                @if($icon === 'Home')
                    <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                @elseif($icon === 'Info')
                    <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                @elseif($icon === 'Briefcase')
                    <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                @elseif($icon === 'Camera')
                    <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                @elseif($icon === 'Mail')
                    <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                @else
                    <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                @endif
                <span>{{ $label }}</span>
            </a>
        @endforeach
    </div>
</div>
