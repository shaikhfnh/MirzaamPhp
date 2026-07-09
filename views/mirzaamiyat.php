<?php
/**
 * MIRZAAMIYAT — sub-brand homepage
 * @var string $lang
 * @var array $site_blueprint
 */
require __DIR__ . '/../app/data/mirzaamiyat-categories-data.php';
$mz_sponsors   = $site_blueprint['mirzaamiyat']['sponsors'];
$mz_gallery    = $site_blueprint['mirzaamiyat']['gallery'];
$mz_hero_image = $site_blueprint['mirzaamiyat']['hero_image'];

$isRtl = ($lang === 'ar');
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Markazi+Text:wght@500;600;700&display=swap" rel="stylesheet">
<style>.mz-display { font-family: 'Markazi Text', serif; }</style>

<div class="bg-white text-zinc-900  overflow-hidden" dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">

<!-- ============================================================
         HERO — v3
         • Content moved to bottom-center (was vertically centered)
         • Tagline restored (one short line, mz_hero_tagline)
         • Two CTAs: gold "Book Your Booth" (primary action) +
           navy "Exhibitor List" (secondary action)
         • Vignette corners softened — main gradient overlay kept
           as-is, only the radial corner darkening reduced
         • Background image stays fully dynamic via $mz_hero_image
    ============================================================ -->
    <section class="relative w-full h-[90vh] min-h-[640px] max-h-[900px] overflow-hidden bg-black">

        <img src="<?= htmlspecialchars($mz_hero_image) ?>"
             alt="<?= strip_tags(__('mz_hero_title')) ?>"
             class="absolute inset-0 w-full h-full object-cover">

        <!-- Main overlay — unchanged from last version -->
        <div class="absolute inset-0" style="background-image: linear-gradient(to bottom,
            rgba(0,0,0,0.92) 0%,
            rgba(0,0,0,0.55) 35%,
            rgba(0,0,0,0.5) 55%,
            rgba(0,0,0,0.95) 100%);"></div>

        <!-- Vignette — corners softened (0.5 → 0.32, radius widened
             so the darkening is less aggressive at the edges) -->
        <div class="absolute inset-0 pointer-events-none"
             style="background: radial-gradient(ellipse 85% 75% at 50% 50%, transparent 0%, rgba(0,0,0,0.32) 100%);"></div>

        <!-- ── CONTENT — bottom-center ── -->
        <div class="absolute inset-x-0 bottom-0 flex flex-col items-center text-center px-6 pb-14 sm:pb-16 md:pb-20">

            <!-- Eyebrow -->
            <span class="inline-flex items-center gap-3 text-[11px] tracking-[0.3em] uppercase text-[#C9A267] font-semibold font-mono mb-5 wv-reveal"
                  data-reveal>
                <span class="w-7 h-px bg-[var(--primary)]"></span>
                <?= __('mz_hero_eyebrow') ?>
                <span class="w-7 h-px bg-[var(--primary)]"></span>
            </span>

            <!-- Title -->
            <h1 class="text-white text-[2.5rem] sm:text-[3.75rem] lg:text-[5rem] xl:text-[6.5rem]
                       leading-[0.95] mb-4 max-w-5xl wv-reveal"
                style="text-shadow: 0 4px 28px rgba(0,0,0,0.4);"
                data-reveal data-delay="100">
             
             <img src="/mirzaam/assets/images/logo/mirzaamiyat.png" alt="<?= strip_tags(__('mz_hero_title')) ?>" class="w-[260px] h-full grid self-center">

            </h1>

            <!-- Tagline — one short line -->
            <p class="text-white/75 text-sm sm:text-base font-light max-w-md mb-8 wv-reveal"
               data-reveal data-delay="180">
                <?= __('mz_hero_tagline') ?>
            </p>

            <!-- Two CTAs — gold primary + navy secondary -->
            <div class="flex flex-wrap items-center justify-center gap-3 wv-reveal" data-reveal data-delay="260">

         

                <!-- Navy — Exhibitor List (secondary action) -->
                <a href="<?= $lang === 'ar' ? $base_path . '/ar/mirzaamiyat/exhibitors/2026' : $base_path . '/mirzaamiyat/exhibitors/2026' ?>"
                   class="inline-flex items-center justify-center gap-2.5
                          bg-white/10 hover:bg-white/20
                          border border-white/15 hover:border-white/30
                          text-white font-semibold text-sm
                          px-7 py-3.5 rounded-full
                          transition-all duration-300">
                    <?= __('mz_hero_cta_primary') ?>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </a>

            </div>
        </div>
    </section>


