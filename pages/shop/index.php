<?php
// AD-Draft-Finals/pages/shop/index.php

// Set page-specific variables for the layout
$pageTitle = "Outlast Shop - Products";
$pageCss = "/pages/shop/assets/css/style.css";
$pageJs = "/pages/shop/assets/js/script.js";

// Start capturing content for the main layout
ob_start();
?>

<div class="shop-container">
    <div class="shop-header-title">SHOP</div>
    <div class="shop-grid-wrapper">
        <div class="product-grid-panel">
            <div class="panel-header">PRODUCT VIEW</div> <div class="product-grid">
                <?php
                // Filter products to show only 'apparel' initially, as per your image
                $initialProducts = array_filter($products, function($p) {
                    return $p['category'] === 'apparel';
                });

                if (!empty($initialProducts)) {
                    foreach ($initialProducts as $product) {
                        // UPDATED PATH HERE:
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
            <div class="panel-header" id="detail-panel-header">PRODUCT VIEW</div> <?php
            // For initial load, display the specific product from your image
            $defaultDetailProduct = getProductById('prod001', $products); // Using the ID for the example product in your image
            if ($defaultDetailProduct) {
                // Temporarily set $selectedProduct for productDetail.component.php
                $selectedProduct = $defaultDetailProduct;
                // UPDATED PATH HERE:
                include APP_ROOT . '/components/componentGroup/productDetail.component.php';
            } else {
                // Fallback if the specific product isn't found
                // UPDATED PATH HERE:
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

<?php
$content = ob_get_clean(); // Get the buffered content
include APP_ROOT . '/layout/main.layout.php'; // Include the main layout
?>