<?php
    $data = $data ?? null;
    $section = is_array($data) ? ($data['section'] ?? null) : ($data->section ?? null);
    $items = is_array($data) ? ($data['items'] ?? []) : ($data->items ?? []);
    $title = is_array($section) ? ($section['title'] ?? 'Our Capabilities') : ($section->title ?? 'Our Capabilities');
    $subtitle = is_array($section) ? ($section['description'] ?? 'Solutions tailored for high-impact digital and event experiences.') : ($section->description ?? 'Solutions tailored for high-impact digital and event experiences.');
?>

<section class="relative py-20 overflow-hidden" style="background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);">
    <style>
        @keyframes cap1Float {
            0%, 100% { transform: translate3d(0, 0, 0); }
            50% { transform: translate3d(0, -10px, 0); }
        }
        @keyframes cap1CardDrift {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        @keyframes cap1ChipFloat {
            0%, 100% { transform: translate3d(0, 0, 0); }
            50% { transform: translate3d(0, -12px, 0); }
        }
        .cap1-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 1rem;
            padding: 1px;
            background: linear-gradient(120deg, rgba(14, 165, 233, 0.35), rgba(99, 102, 241, 0.35), rgba(245, 158, 11, 0.35));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity .25s ease;
            pointer-events: none;
        }
        .cap1-card:hover::before { opacity: 1; }
        .cap1-card::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.16), rgba(99, 102, 241, 0.1));
            clip-path: polygon(100% 0, 0 0, 100% 100%);
            border-top-right-radius: 1rem;
            opacity: 0.85;
            pointer-events: none;
        }
        .cap1-card:hover .cap1-icon-wrap {
            transform: translateY(-2px) scale(1.06);
            box-shadow: 0 14px 28px rgba(30, 58, 138, 0.28);
        }
        .cap1-card .cap1-icon-wrap {
            border: 2px solid rgba(250, 204, 21, 0.42);
        }
        .cap1-chip {
            position: absolute;
            z-index: 1;
            border-radius: 9999px;
            padding: 0.35rem 0.75rem;
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-weight: 700;
            color: #334155;
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(148, 163, 184, 0.4);
            backdrop-filter: blur(6px);
            pointer-events: none;
            animation: cap1ChipFloat 6.5s ease-in-out infinite;
        }
    </style>
    <div class="absolute inset-0 opacity-[0.28] pointer-events-none" style="background-image: radial-gradient(#94a3b8 0.7px, transparent 0.7px); background-size: 22px 22px;"></div>
    <div class="pointer-events-none absolute -top-20 -right-20 h-72 w-72 rounded-full bg-cyan-200/40 blur-3xl" style="animation: cap1Float 7s ease-in-out infinite;"></div>
    <div class="pointer-events-none absolute -bottom-16 -left-16 h-72 w-72 rounded-full bg-indigo-200/30 blur-3xl" style="animation: cap1Float 9s ease-in-out infinite;"></div>
    <div class="relative container mx-auto px-6 lg:px-12">
        <div class="max-w-3xl mx-auto text-center mb-12">
            <span class="inline-flex items-center rounded-full border border-yellow-300 bg-yellow-50 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-yellow-700">Capabilities</span>
            <h2 class="text-5xl lg:text-6xl font-black text-[#172455] mt-6 mb-8"><?php echo e($title); ?></h2>
            <div class="h-2 w-32 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-full mx-auto mb-8"></div>
            <p class="mt-5 text-base lg:text-lg text-slate-600"><?php echo e($subtitle); ?></p>
        </div>
        <div class="mb-8 grid grid-cols-2 lg:grid-cols-4 gap-3">
            <div class="rounded-xl border border-yellow-200/80 bg-gradient-to-br from-white to-yellow-50/60 px-4 py-3 text-center">
                <p class="text-[11px] tracking-[0.14em] uppercase font-bold text-slate-400">Execution</p>
                <p class="mt-1 text-sm font-semibold text-slate-700">Enterprise Ready</p>
            </div>
            <div class="rounded-xl border border-yellow-200/80 bg-gradient-to-br from-white to-yellow-50/60 px-4 py-3 text-center">
                <p class="text-[11px] tracking-[0.14em] uppercase font-bold text-slate-400">Delivery</p>
                <p class="mt-1 text-sm font-semibold text-slate-700">End-to-End</p>
            </div>
            <div class="rounded-xl border border-yellow-200/80 bg-gradient-to-br from-white to-yellow-50/60 px-4 py-3 text-center">
                <p class="text-[11px] tracking-[0.14em] uppercase font-bold text-slate-400">Quality</p>
                <p class="mt-1 text-sm font-semibold text-slate-700">Measured Outcomes</p>
            </div>
            <div class="rounded-xl border border-yellow-200/80 bg-gradient-to-br from-white to-yellow-50/60 px-4 py-3 text-center">
                <p class="text-[11px] tracking-[0.14em] uppercase font-bold text-slate-400">Support</p>
                <p class="mt-1 text-sm font-semibold text-slate-700">Always On</p>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $titleItem = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? '');
                    $desc = is_array($item) ? ($item['description'] ?? '') : ($item->description ?? '');
                    $iconName = is_array($item) ? ($item['icon'] ?? 'Box') : ($item->icon ?? 'Box');
                    $serviceTags = ['Audio', 'Lighting', 'Staging', 'Visuals', 'Rigging', 'Design', 'Production', 'Graphics', 'Support'];
                    $serviceTag = $serviceTags[$idx % count($serviceTags)];
                ?>
                <article class="cap1-card group relative rounded-2xl border border-slate-200/90 bg-white/90 backdrop-blur p-7 shadow-sm transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-yellow-200/60" style="animation: cap1CardDrift 5.5s ease-in-out infinite; animation-delay: <?php echo e(($idx % 3) * 0.45); ?>s;">
                    <div class="absolute right-5 top-5 text-xs font-semibold text-slate-300">0<?php echo e($idx + 1); ?></div>
                    <span class="inline-flex items-center rounded-full border border-indigo-100 bg-indigo-50 px-2.5 py-1 text-[11px] font-semibold uppercase tracking-[0.12em] text-indigo-700">Capability</span>
                    <div class="cap1-icon-wrap mt-4 h-12 w-12 rounded-xl bg-gradient-to-br from-[#172455] to-[#1e3a8a] text-yellow-300 grid place-items-center transition-all duration-300 shadow-lg shadow-indigo-900/20">
                        <?php if($iconName === 'Monitor'): ?>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <?php elseif($iconName === 'Lightbulb'): ?>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                        <?php elseif($iconName === 'Palette'): ?>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                        <?php elseif($iconName === 'Volume2'): ?>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path></svg>
                        <?php else: ?>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        <?php endif; ?>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-[#172455]"><?php echo e($titleItem); ?></h3>
                    <p class="mt-3 text-sm lg:text-base text-slate-600"><?php echo e($desc); ?></p>
                    <div class="mt-5 h-px w-full bg-gradient-to-r from-transparent via-indigo-200 to-transparent"></div>
                    <div class="mt-4 flex items-center justify-between text-[11px] font-semibold uppercase tracking-[0.12em] text-slate-400">
                        <span><?php echo e($serviceTag); ?></span>
                        <span class="text-yellow-600/80">StagePass AV</span>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH C:\projects\stagepassapi\resources\views/website/partials/options/CapabilitiesOption1.blade.php ENDPATH**/ ?>