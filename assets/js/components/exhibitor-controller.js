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

// ────────────────────────────────────────────────────────────
// CATEGORY → ICON KEY MAP
// Maps exact category strings (as they appear in the sheet,
// case-insensitive match) to an icon key. The icon key is
// resolved to actual SVG markup in template.php via category_icon().
// Any category NOT in this map falls back to 'default' (tag icon).
// ────────────────────────────────────────────────────────────
const CATEGORY_ICON_MAP = {
    'architectural consultant': 'compass',
    'bathroom accessories': 'shower',
    'bathroom fitouts': 'bath',
    'beddings': 'bed',
    'carpentry & wardrobe fitout': 'hammer',
    'carpets': 'rug',
    'cleaning services': 'sparkles',
    'contracting company': 'hardhat',
    'counter tops': 'layers',
    'curtains & drapes': 'curtain',
    'custom furniture': 'sofa',
    'doors & windows | indoor': 'door',
    'electrical sockets': 'plug',
    'exterior doors & windows': 'door-closed',
    'food & beverage': 'utensils',
    'home accessories': 'sparkle',
    'home appliances': 'appliance',
    'home automation systems': 'smarthome',
    'home electronics': 'tv',
    'home fragrances': 'candle',
    'home gifting': 'gift',
    'home insurance': 'shield-check',
    'home office furniture': 'desk',
    'home security': 'shield-lock',
    'indoor furniture': 'armchair',
    'indoor plants': 'sprout',
    'industrial floors': 'floor-grid',
    'interior design consultant': 'ruler',
    'interior design educational bodies': 'graduation',
    'interior fitout': 'layout',
    'kitchen equipment': 'pot',
    'kitchen fitout': 'kitchen',
    'landscape design': 'landscape',
    'landscaping': 'shovel',
    'light fittings': 'bulb',
    'mattress': 'mattress',
    'online apps & e-commerce': 'cart',
    'outdoor furniture': 'lounger',
    'outdoor plants': 'palm',
    'paint': 'paintroller',
    'parquet': 'parquet',
    'pillows': 'pillow',
    'plant accessories': 'pot-plant',
    'property development': 'building',
    'security system': 'camera',
    'shading systems': 'blinds',
    'shutter systems': 'shutter',
    'stones': 'gem',
    'swimming pool design & installation': 'waves',
    'textiles': 'shirt',
    'tiles': 'tiles',
    'upholstery': 'needle',
    'wallpaper': 'wallpaper',
};

// ────────────────────────────────────────────────────────────
// CATEGORY → ARABIC LABEL MAP
// Same lowercase-key convention as CATEGORY_ICON_MAP above, so
// translateCategory() can reuse the same lookup pattern as
// iconKeyFor(). Any category not listed falls back to showing
// the original English text — safe, never breaks.
// ────────────────────────────────────────────────────────────
const CATEGORY_LABEL_MAP_AR = {
    'architectural consultant': 'استشاري معماري',
    'bathroom accessories': 'إكسسوارات الحمامات',
    'bathroom fitouts': 'تجهيزات الحمامات',
    'beddings': 'السرائر',
    'carpentry & wardrobe fitout': 'النجارة وتجهيز الخزائن',
    'carpets': 'السجاد',
    'cleaning services': 'خدمات التنظيف',
    'contracting company': 'شركات المقاولات',
    'counter tops': 'أسطح',
    'curtains & drapes': 'الستائر',
    'custom furniture': 'تفصيل الأثاث',
    'doors & windows | indoor': 'الأبواب والنوافذ الداخلية',
    'electrical sockets': 'مقابس كهربائية',
    'elevator fitout': 'تجهيزات المصاعد',
    'exterior doors & windows': 'الأبواب والنوافذ الخارجية',
    'food & beverage': 'الأطعمة والمشروبات',
    'home accessories': 'الإكسسوارات المنزلية',
    'home appliances': 'معدات المنازل',
    'home automation systems': 'أتمتة المنازل',
    'home electronics': 'الأجهزة الكهربائية',
    'home fragrances': 'المعطرات المنزلية',
    'home gifting': 'الهدايا المنزلية',
    'home insurance': 'التأمين المنزلي',
    'home office furniture': 'المكتب المنزلي',
    'home security': 'شركات الحراسة',
    'independent educator': 'معلم مستقل',
    'indoor furniture': 'الأثاث الداخلي',
    'indoor plants': 'النباتات الداخلية',
    'industrial floors': 'أرضيات صناعية',
    'interior design consultant': 'استشاري التصميم الداخلي',
    'interior design educational bodies': 'الهيئات التعليمية للتصميم الداخلي',
    'interior fitout': 'التجهيزات الداخلية',
    'kitchen equipment': 'أجهزة المطابخ',
    'kitchen fitout': 'تجهيزات المطابخ',
    'landscape design': 'تصميم الحدائق',
    'landscaping': 'الحدائق المنزلية',
    'light fittings': 'تركيبات الإضاءة',
    'mattress': 'المراتب',
    'offers': 'عروض',
    'online apps & e-commerce': 'التطبيقات الإلكترونية والتسوق الإلكتروني',
    'outdoor furniture': 'الأثاث الخارجي',
    'outdoor plants': 'النباتات الخارجية',
    'paint': 'الدهانات',
    'parquet': 'باركيه',
    'pillows': 'الوسائد',
    'plant accessories': 'اكسسوارات النبات',
    'property development': 'تطوير العقارات',
    'security system': 'أنظمة الأمن',
    'shading systems': 'أنظمة التظليل',
    'shutter systems': 'أنظمة الشتر',
    'stones': 'أحجار',
    'swimming pool design & installation': 'تجهيز وتركيب حمامات السباحة',
    'textiles': 'المنسوجات',
    'tiles': 'بلاط',
    'trainer': 'مدرب',
    'upholstery': 'المفروشات',
    'wallpaper': 'ورق الحائط',
};

