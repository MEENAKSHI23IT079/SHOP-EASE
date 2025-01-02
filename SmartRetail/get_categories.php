<?php
header('Content-Type: application/json');
$pdo = new PDO('mysql:host=localhost;dbname=your_db', 'username', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $pdo->query("SELECT * FROM categories");
$categories = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($categories);
?>
