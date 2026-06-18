<?php
/**
 * MIRZAAMIYAT — sub-brand homepage
 * These variables are injected from index.php/init
 * @var string $lang
 * @var array $site_blueprint
 */

$mz_categories = $site_blueprint['mirzaamiyat']['categories'];
$mz_sponsors   = $site_blueprint['mirzaamiyat']['sponsors'];
$mz_gallery    = $site_blueprint['mirzaamiyat']['gallery'];
$mz_hero_image = $site_blueprint['mirzaamiyat']['hero_image'];

$isRtl = ($lang === 'ar');

// Simple line-icon set for the 9 categories — hand-drawn to match
// the rest of the site's stroke-icon convention (24x24, currentColor).
$mz_cat_icons = [
    'accessories' => '<path d="M9 3.5h6l2 5.5H7l2-5.5z"/><path d="M12 9v9M8.5 20.5h7"/>',
    'gifting'     => '<rect x="3.5" y="9" width="17" height="11" rx="1"/><path d="M3.5 9h17M12 9v11M8 9a2.5 2.5 0 010-5C11 4 12 9 12 9s1-5 4-5a2.5 2.5 0 010 5"/>',
    'mothersday'  => '<path d="M12 20s-7.5-4.6-9.8-9.3A4.8 4.8 0 0112 6.2a4.8 4.8 0 019.8 4.5C19.5 15.4 12 20 12 20z"/>',
    'carpets'     => '<rect x="3.5" y="5.5" width="17" height="13" rx="1"/><rect x="7" y="9" width="10" height="6" rx="0.5"/>',
    'outdoor'     => '<path d="M5 20.5c0-8.5 4.7-15 13.5-15 0 8.5-4.7 15-13.5 15z"/><path d="M5 20.5c2-5.5 5.7-9.3 10.3-11.2"/>',
    'fragrance'   => '<path d="M12 20.5v-3.7M8.3 20.5h7.4M10.6 12.8c-1.4-1.4-1.4-2.8 0-4.2s1.4-2.8 0-4.2M13.6 12.8c-1.4-1.4-1.4-2.8 0-4.2s1.4-2.8 0-4.2"/>',
    'tableware'   => '<circle cx="12" cy="14.5" r="6.3"/><path d="M9 3v4.3M12 3v4.3M15 3v4.3"/>',
    'serveware'   => '<path d="M3 13.2a9 9 0 0118 0H3z"/><path d="M1.5 13.2h21M12 5v2.2"/>',
    'rentals'     => '<path d="M6 11.5V7.8A2 2 0 018 5.8h8a2 2 0 012 2v3.7"/><path d="M4.5 11.5h15v6.2a1 1 0 01-1 1H5.5a1 1 0 01-1-1v-6.2z"/><path d="M4.5 14.7H2.3v3.2M21.5 14.7h-2.2v3.2"/>',
];
?>

<!-- Mirzaamiyat-only display face: Markazi Text (Arabic + Latin
     serif) used for the wordmark and big section headers on this
     page only, so the sub-brand reads distinctly from the rest of
     the site without breaking Arabic rendering. Better moved into
     the shared <head> if this page graduates to a permanent nav
     entry, but scoped here for now since this file is an include. -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Markazi+Text:wght@500;600;700&display=swap" rel="stylesheet">
<style>.mz-display { font-family: 'Markazi Text', serif; }</style>