// ────────────────────────────────────────────────────────────
// ICON SVG STRINGS — must mirror cat_icon_path() in template.php
// exactly (same keys, same path data). Used by the sidebar via
// $store.catIcons.svg(key) since x-html needs a JS-side source,
// while the card chips render PHP-side via cat_icon_svg().
// ────────────────────────────────────────────────────────────
const CATEGORY_ICON_PATHS = {
    compass: '<circle cx="12" cy="12" r="9"/><path stroke-linecap="round" stroke-linejoin="round" d="M14.5 9.5l-2 5-3 1.5 2-5 3-1.5z"/>',
    shower: '<path stroke-linecap="round" stroke-linejoin="round" d="M7 5a5 5 0 0110 0M5 9h14M8 13v1m4-1v1m4-1v1M8 17v1m4-1v1m4-1v1"/>',
    bath: '<path stroke-linecap="round" stroke-linejoin="round" d="M4 12h16v2a4 4 0 01-4 4H8a4 4 0 01-4-4v-2zM4 12V8a2 2 0 012-2M9 6a2 2 0 014 0v2"/><path stroke-linecap="round" d="M4 18v2m14-2v2"/>',
    bed: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 18v-7a2 2 0 012-2h14a2 2 0 012 2v7M3 18h18M3 18v2m18-2v2M7 9V6a1 1 0 011-1h8a1 1 0 011 1v3"/>',
    hammer: '<path stroke-linecap="round" stroke-linejoin="round" d="M14.5 4.5l3 3-7 7-3-3 7-7zM7.5 14.5L3 19l2 2 4.5-4.5"/>',
    rug: '<rect x="4" y="5" width="16" height="14" rx="1.5"/><path stroke-linecap="round" d="M8 9h8M8 13h8M8 17h4"/>',
    sparkles: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l1.5 4.5L18 9l-4.5 1.5L12 15l-1.5-4.5L6 9l4.5-1.5L12 3zM5 16l.7 2.1L8 19l-2.3.9L5 22l-.7-2.1L2 19l2.3-.9L5 16z"/>',
    hardhat: '<path stroke-linecap="round" stroke-linejoin="round" d="M4 16a8 8 0 0116 0H4zM12 8v3M3 16h18"/>',
    layers: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l9 5-9 5-9-5 9-5zM3 13l9 5 9-5"/>',
    curtain: '<path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16M6 4c0 4 2 4 2 8s-2 4-2 8M18 4c0 4-2 4-2 8s2 4 2 8M12 4c0 4 1 4 1 8s-1 4-1 8"/>',
    sofa: '<path stroke-linecap="round" stroke-linejoin="round" d="M5 12V8a2 2 0 012-2h10a2 2 0 012 2v4M3 12h18v5a1 1 0 01-1 1H4a1 1 0 01-1-1v-5zM5 18v2m14-2v2M3 12a1 1 0 011-1h1v3H4a1 1 0 01-1-1v-1zm20 0a1 1 0 00-1-1h-1v3h1a1 1 0 001-1v-1z"/>',
    door: '<rect x="5" y="3" width="14" height="18" rx="1"/><circle cx="15" cy="12" r=".8" fill="currentColor" stroke="none"/>',
    plug: '<path stroke-linecap="round" stroke-linejoin="round" d="M9 7V3m6 4V3M7 7h10v4a5 5 0 01-10 0V7zM12 16v5"/>',
    'door-closed': '<rect x="4" y="4" width="9" height="16" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M16 8h4v12h-4M10 12h.01"/>',
    utensils: '<path stroke-linecap="round" stroke-linejoin="round" d="M7 3v6a2 2 0 002 2v10M7 3v6m3-6v6M17 3c-2 0-3 2-3 4v3a2 2 0 002 2v8M17 3v18"/>',
    sparkle: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4m12 0h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8"/><circle cx="12" cy="12" r="3"/>',
    appliance: '<rect x="5" y="3" width="14" height="18" rx="1.5"/><circle cx="12" cy="14" r="3.5"/><path stroke-linecap="round" d="M8 6.5h.01M11 6.5h.01"/>',
    smarthome: '<path stroke-linecap="round" stroke-linejoin="round" d="M4 11l8-6 8 6M6 10v9a1 1 0 001 1h3v-6h4v6h3a1 1 0 001-1v-9"/><circle cx="12" cy="14" r="1.2" fill="currentColor" stroke="none"/>',
    tv: '<rect x="3" y="5" width="18" height="13" rx="1.5"/><path stroke-linecap="round" d="M8 21h8"/>',
    candle: '<path stroke-linecap="round" stroke-linejoin="round" d="M9 21h6M12 18v-7M9 11h6l-1 0a2 2 0 01-4 0zM12 7c1 1.3 1.5 2.2 1.5 3a1.5 1.5 0 01-3 0c0-.8.5-1.7 1.5-3z"/>',
    gift: '<rect x="4" y="9" width="16" height="11" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M4 9h16v4H4V9zM12 9v11M12 9c-1.5-3-4-4-5-2.5S8.5 9 12 9zm0 0c1.5-3 4-4 5-2.5S15.5 9 12 9z"/>',
    'shield-check': '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>',
    desk: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 9h18M5 9V6a1 1 0 011-1h12a1 1 0 011 1v3M5 9v10m14-10v10M9 14h2"/>',
    'shield-lock': '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/><rect x="9.5" y="11" width="5" height="4" rx="0.5"/><path stroke-linecap="round" d="M10.5 11V9.5a1.5 1.5 0 013 0V11"/>',
    armchair: '<path stroke-linecap="round" stroke-linejoin="round" d="M6 11V7a2 2 0 012-2h8a2 2 0 012 2v4M4 11h16v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM4 11a1.5 1.5 0 00-1.5 1.5V15a1.5 1.5 0 001.5 1.5M20 11a1.5 1.5 0 011.5 1.5V15a1.5 1.5 0 01-1.5 1.5M6 17v3m12-3v3"/>',
    sprout: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 22v-9M12 13c0-3-2-5-6-5 0 4 2 6 6 6zM12 13c0-4 2-6 6-6 0 4-2 6-6 6z"/>',
    'floor-grid': '<rect x="3" y="3" width="18" height="18" rx="1"/><path stroke-linecap="round" d="M3 9h18M3 15h18M9 3v18M15 3v18"/>',
    ruler: '<path stroke-linecap="round" stroke-linejoin="round" d="M4 17L17 4l3 3L7 20l-3-3zM10 11l1.5 1.5M13 8l1.5 1.5M7 14l1.5 1.5"/>',
    graduation: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4L2 9l10 5 10-5-10-5zM6 11.5V17c0 1.5 3 3 6 3s6-1.5 6-3v-5.5"/>',
    layout: '<rect x="3" y="3" width="18" height="18" rx="1.5"/><path stroke-linecap="round" d="M3 9h18M9 9v12"/>',
    pot: '<path stroke-linecap="round" stroke-linejoin="round" d="M5 10h14l-1.2 8.5a2 2 0 01-2 1.5H8.2a2 2 0 01-2-1.5L5 10zM7 10a5 5 0 0110 0"/>',
    kitchen: '<path stroke-linecap="round" stroke-linejoin="round" d="M4 9h16M4 9v9a2 2 0 002 2h12a2 2 0 002-2V9M4 9l1-4h14l1 4M9 4v2m3-2v2m3-2v2"/>',
    landscape: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 19l5-9 3 5 2-3 4 7H3zM17 8a2 2 0 11-4 0 2 2 0 014 0z"/>',
    shovel: '<path stroke-linecap="round" stroke-linejoin="round" d="M16 3l5 5-9 9-5-1-1-5 9-9zM7 16l-4 4"/>',
    bulb: '<path stroke-linecap="round" stroke-linejoin="round" d="M9 18h6M10 21h4M12 3a6 6 0 00-3 11.2c.4.3.6.8.6 1.3v.5h4.8v-.5c0-.5.2-1 .6-1.3A6 6 0 0012 3z"/>',
    mattress: '<rect x="3" y="8" width="18" height="9" rx="1.5"/><path stroke-linecap="round" d="M3 12h18M7 8v9m5-9v9m5-9v9"/>',
    cart: '<circle cx="9" cy="20" r="1.2" fill="currentColor" stroke="none"/><circle cx="17" cy="20" r="1.2" fill="currentColor" stroke="none"/><path stroke-linecap="round" stroke-linejoin="round" d="M3 4h2l2.4 11.5a2 2 0 002 1.5h7.2a2 2 0 002-1.6L20 8H6"/>',
    lounger: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 18l5-9 9 4-2 5H3zM8 9l3-5 6 3-2 3"/>',
    palm: '<path stroke-linecap="round" stroke-linejoin="round" d="M12 21V11M12 11c-2-4-6-5-9-3 2 3 5 4 9 3zm0 0c2-4 6-5 9-3-2 3-5 4-9 3zm0 0c0-3 1-5 3-7m-3 7c0-3-1-5-3-7"/>',
    paintroller: '<rect x="4" y="4" width="12" height="6" rx="1"/><path stroke-linecap="round" stroke-linejoin="round" d="M8 10v4h4v6h-2"/>',
    parquet: '<rect x="3" y="3" width="18" height="18" rx="1"/><path stroke-linecap="round" d="M3 8h6V3M9 8v5H3M9 13h6V8M15 13v5H9M15 18h6v-5M9 18H3v-5M21 8h-6v5"/>',
    pillow: '<path stroke-linecap="round" stroke-linejoin="round" d="M5 8a3 3 0 013-3h8a3 3 0 013 3v8a3 3 0 01-3 3H8a3 3 0 01-3-3V8zM9 9c1 1 1 2 0 3M15 12c-1 1-1 2 0 3"/>',
    'pot-plant': '<path stroke-linecap="round" stroke-linejoin="round" d="M8 13h8l-1 7H9l-1-7zM12 13V7M12 7c-2 0-3-1.5-3-3 2 0 3 1 3 3zm0 0c2 0 3-1.5 3-3-2 0-3 1-3 3z"/>',
    building: '<rect x="5" y="3" width="14" height="18" rx="1"/><path stroke-linecap="round" d="M9 7h.01M15 7h.01M9 11h.01M15 11h.01M9 15h.01M15 15h.01M10 21v-3h4v3"/>',
    camera: '<path stroke-linecap="round" stroke-linejoin="round" d="M4 8a2 2 0 012-2h2l1.5-2h5L16 6h2a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2V8z"/><circle cx="12" cy="13" r="3.5"/>',
    blinds: '<rect x="4" y="4" width="16" height="16" rx="1"/><path stroke-linecap="round" d="M4 8h16M4 12h16M4 16h16"/>',
    shutter: '<rect x="4" y="4" width="16" height="16" rx="1"/><path stroke-linecap="round" d="M4 9h16M4 14h16"/>',
    gem: '<path stroke-linecap="round" stroke-linejoin="round" d="M6 3h12l3 5-9 13L3 8l3-5zM3 8h18M9 3l3 5 3-5M12 8l-3 5 3 8 3-8-3-5"/>',
    waves: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 9c2-2 4-2 6 0s4 2 6 0 4-2 6 0M3 15c2-2 4-2 6 0s4 2 6 0 4-2 6 0"/>',
    shirt: '<path stroke-linecap="round" stroke-linejoin="round" d="M8 4L4 8l2 2 2-1.5V20h8V8.5L18 10l2-2-4-4h-2a2 2 0 01-4 0H8z"/>',
    tiles: '<rect x="3" y="3" width="8" height="8" rx="0.5"/><rect x="13" y="3" width="8" height="8" rx="0.5"/><rect x="3" y="13" width="8" height="8" rx="0.5"/><rect x="13" y="13" width="8" height="8" rx="0.5"/>',
    needle: '<path stroke-linecap="round" stroke-linejoin="round" d="M19 5l-9.5 9.5M14 4l6 6-2 2-6-6 2-2zM3 21l3-7 4 4-7 3z"/>',
    wallpaper: '<rect x="3" y="3" width="18" height="18" rx="1"/><path stroke-linecap="round" d="M3 8c2 0 2 2 4 2s2-2 4-2 2 2 4 2 2-2 4-2M3 14c2 0 2 2 4 2s2-2 4-2 2 2 4 2 2-2 4-2"/>',
    default: '<path stroke-linecap="round" stroke-linejoin="round" d="M20.6 13.4L13 21l-9-9 7.6-7.6a2 2 0 011.4-.6H19a2 2 0 012 2v6.2a2 2 0 01-.4 1.4z"/><circle cx="14.5" cy="9.5" r="1.2" fill="currentColor" stroke="none"/>',
};

