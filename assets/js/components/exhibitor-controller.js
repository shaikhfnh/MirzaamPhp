console.log("🚦 [SYSTEM] exhibitor-controller.js loaded.");

const SPONSOR_TIERS = [
    { key: 'platinum',   labelEn: 'Platinum Sponsor',     labelAr: 'راعٍ بلاتيني',         types: ['platinum'],                                  companies: [] },
    { key: 'banking',    labelEn: 'Banking Sponsor',      labelAr: 'الراعي المصرفي',       types: ['banking', 'bank'],                           companies: ['boubyan bank', 'boubyan'] },
    { key: 'media',      labelEn: 'Media Sponsor',        labelAr: 'الراعي الإعلامي',      types: ['media'],                                     companies: ['al rai media', 'al rai', 'alrai media'] },
    { key: 'strategic',  labelEn: 'Strategic Sponsor',    labelAr: 'الراعي الاستراتيجي',   types: ['strategic'],                                 companies: ['deema financing', 'deema'] },
    { key: 'gold',       labelEn: 'Gold Sponsor',         labelAr: 'راعٍ ذهبي',            types: ['gold', 'prime'],                             companies: [] },
    { key: 'silver',     labelEn: 'Silver Sponsor',       labelAr: 'راعٍ فضي',             types: ['silver'],                                    companies: [] },
    { key: 'bronze',     labelEn: 'Bronze Sponsor',       labelAr: 'راعٍ برونزي',          types: ['bronze'],                                    companies: [] },
    { key: 'partner',    labelEn: 'Partner',              labelAr: 'شريك',                 types: ['partner'],                                   companies: [] },
    { key: 'realestate', labelEn: 'Real Estate Partner',  labelAr: 'شريك عقاري',           types: ['real estate partner', 'realestate', 'real estate'], companies: [] },
];

