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





$why_exhibit = [

    'hero_image' => 'https://images.unsplash.com/photo-1761195689615-9469b65dac01?auto=format&fit=crop&w=2400&q=80',

    'intro' => 'whyexhibit_intro',

    // ── VALUE PILLARS (3 cards) ──────────────────────────────
    'pillars' => [
        [
            'tag_key'   => 'we_pillar1_tag',
            'title_key' => 'we_pillar1_title',
            'desc_key'  => 'we_pillar1_desc',
        ],
        [
            'tag_key'   => 'we_pillar2_tag',
            'title_key' => 'we_pillar2_title',
            'desc_key'  => 'we_pillar2_desc',
        ],
        [
            'tag_key'   => 'we_pillar3_tag',
            'title_key' => 'we_pillar3_title',
            'desc_key'  => 'we_pillar3_desc',
        ],
    ],

    // ── KEY BENEFITS (alternating image/text rows) ───────────
    'benefits' => [
        [
            'tag_key'   => 'we_benefit1_tag',
            'title_key' => 'we_benefit1_title',
            'items_keys' => ['we_benefit1_item1', 'we_benefit1_item2', 'we_benefit1_item3'],
            'image'     => 'https://mirzaam.com/wp-content/uploads/2024/10/dsc08231-min-scaled-2.webp',
            'flip'      => false,
        ],
        [
            'tag_key'   => 'we_benefit2_tag',
            'title_key' => 'we_benefit2_title',
            'items_keys' => ['we_benefit2_item1', 'we_benefit2_item2', 'we_benefit2_item3'],
            'image'     => 'https://mirzaam.com/wp-content/uploads/2024/10/sabarah-3-min-scaled-1.webp',
            'flip'      => true,
        ],
    ],

    // ── STATISTICS ───────────────────────────────────────────
    'stats' => [
        ['value' => '260+',     'label_key' => 'we_stat_outdoor_ads'],
        ['value' => '1M+',      'label_key' => 'we_stat_outdoor_views'],
        ['value' => '7M+',      'label_key' => 'we_stat_digital'],
        ['value' => '20+',      'label_key' => 'we_stat_press'],
        ['value' => '4K+',      'label_key' => 'we_stat_app'],
        ['value' => '2M KWD',   'label_key' => 'we_stat_shopping'],
        ['value' => '350K+',    'label_key' => 'we_stat_visitors'],
        ['value' => '25K sqm',  'label_key' => 'we_stat_area'],
    ],

    // ── AUDIENCE BREAKDOWN (progress bars) ───────────────────
    'audience' => [
        ['label_key' => 'we_aud_homeowners',   'percent' => 45],
        ['label_key' => 'we_aud_designers',    'percent' => 15],
        ['label_key' => 'we_aud_developers',   'percent' => 10],
        ['label_key' => 'we_aud_retailers',    'percent' => 7],
        ['label_key' => 'we_aud_hospitality',  'percent' => 7],
        ['label_key' => 'we_aud_furniture',    'percent' => 6],
        ['label_key' => 'we_aud_students',     'percent' => 5],
        ['label_key' => 'we_aud_others',       'percent' => 5],
    ],
];



