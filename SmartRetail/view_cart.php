<?php
include 'db_connect.php'; // Include the database connection file

// Query to fetch all the cart items from the database
$sql = "SELECT * FROM cart";
$result = $conn->query($sql); // Execute the query

$total_price = 0; // Variable to calculate the total price
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        h2 {
            color: #0d47a1;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .cart-table-container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1000px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #2196f3;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #1976d2;
            color: white;
            font-size: 1.1rem;
        }

        td {
            background-color: #e3f2fd;
            font-size: 1rem;
        }

        tr:nth-child(even) td {
            background-color: #bbdefb;
        }

        tr:hover td {
            background-color: #90caf9;
        }

        .total-price {
            text-align: right;
            font-weight: bold;
            font-size: 1.2rem;
            color: #0d47a1;
            margin-top: 20px;
        }

        .product-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .product-icon:hover {
            transform: scale(1.2);
        }

        .back-button {
            display: block;
            width: 220px;
            margin: 30px auto 0;
            padding: 12px;
            background-color: #1976d2;
            color: white;
            text-align: center;
            border-radius: 6px;
            text-decoration: none;
            font-size: 1rem;
        }

        .back-button:hover {
            background-color: #1565c0;
        }

        .no-items {
            text-align: center;
            color: #1976d2;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

<div class="cart-table-container">
    <h2>Cart Items</h2>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): 
                    $total_price += $row['price'] * $row['quantity'];

                    // Determine product icon
                   
                                   ?>
                    <tr>
                                                <td><?php echo $row['customer_name']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo '$' . number_format($row['price'], 2); ?></td>
                        <td><?php echo $row['expiry_date']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="total-price">
            Total Price: $<?php echo number_format($total_price, 2); ?>
        </div>
    <?php else: ?>
        <p class="no-items">No items in the cart.</p>
    <?php endif; ?>

    <a href="add_to_cart.php" class="back-button">Back to Add Products</a>
</div>

</body>
</html>
