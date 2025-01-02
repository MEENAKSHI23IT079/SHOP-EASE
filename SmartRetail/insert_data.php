<?php
$servername = "localhost";
$username = "root"; // change this to your MySQL username
$password = ""; // change this to your MySQL password
$dbname = "snack_shop"; // name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert categories
$sql = "INSERT INTO categories (name) VALUES
    ('Chips'),
    ('Cookies'),
    ('Candy'),
    ('Juices'),
    ('Nuts')";

if ($conn->query($sql) === TRUE) {
    echo "Categories inserted successfully\n";
} else {
    echo "Error inserting categories: " . $conn->error . "\n";
}

// Insert products for each category
$sql = "INSERT INTO products (name, price, expiry_date, stock, category_id) VALUES
    ('Potato Chips', 2.50, '2025-02-01', 10, 1),
    ('Corn Chips', 3.00, '2025-03-01', 15, 1),
    ('Chocolate Cookies', 5.00, '2025-01-20', 8, 2),
    ('Gummy Bears', 1.50, '2025-06-01', 20, 3),
    ('Orange Juice', 2.00, '2025-01-15', 5, 4),
    ('Almonds', 3.50, '2025-02-01', 10, 5)";

if ($conn->query($sql) === TRUE) {
    echo "Products inserted successfully\n";
} else {
    echo "Error inserting products: " . $conn->error . "\n";
}

$conn->close();
?>
