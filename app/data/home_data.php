<?php
// app/data/home_data.php
$hero_media = [
    [
        'type'   => 'video',
        'src'    => 'https://cdn.shopify.com/videos/c/o/v/25ba264a952748a8846b2fd271387d52.mp4',
        'poster' => '/mirzaam/assets/images/Home/fallback-poster.png'
    ]
    // Later, you can easily add another array here to make it a slider!
];

$about_pillars = [
    [
        'id'      => '01',
        'title'   => 'about_p1_title',
        'heading' => 'about_p1_heading',
        'desc'    => 'about_p1_desc',
        'image'   => '/mirzaam/assets/images/Home/stage.png'
    ],
    [
        'id'      => '02',
        'title'   => 'about_p2_title',
        'heading' => 'about_p2_heading',
        'desc'    => 'about_p2_desc',
        'image'   => '/mirzaam/assets/images/Home/expo-hall.jpg'
    ],
    [
        'id'      => '03',
        'title'   => 'about_p3_title',
        'heading' => 'about_p3_heading',
        'desc'    => 'about_p3_desc',
        'image'   => '/mirzaam/assets/images/Home/network.webp'
    ]
];

$app_connect_data = [
    'frame_image' => '/mirzaam/assets/images/home/iPhone17.png',
    'home_image'  => '/mirzaam/assets/images/home/app_home.png',
    'map_image'   => '/mirzaam/assets/images/home/app_map.png',
    'chat_image'  => '/mirzaam/assets/images/home/app_chat.jpeg',
    'app_store'   => '/mirzaam/assets/images/home/app-store.png',
    'google_play' => '/mirzaam/assets/images/home/google-play.png',
    'apple_link'  => '#',
    'google_link' => '#'
];

$insights_data = [
    [
        'video_id' => '0INmtmL3f5Y',
        'logo'     => '/mirzaam/assets/images/brands/ikea-logo.png',
        'title'    => 'insight_1_title',
        'img_src'  => 'https://img.youtube.com/vi/0INmtmL3f5Y/maxresdefault.jpg'
    ],
    [
        'video_id' => 'rMOBbUKAGF0',
        'logo'     => '/mirzaam/assets/images/brands/ikea-logo.png',
        'title'    => 'insight_2_title',
        'img_src'  => 'https://img.youtube.com/vi/rMOBbUKAGF0/maxresdefault.jpg'
    ],
    [
        'video_id' => 'ggPM2jzM4Ak',
        'logo'     => '/mirzaam/assets/images/brands/technogym-logo.png',
        'title'    => 'insight_3_title',
        'img_src'  => 'https://img.youtube.com/vi/ggPM2jzM4Ak/maxresdefault.jpg'
    ],
    [
        'video_id' => 'GDlo7MSwslA',
        'logo'     => '/mirzaam/assets/images/brands/technogym-logo.png',
        'title'    => 'insight_4_title',
        'img_src'  => 'https://img.youtube.com/vi/GDlo7MSwslA/maxresdefault.jpg'
    ]
];


$sponsors = [
    [
        "brand_name"  => "Al Wazzan",
        "tier_tag"    => "platinum_sponsor",
        "logo_url"    => "/mirzaam/assets/images/brands/alwazzan-logo.png",
        "website_url" => "https://www.alwazzan.com"
    ],
    [
        "brand_name"  => "Boubyan",
        "tier_tag"    => "banking_sponsor",
        "logo_url"    => "/mirzaam/assets/images/brands/boubyan-logo.png",
        "website_url" => "https://www.bankboubyan.com"
    ],
    [
        "brand_name"  => "IKEA",
        "tier_tag"    => "platinum_sponsor",
        "logo_url"    => "/mirzaam/assets/images/brands/ikea-logo.png",
        "website_url" => "https://www.ikea.com"
    ],
    [
        "brand_name"  => "Deema",
        "tier_tag"    => "strategic_sponsor",
        "logo_url"    => "/mirzaam/assets/images/brands/deema-logo.png",
        "website_url" => "https://www.deema.com"
    ],
    [
        "brand_name"  => "Technogym",
        "tier_tag"    => "platinum_sponsor",
        "logo_url"    => "/mirzaam/assets/images/brands/technogym-logo.png",
        "website_url" => "https://www.technogym.com"
    ],
    [
        "brand_name"  => "Al Rai",
        "tier_tag"    => "media_sponsor",
        "logo_url"    => "/mirzaam/assets/images/brands/alrai-logo.png",
        "website_url" => "https://www.alrai.com"
    ]
];

