<?php
/**
 * SAVE AS: views/mirzaamiyat-book-booth.php
 * Route: /mirzaamiyat/book-your-booth
 */

$boothFormConfig = [
    'eyebrow'  => $lang === 'ar' ? 'مرزاميات رمضان ٢٠٢٦' : 'Mirzaamiyat Ramadan 2026',
    'title'    => $lang === 'ar' ? 'احجزي جناحك' : 'Book Your Booth',
    'subtitle' => $lang === 'ar'
        ? 'أخبرينا عن علامتك التجارية وسنتواصل معك لتأكيد التفاصيل.'
        : "Tell us about your brand and we'll follow up to confirm the details.",
    'subject'  => 'Mirzaamiyat 2026 — Booth Interest Form',

    // Pulls from your existing 21 confirmed Mirzaamiyat category
    // translations — same keys/labels used in Mirzaamiyat's own
    // category slider and exhibitor directory filters.
    'categories' => [
        'mz_home_accessories'  => __('cat_mz_home_accessories'),
        'mz_wall_decor'        => __('cat_mz_wall_decor'),
        'mz_kitchen'           => __('cat_mz_kitchen'),
        'mz_loungewear'        => __('cat_mz_loungewear'),
        'mz_uniforms'          => __('cat_mz_uniforms'),
        'mz_tableware'         => __('cat_mz_tableware'),
        'mz_mubkhar'           => __('cat_mz_mubkhar'),
        'mz_outdoor_garden'    => __('cat_mz_outdoor_garden'),
        'mz_catering'          => __('cat_mz_catering'),
        'mz_fnb'               => __('cat_mz_fnb'),
        'mz_gifting'           => __('cat_mz_gifting'),
        'mz_event_services'    => __('cat_mz_event_services'),
        'mz_equipment_rentals' => __('cat_mz_equipment_rentals'),
        'mz_jewelry'           => __('cat_mz_jewelry'),
        'mz_desserts'          => __('cat_mz_desserts'),
        'mz_perfumes'          => __('cat_mz_perfumes'),
        'mz_ramadan_food'      => __('cat_mz_ramadan_food'),
        'mz_services'          => __('cat_mz_services'),
        'mz_furniture'         => __('cat_mz_furniture'),
        'mz_financial'         => __('cat_mz_financial'),
        'mz_personal_care'     => __('cat_mz_personal_care'),
    ],
];

include __DIR__ . '/../includes/book-booth/template.php';
?>