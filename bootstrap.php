<?php
// AD-Draft-Finals/bootstrap.php

define('BASE_PATH', realpath(__DIR__));
chdir(BASE_PATH);

define('APP_ROOT', BASE_PATH); // consistent root path

// Show errors (turn off in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ✅ FIXED: Load product static data properly
require_once APP_ROOT . '/staticData/products.staticdata.php';

// Start session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Optional debug
// echo "Bootstrap loaded successfully.<br>";
// echo "APP_ROOT: " . APP_ROOT . "<br>";
// echo "Products: " . count(getProducts()) . "<br>";
?>
