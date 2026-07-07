<?php
// ============================================================
// includes/exhibitor-directory/template.php
// ============================================================
// WHITE THEME — v4
// Changes from v3:
//   • $expo_config support — heading/subtitle/year driven by
//     the calling view (Mirzaamiyat, IXIR, etc.)
//   • _t() helper fixes the __() key-as-fallback bug so the
//     Mirzaam participants page title + subtitle now display
//     correctly when translation keys are missing
//   • Everything else is identical to v3
// ============================================================
$lang  = $lang  ?? 'en';
$isRtl = ($lang === 'ar');

// ── Expo display strings ─────────────────────────────────────
// _t() fixes the __() bug: when a translation key is missing,
// __() returns the key NAME itself (truthy), so ?: never fires.
// _t() compares the returned value against the key name and
// uses the fallback when they match.
function _t(string $key, string $fallback): string {
    $val = __($key);
    return ($val !== $key && $val !== '') ? $val : $fallback;
}

// Read from $expo_config if the calling view set it,
// otherwise fall back to translation keys + hardcoded defaults.
$_ec_eyebrow  = ($expo_config['eyebrow']  ?? null)
    ?: _t('exhibitors_eyebrow',  'Mirzaam Expo');
$_ec_title    = ($expo_config['title']    ?? null)
    ?: _t('exhibitors_title',    'Exhibitors');
$_ec_subtitle = ($expo_config['subtitle'] ?? null)
    ?: _t('exhibitors_subtitle', 'Discover every brand, designer, and partner participating this year.');
$_ec_year     = $expo_config['year'] ?? $year ?? date('Y');
// ─────────────────────────────────────────────────────────────

