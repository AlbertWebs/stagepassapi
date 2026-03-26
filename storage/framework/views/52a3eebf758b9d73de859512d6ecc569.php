<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Industries We Serve') : ($section->title ?? 'Industries We Serve');
    $subtitle = is_array($section) ? ($section['subtitle'] ?? 'Select an industry to view tailored capabilities and service coverage.') : ($section->subtitle ?? 'Select an industry to view tailored capabilities and service coverage.');
?>

<section x-data="{ selectedIndustry: null, isModalOpen: false }" class="relative py-20 overflow-hidden" style="background: linear-gradient(160deg, #f8fafc 0%, #eef2ff 55%, #fff7ed 100%);">
    <style>
        @keyframes ind1Glow {
            0%, 100% { transform: scale(1) translateY(0); opacity: .45; }
            50% { transform: scale(1.08) translateY(-8px); opacity: .75; }
        }
        @keyframes ind1TileDrift {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
        @keyframes ind1RingSpin {
            to { transform: rotate(360deg); }
        }
        .ind1-card::before {
            content: "";
            position: absolute;
            inset: -1px;
            border-radius: 1rem;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.35), rgba(14, 165, 233, 0.35), rgba(245, 158, 11, 0.45));
            z-index: 0;
            opacity: 0;
            transition: opacity .25s ease;
        }
        .ind1-card:hover::before { opacity: 1; }
        .ind1-card::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 2px;
            background: linear-gradient(90deg, rgba(99, 102, 241, 0), rgba(99, 102, 241, 0.65), rgba(14, 165, 233, 0.65), rgba(245, 158, 11, 0));
            opacity: 0;
            transition: opacity .25s ease;
        }
        .ind1-card:hover::after { opacity: 1; }
        .ind1-card-inner { position: relative; z-index: 1; border-radius: 0.95rem; }
        .ind1-card-inner::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: radial-gradient(circle at 85% 10%, rgba(245, 158, 11, 0.12) 0%, transparent 45%);
            opacity: 0;
            transition: opacity .25s ease;
            pointer-events: none;
        }
        .ind1-card:hover .ind1-card-inner::before { opacity: 1; }
        .ind1-orbit {
            position: absolute;
            width: 140px;
            height: 140px;
            border-radius: 9999px;
            border: 1px dashed rgba(99, 102, 241, 0.25);
            pointer-events: none;
            animation: ind1RingSpin 18s linear infinite;
        }
    </style>
    <div class="absolute inset-0 opacity-[0.22] pointer-events-none" style="background-image: radial-gradient(#94a3b8 0.7px, transparent 0.7px); background-size: 24px 24px;"></div>
    <div class="pointer-events-none absolute -left-20 top-20 h-72 w-72 rounded-full bg-indigo-200/50 blur-3xl" style="animation: ind1Glow 8s ease-in-out infinite;"></div>
    <div class="pointer-events-none absolute -right-16 bottom-10 h-72 w-72 rounded-full bg-amber-200/50 blur-3xl" style="animation: ind1Glow 10s ease-in-out infinite;"></div>
    <div class="ind1-orbit -top-12 left-[8%]"></div>
    <div class="ind1-orbit -bottom-10 right-[10%]" style="animation-direction: reverse; animation-duration: 20s;"></div>
    <div class="relative container mx-auto px-6 lg:px-12">
        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-flex items-center rounded-full border border-amber-200 bg-amber-50 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-amber-700">Industries</span>
            <h2 class="text-5xl lg:text-6xl font-black text-[#172455] mt-6 mb-8"><?php echo e($title); ?></h2>
            <div class="h-2 w-32 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mx-auto mb-8"></div>
            <p class="text-xl text-gray-700 max-w-3xl mx-auto font-medium" style="max-width:600px;"><?php echo e($subtitle); ?></p>
        </div>
        <div class="mt-7 mb-8 flex flex-wrap justify-center gap-2.5">
            <span class="rounded-full border border-indigo-200 bg-white/75 px-3 py-1 text-xs font-semibold text-indigo-700">B2B</span>
            <span class="rounded-full border border-cyan-200 bg-white/75 px-3 py-1 text-xs font-semibold text-cyan-700">Public Sector</span>
            <span class="rounded-full border border-amber-200 bg-white/75 px-3 py-1 text-xs font-semibold text-amber-700">Enterprise</span>
            <span class="rounded-full border border-slate-200 bg-white/75 px-3 py-1 text-xs font-semibold text-slate-700">SMEs</span>
        </div>
        <?php
            $totalItems = is_countable($items) ? count($items) : 0;
            $lgCols = 4;
            $lgRemainder = $totalItems % $lgCols;
        ?>
        <div class="mt-10 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $name = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                    $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                    $overlayDescription = is_array($item) ? ($item['overlay_description'] ?? null) : ($item->overlay_description ?? null);
                    $industryForJs = [
                        'title' => $name,
                        'description' => $desc ?: 'Tailored event solutions for this sector with strategic, technical, and creative support.',
                        'overlay_description' => $overlayDescription ? html_entity_decode($overlayDescription, ENT_QUOTES | ENT_HTML5, 'UTF-8') : null,
                    ];
                    $gridClass = '';
                    if ($lgRemainder === 2 && $idx === $totalItems - 2) {
                        $gridClass = 'lg:col-start-2';
                    } elseif ($lgRemainder === 2 && $idx === $totalItems - 1) {
                        $gridClass = 'lg:col-start-3';
                    }
                ?>
                <article class="ind1-card <?php echo e($gridClass); ?> group relative rounded-2xl p-[1px] transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-indigo-200/60 cursor-pointer focus-within:ring-2 focus-within:ring-indigo-400/60" style="animation: ind1TileDrift 6s ease-in-out infinite; animation-delay: <?php echo e(($idx % 4) * 0.35); ?>s;" @click="selectedIndustry = <?php echo \Illuminate\Support\Js::from($industryForJs)->toHtml() ?>; isModalOpen = true" tabindex="0" role="button" @keydown.enter.prevent="selectedIndustry = <?php echo \Illuminate\Support\Js::from($industryForJs)->toHtml() ?>; isModalOpen = true" @keydown.space.prevent="selectedIndustry = <?php echo \Illuminate\Support\Js::from($industryForJs)->toHtml() ?>; isModalOpen = true">
                    <div class="ind1-card-inner border border-slate-200/90 bg-white/90 backdrop-blur p-6 text-center">
                        <div class="mx-auto h-12 w-12 rounded-xl bg-gradient-to-br from-indigo-950 to-indigo-800 text-white grid place-items-center text-lg transition-transform duration-300 group-hover:scale-110 ring-2 ring-yellow-300/50"><?php echo e($idx % 3 === 0 ? '◉' : ($idx % 3 === 1 ? '◆' : '●')); ?></div>
                        <h3 class="mt-4 text-base lg:text-lg font-semibold text-[#172455]"><?php echo e($name); ?></h3>
                        <p class="mt-2 text-xs text-slate-500 opacity-80 transition-opacity duration-300 group-hover:opacity-100">Click or press Enter for details</p>
                        <span class="absolute right-4 top-4 text-[11px] font-semibold text-slate-300">#<?php echo e($idx + 1); ?></span>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div x-show="isModalOpen && selectedIndustry"
         x-transition.opacity
         @click.self="isModalOpen = false"
         @keydown.escape.window="isModalOpen = false"
         class="fixed inset-0 z-[99999] bg-[#0b1436]/75 backdrop-blur-[3px] flex items-center justify-center p-4"
         style="display: none;">
        <div x-show="isModalOpen && selectedIndustry"
             x-transition.scale
             class="relative w-full max-w-2xl rounded-2xl overflow-hidden border border-indigo-100 bg-white shadow-2xl">
            <div class="h-1.5 w-full bg-gradient-to-r from-[#172455] via-indigo-600 to-yellow-500"></div>
            <div class="p-7">
            <button type="button"
                    @click="isModalOpen = false"
                    class="absolute right-4 top-5 h-9 w-9 rounded-full border border-indigo-100 bg-white text-indigo-400 hover:text-[#172455] hover:border-indigo-300 hover:bg-indigo-50 transition-colors shadow-sm"
                    aria-label="Close">
                ×
            </button>
            <div class="inline-flex items-center gap-2 rounded-full border border-yellow-200 bg-yellow-50 px-3 py-1">
                <span class="h-2 w-2 rounded-full bg-yellow-500"></span>
                <p class="text-[11px] font-bold uppercase tracking-[0.16em] text-yellow-700">Industry Profile</p>
            </div>
            <div class="mt-3 flex items-start gap-3">
                <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-[#172455] to-indigo-700 text-white grid place-items-center shrink-0">◆</div>
                <h3 class="text-2xl lg:text-3xl font-black text-[#172455]" x-text="selectedIndustry && selectedIndustry.title"></h3>
            </div>
            <div class="mt-4 h-px w-full bg-gradient-to-r from-indigo-200 via-yellow-200 to-transparent"></div>
            <div class="mt-4 text-sm lg:text-base text-slate-600 leading-relaxed max-h-[60vh] overflow-y-auto pr-1">
                <template x-if="selectedIndustry && selectedIndustry.overlay_description">
                    <div class="prose prose-sm max-w-none text-slate-700 [&_p]:mb-2 [&_ul]:mb-2 [&_li]:mb-1 [&_strong]:text-[#172455] [&_h1]:text-[#172455] [&_h2]:text-[#172455] [&_h3]:text-[#172455]" x-html="selectedIndustry.overlay_description"></div>
                </template>
                <template x-if="selectedIndustry && !selectedIndustry.overlay_description">
                    <p x-text="selectedIndustry && selectedIndustry.description"></p>
                </template>
            </div>
            <div class="mt-5 flex items-center justify-between gap-3">
                <p class="text-xs text-slate-400">Tailored AV strategy and delivery</p>
                <button type="button" @click="isModalOpen = false" class="inline-flex items-center gap-1 rounded-lg bg-[#172455] px-3 py-2 text-xs font-semibold text-white hover:bg-[#0f1b3d] transition-colors">Close <span>→</span></button>
            </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/IndustriesOption1.blade.php ENDPATH**/ ?>