<?php
// AD-Draft-Finals/router.php

// Required to load BASE_PATH (now APP_ROOT) and other configurations
require __DIR__ . '/bootstrap.php';

// --- Handling Static Files for PHP's Built-in Development Server ---
// If running on PHP's built-in server AND the requested URI corresponds to an actual file (e.g., CSS, JS, images)
if (php_sapi_name() === 'cli-server') {
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    // Use APP_ROOT which is defined as BASE_PATH in bootstrap.php
    $file = APP_ROOT . $urlPath;
    if (is_file($file)) {
        // If it's a static file, return false to let the built-in server serve it directly.
        // This prevents the router from trying to process static assets as dynamic routes.
        return false;
    }
}

// --- Custom Routing for Dynamic Pages ---
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$script_name = dirname($_SERVER['SCRIPT_NAME']); // Get the directory name of the current script

// If the application is in a sub-directory (e.g., localhost/AD-Draft-Finals/shop)
// Remove the sub-directory path from the request URI to get the clean route
if ($script_name !== '/' && strpos($request_uri, $script_name) === 0) {
    $request_uri = substr($request_uri, strlen($script_name));
}

// Normalize trailing slashes (e.g., /shop/ becomes /shop, / becomes /)
$request_uri = rtrim($request_uri, '/');
if (empty($request_uri)) {
    $request_uri = '/'; // Ensure root path is always '/'
}

// Define your application routes
switch ($request_uri) {
    case '/':
        // This is your homepage/landing page.
        // Make sure you have an index.php directly inside your AD-Draft-Finals folder.
        require APP_ROOT . '/index.php';
        break;
    case '/shop':
        // This will load your shop page
        require APP_ROOT . '/pages/shop/index.php';
        break;
    // Add more routes here for other pages (e.g., /login, /admin, /about, /contact)
    // case '/login':
    //     require APP_ROOT . '/pages/login/index.php';
    //     break;
    // case '/admin':
    //     require APP_ROOT . '/pages/admin/index.php';
    //     break;

    default:
        // If no static file or dynamic route matches, show a 404 Not Found page
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        echo "<p>The page <code>" . htmlspecialchars($request_uri) . "</code> could not be found.</p>";
        break;
}