<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Create connection to the database
$conn = new mysqli('localhost', 'root', '', 'snack_shop'); // Replace 'snack_shop' with your actual database name

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch products from the database
$sql = "SELECT * FROM products"; // Replace 'products' with your actual table name
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch all the rows and store them in an array
    $products = array();
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Return the data as JSON
    echo json_encode($products);
} else {
    echo json_encode([]); // Return an empty array if no products are found
}

$conn->close(); // Close the connection
?>