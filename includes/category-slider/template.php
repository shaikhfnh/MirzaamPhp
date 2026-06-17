<?php
// ============================================================
// includes/category-slider/template.php
// ============================================================
// REUSABLE COMPONENT — drop into any page via:
//
//   $cat_slider_title    = "Explore Categories";
//   $cat_slider_subtitle = "Interior design sectors at Mirzaam";
//   include 'includes/category-slider/template.php';
//
// Requires: categories_data.php must be loaded beforehand
// (already included in index.php via global_data.php or directly).
//
// The slider animation, auto-scroll, grid-toggle, and nav
// buttons are all handled by the existing main.js — this
// component uses the same element IDs (categories-scroll-track,
// categories-nav-controls, etc) so no JS changes are needed.
//
// Clicking a category card links to the exhibitor directory
// filtered by that exact category name, using the globally-
// configured $mirzaam_active_year from categories_data.php.
// ============================================================

// Defaults (can be overridden before including this file)
$cat_slider_title    = $cat_slider_title    ?? (__('section_title')    ?: 'Explore Categories');
$cat_slider_subtitle = $cat_slider_subtitle ?? (__('section_subtitle') ?: 'Interior design sectors at Mirzaam Expo');
$cat_slider_year     = $mirzaam_active_year ?? '2025';

// Detect base path for link generation (same logic as exhibitor controller)
// Local: /mirzaam/participants/2025?category=...
// Prod:  /participants/2025?category=...
$cat_slider_base = rtrim($base_path ?? '', '/');
?>

<section id="categories-hybrid-section" class="relative w-full py-12 bg-black text-white overflow-hidden" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">

    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10 flex items-end justify-between gap-6 mb-10">
        <div class="reveal-up">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-medium tracking-tight text-white uppercase font-alexandria leading-none">
                <?= $cat_slider_title ?> <br />
                <span class="text-white/40 font-light text-xs md:text-sm tracking-[0.2em] block mt-3 uppercase">
                    <?= $cat_slider_subtitle ?>
                </span>
            </h2>
        </div>

        <div id="categories-nav-controls" class="hidden items-center gap-1 opacity-0 transition-all duration-300 ease-out">
            <button id="categories-prev-btn" class="w-12 h-12 bg-white/5 border border-white/60 text-white/90 flex items-center justify-center hover:bg-white/15 hover:text-white active:scale-95 transition-all duration-300" aria-label="Scroll left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform <?= ($lang === 'ar' ? 'rotate-180' : '') ?>"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
            </button>
            <button id="categories-next-btn" class="w-12 h-12 bg-white/5 border border-white/60 text-white/90 flex items-center justify-center hover:bg-white/15 hover:text-white active:scale-95 transition-all duration-300" aria-label="Scroll right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform <?= ($lang === 'ar' ? 'rotate-180' : '') ?>"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
            </button>
        </div>
    </div>

    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10">

        <div id="categories-scroll-track" class="flex flex-row flex-nowrap overflow-x-auto pb-6 transition-all duration-300 ease-in-out" style="-webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none;">

            <?php foreach ($categories_blueprint as $index => $cat): ?>
                <?php
                    $sectorNumber  = str_pad($index + 1, 2, "0", STR_PAD_LEFT);
                    $localizedTitle = __('cat_' . $cat['key']) ?: $cat['category'];
                    // Build the link: /participants/2025?category=INDOOR+FURNITURE
                    $catFilterUrl = $cat_slider_base . '/participants/' . $cat_slider_year
                                  . '?category=' . urlencode($cat['category']);
                ?>

                <a href="<?= $catFilterUrl ?>"
                   class="category-slider-card flex-shrink-0 w-[240px] relative aspect-[0.75/1] group overflow-hidden border border-white/10 bg-zinc-900 transition-all duration-500 ease-out rounded-none block">
                    <img src="<?= $cat['img'] ?>" alt="<?= strip_tags($localizedTitle) ?>"
                         class="absolute inset-0 w-full h-full object-cover transform scale-100 transition-transform duration-700 ease-out group-hover:scale-105"
                         loading="lazy" />

                    <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/20 to-transparent z-20"></div>

                    <div class="absolute inset-x-0 bottom-0 p-4 sm:p-6 flex flex-col justify-end z-30 bg-gradient-to-t from-black/90 via-black/30 to-transparent">
                        <span class="text-[9px] font-medium tracking-[0.25em] text-white/40 uppercase mb-1.5">
                            <?= __('sector_label') ?: 'Sector ' ?><?= $sectorNumber ?>
                        </span>
                        <h3 class="text-white text-xs sm:text-sm md:text-base font-normal tracking-wide font-alexandria uppercase leading-tight">
                            <?= $localizedTitle ?>
                        </h3>
                    </div>
                </a>
            <?php endforeach; ?>

        </div>

        <div class="flex justify-center">
            <button id="toggle-categories-grid-btn"
                    data-text-all="<?= __('toggle_view_all') ?: 'View All Categories' ?>"
                    data-text-collapse="<?= __('toggle_collapse') ?: 'Collapse to Track' ?>"
                    class="px-8 py-4 bg-transparent border border-white/20 text-white text-xs font-medium tracking-[0.2em] uppercase hover:bg-white hover:text-black hover:border-white active:scale-95 transition-all duration-300 rounded-none">
                <?= __('toggle_view_all') ?: 'View All Categories' ?>
            </button>
        </div>
    </div>
</section>  