$metrics = [
    [
        'value' => '40000',
        'en' => 'Attendees', 'ar' => 'الحضور',
        'svg' => ' <path d="M 5 95 L 5 90 M 155 95 L 155 90 M 5 20 L 10 20 M 155 20 L 150 20" class="opacity-50" />
                            <line x1="5" y1="95" x2="155" y2="95" class="blueprint-axis-line stroke-[2]" />
                            
                            <path d="M 20 95 A 60 60 0 0 1 140 95" class="blueprint-draw-trace" />
                            <path d="M 35 95 A 45 45 0 0 1 125 95" class="blueprint-draw-trace" />
                            <path d="M 50 95 A 30 30 0 0 1 110 95" class="blueprint-draw-trace" />
                            
                            <path d="M 20 95 Q 80 25 125 95" class="blueprint-draw-trace" />
                            <path d="M 140 95 Q 80 25 35 95" class="blueprint-draw-trace" />
                            <path d="M 20 95 Q 50 45 110 95" class="blueprint-draw-trace" />
                            <path d="M 140 95 Q 110 45 50 95" class="blueprint-draw-trace" />
                            
                            <line x1="80" y1="15" x2="80" y2="95" class="blueprint-axis-line opacity-50 stroke-[1]" />'
    ],
    [
        'value' => '207',
        'en' => 'Exhibitors', 'ar' => 'العارضون',
        'svg' => ' <line x1="5" y1="95" x2="155" y2="95" class="blueprint-axis-line stroke-[2]" />
                            
                            <path d="M 25 95 L 25 45 L 135 45 L 135 95 M 45 95 L 45 45 M 115 95 L 115 45" class="blueprint-draw-trace" />
                            <path d="M 25 32 L 135 32 L 135 45 L 25 45 Z" class="blueprint-draw-trace" />
                            
                            <path d="M 25 45 L 35 32 L 45 45 L 55 32 L 65 45 L 75 32 L 85 45 L 95 32 L 105 45 L 115 32 L 125 45 L 135 32" class="blueprint-draw-trace" />
                            <path d="M 25 32 L 35 45 M 45 32 L 55 45 M 105 32 L 115 45 M 125 32 L 135 45" class="blueprint-draw-trace" />
                            <path d="M 25 95 L 45 45 M 135 95 L 115 45" class="blueprint-draw-trace" />'
    ],
    [
        'value' => '337',
        'en' => 'Booths', 'ar' => 'جناح',
        'svg' => '<line x1="5" y1="95" x2="155" y2="95" class="blueprint-axis-line stroke-[2]" />
                            
                            <path d="M 15 92 L 20 90 L 140 90 L 145 92" class="blueprint-draw-trace" />
                            <path d="M 20 48 L 80 20 L 140 48 Z" class="blueprint-draw-trace" />
                            <path d="M 35 48 L 80 28 L 125 48 Z" class="blueprint-draw-trace" />
                            
                            <path d="M 25 90 L 25 48 M 135 90 L 135 48 M 55 90 L 55 42 M 105 90 L 105 42 M 80 90 L 80 20" class="blueprint-draw-trace" />
                            <path d="M 25 58 L 55 54 L 105 54 L 135 58" class="blueprint-draw-trace" />'
    ],
    [
        'value' => '5',
        'en' => 'Days', 'ar' => 'أيام',
        'svg' => ' <line x1="5" y1="55" x2="155" y2="55" class="blueprint-axis-line stroke-[2]" />
                            
                            <path d="M 25 15 L 25 95 M 65 15 L 65 95 M 105 15 L 105 95 M 135 15 L 135 95" class="blueprint-draw-trace opacity-20" />
                            
                            <path d="M 25 55 L 45 55 L 45 35 L 65 35 L 65 55 L 85 55 L 85 75 L 105 75 L 105 55 M 105 30 L 135 30 L 135 55" class="blueprint-draw-trace" />
                            
                            <rect x="22" y="12" width="6" height="6" class="blueprint-draw-trace fill-none" />
                            <rect x="62" y="92" width="6" height="6" class="blueprint-draw-trace fill-none" />
                            <rect x="132" y="12" width="6" height="6" class="blueprint-draw-trace fill-none" />
                            
                            <path d="M 20 15 L 30 15 M 25 10 L 25 20 M 130 15 L 140 15" class="opacity-50" />'
    ]
];


