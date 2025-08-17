<?php
session_start();
require_once '../config/database.php';

$user_id = $_SESSION['user_id'] ?? 1; 


$stmt = $pdo->prepare("SELECT * FROM cart WHERE user_id = ?");
$stmt->execute([$user_id]);
$cart = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$cart) {
    die("No cart found.");
}

$cart_id = $cart['cart_id'];


$stmt = $pdo->prepare("SELECT * FROM cart_items WHERE cart_id = ?");
$stmt->execute([$cart_id]);
$cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($cart_items)) {
    die("Cart is empty.");
}


$total = 0;
foreach ($cart_items as $item) {
    $stmt = $pdo->prepare("SELECT price FROM product WHERE product_id = ?");
    $stmt->execute([$item['product_id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $total += $product['price'] * $item['quantity'];
}


$stmt = $pdo->prepare("INSERT INTO orders (user_id, total_amount, status, order_date) VALUES (?, ?, ?, NOW())");
$stmt->execute([$user_id, $total, 'Pending']);
$order_id = $pdo->lastInsertId();


foreach ($cart_items as $item) {
    $stmt = $pdo->prepare("SELECT price FROM product WHERE product_id = ?");
    $stmt->execute([$item['product_id']]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $price = $product['price'];

    $stmt = $pdo->prepare("INSERT INTO order_item (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    $stmt->execute([$order_id, $item['product_id'], $item['quantity'], $price]);
}


$stmt = $pdo->prepare("INSERT INTO payment (order_id, payment_method, payment_status, payment_date) VALUES (?, ?, ?, NOW())");
$stmt->execute([$order_id, 'PayHere', 'Success']);


$pdo->prepare("DELETE FROM cart_items WHERE cart_id = ?")->execute([$cart_id]);


header("Location: ../view/checkout_success.php");
exit;
