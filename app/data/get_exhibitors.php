<?php
// ============================================================
// app/data/get_exhibitors.php
// ============================================================
// Handles 4 years, each with a slightly different schema.
// All output normalised to {id, name_en, name_ar, category, image, hall, type}
// ============================================================

if (ob_get_level()) { ob_end_clean(); }
header('Content-Type: application/json; charset=utf-8');

// ------------------------------------------------------------
// 1. Year + validate
// ------------------------------------------------------------
$year = $_GET['year'] ?? '2026';
if (!preg_match('/^\d{4}$/', $year)) $year = '2026';

// ------------------------------------------------------------
// 2. Source configuration per year
// ------------------------------------------------------------
$apiKey = 'AIzaSyAyGGQCjLa76kq8Sb0P3bab0Ajp36qjA14';

$sheetConfig = [
    '2026' => ['id' => '1l7f5kJjskXHzlXaTQn4fX31aOpXwHBsZVOL5KMBLnL0', 'range' => 'Booths'],
    '2025' => ['id' => '1u5aDXJSPCCnEjSL2PqgSVp2X1xTDg3t0HbDR4wPQ6mw', 'range' => 'Booths'],
    '2024' => ['id' => '1l7f5kJjskXHzlXaTQn4fX31aOpXwHBsZVOL5KMBLnL0', 'range' => 'Booths'],
    '2023' => ['id' => '1mzUHaLhjJFFSbD-8_oDRqWwJxBf_Zznf3X9LBfRDksE', 'range' => 'Booths'],
];

// ------------------------------------------------------------
// 3. Image URL builder — different prefix per year
// ------------------------------------------------------------
function buildImageUrl($year, $filename) {
    if (empty($filename)) return '';
    $filename = ltrim(trim($filename), '/');
    switch ($year) {
        case '2025': return 'https://mirzaam.com/2025/logos/' . $filename;
        case '2024': return 'https://mirzaam.com/2024/logos/' . $filename;
        case '2023': return 'https://mirzaam.com/2023/logos/' . $filename;
        case '2022': return 'https://mirzaam.com/images/logo2022/' . $filename;
        case '2026': return 'https://mirzaam.com/2026/logos/' . $filename;
        default:     return 'https://mirzaam.com/wp-content/uploads/' . $filename;
    }
}

// ------------------------------------------------------------
// 4. Header alias map — different years use different header names
// ------------------------------------------------------------
$headerAliases = [
    'online'   => ['online'],
    'id'       => ['id'],
    'company'  => ['company', '2024 company', '2023 company', 'company name'],
    'name_ar'  => ['arabic  name', 'arabic name'],
    'category' => ['categories', 'category'],
    'image'    => ['image'],
    'hall'     => ['hall'],
    'type'     => ['type'],
];

function mapHeaders($headerRow, $aliases) {
    $map   = [];
    $lower = array_map(fn($h) => strtolower(trim($h ?? '')), $headerRow);
    foreach ($aliases as $field => $candidates) {
        $map[$field] = null;
        foreach ($candidates as $candidate) {
            $idx = array_search(strtolower($candidate), $lower, true);
            if ($idx !== false) { $map[$field] = $idx; break; }
        }
    }
    return $map;
}

// ------------------------------------------------------------
// 5. Generic sheet-row processor (used for ALL years including 2022)
// ------------------------------------------------------------
function processSheetRows($year, $rows) {
    global $headerAliases;
    $out = [];

    if (count($rows) < 2) return $out;

    $headerRow = array_shift($rows);
    $cols      = mapHeaders($headerRow, $headerAliases);

    // If we can't find a Company column, return debug info
    if ($cols['company'] === null) {
        http_response_code(500);
        echo json_encode([
            'error'   => 'No "Company" column found',
            'year'    => $year,
            'headers' => $headerRow,
        ]);
        exit;
    }

    foreach ($rows as $row) {
        // Online filter — but 2022 uses "1"/"0" string instead of TRUE/FALSE
        if ($cols['online'] !== null) {
            $flag = strtoupper(trim((string)($row[$cols['online']] ?? '')));
            // Accept TRUE, true, 1 as valid
            if ($flag !== 'TRUE' && $flag !== '1') continue;
        }

        $name_en = trim((string)($row[$cols['company']] ?? ''));
        if ($name_en === '') continue;

        $rawImage = $cols['image'] !== null ? trim((string)($row[$cols['image']] ?? '')) : '';

        $out[] = [
            'id'       => $cols['id']       !== null ? (string)($row[$cols['id']]       ?? '') : '',
            'name_en'  => $name_en,
            'name_ar'  => $cols['name_ar']  !== null ? trim((string)($row[$cols['name_ar']]  ?? '')) : '',
            'category' => $cols['category'] !== null ? trim((string)($row[$cols['category']] ?? '')) : '',
            'image'    => buildImageUrl($year, $rawImage),
            'hall'     => $cols['hall']     !== null ? trim((string)($row[$cols['hall']]     ?? '')) : '',
            'type'     => $cols['type']     !== null ? trim((string)($row[$cols['type']]     ?? '')) : '',
        ];
    }

    return $out;
}

// ------------------------------------------------------------
// 6. Fetch + dispatch
// ------------------------------------------------------------
$formatted = [];

if ($year === '2022') {
    // ----- 2022: static JSON file, BUT it's actually Google-Sheets format
    // ({range, majorDimension, values}) — same as the other years.
    $json = @file_get_contents('https://mirzaam.com/wp-content/themes/flatsome-child/Booths2022.json');
    if ($json === false) {
        http_response_code(502);
        echo json_encode(['error' => 'Failed to fetch 2022 JSON']);
        exit;
    }
    $data = json_decode($json, true);
    $rows = $data['values'] ?? [];

    $formatted = processSheetRows('2022', $rows);
}
elseif (isset($sheetConfig[$year])) {
    // ----- Google Sheets years (2023/2024/2025/2026)
    $config = $sheetConfig[$year];
    $url    = "https://sheets.googleapis.com/v4/spreadsheets/{$config['id']}/values/{$config['range']}?key={$apiKey}";
    $json   = @file_get_contents($url);

    if ($json === false) {
        http_response_code(502);
        echo json_encode(['error' => 'Failed to fetch Google Sheets data', 'year' => $year]);
        exit;
    }
    $data = json_decode($json, true);
    $rows = $data['values'] ?? [];

    $formatted = processSheetRows($year, $rows);
}

echo json_encode($formatted, JSON_UNESCAPED_UNICODE);
exit;