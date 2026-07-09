<?php
// ============================================================
// app/data/get_exhibitors.php  ·  v4 — Registry Edition
// ============================================================
// HOW IT WORKS
// ─────────────────────────────────────────────────────────────
// Every expo+year combination lives in $EXPO_REGISTRY as a
// named key: "mirzaam-2026", "mirzaamiyat-2026", "ixir-2026".
// Adding a new expo requires only ONE new array entry here —
// nothing else in the codebase needs to change.
//
// URL FORMAT (called by Alpine.js controllers in each view)
// ─────────────────────────────────────────────────────────────
//   /api/exhibitors/2026                → mirzaam-2026  (backward compat)
//   /api/exhibitors/2026?expo=mirzaamiyat → mirzaamiyat-2026
//   /api/exhibitors/2026?expo=ixir        → ixir-2026  (future)
//
// The year is extracted from the URL path by index.php's router
// and injected as $_GET['year']. The expo name comes via query
// string; defaults to 'mirzaam' when omitted.
// ============================================================

if (ob_get_level()) { ob_end_clean(); }
header('Content-Type: application/json; charset=utf-8');

// ── 1. Read + validate request params ──────────────────────
$year = preg_match('/^\d{4}$/', $_GET['year'] ?? '') ? $_GET['year'] : '2026';
$expo = preg_match('/^[a-z0-9_-]+$/', $_GET['expo'] ?? '') ? strtolower($_GET['expo']) : 'mirzaam';

$registry_key = $expo . '-' . $year;

// ── 2. EXPO REGISTRY ────────────────────────────────────────
// Each entry:
//   sheet_id   → Google Sheets document ID
//   api_key    → Sheets API key
//   image_base → Full URL prefix prepended to every logo filename
//   range      → Sheet tab name (almost always 'Booths')
//   json_url   → (optional) replaces sheet_id for static JSON sources
//
// ⚠  2022 uses a static JSON file — handled via json_url key.
// ⚠  image_base for Mirzaamiyat confirmed path:
//      https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/
// ============================================================
$EXPO_REGISTRY = [

    // ── MIRZAAM ─────────────────────────────────────────────
    'mirzaam-2026' => [
        'sheet_id'   => '1l7f5kJjskXHzlXaTQn4fX31aOpXwHBsZVOL5KMBLnL0',
        'api_key'    => 'AIzaSyAyGGQCjLa76kq8Sb0P3bab0Ajp36qjA14',
        'image_base' => 'https://mirzaam.com/2026/logos/',
        'range'      => 'Booths',
    ],
    'mirzaam-2025' => [
        'sheet_id'   => '1u5aDXJSPCCnEjSL2PqgSVp2X1xTDg3t0HbDR4wPQ6mw',
        'api_key'    => 'AIzaSyAyGGQCjLa76kq8Sb0P3bab0Ajp36qjA14',
        'image_base' => 'https://mirzaam.com/2025/logos/',
        'range'      => 'Booths',
    ],
    'mirzaam-2024' => [
        'sheet_id'   => '1l7f5kJjskXHzlXaTQn4fX31aOpXwHBsZVOL5KMBLnL0',
        'api_key'    => 'AIzaSyAyGGQCjLa76kq8Sb0P3bab0Ajp36qjA14',
        'image_base' => 'https://mirzaam.com/2024/logos/',
        'range'      => 'Booths',
    ],
    'mirzaam-2023' => [
        'sheet_id'   => '1mzUHaLhjJFFSbD-8_oDRqWwJxBf_Zznf3X9LBfRDksE',
        'api_key'    => 'AIzaSyAyGGQCjLa76kq8Sb0P3bab0Ajp36qjA14',
        'image_base' => 'https://mirzaam.com/2023/logos/',
        'range'      => 'Booths',
    ],
    'mirzaam-2022' => [
        'json_url'   => 'https://mirzaam.com/wp-content/themes/flatsome-child/Booths2022.json',
        'image_base' => 'https://mirzaam.com/images/logo2022/',
    ],

    // ── MIRZAAMIYAT ─────────────────────────────────────────
    // To add 2027: duplicate this entry, update sheet_id + image_base.
    'mirzaamiyat-2026' => [
        'sheet_id'   => '1oC2hQejAGgvqJSfbg9iFjJBFsPcN1S9CU0MPpc6L40s',
        'api_key'    => 'AIzaSyBu7aLRrDgVFsaAx3OaYDOBfSP59Y7cCmE',
        'image_base' => 'https://mirzaam.com/mirzaamiyat/2026/registration/images/logos/',
        'range'      => 'Booths',
    ],

    // ── FUTURE EXPOS ────────────────────────────────────────
    // Add IXIR, Mama+Baby, or any other expo here.
    // Example (uncomment + fill IDs when ready):
    //
    // 'ixir-2026' => [
    //     'sheet_id'   => 'YOUR_IXIR_SHEET_ID',
    //     'api_key'    => 'YOUR_API_KEY',
    //     'image_base' => 'https://mirzaam.com/ixir/2026/logos/',
    //     'range'      => 'Booths',
    // ],
    //
    // 'mamababy-2026' => [
    //     'sheet_id'   => 'YOUR_MAMABABY_SHEET_ID',
    //     'api_key'    => 'YOUR_API_KEY',
    //     'image_base' => 'https://mirzaam.com/mamababy/2026/logos/',
    //     'range'      => 'Booths',
    // ],
];

