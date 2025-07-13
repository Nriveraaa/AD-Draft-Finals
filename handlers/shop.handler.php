<?php
// AD-Draft-Finals/handlers/shop.handler.php

require_once dirname(__DIR__) . '/bootstrap.php'; // Correct path to bootstrap

header('Content-Type: application/json'); // Output will be JSON

$action = $_GET['action'] ?? $_POST['action'] ?? ''; // Get action from GET or POST

switch ($action) {
    case 'getProductDetails':
        $productId = $_GET['id'] ?? '';
        if ($productId) {
            // Use the getProductById function from staticData/products.staticdata.php
            $product = getProductById($productId, $products);
            if ($product) {
                echo json_encode(['success' => true, 'data' => $product]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Product not found.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Product ID is missing.']);
        }
        break;

    case 'addToCart':
        $productId = $_POST['productId'] ?? ''; // Use productId as sent from JS
        $quantity = $_POST['quantity'] ?? 1; // Default to 1 if quantity not provided

        // Basic validation (in a real app, do more thorough checks)
        if (empty($productId) || !is_numeric($quantity) || $quantity <= 0) {
            echo json_encode(['success' => false, 'message' => 'Invalid product or quantity.']);
            exit;
        }

        // --- Add to Cart Logic (Example) ---
        // In a real application, you would:
        // 1. Fetch product details from DB/static data to ensure it's valid
        // 2. Add/update the item in the user's session cart ($_SESSION['cart'])
        // 3. Or, if logged in, store in a database cart table

        // Simulate success for now
        $currentCartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
        $_SESSION['cart'] = $_SESSION['cart'] ?? [];
        $_SESSION['cart'][$productId] = ($_SESSION['cart'][$productId] ?? 0) + $quantity; // Simple increment
        $newCartCount = count($_SESSION['cart']);

        echo json_encode([
            'success' => true,
            'message' => 'Item added to cart.',
            'productId' => $productId,
            'quantityAdded' => $quantity,
            'currentCartCount' => $newCartCount // Send updated cart count
        ]);
        break;

    case 'filterProducts':
        $category = $_GET['category'] ?? 'all';
        $filteredProducts = [];

        foreach ($products as $product) {
            if ($category === 'all' || $product['category'] === $category) {
                $filteredProducts[] = $product;
            }
        }
        echo json_encode(['success' => true, 'data' => $filteredProducts]);
        break;

    default:
        http_response_code(400); // Bad Request
        echo json_encode(['success' => false, 'message' => 'Invalid action specified.']);
        break;
}
?>