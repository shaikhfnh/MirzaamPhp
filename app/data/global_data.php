<?php
// global_data.php
/**
 * These variables are injected from index.php/init
 * @var string $lang
 * @var array $site_blueprint
 */
$isRtl = ($lang === 'ar');


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

$site_blueprint['booth_registration_url'] = '';

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
        'button_planyourtrip_url'  => 'plan-your-trip',
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
// ── JURY PANEL — 8 real slide graphics from mirzaam.com/jury/ ──
'jury_slides' => [
    'https://mirzaam.com/wp-content/uploads/2025/12/jury-english-01.jpg',
    'https://mirzaam.com/wp-content/uploads/2025/12/jury-english-02.jpg',
    'https://mirzaam.com/wp-content/uploads/2025/12/jury-english-03.jpg',
    'https://mirzaam.com/wp-content/uploads/2025/12/jury-english-04.jpg',
    'https://mirzaam.com/wp-content/uploads/2025/12/jury-english-05.jpg',
    'https://mirzaam.com/wp-content/uploads/2025/12/jury-english-06.jpg',
    'https://mirzaam.com/wp-content/uploads/2025/12/jury-english-07.jpg',
    'https://mirzaam.com/wp-content/uploads/2025/12/jury-english-08.jpg',
],
    // ── HOW VISITORS VOTE — 2 steps ────────────────────────────
    'voting_steps' => [
        ['title_key' => 'bb_step1_title', 'desc_key' => 'bb_step1_desc'],
        ['title_key' => 'bb_step2_title', 'desc_key' => 'bb_step2_desc'],
    ],

    // ── NOMINEES — 3 category winners ──────────────────────────


