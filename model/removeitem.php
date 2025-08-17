<?php

require_once '../config/database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $cart_items_id = $_POST['cart_items_id'];

    $stmt = $pdo->prepare('DELETE FROM cart_items WHERE cart_items_id = ?');
    $stmt->execute([$cart_items_id]);

    header('Location: ../cart');
}