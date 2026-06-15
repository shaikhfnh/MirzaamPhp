<?php
// ============================================================
// includes/exhibitor-directory/template.php
// ============================================================
$lang  = $lang ?? 'en';
$isRtl = ($lang === 'ar');
?>

<div class="mt-20 px-4 md:px-8 lg:px-12 max-w-7xl mx-auto pb-24"
     dir="<?= $isRtl ? 'rtl' : 'ltr' ?>">

    <!-- ═════════ PAGE HEADER ═════════ -->
    <div class="mb-12 text-center relative">
        <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 h-32 bg-yellow-500/5 blur-3xl pointer-events-none"></div>
        <div class="relative">
            <p class="text-yellow-500 text-[11px] tracking-[0.4em] uppercase font-semibold mb-4 inline-flex items-center gap-3">
                <span class="w-8 h-px bg-yellow-500/60"></span>
                <?= __('exhibitors_eyebrow') ?: 'Mirzaam Expo' ?>
                <span class="w-8 h-px bg-yellow-500/60"></span>
            </p>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-3 tracking-tight">
                <?= __('exhibitors_title') ?: 'Exhibitors' ?>
                <span class="text-yellow-500"><?= htmlspecialchars($year) ?></span>
            </h1>
            <p class="text-gray-400 text-sm md:text-base max-w-xl mx-auto">
                <?= __('exhibitors_subtitle') ?: 'Discover every brand, designer, and partner participating this year.' ?>
            </p>
        </div>
    </div>

    <!-- ═════════ FILTER BAR ═════════ -->
    <div class="flex flex-col md:flex-row gap-3 mb-6">

        <!-- Search -->
        <div class="relative flex-1 group">
            <svg class="absolute <?= $isRtl ? 'right-3.5' : 'left-3.5' ?> top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500 group-focus-within:text-yellow-500 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" x-model="search" placeholder="<?= __('search_placeholder') ?: 'Search exhibitors, brands, or categories...' ?>"
                class="w-full bg-gray-900/60 backdrop-blur border border-gray-800 text-white placeholder-gray-500 rounded-xl <?= $isRtl ? 'pr-10 pl-10' : 'pl-10 pr-10' ?> py-3 text-sm focus:outline-none focus:border-yellow-500 focus:bg-gray-900 transition">
            <button x-show="search !== ''" @click="search = ''" type="button"
                class="absolute <?= $isRtl ? 'left-3' : 'right-3' ?> top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center rounded-full bg-gray-800 hover:bg-gray-700 text-gray-400 hover:text-white transition">
                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Category -->
        <div class="relative">
            <select x-model="category" class="appearance-none bg-gray-900/60 backdrop-blur border border-gray-800 text-white rounded-xl <?= $isRtl ? 'pr-4 pl-10' : 'px-4 pr-10' ?> py-3 text-sm cursor-pointer min-w-[200px] focus:outline-none focus:border-yellow-500 transition">
                <option value=""><?= __('all_categories') ?: 'All Categories' ?></option>
                <template x-for="cat in uniqueCategories" :key="cat">
                    <option :value="cat" x-text="cat"></option>
                </template>
            </select>
            <svg class="absolute <?= $isRtl ? 'left-3' : 'right-3' ?> top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>

        <!-- Favorites -->
        <button @click="showFavorites = !showFavorites" type="button"
            class="flex items-center justify-center gap-2 px-4 py-3 rounded-xl text-sm font-medium border transition whitespace-nowrap"
            :class="showFavorites ? 'bg-yellow-500 text-black border-yellow-500' : 'bg-gray-900/60 backdrop-blur text-white border-gray-800 hover:border-yellow-500'">
            <svg class="w-4 h-4" :fill="showFavorites ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
            </svg>
            <span><?= __('favorites') ?: 'Favorites' ?></span>
            <span x-show="favorites.length > 0" x-text="favorites.length" class="bg-black/20 rounded-full px-2 py-0.5 text-xs min-w-[20px] text-center"></span>
        </button>
    </div>

    <!-- ═════════ ACTIVE CATEGORY CHIP ═════════ -->
    <!-- Shows a removable chip when filtering by category -->
    <div x-show="category" class="mb-6 flex items-center gap-2">
        <span class="text-xs text-gray-500 uppercase tracking-wider">
            <?= __('filtering_by') ?: 'Filtering by:' ?>
        </span>
        <button @click="category = ''" type="button"
            class="group inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-yellow-500/10 border border-yellow-500/40 text-yellow-400 text-xs font-semibold tracking-wider uppercase hover:bg-yellow-500/20 transition">
            <span x-text="category"></span>
            <svg class="w-3 h-3 group-hover:rotate-90 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- ═════════ ALPHABET STRIP ═════════ -->
    <?php if (!$isRtl): ?>
    <div class="flex flex-wrap gap-1.5 mb-8 justify-center md:justify-start">
        <button @click="alphabet = ''" type="button"
            class="px-3 h-9 rounded-lg text-xs font-semibold transition border"
            :class="alphabet === '' ? 'bg-yellow-500 text-black border-yellow-500' : 'bg-gray-900/60 text-gray-300 border-gray-800 hover:border-yellow-500'">
            <?= __('all') ?: 'All' ?>
        </button>
        <template x-for="char in 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('')" :key="char">
            <button @click="hasCompany(char) && (alphabet = (alphabet === char ? '' : char))" type="button"
                :disabled="!hasCompany(char)"
                class="w-9 h-9 rounded-lg text-xs font-semibold transition border"
                :class="{
                    'bg-yellow-500 text-black border-yellow-500': alphabet === char,
                    'bg-gray-900/60 text-gray-300 border-gray-800 hover:border-yellow-500': alphabet !== char && hasCompany(char),
                    'bg-gray-900/30 text-gray-700 border-gray-800/50 cursor-not-allowed': !hasCompany(char)
                }"
                x-text="char"></button>
        </template>
    </div>
    <?php endif; ?>

    <!-- ═════════ LOADING ═════════ -->
    <template x-if="exhibitors.length === 0">
        <div>
            <div class="flex items-center justify-center gap-3 mb-6 text-yellow-500">
                <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3" opacity="0.25"/>
                    <path d="M12 2a10 10 0 0 1 10 10" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                </svg>
                <span class="text-sm tracking-wider uppercase"><?= __('loading') ?: 'Loading exhibitors' ?></span>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">
                <template x-for="i in 10" :key="i">
                    <div class="bg-gray-900/40 border border-gray-800 rounded-2xl overflow-hidden animate-pulse">
                        <div class="aspect-square bg-gray-800/50"></div>
                        <div class="p-4 space-y-2"><div class="h-3 bg-gray-800 rounded w-3/4"></div><div class="h-2 bg-gray-800/50 rounded w-1/2"></div></div>
                    </div>
                </template>
            </div>
        </div>
    </template>

    <!-- ═════════ RESULTS COUNT ═════════ -->
    <div x-show="exhibitors.length > 0" class="mb-8 flex items-center justify-between">
        <p class="text-sm text-gray-400">
            <span class="text-white font-semibold" x-text="filteredData.length"></span>
            <?= __('of') ?: 'of' ?> <span x-text="exhibitors.length"></span>
            <?= __('exhibitors') ?: 'exhibitors' ?>
        </p>
        <button x-show="hasActiveFilters" @click="search=''; category=''; alphabet=''; showFavorites=false" type="button"
            class="text-xs text-gray-500 hover:text-yellow-500 transition flex items-center gap-1">
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            <?= __('clear_filters') ?: 'Clear filters' ?>
        </button>
    </div>

    <!-- ═════════ EMPTY STATE ═════════ -->
    <template x-if="exhibitors.length > 0 && filteredData.length === 0">
        <div class="text-center py-20">
            <svg class="w-16 h-16 text-gray-700 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <p class="text-gray-400 text-lg mb-2"><?= __('no_results') ?: 'No exhibitors match your filters' ?></p>
            <button @click="search=''; category=''; alphabet=''; showFavorites=false" type="button" class="text-yellow-500 hover:underline text-sm">
                <?= __('clear_all_filters') ?: 'Clear all filters' ?>
            </button>
        </div>
    </template>

    <!-- ═════════ TIER SECTIONS ═════════ -->
    <div x-show="filteredData.length > 0" class="space-y-14">

        <template x-for="tier in tiers" :key="tier.key">
            <section x-show="groupedData.tiers[tier.key] && groupedData.tiers[tier.key].length > 0">
                <div class="relative mb-8">
                    <div class="flex items-center gap-4 md:gap-6">
                        <div class="h-px bg-gradient-to-r from-transparent via-yellow-500/40 to-yellow-500/60 flex-1"></div>
                        <div class="flex items-center gap-3">
                            <svg class="w-2 h-2 text-yellow-500" fill="currentColor" viewBox="0 0 8 8"><path d="M4 0 L8 4 L4 8 L0 4 Z"/></svg>
                            <h2 class="text-yellow-500 text-xs md:text-sm font-bold tracking-[0.32em] uppercase whitespace-nowrap" x-text="tierLabel(tier.key)"></h2>
                            <svg class="w-2 h-2 text-yellow-500" fill="currentColor" viewBox="0 0 8 8"><path d="M4 0 L8 4 L4 8 L0 4 Z"/></svg>
                        </div>
                        <div class="h-px bg-gradient-to-l from-transparent via-yellow-500/40 to-yellow-500/60 flex-1"></div>
                    </div>
                    <p class="text-center text-[10px] tracking-[0.2em] uppercase text-gray-500 mt-3">
                        <span x-text="groupedData.tiers[tier.key].length"></span>
                        <span x-text="groupedData.tiers[tier.key].length === 1 ? '<?= __("brand") ?: "brand" ?>' : '<?= __("brands") ?: "brands" ?>'"></span>
                    </p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">
                    <template x-for="item in groupedData.tiers[tier.key]" :key="'t-' + tier.key + '-' + item.name_en">

                        <!-- ▼ UNIFIED CARD ▼ -->
                        <div class="group relative bg-gray-900/60 backdrop-blur border border-gray-800 rounded-2xl overflow-hidden transition-all duration-300 hover:border-yellow-500/60 hover:shadow-lg hover:shadow-yellow-500/10">

                            <!-- Tier ribbon -->
                            <div class="absolute top-2.5 <?= $isRtl ? 'right-2.5' : 'left-2.5' ?> z-20">
                                <span class="text-[8px] tracking-[0.14em] uppercase font-semibold text-yellow-400/90 bg-black/70 backdrop-blur-sm px-2 py-0.5 rounded-full" x-text="tierLabel(tier.key)"></span>
                            </div>

                            <!-- Favorite -->
                            <button @click.stop.prevent="toggleFavorite(item.name_en)" type="button"
                                class="absolute top-2.5 <?= $isRtl ? 'left-2.5' : 'right-2.5' ?> z-20 w-8 h-8 rounded-full flex items-center justify-center bg-black/60 backdrop-blur-sm transition hover:bg-black/80 hover:scale-110"
                                :class="isFavorite(item.name_en) ? 'text-yellow-400' : 'text-gray-400'">
                                <svg class="w-4 h-4" :fill="isFavorite(item.name_en) ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </button>

                            <!-- Logo area — click goes to map -->
                            <a :href="getMapLink(item.name_en)" target="_blank"
                               class="relative block aspect-square bg-white overflow-hidden">
                                <div class="absolute inset-0 flex items-center justify-center p-4 md:p-6">
                                    <img x-show="item.image" :src="item.image" :alt="displayName(item)"
                                         class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-105"
                                         loading="lazy"
                                         @error="$el.style.display='none'; $el.nextElementSibling.style.display='flex'">
                                    <div class="hidden flex-col items-center justify-center" :style="item.image ? '' : 'display:flex'">
                                        <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <p class="text-[10px] text-gray-400 uppercase tracking-wider font-medium text-center" x-text="displayName(item).substring(0,18)"></p>
                                    </div>
                                </div>

                                <!-- Subtle hover overlay: pin icon only, no darkening from top -->
                                <div class="absolute inset-x-0 bottom-0 h-12 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end justify-center pb-2">
                                    <span class="inline-flex items-center gap-1 text-yellow-400 text-[10px] tracking-wider uppercase font-semibold">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <?= __('view_on_map') ?: 'View on map' ?>
                                    </span>
                                </div>
                            </a>

                            <!-- Info -->
                            <div class="p-3 bg-gray-900/80">
                                <h3 class="text-white text-sm font-semibold truncate"
                                    x-text="displayName(item)"
                                    :dir="lang === 'ar' ? 'rtl' : 'ltr'" :lang="lang"></h3>

                                <!-- Clickable category chip -->
                                <button x-show="primaryCategory(item)"
                                    @click.stop="setCategoryFilter(primaryCategory(item))"
                                    type="button"
                                    class="mt-1.5 text-left text-[10px] uppercase tracking-wider truncate font-medium transition w-full"
                                    :class="category && primaryCategory(item).toLowerCase() === category.toLowerCase()
                                        ? 'text-yellow-400'
                                        : 'text-gray-500 hover:text-yellow-400'"
                                    x-text="primaryCategory(item)"
                                    :title="primaryCategory(item)"></button>
                            </div>
                        </div>
                        <!-- ▲ END CARD ▲ -->
                    </template>
                </div>
            </section>
        </template>

        <!-- ── Other participants ── -->
        <section x-show="groupedData.other.length > 0">
            <div class="relative mb-8">
                <div class="flex items-center gap-4 md:gap-6">
                    <div class="h-px bg-gradient-to-r from-transparent via-gray-700 to-gray-600 flex-1"></div>
                    <div class="flex items-center gap-3">
                        <svg class="w-2 h-2 text-gray-500" fill="currentColor" viewBox="0 0 8 8"><path d="M4 0 L8 4 L4 8 L0 4 Z"/></svg>
                        <h2 class="text-gray-300 text-xs md:text-sm font-bold tracking-[0.32em] uppercase whitespace-nowrap">
                            <?= __('all_participants') ?: 'All Participants' ?>
                        </h2>
                        <svg class="w-2 h-2 text-gray-500" fill="currentColor" viewBox="0 0 8 8"><path d="M4 0 L8 4 L4 8 L0 4 Z"/></svg>
                    </div>
                    <div class="h-px bg-gradient-to-l from-transparent via-gray-700 to-gray-600 flex-1"></div>
                </div>
                <p class="text-center text-[10px] tracking-[0.2em] uppercase text-gray-500 mt-3">
                    <span x-text="groupedData.other.length"></span>
                    <span x-text="groupedData.other.length === 1 ? '<?= __("brand") ?: "brand" ?>' : '<?= __("brands") ?: "brands" ?>'"></span>
                </p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-3 md:gap-4">
                <template x-for="item in groupedData.other" :key="'o-' + item.name_en">

                    <!-- ▼ UNIFIED CARD (no tier ribbon) ▼ -->
                    <div class="group relative bg-gray-900/60 backdrop-blur border border-gray-800 rounded-2xl overflow-hidden transition-all duration-300 hover:border-yellow-500/60 hover:shadow-lg hover:shadow-yellow-500/10">

                        <button @click.stop.prevent="toggleFavorite(item.name_en)" type="button"
                            class="absolute top-2.5 <?= $isRtl ? 'left-2.5' : 'right-2.5' ?> z-20 w-8 h-8 rounded-full flex items-center justify-center bg-black/60 backdrop-blur-sm transition hover:bg-black/80 hover:scale-110"
                            :class="isFavorite(item.name_en) ? 'text-yellow-400' : 'text-gray-400'">
                            <svg class="w-4 h-4" :fill="isFavorite(item.name_en) ? 'currentColor' : 'none'" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </button>

                        <a :href="getMapLink(item.name_en)" target="_blank"
                           class="relative block aspect-square bg-white overflow-hidden">
                            <div class="absolute inset-0 flex items-center justify-center p-4 md:p-6">
                                <img x-show="item.image" :src="item.image" :alt="displayName(item)"
                                     class="max-w-full max-h-full object-contain transition-transform duration-500 group-hover:scale-105"
                                     loading="lazy"
                                     @error="$el.style.display='none'; $el.nextElementSibling.style.display='flex'">
                                <div class="hidden flex-col items-center justify-center" :style="item.image ? '' : 'display:flex'">
                                    <svg class="w-10 h-10 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-[10px] text-gray-400 uppercase tracking-wider font-medium text-center" x-text="displayName(item).substring(0,18)"></p>
                                </div>
                            </div>

                            <div class="absolute inset-x-0 bottom-0 h-12 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end justify-center pb-2">
                                <span class="inline-flex items-center gap-1 text-yellow-400 text-[10px] tracking-wider uppercase font-semibold">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <?= __('view_on_map') ?: 'View on map' ?>
                                </span>
                            </div>
                        </a>

                        <div class="p-3 bg-gray-900/80">
                            <h3 class="text-white text-sm font-semibold truncate"
                                x-text="displayName(item)"
                                :dir="lang === 'ar' ? 'rtl' : 'ltr'" :lang="lang"></h3>
                            <button x-show="primaryCategory(item)"
                                @click.stop="setCategoryFilter(primaryCategory(item))"
                                type="button"
                                class="mt-1.5 text-left text-[10px] uppercase tracking-wider truncate font-medium transition w-full"
                                :class="category && primaryCategory(item).toLowerCase() === category.toLowerCase()
                                    ? 'text-yellow-400'
                                    : 'text-gray-500 hover:text-yellow-400'"
                                x-text="primaryCategory(item)"
                                :title="primaryCategory(item)"></button>
                        </div>
                    </div>
                </template>
            </div>
        </section>

    </div>
</div>