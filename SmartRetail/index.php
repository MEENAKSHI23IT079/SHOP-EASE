<?php
// Include database connection
include 'db.php';  // Ensure this is the correct path to your db.php file

// Fetch products from the database (optional, based on your database setup)
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// If the query returns results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    $products = [];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
  <h1>Shopping Cart</h1>
  <div class="products">
    <?php foreach ($products as $product) { ?>
      <div class="product">
        <img src="<?= $product['image']; ?>" alt="<?= $product['name']; ?>">
        <h3><?= $product['name']; ?></h3>
        <p>Price: $<?= $product['price']; ?></p>
        <button onclick="addToCart(<?= $product['id']; ?>)">Add to Cart</button>
      </div>
    <?php } ?>
  </div>
  <div id="cart"></div>
  <button onclick="window.location.href='checkout.php'">Proceed to Checkout</button>
</div>

<script src="scripts.js"></script>
</body>
</html>
