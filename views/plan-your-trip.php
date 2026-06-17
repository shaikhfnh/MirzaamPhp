<?php
// ============================================================
// views/trip.php — FINAL
// ============================================================
// Changes in this pass:
// 1. Hero now uses a real photo ($pt['hero_image']) with the
//    same gradient curve as why-visit.php's hero — was
//    previously just a dark glow with no image.
// 2. Removed the "Suggested Day Itinerary" timeline section
//    entirely — content/data was unfinished and not requested.
// 3. References to 'map_embed' removed (no longer in data).
//
// Data: $site_blueprint['plan_trip']
// Translations: __() keys (unchanged)
// ============================================================

$pt    = $site_blueprint['plan_trip'] ?? [];
$lang  = $lang  ?? 'en';
$isRtl = ($lang === 'ar');
?>

<div class="mt-20 bg-white text-zinc-900 antialiased overflow-hidden"
     dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">


    <!-- ═══════════════════════════════════════════════════════
         HERO — real photo, same gradient curve as why-visit
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full h-[48vh] min-h-[380px] max-h-[560px] overflow-hidden">
        <img
            src="<?= htmlspecialchars($pt['hero_image']) ?>"
            alt=""
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0"
             style="background-image: linear-gradient(to bottom,
                rgba(0,0,0,0.60) 15%,
                rgba(0,0,0,0.35) 35%,
                rgba(0,0,0,0.15) 60%,
                rgba(0,0,0,0.04) 90%,
                rgba(255,255,255,1) 100%);">
        </div>

        <div class="absolute inset-x-0 bottom-0 px-4 sm:px-8 lg:px-16 xl:px-24 pb-10 md:pb-14">
            <div class="max-w-[1600px] mx-auto">
                <p class="inline-flex items-center gap-3 text-yellow-400 text-[11px] tracking-[0.4em] uppercase font-semibold mb-4">
                    <span class="w-8 h-px bg-yellow-400/70"></span>
                    <?= __('plantrip_eyebrow') ?>
                </p>
                <h1 class="text-5xl sm:text-7xl lg:text-8xl font-bold tracking-tighter text-white leading-[0.9]">
                    <?= __('plantrip_title') ?>
                    <span class="text-yellow-400"><?= __('plantrip_title_accent') ?></span>
                </h1>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         INTRO
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full py-12 md:py-16 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-zinc-100 wv-reveal" data-reveal>
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-12 items-start">
            <div class="lg:col-span-4">
                <p class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono mb-3">
                    <?= __('plantrip_intro_tag') ?>
                </p>
                <h3 class="text-2xl sm:text-3xl font-semibold text-zinc-900 tracking-tight leading-[1.2]">
                    <?= __('plantrip_intro_heading') ?>
                </h3>
            </div>
            <div class="lg:col-span-8">
                <p class="text-xl sm:text-2xl font-light text-zinc-600 leading-[1.6] tracking-tight">
                    <?= __('plantrip_intro_body') ?>
                </p>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         STATS
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full border-b border-zinc-100 bg-zinc-50/50">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-12 md:py-16">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
                <?php foreach ($pt['stats'] as $i => $stat): ?>
                    <div class="wv-reveal group relative bg-white rounded-2xl border border-zinc-100 p-6 sm:p-8
                                transition-all duration-500 hover:shadow-[0_24px_48px_-12px_rgba(0,0,0,0.10)] hover:-translate-y-1 hover:border-zinc-200"
                         data-reveal data-delay="<?= $i * 60 ?>">

                        <div class="flex items-baseline gap-1.5 mb-2">
                            <span class="text-4xl sm:text-5xl font-bold text-zinc-900 tracking-tight leading-none">
                                <?= __($stat['value_key']) ?>
                            </span>
                            <?php if (!empty($stat['unit_key'])): ?>
                                <span class="text-sm sm:text-base text-zinc-400 font-light">
                                    <?= __($stat['unit_key']) ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        <p class="text-[10px] tracking-[0.25em] uppercase text-zinc-400 font-medium">
                            <?= __($stat['label_key']) ?>
                        </p>

                        <span class="absolute bottom-6 sm:bottom-8 <?= $isRtl ? 'right-6 sm:right-8' : 'left-6 sm:left-8' ?> h-[3px] w-0 bg-yellow-500 rounded-full group-hover:w-10 transition-all duration-500"></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         VENUE
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full py-14 md:py-20 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-zinc-100 wv-reveal" data-reveal>
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            <div class="lg:col-span-4">
                <p class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono mb-3">
                    <?= __('plantrip_venue_tag') ?>
                </p>
                <h2 class="text-4xl sm:text-5xl font-bold tracking-tight text-zinc-900 leading-[1.0] uppercase">
                    <?= __('plantrip_venue_title') ?>
                </h2>
                <span class="block w-12 h-px bg-yellow-500 mt-5"></span>
            </div>
            <div class="lg:col-span-8 space-y-6">
                <p class="text-base sm:text-lg text-zinc-600 font-light leading-[1.75]">
                    <?= __('plantrip_venue_body') ?>
                </p>
                <div class="relative <?= $isRtl ? 'pr-6 border-r-2' : 'pl-6 border-l-2' ?> border-yellow-500 py-1">
                    <svg class="absolute <?= $isRtl ? 'right-2 -top-1' : 'left-2 -top-1' ?> w-5 h-5 text-yellow-500/40" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9.5 6c-2.5 0-4.5 2-4.5 4.5V18h6v-6H7c0-1.7 1.3-3 3-3V6h-.5zm9 0c-2.5 0-4.5 2-4.5 4.5V18h6v-6h-4c0-1.7 1.3-3 3-3V6h-.5z"/>
                    </svg>
                    <p class="text-sm text-zinc-500 font-light italic leading-relaxed <?= $isRtl ? 'pr-6' : 'pl-6' ?>">
                        <?= __('plantrip_venue_quote') ?>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         LOGISTICS — By Air + By Road
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full">

        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pt-14 md:pt-20 pb-8 wv-reveal" data-reveal>
            <div class="flex items-center gap-4">
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono">
                    <?= __('plantrip_logistics_tag') ?>
                </span>
                <span class="flex-1 h-px bg-zinc-100"></span>
            </div>
        </div>

        <?php foreach ($pt['logistics'] as $i => $card): ?>
            <div class="w-full grid grid-cols-1 lg:grid-cols-12 border-b border-zinc-100 items-stretch wv-reveal"
                 data-reveal data-delay="<?= $i * 50 ?>">

                <!-- Image side -->
                <div class="w-full lg:col-span-6 aspect-video lg:aspect-auto lg:h-[46vh] xl:h-[50vh] bg-zinc-50 relative overflow-hidden group
                    <?= $i === 1 ? 'lg:order-2' : 'lg:order-1' ?>">
                    <img src="<?= htmlspecialchars($card['image']) ?>" alt=""
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 ease-out group-hover:scale-105">

                    <div class="absolute <?= $isRtl ? 'right-4' : 'left-4' ?> bottom-4">
                        <span class="inline-flex items-center gap-2 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-[10px] font-mono tracking-[0.2em] uppercase text-zinc-700">
                            <?= __($card['title_key']) ?>
                        </span>
                    </div>
                </div>

                <!-- Text side -->
                <div class="w-full lg:col-span-6 flex items-center <?= $i % 2 === 0 ? 'bg-white' : 'bg-zinc-50' ?> px-6 py-12 sm:p-12 md:p-16 lg:p-20
                    <?= $i === 1 ? 'lg:order-1' : 'lg:order-2' ?>">
                    <div class="max-w-xl w-full">

                        <span class="block w-12 h-px bg-yellow-500/50 mb-6"></span>

                        <h2 class="text-[2.75rem] sm:text-6xl font-bold tracking-tight text-zinc-900 mb-5 leading-[1.0] uppercase">
                            <?= __($card['title_key']) ?>
                        </h2>

                        <p class="text-[15px] sm:text-base text-zinc-500 font-light leading-[1.75] mb-2">
                            <?= __($card['desc_key']) ?>
                        </p>

                        <?php if (!empty($card['cta'])): ?>
                            <?php
                                $cta        = $card['cta'];
                                $isExternal = !empty($cta['external']);
                                $href       = $isExternal ? $cta['url'] : get_url($cta['url']);
                                $target     = $isExternal ? ' target="_blank" rel="noopener noreferrer"' : '';
                            ?>
                            <div class="pt-7">
                                <a href="<?= htmlspecialchars($href) ?>"<?= $target ?>
                                   class="group/btn inline-flex items-center gap-3 px-6 py-3 rounded-full border border-zinc-900 text-zinc-900 text-xs tracking-[0.2em] uppercase font-semibold hover:bg-zinc-900 hover:text-white transition-all duration-300">
                                    <?= __($cta['label_key']) ?>
                                    <svg class="w-3.5 h-3.5 <?= $isRtl ? 'group-hover/btn:-translate-x-1 rotate-180' : 'group-hover/btn:translate-x-1' ?> transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         QUICK TIPS
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full py-14 md:py-20 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-zinc-100 bg-zinc-50/50">
        <div class="max-w-[1600px] mx-auto">
            <div class="mb-10 wv-reveal" data-reveal>
                <p class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono mb-3">
                    <?= __('plantrip_tips_tag') ?>
                </p>
                <h2 class="text-4xl sm:text-5xl font-bold tracking-tight text-zinc-900 leading-tight">
                    <?= __('plantrip_tips_title') ?>
                </h2>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
                <?php foreach ($pt['tips'] as $i => $tip): ?>
                    <div class="wv-reveal group bg-white rounded-2xl border border-zinc-100 p-6
                                transition-all duration-500 hover:shadow-[0_24px_48px_-12px_rgba(0,0,0,0.10)] hover:-translate-y-1 hover:border-zinc-200"
                         data-reveal data-delay="<?= $i * 60 ?>">
                        <h4 class="text-zinc-900 font-semibold mb-2 text-base tracking-tight">
                            <?= __($tip['title_key']) ?>
                        </h4>
                        <p class="text-sm text-zinc-500 font-light leading-relaxed">
                            <?= __($tip['desc_key']) ?>
                        </p>
                        <span class="block h-[3px] w-0 bg-yellow-500 rounded-full group-hover:w-10 transition-all duration-500 mt-4"></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         FINAL CTA — dark band, bridges to black footer
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full py-20 md:py-28 px-4 sm:px-8 lg:px-16 xl:px-24 overflow-hidden bg-zinc-950 wv-grid-texture">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 via-transparent to-yellow-500/5 pointer-events-none"></div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-yellow-500/10 rounded-full blur-[160px] pointer-events-none"></div>

        <div class="relative max-w-[1000px] mx-auto text-center wv-reveal" data-reveal>
            <p class="text-yellow-500 text-[11px] tracking-[0.4em] uppercase font-semibold mb-5 inline-flex items-center gap-3">
                <span class="w-8 h-px bg-yellow-500/60"></span>
                <?= __('plantrip_cta_eyebrow') ?>
                <span class="w-8 h-px bg-yellow-500/60"></span>
            </p>
            <h2 class="text-5xl sm:text-6xl font-bold tracking-tight text-white mb-5 leading-tight">
                <?= __('plantrip_cta_title') ?>
            </h2>
            <p class="text-base text-white/55 font-light max-w-2xl mx-auto mb-9 leading-relaxed">
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