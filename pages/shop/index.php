<?php
require_once APP_ROOT . '/layout/main.layout.php';
require_once APP_ROOT . '/components/componentGroup/productCard.component.php';
require_once APP_ROOT . '/staticData/products.staticdata.php';

$products = getProducts();
?>

<link rel="stylesheet" href="/AD-Draft-Finals/pages/shop/assets/css/outlast.css">
<script src="/AD-Draft-Finals/pages/shop/assets/js/outlast.js" defer></script>

<div class="main-container">
  <header class="navbar">
    <h1 class="logo">OUTLAST</h1>
    <nav>
      <a href="/" class="">HOME</a>
      <a href="/shop" class="active">SHOP</a>
    </nav>
    <div class="icons">🔍 🛒 👤</div>
  </header>

  <div class="product-view">
    <div class="products-grid">
      <?php foreach ($products as $product): ?>
        <?= renderProductCard($product); ?>
      <?php endforeach; ?>
    </div>

    <div class="product-detail">
      <img src="/pages/shop/assets/img/smoke.webp" alt="Red Smoke">
      <h2>STOCK <span>$195</span></h2>
      <p>POWER LEVEL:</p>
      <ul>
        <li>Crusader Gaiden: 120</li>
        <li>Plutonium: 118</li>
      </ul>
      <button>Add to Cart</button>
    </div>
  </div>
</div>

</body>
</html>
