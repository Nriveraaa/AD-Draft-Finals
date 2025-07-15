<?php
function renderProductCard($product) {
  return "
    <div class='product-card'>
      <img src='assets/img/{$product['image']}' alt='{$product['name']}' />
      <p>{$product['name']}</p>
      <span>\${$product['price']}</span>
    </div>
  ";
}
