<?php
$MENU = [
    [
        "title" => "menu_visit",
        "items" => [
            ["label" => "visit_why", "link" => "why-visit.php"],
            ["label" => "visit_plan", "link" => "trip.php"]
        ]
    ],
    [
        "title" => "menu_exhibit",
        "items" => [
            ["label" => "exhibit_why", "link" => "why-exhibit.php"]
        ]
    ],
    [
        "title" => "menu_explore",
        "items" => [
            ["label" => "explore_booth", "link" => "booth.php"],
            ["label" => "explore_way", "link" => "wayfinding.php"]
        ]
    ],
    [
        "title" => "menu_prev",
        "items" => [
            ["label" => "prev_2025", "link" => "#"],
            ["label" => "prev_2024", "link" => "#"],
            ["label" => "prev_2023", "link" => "#"],
            ["label" => "prev_vr2023", "link" => "#"],
            ["label" => "prev_2022", "link" => "#"],
            ["label" => "prev_2020", "link" => "#"]
        ]
    ],
    [
        "title" => "menu_mirz2026",
        "items" => [
            ["label" => "mirz_about", "link" => "#"],
            ["label" => "mirz_plan", "link" => "#"],
            ["label" => "mirz_exhibitors", "link" => "#"]
        ]
    ],
    [
        "title" => "menu_overview",
        "items" => [
            ["label" => "ov_about", "link" => "about.php"],
            ["label" => "ov_contact", "link" => "#"]
        ]
    ]
];

// 1. Explore Menu Structure
$footer_explore_menu = [
    ['key' => 'about',       'lang_key' => 'footer_link_about',       'url' => '#'],
    ['key' => 'exhibit',     'lang_key' => 'footer_link_exhibit',     'url' => '#'],
    ['key' => 'visit',       'lang_key' => 'footer_link_visit',       'url' => '#'],
    ['key' => 'mirzaamiyat', 'lang_key' => 'footer_link_mirzaamiyat', 'url' => '#'],
];

// 2. Contact Directory Structure
$footer_contact_menu = [
    ['key' => 'exhibiting',  'lang_key' => 'footer_link_exhibiting',  'url' => '#'],
    ['key' => 'visiting',    'lang_key' => 'footer_link_visiting',    'url' => '#'],
    ['key' => 'media',       'lang_key' => 'footer_link_media',       'url' => '#'],
    ['key' => 'privacy',     'lang_key' => 'footer_link_privacy',     'url' => '#'],
];

// 3. Corporate Expos Sub-Brands Structure
$footer_expos_blueprint = [
    ['key' => 'mirzaam',     'image' => '/mirzaam/assets/images/logo/NO BG.png'],
    ['key' => 'mirzaamiyat', 'image' => '/mirzaam/assets/images/Home/mirzaamiyatlogo.png'],
    ['key' => 'ixir',        'image' => '/mirzaam/assets/images/Home/ixirlogo.png'],
    ['key' => 'mamababy',    'image' => '/mirzaam/assets/images/Home/mamababylogo.png'],
];