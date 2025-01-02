<?php
$servername = "localhost"; // Database server address
$username = "root"; // Database username (update it to your username)
$password = ""; // Database password (update it to your password)
$dbname = "shopping_cart"; // Database name (update it to your actual database name)

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