$best_booth = [

    // Hero — crowd engaging with displayed work at an exhibition.
    // Free to use under the Unsplash License (Jx Bao).
    'hero_image' => 'https://images.unsplash.com/photo-1761054783454-7bf31f4d0d25?auto=format&fit=crop&w=2400&q=80',

    // ── COMPETITION MECHANICS — 3 judging categories ──────────
    'mechanics' => [
        ['title_key' => 'bb_mech1_title', 'desc_key' => 'bb_mech1_desc'],
        ['title_key' => 'bb_mech2_title', 'desc_key' => 'bb_mech2_desc'],
        ['title_key' => 'bb_mech3_title', 'desc_key' => 'bb_mech3_desc'],
    ],

    // ── JURY PANEL — 8 judges ──────────────────────────────────
    // Headshots: free professional headshots, Unsplash License
    // (LinkedIn Sales Solutions, Tony Luginsland, Jurica Koletić,
    // Ryan Hoffman, Christina @ wocintechchat.com, Troy Spoelma,
    // Clay Elliot, Michael Dam). Stand-in portraits — swap for
    // real judge photos whenever you have them.
    'jury' => [
        [
            'photo'    => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80',
            'name_key' => 'bb_judge1_name',
            'role_key' => 'bb_judge1_role',
            'bio_key'  => 'bb_judge1_bio',
        ],
        [
            'photo'    => 'https://images.unsplash.com/photo-1652471943570-f3590a4e52ed?auto=format&fit=crop&w=600&q=80',
            'name_key' => 'bb_judge2_name',
            'role_key' => 'bb_judge2_role',
            'bio_key'  => 'bb_judge2_bio',
        ],
        [
            'photo'    => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=600&q=80',
            'name_key' => 'bb_judge3_name',
            'role_key' => 'bb_judge3_role',
            'bio_key'  => 'bb_judge3_bio',
        ],
        [
            'photo'    => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
            'name_key' => 'bb_judge4_name',
            'role_key' => 'bb_judge4_role',
            'bio_key'  => 'bb_judge4_bio',
        ],
        [
            'photo'    => 'https://images.unsplash.com/photo-1595211877493-41a4e5f236b3?auto=format&fit=crop&w=600&q=80',
            'name_key' => 'bb_judge5_name',
            'role_key' => 'bb_judge5_role',
            'bio_key'  => 'bb_judge5_bio',
        ],
        [
            'photo'    => 'https://images.unsplash.com/photo-1701096374092-bb70915fdc5c?auto=format&fit=crop&w=600&q=80',
            'name_key' => 'bb_judge6_name',
            'role_key' => 'bb_judge6_role',
            'bio_key'  => 'bb_judge6_bio',
        ],
        [
            'photo'    => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
            'name_key' => 'bb_judge7_name',
            'role_key' => 'bb_judge7_role',
            'bio_key'  => 'bb_judge7_bio',
        ],
        [
            'photo'    => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=600&q=80',
            'name_key' => 'bb_judge8_name',
            'role_key' => 'bb_judge8_role',
            'bio_key'  => 'bb_judge8_bio',
        ],
    ],

    // ── HOW VISITORS VOTE — 2 steps ────────────────────────────
    'voting_steps' => [
        ['title_key' => 'bb_step1_title', 'desc_key' => 'bb_step1_desc'],
        ['title_key' => 'bb_step2_title', 'desc_key' => 'bb_step2_desc'],
    ],

    // ── NOMINEES — 3 category winners ──────────────────────────
    // Photos are generic premium interior/booth photography
    // (already-vetted free Unsplash images reused from
    // categories_data.php) standing in for the real nominee
    // booth photography — swap in actual booth photos when
    // available. Logos are rendered as styled text tiles in the
    // template rather than image files, since "Design Details",
    // "ProPainters", and "AlRefaei International" are placeholder
    // names with no real logo artwork to source.
    'nominees' => [
        [
            'category_key' => 'bb_nominee1_category',
            'company_key'  => 'bb_nominee1_company',
            'logo_text'    => 'DESIGN DETAILS',
            'images' => [
                'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=900&q=80',
                'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=900&q=80',
                'https://images.unsplash.com/photo-1618219908412-a29a1bb7b86e?auto=format&fit=crop&w=900&q=80',
            ],
        ],
        [
            'category_key' => 'bb_nominee2_category',
            'company_key'  => 'bb_nominee2_company',
            'logo_text'    => 'PROPAINTERS',
            'images' => [
                'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=900&q=80',
                'https://images.unsplash.com/photo-1615529328331-f8917597711f?auto=format&fit=crop&w=900&q=80',
                'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=900&q=80',
            ],
        ],
        [
            'category_key' => 'bb_nominee3_category',
            'company_key'  => 'bb_nominee3_company',
            'logo_text'    => 'ALREFAEI INTL.',
            'images' => [
                'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?auto=format&fit=crop&w=900&q=80',
                'https://images.unsplash.com/photo-1615876234886-fd9a39fda97f?auto=format&fit=crop&w=900&q=80',
                'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=900&q=80',
            ],
        ],
    ],



    

];





$site_blueprint['about']['exhibitions'] = [

    // The flagship event itself — included so this reads as "the
    // full Fouz Expos family", not just "other" exhibitions.
    [
        'key'           => 'mirzaam',
        'image'         => 'https://mirzaam.com/wp-content/uploads/2026/03/dsc04495-copy.jpg',
        'accent_color'  => '#F4B223',
        'tag_class'     => 'bg-yellow-500 text-black',
        'link'          => 'https://mirzaam.com/',
        'no_photo'      => false,
    ],
    // Real sister exhibitions run by the same organizer, Fouz
    // Expos Company — all mentioned by name in the live page copy.
    [
        'key'           => 'mirzaamiyat',
        'image'         => 'https://mirzaam.com/wp-content/uploads/2024/10/mirzaamiaten-min-1024x1024-1.webp',
        'accent_color'  => '#F4B223',
        'tag_class'     => 'bg-yellow-500 text-black',
        'link'          => 'https://mirzaam.com/about-mirzaamiyat/',
        'no_photo'      => false,
    ],
    [
        'key'           => 'ixir',
        'image'         => 'https://ixirexpo.com/wp-content/uploads/2024/04/why-visit-2-1024x683.jpg',
        'accent_color'  => '#22C55E',
        'tag_class'     => 'bg-emerald-500 text-black',
        'link'          => 'https://ixirexpo.com/',
        'no_photo'      => false,
    ],
    // No clean real photo was available for this one on the live
    // site (its site is an Instagram feed wall, no media library
    // photos to pull from) — uses a solid wordmark tile instead
    // of forcing a mismatched stock image.
    [
        'key'           => 'mamababy',
        'image'         => '',
        'accent_color'  => '#FB7185',
        'tag_class'     => 'bg-rose-400 text-black',
        'tile_class'    => 'bg-gradient-to-br from-rose-300 to-rose-400',
        'link'          => 'https://mamababyexpo.com/',
        'no_photo'      => true,
    ],
];

