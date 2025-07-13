<?php
// AD-Draft-Finals/index.php

// Dahil ang router.php ang nagsisimula at naglo-load ng bootstrap.php,
// available na ang APP_ROOT dito.
// Hindi mo na kailangang i-include ang bootstrap.php nang direkta dito.

// Define variables for main.layout.php
$pageTitle = "Welcome to AD-Draft-Finals";
$content = "
    <div style='text-align: center; padding: 50px; color: var(--color-light-gray);'>
        <h1>Welcome to Outlast Shop!</h1>
        <p>Explore our post-apocalyptic supplies and survive the apocalypse!</p>
        <p><a href='/shop' style='color: var(--color-red-accent); font-weight: bold; text-decoration: underline;'>Go to Shop</a></p>
    </div>
";

// Include the main layout to render the page
include APP_ROOT . '/layout/main.layout.php';
?>