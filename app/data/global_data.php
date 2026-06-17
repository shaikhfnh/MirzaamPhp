<?php
// global_data.php

$site_blueprint = [
    // ... your existing home arrays ...

    'about' => [
        'exhibitions' => [
            [
                'key' => 'mirzaam_expo',
                'tag_class' => 'bg-[var(--secondary)] text-black',
                'accent_color' => '#E2B13C',
                'image' => '/mirzaam/assets/images/Home/stage.png',
            ],
            [
                'key' => 'mirzaamiyat',
                'tag_class' => 'bg-red-400 text-black',
                'accent_color' => '#E76F51', 
                'image' => '/mirzaam/assets/images/Home/stage.png',
            ],
            [
                'key' => 'ixir',
                'tag_class' => 'bg-emerald-400 text-black',
                'accent_color' => '#34d399',
                'image' => '/mirzaam/assets/images/Home/stage.png',
            ],
            [
                'key' => 'mamababy',
                'tag_class' => 'bg-blue-500 text-white',
                'accent_color' => '#00b2f8ff',
                'image' => '/mirzaam/assets/images/Home/stage.png',
            ]
        ],
        'highlights' => [
            ['key' => 'unified_design'],
            ['key' => 'direct_exposure'],
            ['key' => 'knowledge_mentorship'],
            ['key' => 'future_lectures']
        ]
    ]
    
];


$site_blueprint['why_visit'] = [

    // ── Hero ──
    'hero_image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&q=80&w=2000',

    // ── 4 value cards (top grid) ──
    'value_cards' => [
        [
            'index'        => '01',
            'tag_key'      => 'whyvisit_card1_tag',     // VALUE
            'title_key'    => 'whyvisit_card1_title',
            'desc_key'     => 'whyvisit_card1_desc',
        ],
        [
            'index'        => '02',
            'tag_key'      => 'whyvisit_card2_tag',     // NETWORK
            'title_key'    => 'whyvisit_card2_title',
            'desc_key'     => 'whyvisit_card2_desc',
        ],
        [
            'index'        => '03',
            'tag_key'      => 'whyvisit_card3_tag',     // LUXURY
            'title_key'    => 'whyvisit_card3_title',
            'desc_key'     => 'whyvisit_card3_desc',
        ],
        [
            'index'        => '04',
            'tag_key'      => 'whyvisit_card4_tag',     // CONCEPT
            'title_key'    => 'whyvisit_card4_title',
            'desc_key'     => 'whyvisit_card4_desc',
        ],
    ],

    // ── Alternating image / text sections ──
    // 'flip' true = image on right (text on left)
    // 'flip' false = image on left (text on right)
    'features' => [
        [
            'index'       => '01',
            'title_key'   => 'whyvisit_food_title',
            'desc_key'    => 'whyvisit_food_desc',
            'image'       => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&q=80&w=1600',
            'flip'        => false,
            'cta'         => null,
        ],
        [
            'index'       => '02',
            'title_key'   => 'whyvisit_kids_title',
            'desc_key'    => 'whyvisit_kids_desc',
            'image'       => 'https://mirzaam.com/wp-content/uploads/2024/10/kidsarea.webp',
            'flip'        => true,
            'cta'         => null,
        ],
        [
            'index'       => '03',
            'title_key'   => 'whyvisit_prizes_title',
            'desc_key'    => 'whyvisit_prizes_desc',
            'image'       => 'https://mirzaam.com/wp-content/uploads/2024/10/prizes.webp',
            'flip'        => false,
            'cta'         => null,
        ],
        [
            'index'       => '04',
            'title_key'   => 'whyvisit_workshops_title',
            'desc_key'    => 'whyvisit_workshops_desc',
            'desc2_key'   => 'whyvisit_workshops_desc2',
            'image'       => 'https://mirzaam.com/wp-content/uploads/2024/10/3985db20-03cb-4749-a182-e3d6eb55e865-1024x684-1.webp',
            'flip'        => true,
            'cta'         => [
                'label_key' => 'whyvisit_workshops_cta',
                'url'       => 'https://v2.mirzaam.com/designtalk',
                'external'  => true,
            ],
        ],
    ],

    // ── Bottom CTA strip ──
    'final_cta' => [
        'eyebrow_key' => 'whyvisit_cta_eyebrow',
        'title_key'   => 'whyvisit_cta_title',
        'desc_key'    => 'whyvisit_cta_desc',
        'button_key'  => 'whyvisit_cta_button',
        'button_url'  => 'participants/2026',
    ],
];



$site_blueprint['plan_trip'] = [

    // ── Hero image (full-bleed photo behind the page title) ──
    'hero_image' => 'https://images.unsplash.com/photo-1663000857411-b339585c938b?auto=format&fit=crop&q=80&w=2400',

    // ── Hero stat tiles (top of page, under title) ──
    'stats' => [
        [
            'value_key'  => 'plantrip_stat1_value',     // "15"
            'unit_key'   => 'plantrip_stat1_unit',      // "min"
            'label_key'  => 'plantrip_stat1_label',     // "From Airport"
        ],
        [
            'value_key'  => 'plantrip_stat2_value',     // "3K+"
            'unit_key'   => null,
            'label_key'  => 'plantrip_stat2_label',     // "Parking Bays"
        ],
        [
            'value_key'  => 'plantrip_stat3_value',     // "5"
            'unit_key'   => 'plantrip_stat3_unit',      // "days"
            'label_key'  => 'plantrip_stat3_label',     // "Event Duration"
        ],
        [
            'value_key'  => 'plantrip_stat4_value',     // "200+"
            'unit_key'   => null,
            'label_key'  => 'plantrip_stat4_label',     // "Exhibitors"
        ],
    ],

    // ── Logistics cards (By Air + By Road) ──
    'logistics' => [
        [
            'index'       => '01',
            'icon'        => 'plane',
            'tag_key'     => 'plantrip_arrival1_tag',
            'title_key'   => 'plantrip_arrival1_title',
            'desc_key'    => 'plantrip_arrival1_desc',
            'image'       => 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&q=80&w=1600',
            'cta'         => null,
        ],
        [
            'index'       => '02',
            'icon'        => 'road',
            'tag_key'     => 'plantrip_arrival2_tag',
            'title_key'   => 'plantrip_arrival2_title',
            'desc_key'    => 'plantrip_arrival2_desc',
            'image'       => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1600',
            'cta'         => [
                'label_key' => 'plantrip_arrival2_cta',
                'url'       => 'https://maps.google.com/?q=Kuwait+International+Fair+Mishref',
                'external'  => true,
            ],
        ],
    ],

    // ── Quick Tips strip ──
    'tips' => [
        ['icon' => 'parking',  'title_key' => 'plantrip_tip1_title', 'desc_key' => 'plantrip_tip1_desc'],
        ['icon' => 'ticket',   'title_key' => 'plantrip_tip2_title', 'desc_key' => 'plantrip_tip2_desc'],
        ['icon' => 'clock',    'title_key' => 'plantrip_tip3_title', 'desc_key' => 'plantrip_tip3_desc'],
        ['icon' => 'family',   'title_key' => 'plantrip_tip4_title', 'desc_key' => 'plantrip_tip4_desc'],
    ],
];
