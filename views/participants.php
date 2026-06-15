<?php
// ============================================================
// views/participants.php
// ============================================================
// $year is set by index.php's router.
// $lang is set globally by i18n.php (loaded in index.php).
// We pass BOTH to the Alpine component so it knows which
// language to render.
// ============================================================
$root = dirname(__DIR__);
$current_lang = $lang ?? 'en';
?>

<div x-data="exhibitorApp('<?= htmlspecialchars($year) ?>', '<?= htmlspecialchars($current_lang) ?>')" class="w-full" x-cloak>
    <?php
    $templatePath = $root . '/includes/exhibitor-directory/template.php';
    if (file_exists($templatePath)) {
        include $templatePath;
    } else {
        echo "<div class='p-4 bg-red-900 text-white rounded'>Template not found at: {$templatePath}</div>";
    }
    ?>
</div>

<script src="/mirzaam/assets/js/components/exhibitor-controller.js"></script>