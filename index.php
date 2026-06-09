<?php
// 1. Load the "Brains" - Global Configs and Data
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