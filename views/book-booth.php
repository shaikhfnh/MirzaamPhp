<?php
/**
 * SAVE AS: views/book-booth.php
 * Route: /book-your-booth
 */

$boothFormConfig = [
    'eyebrow'  => $lang === 'ar' ? 'مرزام إكسبو ٢٠٢٦' : 'Mirzaam Expo 2026',
    'title'    => $lang === 'ar' ? 'احجز جناحك' : 'Book Your Booth',
    'subtitle' => $lang === 'ar'
        ? 'أخبرنا عن علامتك التجارية وسنتواصل معك لتأكيد التفاصيل.'
        : "Tell us about your brand and we'll follow up to confirm the details.",
    'subject'  => 'Mirzaam 2026 — Booth Interest Form',

    // Pulls from your existing 57 confirmed Mirzaam category
    // translations — same keys/labels used in the category slider
    // and exhibitor directory filters elsewhere on the site.
    'categories' => [
        'architectural_consultant'    => __('cat_architectural_consultant'),
        'bathroom_accessories'        => __('cat_bathroom_accessories'),
        'bathroom_fitouts'            => __('cat_bathroom_fitouts'),
        'beddings'                    => __('cat_beddings'),
        'carpentry_wardrobe_fitout'   => __('cat_carpentry_wardrobe_fitout'),
        'carpets'                     => __('cat_carpets'),
        'cleaning_services'           => __('cat_cleaning_services'),
        'contracting_company'         => __('cat_contracting_company'),
        'counter_tops'                => __('cat_counter_tops'),
        'curtains_drapes'             => __('cat_curtains_drapes'),
        'custom_furniture'            => __('cat_custom_furniture'),
        'doors_windows_indoor'        => __('cat_doors_windows_indoor'),
        'electrical_sockets'          => __('cat_electrical_sockets'),
        'elevator_fitout'             => __('cat_elevator_fitout'),
        'exterior_doors_windows'      => __('cat_exterior_doors_windows'),
        'food_beverage'               => __('cat_food_beverage'),
        'home_accessories'            => __('cat_home_accessories'),
        'home_appliances'             => __('cat_home_appliances'),
        'home_automation_systems'     => __('cat_home_automation_systems'),
        'home_electronics'            => __('cat_home_electronics'),
        'home_fragrances'             => __('cat_home_fragrances'),
        'home_gifting'                => __('cat_home_gifting'),
        'home_insurance'              => __('cat_home_insurance'),
        'home_office_furniture'       => __('cat_home_office_furniture'),
        'home_security'               => __('cat_home_security'),
        'independent_educator'        => __('cat_independent_educator'),
        'indoor_furniture'            => __('cat_indoor_furniture'),
        'indoor_plants'               => __('cat_indoor_plants'),
        'industrial_floors'           => __('cat_industrial_floors'),
        'interior_design_consultant'  => __('cat_interior_design_consultant'),
        'interior_design_education'   => __('cat_interior_design_education'),
        'interior_fitout'             => __('cat_interior_fitout'),
        'kitchen_equipment'           => __('cat_kitchen_equipment'),
        'kitchen_fitout'              => __('cat_kitchen_fitout'),
        'landscape_design'            => __('cat_landscape_design'),
        'landscaping'                 => __('cat_landscaping'),
        'light_fittings'              => __('cat_light_fittings'),
        'mattress'                    => __('cat_mattress'),
        'offers'                      => __('cat_offers'),
        'online_apps_ecommerce'       => __('cat_online_apps_ecommerce'),
        'outdoor_furniture'           => __('cat_outdoor_furniture'),
        'outdoor_plants'              => __('cat_outdoor_plants'),
        'paint'                       => __('cat_paint'),
        'parquet'                     => __('cat_parquet'),
        'pillows'                     => __('cat_pillows'),
        'plant_accessories'           => __('cat_plant_accessories'),
        'property_development'        => __('cat_property_development'),
        'security_system'             => __('cat_security_system'),
        'shading_systems'             => __('cat_shading_systems'),
        'shutter_systems'             => __('cat_shutter_systems'),
        'stones'                      => __('cat_stones'),
        'swimming_pool'               => __('cat_swimming_pool'),
        'textiles'                    => __('cat_textiles'),
        'tiles'                       => __('cat_tiles'),
        'trainer'                     => __('cat_trainer'),
        'upholstery'                  => __('cat_upholstery'),
        'wallpaper'                   => __('cat_wallpaper'),
    ],
];

include __DIR__ . '/../includes/book-booth/template.php';
?>