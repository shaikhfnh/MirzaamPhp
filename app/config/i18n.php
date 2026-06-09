<?php
// 1. SETTINGS
// Define your subfolder. If your site moves to the root later, set this to empty: ''
$base_path = '/mirzaam'; 

// 2. DETECT LANGUAGE
// Detect if '/ar/' is in the current URI
$request_uri = $_SERVER['REQUEST_URI'];
$lang = (strpos($request_uri, "{$base_path}/ar/") !== false) ? 'ar' : 'en';

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

// 5. URL HELPER (Fixed for /mirzaam/ structure)
function get_url($path) {
    global $lang, $base_path;
    
    // Clean input
    $path = ltrim($path, '/');
    
    // If path is empty (root), treat as index.php
    $file = ($path === '' || $path === '#') ? '' : $path;

    if ($lang === 'en') {
        return "{$base_path}/{$file}";
    } else {
        // Build AR URL: /mirzaam/ar/filename.php
        return "{$base_path}/ar/{$file}";
    }
}

// 6. HELPER FOR THE LANGUAGE SWITCHER
function get_switch_url() {
    global $lang, $base_path; // Make sure $base_path is defined as '/mirzaam'
    $current_uri = $_SERVER['REQUEST_URI'];
    
    if ($lang === 'en') {
        // If currently on /mirzaam/index.php, switch to /mirzaam/ar/index.php
        return str_replace($base_path, "{$base_path}/ar", $current_uri);
    } else {
        // If currently on /mirzaam/ar/index.php, switch back to /mirzaam/index.php
        return str_replace("{$base_path}/ar", $base_path, $current_uri);
    }
}
?>