<?php
// AD-Draft-Finals/components/componentGroup/productCard.component.php
// Requires $product variable to be set (e.g., from shop/index.php loop)

if (!isset($product)) {
    $product = [
        'id' => 'default',
        'name' => 'Unknown Item',
        'image' => '/assets/img/placeholder.png', // Fallback placeholder
        'price' => '0',
        'category' => 'misc',
        'stock' => 0,
        'description' => 'No description available.',
        'power_level' => 0
    ];
}
?>
<div class="product-card" data-product-id="<?php echo htmlspecialchars($product['id']); ?>" data-category="<?php echo htmlspecialchars($product['category']); ?>">
    <div class="card-frame">
        <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
        <div class="product-info">
            <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
            <p class="product-price">$<?php echo htmlspecialchars(number_format($product['price'], 0)); ?></p> </div>
    </div>
</div>