$moments_data = [
    [
        'img_src'    => '/mirzaam/assets/images/Home/Previous-2025-1.png',
        'title'      => 'moment_1_title',
        'sub'        => 'moment_1_sub',
        'year_key'   => 'moment_1_year',
        'justify_class' => 'justify-center items-center'
    ],
    [
        'img_src'    => '/mirzaam/assets/images/Home/Previous-2025-2.png',
        'title'      => 'moment_2_title',
        'sub'        => 'moment_2_sub',
        'year_key'   => '',
        'justify_class' => 'justify-end items-center pb-20 md:pb-28'
    ],
    [
        'img_src'    => '/mirzaam/assets/images/Home/Previous-2025-3.png',
        'title'      => 'moment_3_title',
        'sub'        => 'moment_3_sub',
        'year_key'   => '',
        'justify_class' => 'justify-end items-center pb-20 md:pb-28'
    ]
];

$home_categories_blueprint = [
    ["key" => "carpentry_wardrobe", "img" => "https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "bathroom_fitouts",   "img" => "https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "carpets_textiles",   "img" => "https://images.unsplash.com/photo-1513519245088-0e12902e5a38?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "cleaning_services",  "img" => "https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "contracting_company","img" => "https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "counter_tops_stone", "img" => "https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "curtains_drapes",    "img" => "https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "custom_furniture",   "img" => "https://images.unsplash.com/photo-1540518614846-7eded433c457?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "electrical_sockets", "img" => "https://images.unsplash.com/photo-1621905251189-08b45d6a269e?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "home_appliances",    "img" => "https://images.unsplash.com/photo-1556911220-e15b29be8c8f?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "elevator_fitout",    "img" => "https://images.unsplash.com/photo-1563911302283-d2bc1dd0d44b?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "exterior_doors",     "img" => "https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "finances_systems",   "img" => "https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "food_beverage",      "img" => "https://images.unsplash.com/photo-1550966871-3ed3cdb5ed0c?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "home_accessories",   "img" => "https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1200&q=90"],
    ["key" => "home_automation",    "img" => "https://images.unsplash.com/photo-1558002038-1055907df827?auto=format&fit=crop&w=1200&q=90"],
];

$mirzaam_years_blueprint = [
    ['key' => 'm2019', 'year' => '2019', 'image' => '/mirzaam/assets/images/Home/mirzaam2019.png'],
    ['key' => 'm2021', 'year' => '2021', 'image' => '/mirzaam/assets/images/Home/mirzaam2021.png'],
    ['key' => 'm2022', 'year' => '2022', 'image' => '/mirzaam/assets/images/Home/mirzaam2022.png'],
    ['key' => 'm2023', 'year' => '2023', 'image' => '/mirzaam/assets/images/Home/mirzaam2023.png'],
    ['key' => 'm2024', 'year' => '2024', 'image' => '/mirzaam/assets/images/Home/mirzaam2024.png'],
    ['key' => 'm2025', 'year' => '2025', 'image' => '/mirzaam/assets/images/Home/mirzaam2025.png'],
];

$home_reviews_blueprint = [
    [
        'key' => 'elena',
        'image' => 'https://images.unsplash.com/photo-1594751128071-4a9202a462e8?auto=format&fit=crop&w=200&q=80'
    ],
    [
        'key' => 'marcus',
        'image' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=200&q=80'
    ],
    [
        'key' => 'sarah',
        'image' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=200&q=80'
    ],
];