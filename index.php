<?php
// AD-Draft-Finals/index.php

// Required to load APP_ROOT
require_once __DIR__ . '/bootstrap.php'; // bootstrap.php is in the same directory

// Variables for CSS/JS
$globalCss = "/assets/css/style.css"; // Global CSS
$globalJs = "/assets/js/script.js";   // Global JS
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to AD-Draft-Finals</title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($globalCss); ?>">
    <link rel="icon" href="/assets/img/outlast_favicon.png" type="image/png">
</head>
<body class="dark-theme">

    <div style='text-align: center; padding: 50px; color: var(--color-light-gray);'>
        <h1>Welcome to Outlast Shop!</h1>
        <p>Explore our post-apocalyptic supplies and survive the apocalypse!</p>
        <p><a href='/shop' style='color: var(--color-red-accent); font-weight: bold; text-decoration: underline;'>Go to Shop</a></p>
    </div>

    <script src="<?php echo htmlspecialchars($globalJs); ?>"></script>
</body>
</html>