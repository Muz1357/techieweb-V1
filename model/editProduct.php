<?php
require_once 'config/database.php';  


if (!isset($_GET['product_id']) || empty($_GET['product_id'])) {
    echo 'No product ID specified.';
    exit;
}

$product_id = intval($_GET['product_id']);


$stmt = $pdo->prepare('SELECT product_id, name, description, price, image_url, category FROM product WHERE product_id = ?');
$stmt->execute([$product_id]);
$product = $stmt->fetch();

if (!$product) {
    echo 'Product not found.';
    exit;
}


?>
