<?php
// AD-Draft-Finals/staticData/products.staticdata.php

$products = [
    // Apparel Category (based on your image, using placeholder names)
    [
        'id' => 'app001',
        'name' => 'Ordruct',
        'description' => 'Advanced tactical vest for enhanced protection and mobility.',
        'category' => 'apparel',
        'price' => 190, // Zombie crystals
        'image' => '/assets/img/apparel/ordruct_vest.png', // Create this image path
        'stock' => 85,
        'power_level' => 50
    ],
    [
        'id' => 'app002',
        'name' => 'Droduce',
        'description' => 'Lightweight combat shirt, optimized for agility and breathability.',
        'category' => 'apparel',
        'price' => 190,
        'image' => '/assets/img/apparel/droduce_shirt.png',
        'stock' => 120,
        'power_level' => 30
    ],
    [
        'id' => 'app003',
        'name' => 'Name Name', // Placeholder from your image
        'description' => 'Heavy-duty armored vest for maximum damage resistance.',
        'category' => 'apparel',
        'price' => 390,
        'image' => '/assets/img/apparel/namename_armor.png',
        'stock' => 60,
        'power_level' => 80
    ],
    [
        'id' => 'app004',
        'name' => 'Apparel', // Placeholder from your image
        'description' => 'Standard issue combat uniform, balanced for protection and movement.',
        'category' => 'apparel',
        'price' => 190,
        'image' => '/assets/img/apparel/apparel_uniform.png',
        'stock' => 95,
        'power_level' => 40
    ],
    [
        'id' => 'app005',
        'name' => 'Weapons', // Placeholder from your image (assuming this is an apparel item, like a jacket)
        'description' => 'Reinforced leather jacket, provides moderate protection from elements.',
        'category' => 'apparel',
        'price' => 190,
        'image' => '/assets/img/apparel/weapons_jacket.png',
        'stock' => 70,
        'power_level' => 35
    ],
    [
        'id' => 'app006',
        'name' => 'Pirupone', // Placeholder from your image
        'description' => 'Specialized stealth suit, designed for covert operations.',
        'category' => 'apparel',
        'price' => 290,
        'image' => '/assets/img/apparel/pirupone_suit.png',
        'stock' => 45,
        'power_level' => 65
    ],

    // Example for a selected product in the detail view (from your image)
    [
        'id' => 'prod001', // Example ID for the product in the detail view
        'name' => 'Product X', // Placeholder name for the product in detail view
        'description' => 'A highly advanced piece of equipment designed for extreme environments. Optimized for durability and sustained performance. Essential for prolonged expeditions.',
        'category' => 'misc', // Or specific category if known
        'price' => 195, // Zombie crystals
        'image' => '/assets/img/detail_product_x.png', // Create this image path (the red glowing item)
        'stock' => 6, // Example stock
        'power_level' => 135, // Example power level
        'stats_detail' => [ // Additional stats as seen in the image
            'Crucible Gauntlet' => 'Santiauns',
            'Rostelion I Exit' => 'Philitium',
            'Null Links' => 'Pose Platinum'
        ]
    ],
    // Add more products as needed, following the categories from your roadmap (Weapons, Medical, Tools, Sustenance, Bundle)
    // For example:
    // [
    //     'id' => 'wpn001',
    //     'name' => 'Baseball Bat',
    //     'description' => 'Sturdy blunt weapon effective for close combat and self-defense',
    //     'category' => 'weapons',
    //     'price' => 10,
    //     'image' => '/assets/img/weapons/baseball_bat.png',
    //     'stock' => 100,
    //     'power_level' => 30
    // ],
];

// Helper function to get product by ID
if (!function_exists('getProductById')) {
    function getProductById($id, $productsArray) {
        foreach ($productsArray as $product) {
            if ($product['id'] === $id) {
                return $product;
            }
        }
        return null; // Product not found
    }
}
?>