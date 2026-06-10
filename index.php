<?php
// 1. START CAPTURING ALL OUTPUT INTO SERVER MEMORY
ob_start();

// 2. Load the "Brains" - Global Configs and Data
require_once 'app/config/i18n.php'; 
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
        <?php include 'views/home.php'; ?>
    </main>
    
    <?php include 'includes/footer.php'; ?>
    
</body>
</html>

<?php
// 3. FETCH THE FULLY RENDERED HTML PAGE FROM MEMORY
$html_output = ob_get_clean();

// 4. EXECUTE GLOBAL REPLACEMENT RULES BASED ON ENVIRONMENT
global $base_path;

if ($base_path === '') {
    // ON RAILWAY: Strip out the local subfolder prefix entirely from all links and assets
    $html_output = str_replace('/mirzaam/assets/', '/assets/', $html_output);
} else {
    // ON LOCAL: Ensure any loose or un-prefixed asset references point back to your local subfolder
    $html_output = str_replace('="/assets/', '="/mirzaam/assets/', $html_output);
}

// 5. OUTPUT THE PERFECTLY CLEANED HTML TO THE VISITOR'S BROWSER
echo $html_output;
?>