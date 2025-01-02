<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2>Your cart is empty.</h2>";
} else {
    echo "<h2>Your Cart</h2>";
    echo "<table border='1'>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>";

    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $item_total = $item['price'] * $item['quantity'];
        $total += $item_total;

        echo "<tr>
                <td>{$item['product_name']}</td>
                <td>\${$item['price']}</td>
                <td>{$item['quantity']}</td>
                <td>\${$item_total}</td>
              </tr>";
    }

    echo "<tr>
            <td colspan='3'>Total</td>
            <td>\${$total}</td>
          </tr>";
    echo "</table>";
}
?>
