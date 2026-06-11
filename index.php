<?php
// 1. START CAPTURING ALL OUTPUT INTO SERVER MEMORY
ob_start();

// 2. Load the "Brains" - Global Configs and Data
require_once 'app/config/i18n.php'; 
require_once 'app/data/participantsdata-2025.php';
require_once 'app/data/home_data.php'; 
?>

<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= ($lang === 'ar' ? 'rtl' : 'ltr') ?>">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mirzaam Expo 2026</title>
    <script src="https://unpkg.com/@studio-freight/lenis@1.0.34/dist/lenis.min.js"></script>
    <link rel="icon" href="/mirzaam/assets/images/favicon.ico">

    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="/mirzaam/assets/js/main.js"></script>
    <link rel="stylesheet" href="/mirzaam/assets/css/global.css">
    <link rel="stylesheet" href="/mirzaam/assets/css/header.css">

</head>

<body class="bg-black text-white">
    
    <?php include 'includes/header.php'; ?>
    
  <main>
    <?php
    // Get the request path and remove the base path
    $request_uri = $_SERVER['REQUEST_URI'];
    // Remove /mirzaam/ if it exists
    $path = str_replace($base_path, '', $request_uri);
    $path = trim($path, '/');
    
    // Handle the language prefix (remove /ar if present to get the actual page name)
    if (strpos($path, 'ar/') === 0) {
        $path = substr($path, 3);
    }

    // ROUTING SWITCH
    switch ($path) {
        case 'about':
        case 'about.php':
            include 'views/about.php'; // Ensure your file name matches exactly
            break;
        default:
            include 'views/home.php';
            break;
    }
    ?>
</main>
    
    <?php include 'includes/footer.php'; ?>
    
</body>
</html>

<?php
// FETCH THE FULLY RENDERED HTML PAGE FROM MEMORY
$html_output = ob_get_clean();

global $base_path;

if ($base_path === '') {
    // ON PRODUCTION (RAILWAY): Clean up assets AND folder route strings from links globally
    $html_output = str_replace('/mirzaam/assets/', '/assets/', $html_output);
    $html_output = str_replace('href="/mirzaam/', 'href="/', $html_output);
    $html_output = str_replace('href="/mirzaam"', 'href="/"', $html_output);
}

// OUTPUT THE CLEANED HTML TO THE VISITOR'S BROWSER
echo $html_output;
?>