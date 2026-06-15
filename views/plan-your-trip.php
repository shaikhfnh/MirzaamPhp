<?php
// ============================================================
// views/trip.php  (Plan Your Trip)
// ============================================================
// Uses $site_blueprint['plan_trip'] + __() translations.
// Tightened spacing; replaced redundant map with itinerary.
// ============================================================

$pt    = $site_blueprint['plan_trip'] ?? [];
$lang  = $lang  ?? 'en';
$isRtl = ($lang === 'ar');

// SVG icon helper
function pt_icon($name, $class = 'w-5 h-5') {
    $paths = [
        'plane'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.5 12l5-2 3-7.5h2L11 10l5-2 1 3-5 2 2 5-3 1-2-5-2 5-3-1 2-5z"/>',
        'road'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 4l4 16h8l4-16M9 9h6M9 14h6"/>',
        'parking'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 8h4a3 3 0 010 6H9v6M5 4h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z"/>',
        'ticket'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 010 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 010-4V7a2 2 0 00-2-2H5z"/>',
        'clock'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 2M12 21a9 9 0 100-18 9 9 0 000 18z"/>',
        'family'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M16 7a4 4 0 11-8 0 4 4 0 018 0zm6 3a3 3 0 11-6 0 3 3 0 016 0zM8 10a3 3 0 11-6 0 3 3 0 016 0z"/>',
        'sunrise'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 18h18M5 18a7 7 0 1114 0M12 2v3M5.6 5.6l2.1 2.1M2 12h3M18.4 5.6l-2.1 2.1M19 12h3"/>',
        'sun'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2M5.6 5.6l1.4 1.4M3 12h2M18.4 5.6L17 7M21 12h-2M5.6 18.4L7 17M18.4 18.4L17 17M12 19v2M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>',
        'sunset'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 18h18M5 18a7 7 0 0114 0M12 9V3M9 6l3-3 3 3M2 12h3M19 12h3"/>',
        'moon'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>',
    ];
    $path = $paths[$name] ?? $paths['ticket'];
    return '<svg class="' . $class . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">' . $path . '</svg>';
}
?>

