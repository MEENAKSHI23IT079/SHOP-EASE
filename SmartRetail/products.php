<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = ""; // Default password for XAMPP
$dbname = "vending_machine"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch products
$sql = "SELECT product_name, price, expiry_date, quantity FROM products";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Display the products in a table
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product List</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                padding: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
                background-color: #fff;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            th, td {
                padding: 12px;
                text-align: left;
                border: 1px solid #ddd;
            }

            th {
                background-color: #007BFF; /* Changed to blue */
                color: white;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            tr:hover {
                background-color: #ddd;
            }

            h1 {
                text-align: center;
                color: #333;
            }
        </style>
    </head>
    <body>

        <h1>Product Details</h1>

        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Expiry Date</th>
                <th>Quantity</th>
            </tr>';

    // Loop through and display each product
    while($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['product_name'] . '</td>
                <td>' . $row['price'] . '</td>
                <td>' . $row['expiry_date'] . '</td>
                <td>' . $row['quantity'] . '</td>
              </tr>';
    }

    echo '</table>
    </body>
    </html>';

} else {
    echo "No products found.";
}

// Close connection
$conn->close();
?>
