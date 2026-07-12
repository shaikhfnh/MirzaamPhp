<?php
// app/data/participantsdata-2025.php
// B: All logo_url paths now use $base_path for Railway compatibility.
//    On XAMPP: $base_path = '/mirzaam'  → /mirzaam/assets/images/...
//    On Railway: $base_path = ''        → /assets/images/...

$sponsors_data_2025 = [
    'platinum' => [
        'category_name_key' => 'category_platinum_title',
        'items' => [
            [
                "brand_name"  => "Al Wazzan",
                "sub_tier"    => "tier_1",
                "tier_tag"    => "platinum_sponsor",
                "logo_url"    => "https://mirzaam.com/wp-content/uploads/2025/11/alwazzan.png",
                "website_url" => "https://www.alwazzanstore.com/"
            ],
            [
                "brand_name"  => "Boubyan",
                "sub_tier"    => "tier_1",
                "tier_tag"    => "banking_sponsor",
                "logo_url"    => 'https://mirzaam.com/wp-content/uploads/2025/11/boubyan.png',
                "website_url" => "https://www.bankboubyan.com"
            ],
            [
                "brand_name"  => "IKEA",
                "sub_tier"    => "tier_1",
                "tier_tag"    => "platinum_sponsor",
                "logo_url"    => "https://mirzaam.com/wp-content/uploads/2025/11/ikea.png",
                "website_url" => "https://www.ikea.com"
            ],
            [
                "brand_name"  => "Deema",
                "sub_tier"    => "tier_2",
                "tier_tag"    => "strategic_sponsor",
                "logo_url"    => "https://mirzaam.com/wp-content/uploads/2025/11/deema.png",
                "website_url" => "https://www.deema.com"
            ],
            [
                "brand_name"  => "Technogym",
                "sub_tier"    => "tier_1",
                "tier_tag"    => "platinum_sponsor",
                "logo_url"    => "https://mirzaam.com/wp-content/uploads/2025/11/technogym.png",
                "website_url" => "https://www.technogym.com"
            ],
            [
                "brand_name"  => "Al Rai",
                "sub_tier"    => "tier_2",
                "tier_tag"    => "media_sponsor",
                "logo_url"    => "https://mirzaam.com/wp-content/uploads/2025/11/al-rai.png",
                "website_url" => "https://www.alrai.com"
            ]
        ]
    ]
];