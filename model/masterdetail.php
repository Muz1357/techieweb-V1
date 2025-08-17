<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require 'config/database.php'; 

$product = null;

if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    $stmt = $pdo->prepare("SELECT * FROM product WHERE product_id = ?");
    $stmt->execute([$product_id]);

    $product = $stmt->fetch();
}
?>
