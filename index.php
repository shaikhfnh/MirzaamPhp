<?php
ob_start();

require_once 'app/config/i18n.php';
require_once 'app/data/participantsdata-2025.php';
require_once 'app/data/home_data.php';
require_once 'app/data/global_data.php';
require_once 'app/data/categories_data.php';

// ── API EARLY EXIT ──────────────────────────────────────────
// Intercept JSON data requests BEFORE the HTML layout renders.
// This lets the exhibitor directory's JS fetch live data from
// the same router without getting the full HTML page back.
//
// Route: /api/exhibitors/{year}  (or /mirzaam/api/exhibitors/{year} locally)
// Returns: JSON from get_exhibitors.php
// ────────────────────────────────────────────────────────────
$_api_path = trim(strtok($_SERVER['REQUEST_URI'], '?'), '/');
if (isset($base_path) && $base_path !== '') {
    $_api_path = preg_replace('#^' . preg_quote(trim($base_path, '/'), '#') . '/?#', '', $_api_path);
}
if (strpos($_api_path, 'ar/') === 0) $_api_path = substr($_api_path, 3);

if (preg_match('#^api/exhibitors/(\d{4})$#', $_api_path, $_api_m)) {
    if (ob_get_level()) ob_end_clean();
    $_GET['year'] = $_api_m[1];
    require 'app/data/get_exhibitors.php';
    exit;
}
unset($_api_path, $_api_m);
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mirzaam Expo 2026</title>

    <link rel="icon" href="/mirzaam/assets/images/favicon.ico">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="/mirzaam/assets/css/global.css">
    <link rel="stylesheet" href="/mirzaam/assets/css/header.css">

    <script src="https://unpkg.com/@studio-freight/lenis@1.0.34/dist/lenis.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js"></script>

    <script type="module" src="/mirzaam/assets/js/main.js"></script>
</head>
<body class="bg-black text-white">

    <?php include 'includes/header.php'; ?>

    <main>
        <?php
        // ────────────────────────────────────────────────────────
        // ROUTER
        // ────────────────────────────────────────────────────────
        // Every request comes through here (via .htaccess catch-all).
        // We strip the base path and language prefix, then pattern-
        // match the remaining path to choose which view to include.
        // ────────────────────────────────────────────────────────
        $request_uri = $_SERVER['REQUEST_URI'];

        // Strip query string if any (?foo=bar)
        $path = strtok($request_uri, '?');

        // Strip base path (/mirzaam on local, '' on prod)
        if ($base_path !== '' && strpos($path, $base_path) === 0) {
            $path = substr($path, strlen($base_path));
        }        $path = trim($path, '/');

        // Strip Arabic language prefix
        if (strpos($path, 'ar/') === 0) {
            $path = substr($path, 3);
        } elseif ($path === 'ar') {
            $path = '';
        }

        // Normalize: drop .php extension so /about and /about.php both match
        $path = preg_replace('/\.php$/', '', $path);

        // Defaults
        $year      = '2026';
        $view_file = 'views/home.php';

        // ──────── ROUTE TABLE ────────
        // Static pages: path => view file
        $routes = [
            ''             => 'views/home.php',
            'about'        => 'views/about.php',
            'contact'      => 'views/contact.php',

            // VISIT submenu
            'why-visit'    => 'views/why-visit.php',
            'plan-your-trip'    => 'views/plan-your-trip.php',       

            // EXHIBIT submenu
            'why-exhibit'  => 'views/why-exhibit.php',

            // EXPLORE EXPO submenu
            'best-booth'   => 'views/best-booth.php',         // alt path
            'wayfinding'   => 'views/wayfinding.php',

          // MIRZAAMIYAT routes
            'mirzaamiyaat'             => 'views/mirzaamiyaat.php',
            'mirzaamiyaat/about'       => 'views/mirzaamiyaat.php',
            'mirzaamiyaat/exhibitors'  => 'views/mirzaamiyaat-exhibitors.php',

        // Footer Extra routes
            'media'        => 'views/media.php',
            'privacy'      => 'views/privacy.php',
        ];

        // 1. Try static route table
        if (array_key_exists($path, $routes)) {
            $view_file = $routes[$path];
        }
        // 2. Dynamic: /participants/{year}
        elseif (preg_match('#^participants/(\d{4})$#', $path, $matches)) {
            $year      = $matches[1];
            $view_file = 'views/participants.php';
        }
        // 3. /participants by itself (defaults to current edition)
        elseif ($path === 'participants') {
            $year      = '2026';
            $view_file = 'views/participants.php';
        }
        // 4. External VR experience — handled by JS redirect in the view
        elseif ($path === 'vr-2023' || $path === 'mirzaam-vr') {
            $view_file = 'views/vr-redirect.php';
        }

        // Fallback: if the resolved view doesn't exist, go home
        if (!file_exists($view_file)) {
            $view_file = 'views/home.php';
        }

        include $view_file;
        ?>
    </main>

    <?php include 'includes/footer.php'; ?>

</body>
</html>
<?php
$html_output = ob_get_clean();

global $base_path;

if ($base_path === '') {
    // PRODUCTION: rewrite asset/link paths to be domain-root relative
    $html_output = str_replace('/mirzaam/assets/', '/assets/', $html_output);
    $html_output = str_replace('href="/mirzaam/', 'href="/', $html_output);
    $html_output = str_replace('href="/mirzaam"', 'href="/"', $html_output);
}

echo $html_output;
?>