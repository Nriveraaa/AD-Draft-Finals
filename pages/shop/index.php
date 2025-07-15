<?php 
require_once '../../layout/main.layout.php';
require_once '../../components/componentGroup/productCard.component.php';
require_once '../../staticDatas/products.staticdata.php';

$products = getProducts(); // from static data
?>

<link rel="stylesheet" href="assets/css/outlast.css">
<script src="assets/js/outlast.js" defer></script>

<div class="main-container">
  <header class="navbar">
    <h1 class="logo">OUTLAST</h1>
    <nav>
      <a href="#" class="active">HOME</a>
      <a href="#">SHOP</a>
      <a href="#">CATEGORIES</a>
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
      <img src="assets/img/smoke.webp" alt="Red Smoke">
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
