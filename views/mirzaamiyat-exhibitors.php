<?php
/**
 * Mirzaamiyat Exhibitors
 * Route: /mirzaamiyat/exhibitors
 * @var string $lang
 *
 * Sets $expo_config — the single source of truth for this page.
 * The shared template + Alpine controller read everything from here.
 * To create an IXIR or Mama+Baby exhibitors page, copy this file,
 * change the values in $expo_config, and add the sheet to the registry.
 */

$expo_config = [
    // ── Display ───────────────────────────────────────────────
    'eyebrow'    => $lang === 'ar' ? 'مرزاميات رمضان ٢٠٢٦' : 'Mirzaamiyat Ramadan 2026',
    'title'      => $lang === 'ar' ? 'قائمة العارضين'        : 'Exhibitors',
    'subtitle'   => $lang === 'ar'
    ? 'اكتشف جميع العلامات التجارية والمشاركين في معرض مرزاميات رمضان ٢٠٢٦'
    : 'Discover all brands and participants at Mirzaamiyat Ramadan 2026',
    
    // ── API ───────────────────────────────────────────────────
    // Must match a key in $EXPO_REGISTRY inside get_exhibitors.php.
    // Format: "{expo_name}-{year}"
    'expo'       => 'mirzaamiyat',
    'year'       => $year,
];
?>
 


<?php


// Build the API fetch URL (PHP side, no sheet IDs in JS)
$_api_base = isset($base_path) ? $base_path : '';
$_api_url  = $_api_base . '/api/exhibitors/' . $expo_config['year'] . '?expo=' . $expo_config['expo'];
$_is_rtl   = ($lang === 'ar');
?>

<?php
$_cat_translation_map = ($lang === 'ar') ? [
    'HOME ACCESSORIES'                       => 'إكسسوارات المنزل',
    'WALL DECOR'                              => 'ديكور الجدران',
    'KITCHEN APPLIANCES AND COOKWEAR'         => 'أجهزة المطبخ وأدوات الطهي',
    'LOUNGEWEAR'                              => 'ملابس منزلية',
    'UNIFORMS'                                 => 'الزيّ الرسمي (اليونيفورم)',
    'TABLEWARE AND SERVE WARE'                 => 'أدوات المائدة والتقديم',
    'MUBKHAR & BUKHOOR ACCESSORIES'            => 'إكسسوارات المبخر والبخور',
    'OUTDOOR/GARDEN DECOR & TEMPORARY TENTS'   => 'ديكور الحدائق والمساحات الخارجية والخيام المؤقتة',
    'CATERING STATIONS & SETUP'                => 'محطات وتجهيزات الضيافة',
    'F&B'                                       => 'المأكولات والمشروبات',
    'GIFTING & GIVEAWAYS'                      => 'الهدايا والتوزيعات',
    'EVENT SERVICES'                            => 'خدمات الفعاليات',
    'EQUIPMENT RENTALS'                        => 'تأجير المعدات',
    'JEWERLY'                                   => 'المجوهرات',
    'DESSERT STORES & CHOCOLATIERS'            => 'محلات الحلويات والشوكولاتة',
    'PERFUMES & HOME FRAGRANCES'               => 'العطور وعطور المنزل',
    'RAMADAN GOURMET FOOD'                     => 'مأكولات رمضانية فاخرة',
    'SERVICES'                                  => 'الخدمات',
    'FURNITURE'                                 => 'الأثاث',
    'FINANCIAL SERVICES'                       => 'الخدمات المالية',
    'PERSONAL CARE'                            => 'العناية الشخصية',
] : [];
?>

<div x-data="exhibitorController('<?= htmlspecialchars($_api_url, ENT_QUOTES) ?>', '<?= $lang ?>', <?= htmlspecialchars(json_encode($_cat_translation_map), ENT_QUOTES) ?>)"
     x-init="init()"
     class="relative">

    <?php include 'includes/exhibitor-directory/template.php'; ?>

</div>

<script>

      const MZ_CATEGORY_ICON_MAP = {
    'home accessories': 'sparkle',
    'wall decor': 'frame',
    'kitchen appliances and cookwear': 'pot',
    'loungewear': 'shirt',
    'uniforms': 'shirt',
    'tableware and serve ware': 'utensils',
    'mubkhar & bukhoor accessories': 'candle',
    'outdoor/garden decor & temporary tents': 'tent',
    'catering stations & setup': 'dome',
    'f&b': 'utensils',
    'gifting & giveaways': 'gift',
    'event services': 'calendar',
    'equipment rentals': 'wrench',
    'jewerly': 'gem',
    'dessert stores & chocolatiers': 'dessert',
    'perfumes & home fragrances': 'perfume',
    'ramadan gourmet food': 'moon',
    'services': 'gear',
    'furniture': 'armchair',
    'financial services': 'bank',
    'personal care': 'heart',
};

