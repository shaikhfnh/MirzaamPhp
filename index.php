<?php
ob_start();

require_once 'app/config/i18n.php';
require_once 'app/data/participantsdata-2025.php';
require_once 'app/config/forms.php';
require_once 'app/data/home_data.php';
require_once 'app/data/global_data.php';
require_once 'app/data/menu.php';
require_once 'app/data/previous-mirzaam-data.php';
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
    <script src="https://unpkg.com/@rive-app/canvas@latest" defer></script>

    <script type="module" src="/mirzaam/assets/js/main.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js"></script>

</head>
<body class="bg-black text-white">
    

    <?php include 'includes/header.php'; ?>
    <a href="https://wa.me/96565783517"
   target="_blank"
   rel="noopener noreferrer"
   class="global-whatsapp-fab"
   aria-label="<?= $lang === 'ar' ? 'تواصل معنا عبر واتساب' : 'Chat with us on WhatsApp' ?>">
 
    <span class="global-whatsapp-fab-pulse"></span>
 
    <svg viewBox="0 0 24 24" aria-hidden="true">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.149-.198.297-.768.966-.941 1.164-.173.198-.347.223-.644.075-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.372-.025-.52-.075-.149-.669-1.612-.916-2.206-.242-.579-.487-.5-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479s1.065 2.875 1.213 3.074c.149.198 2.095 3.2 5.077 4.487.71.306 1.263.489 1.694.626.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.174-1.413-.074-.124-.272-.198-.57-.347zM12.042 0C5.495 0 .162 5.333.162 11.88c0 2.093.547 4.136 1.588 5.938L0 24l6.353-1.667a11.86 11.86 0 005.689 1.448h.005c6.547 0 11.88-5.333 11.88-11.88A11.913 11.913 0 0012.042 0zm0 21.77h-.004a9.88 9.88 0 01-5.032-1.378l-.36-.214-3.769.988 1.005-3.675-.234-.377a9.86 9.86 0 01-1.516-5.233c.002-5.443 4.43-9.87 9.876-9.87a9.82 9.82 0 016.98 2.894 9.82 9.82 0 012.89 6.98c-.003 5.445-4.43 9.875-9.876 9.875z"/>
    </svg>
</a>
<main>
        <?php
        // ────────────────────────────────────────────────────────
        // ROUTER
        // ────────────────────────────────────────────────────────
        $request_uri = $_SERVER['REQUEST_URI'];

        // Strip query string if any (?foo=bar)
        $path = strtok($request_uri, '?');

        // Strip base path (/mirzaam on local, '' on prod)
        if ($base_path !== '' && strpos($path, $base_path) === 0) {
            $path = substr($path, strlen($base_path));
        }
        $path = trim($path, '/');

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
        $routes = [
            ''             => 'views/home.php',
            'about'        => 'views/about.php',
            'contact'      => 'views/contact.php',

            // VISIT submenu
            'why-visit'         => 'views/why-visit.php',
            'plan-your-trip'    => 'views/plan-your-trip.php',

            // EXHIBIT submenu
            'why-exhibit'  => 'views/why-exhibit.php',

            // EXPLORE EXPO submenu
            'best-booth'   => 'views/best-booth.php',
            'wayfinding'   => 'views/wayfinding.php',

            // MIRZAAMIYAT routes
            'mirzaamiyat'             => 'views/mirzaamiyat.php',
            'mirzaamiyat/about'       => 'views/mirzaamiyat.php',
            'mirzaamiyat/exhibitors'  => 'views/mirzaamiyat-exhibitors.php',

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
        // 3. Dynamic: /mirzaamiyat/exhibitors/{year}
        elseif (preg_match('#^mirzaamiyat/exhibitors/(\d{4})$#', $path, $matches)) {
            $year      = $matches[1];
            $view_file = 'views/mirzaamiyat-exhibitors.php';
        }
        // 4. Dynamic: /previous/{year}
        elseif (preg_match('#^previous/(\d{4})$#', $path, $matches)) {
            $year      = $matches[1];
            $view_file = 'views/previous-mirzaam.php';
        }
        // 5. /previous by itself (defaults to latest year)
        elseif ($path === 'previous') {
            $year      = '2025';
            $view_file = 'views/previous-mirzaam.php';
        }
        // 6. /participants by itself (defaults to current edition)
        elseif ($path === 'participants') {
            $year      = '2026';
            $view_file = 'views/participants.php';
        }
        // 7. External VR experience
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