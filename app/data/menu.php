<?php

/**
 * These variables are injected from index.php
 * @var string $lang
 */
// ============================================================
// app/data/menu.php
// ============================================================
// ROUTING CONVENTIONS
// ────────────────────────────────────────────────────────────
// 'link'     => internal path (no leading slash, no '/mirzaam/').
//               It will be wrapped by get_url($link) in header.php,
//               which prepends /mirzaam/ on local and /ar/ when
//               Arabic mode is active. Examples:
//                  'why-visit'              -> /mirzaam/why-visit
//                                              /mirzaam/ar/why-visit
//                  'participants/2024'      -> /mirzaam/participants/2024
//
// 'external' => true when the URL points OFF-SITE (Matterport VR,
//               old mirzaam.com pages, etc). In header.php we then
//               use the value of 'link' verbatim without get_url().
// ============================================================

$MENU = [
     [
        "title" => "menu_overview",
        "items" => [
            ["label" => "ov_about",   "link" => "about"],
            ["label" => "ov_contact", "link" => "contact"],
        ]
    ],
    [
        "title" => "menu_visit",
        "items" => [
            ["label" => "visit_why",  "link" => "why-visit"],
            ["label" => "visit_plan", "link" => "plan-your-trip"],
        ]
    ],
    [
        "title" => "menu_exhibit",
        "items" => [
            ["label" => "exhibit_why", "link" => "why-exhibit"],
        ]
    ],
    [
        "title" => "menu_explore",
        "items" => [
            ["label" => "explore_booth", "link" => "best-booth"],
            ["label" => "explore_way",  "external" => true, "link" => "https://studio--glp-navigator.us-central1.hosted.app/"],
        ]
    ],
    [
        'title' => 'menu_previous',
        'items' => [
            ['label' => 'menu_prev_2025', 'link' => '/previous/2025'],
            ['label' => 'menu_prev_2024', 'link' => '/previous/2024'],
            ['label' => 'menu_prev_2023', 'link' => '/previous/2023'],
            ['label' => 'menu_prev_2022', 'link' => '/previous/2022'],
            ['label' => 'menu_prev_2020', 'link' => '/previous/2020'],
        ]
    ],
    [
        "title" => "menu_mirz2026",
        "items" => [
            ["label" => "mirz_about",      "link" => "mirzaamiyat"],
            ["label" => "mirz_plan",       "external" => true, "link" => "https://mirzaam.com/mirzaamiyat/2026/registration/plan.php"],
            ["label" => "mirz_exhibitors", "link" => "mirzaamiyat/exhibitors"],
        ]
    ],
   
];

// ============================================================
// FOOTER MENUS
// ============================================================

// 1. Explore Menu
$footer_explore_menu = [
    ['key' => 'about',       'lang_key' => 'footer_link_about',       'url' => 'about'],
    ['key' => 'exhibit',     'lang_key' => 'footer_link_exhibit',     'url' => 'why-exhibit'],
    ['key' => 'visit',       'lang_key' => 'footer_link_visit',       'url' => 'why-visit'],
    ['key' => 'mirzaamiyat', 'lang_key' => 'footer_link_mirzaamiyat', 'url' => 'mirzaamiyat'],
];

// 2. Contact Directory
$footer_contact_menu = [
    ['key' => 'exhibiting', 'lang_key' => 'footer_link_exhibiting', 'url' => 'contact'],
    ['key' => 'visiting',   'lang_key' => 'footer_link_visiting',   'url' => 'plan-your-trip'],
    ['key' => 'media',      'lang_key' => 'footer_link_media',      'url' => 'media'],
    ['key' => 'privacy',    'lang_key' => 'footer_link_privacy',    'url' => 'privacy'],
];

// 3. Corporate Expos


// 3. Corporate Expos
$footer_expos_blueprint = [
    ['key' => 'ixir',        'image' => '/mirzaam/assets/images/footer/ixir.png',        'url' => $lang === 'ar' ? 'https://ixirexpo.com/ar' : 'https://ixirexpo.com'],
    ['key' => 'mamababy',    'image' => '/mirzaam/assets/images/footer/mamababy.png',    'url' => $lang === 'ar' ? 'https://mamababyexpo.com/ar' : 'https://mamababyexpo.com'],
    
    // Only mirzaam uses the concatenated base path
    ['key' => 'mirzaam',     'image' => '/mirzaam/assets/images/footer/mirzaam.png',     'url' => $lang === 'ar' ? $base_path . '/ar' : $base_path],
    
    // Only mirzaamiyat uses the concatenated base path
    ['key' => 'mirzaamiyat', 'image' => '/mirzaam/assets/images/footer/mirzaamiyat.png', 'url' => $lang === 'ar' ? $base_path . '/ar/mirzaamiyat/about' : $base_path . '/mirzaamiyat/about'],
];

