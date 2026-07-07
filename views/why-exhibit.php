<?php
// ============================================================
// views/why-exhibit.php
// ============================================================
// WHITE THEME REDESIGN — matches Why Visit / Plan Trip design
// system: hero gradient, wv-reveal animations, finalized card
// style, stats grid, audience progress bars, and the shared
// category slider component at the bottom.
//
// All text goes through __() for i18n.
// Data comes from $why_exhibit (global_data-why_exhibit.php).
// ============================================================

$we     = $why_exhibit ?? [];
$lang   = $lang ?? 'en';
$isRtl  = ($lang === 'ar');
$main_booth_url = $site_blueprint['booth_registration_url'] ?? '';

?>

<div class="mt-20 bg-white text-zinc-900 antialiased overflow-hidden"
     dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">


    <!-- ═══════════════════════════════════════════════════════
         HERO
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full h-[52vh] min-h-[400px] max-h-[620px] overflow-hidden">
        <img src="<?= htmlspecialchars($we['hero_image'] ?? '') ?>" alt=""
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
                    <?= __('whyexhibit_eyebrow') ?: 'Mirzaam Expo' ?>
                </p>
                <h1 class="text-5xl sm:text-7xl lg:text-8xl font-bold tracking-tighter text-white leading-[0.9]">
                    <?= __('whyexhibit_title') ?: 'Why' ?>
                    <span class="text-yellow-400"><?= __('whyexhibit_title_accent') ?: 'Exhibit?' ?></span>
                </h1>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         INTRO
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full py-12 md:py-16 px-4 sm:px-8 lg:px-16 xl:px-24 border-b border-zinc-100 wv-reveal" data-reveal>
        <div class="max-w-[1600px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-start">
            <div class="hidden lg:flex lg:col-span-3 items-start gap-3">
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono"><?= __('whyexhibit_overview_label') ?: 'Overview' ?></span>
            </div>
            <div class="lg:col-span-9 xl:col-span-8">
                <p class="text-2xl sm:text-3xl md:text-[2rem] font-light text-zinc-700 leading-[1.5] tracking-tight">
                    <?= __('whyexhibit_intro') ?: 'Mirzaam Expo, first organized in 2019, has grown into a leading exhibition across the region. With excellent networking activities, business opportunities, curated galleries, and empowering lectures, Mirzaam Expo creates a total aesthetic experience.' ?>
                </p>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         VALUE PILLARS — 3 cards, finalized style
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full border-b border-zinc-100 bg-zinc-50/50">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pt-10 pb-6">
            <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono"><?= __('whyexhibit_pillars_label') ?: 'Why It Matters' ?></span>
        </div>

        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pb-12 md:pb-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-5">

                <?php foreach (($we['pillars'] ?? []) as $i => $pillar): ?>
                    <article class="wv-reveal group relative bg-white rounded-2xl border border-zinc-100 p-7 sm:p-8
                                     transition-all duration-500 hover:shadow-[0_24px_48px_-12px_rgba(0,0,0,0.10)] hover:-translate-y-1 hover:border-zinc-200"
                              data-reveal data-delay="<?= $i * 80 ?>">

                        <span class="block text-[10px] font-mono tracking-[0.25em] text-zinc-400 group-hover:text-yellow-600 transition-colors duration-500 mb-4">
                            <?= strtoupper(__($pillar['tag_key']) ?: '') ?>
                        </span>

                        <h3 class="text-xl sm:text-2xl font-semibold tracking-tight text-zinc-900 mb-3.5 leading-[1.15]">
                            <?= __($pillar['title_key']) ?: '' ?>
                        </h3>

                        <p class="text-sm text-zinc-500 font-light leading-relaxed">
                            <?= __($pillar['desc_key']) ?: '' ?>
                        </p>

                        <span class="absolute bottom-7 sm:bottom-8 <?= $isRtl ? 'right-7 sm:right-8' : 'left-7 sm:left-8' ?> h-[3px] w-0 bg-yellow-500 rounded-full group-hover:w-10 transition-all duration-500"></span>
                    </article>
                <?php endforeach; ?>

            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         KEY BENEFITS — alternating image/text rows
         (same pattern as Why Visit "Experiences")
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full">

        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 pt-14 md:pt-20 pb-8 wv-reveal" data-reveal>
            <div class="flex items-center gap-4">
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono"><?= __('whyexhibit_benefits_label') ?: 'Key Benefits' ?></span>
                <span class="flex-1 h-px bg-zinc-100"></span>
            </div>
        </div>

        <?php foreach (($we['benefits'] ?? []) as $i => $benefit): ?>
            <div class="w-full grid grid-cols-1 lg:grid-cols-12 border-b border-zinc-100 items-stretch wv-reveal"
                 data-reveal data-delay="<?= $i * 50 ?>">

                <!-- Image side -->
                <div class="w-full lg:col-span-6 aspect-video lg:aspect-auto lg:h-[46vh] xl:h-[52vh] bg-zinc-50 relative overflow-hidden group
                    <?= $benefit['flip'] ? 'lg:order-2' : 'lg:order-1' ?>">
                    <img src="<?= htmlspecialchars($benefit['image']) ?>" alt=""
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 ease-out group-hover:scale-105">
                </div>

                <!-- Text side -->
                <div class="w-full lg:col-span-6 flex items-center
                    <?= $benefit['flip'] ? 'lg:order-1' : 'lg:order-2' ?>">
                    <div class="w-full max-w-xl px-6 sm:px-10 lg:px-12 xl:px-16 py-10 sm:py-12 lg:py-0 mx-auto lg:mx-0">

                        <span class="block text-[10px] font-mono tracking-[0.25em] text-yellow-600 mb-3.5">
                            <?= strtoupper(__($benefit['tag_key']) ?: '') ?>
                        </span>

                        <h3 class="[text-wrap:balance] text-2xl sm:text-3xl lg:text-[2.25rem] xl:text-4xl font-bold tracking-tight text-zinc-900 leading-[1.15] mb-5">
                            <?= __($benefit['title_key']) ?: '' ?>
                        </h3>

                        <ul class="space-y-3.5">
                            <?php foreach (($benefit['items_keys'] ?? []) as $itemKey): ?>
                                <li class="flex items-start gap-3 text-zinc-600 text-[15px] sm:text-base font-light leading-relaxed">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mt-2 flex-shrink-0"></span>
                                    <span><?= __($itemKey) ?: $itemKey ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </section>


    <!-- ═══════════════════════════════════════════════════════
         FACTS & STATISTICS
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20 border-b border-zinc-100 wv-reveal" data-reveal>
        <div class="max-w-[1600px] mx-auto">

            <div class="flex items-center gap-4 mb-12">
                <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono"><?= __('whyexhibit_stats_label') ?: 'Facts & Statistics' ?></span>
                <span class="flex-1 h-px bg-zinc-100"></span>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-x-8 gap-y-10">
                <?php foreach (($we['stats'] ?? []) as $j => $stat): ?>
                    <div class="wv-reveal space-y-1.5" data-reveal data-delay="<?= $j * 60 ?>">
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-zinc-900 leading-none">
                            <?= $stat['value'] ?>
                        </div>
                        <div class="text-[10px] sm:text-xs uppercase tracking-[0.2em] text-zinc-400 font-medium">
                            <?= __($stat['label_key']) ?: '' ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         AUDIENCE — who attends, redesigned with visual hierarchy:
         top 3 segments (70% of total audience) get featured
         stat-card treatment; remaining 5 segments are a compact,
         refined list. This reflects their actual weight instead
         of giving "Students (5%)" the same visual size as
         "Home Owners (45%)".
    ═══════════════════════════════════════════════════════ -->
    <section class="w-full px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-20 border-b border-zinc-100">
        <div class="max-w-[1600px] mx-auto">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 mb-12">
                <div class="lg:col-span-5 wv-reveal" data-reveal>
                    <span class="text-[11px] tracking-[0.3em] uppercase text-yellow-600 font-semibold font-mono block mb-3"><?= __('whyexhibit_audience_label') ?: 'Audience Breakdown' ?></span>
                    <h3 class="text-3xl sm:text-4xl font-bold tracking-tight text-zinc-900 mb-4 leading-tight">
                        <?= __('whyexhibit_audience_title') ?: 'Who Attends Mirzaam Expo?' ?>
                    </h3>
                    <p class="text-sm font-light text-zinc-500 leading-relaxed max-w-md">
                        <?= __('whyexhibit_audience_desc') ?: 'Mirzaam Expo attracts a high-caliber audience of industry professionals, buyers, and design enthusiasts looking for cutting-edge interior solutions.' ?>
                    </p>
                </div>
            </div>

            <?php
                $audAll      = $we['audience'] ?? [];
                $audFeatured = array_slice($audAll, 0, 3);
                $audRest     = array_slice($audAll, 3);
            ?>

            <!-- Featured top-3, finalized card style -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-5 mb-5">
                <?php foreach ($audFeatured as $i => $aud): ?>
                    <article class="wv-reveal group relative bg-white rounded-2xl border border-zinc-100 p-7
                                     transition-all duration-500 hover:shadow-[0_24px_48px_-12px_rgba(0,0,0,0.10)] hover:-translate-y-1 hover:border-zinc-200"
                              data-reveal data-delay="<?= $i * 70 ?>">

                        <div class="flex items-end justify-between mb-5">
                            <span class="text-4xl sm:text-5xl font-bold tracking-tight text-zinc-900 leading-none"><?= $aud['percent'] ?>%</span>
                            <span class="text-[10px] font-mono text-zinc-400 tracking-widest"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></span>
                        </div>

                        <p class="text-sm font-medium text-zinc-700 leading-snug mb-4">
                            <?= __($aud['label_key']) ?: '' ?>
                        </p>

                        <div class="w-full bg-zinc-100 h-[4px] rounded-full overflow-hidden">
                            <div class="js-audience-bar bg-zinc-900 h-full rounded-full transition-all duration-1000 ease-out" style="width:0%" data-fill="<?= $aud['percent'] ?>"></div>
                        </div>

                        <span class="absolute bottom-0 <?= $isRtl ? 'right-7' : 'left-7' ?> h-[3px] w-0 bg-yellow-500 rounded-full group-hover:w-10 transition-all duration-500"></span>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- Remaining segments, compact refined list -->
            <div class="bg-zinc-50/60 border border-zinc-100 rounded-2xl divide-y divide-zinc-100">
                <?php foreach ($audRest as $j => $aud): ?>
                    <div class="wv-reveal flex items-center gap-4 px-6 py-4 hover:bg-white transition-colors duration-300" data-reveal data-delay="<?= $j * 50 ?>">
                        <span class="text-xs font-semibold text-zinc-900 w-10 flex-shrink-0"><?= $aud['percent'] ?>%</span>
                        <div class="flex-1 min-w-0">
                            <div class="w-full bg-zinc-200/70 h-[3px] rounded-full overflow-hidden mb-1.5">
                                <div class="js-audience-bar bg-zinc-400 h-full rounded-full transition-all duration-1000 ease-out" style="width:0%" data-fill="<?= $aud['percent'] ?>"></div>
                            </div>
                            <span class="text-xs text-zinc-600 truncate block"><?= __($aud['label_key']) ?: '' ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


    <!-- ═══════════════════════════════════════════════════════
         CATEGORY SLIDER — "Who Should Exhibit?"
         Uses the shared component from
         includes/category-slider/template.php
    ═══════════════════════════════════════════════════════ -->
    <?php
    $cat_slider_title    = __('whyexhibit_categories_title') ?: 'Who Should Exhibit?';
    $cat_slider_subtitle = __('whyexhibit_categories_subtitle') ?: 'Explore the sectors represented at Mirzaam Expo';
    $cat_slider_theme    = 'light';
    include 'includes/category-slider/template.php';
    ?>


    <!-- ═══════════════════════════════════════════════════════
         CTA — standard finalized pattern, matches Why Visit /
         Plan Trip exactly (grid texture, radial glow, stats row)
    ═══════════════════════════════════════════════════════ -->
    <section class="relative w-full py-20 md:py-28 px-4 sm:px-8 lg:px-16 xl:px-24 overflow-hidden bg-zinc-950 wv-grid-texture">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 via-transparent to-yellow-500/5 pointer-events-none"></div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-yellow-500/10 rounded-full blur-[160px] pointer-events-none"></div>

        <div class="relative max-w-[1000px] mx-auto text-center wv-reveal" data-reveal>
            <p class="text-yellow-500 text-[11px] tracking-[0.4em] uppercase font-semibold mb-5 inline-flex items-center gap-3">
                <span class="w-8 h-px bg-yellow-500/60"></span>
                <?= __('whyexhibit_cta_eyebrow') ?: 'Reserve Your Spot' ?>
                <span class="w-8 h-px bg-yellow-500/60"></span>
            </p>
            <h2 class="text-5xl sm:text-6xl font-bold tracking-tight text-white mb-5 leading-tight">
                <?= __('whyexhibit_cta_title') ?: 'Ready to Exhibit?' ?>
            </h2>
            <p class="text-base text-white/55 font-light max-w-2xl mx-auto mb-9 leading-relaxed">
                <?= __('whyexhibit_cta_desc') ?: 'Secure your booth at Mirzaam Expo and connect with thousands of buyers, designers, and industry leaders.' ?>
            </p>

