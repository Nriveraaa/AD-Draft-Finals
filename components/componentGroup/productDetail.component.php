<?php
// AD-Draft-Finals/components/componentGroup/productDetail.component.php
// This component expects a $selectedProduct variable to be set.

if (!isset($selectedProduct)) {
    // Default placeholder if no product is explicitly selected
    $selectedProduct = [
        'id' => '',
        'name' => 'SELECT PRODUCT',
        'image' => '/assets/img/select_item.png', // Create a 'select an item' placeholder image
        'stock' => '---',
        'power_level' => '---',
        'description' => 'Click an item on the left to view its details.',
        'price' => '---',
        'stats_detail' => [
            'Crucible Gauntlet' => '---',
            'Rostelion I Exit' => '---',
            'Null Links' => '---'
        ]
    ];
}
?>
<div class="detail-content" data-product-id="<?php echo htmlspecialchars($selectedProduct['id']); ?>">
    <div class="detail-image-frame">
        <img src="<?php echo htmlspecialchars($selectedProduct['image']); ?>" alt="<?php echo htmlspecialchars($selectedProduct['name']); ?>" class="detail-image">
    </div>
    <h2 class="detail-name"><?php echo htmlspecialchars($selectedProduct['name']); ?></h2>
    <div class="detail-stats">
        <div class="stat-item">
            <span class="stat-label">STOCK</span>
            <span class="stat-value big-red" id="detail-stock"><?php echo htmlspecialchars($selectedProduct['stock']); ?></span>
            <div class="stock-bar">
                <?php
                // Simple visual stock bar (example, adjust logic as needed)
                $stockValue = is_numeric($selectedProduct['stock']) ? $selectedProduct['stock'] : 0;
                $maxStock = 100; // Assume max stock for visual representation
                $fillPercentage = ($stockValue / $maxStock) * 100;
                if ($fillPercentage > 100) $fillPercentage = 100;
                if ($fillPercentage < 0) $fillPercentage = 0;

                for ($i = 0; $i < 5; $i++) {
                    $barClass = '';
                    if ($fillPercentage > ($i * 20)) { // Each bar represents 20%
                        $barClass = 'filled';
                    }
                    echo "<span class='stock-bar-segment {$barClass}'></span>";
                }
                ?>
            </div>
        </div>
        <div class="stat-item">
            <span class="stat-label">POWER LEVEL</span>
            <span class="stat-value big-red" id="detail-power-level"><?php echo htmlspecialchars($selectedProduct['power_level']); ?></span>
        </div>
        <div class="additional-stats">
            <?php
            if (isset($selectedProduct['stats_detail']) && is_array($selectedProduct['stats_detail'])) {
                foreach ($selectedProduct['stats_detail'] as $label => $value) {
                    echo "<div class='stat-item-small'>";
                    echo "<span class='stat-label-small'>" . htmlspecialchars($label) . "</span>";
                    echo "<span class='stat-value-small'>" . htmlspecialchars($value) . "</span>";
                    echo "</div>";
                }
            } else {
                echo "<p class='detail-description' id='detail-description'>" . htmlspecialchars($selectedProduct['description']) . "</p>";
            }
            ?>
        </div>
    </div>
    <div class="detail-actions">
        <p class="detail-price-text">Price: <span class="detail-price-value" id="detail-price-value">$<?php echo htmlspecialchars(number_format((float)$selectedProduct['price'], 0)); ?></span></p>
        <?php if ($selectedProduct['id'] !== ''): // Only show button if an actual product is selected ?>
        <button class="add-to-cart-button" id="add-to-cart-btn" data-product-id="<?php echo htmlspecialchars($selectedProduct['id']); ?>">ADD TO CART</button>
        <?php endif; ?>
    </div>
</div>