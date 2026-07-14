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
// $categories_blueprint: full list of 57 categories with i18n
// key, exact category name (must match the Google Sheet's
// category field for filtering to work), and image path.
//
// Images: real AI-generated photography (Magnific), sand/stone
// matte style, stored locally at
// /mirzaam/assets/images/categories/mirzaam/ — original Magnific
// filenames kept as-is (not renamed).
// ============================================================

$mirzaam_active_year = '2025';

$categories_blueprint = [
    ['key' => 'architectural_consultant',
     'category' => 'ARCHITECTURAL CONSULTANT',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_architectural-blueprint-d_43wg5eL9Aa.webp'],

    ['key' => 'bathroom_accessories',
     'category' => 'BATHROOM ACCESSORIES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_modern-bathroom-accessori_LUKqhMMswO.webp'],

    ['key' => 'bathroom_fitouts',
     'category' => 'BATHROOM FITOUTS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_complete-luxury-bathroom-_9R7SKbDNYZ.webp'],

    ['key' => 'beddings',
     'category' => 'BEDDINGS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_folded-luxury-bedding-and_hEBenpzvqL.webp'],

    ['key' => 'carpentry_wardrobe_fitout',
     'category' => 'CARPENTRY & WARDROBE FITOUT',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_custom-wardrobe-carpentry_rlqQIrGxtc.webp'],

    ['key' => 'carpets',
     'category' => 'CARPETS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_rolled-luxury-carpets-dis_YVZi7onWeC.webp'],

    ['key' => 'cleaning_services',
     'category' => 'CLEANING SERVICES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_professional-cleaning-equ_Eqm8VJvuuO.webp'],

    ['key' => 'contracting_company',
     'category' => 'CONTRACTING COMPANY',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_construction-blueprint-an_74sxFobJAL.webp'],

    ['key' => 'counter_tops',
     'category' => 'COUNTER TOPS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_marble-countertop-samples_jS5HhtFLD0.webp'],

    ['key' => 'curtains_drapes',
     'category' => 'CURTAINS & DRAPES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_elegant-drapery-fabric-sh_PiUl5sO42C.webp'],

    ['key' => 'custom_furniture',
     'category' => 'CUSTOM FURNITURE',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_bespoke-custom-furniture-_brEahFD5Y2.webp'],

    ['key' => 'doors_windows_indoor',
     'category' => 'DOORS & WINDOWS | INDOOR',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_interior-door-and-window-_74sxr6zJAL.webp'],

    ['key' => 'electrical_sockets',
     'category' => 'ELECTRICAL SOCKETS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_modern-electrical-socket-_ONgLjY4ynm.webp'],

    ['key' => 'elevator_fitout',
     'category' => 'ELEVATOR FITOUT',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_luxury-elevator-interior-_rlqQuGoxtc.webp'],

    ['key' => 'exterior_doors_windows',
     'category' => 'EXTERIOR DOORS & WINDOWS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_exterior-door-and-window-_LUKqHeIswO.webp'],

    ['key' => 'food_beverage',
     'category' => 'FOOD & BEVERAGE',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_elegant-catering-table-se_KjQCfohkqp.webp'],

    ['key' => 'home_accessories',
     'category' => 'HOME ACCESSORIES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_curated-home-decor-access_xgbFQqtjfW.webp'],

    ['key' => 'home_appliances',
     'category' => 'HOME APPLIANCES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_modern-kitchen-appliance-_vuoddCxa47.webp'],

    ['key' => 'home_automation_systems',
     'category' => 'HOME AUTOMATION SYSTEMS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_smart-home-control-panel-_YVZiio6WeC.webp'],

    ['key' => 'home_electronics',
     'category' => 'HOME ELECTRONICS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_home-entertainment-electr_3GPJJokREY.webp'],

    ['key' => 'home_fragrances',
     'category' => 'HOME FRAGRANCES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_luxury-candle-and-fragran_gJrKkAfSXO.webp'],

    ['key' => 'home_gifting',
     'category' => 'HOME GIFTING',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_curated-gift-box-display-_gJrKkV5SXO.webp'],

    ['key' => 'home_insurance',
     'category' => 'HOME INSURANCE',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_consultation-desk-with-ho_rlqQFDfxtc.webp'],

    ['key' => 'home_office_furniture',
     'category' => 'HOME OFFICE FURNITURE',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_modern-home-office-desk-s_43wgSKP9Aa.webp'],

    ['key' => 'home_security',
     'category' => 'HOME SECURITY',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_security-camera-and-home-_9R7SUwdNYZ.webp'],

    ['key' => 'independent_educator',
     'category' => 'INDEPENDENT EDUCATOR',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_interior-design-consultat_hEBeXfnvqL.webp'],

    ['key' => 'indoor_furniture',
     'category' => 'INDOOR FURNITURE',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_living-room-indoor-furnit_VdnAwxEMMU.webp'],

    ['key' => 'indoor_plants',
     'category' => 'INDOOR PLANTS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_curated-indoor-plant-disp_xgbFqNdjfW.webp'],

    ['key' => 'industrial_floors',
     'category' => 'INDUSTRIAL FLOORS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_industrial-flooring-sampl_62OwJI9iJO.webp'],

    ['key' => 'interior_design_consultant',
     'category' => 'INTERIOR DESIGN CONSULTANT',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_interior-design-consultan_YVZiRxdWeC.webp'],

    ['key' => 'interior_design_education',
     'category' => 'INTERIOR DESIGN EDUCATIONAL BODIES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_design-school-classroom-w_ONgLlboynm.webp'],

    ['key' => 'interior_fitout',
     'category' => 'INTERIOR FITOUT',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_complete-interior-fitout-_XtVcMmWBfo.webp'],

    ['key' => 'kitchen_equipment',
     'category' => 'KITCHEN EQUIPMENT',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_professional-kitchen-equi_fFIBtL0CDY.webp'],

    ['key' => 'kitchen_fitout',
     'category' => 'KITCHEN FITOUT',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_luxury-kitchen-fitout-sho_62OwyIPiJO.webp'],

    ['key' => 'landscape_design',
     'category' => 'LANDSCAPE DESIGN',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_landscape-design-model-di_fFIBt2ECDY.webp'],

    ['key' => 'landscaping',
     'category' => 'LANDSCAPING',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_outdoor-landscaping-garde_kLFEH8M16B.webp'],

    ['key' => 'light_fittings',
     'category' => 'LIGHT FITTINGS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_designer-pendant-light-fi_PiUluMa42C.webp'],

    ['key' => 'mattress',
     'category' => 'MATTRESS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_luxury-mattress-showroom-_MXYGWnRDCm.webp'],

    ['key' => 'offers',
     'category' => 'OFFERS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_promotional-offer-display_vuodI1Sa47.webp'],

    ['key' => 'online_apps_ecommerce',
     'category' => 'ONLINE APPS & E-COMMERCE',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_tablet-displaying-home-sh_gJrKjc0SXO.webp'],

    ['key' => 'outdoor_furniture',
     'category' => 'OUTDOOR FURNITURE',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_outdoor-patio-furniture-s_l715xX9gv9.webp'],

    ['key' => 'outdoor_plants',
     'category' => 'OUTDOOR PLANTS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_outdoor-garden-plant-disp_62OwPLDiJO.webp'],

    ['key' => 'paint',
     'category' => 'PAINT',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_paint-color-swatch-displa_LUKqrfVswO.webp'],

    ['key' => 'parquet',
     'category' => 'PARQUET',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_parquet-wood-flooring-sam_wPLrgj57EI.webp'],

    ['key' => 'pillows',
     'category' => 'PILLOWS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_decorative-pillow-display_MXYGTeYDCm.webp'],

    ['key' => 'plant_accessories',
     'category' => 'PLANT ACCESSORIES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_plant-pot-and-gardening-a_1sHuKyzr4r.webp'],

    ['key' => 'property_development',
     'category' => 'PROPERTY DEVELOPMENT',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_architectural-model-of-pr_MXYGT5fDCm.webp'],

    ['key' => 'security_system',
     'category' => 'SECURITY SYSTEM',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_home-security-control-pan_brEaHcj5Y2.webp'],

    ['key' => 'shading_systems',
     'category' => 'SHADING SYSTEMS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_window-shading-system-dis_gJrKsuESXO.webp'],

    ['key' => 'shutter_systems',
     'category' => 'SHUTTER SYSTEMS',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_roller-shutter-system-dis_iAy7NPN3uK.webp'],

    ['key' => 'stones',
     'category' => 'STONES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_natural-stone-slab-sample_rlqQ1w9xtc.webp'],

    ['key' => 'swimming_pool',
     'category' => 'SWIMMING POOL DESIGN & INSTALLATION',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_luxury-swimming-pool-desi_l715sAkgv9.webp'],

    ['key' => 'textiles',
     'category' => 'TEXTILES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_fabric-and-textile-roll-d_rlqFj0pxtc.webp'],

    ['key' => 'tiles',
     'category' => 'TILES',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_luxury-tile-samples-displ_KjQCVHPkqp.webp'],

    ['key' => 'trainer',
     'category' => 'TRAINER',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_professional-training-ses_1sHQx8br4r.webp'],

    ['key' => 'upholstery',
     'category' => 'UPHOLSTERY',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_upholstery-fabric-swatche_rlqFLsCxtc.webp'],

    ['key' => 'wallpaper',
     'category' => 'WALLPAPER',
     'img' => '/mirzaam/assets/images/categories/mirzaam/magnific_wallpaper-pattern-sample-_brEfkwX5Y2.webp'],
];