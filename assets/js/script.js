// AD-Draft-Finals/assets/js/script.js

document.addEventListener('DOMContentLoaded', () => {
    console.log('Global script.js loaded.');

    // Example: Add active class to current nav item
    const currentPath = window.location.pathname.replace(/\/$/, ''); // Remove trailing slash
    const navLinks = document.querySelectorAll('.main-nav a');

    navLinks.forEach(link => {
        const linkPath = link.getAttribute('href').replace(/\/$/, ''); // Remove trailing slash
        if (linkPath === currentPath ||
            (linkPath === '/shop' && currentPath.startsWith('/shop')) || // Handles /shop and /shop/productID
            (linkPath === '/' && currentPath === '') // Handles root path
        ) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });

    // Basic mobile menu toggle (if using hamburger menu)
    const mobileMenuButton = document.querySelector('.mobile-menu-button'); // Assuming you'll add this
    const mobileNav = document.querySelector('.mobile-nav'); // Assuming you'll add this

    if (mobileMenuButton && mobileNav) {
        mobileMenuButton.addEventListener('click', () => {
            mobileNav.classList.toggle('open');
        });
    }
});