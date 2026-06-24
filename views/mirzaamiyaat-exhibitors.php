<?php
/**
 * Mirzaamiyat Exhibitors
 * Route: /mirzaamiyaat/exhibitors
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
    'year'       => '2026',
];
?>

<?php
// Build the API fetch URL (PHP side, no sheet IDs in JS)
$_api_base = isset($base_path) ? $base_path : '';
$_api_url  = $_api_base . '/api/exhibitors/' . $expo_config['year'] . '?expo=' . $expo_config['expo'];
$_is_rtl   = ($lang === 'ar');
?>

<div x-data="exhibitorController('<?= htmlspecialchars($_api_url, ENT_QUOTES) ?>', '<?= $lang ?>')"
     x-init="init()"
     class="relative">

    <?php include 'includes/exhibitor-directory/template.php'; ?>

</div>

<script>
function exhibitorController(apiUrl, lang) {
    return {
        // ── State ─────────────────────────────────────────────
        exhibitors:    [],
        search:        '',
        categories:    [],
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
            Alpine.store('catIcons', {
                svg(key) {
                    if (window.catIconSvg) return window.catIconSvg(key);
                    return '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.6"><path stroke-linecap="round" stroke-linejoin="round" d="M20.6 13.4L13 21l-9-9 7.6-7.6a2 2 0 011.4-.6H19a2 2 0 012 2v6.2a2 2 0 01-.4 1.4z"/><circle cx="14.5" cy="9.5" r="1.2" fill="currentColor" stroke="none"/></svg>';
                }
            });

            try {
                const res  = await fetch(apiUrl);
                const data = await res.json();
                this.exhibitors = Array.isArray(data) ? data : [];
            } catch (e) {
                console.error('Exhibitor fetch failed:', e);
                this.exhibitors = [];
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
            this.filteredData.forEach(e => {
                e.category.split(',').forEach(c => {
                    const name = c.trim();
                    if (name) counts[name] = (counts[name] || 0) + 1;
                });
            });
            return Object.entries(counts)
                .sort((a, b) => b[1] - a[1])
                .map(([name, count]) => ({ name, count, icon: 'default' }));
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