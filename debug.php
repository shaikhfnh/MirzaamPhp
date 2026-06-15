<?php
echo "<h1>PHP is working.</h1>";
echo "Year from URL: " . ($_GET['year'] ?? 'Not found');
exit;
?>