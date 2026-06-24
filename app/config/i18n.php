<?php
// 1. SETTINGS
// Leave as '' on Railway, or '/mirzaam' on Local
$base_path = ''; 

// 2. DETECT LANGUAGE
$request_uri = $_SERVER['REQUEST_URI'];

// Clean up trailing slashes or index.php to make detection accurate
$clean_uri = rtrim($request_uri, '/');
if (strpos($clean_uri, '/index.php') !== false) {
    $clean_uri = str_replace('/index.php', '', $clean_uri);
}

// Check if the URI ends with /ar or contains /ar/
$is_arabic = (preg_match('#/ar($|/)#', $clean_uri) === 1);
$lang = $is_arabic ? 'ar' : 'en';

// 3. LOAD TRANSLATIONS
$translations = [];
$lang_path = __DIR__ . "/../lang/{$lang}/";

if (is_dir($lang_path)) {
    $files = glob($lang_path . "*.php");
    foreach ($files as $file) {
        $file_translations = include $file;
        if (is_array($file_translations)) {
            $translations = array_merge($translations, $file_translations);
        }
    }
}

// 4. TRANSLATION FUNCTION
function __($key) {
    global $translations;
    return $translations[$key] ?? $key;
}

// 5. URL HELPER
function get_url($path) {
    global $lang, $base_path;
    $path = ltrim($path, '/');
    
    // Normalize the base to avoid double slashes
    $normalized_base = ($base_path === '') ? '' : $base_path;

    if ($lang === 'en') {
        return $normalized_base . '/' . $path;
    } else {
        return $normalized_base . '/ar/' . $path;
    }
}

// 6. HELPER FOR THE LANGUAGE SWITCHER (Bulletproof Routing)
function get_switch_url() {
    global $lang, $base_path;
    $request_uri = $_SERVER['REQUEST_URI'];

    // Strip out base path to get the raw local file track
    $relative_path = $request_uri;
    if ($base_path !== '' && strpos($request_uri, $base_path) === 0) {
        $relative_path = substr($request_uri, strlen($base_path));
    }
    $relative_path = '/' . ltrim($relative_path, '/');

    if ($lang === 'en') {
        // Switching to Arabic: Inject /ar/ into the path correctly
        if (strpos($relative_path, '/ar/') !== 0 && $relative_path !== '/ar') {
            $relative_path = '/ar' . $relative_path;
        }
    } else {
        // Switching to English: Cleanly remove /ar/ or /ar from the path
        if (strpos($relative_path, '/ar/') === 0) {
            $relative_path = substr($relative_path, 3);
        } elseif ($relative_path === '/ar') {
            $relative_path = '/';
        }
    }

    // Return reconstructed path wrapped in environment base path
    return $base_path . '/' . ltrim($relative_path, '/');
}
?>