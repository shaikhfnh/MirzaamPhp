<?php
/**
 * MIRZAAMIYAT CATEGORIES — REAL DATA
 * ═══════════════════════════════════════════════════════════
 * REPLACES the earlier mirzaamiyat_categories_blueprint entirely.
 *
 * Source: actual exhibitor sheet data (146 records), not the
 * general marketing description page. These are the REAL 19
 * category values found in the 'category' column, ordered by
 * frequency (most exhibitors first).
 *
 * Each 'category' value below MUST match exactly what's stored
 * in the sheet's category column, since the category-slider
 * link builder passes this string straight into the exhibitor
 * page's ?category= filter (case-insensitive substring match,
 * per setCategoryFilter() in the Alpine controller).
 *
 * Combined-category rows in the sheet (e.g. "HOME ACCESSORIES,
 * TABLEWARE AND SERVE WARE") are NOT separate slider cards —
 * they just mean that exhibitor appears under both categories
 * when filtering, which the existing category.split(',') logic
 * in the controller already handles correctly.
 */

$mirzaamiyat_categories_blueprint = [
    [
        'key'      => 'mz_home_accessories',
        'category' => 'HOME ACCESSORIES',
        'img'    => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_perfumes',
        'category' => 'PERFUMES & HOME FRAGRANCES',
        'img'    => 'https://images.unsplash.com/photo-1541643600914-78b084683601?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_gifting',
        'category' => 'GIFTING & GIVEAWAYS',
        'img'    => 'https://images.unsplash.com/photo-1607344645866-009c320b63e0?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_desserts',
        'category' => 'DESSERT STORES & CHOCOLATIERS',
        'img'    => 'https://images.unsplash.com/photo-1578317904318-30aef910fa67?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_loungewear',
        'category' => 'LOUNGEWEAR',
        'img'    => 'https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_services',
        'category' => 'SERVICES',
        'img'    => 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_event_services',
        'category' => 'EVENT SERVICES',
        'img'    => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_fnb',
        'category' => 'F&B',
        'img'    => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_tableware',
        'category' => 'TABLEWARE AND SERVE WARE',
        'img'    => 'https://images.unsplash.com/photo-1578749556568-bc2c40e68b61?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_ramadan_food',
        'category' => 'RAMADAN GOURMET FOOD',
        'img'    => 'https://images.unsplash.com/photo-1587574293340-e0011c4e8ecf?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_personal_care',
        'category' => 'PERSONAL CARE',
        'img'    => 'https://images.unsplash.com/photo-1571875257727-256c39da42af?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_mubkhar',
        'category' => 'MUBKHAR & BUKHOOR ACCESSORIES',
        'img'    => 'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_kitchen',
        'category' => 'KITCHEN APPLIANCES AND COOKWEAR',
        'img'    => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_jewelry',
        'category' => 'JEWERLY',
        'img'    => 'https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_financial',
        'category' => 'FINANCIAL SERVICES',
        'img'    => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_catering',
        'category' => 'CATERING STATIONS & SETUP',
        'img'    => 'https://images.unsplash.com/photo-1555244162-803834f70033?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_furniture',
        'category' => 'FURNITURE',
        'img'    => 'https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_wall_decor',
        'category' => 'WALL DECOR',
        'img'    => 'https://images.unsplash.com/photo-1513519245088-0e12902e5a38?auto=format&fit=crop&w=900&q=80',
    ],
    [
        'key'      => 'mz_uniforms',
        'category' => 'UNIFORMS',
        'img'    => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=900&q=80',
    ],
];


