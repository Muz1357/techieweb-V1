<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../config/database.php';


$user_id = $_SESSION['user_id'] ?? 1; 


$sql = "SELECT cart_id FROM cart WHERE user_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$cart = $stmt->fetch(PDO::FETCH_ASSOC);

$cart_id = $cart['cart_id'] ?? null;

$cart_items = [];
$subtotal = 0;

if ($cart_id) {
    
    $sql = "SELECT 
                ci.cart_items_id, 
                ci.quantity, 
                p.name, 
                p.price,
                p.image_url AS image_url
            FROM cart_items ci
            JOIN product p ON ci.product_id = p.product_id
            WHERE ci.cart_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$cart_id]);
    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
    foreach ($cart_items as $item) {
        $subtotal += $item['price'] * $item['quantity'];
    }
}

$tax = round($subtotal * 0.10, 2); 
$total = $subtotal + $tax;
?>