function registerExhibitorApp() {
    window.Alpine.data('exhibitorApp', (year, lang) => ({
        year: year || '2026',
        lang: lang || 'en',
        search: '',
        categories: [],
        categorySearch: '', 
        alphabet: '',
        view: 'grid',
        showFavorites: false,
        filtersOpen: false,
        exhibitors: [],
        apiError : false,
        loading: true,
        translateCategory(categoryName) {
            if (!categoryName) return '';
            if (this.lang !== 'ar') return categoryName;
            return CATEGORY_LABEL_MAP_AR[categoryName.toLowerCase().trim()] || categoryName;
        },
        favorites: JSON.parse(localStorage.getItem(`mirzaam_favs_${year || '2026'}`) || '[]'),
        tiers: SPONSOR_TIERS,
        _ready: false,

        displayName(item) {
            if (this.lang === 'ar') return item.name_ar?.trim() || item.name_en || '';
            return item.name_en || '';
        },

        categoriesOf(item) {
            if (!item.category) return [];
            return item.category.split(',').map(c => c.trim()).filter(Boolean);
        },

        primaryCategory(item) {
            const cats = this.categoriesOf(item);
            if (cats.length === 0) return '';
            if (this.categories.length > 0) {
                const activeLower = this.categories.map(c => c.toLowerCase());
                const matched = cats.find(c => activeLower.includes(c.toLowerCase()));
                if (matched) return matched;
            }
            return cats[0];
        },

        // Icon key lookup, case-insensitive, default fallback
        iconKeyFor(categoryName) {
            if (!categoryName) return 'default';
            return CATEGORY_ICON_MAP[categoryName.toLowerCase().trim()] || 'default';
        },

        toggleCategory(cat) {
            const idx = this.categories.findIndex(c => c.toLowerCase() === cat.toLowerCase());
            if (idx > -1) this.categories = this.categories.filter((_, i) => i !== idx);
            else this.categories = [...this.categories, cat];
        },

        isCategoryActive(cat) {
            return this.categories.some(c => c.toLowerCase() === cat.toLowerCase());
        },

        setCategoryFilter(cat) {
            this.toggleCategory(cat);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },

        clearCategories() { this.categories = []; },

        hydrateFromUrl() {
            const params = new URLSearchParams(window.location.search);
            const cat = params.get('category') ?? params.get('categorie');
            if (cat) this.categories = cat.split(',').map(c => c.trim().replace(/\s+/g, ' ')).filter(Boolean);
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
            if (this.categories.length > 0) params.set('category', this.categories.join(','));
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

            this.$watch('categories',    () => this.syncUrl());
            this.$watch('search',        () => this.syncUrl());
            this.$watch('alphabet',      () => this.syncUrl());
            this.$watch('showFavorites', () => this.syncUrl());
            this.$watch('view',          () => this.syncUrl());

            const basePath = window.location.pathname.split('/participants')[0] || '';
            const fetchUrl = `${basePath}/api/exhibitors/${this.year}`;
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
                this.apiError = true;
            } finally {
                this.loading = false;
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

        get categoryFacets() {
            const counts = new Map();
            this.exhibitors.forEach(e => {
                this.categoriesOf(e).forEach(c => counts.set(c, (counts.get(c) || 0) + 1));
            });
            return [...counts.entries()]
                .map(([name, count]) => ({ name, count, icon: this.iconKeyFor(name) }))
                .sort((a, b) => a.name.localeCompare(b.name));
        },

        get filteredCategoryFacets() {
    if (!this.categorySearch.trim()) return this.categoryFacets;
    const q = this.categorySearch.trim().toLowerCase();
    return this.categoryFacets.filter(f => {
        // Search matches either the raw English name OR the
        // translated Arabic label, so it works regardless of
        // which language the visitor is typing in.
        const translated = this.translateCategory(f.name).toLowerCase();
        return f.name.toLowerCase().includes(q) || translated.includes(q);
    });
},

        get uniqueCategories() { return this.categoryFacets.map(f => f.name); },

        // ────────────────────────────────────────────────────
        // Detects whether THIS YEAR's dataset has any category
        // info at all. Checked against the normalized 'category'
        // field (backend already aliases sheet columns named
        // category/categories/categorie -> this single field),
        // so this is just: does any exhibitor have a non-empty,
        // non-whitespace category string?
        // If false, the sidebar should not render and the card
        // grid should expand to full width.
        // ────────────────────────────────────────────────────
        get hasCategoryData() {
            if (!this.exhibitors || this.exhibitors.length === 0) return false;
            return this.exhibitors.some(e => (e.category || '').trim().length > 0);
        },

        hasCompany(char) {
            if (this.lang === 'ar') {
                return this.exhibitors.some(e => e.name_ar?.startsWith(char));
            }
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
            return this.search !== '' || this.categories.length > 0 || this.alphabet !== '' || this.showFavorites;
        },

        get activeFilterCount() {
            return this.categories.length + (this.alphabet ? 1 : 0) + (this.showFavorites ? 1 : 0);
        },

        get filteredData() {
            if (!this.exhibitors || this.exhibitors.length === 0) return [];
            const searchStr     = this.search.toLowerCase().trim();
            const activeCatsLow = this.categories.map(c => c.toLowerCase().trim());

            return this.exhibitors.filter(e => {
                const matchSearch = searchStr === '' ||
                    e.name_en?.toLowerCase().includes(searchStr) ||
                    e.name_ar?.includes(this.search) ||
                    e.category?.toLowerCase().includes(searchStr);

                const matchCat = activeCatsLow.length === 0 ||
                    this.categoriesOf(e).some(c => activeCatsLow.includes(c.toLowerCase()));

                const matchAlpha = this.alphabet === '' ||
                    (this.lang === 'ar'
                        ? e.name_ar?.startsWith(this.alphabet)
                        : e.name_en?.toUpperCase().startsWith(this.alphabet));

                const matchFav = !this.showFavorites || this.favorites.includes(e.name_en);

                return matchSearch && matchCat && matchAlpha && matchFav;
            });
        }
    }));
    console.log("✨ Alpine bound.");
}

if (window.Alpine) {
    registerExhibitorApp();
    window.Alpine.store('catIcons', {
        svg(key, size = 14) {
            const path = CATEGORY_ICON_PATHS[key] || CATEGORY_ICON_PATHS['default'];
            return `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">${path}</svg>`;
        }
    });
} else {
    document.addEventListener('alpine:init', () => {
        registerExhibitorApp();
        window.Alpine.store('catIcons', {
            svg(key, size = 14) {
                const path = CATEGORY_ICON_PATHS[key] || CATEGORY_ICON_PATHS['default'];
                return `<svg width="${size}" height="${size}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">${path}</svg>`;
            }
        });
    });
}

setTimeout(() => { if (!window.Alpine) console.error("🚨 Alpine missing"); }, 3000);