'nominees' => [
    [
        'category_key' => 'bb_nominee1_category', // Best in Aesthetic
        'company_key'  => 'bb_nominee1_company',
        'logo'         => 'https://mirzaam.com/wp-content/uploads/2025/12/design-details-logo-2969.jpg',
        'website'      => '', // no confirmed match found
        'images' => [
            'https://mirzaam.com/wp-content/uploads/2025/12/dsc03771-copy.jpg',
            'https://mirzaam.com/wp-content/uploads/2025/12/dsc03774-copy.jpg',
            'https://mirzaam.com/wp-content/uploads/2025/12/dsc03776-copy.jpg',
        ],
    ],
    [
        'category_key' => 'bb_nominee2_category', // Best in Innovation
        'company_key'  => 'bb_nominee2_company',
        'logo'         => 'https://mirzaam.com/wp-content/uploads/2024/12/propainters.jpg', // was wrongly in images[]
        'website'      => 'https://propainterskw.com', // confirmed real
        'images' => [
            'https://mirzaam.com/wp-content/uploads/2025/12/pp1.jpg',
            'https://mirzaam.com/wp-content/uploads/2025/12/pp2.jpg',
            'https://mirzaam.com/wp-content/uploads/2025/12/pp.jpg',
        ],
    ],
    [
        'category_key' => 'bb_nominee3_category', // Best in Sustainability
        'company_key'  => 'bb_nominee3_company',
        'logo'         => 'https://mirzaam.com/wp-content/uploads/2025/12/alrefaei-1.jpg', // was wrongly in images[]
        'website'      => '', // no confirmed match found
        'images' => [
            'https://mirzaam.com/wp-content/uploads/2025/12/r2.jpg',
            'https://mirzaam.com/wp-content/uploads/2025/12/r1.jpg',
            'https://mirzaam.com/wp-content/uploads/2025/12/r.jpg',
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
        'link'          => $lang === 'ar' ? $base_path . '/ar' : $base_path,
        'no_photo'      => false,
    ],
    // Real sister exhibitions run by the same organizer, Fouz
    // Expos Company — all mentioned by name in the live page copy.
    [
        'key'           => 'mirzaamiyat',
        'image'         => 'https://mirzaam.com/wp-content/uploads/2024/10/mirzaamiaten-min-1024x1024-1.webp',
        'accent_color'  => '#F4B223',
        'tag_class'     => 'bg-yellow-500 text-black',
        'link'          => $lang === 'ar' ? $base_path . '/ar/mirzaamiyat/about' : $base_path . '/mirzaamiyat/about',
        'no_photo'      => false,
    ],
    [
        'key'           => 'ixir',
        'image'         => 'https://ixirexpo.com/wp-content/uploads/2024/04/why-visit-2-1024x683.jpg',
        'accent_color'  => '#22C55E',
        'tag_class'     => 'bg-emerald-500 text-black',
        'link'          => ($lang === 'ar') ? 'https://ixirexpo.com/ar' : 'https://ixirexpo.com/',
        'no_photo'      => false,
    ],
    // No clean real photo was available for this one on the live
    // site (its site is an Instagram feed wall, no media library
    // photos to pull from) — uses a solid wordmark tile instead
    // of forcing a mismatched stock image.
    [
        'key'           => 'mamababy',
        'image'         => 'https://www.mamababyexpo.com/wp-content/uploads/2026/03/cropped-mama-icon-270x270.gif',
        'accent_color'  => '#FB7185',
        'tag_class'     => 'bg-rose-400 text-black',
        'tile_class'    => 'bg-gradient-to-br from-rose-300 to-rose-400',
        'link'          =>  ($lang === 'ar') ? 'https://mamababyexpo.com/ar' : 'https://mamababyexpo.com/',
        'no_photo'      => false,
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





$site_blueprint['mirzaamiyat'] = [

    'hero_image' => 'https://mirzaam.com/wp-content/uploads/2026/03/dsc06492-copy.jpg',
    
    'booth_registration_url' => '', 
    // ── CATEGORIES — unchanged, keep your existing array as-is ──
    'categories' => [
        [ 'key' => 'accessories', 'image' => 'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?auto=format&fit=crop&w=900&q=80' ],
        [ 'key' => 'gifting',     'image' => 'https://images.unsplash.com/photo-1549465220-1a8b9238cd48?auto=format&fit=crop&w=900&q=80' ],
        [ 'key' => 'mothersday',  'image' => 'https://images.unsplash.com/photo-1542385151-efd9000785a0?q=80&w=689&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D?auto=format&fit=crop&w=900&q=80' ],
        [ 'key' => 'carpets',     'image' => 'https://images.unsplash.com/photo-1600166898405-da9535204843?auto=format&fit=crop&w=900&q=80' ],
        [ 'key' => 'outdoor',     'image' => 'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=900&q=80' ],
        [ 'key' => 'fragrance',   'image' => 'https://images.unsplash.com/photo-1602910344008-22f323cc1817?auto=format&fit=crop&w=900&q=80' ],
        [ 'key' => 'tableware',   'image' => 'https://images.unsplash.com/photo-1543007631-283050bb3e8c?auto=format&fit=crop&w=900&q=80' ],
        [ 'key' => 'serveware',   'image' => 'https://images.unsplash.com/photo-1530062845289-9109b2c9c868?auto=format&fit=crop&w=900&q=80' ],
        [ 'key' => 'rentals',     'image' => 'https://images.unsplash.com/photo-1519947486511-46149fa0a254?auto=format&fit=crop&w=900&q=80' ],
    ],

'sponsors' => [
    // MAIN
    [
        'key'         => 'asfour',
        'tier'        => 'main',
        'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/Asfour-1.jpg',
        'website_url' => 'https://asfourcrystal.com',
    ],
    [
        'key'         => 'asnan',
        'tier'        => 'main',
        'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/Asnan-Logo.png',
        'website_url' => 'https://www.asnan.com/en',
    ],
    // MEDIA
    [
        'key'         => 'alrai',
        'tier'        => 'media',
        'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/AL-RAI.jpg',
        'website_url' => 'https://www.alraimediagroup.com',
    ],
    [
        'key'         => 'm2r',
        'tier'        => 'media',
        'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/M2R-logo.jpg',
        'website_url' => 'https://www.m2rkw.com',
    ],
    // SUPPORTING
    [
        'key'         => 'safat',
        'tier'        => 'supporting',
        'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/New-Logo-1.jpg',
        'website_url' => 'https://www.safathome.com',
    ],
    [
        'key'         => 'deema',
        'tier'        => 'supporting',
        'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/Deema.jpg',
        'website_url' => 'https://deema.me/en',
    ],
    // LANDSCAPING
    [
        'key'         => 'alfares',
        'tier'        => 'landscaping',
        'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/alfares_gardens.jpg',
        // No corporate domain found for this one — Instagram is
        // their only public presence, used as the fallback link.
        'website_url' => 'https://www.instagram.com/alfares_gardens',
    ],
],
    // ── GALLERY — unchanged, keep your existing array as-is ──
    'gallery' => [
        'https://mirzaam.com/wp-content/uploads/2026/03/dsc06109-copy.jpg',
        'https://mirzaam.com/wp-content/uploads/2026/03/dsc06492-copy.jpg',
        'https://mirzaam.com/wp-content/uploads/2026/03/dsc06496-copy.jpg',
        'https://mirzaam.com/wp-content/uploads/2026/03/dsc07246-copy.jpg',
        'https://mirzaam.com/wp-content/uploads/2026/03/dsc07255-copy.jpg',
        'https://mirzaam.com/wp-content/uploads/2026/03/dsc07202-copy.jpg',
        'https://mirzaam.com/wp-content/uploads/2026/03/dsc06850-copy.jpg',
        'https://mirzaam.com/wp-content/uploads/2026/03/dsc07044-copy.jpg',
    ],

];






$site_blueprint['media']['hero_image'] =
    'https://mirzaam.com/wp-content/uploads/2025/12/whatsapp-image-2025-12-08-at-124548-pm.jpeg';
 
// ── YOUTUBE VIDEOS ───────────────────────────────────────────
// 7 real embed IDs from the live media page.
// First entry is used as the featured (large) player.
// The rest render as lazy thumbnails (click to load iframe).
$site_blueprint['media']['youtube'] = [
    ['id' => 'ACvtkFcBD4o'],
    ['id' => 'llZzPvmn0Pk'],
    ['id' => 'VzrXxsl_Gmk'],
    ['id' => '82Ckih6wPaQ'],
    ['id' => 'K2OqRJ7abBg'],
    ['id' => 'arGhlUVEMkM'],
    ['id' => 'gLPL7u542FQ'],
];
 
// ── NEWS ARTICLES ────────────────────────────────────────────
// Real press coverage from Kuwaiti newspapers.
// Source colours used for the badge pill in the ticker.
$site_blueprint['media']['news'] = [
    [
        'title'  => "Al-Humaidhi: Mirzaam reinforces its position as a national platform for creativity",
        'source' => 'Al Anba',
        'color'  => 'bg-blue-600',
        'date'   => 'Dec 2025',
        'url'    => 'https://www.alanba.com.kw/1336507/',
    ],
    [
        'title'  => "Al-Humaidhi: Mirzaam's fifth edition sales doubled, exceeding one million dinars",
        'source' => 'Al Seyassah',
        'color'  => 'bg-red-600',
        'date'   => 'Dec 2024',
        'url'    => 'https://alseyassah.com/article/427117/',
    ],
    [
        'title'  => "The fifth edition of Mirzaam has launched — covering 55+ categories",
        'source' => 'Al Wasat',
        'color'  => 'bg-teal-600',
        'date'   => 'Dec 2024',
        'url'    => 'https://www.alwasat.com.kw/ArticleDetail.aspx?id=158974',
    ],
    [
        'title'  => "Mirzaam is back — fulfilling your home design needs from A to Z",
        'source' => 'Al Rai Media',
        'color'  => 'bg-yellow-600',
        'date'   => 'Nov 2022',
        'url'    => 'https://www.alraimedia.com/article/1613184/',
    ],
    [
        'title'  => "Exceeding 400,000 visitors and over 700,000 KD in raffle coupons",
        'source' => 'Al Rai Media',
        'color'  => 'bg-yellow-600',
        'date'   => 'Dec 2022',
        'url'    => 'https://www.alraimedia.com/article/1619091/',
    ],
    [
        'title'  => "Video: Mirzaam 3 — An exceptional experience in interior design quality and elegance",
        'source' => 'Al Anba',
        'color'  => 'bg-blue-600',
        'date'   => 'Dec 2022',
        'url'    => 'https://www.alanba.com.kw/ar/kuwait-news/1157895/',
    ],
    [
        'title'  => "ProPainters wins Best Booth Design Award at Mirzaam 2022",
        'source' => 'Al Wasat',
        'color'  => 'bg-teal-600',
        'date'   => 'Dec 2022',
        'url'    => 'http://www.alwasat.com.kw/ArticleDetail.aspx?id=143045',
    ],
    [
        'title'  => "Zain showcases its latest digital solutions in the home sector at Mirzaam",
        'source' => 'Al Anba',
        'color'  => 'bg-blue-600',
        'date'   => 'Dec 2022',
        'url'    => 'https://www.alanba.com.kw/1157894/',
    ],
    [
        'title'  => "Mirzaam Exhibition: Kuwait's biggest yet — 5 days of interior design excellence",
        'source' => 'Al Wasat',
        'color'  => 'bg-teal-600',
        'date'   => 'Nov 2022',
        'url'    => 'http://www.alwasat.com.kw/ArticleDetail.aspx?id=142950',
    ],
];
 
// ── SOCIAL BUZZ — curated Instagram reels + Twitter/X posts ──
// platform: 'instagram' | 'twitter'
// caption: short excerpt or description
$site_blueprint['media']['social_buzz'] = [
    [
        'platform' => 'instagram',
        'handle'   => '@mirzaamexpo',
        'caption'  => 'The sixth edition of Mirzaam Expo 2025 has officially opened — Kuwait\'s largest interior design event is back.',
        'url'      => 'https://www.instagram.com/reel/DDfd5-HooPX/',
    ],
    [
        'platform' => 'instagram',
        'handle'   => '@mirzaamexpo',
        'caption'  => "Merzam Showroom — the largest furniture and building materials showroom in Kuwait, showcasing at Mirzaam.",
        'url'      => 'https://www.instagram.com/reel/DDfd5-HooPX/',
    ],
    [
        'platform' => 'instagram',
        'handle'   => '@mirzaamexpo',
        'caption'  => "Mirzaam's third edition surpasses expectations with over 400,000 attendees in just 5 days.",
        'url'      => 'https://www.instagram.com/reel/DDaEZTjs-Eh/',
    ],
    [
        'platform' => 'twitter',
        'handle'   => '@cnbcarabia',
        'caption'  => 'CNBC Arabia covers Mirzaam 2024 — the expo cementing its status as a regional benchmark for interior design.',
        'url'      => 'https://x.com/cnbcarabia/status/1867141371464683612',
    ],
    [
        'platform' => 'twitter',
        'handle'   => '@cnnews30',
        'caption'  => 'Live coverage: Mirzaam Expo draws massive crowds at KIF Hall 5-6, with exhibitors from across the region.',
        'url'      => 'https://x.com/cnnews30/status/1998417459477610575',
    ],
    [
        'platform' => 'twitter',
        'handle'   => '@naharkw',
        'caption'  => 'Nahar Kuwait reports on Mirzaam — the design destination that\'s redefining home living in Kuwait.',
        'url'      => 'https://x.com/naharkw/status/1998434051460399301',
    ],
];
 
// ── SOCIAL CAMPAIGN IMAGES (2023) ────────────────────────────
$site_blueprint['media']['campaign_images'] = [
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-11-29-at-30722-pm.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-11-29-at-30723-pm.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-11-29-at-30725-pm.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-11-29-at-30726-pm-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-11-29-at-30726-pm.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-11-29-at-30728-pm-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-12-27-at-15715-pm-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-12-27-at-15715-pm.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-12-27-at-23034-pm-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-12-27-at-24550-pm-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/whatsapp-image-2023-12-27-at-24550-pm-2.webp',
];
 
// ── OUTDOOR CAMPAIGN VIDEOS ──────────────────────────────────
// Grouped by year. Each video has a title (shown in the tab grid)
// and a URL to the self-hosted MP4 file.
$site_blueprint['media']['outdoor_videos'] = [
    '2024' => [
        ['title' => 'Outdoor 1', 'url' => 'https://mirzaam.com/wp-content/uploads/2025/12/outdoor-1.mp4'],
        ['title' => 'Outdoor 2', 'url' => 'https://mirzaam.com/wp-content/uploads/2025/12/outdoor-2.mp4'],
        ['title' => 'Outdoor 3', 'url' => 'https://mirzaam.com/wp-content/uploads/2025/12/outdoor-3.mp4'],
        ['title' => 'Outdoor 4', 'url' => 'https://mirzaam.com/wp-content/uploads/2025/12/outdoor-4.mp4'],
        ['title' => 'Outdoor 5', 'url' => 'https://mirzaam.com/wp-content/uploads/2025/12/outdoor-5.mp4'],
        ['title' => 'Outdoor 6', 'url' => 'https://mirzaam.com/wp-content/uploads/2025/12/outdoor-6.mp4'],
        ['title' => 'Outdoor 7', 'url' => 'https://mirzaam.com/wp-content/uploads/2025/12/outdoor-7.mp4'],
        ['title' => 'Behind The Scenes', 'url' => 'https://mirzaam.com/wp-content/uploads/2025/12/whatsapp-video-2025-12-04-at-95739-am.mp4'],
    ],
    '2023' => [
        ['title' => 'The Giant',       'url' => 'https://mirzaam.com/wp-content/uploads/2024/10/the-giant-1.mp4'],
        ['title' => 'The Monster',     'url' => 'https://mirzaam.com/wp-content/uploads/2024/10/the-monster.mp4'],
        ['title' => 'Aqarat',          'url' => 'https://mirzaam.com/wp-content/uploads/2024/10/mirzaam-aqarat-8.mp4'],
        ['title' => 'Eye of Kuwait',   'url' => 'https://mirzaam.com/wp-content/uploads/2024/10/mirzaam-eye-of-kuwait-1.mp4'],
        ['title' => 'Gate Mall',       'url' => 'https://mirzaam.com/wp-content/uploads/2024/10/mirzaam-gate-mall-outdoor-2.mp4'],
        ['title' => 'Hamra',           'url' => 'https://mirzaam.com/wp-content/uploads/2024/10/mirzaam-hamra-outdoor-2.mp4'],
        ['title' => 'Kuwait Gate',     'url' => 'https://mirzaam.com/wp-content/uploads/2024/10/mirzaam-kuwait-gate-1.mp4'],
        ['title' => 'Yaal Outdoor',    'url' => 'https://mirzaam.com/wp-content/uploads/2024/10/mirzaam-yaal-outdoor-1.mp4'],
    ],
];
 
// ── OUTDOOR CAMPAIGN PHOTOS ──────────────────────────────────
// Billboard and outdoor placement photography from 2025 and 2024.
$site_blueprint['media']['outdoor_photos'] = [
    'https://mirzaam.com/wp-content/uploads/2025/12/whatsapp-image-2025-12-08-at-124548-pm.jpeg',
    'https://mirzaam.com/wp-content/uploads/2025/12/whatsapp-image-2025-12-08-at-124547-pm.jpeg',
    'https://mirzaam.com/wp-content/uploads/2025/12/screenshot-2025-12-04-101346.png',
    'https://mirzaam.com/wp-content/uploads/2025/12/screenshot-2025-12-04-101001.png',
    'https://mirzaam.com/wp-content/uploads/2025/12/screenshot-2025-12-04-102247.png',
    'https://mirzaam.com/wp-content/uploads/2025/12/screenshot-2025-12-04-102159.png',
    'https://mirzaam.com/wp-content/uploads/2025/12/screenshot-2025-12-04-102510.png',
    'https://mirzaam.com/wp-content/uploads/2025/12/screenshot-2025-12-04-101047.png',
    'https://mirzaam.com/wp-content/uploads/2025/12/screenshot-2025-12-04-101426.png',
    'https://mirzaam.com/wp-content/uploads/2025/12/screenshot-2025-12-04-101519.png',
    'https://mirzaam.com/wp-content/uploads/2024/10/image00010-scaled-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/10.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/9-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/8-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/7-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/6-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/5-1.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/4-2.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/3-2.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/img-0983.webp',
    'https://mirzaam.com/wp-content/uploads/2024/10/img-0984.webp',];

//     $mz_sponsors_row1 = [
//     [
//         'key'         => 'alrai',
//         'tier_key'    => 'media',
//         'tier_class'  => 'bg-zinc-100 text-zinc-500',
//         'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/AL-RAI.jpg',
//         'website_url' => 'https://mirzaamiyat/2026/registration/plan.php?name=Al%20Rai%20Media',
//         'instagram'   => 'alraimediagroup',
//         'booth'       => '38',
//     ],
//     [
//         'key'         => 'asfour',
//         'tier_key'    => 'main',
//         'tier_class'  => 'bg-[#C9A267]/15 text-[#9c7a45]',
//         'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/Asfour-1.jpg',
//         'website_url' => 'https://mirzaamiyat/2026/registration/plan.php?name=Asfour%20Crystal',
//         'instagram'   => 'asfourcrystal_kuwait',
//         'booth'       => '49',
//     ],
//     [
//         'key'         => 'asnan',
//         'tier_key'    => 'main',
//         'tier_class'  => 'bg-[#C9A267]/15 text-[#9c7a45]',
//         'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/Asnan-Logo.png',
//         'website_url' => 'https://mirzaamiyat/2026/registration/plan.php?name=Asnan%20Tower',
//         'instagram'   => 'asnan_tower',
//         'booth'       => '125',
//     ],
// ];
 
// // ── ROW 2 — PARTNERS (bottom, slightly smaller cards) ─────────
// $mz_sponsors_row2 = [
//     [
//         'key'         => 'alfares',
//         'tier_key'    => 'landscaping',
//         'tier_class'  => 'bg-zinc-100 text-zinc-500',
//         'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/alfares_gardens.jpg',
//         'website_url' => 'https://mirzaamiyat/2026/registration/plan.php?name=Al%20Fares%20Gardens',
//         'instagram'   => 'alfares_gardens',
//         'booth'       => '',
//     ],
//     [
//         'key'         => 'deema',
//         'tier_key'    => 'supporting',
//         'tier_class'  => 'bg-zinc-100 text-zinc-500',
//         'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/Deema.jpg',
//         'website_url' => 'https://mirzaamiyat/2026/registration/plan.php?name=Deema%20Financing',
//         'instagram'   => 'pay.deema',
//         'booth'       => '67',
//     ],
//     [
//         'key'         => 'm2r',
//         'tier_key'    => 'media',
//         'tier_class'  => 'bg-zinc-100 text-zinc-500',
//         'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/M2R-logo.jpg',
//         'website_url' => 'https://mirzaamiyat/2026/registration/plan.php?name=M2R',
//         'instagram'   => 'm2rkw',
//         'booth'       => '',
//     ],
//     [
//         'key'         => 'safat',
//         'tier_key'    => 'supporting',
//         'tier_class'  => 'bg-zinc-100 text-zinc-500',
//         'logo_url'    => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/New-Logo-1.jpg',
//         'website_url' => 'https://mirzaamiyat/2026/registration/plan.php?name=Safat%20Home',
//         'instagram'   => 'Safathome',
//         'booth'       => '50',
//     ],
// ];