const MZ_CATEGORY_ICON_PATHS = {
    sparkle: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4m12 0h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8"/><circle cx="12" cy="12" r="3"/>',
    frame: '<rect x="4" y="4" width="16" height="16" rx="1"/><circle cx="9" cy="9" r="1.5"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4-4 3 3 5-5 4 4"/>',
    pot: '<path stroke-linecap="round" stroke-linejoin="round" d="M5 10h14l-1.2 8.5a2 2 0 01-2 1.5H8.2a2 2 0 01-2-1.5L5 10zM7 10a5 5 0 0110 0"/>',
    shirt: '<path stroke-linecap="round" stroke-linejoin="round" d="M8 4L4 8l2 2 2-1.5V20h8V8.5L18 10l2-2-4-4h-2a2 2 0 01-4 0H8z"/>',
    utensils: '<path stroke-linecap="round" stroke-linejoin="round" d="M7 3v6a2 2 0 002 2v10M7 3v6m3-6v6M17 3c-2 0-3 2-3 4v3a2 2 0 002 2v8M17 3v18"/>',
    candle: '<path stroke-linecap="round" stroke-linejoin="round" d="M9 21h6M12 18v-7M9 11h6l-1 0a2 2 0 01-4 0zM12 7c1 1.3 1.5 2.2 1.5 3a1.5 1.5 0 01-3 0c0-.8.5-1.7 1.5-3z"/>',
    tent: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l9 16H3L12 3zM12 3v16M7 13h10"/>',
    dome: '<path stroke-linecap="round" stroke-linejoin="round" d="M4 18a8 8 0 0116 0H4zM2 18h20M12 6V4"/>',
    gift: '<rect x="4" y="9" width="16" height="11" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 9h16v4H4V9zM12 9v11M12 9c-1.5-3-4-4-5-2.5S8.5 9 12 9zm0 0c1.5-3 4-4 5-2.5S15.5 9 12 9z"/>',
    calendar: '<rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/><circle cx="12" cy="15" r="1.5" fill="currentColor" stroke="none"/>',
    wrench: '<path stroke-linecap="round" stroke-linejoin="round" d="M14.7 6.3a4 4 0 00-5.4 5.4L3 18l3 3 6.3-6.3a4 4 0 005.4-5.4l-2.1 2.1-2-2 2.1-2.1z"/>',
    gem: '<path stroke-linecap="round" stroke-linejoin="round" d="M6 3h12l3 5-9 13L3 8l3-5zM3 8h18M9 3l3 5 3-5M12 8l-3 5 3 8 3-8-3-5"/>',
    dessert: '<path stroke-linecap="round" stroke-linejoin="round" d="M4 21h16M5 21v-7a2 2 0 012-2h10a2 2 0 012 2v7M9 12V7a3 3 0 016 0v5M12 4v1"/>',
    perfume: '<path stroke-linecap="round" stroke-linejoin="round" d="M10 2h4M11 2v3M9 5h6l1 3v12a2 2 0 01-2 2H10a2 2 0 01-2-2V8l1-3z"/>',
    moon: '<path stroke-linecap="round" stroke-linejoin="round" d="M17 3a7 7 0 100 14 7.001 7.001 0 01-7-7c0-2.5 1.3-4.7 3.3-6A7 7 0 0017 3z"/>',
    gear: '<circle cx="12" cy="12" r="3"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 008.6 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 8.6a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H8.6a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V8.6a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>',
    armchair: '<path stroke-linecap="round" stroke-linejoin="round" d="M6 11V7a2 2 0 012-2h8a2 2 0 012 2v4M4 11h16v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM4 11a1.5 1.5 0 00-1.5 1.5V15a1.5 1.5 0 001.5 1.5M20 11a1.5 1.5 0 011.5 1.5V15a1.5 1.5 0 01-1.5 1.5M6 17v3m12-3v3"/>',
    bank: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M4 21V10M20 21V10M2 10l10-6 10 6M6 10v6M10 10v6M14 10v6M18 10v6"/>',
    heart: '<path stroke-linecap="round" stroke-linejoin="round" d="M20.8 4.6a5.5 5.5 0 00-7.8 0L12 5.6l-1-1a5.5 5.5 0 00-7.8 7.8l1 1L12 21l7.8-7.8 1-1a5.5 5.5 0 000-7.8z"/>',
    default: '<path stroke-linecap="round" stroke-linejoin="round" d="M20.6 13.4L13 21l-9-9 7.6-7.6a2 2 0 011.4-.6H19a2 2 0 012 2v6.2a2 2 0 01-.4 1.4z"/><circle cx="14.5" cy="9.5" r="1.2" fill="currentColor" stroke="none"/>',
};
function exhibitorController(apiUrl, lang, catMap) {    return {
        // ── State ─────────────────────────────────────────────   
        exhibitors: [],
        loading:    true,   // NEW — true while fetch is in progress
        apiError:   false,  // NEW — true if the API returned an error (bad year/expo)
        search:        '',
        categories:    [],
        catMap: catMap || {},
        translateCategory(name) {
            if (!name) return '';
            return this.catMap[name.trim().toUpperCase()] || name;
        },    
        alphabet:      '',
        filtersOpen:   false,
        showFavorites: false,
        favorites:     JSON.parse(localStorage.getItem('mz_fav_mirzaamiyat') || '[]'),
        lang:          lang,

        tiers: [
            { key: 'Sponsor'  },
            { key: 'Partner'  },
            { key: 'Prime'    },
            { key: 'Floater'  },
            { key: 'Standard' },
        ],

        // ── Init ──────────────────────────────────────────────
async init() {
    // FIX A — pre-fill the category filter from the URL, if
    // present. This is what makes category-slider links like
    // /mirzaamiyat/exhibitors?category=LOUNGEWEAR actually
    // filter the page on load, instead of showing everything
    // until the user manually clicks a category.
    const params = new URLSearchParams(window.location.search);
    const categoryFromUrl = params.get('category');
    if (categoryFromUrl) {
        this.categories = [categoryFromUrl];
    }
 


Alpine.store('catIcons', {
    svg(key, size = 14) {
        const path = MZ_CATEGORY_ICON_PATHS[key] || MZ_CATEGORY_ICON_PATHS['default'];
        return `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">${path}</svg>`;
    }
});
 
    // FIX B — proper loading/error state (no infinite spinner)
    try {
        const res  = await fetch(apiUrl);
        const data = await res.json();
 
        if (Array.isArray(data)) {
            this.exhibitors = data;
        } else {
            this.exhibitors = [];
            this.apiError = true;
        }
    } catch (e) {
        console.error('Exhibitor fetch failed:', e);
        this.exhibitors = [];
        this.apiError = true;
    } finally {
        this.loading = false;
    }
},

        // ── Computed ──────────────────────────────────────────
        get filteredData() {
            let data = this.exhibitors;
            if (this.showFavorites) {
                data = data.filter(e => this.favorites.includes(e.name_en));
            }
            if (this.search.trim()) {
                const q = this.search.trim().toLowerCase();
                data = data.filter(e =>
                    e.name_en.toLowerCase().includes(q) ||
                    e.name_ar.toLowerCase().includes(q)  ||
                    e.category.toLowerCase().includes(q)
                );
            }
            if (this.categories.length) {
                data = data.filter(e =>
                    this.categories.some(cat =>
                        e.category.toLowerCase().includes(cat.toLowerCase())
                    )
                );
            }
            if (this.alphabet) {
                data = data.filter(e => {
                    const name = this.displayName(e);
                    return name.toUpperCase().startsWith(this.alphabet.toUpperCase());
                });
            }
            return data;
        },

        get groupedData() {
            const tiers = {};
            const other = [];
            this.tiers.forEach(t => { tiers[t.key] = []; });
            this.filteredData.forEach(item => {
                const match = this.tiers.find(t =>
                    (item.type || '').trim().toLowerCase() === t.key.toLowerCase()
                );
                match ? tiers[match.key].push(item) : other.push(item);
            });
            return { tiers, other };
        },

        get hasCategoryData() {
            return this.exhibitors.some(e => e.category && e.category.trim() !== '');
        },

       get categoryFacets() {
    const counts = {};
    this.exhibitors.forEach(e => {
        e.category.split(',').forEach(c => {
            const name = c.trim();
            if (name) counts[name] = (counts[name] || 0) + 1;
        });
    });
    return Object.entries(counts)
        .sort((a, b) => b[1] - a[1])
        .map(([name, count]) => ({
            name,
            count,
            icon: MZ_CATEGORY_ICON_MAP[name.toLowerCase().trim()] || 'default'
        }));
},

        get hasActiveFilters() {
            return this.search || this.categories.length || this.alphabet || this.showFavorites;
        },

        get activeFilterCount() {
            return this.categories.length + (this.alphabet ? 1 : 0);
        },

        // ── Methods ───────────────────────────────────────────
        displayName(item) {
            return (this.lang === 'ar' && item.name_ar) ? item.name_ar : item.name_en;
        },

        primaryCategory(item) {
            return item.category ? item.category.split(',')[0].trim() : '';
        },

        tierLabel(key) {
            const labels = {
                en: { Sponsor: 'Sponsor', Partner: 'Partner', Prime: 'Prime', Floater: 'Floater', Standard: 'Exhibitor' },
                ar: { Sponsor: 'راعي',    Partner: 'شريك',    Prime: 'مميز',   Floater: 'متجول',   Standard: 'عارض'    },
            };
            return (labels[this.lang] || labels.en)[key] || key;
        },

        getMapLink() { return '#'; },

        toggleCategory(cat) {
            const i = this.categories.indexOf(cat);
            i >= 0 ? this.categories.splice(i, 1) : this.categories.push(cat);
        },

        isCategoryActive(cat)  { return this.categories.includes(cat); },
        setCategoryFilter(cat) { this.categories = [cat]; },
        clearCategories()      { this.categories = []; },

        hasCompany(char) {
            return this.exhibitors.some(e =>
                this.displayName(e).toUpperCase().startsWith(char.toUpperCase())
            );
        },

        isFavorite(name) { return this.favorites.includes(name); },

        toggleFavorite(name) {
            const i = this.favorites.indexOf(name);
            i >= 0 ? this.favorites.splice(i, 1) : this.favorites.push(name);
            localStorage.setItem('mz_fav_mirzaamiyat', JSON.stringify(this.favorites));
        },
    };
}
</script>