<?php
// AD-Draft-Finals/layout/main.layout.php

// Assumes $pageTitle and $content are set by the page being rendered
if (!isset($pageTitle)) {
    $pageTitle = "AD-Draft-Finals Shop";
}
if (!isset($content)) {
    $content = "<p>No content to display.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <?php if (isset($pageCss)): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($pageCss); ?>">
    <?php endif; ?>
    <link rel="icon" href="/assets/img/outlast_favicon.png" type="image/png"> </head>
<body class="dark-theme">
    <header class="app-header">
        <div class="logo">OUTLAST</div>
        <nav class="main-nav">
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="/shop">SHOP</a></li>
                <li><a href="/categories">CATEGORIES</a></li>
                </ul>
        </nav>
        <div class="utility-icons">
            <a href="#" class="icon-link"><i class="icon-search"></i></a>
            <a href="#" class="icon-link"><i class="icon-cart"></i><span class="cart-count">0</span></a>
            <a href="#" class="icon-link"><i class="icon-user"></i></a>
        </div>
    </header>

    <main class="page-content">
        <?php echo $content; // This is where page-specific content will be injected ?>
    </main>

    <footer class="app-footer">
        <div class="footer-logo">OUTLAST</div>
        <p>&copy; <?php echo date("Y"); ?> AD-Draft-Finals. All Rights Reserved.</p>
        <div class="footer-links">
            <a href="/privacy">Privacy Policy</a> |
            <a href="/terms">Terms of Service</a>
        </div>
    </footer>

    <script src="/assets/js/script.js"></script>
    <?php if (isset($pageJs)): ?>
        <script src="<?php echo htmlspecialchars($pageJs); ?>"></script>
    <?php endif; ?>
</body>
</html>