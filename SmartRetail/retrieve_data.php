<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "snack_shop"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT products.name AS product_name, products.price, products.expiry_date, products.stock, categories.name AS category_name 
        FROM products 
        JOIN categories ON products.category_id = categories.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        echo "Product: " . $row['product_name'] . " | Price: $" . $row['price'] . " | Expiry: " . $row['expiry_date'] . " | Stock: " . $row['stock'] . " | Category: " . $row['category_name'] . "<br>";
    }
} else {
    echo "No data found";
}

$conn->close();
?>
