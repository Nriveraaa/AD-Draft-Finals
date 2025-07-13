// AD-Draft-Finals/pages/shop/assets/js/script.js

document.addEventListener('DOMContentLoaded', () => {
    console.log('Shop page script.js loaded.');

    const productCards = document.querySelectorAll('.product-card');
    const detailPanel = document.querySelector('.product-detail-panel');
    const detailPanelHeader = document.getElementById('detail-panel-header');

    // Store the initial HTML of the detail panel for resetting
    const initialDetailHtml = detailPanel.innerHTML;

    // Function to update the detail panel with product data
    function updateProductDetailPanel(product) {
        if (!product) {
            // Reset to initial state if no product is provided
            detailPanelHeader.textContent = "PRODUCT VIEW";
            detailPanel.innerHTML = initialDetailHtml;
            return;
        }

        detailPanelHeader.textContent = "PRODUCT VIEW"; // Keep consistent header as per image
        const priceDisplay = product.price !== '---' ? `$${product.price}` : '---';

        let additionalStatsHtml = '';
        if (product.stats_detail && Object.keys(product.stats_detail).length > 0) {
            for (const label in product.stats_detail) {
                additionalStatsHtml += `
                    <div class='stat-item-small'>
                        <span class='stat-label-small'>${label}</span>
                        <span class='stat-value-small'>${product.stats_detail[label]}</span>
                    </div>
                `;
            }
        } else {
            additionalStatsHtml = `<p class='detail-description' id='detail-description'>${product.description}</p>`;
        }

        // Generate stock bar segments
        let stockBarHtml = '';
        const stockValue = isNaN(product.stock) ? 0 : parseInt(product.stock);
        const maxStock = 100; // Assuming 100 is max stock for visual bar
        const fillPercentage = (stockValue / maxStock) * 100;

        for (let i = 0; i < 5; i++) {
            const barClass = (fillPercentage > (i * 20)) ? 'filled' : '';
            stockBarHtml += `<span class='stock-bar-segment ${barClass}'></span>`;
        }


        const detailContent = `
            <div class="detail-image-frame">
                <img src="${product.image}" alt="${product.name}" class="detail-image">
            </div>
            <h2 class="detail-name">${product.name}</h2>
            <div class="detail-stats">
                <div class="stat-item">
                    <span class="stat-label">STOCK</span>
                    <span class="stat-value big-red" id="detail-stock">${product.stock}</span>
                    <div class="stock-bar">${stockBarHtml}</div>
                </div>
                <div class="stat-item">
                    <span class="stat-label">POWER LEVEL</span>
                    <span class="stat-value big-red" id="detail-power-level">${product.power_level}</span>
                </div>
                <div class="additional-stats">
                    ${additionalStatsHtml}
                </div>
            </div>
            <div class="detail-actions">
                <p class="detail-price-text">Price: <span class="detail-price-value" id="detail-price-value">${priceDisplay}</span></p>
                <button class="add-to-cart-button" id="add-to-cart-btn" data-product-id="${product.id}">ADD TO CART</button>
            </div>
        `;
        detailPanel.innerHTML = detailContent;
    }

    // Event listener for product card clicks
    productCards.forEach(card => {
        card.addEventListener('click', () => {
            const productId = card.dataset.productId;
            console.log(`Product clicked: ${productId}`);
            fetchProductDetails(productId);
        });
    });

    // Event listener for category tabs
    const tabButtons = document.querySelectorAll('.tab-button');
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            tabButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            const category = button.dataset.category;
            console.log(`Category selected: ${category}`);
            filterProducts(category);
        });
    });

    // Event listener for Add to Cart button (delegation for dynamically added buttons)
    detailPanel.addEventListener('click', (event) => {
        if (event.target.id === 'add-to-cart-btn') {
            const productId = event.target.dataset.productId;
            console.log(`Add to Cart clicked for product: ${productId}`);
            // In a real app, send AJAX request to add item to cart
            // Example AJAX call:
            // fetch('/handlers/shop.handler.php', {
            //     method: 'POST',
            //     headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            //     body: `action=addToCart&productId=${productId}&quantity=1`
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         alert(data.message);
            //         // Update cart count in header if data.cartCount is provided
            //         const cartCountElement = document.querySelector('.cart-count');
            //         if (cartCountElement && data.currentCartCount !== undefined) {
            //             cartCountElement.textContent = data.currentCartCount;
            //         }
            //     } else {
            //         alert('Error: ' + data.message);
            //     }
            // })
            // .catch(error => console.error('Error adding to cart:', error));

            alert(`"${productId}" added to cart! (Simulated)`);
        }
    });


    // --- Helper Functions (Simulated Data Fetch/Filter using globalProducts) ---

    // This function fetches product details from the globalProducts array.
    function fetchProductDetails(productId) {
        const productsData = window.globalProducts || [];
        const product = productsData.find(p => p.id === productId);
        updateProductDetailPanel(product);
    }

    // This function filters products displayed in the grid.
    function filterProducts(category) {
        const products = document.querySelectorAll('.product-card');
        products.forEach(product => {
            if (category === 'all' || product.dataset.category === category) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
        // Reset or update detail panel after filtering
        updateProductDetailPanel(null); // Clear detail panel
    }

    // --- Initial Load ---
    // Simulate initial click on the first product in the Apparel category
    const initialProduct = window.globalProducts.find(p => p.category === 'apparel');
    if (initialProduct) {
        updateProductDetailPanel(initialProduct);
    } else {
        updateProductDetailPanel(null); // Show default "Select Product" view
    }
});