$site_blueprint['about']['highlights'] = [
    ['key' => 'connect'],
    ['key' => 'relationships'],
    ['key' => 'knowledge'],
    ['key' => 'lectures'],
];

// Real photo for the "Upcoming Events" intro (KIF entrance,
// shown in the live page between the intro paragraphs and the
// Strategy section).
$site_blueprint['about']['events_image'] = 'https://mirzaam.com/wp-content/uploads/2026/03/dsc05879-copy-2.png';

// Real photo for the Highlights section (media interview at a
// past edition, shown on the live page just after this copy).
$site_blueprint['about']['highlights_image'] = 'https://mirzaam.com/wp-content/uploads/2024/10/dsc07442-min-2048x1368-1.webp';

// ── THE VISIONARY — career milestones strip ──────────────
// Her bio is genuinely chronological, so a dated milestone strip
// is used alongside the narrative paragraphs (not decoration —
// it lets a scanning reader get the timeline at a glance).
$site_blueprint['about']['vis_milestones'] = [
    ['key' => 'm1', 'year' => '2004'],
    ['key' => 'm2', 'year' => '2012'],
    ['key' => 'm3', 'year' => '2018'],
    ['key' => 'm4', 'year' => '2023'],
];



$site_blueprint['mirzaamiyat']['hero_image'] = 'https://mirzaam.com/wp-content/uploads/2026/03/dsc06109-copy.jpg';
 
// ── Categories — 9 real categories, in the same order as the
// live page's "Discover and indulge in the following categories" list.
$site_blueprint['mirzaamiyat']['categories'] = [
    ['key' => 'accessories'],
    ['key' => 'gifting'],
    ['key' => 'mothersday'],
    ['key' => 'carpets'],
    ['key' => 'outdoor'],
    ['key' => 'fragrance'],
    ['key' => 'tableware'],
    ['key' => 'serveware'],
    ['key' => 'rentals'],
];
 
// ── Sponsors — real names, tiers, and booth numbers, sourced
// from the live page's Instagram sponsor-announcement captions.
// tier_class drives the small tag pill colour per tier.
$site_blueprint['mirzaamiyat']['sponsors'] = [
    ['key' => 'asfour',  'tier_key' => 'main',         'tier_class' => 'bg-[#C9A267] text-[#1E2F4D]', 'booth' => '49'],
    ['key' => 'asnan',   'tier_key' => 'main',         'tier_class' => 'bg-[#C9A267] text-[#1E2F4D]', 'booth' => '125'],
    ['key' => 'safat',   'tier_key' => 'supporting',   'tier_class' => 'bg-[#1E2F4D] text-white',     'booth' => '50'],
    ['key' => 'deema',   'tier_key' => 'supporting',   'tier_class' => 'bg-[#1E2F4D] text-white',     'booth' => '67'],
    ['key' => 'alrai',   'tier_key' => 'media',        'tier_class' => 'bg-rose-100 text-rose-700',   'booth' => '38'],
    ['key' => 'm2r',     'tier_key' => 'media',        'tier_class' => 'bg-rose-100 text-rose-700',   'booth' => null],
    ['key' => 'alfares', 'tier_key' => 'landscaping',  'tier_class' => 'bg-emerald-100 text-emerald-700', 'booth' => null],
];
 
// ── Gallery — remaining 8 real photos from the "previous
// edition" set on the live page (the 9th is used as the hero
// above).
$site_blueprint['mirzaamiyat']['gallery'] = [
    'https://mirzaam.com/wp-content/uploads/2026/03/dsc06492-copy.jpg',
    'https://mirzaam.com/wp-content/uploads/2026/03/dsc06496-copy.jpg',
    'https://mirzaam.com/wp-content/uploads/2026/03/dsc07269.jpg',
    'https://mirzaam.com/wp-content/uploads/2026/03/dsc07246-copy.jpg',
    'https://mirzaam.com/wp-content/uploads/2026/03/dsc07255-copy.jpg',
    'https://mirzaam.com/wp-content/uploads/2026/03/dsc07202-copy.jpg',
    'https://mirzaam.com/wp-content/uploads/2026/03/dsc06850-copy.jpg',
    'https://mirzaam.com/wp-content/uploads/2026/03/dsc07044-copy.jpg',
];