<?php
function renderProductCard($product) {
  return "
    <div class='product-card' data-name=\"{$product['name']}\" data-price=\"{$product['price']}\">
      <img src='assets/img/{$product['image']}' alt='{$product['name']}' />
      <p>{$product['name']}</p>
      <span>\${$product['price']}</span>
    </div>
  ";
}