<!-- ============================================================
         INTRO — "What is Mirzaamiyat" — v2
         • Photo replaces the stat/founder card — real gallery image
         • Title reduced to a single bold word/phrase, supporting
           copy moved into body text below
         • Background: deeper, richer navy (#070B14 — darker than
           the previous #0F1726)
         • No founder mention — kept the section purely about the
           expo itself
    ============================================================ -->
    <section class="w-full bg-[#070B14] relative overflow-hidden border-b border-white/5">

        <!-- Faint dot-grid texture -->
        <div class="absolute inset-0 pointer-events-none opacity-[0.1]"
             style="background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 0); background-size: 22px 22px;"></div>

        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-24 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">

                <!-- ── LEFT — single bold word title + body text ── -->
                <div class="lg:col-span-6 wv-reveal" data-reveal>
                    <span class="text-[11px] tracking-[0.3em] uppercase text-[#C9A267] font-semibold font-mono block mb-5">
                        <?= __('mz_intro_eyebrow') ?>
                    </span>

                    <!-- Single bold word/phrase — much larger, acts
                         as the visual anchor instead of a full
                         sentence headline -->
                    <h2 class="text-white text-5xl sm:text-6xl lg:text-7xl xl:text-8xl
                               font-bold leading-[0.9] mb-8 tracking-tight">
                        <?= __('mz_intro_word') ?: 'Considered.' ?>
                    </h2>

                    <div class="space-y-5 text-white/55 leading-relaxed font-light text-[15px] sm:text-base max-w-xl">
                        <p><?= __('mz_intro_p1') ?></p>
                        <p><?= __('mz_intro_p2') ?></p>
                    </div>

                    <!-- Thin gold underline accent -->
                    <div class="mt-8 w-12 h-px bg-[#C9A267]"></div>
                </div>

                <!-- ── RIGHT — real Mirzaamiyat photo ──
                     Intrinsic ratio confirmed: 938×654 (469:327 ≈ 1.43:1)
                     landscape, not portrait. aspect-[469/327] matches
                     it exactly at every breakpoint — no cropping. -->
                <div class="lg:col-span-6 wv-reveal" data-reveal data-delay="120">
                    <div class="relative rounded-2xl overflow-hidden
                                w-full aspect-[469/327]
                                max-w-[560px] mx-auto lg:max-w-none">
                        <img src="https://mirzaam.com/wp-content/uploads/2026/03/dsc07269.jpg"
                             alt="<?= strip_tags(__('mz_intro_title')) ?>"
                             loading="lazy"
                             class="absolute inset-0 w-full h-full object-cover">

                        <!-- Subtle gradient at bottom for depth, ties
                             the photo into the dark section -->
                        <div class="absolute inset-0 bg-gradient-to-t from-[#070B14]/40 via-transparent to-transparent"></div>

                        <!-- Gold corner accent — top-left frame line -->
                        <div class="absolute top-4 left-4 sm:top-5 sm:left-5 w-8 h-8 sm:w-10 sm:h-10 border-t-2 border-l-2 border-[#C9A267]/60 pointer-events-none"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>


<?php
/**
 * REPLACE the entire old "CATEGORIES" <section> block in
 * mirzaamiyat.php (the navy section with the 9 icon-cards) with
 * this block.
 *
 * Before this block runs, $mirzaamiyat_categories_blueprint must
 * be loaded — require the new data file at the top of
 * mirzaamiyat.php, alongside your other $site_blueprint pulls:
 *
 *   require __DIR__ . '/../data/mirzaamiyat-categories-data.php';
 *
 * This swaps $categories_blueprint (the variable name the
 * slider component expects) to point at the Mirzaamiyat set
 * instead of Mirzaam's, sets the slider's title/subtitle from
 * your existing mz_cat_* translation keys, forces the dark
 * theme to match Mirzaamiyat's navy palette, then includes the
 * exact same reusable component file — zero changes needed
 * inside template.php itself.
 */
 
$categories_blueprint = $mirzaamiyat_categories_blueprint;
 
$cat_slider_title    = __('mz_cat_title');
$cat_slider_subtitle = __('mz_cat_subtitle');
$cat_slider_theme    = 'dark';
$cat_slider_link_builder = function ($base, $year, $categoryName) {
    return get_url('mirzaamiyat/exhibitors') . '?category=' . urlencode($categoryName);
}; 
include 'includes/category-slider/template.php';
unset($cat_slider_link_builder);
?>


<?php
/**
 * These variables are injected from index.php
 * @var string $lang
 * @var array $site_blueprint
 */

$mz_sponsors = $site_blueprint['mirzaamiyat']['sponsors'];

$mz_tier_styles = [
    'main'        => 'bg-[#C9A267]/15 text-[#9c7a45]',
    'media'       => 'bg-zinc-500/15 text-zinc-300',
    'supporting'  => 'bg-zinc-500/15 text-zinc-300',
    'landscaping' => 'bg-zinc-500/15 text-zinc-300',
];
?>

<section class="w-full bg-[#070B14] relative overflow-hidden border-b border-white/5">

    <div class="absolute inset-0 pointer-events-none opacity-[0.1]"
         style="background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 0); background-size: 22px 22px;"></div>

    <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-24 relative z-10"
         dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">

        <!-- ── HEADER ──────────────────────────────────────── -->
        <div class="text-center max-w-xl mx-auto mb-14 md:mb-16">
            <div class="flex items-center justify-center gap-4 mb-5 wv-reveal" data-reveal>
                <span class="w-7 h-px bg-[#C9A267]"></span>
                <span class="text-[11px] tracking-[0.3em] uppercase text-[#C9A267] font-semibold font-mono">
                    <?= __('mz_sponsors_eyebrow') ?>
                </span>
                <span class="w-7 h-px bg-[#C9A267]"></span>
            </div>
            <div class="overflow-hidden">
                <h2 class="text-3xl sm:text-4xl md:text-5xl text-white leading-[1.1] wv-reveal"
                    data-reveal data-delay="80">
                    <?= __('mz_sponsors_title') ?>
                </h2>
            </div>
            <p class="text-white/40 font-light mt-3 wv-reveal" data-reveal data-delay="160">
                <?= __('mz_sponsors_subtitle') ?>
            </p>
        </div>

        <!-- ── SPONSOR GRID ─────────────────────────────────── -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-5">
            <?php foreach ($mz_sponsors as $i => $sp): ?>
            <a href="<?= htmlspecialchars($sp['website_url']) ?>"
               target="_blank" rel="noopener noreferrer"
               class="group relative flex flex-col rounded-2xl
                      bg-white/[0.02] border border-white/10
                      hover:border-[#C9A267]/50 hover:bg-white/[0.04]
                      hover:-translate-y-1
                      transition-all duration-400
                      overflow-hidden
                      wv-reveal"
               data-reveal data-delay="<?= $i * 60 ?>">

                <!-- Logo -->
                <div class="flex-1 flex items-center justify-center p-5">
                    <div class="w-full aspect-square rounded-xl overflow-hidden
                                bg-white border border-white/10
                                shadow-[0_8px_24px_rgba(0,0,0,0.25)]
                                flex items-center justify-center p-4
                                transition-transform duration-400 group-hover:scale-[1.03]">
                        <img src="<?= htmlspecialchars($sp['logo_url']) ?>"
                             alt="<?= htmlspecialchars(__('mz_sponsor_' . $sp['key'] . '_title')) ?>"
                             loading="lazy"
                             class="max-h-full max-w-full w-auto h-auto object-contain"
                             onerror="this.closest('a').style.display='none';">
                    </div>
                </div>

                <!-- Footer — booth removed, tier pill is now the
                     only badge, text size steps up at md/lg so it
                     reads comfortably on bigger screens. -->
                <div class="px-4 pb-4">
                    <div class="mb-2">
                        <span class="<?= $mz_tier_styles[$sp['tier']] ?? 'bg-zinc-500/15 text-zinc-300' ?>
                                     inline-block
                                     text-[9px] sm:text-[10px] md:text-[11px]
                                     font-bold font-mono tracking-wider
                                     px-2.5 py-1 md:px-3 md:py-1.5
                                     rounded-full uppercase">
                            <?= __('mz_tier_' . $sp['tier']) ?>
                        </span>
                    </div>

                    <p class="text-white font-semibold text-[13px] sm:text-sm md:text-base leading-tight truncate">
                        <?= __('mz_sponsor_' . $sp['key'] . '_title') ?>
                    </p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>

        <!-- ── VIEW ALL PARTICIPANTS — square, not pill ──────── -->
        <div class="flex justify-center mt-12 md:mt-14 wv-reveal" data-reveal data-delay="500">
            <a href="<?= $lang === 'ar' ? $base_path . '/ar/mirzaamiyat/exhibitors/2026' : $base_path . '/mirzaamiyat/exhibitors/2026' ?>"
               class="inline-flex items-center justify-center gap-3
                      bg-white/[0.04] hover:bg-white/10
                      border border-white/20 hover:border-[#C9A267]/50
                      text-white font-semibold text-sm
                      px-8 py-3.5 rounded-lg
                      transition-all duration-300">
                <?= __('mz_view_all_participants') ?: 'View All Participants' ?>
                <svg class="w-3.5 h-3.5 <?= ($lang === 'ar') ? 'rotate-180' : '' ?>"
                     fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>

    </div>
</section>

<!-- ============================================================
         GALLERY — redesigned
         • Pure black background, matches Mirzaam main site
         • Simple uniform grid — every tile the same aspect ratio,
           no featured/oversized tiles, calm and consistent
         • Ken Burns slow zoom on hover, same technique used on
           the moments slider elsewhere on the site
         • No counter badges — clean thumbnails
    ============================================================ -->
    <section class="w-full bg-black border-b border-white/5" x-data="mzGalleryLightbox(<?= htmlspecialchars(json_encode(array_values($mz_gallery)), ENT_QUOTES) ?>)">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-16 md:py-24">

            <!-- Header — matches the dark-section eyebrow/title
                 pattern used in intro + sponsors -->
            <div class="text-center max-w-xl mx-auto mb-12 md:mb-14 wv-reveal" data-reveal>
                <div class="flex items-center justify-center gap-4 mb-5">
                    <span class="w-7 h-px bg-[#C9A267]"></span>
                    <span class="text-[11px] tracking-[0.3em] uppercase text-[#C9A267] font-semibold font-mono">
                        <?= __('mz_gallery_eyebrow') ?>
                    </span>
                    <span class="w-7 h-px bg-[#C9A267]"></span>
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl text-white leading-[1.1]">
                    <?= __('mz_gallery_title') ?>
                </h2>
                <p class="text-white/40 font-light mt-3"><?= __('mz_gallery_desc') ?></p>
            </div>

            <!-- Uniform grid — every tile is the same aspect-square,
                 no size variation, calmer and more consistent than
                 the previous featured-tile mosaic -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
                <?php foreach ($mz_gallery as $i => $img): ?>
                    <div class="mz-gallery-tile wv-reveal relative aspect-square rounded-2xl overflow-hidden
                                bg-white/[0.02] border border-white/10 cursor-pointer group"
                         data-reveal data-delay="<?= $i * 40 ?>"
                         @click="open(<?= $i ?>)">

                        <img src="<?= htmlspecialchars($img) ?>" alt="" loading="lazy"
                             class="mz-gallery-img absolute inset-0 w-full h-full object-cover">

                        <!-- Dark wash on hover for the zoom icon to sit on -->
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors duration-400"></div>

                        <svg class="absolute inset-0 m-auto w-7 h-7 text-white opacity-0 group-hover:opacity-100
                                    transition-opacity duration-300 drop-shadow-lg pointer-events-none"
                             fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6"/>
                        </svg>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Lightbox — dark navy overlay, unchanged interaction
             pattern, colors nudged to pure black tones to match
             the new section background -->
        <div x-show="isOpen"
             x-transition:enter="transition duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[9000] bg-black/95 flex items-center justify-center p-4"
             @click.self="close()" @keydown.escape.window="close()"
             @keydown.arrow-left.window="prev()" @keydown.arrow-right.window="next()"
             style="display:none;">

            <button @click="close()" class="absolute top-5 <?= $isRtl ? 'left-5' : 'right-5' ?> w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <button @click="prev()" class="absolute <?= $isRtl ? 'right-4' : 'left-4' ?> top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <img :src="images[current]" alt="" class="max-w-full max-h-[90vh] rounded-xl shadow-2xl object-contain">
            <button @click="next()" class="absolute <?= $isRtl ? 'left-4' : 'right-4' ?> top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors duration-200">
                <svg class="w-5 h-5 <?= $isRtl ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
            </button>
            <p class="absolute bottom-5 left-1/2 -translate-x-1/2 text-white/40 text-xs font-mono">
                <span x-text="current + 1"></span> / <span x-text="images.length"></span>
            </p>
        </div>
    </section>

    <!-- Ken Burns hover zoom — same slow-scale technique used on
         the moments slider, applied here on simple :hover instead
         of a JS-driven active-slide class -->
    <style>
        .mz-gallery-img {
            transform: scale(1.0);
            transition: transform 1.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
        }
        .mz-gallery-tile:hover .mz-gallery-img {
            transform: scale(1.12);
        }
        @media (prefers-reduced-motion: reduce) {
            .mz-gallery-img { transition: none !important; transform: none !important; }
        }
    </style>

    <script>
    function mzGalleryLightbox(images) {
        return {
            images: images,
            isOpen: false,
            current: 0,
            open(i)  { this.current = i; this.isOpen = true; },
            close()  { this.isOpen = false; },
            next()   { this.current = (this.current + 1) % this.images.length; },
            prev()   { this.current = (this.current - 1 + this.images.length) % this.images.length; },
        };
    }
    </script>


<!-- ============================================================
         FOLLOW BANNER — redesigned
         • Dark navy #070B14, matches intro/sponsors/gallery
         • Subtle top border to separate from the black gallery
           above without a jarring light-band interruption
         • Instagram icon now sits in a bordered glass circle
           instead of a solid navy-on-cream fill
    ============================================================ -->
    <section class="w-full bg-zinc-950 border border-white/10">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-10 md:py-12">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-6 wv-reveal" data-reveal>
                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-full bg-white/[0.04] border border-white/10 flex items-center justify-center text-[#C9A267] shrink-0">
                        <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                            <rect x="3" y="3" width="18" height="18" rx="5"/>
                            <circle cx="12" cy="12" r="4"/>
                            <circle cx="17.2" cy="6.8" r="0.6" fill="currentColor" stroke="none"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-white font-semibold text-sm sm:text-base">
                            <?= __('mz_follow_title') ?> <span class="text-[#C9A267]"><?= __('mz_follow_handle') ?></span>
                        </div>
                        <p class="text-white/40 text-[13px] sm:text-sm font-light"><?= __('mz_follow_desc') ?></p>
                    </div>
                </div>
                <a href="https://www.instagram.com/mirzaamiyat/" target="_blank" rel="noopener"
                   class="inline-flex items-center justify-center gap-2
                          bg-white/[0.04] hover:bg-white/10
                          border border-white/15 hover:border-[#C9A267]/50
                          text-white font-semibold text-sm
                          px-6 py-3 rounded-lg
                          transition-all duration-300 shrink-0">
                    <?= __('mz_follow_cta') ?>
                </a>
            </div>
        </div>
    </section>


    <!-- ============================================================
         FINAL CTA — redesigned
         • Same #070B14 as the rest of the closing sequence, no
           harsh color jump into a lighter navy at the very end
         • Minimal — no glow, no texture, just clean type + two CTAs
         • Thin gold divider line above the title as a quiet accent
    ============================================================ -->
    <section class="w-full relative overflow-hidden bg-zinc-950 wv-grid-texture">
                <div class="absolute inset-0 bg-gradient-to-br from-yellow-500/10 via-transparent to-yellow-500/5 pointer-events-none"></div>
        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-yellow-500/10 rounded-full blur-[160px] pointer-events-none"></div>
        <div class="max-w-[1600px] mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 py-20 md:py-28 text-center">
            <div class="wv-reveal" data-reveal>

                <span class="block w-10 h-px bg-[#C9A267] mx-auto mb-8"></span>

                <h2 class="text-4xl sm:text-5xl lg:text-6xl text-white mb-6 leading-[1.1] font-semibold">
                    <?= __('mz_final_title') ?>
                </h2>
                <p class="text-white/50 font-light max-w-xl mx-auto mb-10 text-base sm:text-lg">
                    <?= __('mz_final_desc') ?>
                </p>
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="<?= $lang === 'ar' ? $base_path . '/ar/mirzaamiyat' : $base_path . '/mirzaamiyat' ?>" 
                       class="inline-flex items-center justify-center
                              bg-yellow-500 hover:bg-yellow-400
                              border border-yellow-500 hover:border-yellow-400
                              text-[#070B14] font-medium text-sm
                              px-7 py-3.5 rounded-lg
                              transition-colors duration-300">
                        <?= __('mz_final_cta_primary') ?>
                    </a>
                    <a href="https://mirzaam.com/mirzaamiyat/2026/registration/plan.php"
                       class="inline-flex items-center justify-center
                              bg-white/[0.04] hover:bg-white/10
                              border border-white/15 hover:border-white/30
                              text-white font-medium text-sm
                              px-7 py-3.5 rounded-lg
                              transition-all duration-300">
                        <?= __('mz_final_cta_secondary') ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>