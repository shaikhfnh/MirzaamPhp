<?php
// ============================================================
// app/data/categories_data.php
// ============================================================
// Shared category data used by the category slider component
// on the homepage and any other page. Centralized here so a
// single change propagates everywhere.
//
// $mirzaam_active_year: controls which year the category cards
// link to when clicked (e.g. /participants/2026?category=TILES).
// Change this ONE value to update every page at once.
//
// $categories_blueprint: the full list of 53 categories with
// their i18n key, exact category name (must match the Google
// Sheet's category field for filtering to work), and an
// Unsplash image URL.
//
// Images: all from Unsplash (free license, no attribution
// required). To swap an image, just change the URL — the photo
// ID is the part after /photo- in the URL.
// ============================================================

// ── GLOBAL YEAR SETTING ─────────────────────────────────────
// Change this to switch ALL category links across the site.
// e.g. set to '2025' during the 2025 expo season.
$mirzaam_active_year = '2025';

// ── CATEGORY BLUEPRINT ──────────────────────────────────────
// 'key'      → used for i18n: __('cat_architectural_consultant')
// 'category' → EXACT name as it appears in the Google Sheet
//              (used in the ?category= URL param for filtering)
// 'img'      → Unsplash CDN URL, landscape crop, 1200px wide
$categories_blueprint = [
    ['key' => 'architectural_consultant',
     'category' => 'ARCHITECTURAL CONSULTANT',
     'img' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'bathroom_accessories',
     'category' => 'BATHROOM ACCESSORIES',
     'img' => 'https://images.unsplash.com/photo-1620626011761-996317b8d101?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'bathroom_fitouts',
     'category' => 'BATHROOM FITOUTS',
     'img' => 'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'beddings',
     'category' => 'BEDDINGS',
     'img' => 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'carpentry_wardrobe_fitout',
     'category' => 'CARPENTRY & WARDROBE FITOUT',
     'img' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'carpets',
     'category' => 'CARPETS',
     'img' => 'https://images.unsplash.com/photo-1513519245088-0e12902e5a38?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'cleaning_services',
     'category' => 'CLEANING SERVICES',
     'img' => 'https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'contracting_company',
     'category' => 'CONTRACTING COMPANY',
     'img' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'counter_tops',
     'category' => 'COUNTER TOPS',
     'img' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'curtains_drapes',
     'category' => 'CURTAINS & DRAPES',
     'img' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'custom_furniture',
     'category' => 'CUSTOM FURNITURE',
     'img' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'doors_windows_indoor',
     'category' => 'DOORS & WINDOWS | INDOOR',
     'img' => 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'electrical_sockets',
     'category' => 'ELECTRICAL SOCKETS',
     'img' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'exterior_doors_windows',
     'category' => 'EXTERIOR DOORS & WINDOWS',
     'img' => 'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'food_beverage',
     'category' => 'FOOD & BEVERAGE',
     'img' => 'https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'home_accessories',
     'category' => 'HOME ACCESSORIES',
     'img' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'home_appliances',
     'category' => 'HOME APPLIANCES',
     'img' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'home_automation_systems',
     'category' => 'HOME AUTOMATION SYSTEMS',
     'img' => 'https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'home_electronics',
     'category' => 'HOME ELECTRONICS',
     'img' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'home_fragrances',
     'category' => 'HOME FRAGRANCES',
     'img' => 'https://images.unsplash.com/photo-1602178509398-6dd7d8e3f7c4?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'home_gifting',
     'category' => 'HOME GIFTING',
     'img' => 'https://images.unsplash.com/photo-1513201099705-a9746e1e201f?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'home_insurance',
     'category' => 'HOME INSURANCE',
     'img' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'home_office_furniture',
     'category' => 'HOME OFFICE FURNITURE',
     'img' => 'https://images.unsplash.com/photo-1593062096033-9a26b09da705?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'home_security',
     'category' => 'HOME SECURITY',
     'img' => 'https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'indoor_furniture',
     'category' => 'INDOOR FURNITURE',
     'img' => 'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'indoor_plants',
     'category' => 'INDOOR PLANTS',
     'img' => 'https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'industrial_floors',
     'category' => 'INDUSTRIAL FLOORS',
     'img' => 'https://images.unsplash.com/photo-1581858726788-75bc0f6a952d?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'interior_design_consultant',
     'category' => 'INTERIOR DESIGN CONSULTANT',
     'img' => 'https://images.unsplash.com/photo-1618219908412-a29a1bb7b86e?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'interior_design_education',
     'category' => 'INTERIOR DESIGN EDUCATIONAL BODIES',
     'img' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'interior_fitout',
     'category' => 'INTERIOR FITOUT',
     'img' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'kitchen_equipment',
     'category' => 'KITCHEN EQUIPMENT',
     'img' => 'https://images.unsplash.com/photo-1556909114-44e3e70034e2?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'kitchen_fitout',
     'category' => 'KITCHEN FITOUT',
     'img' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'landscape_design',
     'category' => 'LANDSCAPE DESIGN',
     'img' => 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'landscaping',
     'category' => 'LANDSCAPING',
     'img' => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'light_fittings',
     'category' => 'LIGHT FITTINGS',
     'img' => 'https://images.unsplash.com/photo-1507473885765-e6ed057ab3f9?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'mattress',
     'category' => 'MATTRESS',
     'img' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'online_apps_ecommerce',
     'category' => 'ONLINE APPS & E-COMMERCE',
     'img' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'outdoor_furniture',
     'category' => 'OUTDOOR FURNITURE',
     'img' => 'https://images.unsplash.com/photo-1600210492493-0946911123ea?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'outdoor_plants',
     'category' => 'OUTDOOR PLANTS',
     'img' => 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'paint',
     'category' => 'PAINT',
     'img' => 'https://images.unsplash.com/photo-1562259949-e8e7689d7828?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'parquet',
     'category' => 'PARQUET',
     'img' => 'https://images.unsplash.com/photo-1615529328331-f8917597711f?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'pillows',
     'category' => 'PILLOWS',
     'img' => 'https://images.unsplash.com/photo-1584100936595-c0654b55a2e2?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'plant_accessories',
     'category' => 'PLANT ACCESSORIES',
     'img' => 'https://images.unsplash.com/photo-1485955900006-10f4d324d411?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'property_development',
     'category' => 'PROPERTY DEVELOPMENT',
     'img' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'security_system',
     'category' => 'SECURITY SYSTEM',
     'img' => 'https://images.unsplash.com/photo-1557597774-9d273605dfa9?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'shading_systems',
     'category' => 'SHADING SYSTEMS',
     'img' => 'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'shutter_systems',
     'category' => 'SHUTTER SYSTEMS',
     'img' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'stones',
     'category' => 'STONES',
     'img' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'swimming_pool',
     'category' => 'SWIMMING POOL DESIGN & INSTALLATION',
     'img' => 'https://images.unsplash.com/photo-1507652313519-d4e9174996dd?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'textiles',
     'category' => 'TEXTILES',
     'img' => 'https://images.unsplash.com/photo-1558171813-01eda5e3f1ce?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'tiles',
     'category' => 'TILES',
     'img' => 'https://images.unsplash.com/photo-1615529328331-f8917597711f?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'upholstery',
     'category' => 'UPHOLSTERY',
     'img' => 'https://images.unsplash.com/photo-1540518614846-7eded433c457?auto=format&fit=crop&w=1200&q=80'],

    ['key' => 'wallpaper',
     'category' => 'WALLPAPER',
     'img' => 'https://images.unsplash.com/photo-1615876234886-fd9a39fda97f?auto=format&fit=crop&w=1200&q=80'],
];