<div class="bg-white text-zinc-900 antialiased overflow-hidden" dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">

    <!-- ============================================================
         HERO — full-bleed photo, navy gradient, gold serif wordmark
    ============================================================ -->
    <section class="relative w-full h-[88vh] min-h-[600px] max-h-[860px] overflow-hidden">
        <img src="<?= htmlspecialchars($mz_hero_image) ?>" alt="<?= strip_tags(__('mz_hero_title')) ?>"
             class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0" style="background-image: linear-gradient(to bottom,
            rgba(15,23,38,0.78) 0%, rgba(15,23,38,0.45) 35%, rgba(15,23,38,0.55) 70%, rgba(15,23,38,0.92) 100%);"></div>

        <div class="absolute inset-0 flex flex-col justify-between px-4 sm:px-8 lg:px-16 xl:px-24 py-8 md:py-12">

            <div class="max-w-[1600px] w-full mx-auto flex items-center justify-between wv-reveal" data-reveal>
                <span class="inline-flex items-center gap-3 text-[11px] tracking-[0.3em] uppercase text-[#C9A267] font-semibold font-mono">
                    <span class="w-7 h-px bg-[#C9A267]/70"></span>
                    <?= __('mz_hero_eyebrow') ?>
                </span>
            </div>

            <div class="max-w-[1600px] w-full mx-auto wv-reveal" data-reveal data-delay="100">
                <p class="text-[#C9A267] text-sm tracking-[0.25em] uppercase font-mono mb-2"><?= __('mz_hero_subtitle') ?></p>
                <h1 class="mz-display text-white text-[2.75rem] sm:text-[4.5rem] lg:text-[6rem] xl:text-[8rem] leading-[0.95] mb-5" style="font-weight:600;">
                    <?= __('mz_hero_title') ?>
                </h1>
                <p class="text-white/80 text-base sm:text-lg font-light max-w-lg mb-8">
                    <?= __('mz_hero_tagline') ?>
                </p>

                <div class="flex flex-col sm:flex-row sm:items-center gap-6 sm:gap-10 mb-9">
                    <div>
                        <div class="text-[10px] text-white/50 uppercase tracking-[0.2em] font-mono mb-1"><?= __('mz_hero_date_label') ?></div>
                        <div class="text-white font-medium"><?= __('mz_hero_date_value') ?></div>
                    </div>
                    <div class="hidden sm:block w-px h-9 bg-white/20"></div>
                    <div>
                        <div class="text-[10px] text-white/50 uppercase tracking-[0.2em] font-mono mb-1"><?= __('mz_hero_venue_label') ?></div>
                        <div class="text-white font-medium"><?= __('mz_hero_venue_value') ?></div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3">
                    <a href="https://mirzaam.com/mirzaamiyat/2026/participants2026.php" class="inline-flex items-center justify-center bg-[#C9A267] hover:bg-[#d9b67c] text-[#1E2F4D] font-semibold text-sm px-7 py-3.5 rounded-full transition-colors duration-300">
                        <?= __('mz_hero_cta_primary') ?>
                    </a>
                    <a href="https://mirzaam.com/mirzaamiyat/2026/registration/plan.php" class="inline-flex items-center justify-center bg-white/10 hover:bg-white/20 border border-white/30 text-white font-semibold text-sm px-7 py-3.5 rounded-full transition-colors duration-300">
                        <?= __('mz_hero_cta_secondary') ?>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================================
         INTRO — "What is Mirzaamiyat"
    ============================================================ -->
    <section class="w-full border-b border-zinc-100">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16">
                <div class="lg:col-span-7 wv-reveal" data-reveal>
                    <span class="text-[11px] tracking-[0.3em] uppercase text-[#C9A267] font-semibold font-mono block mb-3">
                        <?= __('mz_intro_eyebrow') ?>
                    </span>
                    <h2 class="mz-display text-4xl sm:text-5xl text-zinc-900 mb-7 leading-[1.1]" style="font-weight:600;">
                        <?= __('mz_intro_title') ?>
                    </h2>
                    <div class="space-y-5 text-zinc-600 leading-relaxed font-light text-[15px] sm:text-base max-w-2xl">
                        <p><?= __('mz_intro_p1') ?></p>
                        <p><?= __('mz_intro_p2') ?></p>
                    </div>
                </div>
                <div class="lg:col-span-5 wv-reveal" data-reveal data-delay="100">
                    <div class="h-full rounded-2xl bg-[#1E2F4D] p-8 md:p-10 flex flex-col justify-center relative overflow-hidden">
                        <span class="absolute top-6 <?= $isRtl ? 'right-7' : 'left-7' ?> text-[#C9A267]/30 mz-display text-7xl leading-none">&ldquo;</span>
                        <p class="mz-display text-[#F4EFE6] text-2xl sm:text-[1.7rem] leading-snug relative z-10" style="font-weight:500;">
                            <?= __('mz_intro_quote') ?>
                        </p>
                        <div class="mt-7 w-10 h-px bg-[#C9A267]"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================================
         CATEGORIES — navy section for contrast rhythm against
         the white sections above/below
    ============================================================ -->
    <section class="w-full bg-[#1E2F4D] relative overflow-hidden">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-24 relative z-10">
            <div class="text-center max-w-xl mx-auto mb-14 wv-reveal" data-reveal>
                <span class="text-[11px] tracking-[0.3em] uppercase text-[#C9A267] font-semibold font-mono block mb-3">
                    <?= __('mz_cat_eyebrow') ?>
                </span>
                <h2 class="mz-display text-4xl sm:text-5xl text-white mb-4 leading-[1.1]" style="font-weight:600;">
                    <?= __('mz_cat_title') ?>
                </h2>
                <p class="text-white/60 font-light"><?= __('mz_cat_subtitle') ?></p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 md:gap-5">
                <?php foreach ($mz_categories as $i => $cat): ?>
                    <div class="wv-reveal bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 rounded-2xl p-6 transition-colors duration-300" data-reveal data-delay="<?= $i * 50 ?>">
                        <div class="w-10 h-10 rounded-full bg-[#C9A267]/15 flex items-center justify-center text-[#C9A267] mb-4">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <?= $mz_cat_icons[$cat['key']] ?>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold tracking-tight mb-1.5 text-[15px] leading-snug">
                            <?= __('mz_cat_' . $cat['key'] . '_title') ?>
                        </h3>
                        <p class="text-white/50 text-[13px] leading-relaxed font-light">
                            <?= __('mz_cat_' . $cat['key'] . '_desc') ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ============================================================
         SPONSORS — tiered partner cards, text-forward (no forced
         logo images — real names, tiers, and booth numbers only)
    ============================================================ -->
    <section class="w-full border-b border-zinc-100">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-24">
            <div class="text-center max-w-xl mx-auto mb-14 wv-reveal" data-reveal>
                <span class="text-[11px] tracking-[0.3em] uppercase text-[#C9A267] font-semibold font-mono block mb-3">
                    <?= __('mz_sponsors_eyebrow') ?>
                </span>
                <h2 class="mz-display text-4xl sm:text-5xl text-zinc-900 mb-4 leading-[1.1]" style="font-weight:600;">
                    <?= __('mz_sponsors_title') ?>
                </h2>
                <p class="text-zinc-500 font-light"><?= __('mz_sponsors_subtitle') ?></p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">
                <?php foreach ($mz_sponsors as $i => $sp): ?>
                    <div class="wv-reveal bg-white rounded-2xl border border-zinc-100 p-6 transition-all duration-300 hover:shadow-[0_24px_48px_-12px_rgba(0,0,0,0.08)] hover:-translate-y-1" data-reveal data-delay="<?= $i * 60 ?>">
                        <div class="flex items-center justify-between mb-4">
                            <span class="<?= $sp['tier_class'] ?> text-[9px] font-bold font-mono tracking-wider px-2.5 py-1 rounded-full uppercase">
                                <?= __('mz_tier_' . $sp['tier_key']) ?>
                            </span>
                            <?php if (!empty($sp['booth'])): ?>
                                <span class="text-[11px] text-zinc-400 font-mono"><?= __('mz_sponsor_booth_label') ?> <?= htmlspecialchars($sp['booth']) ?></span>
                            <?php endif; ?>
                        </div>
                        <h3 class="text-zinc-900 font-semibold tracking-tight mb-2 text-base">
                            <?= __('mz_sponsor_' . $sp['key'] . '_title') ?>
                        </h3>
                        <p class="text-zinc-500 text-sm leading-relaxed font-light">
                            <?= __('mz_sponsor_' . $sp['key'] . '_desc') ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ============================================================
         GALLERY — real photos from the previous edition, asymmetric
         mosaic grid
    ============================================================ -->
    <section class="w-full border-b border-zinc-100">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-24">
            <div class="text-center max-w-xl mx-auto mb-12 wv-reveal" data-reveal>
                <span class="text-[11px] tracking-[0.3em] uppercase text-[#C9A267] font-semibold font-mono block mb-3">
                    <?= __('mz_gallery_eyebrow') ?>
                </span>
                <h2 class="mz-display text-4xl sm:text-5xl text-zinc-900 mb-4 leading-[1.1]" style="font-weight:600;">
                    <?= __('mz_gallery_title') ?>
                </h2>
                <p class="text-zinc-500 font-light"><?= __('mz_gallery_desc') ?></p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">
                <?php foreach ($mz_gallery as $i => $img): ?>
                    <div class="wv-reveal relative rounded-2xl overflow-hidden bg-zinc-50 border border-zinc-100
                                <?= ($i === 0 || $i === 5) ? 'col-span-2 row-span-2 aspect-square' : 'aspect-[3/4]' ?>"
                         data-reveal data-delay="<?= $i * 40 ?>">
                        <img src="<?= htmlspecialchars($img) ?>" alt="" loading="lazy"
                             class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ============================================================
         FOLLOW BANNER — light strip, single CTA. The real
         Instagram feed is rendered by the app, not built here.
    ============================================================ -->
    <section class="w-full bg-[#F4EFE6] border-b border-zinc-100">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-12 md:py-14">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6 wv-reveal" data-reveal>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#1E2F4D] flex items-center justify-center text-[#C9A267] shrink-0">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <rect x="3" y="3" width="18" height="18" rx="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.2" cy="6.8" r="0.6" fill="currentColor" stroke="none"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-zinc-900 font-semibold"><?= __('mz_follow_title') ?> <span class="text-[#9c7a45]"><?= __('mz_follow_handle') ?></span></div>
                        <p class="text-zinc-500 text-sm font-light"><?= __('mz_follow_desc') ?></p>
                    </div>
                </div>
                <a href="https://www.instagram.com/mirzaamiyat/" target="_blank" rel="noopener"
                   class="inline-flex items-center justify-center bg-[#1E2F4D] hover:bg-[#2A4268] text-white font-semibold text-sm px-6 py-3 rounded-full transition-colors duration-300 shrink-0">
                    <?= __('mz_follow_cta') ?>
                </a>
            </div>
        </div>
    </section>


    <!-- ============================================================
         FINAL CTA — dark closing band
    ============================================================ -->
    <section class="w-full bg-[#1E2F4D] relative overflow-hidden">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-20 md:py-28 text-center relative z-10">
            <div class="wv-reveal" data-reveal>
                <h2 class="mz-display text-4xl sm:text-5xl lg:text-6xl text-white mb-6 leading-[1.1]" style="font-weight:600;">
                    <?= __('mz_final_title') ?>
                </h2>
                <p class="text-white/60 font-light max-w-xl mx-auto mb-10 text-base sm:text-lg">
                    <?= __('mz_final_desc') ?>
                </p>
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="https://mirzaam.com/mirzaamiyat/2026/participants2026.php" class="inline-flex items-center justify-center bg-[#C9A267] hover:bg-[#d9b67c] text-[#1E2F4D] font-semibold text-sm px-7 py-3.5 rounded-full transition-colors duration-300">
                        <?= __('mz_final_cta_primary') ?>
                    </a>
                    <a href="https://mirzaam.com/mirzaamiyat/2026/registration/plan.php" class="inline-flex items-center justify-center bg-white/10 hover:bg-white/20 border border-white/30 text-white font-semibold text-sm px-7 py-3.5 rounded-full transition-colors duration-300">
                        <?= __('mz_final_cta_secondary') ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>