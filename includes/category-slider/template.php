<?php
// ============================================================
// includes/category-slider/template.php
// ============================================================
// REUSABLE COMPONENT — drop into any page via:
//
//   $cat_slider_title    = "Explore Categories";
//   $cat_slider_subtitle = "Interior design sectors at Mirzaam";
//   $cat_slider_theme    = 'dark';   // or 'light' — optional, defaults to 'dark'
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
//
// THEME SUPPORT (new):
// 'dark'  → original black section (homepage default, unchanged)
// 'light' → white/zinc-50 section for pages with a white theme
//           (e.g. Why Exhibit). Card photos still get a dark
//           bottom gradient internally for text contrast — only
//           the page chrome (section bg, heading color, nav
//           buttons, toggle button) changes between themes.
// ============================================================

// Defaults (can be overridden before including this file)
$cat_slider_title    = $cat_slider_title    ?? (__('section_title')    ?: 'Explore Categories');
$cat_slider_subtitle = $cat_slider_subtitle ?? (__('section_subtitle') ?: 'Interior design sectors at Mirzaam Expo');
$cat_slider_year     = $mirzaam_active_year ?? '2025';
$cat_slider_theme    = $cat_slider_theme    ?? 'dark';
$isLight             = ($cat_slider_theme === 'light');

// Detect base path for link generation (same logic as exhibitor controller)
// Local: /mirzaam/participants/2025?category=...
// Prod:  /participants/2025?category=...
$cat_slider_base = rtrim($base_path ?? '', '/');
$isRtlSlider = ($lang === 'ar');

// ── Theme-dependent class sets ──────────────────────────────
$sectionBg      = $isLight ? 'bg-white' : 'bg-black';
$sectionText    = $isLight ? 'text-zinc-900' : 'text-white';
$subtitleText   = $isLight ? 'text-zinc-400' : 'text-white/40';
$navBtnBase     = $isLight
    ? 'bg-white border border-zinc-200 text-zinc-600 hover:bg-zinc-900 hover:text-white hover:border-zinc-900'
    : 'bg-white/5 border border-white/60 text-white/90 hover:bg-white/15 hover:text-white';
$cardBorder     = $isLight ? 'border-zinc-200' : 'border-white/10';
$cardSkeletonBg = $isLight ? 'bg-zinc-100' : 'bg-zinc-900';
$cardShadow     = $isLight ? 'group-hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.18)]' : '';
$toggleBtnBase  = $isLight
    ? 'bg-transparent border border-zinc-300 text-zinc-700 hover:bg-zinc-900 hover:text-white hover:border-zinc-900'
    : 'bg-transparent border border-white/20 text-white hover:bg-white hover:text-black hover:border-white';
$edgeFadeColor  = $isLight ? 'rgba(255,255,255,1)' : 'rgba(0,0,0,1)';
?>

<section id="categories-hybrid-section" class="relative w-full py-12 <?= $sectionBg ?> <?= $sectionText ?> overflow-hidden" dir="<?= $isRtlSlider ? 'rtl' : 'ltr' ?>">

    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10 flex items-end justify-between gap-6 mb-10">
        <div class="reveal-up">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-medium tracking-tight <?= $sectionText ?> uppercase font-alexandria leading-none">
                <?= $cat_slider_title ?> <br />
                <span class="<?= $subtitleText ?> font-light text-xs md:text-sm tracking-[0.2em] block mt-3 uppercase">
                    <?= $cat_slider_subtitle ?>
                </span>
            </h2>
        </div>

        <div id="categories-nav-controls" class="hidden items-center gap-1 opacity-0 transition-all duration-300 ease-out">
            <button id="categories-prev-btn" class="w-12 h-12 <?= $navBtnBase ?> flex items-center justify-center active:scale-95 transition-all duration-300" aria-label="Scroll left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform <?= ($isRtlSlider ? 'rotate-180' : '') ?>"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
            </button>
            <button id="categories-next-btn" class="w-12 h-12 <?= $navBtnBase ?> flex items-center justify-center active:scale-95 transition-all duration-300" aria-label="Scroll right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 transform <?= ($isRtlSlider ? 'rotate-180' : '') ?>"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
            </button>
        </div>
    </div>

    <div class="w-full px-4 sm:px-8 md:px-12 lg:px-16 mx-auto relative z-10">

        <!-- Scroll track wrapper, with edge-fade hints so it's clear
             there's more content to scroll — a small but real UX
             improvement over a hard-cut edge. Fade color matches
             the section background so it blends seamlessly. -->
        <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 <?= $isRtlSlider ? 'right-0' : 'left-0' ?> w-10 sm:w-16 z-20"
                 style="background: linear-gradient(<?= $isRtlSlider ? 'to left' : 'to right' ?>, <?= $edgeFadeColor ?> 0%, transparent 100%);"></div>
            <div class="pointer-events-none absolute inset-y-0 <?= $isRtlSlider ? 'left-0' : 'right-0' ?> w-10 sm:w-16 z-20"
                 style="background: linear-gradient(<?= $isRtlSlider ? 'to right' : 'to left' ?>, <?= $edgeFadeColor ?> 0%, transparent 100%);"></div>

            <div id="categories-scroll-track" class="flex flex-row flex-nowrap overflow-x-auto pb-6 transition-all duration-300 ease-in-out" style="-webkit-overflow-scrolling: touch; scrollbar-width: none; -ms-overflow-style: none;">

                <?php foreach ($categories_blueprint as $index => $cat): ?>
                    <?php
                        $sectorNumber  = str_pad($index + 1, 2, "0", STR_PAD_LEFT);
                        $localizedTitle = __('cat_' . $cat['key']) ?: $cat['category'];
                        $catFilterUrl = $cat_slider_base . '/participants/' . $cat_slider_year
                                      . '?category=' . urlencode($cat['category']);
                    ?>

                    <a href="<?= $catFilterUrl ?>"
                       class="category-slider-card flex-shrink-0 w-[240px] relative aspect-[0.75/1] group overflow-hidden border <?= $cardBorder ?> <?= $cardSkeletonBg ?> transition-all duration-500 ease-out rounded-none block <?= $cardShadow ?>">
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

                        <!-- Short accent bar on hover, matching the rest of
                             the site's card micro-interaction language -->
                        <span class="absolute bottom-0 <?= $isRtlSlider ? 'right-0' : 'left-0' ?> h-[3px] w-0 bg-yellow-500 group-hover:w-full transition-all duration-500 z-30"></span>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>

        <div class="flex justify-center mt-2">
            <button id="toggle-categories-grid-btn"
                    data-text-all="<?= __('toggle_view_all') ?: 'View All Categories' ?>"
                    data-text-collapse="<?= __('toggle_collapse') ?: 'Collapse to Track' ?>"
                    class="px-8 py-4 <?= $toggleBtnBase ?> text-xs font-medium tracking-[0.2em] uppercase active:scale-95 transition-all duration-300 rounded-none">
                <?= __('toggle_view_all') ?: 'View All Categories' ?>
            </button>
        </div>
    </div>
</section>