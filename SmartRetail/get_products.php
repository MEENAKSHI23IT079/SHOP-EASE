<?php
header('Content-Type: application/json');

// Sample product data
$products = [
    [
        "name" => "Chips",
        "price" => 10,
        "expiry_date" => "2025-01-15",
        "stock" => 50,
        "category_id" => 1
    ],
    [
        "name" => "Cookies",
        "price" => 15,
        "expiry_date" => "2025-02-01",
        "stock" => 30,
        "category_id" => 2
    ]
];

echo json_encode($products);
?>