<?php if (!empty($main_booth_url)): ?>

    <!-- ENABLED -->
    <a href="<?= htmlspecialchars($main_booth_url) ?>"
       target="_blank" rel="noopener noreferrer"
       class="group inline-flex items-center gap-3 bg-yellow-500 text-black px-7 py-3.5 rounded-full text-xs tracking-[0.2em] uppercase font-bold hover:bg-yellow-400 transition-all duration-300 hover:scale-105">
        <?= __('book_booth') ?>
        <svg class="w-4 h-4 <?= $isRtl ? 'group-hover:-translate-x-1 rotate-180' : 'group-hover:translate-x-1' ?> transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
        </svg>
    </a>

<?php else: ?>

    <!-- DISABLED — actually muted this time: dark translucent
         fill instead of solid yellow, yellow-tinted BORDER
         instead of yellow FILL so it reads as "the yellow
         button, just inactive" rather than looking identical
         to the working one. -->
    <button type="button"
            disabled
            aria-disabled="true"
            title="<?= htmlspecialchars(__('booth_coming_soon') ?: 'Registration opening soon') ?>"
            class="inline-flex items-center gap-3
                   bg-yellow-500/10
                   text-yellow-500/60
                   px-7 py-3.5 rounded-full
                   text-xs tracking-[0.2em] uppercase font-bold
                   border border-yellow-500/25
                   cursor-not-allowed select-none">
        <?= __('book_booth') ?>
        <span class="text-[8px] font-mono uppercase tracking-wider bg-black/40 text-yellow-500/80 px-2 py-0.5 rounded-full leading-none">
            <?= __('booth_soon_tag') ?: 'Soon' ?>
        </span>
    </button>