function cat_icon_path($key) {
    $icons = [
        'compass'      => '<circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M14.5 9.5l-2 5-3 1.5 2-5 3-1.5z"/>',
        'shower'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M7 5a5 5 0 0110 0M5 9h14M8 13v1m4-1v1m4-1v1M8 17v1m4-1v1m4-1v1"/>',
        'bath'         => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 12h16v2a4 4 0 01-4 4H8a4 4 0 01-4-4v-2zM4 12V8a2 2 0 012-2M9 6a2 2 0 014 0v2"/><path stroke-linecap="round" d="M4 18v2m14-2v2"/>',
        'bed'          => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 18v-7a2 2 0 012-2h14a2 2 0 012 2v7M3 18h18M3 18v2m18-2v2M7 9V6a1 1 0 011-1h8a1 1 0 011 1v3"/>',
        'hammer'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M14.5 4.5l3 3-7 7-3-3 7-7zM7.5 14.5L3 19l2 2 4.5-4.5"/>',
        'rug'          => '<rect x="4" y="5" width="16" height="14" rx="1.5"/><path stroke-linecap="round" d="M8 9h8M8 13h8M8 17h4"/>',
        'sparkles'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3zM5 16l.7 2.1L8 19l-2.3.9L5 22l-.7-2.1L2 19l2.3-.9L5 16z"/>',
        'hardhat'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 16a8 8 0 0116 0H4zM12 8v3M3 16h18"/>',
        'layers'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l9 5-9 5-9-5 9-5zM3 13l9 5 9-5"/>',
        'curtain'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16M6 4c0 4 2 4 2 8s-2 4-2 8M18 4c0 4-2 4-2 8s2 4 2 8M12 4c0 4 1 4 1 8s-1 4-1 8"/>',
        'sofa'         => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 12V8a2 2 0 012-2h10a2 2 0 012 2v4M3 12h18v5a1 1 0 01-1 1H4a1 1 0 01-1-1v-5zM5 18v2m14-2v2M3 12a1 1 0 011-1h1v3H4a1 1 0 01-1-1v-1zm20 0a1 1 0 00-1-1h-1v3h1a1 1 0 001-1v-1z"/>',
        'door'         => '<rect x="5" y="3" width="14" height="18" rx="1"/><circle cx="15" cy="12" r=".8" fill="currentColor" stroke="none"/>',
        'plug'         => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 7V3m6 4V3M7 7h10v4a5 5 0 01-10 0V7zM12 16v5"/>',
        'door-closed'  => '<rect x="4" y="4" width="9" height="16" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 8h4v12h-4M10 12h.01"/>',
        'utensils'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M7 3v6a2 2 0 002 2v10M7 3v6m3-6v6M17 3c-2 0-3 2-3 4v3a2 2 0 002 2v8M17 3v18"/>',
        'sparkle'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4m12 0h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8"/><circle cx="12" cy="12" r="3"/>',
        'appliance'    => '<rect x="5" y="3" width="14" height="18" rx="1.5"/><circle cx="12" cy="14" r="3.5"/><path stroke-linecap="round" d="M8 6.5h.01M11 6.5h.01"/>',
        'smarthome'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 11l8-6 8 6M6 10v9a1 1 0 001 1h3v-6h4v6h3a1 1 0 001-1v-9"/><circle cx="12" cy="14" r="1.2" fill="currentColor" stroke="none"/>',
        'tv'           => '<rect x="3" y="5" width="18" height="13" rx="1.5"/><path stroke-linecap="round" d="M8 21h8"/>',
        'candle'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 21h6M12 18v-7M9 11h6l-1 0a2 2 0 01-4 0zM12 7c1 1.3 1.5 2.2 1.5 3a1.5 1.5 0 01-3 0c0-.8.5-1.7 1.5-3z"/>',
        'gift'         => '<rect x="4" y="9" width="16" height="11" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 9h16v4H4V9zM12 9v11M12 9c-1.5-3-4-4-5-2.5S8.5 9 12 9zm0 0c1.5-3 4-4 5-2.5S15.5 9 12 9z"/>',
        'shield-check' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>',
        'desk'         => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 9h18M5 9V6a1 1 0 011-1h12a1 1 0 011 1v3M5 9v10m14-10v10M9 14h2"/>',
        'shield-lock'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/><rect x="9.5" y="11" width="5" height="4" rx="0.5"/><path stroke-linecap="round" d="M10.5 11V9.5a1.5 1.5 0 013 0V11"/>',
        'armchair'     => '<path stroke-linecap="round" stroke-linejoin="round" d="M6 11V7a2 2 0 012-2h8a2 2 0 012 2v4M4 11h16v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM4 11a1.5 1.5 0 00-1.5 1.5V15a1.5 1.5 0 001.5 1.5M20 11a1.5 1.5 0 011.5 1.5V15a1.5 1.5 0 01-1.5 1.5M6 17v3m12-3v3"/>',
        'sprout'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 22v-9M12 13c0-3-2-5-6-5 0 4 2 6 6 6zM12 13c0-4 2-6 6-6 0 4-2 6-6 6z"/>',
        'floor-grid'   => '<rect x="3" y="3" width="18" height="18" rx="1"/><path stroke-linecap="round" d="M3 9h18M3 15h18M9 3v18M15 3v18"/>',
        'ruler'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 17L17 4l3 3L7 20l-3-3zM10 11l1.5 1.5M13 8l1.5 1.5M7 14l1.5 1.5"/>',
        'graduation'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4L2 9l10 5 10-5-10-5zM6 11.5V17c0 1.5 3 3 6 3s6-1.5 6-3v-5.5"/>',
        'layout'       => '<rect x="3" y="3" width="18" height="18" rx="1.5"/><path stroke-linecap="round" d="M3 9h18M9 9v12"/>',
        'pot'          => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 10h14l-1.2 8.5a2 2 0 01-2 1.5H8.2a2 2 0 01-2-1.5L5 10zM7 10a5 5 0 0110 0"/>',
        'kitchen'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 9h16M4 9v9a2 2 0 002 2h12a2 2 0 002-2V9M4 9l1-4h14l1 4M9 4v2m3-2v2m3-2v2"/>',
        'landscape'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 19l5-9 3 5 2-3 4 7H3zM17 8a2 2 0 11-4 0 2 2 0 014 0z"/>',
        'shovel'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M16 3l5 5-9 9-5-1-1-5 9-9zM7 16l-4 4"/>',
        'bulb'         => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 18h6M10 21h4M12 3a6 6 0 00-3 11.2c.4.3.6.8.6 1.3v.5h4.8v-.5c0-.5.2-1 .6-1.3A6 6 0 0012 3z"/>',
        'mattress'     => '<rect x="3" y="8" width="18" height="9" rx="1.5"/><path stroke-linecap="round" d="M3 12h18M7 8v9m5-9v9m5-9v9"/>',
        'cart'         => '<circle cx="9" cy="20" r="1.2" fill="currentColor" stroke="none"/><circle cx="17" cy="20" r="1.2" fill="currentColor" stroke="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M3 4h2l2.4 11.5a2 2 0 002 1.5h7.2a2 2 0 002-1.6L20 8H6"/>',
        'lounger'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 18l5-9 9 4-2 5H3zM8 9l3-5 6 3-2 3"/>',
        'palm'         => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 21V11M12 11c-2-4-6-5-9-3 2 3 5 4 9 3zm0 0c2-4 6-5 9-3-2 3-5 4-9 3zm0 0c0-3 1-5 3-7m-3 7c0-3-1-5-3-7"/>',
        'paintroller'  => '<rect x="4" y="4" width="12" height="6" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 10v4h4v6h-2"/>',
        'parquet'      => '<rect x="3" y="3" width="18" height="18" rx="1"/><path stroke-linecap="round" d="M3 8h6V3M9 8v5H3M9 13h6V8M15 13v5H9M15 18h6v-5M9 18H3v-5M21 8h-6v5"/>',
        'pillow'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 8a3 3 0 013-3h8a3 3 0 013 3v8a3 3 0 01-3 3H8a3 3 0 01-3-3V8zM9 9c1 1 1 2 0 3M15 12c-1 1-1 2 0 3"/>',
        'pot-plant'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 13h8l-1 7H9l-1-7zM12 13V7M12 7c-2 0-3-1.5-3-3 2 0 3 1 3 3zm0 0c2 0 3-1.5 3-3-2 0-3 1-3 3z"/>',
        'building'     => '<rect x="5" y="3" width="14" height="18" rx="1"/><path stroke-linecap="round" d="M9 7h.01M15 7h.01M9 11h.01M15 11h.01M9 15h.01M15 15h.01M10 21v-3h4v3"/>',
        'camera'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 8a2 2 0 012-2h2l1.5-2h5L16 6h2a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V8z"/><circle cx="12" cy="13" r="3.5"/>',
        'blinds'       => '<rect x="4" y="4" width="16" height="16" rx="1"/><path stroke-linecap="round" d="M4 8h16M4 12h16M4 16h16"/>',
        'shutter'      => '<rect x="4" y="4" width="16" height="16" rx="1"/><path stroke-linecap="round" d="M4 9h16M4 14h16"/>',
        'gem'          => '<path stroke-linecap="round" stroke-linejoin="round" d="M6 3h12l3 5-9 13L3 8l3-5zM3 8h18M9 3l3 5 3-5M12 8l-3 5 3 8 3-8-3-5"/>',
        'waves'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 9c2-2 4-2 6 0s4 2 6 0 4-2 6 0M3 15c2-2 4-2 6 0s4 2 6 0 4-2 6 0"/>',
        'shirt'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 4L4 8l2 2 2-1.5V20h8V8.5L18 10l2-2-4-4h-2a2 2 0 01-4 0H8z"/>',
        'tiles'        => '<rect x="3" y="3" width="8" height="8" rx="0.5"/><rect x="13" y="3" width="8" height="8" rx="0.5"/><rect x="3" y="13" width="8" height="8" rx="0.5"/><rect x="13" y="13" width="8" height="8" rx="0.5"/>',
        'needle'       => '<path stroke-linecap="round" stroke-linejoin="round" d="M19 5l-9.5 9.5M14 4l6 6-2 2-6-6 2-2zM3 21l3-7 4 4-7 3z"/>',
        'wallpaper'    => '<rect x="3" y="3" width="18" height="18" rx="1"/><path stroke-linecap="round" d="M3 8c2 0 2 2 4 2s2-2 4-2 2 2 4 2 2-2 4-2M3 14c2 0 2 2 4 2s2-2 4-2 2 2 4 2 2-2 4-2"/>',
        'default'      => '<path stroke-linecap="round" stroke-linejoin="round" d="M20.6 13.4L13 21l-9-9 7.6-7.6a2 2 0 011.4-.6H19a2 2 0 012 2v6.2a2 2 0 01-.4 1.4z"/><circle cx="14.5" cy="9.5" r="1.2" fill="currentColor" stroke="none"/>',
    ];
    return $icons[$key] ?? $icons['default'];
}

