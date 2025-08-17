<?php
session_start();
require __DIR__ . '/../config/database.php';

if (!isset($_SESSION['user_id'])) {
    die("Please log in to add items to your cart.");
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

try {
    $pdo->beginTransaction();

    
    $stmt = $pdo->prepare("SELECT cart_id FROM cart WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $cart = $stmt->fetch();

    if (!$cart) {
        
        $stmt = $pdo->prepare("INSERT INTO cart (user_id) VALUES (?)");
        $stmt->execute([$user_id]);
        $cart_id = $pdo->lastInsertId();
    } else {
        $cart_id = $cart['cart_id'];
    }

    
    $stmt = $pdo->prepare("SELECT cart_items_id, quantity FROM cart_items WHERE cart_id = ? AND product_id = ?");
    $stmt->execute([$cart_id, $product_id]);
    $item = $stmt->fetch();

    if ($item) {
        
        $new_quantity = $item['quantity'] + 1;
        $stmt = $pdo->prepare("UPDATE cart_items SET quantity = ? WHERE cart_items_id = ?");
        $stmt->execute([$new_quantity, $item['cart_items_id']]);
    } else {
        
        $stmt = $pdo->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, 1)");
        $stmt->execute([$cart_id, $product_id]);
    }

    $pdo->commit();

    
    header("Location: ../cart");
    exit;

} catch (PDOException $e) {
    $pdo->rollBack();
    die("Error adding to cart: " . $e->getMessage());
}
?>