<div class="mt-20 bg-black text-white antialiased overflow-hidden"
     dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">


    <!-- ═══════════════════════════════════════════════
         HERO  (tightened: pt-16 instead of pt-24-36)
    ═══════════════════════════════════════════════ -->
    <section class="relative w-full pt-16 md:pt-20 pb-10 md:pb-14 px-4 sm:px-8 lg:px-16 xl:px-24 overflow-hidden">
        <div class="absolute -top-32 <?= $isRtl ? '-left-32' : '-right-32' ?> w-[500px] h-[500px] bg-yellow-500/10 rounded-full blur-[160px] pointer-events-none"></div>

        <div class="relative max-w-[1600px] mx-auto">
            <p class="inline-flex items-center gap-3 text-yellow-500 text-[11px] tracking-[0.4em] uppercase font-semibold mb-4">
                <span class="w-8 h-px bg-yellow-500/60"></span>
                <?= __('plantrip_eyebrow') ?>
            </p>
            <h1 class="text-5xl sm:text-7xl lg:text-8xl xl:text-9xl font-bold tracking-tighter leading-[0.9] text-white">
                <?= __('plantrip_title') ?>
                <span class="text-yellow-500"><?= __('plantrip_title_accent') ?></span>
            </h1>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════
         INTRO  (tightened: py-10 instead of py-16-20)
    ═══════════════════════════════════════════════ -->
    <section class="w-full py-10 md:py-12 px-4 sm:px-8 lg:px-16 xl:px-24 border-t border-b border-white/[0.08]">
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-12 items-start">
            <div class="lg:col-span-5">
                <p class="text-[10px] font-mono tracking-[0.3em] uppercase text-yellow-500/80 mb-3">
                    // <?= __('plantrip_intro_tag') ?>
                </p>
                <h3 class="text-2xl sm:text-3xl font-semibold text-white tracking-tight leading-[1.2]">
                    <?= __('plantrip_intro_heading') ?>
                </h3>
            </div>
            <div class="lg:col-span-7">
                <p class="text-base sm:text-lg font-light text-white/65 leading-[1.7]">
                    <?= __('plantrip_intro_body') ?>
                </p>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════
         STATS  (tightened padding)
    ═══════════════════════════════════════════════ -->
    <section class="w-full border-b border-white/[0.08]">
        <div class="max-w-[1600px] mx-auto grid grid-cols-2 lg:grid-cols-4">
            <?php foreach ($pt['stats'] as $i => $stat): ?>
                <div class="group relative p-6 sm:p-8 transition-colors duration-500 hover:bg-white/[0.02]
                    <?= $i > 0 && $i % 4 !== 0 ? ($isRtl ? 'lg:border-r' : 'lg:border-l') . ' border-white/[0.08]' : '' ?>
                    <?= $i === 1 ? ($isRtl ? 'border-r' : 'border-l') . ' border-white/[0.08] lg:border-0' : '' ?>
                    <?= $i === 3 ? ($isRtl ? 'border-r' : 'border-l') . ' border-white/[0.08] lg:border-0' : '' ?>
                    <?= $i < 2 ? 'border-b lg:border-b-0 border-white/[0.08]' : '' ?>">

                    <span class="text-[10px] font-mono tracking-[0.3em] uppercase text-yellow-500/70 mb-4 block">
                        <?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?>
                    </span>
                    <div class="flex items-baseline gap-1.5 mb-2">
                        <span class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white tracking-tight leading-none">
                            <?= __($stat['value_key']) ?>
                        </span>
                        <?php if (!empty($stat['unit_key'])): ?>
                            <span class="text-sm sm:text-base text-white/40 font-light">
                                <?= __($stat['unit_key']) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <p class="text-[10px] tracking-[0.25em] uppercase text-white/40 font-medium">
                        <?= __($stat['label_key']) ?>
                    </p>
                    <span class="absolute bottom-0 <?= $isRtl ? 'right-0' : 'left-0' ?> h-px bg-yellow-500 w-0 group-hover:w-full transition-all duration-700"></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════
         VENUE  (tighter padding, merged into one column flow)
    ═══════════════════════════════════════════════ -->
    <section class="w-full py-12 md:py-16 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-white/[0.08]">
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <div class="lg:col-span-4">
                <p class="text-[10px] font-mono tracking-[0.3em] uppercase text-yellow-500/80 mb-3">
                    // <?= __('plantrip_venue_tag') ?>
                </p>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white leading-[1.05] uppercase">
                    <?= __('plantrip_venue_title') ?>
                </h2>
                <span class="block w-12 h-px bg-yellow-500 mt-4"></span>
            </div>
            <div class="lg:col-span-8 space-y-5">
                <p class="text-base text-white/65 font-light leading-[1.75]">
                    <?= __('plantrip_venue_body') ?>
                </p>
                <div class="relative <?= $isRtl ? 'pr-6 border-r-2' : 'pl-6 border-l-2' ?> border-yellow-500 py-1">
                    <svg class="absolute <?= $isRtl ? 'right-2 -top-1' : 'left-2 -top-1' ?> w-5 h-5 text-yellow-500/30" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9.5 6c-2.5 0-4.5 2-4.5 4.5V18h6v-6H7c0-1.7 1.3-3 3-3V6h-.5zm9 0c-2.5 0-4.5 2-4.5 4.5V18h6v-6h-4c0-1.7 1.3-3 3-3V6h-.5z"/>
                    </svg>
                    <p class="text-sm text-white/55 font-light italic leading-relaxed <?= $isRtl ? 'pr-6' : 'pl-6' ?>">
                        <?= __('plantrip_venue_quote') ?>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════
         LOGISTICS — By Air + By Road
    ═══════════════════════════════════════════════ -->
    <section class="w-full border-b border-white/[0.08]">

        <!-- compact eyebrow -->
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pt-12 md:pt-14 pb-6">
            <p class="text-[11px] tracking-[0.32em] uppercase text-yellow-500 font-semibold inline-flex items-center gap-3">
                <span class="w-10 h-px bg-yellow-500"></span>
                <?= __('plantrip_logistics_tag') ?>
            </p>
            <h2 class="mt-3 text-3xl sm:text-4xl font-bold tracking-tight text-white leading-tight">
                <?= __('plantrip_logistics_title') ?>
            </h2>
        </div>

        <div class="max-w-[1600px] mx-auto grid grid-cols-1 lg:grid-cols-2 border-t border-white/[0.08]">
            <?php foreach ($pt['logistics'] as $i => $card): ?>
                <article class="group relative p-6 sm:p-10
                    <?= $i === 0 ? ($isRtl ? 'lg:border-l' : 'lg:border-r') . ' border-b lg:border-b-0' : '' ?>
                    border-white/[0.08] hover:bg-white/[0.02] transition-colors duration-500">

                    <div class="flex items-center justify-between mb-6">
                        <span class="text-[10px] font-mono tracking-[0.25em] uppercase text-yellow-500/70">
                            // <?= __($card['tag_key']) ?>
                        </span>
                        <div class="w-9 h-9 rounded-full bg-yellow-500/10 border border-yellow-500/30 flex items-center justify-center text-yellow-500 group-hover:bg-yellow-500 group-hover:text-black transition">
                            <?= pt_icon($card['icon'], 'w-4 h-4') ?>
                        </div>
                    </div>

                    <h3 class="text-2xl sm:text-3xl font-bold uppercase text-white tracking-tight mb-3 leading-tight">
                        <?= __($card['title_key']) ?>
                    </h3>
                    <p class="text-sm text-white/55 font-light leading-relaxed mb-6 max-w-lg">
                        <?= __($card['desc_key']) ?>
                    </p>

                    <div class="aspect-[16/7] rounded-xl overflow-hidden bg-zinc-900 relative">
                        <img src="<?= htmlspecialchars($card['image']) ?>" alt=""
                             class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-1000 ease-out">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors duration-700"></div>
                    </div>

                    <?php if (!empty($card['cta'])): ?>
                        <?php
                            $cta        = $card['cta'];
                            $isExternal = !empty($cta['external']);
                            $href       = $isExternal ? $cta['url'] : get_url($cta['url']);
                            $target     = $isExternal ? ' target="_blank" rel="noopener noreferrer"' : '';
                        ?>
                        <div class="pt-5">
                            <a href="<?= htmlspecialchars($href) ?>"<?= $target ?>
                               class="group/btn inline-flex items-center gap-2 text-[11px] font-mono font-bold tracking-[0.2em] uppercase text-yellow-500 hover:text-yellow-300 transition-colors">
                                <?= __($cta['label_key']) ?>
                                <svg class="w-3.5 h-3.5 <?= $isRtl ? 'group-hover/btn:-translate-x-1 rotate-180' : 'group-hover/btn:translate-x-1' ?> transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7-7 7M5 12h14"/>
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════
         QUICK TIPS  (tightened)
    ═══════════════════════════════════════════════ -->
    <section class="w-full py-12 md:py-16 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-white/[0.08]">
        <div class="max-w-[1600px] mx-auto">
            <div class="mb-8">
                <p class="text-[11px] tracking-[0.32em] uppercase text-yellow-500 font-semibold inline-flex items-center gap-3 mb-3">
                    <span class="w-10 h-px bg-yellow-500"></span>
                    <?= __('plantrip_tips_tag') ?>
                </p>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-white leading-tight">
                    <?= __('plantrip_tips_title') ?>
                </h2>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                <?php foreach ($pt['tips'] as $tip): ?>
                    <div class="group p-5 rounded-2xl bg-white/[0.02] border border-white/[0.08] hover:border-yellow-500/40 hover:bg-white/[0.04] transition-all duration-300">
                        <div class="w-10 h-10 rounded-xl bg-yellow-500/10 border border-yellow-500/20 flex items-center justify-center text-yellow-500 mb-4 group-hover:bg-yellow-500 group-hover:text-black transition">
                            <?= pt_icon($tip['icon'], 'w-4 h-4') ?>
                        </div>
                        <h4 class="text-white font-semibold mb-1.5 text-sm tracking-tight">
                            <?= __($tip['title_key']) ?>
                        </h4>
                        <p class="text-xs sm:text-sm text-white/50 font-light leading-relaxed">
                            <?= __($tip['desc_key']) ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════
         SUGGESTED DAY ITINERARY  (replaces the map)
    ═══════════════════════════════════════════════ -->
    <section class="w-full py-12 md:py-16 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-white/[0.08]">
        <div class="max-w-[1600px] mx-auto">

            <div class="mb-10">
                <p class="text-[11px] tracking-[0.32em] uppercase text-yellow-500 font-semibold inline-flex items-center gap-3 mb-3">
                    <span class="w-10 h-px bg-yellow-500"></span>
                    <?= __('plantrip_day_tag') ?>
                </p>
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4">
                    <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-white leading-tight">
                        <?= __('plantrip_day_title') ?>
                    </h2>
                    <p class="text-sm text-white/55 font-light max-w-md">
                        <?= __('plantrip_day_subtitle') ?>
                    </p>
                </div>
            </div>

            <!-- Timeline -->
            <div class="relative">
                <!-- Vertical line (desktop only) -->
                <div class="hidden lg:block absolute <?= $isRtl ? 'right-1/2' : 'left-1/2' ?> top-4 bottom-4 w-px bg-gradient-to-b from-transparent via-yellow-500/30 to-transparent"></div>

                <div class="space-y-4 lg:space-y-0">
                    <?php
                    $itinerary = [
                        ['icon' => 'sunrise', 'time_key' => 'plantrip_day1_time', 'title_key' => 'plantrip_day1_title', 'desc_key' => 'plantrip_day1_desc'],
                        ['icon' => 'sun',     'time_key' => 'plantrip_day2_time', 'title_key' => 'plantrip_day2_title', 'desc_key' => 'plantrip_day2_desc'],
                        ['icon' => 'ticket',  'time_key' => 'plantrip_day3_time', 'title_key' => 'plantrip_day3_title', 'desc_key' => 'plantrip_day3_desc'],
                        ['icon' => 'sunset',  'time_key' => 'plantrip_day4_time', 'title_key' => 'plantrip_day4_title', 'desc_key' => 'plantrip_day4_desc'],
                        ['icon' => 'moon',    'time_key' => 'plantrip_day5_time', 'title_key' => 'plantrip_day5_title', 'desc_key' => 'plantrip_day5_desc'],
                    ];
                    foreach ($itinerary as $i => $item):
                        $isEven = ($i % 2 === 1);
                    ?>
                        <div class="group lg:grid lg:grid-cols-2 lg:gap-12 relative">

                            <!-- LEFT half (or full on mobile) -->
                            <?php if (!$isEven): ?>
                                <div class="<?= $isRtl ? 'lg:text-left lg:pr-12' : 'lg:text-right lg:pl-12' ?>">
                                    <div class="inline-block lg:block max-w-md <?= !$isRtl ? 'lg:ml-auto' : 'lg:mr-auto' ?>">
                                        <div class="bg-white/[0.02] border border-white/[0.08] rounded-2xl p-5 group-hover:border-yellow-500/40 group-hover:bg-white/[0.04] transition-all duration-300 <?= $isRtl ? 'text-right' : 'text-left' ?>">
                                            <p class="text-[10px] font-mono tracking-[0.25em] text-yellow-500 mb-2">
                                                <?= __($item['time_key']) ?>
                                            </p>
                                            <h4 class="text-lg font-bold text-white mb-1.5 tracking-tight">
                                                <?= __($item['title_key']) ?>
                                            </h4>
                                            <p class="text-sm text-white/55 font-light leading-relaxed">
                                                <?= __($item['desc_key']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden lg:block"></div>
                            <?php endif; ?>

                            <!-- Center node + icon (absolutely positioned over the line) -->
                            <div class="hidden lg:flex absolute <?= $isRtl ? 'right-1/2' : 'left-1/2' ?> -translate-x-1/2 top-4 w-10 h-10 rounded-full bg-black border-2 border-yellow-500/50 group-hover:border-yellow-500 group-hover:bg-yellow-500 transition items-center justify-center z-10 text-yellow-500 group-hover:text-black">
                                <?= pt_icon($item['icon'], 'w-4 h-4') ?>
                            </div>

                            <!-- Mobile inline icon -->
                            <div class="lg:hidden flex items-center gap-3 mb-2">
                                <div class="w-9 h-9 rounded-full bg-yellow-500/10 border border-yellow-500/40 flex items-center justify-center text-yellow-500">
                                    <?= pt_icon($item['icon'], 'w-4 h-4') ?>
                                </div>
                                <p class="text-[10px] font-mono tracking-[0.25em] text-yellow-500">
                                    <?= __($item['time_key']) ?>
                                </p>
                            </div>

                            <!-- RIGHT half -->
                            <?php if ($isEven): ?>
                                <div class="hidden lg:block"></div>
                                <div class="<?= $isRtl ? 'lg:text-right lg:pl-12' : 'lg:text-left lg:pr-12' ?>">
                                    <div class="inline-block lg:block max-w-md <?= !$isRtl ? 'lg:mr-auto' : 'lg:ml-auto' ?>">
                                        <div class="bg-white/[0.02] border border-white/[0.08] rounded-2xl p-5 group-hover:border-yellow-500/40 group-hover:bg-white/[0.04] transition-all duration-300 <?= $isRtl ? 'text-right' : 'text-left' ?>">
                                            <p class="text-[10px] font-mono tracking-[0.25em] text-yellow-500 mb-2">
                                                <?= __($item['time_key']) ?>
                                            </p>
                                            <h4 class="text-lg font-bold text-white mb-1.5 tracking-tight">
                                                <?= __($item['title_key']) ?>
                                            </h4>
                                            <p class="text-sm text-white/55 font-light leading-relaxed">
                                                <?= __($item['desc_key']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Mobile content (no left/right split) -->
                            <?php if (true): ?>
                                <div class="lg:hidden bg-white/[0.02] border border-white/[0.08] rounded-2xl p-5 group-hover:border-yellow-500/40 transition-all duration-300">
                                    <h4 class="text-base font-bold text-white mb-1.5 tracking-tight">
                                        <?= __($item['title_key']) ?>
                                    </h4>
                                    <p class="text-sm text-white/55 font-light leading-relaxed">
                                        <?= __($item['desc_key']) ?>
                                    </p>
                                </div>
                            <?php endif; ?>

                            <!-- Spacer between timeline items -->
                            <div class="lg:col-span-2 h-6 lg:h-8"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════
         FINAL CTA  (tightened)
    ═══════════════════════════════════════════════ -->
    <section class="relative w-full py-16 md:py-20 px-4 sm:px-8 lg:px-16 xl:px-24 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/5 via-transparent to-yellow-500/5 pointer-events-none"></div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-yellow-500/10 rounded-full blur-[160px] pointer-events-none"></div>

        <div class="relative max-w-[1000px] mx-auto text-center">
            <p class="text-yellow-500 text-[11px] tracking-[0.4em] uppercase font-semibold mb-4 inline-flex items-center gap-3">
                <span class="w-8 h-px bg-yellow-500/60"></span>
                <?= __('plantrip_cta_eyebrow') ?>
                <span class="w-8 h-px bg-yellow-500/60"></span>
            </p>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-white mb-4 leading-tight">
                <?= __('plantrip_cta_title') ?>
            </h2>
            <p class="text-base text-white/55 font-light max-w-2xl mx-auto mb-8 leading-relaxed">
                <?= __('plantrip_cta_desc') ?>
            </p>
            <a href="<?= htmlspecialchars(get_url('participants/2026')) ?>"
               class="group inline-flex items-center gap-3 bg-yellow-500 text-black px-7 py-3.5 rounded-full text-xs tracking-[0.2em] uppercase font-bold hover:bg-yellow-400 transition-all duration-300 hover:scale-105">
                <?= __('plantrip_cta_button') ?>
                <svg class="w-4 h-4 <?= $isRtl ? 'group-hover:-translate-x-1 rotate-180' : 'group-hover:translate-x-1' ?> transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7-7 7M5 12h14"/>
                </svg>
            </a>
        </div>
    </section>

</div>