<?php endif; ?>

            <div class="mt-14 pt-10 border-t border-white/10 grid grid-cols-3 gap-6 max-w-lg mx-auto">
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-white"><?= __('whyexhibit_cta_stat1_value') ?: '5' ?></p>
                    <p class="text-[10px] tracking-[0.2em] uppercase text-white/40 mt-1"><?= __('whyexhibit_cta_stat1_label') ?: 'Days' ?></p>
                </div>
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-white"><?= __('whyexhibit_cta_stat2_value') ?: '200+' ?></p>
                    <p class="text-[10px] tracking-[0.2em] uppercase text-white/40 mt-1"><?= __('whyexhibit_cta_stat2_label') ?: 'Exhibitors' ?></p>
                </div>
                <div>
                    <p class="text-2xl sm:text-3xl font-bold text-white"><?= __('whyexhibit_cta_stat3_value') ?: 'Free' ?></p>
                    <p class="text-[10px] tracking-[0.2em] uppercase text-white/40 mt-1"><?= __('whyexhibit_cta_stat3_label') ?: 'Entry' ?></p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Animate audience bars from 0 to their real percentage the
        // moment they scroll into view. Self-contained — doesn't
        // depend on main.js's reveal internals, so it's safe to drop
        // in regardless of how that script is implemented.
        (function () {
            var bars = document.querySelectorAll('.js-audience-bar');
            if (!bars.length) return;

            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        var el = entry.target;
                        var target = el.getAttribute('data-fill') || '0';
                        // Small delay so the bar fill reads as a
                        // deliberate follow-up to the card/row fading in,
                        // not a simultaneous jump.
                        setTimeout(function () {
                            el.style.width = target + '%';
                        }, 150);
                        observer.unobserve(el);
                    }
                });
            }, { threshold: 0.3 });

            bars.forEach(function (bar) { observer.observe(bar); });
        })();
    </script>

</div>