// ── 3. Validate expo key ────────────────────────────────────
if (!isset($EXPO_REGISTRY[$registry_key])) {
    http_response_code(404);
    echo json_encode([
        'error' => 'Unknown expo+year combination',
        'key'   => $registry_key,
        'available' => array_keys($EXPO_REGISTRY),
    ]);
    exit;
}

$cfg = $EXPO_REGISTRY[$registry_key];

// ── 4. Image URL builder — uses registry image_base ─────────
function buildImageUrl(string $base, string $filename): string {
    if ($filename === '') return '';
    $filename = ltrim(trim($filename), '/');
    return rtrim($base, '/') . '/' . $filename;
}

// ── 5. Header alias map ─────────────────────────────────────
// Covers column-name variations across all years and expos.
$headerAliases = [
    'online'   => ['online'],
    'id'       => ['id'],
    'company'  => ['company', '2024 company', '2023 company', 'company name'],
    'name_ar'  => ['arabic  name', 'arabic name'],
    'category' => ['categories', 'category','Categories', 'Category', 'category name', 'category type'],
    'image'    => ['image'],
    'hall'     => ['hall'],
    'type'     => ['type', 'booth category'],
];

function mapHeaders(array $headerRow, array $aliases): array {
    $map   = [];
    $lower = array_map(fn($h) => strtolower(trim($h ?? '')), $headerRow);
    foreach ($aliases as $field => $candidates) {
        $map[$field] = null;
        foreach ($candidates as $candidate) {
            $needle = strtolower($candidate);
            foreach ($lower as $idx => $header) {
                // Changed from exact match to "starts with" — catches
                // headers with accidental extra text appended (like
                // "Categories, ARCHITECTURAL CONSULTANT, ...") while
                // still safely matching clean headers exactly.
                if (str_starts_with($header, $needle)) {
                    $map[$field] = $idx;
                    break 2;
                }
            }
        }
    }
    return $map;
}

// ── 6. Row processor ─────────────────────────────────────────
function processSheetRows(array $rows, string $imageBase): array {
    global $headerAliases;
    $out = [];

    if (count($rows) < 2) return $out;

    $headerRow = array_shift($rows);
    $cols      = mapHeaders($headerRow, $headerAliases);

    if ($cols['company'] === null) {
        http_response_code(500);
        echo json_encode([
            'error'   => 'No "Company" column found',
            'headers' => $headerRow,
        ]);
        exit;
    }

    foreach ($rows as $row) {
        // Online filter — accepts TRUE / true / 1
        if ($cols['online'] !== null) {
            $flag = strtoupper(trim((string)($row[$cols['online']] ?? '')));
            if ($flag !== 'TRUE' && $flag !== '1') continue;
        }

        $name_en = trim((string)($row[$cols['company']] ?? ''));
        if ($name_en === '') continue;

        $rawImage = $cols['image'] !== null
            ? trim(str_replace("\n", '', (string)($row[$cols['image']] ?? '')))
            : '';

        $out[] = [
            'id'       => $cols['id']       !== null ? (string)($row[$cols['id']]       ?? '') : '',
            'name_en'  => $name_en,
            'name_ar'  => $cols['name_ar']  !== null ? trim((string)($row[$cols['name_ar']]  ?? '')) : '',
            'category' => $cols['category'] !== null ? trim((string)($row[$cols['category']] ?? '')) : '',
            'image'    => buildImageUrl($imageBase, $rawImage),
            'hall'     => $cols['hall']     !== null ? trim((string)($row[$cols['hall']]     ?? '')) : '',
            'type'     => $cols['type']     !== null ? trim((string)($row[$cols['type']]     ?? '')) : '',
        ];
    }

    return $out;
}

// ── 7. Fetch ─────────────────────────────────────────────────
$formatted = [];

if (isset($cfg['json_url'])) {
    // Static JSON source (2022)
    $json = @file_get_contents($cfg['json_url']);
    if ($json === false) {
        http_response_code(502);
        echo json_encode(['error' => 'Failed to fetch static JSON', 'url' => $cfg['json_url']]);
        exit;
    }
    $data      = json_decode($json, true);
    $formatted = processSheetRows($data['values'] ?? [], $cfg['image_base']);

} else {
    // Google Sheets
    $url  = "https://sheets.googleapis.com/v4/spreadsheets/{$cfg['sheet_id']}/values/{$cfg['range']}?key={$cfg['api_key']}";
    $json = @file_get_contents($url);
    if ($json === false) {
        http_response_code(502);
        echo json_encode(['error' => 'Failed to fetch Google Sheets data', 'key' => $registry_key]);
        exit;
    }
    $data      = json_decode($json, true);
    $formatted = processSheetRows($data['values'] ?? [], $cfg['image_base']);
}

echo json_encode($formatted, JSON_UNESCAPED_UNICODE);
exit;