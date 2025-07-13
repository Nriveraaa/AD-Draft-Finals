<?php
// AD-Draft-Finals/pages/shop/index.php

// Required to load APP_ROOT and the $products data
// Make sure bootstrap.php is correctly set up as discussed earlier
require_once __DIR__ . '/../../bootstrap.php'; // Adjust path if necessary for standalone access

// Set page-specific variables
$pageTitle = "Outlast Shop - Products";
$pageCssLocal = "/pages/shop/assets/css/style.css"; // Page-specific CSS
$pageJsLocal = "/pages/shop/assets/js/script.js";   // Page-specific JS
$globalCss = "/assets/css/style.css";             // Global CSS
$globalJs = "/assets/js/script.js";               // Global JS
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($globalCss); ?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($pageCssLocal); ?>">
    <link rel="icon" href="/assets/img/outlast_favicon.png" type="image/png">
</head>
<body class="dark-theme">

    <div class="shop-container">
        <div class="shop-header-title">SHOP</div>
        <div class="shop-grid-wrapper">
            <div class="product-grid-panel">
                <div class="panel-header">PRODUCT VIEW</div>
                <div class="product-grid">
                    <?php
                    // Filter products to show only 'apparel' initially, as per your image
                    $initialProducts = array_filter($products, function($p) {
                        return $p['category'] === 'apparel';
                    });

                    if (!empty($initialProducts)) {
                        foreach ($initialProducts as $product) {
                            // Path for productCard.component.php
                            include APP_ROOT . '/components/componentGroup/productCard.component.php';
                        }
                    } else {
                        echo "<p class='no-products'>No products available in this category.</p>";
                    }
                    ?>
                </div>
                <div class="category-tabs">
                    <button class="tab-button active" data-category="apparel">APPAREL</button>
                    <button class="tab-button" data-category="weapons">WEAPONS</button>
                    <button class="tab-button" data-category="medical">MEDICAL</button>
                    <button class="tab-button" data-category="tools">TOOLS</button>
                    <button class="tab-button" data-category="sustenance">SUSTENANCE</button>
                    <button class="tab-button" data-category="bundle">BUNDLES</button>
                </div>
            </div>

            <div class="product-detail-panel">
                <div class="panel-header" id="detail-panel-header">PRODUCT VIEW</div>
                <?php
                // For initial load, display the specific product from your image
                $defaultDetailProduct = getProductById('prod001', $products);
                if ($defaultDetailProduct) {
                    // Temporarily set $selectedProduct for productDetail.component.php
                    $selectedProduct = $defaultDetailProduct;
                    // Path for productDetail.component.php
                    include APP_ROOT . '/components/componentGroup/productDetail.component.php';
                } else {
                    // Fallback if the specific product isn't found
                    include APP_ROOT . '/components/componentGroup/productDetail.component.php'; // Will use its own default
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        // Expose PHP products data to JavaScript for client-side filtering and detail loading
        window.globalProducts = <?php echo json_encode($products); ?>;
    </script>
    <script src="<?php echo htmlspecialchars($globalJs); ?>"></script>
    <script src="<?php echo htmlspecialchars($pageJsLocal); ?>"></script>
</body>
</html>