function registerExhibitorApp() {
    window.Alpine.data('exhibitorApp', (year, lang) => ({
        year: year || '2026',
        lang: lang || 'en',
        search: '',
        category: '',
        alphabet: '',
        view: 'grid',
        showFavorites: false,
        exhibitors: [],
        favorites: JSON.parse(localStorage.getItem(`mirzaam_favs_${year || '2026'}`) || '[]'),
        tiers: SPONSOR_TIERS,
        _ready: false,

        displayName(item) {
            if (this.lang === 'ar') return item.name_ar?.trim() || item.name_en || '';
            return item.name_en || '';
        },

        // ────────────────────────────────────────────────────
        // CATEGORY HELPERS
        // ────────────────────────────────────────────────────

        // Split a comma-separated category string into a clean array.
        // Used by both display logic and the click-to-filter chip.
        categoriesOf(item) {
            if (!item.category) return [];
            return item.category.split(',').map(c => c.trim()).filter(Boolean);
        },

        // Pick which category label to show on the card.
        // Rule: if the user is filtering by category, show THAT exact
        // category name on the card (so the filter context is visible).
        // Otherwise show the first category.
        primaryCategory(item) {
            const cats = this.categoriesOf(item);
            if (cats.length === 0) return '';

            // If filtering by category, prefer the matched one
            if (this.category) {
                const catLower = this.category.toLowerCase().trim();
                const matched = cats.find(c => c.toLowerCase() === catLower);
                if (matched) return matched;
            }

            return cats[0];
        },

        // Click handler for category chips on a card.
        // Sets the category filter, which triggers URL sync via $watch.
        setCategoryFilter(cat) {
            // If already filtering by this exact category, toggle it off
            if (this.category.toLowerCase() === cat.toLowerCase()) {
                this.category = '';
            } else {
                this.category = cat;
            }
            // Scroll to top so the user sees the filter took effect
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },

        // ────────────────────────────────────────────────────
        // URL SYNC
        // ────────────────────────────────────────────────────
        // Supported query params:
        //   ?category=BATHROOM+ACCESSORIES   (preferred)
        //   ?categorie=BATHROOM+ACCESSORIES  (alias — French spelling)
        //   ?search=wood
        //   ?alphabet=A
        //   ?fav=1
        //   ?view=list|grid
        hydrateFromUrl() {
            const params = new URLSearchParams(window.location.search);

            const cat = params.get('category') ?? params.get('categorie');
            if (cat) this.category = cat.trim().replace(/\s+/g, ' ');

            const search = params.get('search') ?? params.get('q');
            if (search) this.search = search;

            const alpha = params.get('alphabet') ?? params.get('letter');
            if (alpha) this.alphabet = alpha.toUpperCase().charAt(0);

            const fav = params.get('fav') ?? params.get('favorites');
            if (fav === '1' || fav === 'true') this.showFavorites = true;

            const v = params.get('view');
            if (v === 'list' || v === 'grid') this.view = v;
        },

        syncUrl() {
            if (!this._ready) return;

            const params = new URLSearchParams();
            if (this.category)        params.set('category', this.category);
            if (this.search)          params.set('search',   this.search);
            if (this.alphabet)        params.set('alphabet', this.alphabet);
            if (this.showFavorites)   params.set('fav',      '1');
            if (this.view === 'list') params.set('view',     'list');

            const qs  = params.toString();
            const url = window.location.pathname + (qs ? '?' + qs : '');
            history.replaceState(null, '', url);
        },

        async init() {
            this.hydrateFromUrl();

            window.addEventListener('popstate', () => this.hydrateFromUrl());

            this.$watch('category',      () => this.syncUrl());
            this.$watch('search',        () => this.syncUrl());
            this.$watch('alphabet',      () => this.syncUrl());
            this.$watch('showFavorites', () => this.syncUrl());
            this.$watch('view',          () => this.syncUrl());

            const fetchUrl = `/mirzaam/app/data/get_exhibitors.php/${this.year}`;
            console.log(`🚀 [FETCH] ${fetchUrl}`);
            try {
                const response = await fetch(fetchUrl);
                if (!response.ok) throw new Error(`HTTP ${response.status}`);
                const ct = response.headers.get('content-type') || '';
                if (!ct.includes('application/json')) {
                    const t = await response.text();
                    console.error("🚨 Not JSON:", t.slice(0, 200));
                    throw new Error('Not JSON');
                }
                const rawData = await response.json();
                console.log(`✅ Raw: ${rawData.length}`);

                const grouped = new Map();
                rawData.forEach(item => {
                    const key = (item.name_en || '').trim().toLowerCase();
                    if (!key) return;
                    if (!grouped.has(key)) {
                        grouped.set(key, { ...item, name_en: item.name_en.trim(), booth_ids: [item.id].filter(Boolean) });
                    } else {
                        const existing = grouped.get(key);
                        if (item.id && !existing.booth_ids.includes(item.id)) existing.booth_ids.push(item.id);
                        if (!existing.category?.trim() && item.category?.trim()) existing.category = item.category;
                        if (!existing.image?.trim()    && item.image?.trim())    existing.image    = item.image;
                        if (!existing.name_ar?.trim() && item.name_ar?.trim())  existing.name_ar  = item.name_ar;
                        if (this.rankType(item.type) < this.rankType(existing.type)) existing.type = item.type;
                    }
                });
                this.exhibitors = Array.from(grouped.values());
                console.log(`🧹 Unique: ${this.exhibitors.length}`);

                this._ready = true;
            } catch (err) {
                console.error("❌", err);
            }
        },

        rankType(type) {
            const t = (type || '').toLowerCase().trim();
            for (let i = 0; i < SPONSOR_TIERS.length; i++) {
                if (SPONSOR_TIERS[i].types.includes(t)) return i;
            }
            return 999;
        },

        tierOf(item) {
            const t    = (item.type || '').toLowerCase().trim();
            const name = (item.name_en || '').toLowerCase().trim();
            for (const tier of SPONSOR_TIERS) {
                if (tier.companies.includes(name)) return tier.key;
                if (tier.types.includes(t)) return tier.key;
            }
            return null;
        },

        get groupedData() {
            const result = {};
            this.tiers.forEach(tier => { result[tier.key] = []; });
            const other = [];
            this.filteredData.forEach(item => {
                const k = this.tierOf(item);
                if (k && result[k]) result[k].push(item);
                else other.push(item);
            });
            return { tiers: result, other };
        },

        get uniqueCategories() {
            const all = new Set();
            this.exhibitors.forEach(e => {
                this.categoriesOf(e).forEach(c => all.add(c));
            });
            return [...all].sort();
        },

        hasCompany(char) {
            return this.exhibitors.some(e => e.name_en?.toUpperCase().startsWith(char));
        },

        toggleFavorite(name) {
            if (this.favorites.includes(name)) this.favorites = this.favorites.filter(f => f !== name);
            else this.favorites.push(name);
            this.favorites = [...this.favorites];
            localStorage.setItem(`mirzaam_favs_${this.year}`, JSON.stringify(this.favorites));
        },
        isFavorite(name) { return this.favorites.includes(name); },
        getMapLink(name_en) {
            return `https://mirzaam.com/${this.year}/plan/index.php?name=${encodeURIComponent(name_en)}`;
        },

        tierLabel(key) {
            const tier = SPONSOR_TIERS.find(t => t.key === key);
            if (!tier) return '';
            return this.lang === 'ar' ? tier.labelAr : tier.labelEn;
        },

        get hasActiveFilters() {
            return this.search !== '' || this.category !== '' || this.alphabet !== '' || this.showFavorites;
        },

        get filteredData() {
            if (!this.exhibitors || this.exhibitors.length === 0) return [];

            const searchStr = this.search.toLowerCase().trim();
            const catLower  = this.category.toLowerCase().trim();

            return this.exhibitors.filter(e => {
                const matchSearch = searchStr === '' ||
                    e.name_en?.toLowerCase().includes(searchStr) ||
                    e.name_ar?.includes(this.search) ||
                    e.category?.toLowerCase().includes(searchStr);

                const matchCat = catLower === '' ||
                    this.categoriesOf(e).some(c => c.toLowerCase() === catLower);

                const matchAlpha = this.alphabet === '' ||
                    e.name_en?.toUpperCase().startsWith(this.alphabet);

                const matchFav = !this.showFavorites || this.favorites.includes(e.name_en);

                return matchSearch && matchCat && matchAlpha && matchFav;
            });
        }
    }));
    console.log("✨ Alpine bound.");
}

if (window.Alpine) registerExhibitorApp();
else document.addEventListener('alpine:init', registerExhibitorApp);

setTimeout(() => { if (!window.Alpine) console.error("🚨 Alpine missing"); }, 3000);