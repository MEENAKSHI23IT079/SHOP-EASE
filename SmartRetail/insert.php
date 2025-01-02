<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory1"; // Your database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form data is posted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $expiry_date = mysqli_real_escape_string($conn, $_POST['expiry_date']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    // Prepare the SQL query to insert data
    $sql = "INSERT INTO products (product_name, price, expiry_date, quantity) 
            VALUES ('$product_name', '$price', '$expiry_date', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        echo "Stock updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product Stock</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .form-section {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .update-btn {
            width: 100%;
            background: #28a745;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .update-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Product Stock</h1>
        <form action="" method="post">
            <div class="form-section">
                <div class="form-group">
                    <label for="product-name">Product Name</label>
                    <select id="product-name" name="product_name" required>
                        <option value="" disabled selected>Select a product</option>
                        <option value="Cadbury">Cadbury</option>
                        <option value="Britannia Good Day">Britannia Good Day</option>
                        <option value="Miranda">Miranda</option>
                        <option value="Sprite">Sprite</option>
                        <option value="Lays">Lays</option>
                        <option value="Kurkure">Kurkure</option>
                        <option value="Parle-G">Parle-G</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" required placeholder="Enter Price">
                </div>

                <div class="form-group">
                    <label for="expiry-date">Expiry Date</label>
                    <input type="date" id="expiry-date" name="expiry_date" required>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" required placeholder="Enter Quantity">
                </div>

                <div class="form-group">
                    <button type="submit" class="update-btn">Update Stock</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