function cat_icon_svg($key, $class = 'w-4 h-4') {
    return '<svg class="' . $class . '" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6">' . cat_icon_path($key) . '</svg>';
}
?>

<style>
    .cat-scroll {
        scrollbar-width: thin;
        scrollbar-color: #d4d4d8 transparent;
    }
    .cat-scroll::-webkit-scrollbar { width: 4px; }
    .cat-scroll::-webkit-scrollbar-track { background: transparent; }
    .cat-scroll::-webkit-scrollbar-thumb {
        background-color: #d4d4d8;
        border-radius: 999px;
    }
    .cat-scroll:hover::-webkit-scrollbar-thumb { background-color: #71717a; }
    .cat-scroll::-webkit-scrollbar-thumb:hover { background-color: #18181b; }
</style>

<div class="mt-20 bg-white px-4 sm:px-6 md:px-10 lg:px-14 pb-24 w-full"
     dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">

    <!-- ═════════ PAGE HEADER ═════════ -->
    <div class="pt-10 md:pt-14 pb-10 border-b border-zinc-100 text-center">
        <p class="text-yellow-600 text-[11px] tracking-[0.4em] uppercase font-semibold mb-4 inline-flex items-center gap-3">
            <span class="w-8 h-px bg-yellow-500/60"></span>
            <?= htmlspecialchars($_ec_eyebrow) ?>
            <span class="w-8 h-px bg-yellow-500/60"></span>
        </p>
        <h1 class="text-3xl sm:text-4xl md:text-6xl lg:text-7xl font-bold text-zinc-900 mb-3 tracking-tight">
            <?= htmlspecialchars($_ec_title) ?>
            <span class="text-yellow-500"><?= htmlspecialchars($_ec_year) ?></span>
        </h1>
        <p class="text-zinc-500 text-sm md:text-base max-w-xl mx-auto font-light">
            <?= htmlspecialchars($_ec_subtitle) ?>
        </p>
    </div>

    <!-- ═════════ MAIN LAYOUT ═════════ -->
    <div class="flex flex-col lg:flex-row gap-8 lg:gap-10 pt-6">

        <!-- ───────── CATEGORY SIDEBAR ───────── -->
        <aside
            x-show="hasCategoryData && (filtersOpen || window.innerWidth >= 1024)"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="w-full lg:w-[280px] lg:flex-shrink-0"
            :class="filtersOpen ? 'block' : 'lg:flex hidden'">

            <div class="bg-white border border-zinc-100 rounded-2xl flex flex-col h-full overflow-hidden">

                <div class="flex items-center justify-between px-5 py-4 border-b border-zinc-100 flex-shrink-0">
                    <h3 class="text-xs font-bold tracking-[0.2em] uppercase text-zinc-900">
                        <?= _t('categories', 'Categories') ?>
                    </h3>
                    <span x-show="categories.length > 0" @click="clearCategories()"
                          class="text-[10px] font-medium text-zinc-500 hover:text-zinc-900 cursor-pointer normal-case tracking-normal !dir-ltr">
                        <?= _t('reset', 'Reset') ?>
                    </span>
                </div>

                <div class="cat-scroll flex-1 min-h-0 overflow-y-auto px-3 py-3 <?= $isRtl ? 'pl-1.5' : 'pr-1.5' ?>">
                    <div class="space-y-0.5">
                        <template x-for="facet in categoryFacets" :key="facet.name">
                            <label class="flex items-center gap-2.5 py-2.5 px-2.5 rounded-lg cursor-pointer hover:bg-zinc-50 transition group">
                                <input type="checkbox"
                                    :checked="isCategoryActive(facet.name)"
                                    @change="toggleCategory(facet.name)"
                                    class="w-3.5 h-3.5 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900/30 focus:ring-2 cursor-pointer flex-shrink-0">
                                <span class="w-6 h-6 rounded-md flex items-center justify-center flex-shrink-0 transition-colors"
                                      :class="isCategoryActive(facet.name) ? 'bg-zinc-900 text-white' : 'bg-zinc-100 text-zinc-500 group-hover:bg-zinc-200 group-hover:text-zinc-700'"
                                      x-html="$store.catIcons.svg(facet.icon)">
                                </span>
                                <span class="flex-1 min-w-0 text-[12.5px] leading-tight text-zinc-700 group-hover:text-zinc-900 transition truncate"
                                      :class="isCategoryActive(facet.name) ? 'font-semibold text-zinc-900' : ''"
                                      x-text="facet.name" :title="facet.name"></span>
                                <span class="text-[10px] text-zinc-400 tabular-nums flex-shrink-0" x-text="facet.count"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <button @click="filtersOpen = false" type="button"
                    class="lg:hidden bg-zinc-900 text-white rounded-xl py-3 text-sm font-semibold tracking-wide hover:bg-zinc-800 transition flex-shrink-0"
                    style="margin: 0 1rem 1rem 1rem;">
                    <?= _t('show_results', 'Show Results') ?>
                    (<span x-text="filteredData.length"></span>)
                </button>
            </div>
        </aside>

        <!-- ───────── CONTENT COLUMN ───────── -->
        <div class="flex-1 min-w-0">

            <!-- SEARCH + FAVORITES + mobile filter trigger -->
            <div class="flex flex-col sm:flex-row gap-3 mb-5">
                <div class="relative flex-1 group">
                    <svg class="absolute <?= $isRtl ? 'right-3.5' : 'left-3.5' ?> top-1/2 -translate-y-1/2 w-4 h-4 text-zinc-400 group-focus-within:text-zinc-900 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" x-model="search" placeholder="<?= _t('search_placeholder', 'Search exhibitors, brands, or categories...') ?>"
                        class="w-full bg-white border border-zinc-200 text-zinc-900 placeholder-zinc-400 rounded-xl <?= $isRtl ? 'pr-10 pl-10' : 'pl-10 pr-10' ?> py-3 text-sm focus:outline-none focus:border-zinc-900 focus:ring-1 focus:ring-zinc-900/15 transition">
                    <button x-show="search !== ''" @click="search = ''" type="button"
                        class="absolute <?= $isRtl ? 'left-3' : 'right-3' ?> top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center rounded-full bg-zinc-100 hover:bg-zinc-200 text-zinc-500 hover:text-zinc-700 transition">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <div class="flex gap-3">
                    <button x-show="hasCategoryData" @click="filtersOpen = !filtersOpen" type="button"
                        class="lg:hidden flex items-center justify-center gap-2 px-4 py-3 rounded-xl text-sm font-medium border transition whitespace-nowrap"
                        :class="filtersOpen ? 'bg-zinc-900 text-white border-zinc-900' : 'bg-white text-zinc-700 border-zinc-200 hover:border-zinc-300'">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M6 12h12M10 20h4"/>
                        </svg>
                        <span><?= _t('filters', 'Filters') ?></span>
                        <span x-show="activeFilterCount > 0" x-text="activeFilterCount"
                              class="bg-yellow-500 text-black rounded-full px-1.5 py-0.5 text-[10px] min-w-[18px] text-center font-bold"></span>
                    </button>

                    <button @click="showFavorites = !showFavorites" type="button"
                        class="flex items-center justify-center gap-2 px-4 py-3 rounded-xl text-sm font-medium border transition whitespace-nowrap"
                        :class="showFavorites ? 'bg-yellow-500 text-black border-yellow-500' : 'bg-white text-zinc-700 border-zinc-200 hover:border-zinc-300'">
                        <svg class="w-4 h-4" :fill="showFavorites ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="hidden sm:inline"><?= _t('favorites', 'Favorites') ?></span>
                        <span x-show="favorites.length > 0" x-text="favorites.length" class="bg-black/10 rounded-full px-2 py-0.5 text-xs min-w-[20px] text-center"></span>
                    </button>
                </div>
            </div>

            <!-- ALPHABET STRIP -->
            <div class="flex flex-wrap gap-1.5 mb-6">
                <button @click="alphabet = ''" type="button"
                    class="px-3 h-8 sm:h-9 rounded-lg text-xs font-semibold transition border"
                    :class="alphabet === '' ? 'bg-zinc-900 text-white border-zinc-900' : 'bg-white text-zinc-600 border-zinc-200 hover:border-zinc-400'">
                    <?= _t('all', 'All') ?>
                </button>
                <?php if (!$isRtl): ?>
                <template x-for="char in 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('')" :key="char">
                    <button @click="hasCompany(char) && (alphabet = (alphabet === char ? '' : char))" type="button"
                        :disabled="!hasCompany(char)"
                        class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg text-xs font-semibold transition border"
                        :class="{
                            'bg-zinc-900 text-white border-zinc-900': alphabet === char,
                            'bg-white text-zinc-600 border-zinc-200 hover:border-zinc-400': alphabet !== char && hasCompany(char),
                            'bg-zinc-50 text-zinc-300 border-zinc-100 cursor-not-allowed': !hasCompany(char)
                        }"
                        x-text="char"></button>
                </template>
                <?php else: ?>
                <template x-for="char in 'ا,ب,ت,ث,ج,ح,خ,د,ذ,ر,ز,س,ش,ص,ض,ط,ظ,ع,غ,ف,ق,ك,ل,م,ن,ه,و,ي'.split(',')" :key="char">
                    <button @click="hasCompany(char) && (alphabet = (alphabet === char ? '' : char))" type="button"
                        :disabled="!hasCompany(char)"
                        class="w-8 h-8 sm:w-9 sm:h-9 rounded-lg text-sm font-semibold transition border"
                        :class="{
                            'bg-zinc-900 text-white border-zinc-900': alphabet === char,
                            'bg-white text-zinc-600 border-zinc-200 hover:border-zinc-400': alphabet !== char && hasCompany(char),
                            'bg-zinc-50 text-zinc-300 border-zinc-100 cursor-not-allowed': !hasCompany(char)
                        }"
                        x-text="char"></button>
                </template>
                <?php endif; ?>
            </div>

            <!-- ACTIVE FILTER CHIPS -->
            <div x-show="hasActiveFilters" class="flex flex-wrap items-center gap-2 mb-6">
                <span class="text-xs text-zinc-400 uppercase tracking-wider">
                    <?= _t('filtering_by', 'Filtering by:') ?>
                </span>
                <template x-for="cat in categories" :key="cat">
                    <button @click="toggleCategory(cat)" type="button"
                        class="group inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-zinc-100 border border-zinc-300 text-zinc-700 text-xs font-semibold tracking-wide uppercase hover:bg-zinc-200 transition">
                        <span x-text="cat"></span>
                        <svg class="w-3 h-3 group-hover:rotate-90 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </template>
                <button x-show="alphabet" @click="alphabet = ''" type="button"
                    class="group inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-zinc-100 border border-zinc-200 text-zinc-600 text-xs font-semibold tracking-wide uppercase hover:bg-zinc-200 transition">
                    <span x-text="'<?= _t('starts_with', 'Starts with') ?> ' + alphabet"></span>
                    <svg class="w-3 h-3 group-hover:rotate-90 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <button @click="search=''; clearCategories(); alphabet=''; showFavorites=false" type="button"
                    class="text-xs text-zinc-400 hover:text-zinc-900 transition flex items-center gap-1 <?= $isRtl ? 'mr-2' : 'ml-2' ?>">
                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    <?= _t('clear_filters', 'Clear filters') ?>
                </button>
            </div>

            <!-- LOADING — spinner shows ONLY while the fetch is genuinely
                in progress, never gets stuck since `loading` always
                flips to false when the request finishes (success or not) -->
            <template x-if="loading">
                <div>
                    <div class="flex items-center justify-center gap-3 mb-6 text-zinc-500">
                        <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" opacity="0.25"/>
                            <path d="M12 2a10 10 0 0 1 10 10" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                        <span class="text-sm tracking-wider uppercase"><?= _t('loading', 'Loading exhibitors') ?></span>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-5">
                        <template x-for="i in 12" :key="i">
                            <div class="bg-white border border-zinc-100 rounded-2xl overflow-hidden animate-pulse">
                                <div class="aspect-square bg-zinc-100"></div>
                                <div class="p-3 space-y-1.5"><div class="h-2.5 bg-zinc-100 rounded w-3/4"></div><div class="h-2 bg-zinc-100/70 rounded w-1/2"></div></div>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
 
