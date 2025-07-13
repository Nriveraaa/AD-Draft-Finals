<?php
// AD-Draft-Finals/bootstrap.php

// Your existing lines:
define('BASE_PATH', realpath(__DIR__));
chdir(BASE_PATH);

// My recommended lines (ensure APP_ROOT is defined for other files to use)
// It's good practice to use APP_ROOT consistently if BASE_PATH is for chdir
define('APP_ROOT', BASE_PATH); // Use BASE_PATH as APP_ROOT

// Basic error reporting (adjust for production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include utility functions (if you have one, e.g., helpers.utils.php)
// require_once APP_ROOT . '/utils/name.utils.php';

// Include static data (e.g., product data)
// ITO ANG MAHALAGA para makita ang $products array at getProductById() function
require_once APP_ROOT . '/staticData/products.staticdata.php';

// Start session if needed (important for cart functionality)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// You can add database connections, constant definitions, etc., here
// define('DB_HOST', 'localhost');
// define('DB_NAME', 'your_database');

// For debugging (optional, remove in production)
// echo "Bootstrap loaded successfully.<br>";
// echo "APP_ROOT: " . APP_ROOT . "<br>";
// echo "Number of products loaded: " . count($products) . "<br>";
?>