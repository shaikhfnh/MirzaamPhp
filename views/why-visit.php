<?php
// ============================================================
// views/why-visit.php — FINAL (icons removed, headings bumped,
// value cards converted to independent rounded blocks)
// ============================================================
// Changes in this pass:
// 1. Removed icon glyphs from value cards entirely
// 2. Headings bumped up a notch across the board (hero unchanged,
//    feature titles +1 step, value card titles +1 step)
// 3. Value cards: switched from a touching/shared-border grid to
//    independent cards with gaps + rounded-2xl corners + their
//    own border all the way around. This is the correct way to
//    do "rounded" — rounding corners on cells that share edges
//    in a continuous grid doesn't read well; independent blocks
//    with breathing room between them do.
//
// Reveal script/CSS still live in main.js / global.css (unchanged
// from the previous finalized pass) — nothing to re-add there.
//
// Data + translation keys unchanged.
// ============================================================

$wv     = $site_blueprint['why_visit'] ?? [];
$lang   = $lang   ?? 'en';
$isRtl  = ($lang === 'ar');
?>

<div class="mt-20 bg-white text-zinc-900 antialiased overflow-hidden"
     dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">


    <!-- ═══════════════════════════════════════════════════════
         HERO — unchanged
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full h-[52vh] min-h-[400px] max-h-[620px] overflow-hidden">
        <img
            src="<?= htmlspecialchars($wv['hero_image']) ?>"
            alt=""
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0"
             style="background-image: linear-gradient(to bottom,
                rgba(0,0,0,0.60) 0%,
                rgba(0,0,0,0.35) 25%,
                rgba(0,0,0,0.15) 50%,
                rgba(0,0,0,0.04) 75%,
                rgba(255,255,255,1) 100%);">
        </div>

        <div class="absolute inset-x-0 bottom-0 px-4 sm:px-8 lg:px-16 xl:px-24 pb-10 md:pb-14">
            <div class="max-w-[1600px] mx-auto">
                <p class="inline-flex items-center gap-3 text-yellow-400 text-[11px] tracking-[0.4em] uppercase font-semibold mb-4">
                    <span class="w-8 h-px bg-yellow-400/70"></span>
                    <?= __('whyvisit_eyebrow') ?>
                </p>
                <h1 class="text-5xl sm:text-7xl lg:text-8xl font-bold tracking-tighter text-white leading-[0.9]">
                    <?= __('whyvisit_title') ?>
                    <span class="text-yellow-400"><?= __('whyvisit_title_accent') ?></span>
                </h1>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         INTRO — heading-adjacent text bumped slightly
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full py-12 md:py-16 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-zinc-100 wv-reveal" data-reveal>
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
            <div class="hidden lg:flex lg:col-span-3 items-start gap-3">
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono">Overview</span>
            </div>
            <div class="lg:col-span-9 xl:col-span-8">
                <p class="text-2xl sm:text-3xl md:text-[2rem] font-light text-zinc-700 leading-[1.5] tracking-tight">
                    <?= __('whyvisit_intro') ?>
                </p>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         VALUE CARDS — independent rounded blocks, no icons,
         bigger titles
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full border-b border-zinc-100 bg-zinc-50/50">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pt-10 pb-6">
            <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono">Why It Matters</span>
        </div>

        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pb-12 md:pb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-5">

                <?php foreach ($wv['value_cards'] as $i => $card): ?>
                    <article class="wv-reveal group relative bg-white rounded-2xl border border-zinc-100 p-7 sm:p-8
                                     transition-all duration-500 hover:shadow-[0_24px_48px_-12px_rgba(0,0,0,0.10)] hover:-translate-y-1 hover:border-zinc-200"
                              data-reveal data-delay="<?= $i * 60 ?>">

                        <span class="block text-[10px] font-mono tracking-[0.25em] text-zinc-400 group-hover:text-yellow-600 transition-colors duration-500 mb-4">
                            <?= strtoupper(__($card['tag_key'])) ?>
                        </span>

                        <h3 class="text-2xl font-semibold tracking-tight text-zinc-900 mb-3.5 leading-[1.15]">
                            <?= __($card['title_key']) ?>
                        </h3>

                        <p class="text-sm text-zinc-500 font-light leading-relaxed">
                            <?= __($card['desc_key']) ?>
                        </p>

                        <!-- Rounded-corner-safe accent: a short bar instead of
                             a full-width bottom line (full-width lines look odd
                             against rounded corners) -->
                        <span class="absolute bottom-7 sm:bottom-8 <?= $isRtl ? 'right-7 sm:right-8' : 'left-7 sm:left-8' ?> h-[3px] w-0 bg-yellow-500 rounded-full group-hover:w-10 transition-all duration-500"></span>
                    </article>
                <?php endforeach; ?>

            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         EXPERIENCES — titles bumped up another notch
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full">

        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pt-14 md:pt-20 pb-8 wv-reveal" data-reveal>
            <div class="flex items-center gap-4">
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono">Experiences</span>
                <span class="flex-1 h-px bg-zinc-100"></span>
            </div>
        </div>

        <?php foreach ($wv['features'] as $i => $feature): ?>
            <div class="w-full grid grid-cols-1 lg:grid-cols-12 border-b border-zinc-100 items-stretch wv-reveal"
                 data-reveal data-delay="<?= $i * 50 ?>">

                <!-- Image side -->
                <div class="w-full lg:col-span-6 aspect-video lg:aspect-auto lg:h-[50vh] xl:h-[55vh] bg-zinc-50 relative overflow-hidden group
                    <?= $feature['flip'] ? 'lg:order-2' : 'lg:order-1' ?>">
                    <img
                        src="<?= htmlspecialchars($feature['image']) ?>"
                        alt=""
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 ease-out group-hover:scale-105">

                    <div class="absolute <?= $isRtl ? 'right-4' : 'left-4' ?> bottom-4">
                        <span class="inline-flex items-center gap-2 bg-white/90 backdrop-blur-sm px-3 py-1.5 rounded-full text-[10px] font-mono tracking-[0.2em] uppercase text-zinc-700">
                            <?= __($feature['title_key']) ?>
                        </span>
                    </div>
                </div>

                <!-- Text side -->
                <div class="w-full lg:col-span-6 flex items-center <?= $i % 2 === 0 ? 'bg-white' : 'bg-zinc-50' ?> px-6 py-12 sm:p-12 md:p-16 lg:p-20
                    <?= $feature['flip'] ? 'lg:order-1' : 'lg:order-2' ?>">
                    <div class="max-w-xl w-full">

                        <span class="block w-12 h-px bg-yellow-500/50 mb-6"></span>

                        <h2 class="text-[2.75rem] sm:text-6xl font-bold tracking-tight text-zinc-900 mb-5 leading-[1.0] uppercase">
                            <?= __($feature['title_key']) ?>
                        </h2>

                        <div class="space-y-4 text-[15px] sm:text-base text-zinc-500 font-light leading-[1.75]">
                            <p><?= __($feature['desc_key']) ?></p>
                            <?php if (!empty($feature['desc2_key'])): ?>
                                <p><?= __($feature['desc2_key']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </section>


    <!-- ═══════════════════════════════════════════════════════
         FINAL CTA — heading bumped slightly
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full py-20 md:py-28 px-4 sm:px-8 lg:px-16 xl:px-24 overflow-hidden bg-zinc-950 wv-grid-texture">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 via-transparent to-yellow-500/5 pointer-events-none"></div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-yellow-500/10 rounded-full blur-[160px] pointer-events-none"></div>

        <div class="relative max-w-[1000px] mx-auto text-center wv-reveal" data-reveal>
            <p class="text-yellow-500 text-[11px] tracking-[0.4em] uppercase font-semibold mb-5 inline-flex items-center gap-3">
                <span class="w-8 h-px bg-yellow-500/60"></span>
                <?= __($wv['final_cta']['eyebrow_key']) ?>
                <span class="w-8 h-px bg-yellow-500/60"></span>
            </p>
            <h2 class="text-5xl sm:text-6xl font-bold tracking-tight text-white mb-5 leading-tight">
                <?= __($wv['final_cta']['title_key']) ?>
            </h2>
            <p class="text-base text-white/55 font-light max-w-2xl mx-auto mb-9 leading-relaxed">
                <?= __($wv['final_cta']['desc_key']) ?>
            </p>
            <a href="<?= htmlspecialchars(get_url($wv['final_cta']['button_planyourtrip_url'])) ?>"
               class="group inline-flex items-center gap-3 bg-yellow-500 text-black px-7 py-3.5 rounded-full text-xs tracking-[0.2em] uppercase font-bold hover:bg-yellow-400 transition-all duration-300 hover:scale-105">
                <?= __($wv['final_cta']['button_key']) ?>
                <svg class="w-4 h-4 <?= $isRtl ? 'group-hover:-translate-x-1 rotate-180' : 'group-hover:translate-x-1' ?> transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>

            <div class="mt-14 pt-10 border-t border-white/10 grid grid-cols-3 gap-6 max-w-lg mx-auto">
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-white">5</p>
                    <p class="text-[10px] tracking-[0.2em] uppercase text-white/40 mt-1">Days</p>
                </div>
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-white">200+</p>
                    <p class="text-[10px] tracking-[0.2em] uppercase text-white/40 mt-1">Exhibitors</p>
                </div>
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-white">Free</p>
                    <p class="text-[10px] tracking-[0.2em] uppercase text-white/40 mt-1">Entry</p>
                </div>
            </div>
        </div>
    </section>

</div>