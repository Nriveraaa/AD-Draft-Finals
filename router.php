<?php
// Load constants and configuration
require __DIR__ . '/bootstrap.php';

// Handle static assets when using PHP built-in server
if (php_sapi_name() === 'cli-server') {
    $urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $file = APP_ROOT . $urlPath;
    if (is_file($file)) {
        return false;
    }
}

// Normalize URI
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$script_name = dirname($_SERVER['SCRIPT_NAME']);

if ($script_name !== '/' && strpos($request_uri, $script_name) === 0) {
    $request_uri = substr($request_uri, strlen($script_name));
}

$request_uri = rtrim($request_uri, '/');
if (empty($request_uri)) {
    $request_uri = '/';
}

// Route definitions
switch ($request_uri) {
    case '/':
        require APP_ROOT . '/pages/home/index.php'; // ✅ Adjust this based on your actual homepage location
        break;

    case '/shop':
        require APP_ROOT . '/pages/shop/index.php';
        break;


    // Add more pages like login, admin, etc.
    // case '/login':
    //     require APP_ROOT . '/pages/login/index.php';
    //     break;

    default:
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        echo "<p>Page <code>" . htmlspecialchars($request_uri) . "</code> not found.</p>";
        break;
}
