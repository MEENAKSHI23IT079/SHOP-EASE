<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $expiry_date = $_POST['expiry_date'];

    $sql = "INSERT INTO cart (customer_name, product_name, product_id, quantity, price, expiry_date)
            VALUES ('$customer_name', '$product_name', '$product_id', '$quantity', '$price', '$expiry_date')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to view_cart.php after success
        header("Location: view_cart.php");
        exit();  // Make sure no further code is executed after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            color: #0d47a1; /* Dark blue */
            text-align: center;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #0d47a1; /* Dark blue border */
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container label {
            font-weight: bold;
            display: block;
            margin: 5px 0;
            color: #0d47a1; /* Dark blue label text */
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #0d47a1; /* Dark blue button */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #01579b; /* Slightly darker blue on hover */
        }

        .form-container p {
            text-align: center;
            color: #0d47a1; /* Dark blue confirmation text */
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Add Product to Cart</h2>
        <form method="post" action="">
            <label for="customer_name">Customer Name:</label>
            <input type="text" name="customer_name" id="customer_name" required><br>

            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name" required><br>

            <label for="product_id">Product ID:</label>
            <input type="number" name="product_id" id="product_id" required><br>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" required><br>

            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required><br>

            <label for="expiry_date">Expiry Date:</label>
            <input type="date" name="expiry_date" id="expiry_date" required><br>

            <button type="submit">Add to Cart</button>
        </form>
    </div>

</body>
</html>