<!-- NO DATA FOR THIS YEAR — shown once loading finishes and
     the API came back with an error (year/expo combo doesn't
     exist in the registry). Fully bilingual via _t(), which
     reads from your lang/en and lang/ar files. -->
<template x-if="!loading && apiError">
    <div class="text-center py-24">
        <svg class="w-16 h-16 text-zinc-200 mx-auto mb-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <p class="text-zinc-700 text-lg font-semibold mb-2">
            <?= _t('exhibitors_no_data_title', 'Data not available') ?>
        </p>
        <p class="text-zinc-400 text-sm max-w-sm mx-auto">
            <?= _t('exhibitors_no_data_desc', "We don't have exhibitor data for this edition yet. Please check back closer to the event.") ?>
        </p>
    </div>
</template>

            <!-- RESULTS COUNT -->
            <div x-show="exhibitors.length > 0" class="mb-5 flex items-center justify-between">
                <p class="text-sm text-zinc-500">
                    <span class="text-zinc-900 font-semibold" x-text="filteredData.length"></span>
                    <?= _t('of', 'of') ?> <span x-text="exhibitors.length"></span>
                    <?= _t('exhibitors', 'exhibitors') ?>
                </p>
            </div>

            <!-- EMPTY STATE -->
            <template x-if="exhibitors.length > 0 && filteredData.length === 0">
                <div class="text-center py-20">
                    <svg class="w-16 h-16 text-zinc-200 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <p class="text-zinc-500 text-lg mb-2"><?= _t('no_results', 'No exhibitors match your filters') ?></p>
                    <button @click="search=''; clearCategories(); alphabet=''; showFavorites=false" type="button" class="text-zinc-900 hover:underline text-sm font-medium">
                        <?= _t('clear_all_filters', 'Clear all filters') ?>
                    </button>
                </div>
            </template>

            <!-- TIER SECTIONS -->
            <div x-show="filteredData.length > 0" class="space-y-12">

                <template x-for="tier in tiers" :key="tier.key">
                    <section x-show="groupedData.tiers[tier.key] && groupedData.tiers[tier.key].length > 0">
                        <div class="relative mb-6">
                            <div class="flex items-center gap-3 sm:gap-4">
                                <div class="h-px bg-gradient-to-r from-transparent via-yellow-400/50 to-yellow-500 flex-1"></div>
                                <div class="flex items-center gap-2 sm:gap-3">
                                    <svg class="w-2 h-2 text-yellow-500 hidden sm:block" fill="currentColor" viewBox="0 0 8 8"><path d="M4 0 L8 4 L4 8 L0 4 Z"/></svg>
                                    <h2 class="text-yellow-600 text-[11px] sm:text-xs md:text-sm font-bold tracking-[0.2em] sm:tracking-[0.32em] uppercase whitespace-nowrap" x-text="tierLabel(tier.key)"></h2>
                                    <svg class="w-2 h-2 text-yellow-500 hidden sm:block" fill="currentColor" viewBox="0 0 8 8"><path d="M4 0 L8 4 L4 8 L0 4 Z"/></svg>
                                </div>
                                <div class="h-px bg-gradient-to-l from-transparent via-yellow-400/50 to-yellow-500 flex-1"></div>
                            </div>
                            <p class="text-center text-[10px] tracking-[0.2em] uppercase text-zinc-400 mt-3">
                                <span x-text="groupedData.tiers[tier.key].length"></span>
                                <span x-text="groupedData.tiers[tier.key].length === 1 ? '<?= _t('brand', 'brand') ?>' : '<?= _t('brands', 'brands') ?>'"></span>
                            </p>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-5">
                            <template x-for="item in groupedData.tiers[tier.key]" :key="'t-' + tier.key + '-' + item.name_en">
                                <div class="group relative bg-white rounded-2xl border border-zinc-100 overflow-hidden transition-all duration-500 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.12)] hover:-translate-y-1 hover:border-zinc-200">

                                    <div class="absolute top-2 <?= $isRtl ? 'right-2' : 'left-2' ?> z-20">
                                        <span class="text-[7px] sm:text-[8px] tracking-[0.1em] uppercase font-semibold text-yellow-700 bg-white/95 backdrop-blur-sm border border-yellow-200 px-1.5 py-0.5 rounded-full" x-text="tierLabel(tier.key)"></span>
                                    </div>

                                    <button @click.stop.prevent="toggleFavorite(item.name_en)" type="button"
                                        class="absolute top-2 <?= $isRtl ? 'left-2' : 'right-2' ?> z-20 w-7 h-7 rounded-full flex items-center justify-center bg-white/95 backdrop-blur-sm border border-zinc-200 transition hover:scale-110"
                                        :class="isFavorite(item.name_en) ? 'text-yellow-500' : 'text-zinc-400'">
                                        <svg class="w-3.5 h-3.5" :fill="isFavorite(item.name_en) ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    </button>

                                    <a :href="getMapLink(item.name_en)" target="_blank"
                                       class="relative block aspect-square bg-zinc-50 overflow-hidden">
                                        <div class="absolute inset-0 flex items-center justify-center p-4 sm:p-5">
                                            <img x-show="item.image" :src="item.image" :alt="displayName(item)"
                                                 class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-105"
                                                 loading="lazy"
                                                 @error="$el.style.display='none'; $el.nextElementSibling.style.display='flex'">
                                            <div class="hidden flex-col items-center justify-center" :style="item.image ? '' : 'display:flex'">
                                                <svg class="w-8 h-8 text-zinc-300 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                <p class="text-[8px] sm:text-[9px] text-zinc-400 uppercase tracking-wider font-medium text-center px-1" x-text="displayName(item).substring(0,16)"></p>
                                            </div>
                                        </div>
                                        <div class="absolute inset-x-0 bottom-0 h-10 bg-gradient-to-t from-black/55 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end justify-center pb-2">
                                            <span class="inline-flex items-center gap-1 text-yellow-300 text-[9px] tracking-wider uppercase font-semibold">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                                <span class="hidden sm:inline"><?= _t('view_on_map', 'View on map') ?></span>
                                            </span>
                                        </div>
                                    </a>

                                    <div class="p-3 relative">
                                        <h3 class="text-zinc-900 text-[13px] sm:text-sm font-semibold truncate"
                                            x-text="displayName(item)"
                                            :dir="lang === 'ar' ? 'rtl' : 'ltr'" :lang="lang"></h3>
                                        <button x-show="primaryCategory(item)"
                                            @click.stop="setCategoryFilter(primaryCategory(item))"
                                            type="button"
                                            class="mt-1 text-left text-[9px] sm:text-[10px] uppercase tracking-wide truncate font-medium transition w-full"
                                            :class="isCategoryActive(primaryCategory(item)) ? 'text-zinc-900' : 'text-zinc-400 hover:text-zinc-700'"
                                            x-text="primaryCategory(item)"
                                            :title="primaryCategory(item)"></button>
                                        <span class="absolute bottom-0 <?= $isRtl ? 'right-3' : 'left-3' ?> h-[2px] w-0 bg-yellow-500 rounded-full group-hover:w-7 transition-all duration-500"></span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </section>
                </template>

                <!-- All Participants (no tier) -->
                <section x-show="groupedData.other.length > 0">
                    <div class="relative mb-6">
                        <div class="flex items-center gap-3 sm:gap-4">
                            <div class="h-px bg-gradient-to-r from-transparent via-zinc-200 to-zinc-300 flex-1"></div>
                            <div class="flex items-center gap-2 sm:gap-3">
                                <svg class="w-2 h-2 text-zinc-400 hidden sm:block" fill="currentColor" viewBox="0 0 8 8"><path d="M4 0 L8 4 L4 8 L0 4 Z"/></svg>
                                <h2 class="text-zinc-600 text-[11px] sm:text-xs md:text-sm font-bold tracking-[0.2em] sm:tracking-[0.32em] uppercase whitespace-nowrap">
                                    <?= _t('all_participants', 'All Participants') ?>
                                </h2>
                                <svg class="w-2 h-2 text-zinc-400 hidden sm:block" fill="currentColor" viewBox="0 0 8 8"><path d="M4 0 L8 4 L4 8 L0 4 Z"/></svg>
                            </div>
                            <div class="h-px bg-gradient-to-l from-transparent via-zinc-200 to-zinc-300 flex-1"></div>
                        </div>
                        <p class="text-center text-[10px] tracking-[0.2em] uppercase text-zinc-400 mt-3">
                            <span x-text="groupedData.other.length"></span>
                            <span x-text="groupedData.other.length === 1 ? '<?= _t('brand', 'brand') ?>' : '<?= _t('brands', 'brands') ?>'"></span>
                        </p>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-5">
                        <template x-for="item in groupedData.other" :key="'o-' + item.name_en">
                            <div class="group relative bg-white rounded-2xl border border-zinc-100 overflow-hidden transition-all duration-500 hover:shadow-[0_20px_40px_-12px_rgba(0,0,0,0.12)] hover:-translate-y-1 hover:border-zinc-200">

                                <button @click.stop.prevent="toggleFavorite(item.name_en)" type="button"
                                    class="absolute top-2 <?= $isRtl ? 'left-2' : 'right-2' ?> z-20 w-7 h-7 rounded-full flex items-center justify-center bg-white/95 backdrop-blur-sm border border-zinc-200 transition hover:scale-110"
                                    :class="isFavorite(item.name_en) ? 'text-yellow-500' : 'text-zinc-400'">
                                    <svg class="w-3.5 h-3.5" :fill="isFavorite(item.name_en) ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </button>

                                <a :href="getMapLink(item.name_en)" target="_blank"
                                   class="relative block aspect-square bg-zinc-50 overflow-hidden">
                                    <div class="absolute inset-0 flex items-center justify-center p-4 sm:p-5">
                                        <img x-show="item.image" :src="item.image" :alt="displayName(item)"
                                             class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-105"
                                             loading="lazy"
                                             @error="$el.style.display='none'; $el.nextElementSibling.style.display='flex'">
                                        <div class="hidden flex-col items-center justify-center" :style="item.image ? '' : 'display:flex'">
                                            <svg class="w-8 h-8 text-zinc-300 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <p class="text-[8px] sm:text-[9px] text-zinc-400 uppercase tracking-wider font-medium text-center px-1" x-text="displayName(item).substring(0,16)"></p>
                                        </div>
                                    </div>
                                    <div class="absolute inset-x-0 bottom-0 h-10 bg-gradient-to-t from-black/55 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end justify-center pb-2">
                                        <span class="inline-flex items-center gap-1 text-yellow-300 text-[9px] tracking-wider uppercase font-semibold">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span class="hidden sm:inline"><?= _t('view_on_map', 'View on map') ?></span>
                                        </span>
                                    </div>
                                </a>

                                <div class="p-3 relative">
                                    <h3 class="text-zinc-900 text-[13px] sm:text-sm font-semibold truncate"
                                        x-text="displayName(item)"
                                        :dir="lang === 'ar' ? 'rtl' : 'ltr'" :lang="lang"></h3>
                                    <button x-show="primaryCategory(item)"
                                        @click.stop="setCategoryFilter(primaryCategory(item))"
                                        type="button"
                                        class="mt-1 text-left text-[9px] sm:text-[10px] uppercase tracking-wide truncate font-medium transition w-full"
                                        :class="isCategoryActive(primaryCategory(item)) ? 'text-zinc-900' : 'text-zinc-400 hover:text-zinc-700'"
                                        x-text="primaryCategory(item)"
                                        :title="primaryCategory(item)"></button>
                                    <span class="absolute bottom-0 <?= $isRtl ? 'right-3' : 'left-3' ?> h-[2px] w-0 bg-yellow-500 rounded-full group-hover:w-7 transition-all duration-500"></span>
                                </div>
                            </div>
                        </template>
                    </div>
                </section>

            </div>
        </div>

    </div>
</div>