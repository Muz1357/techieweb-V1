<?php
session_start();
require __DIR__ . '/../config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../cart");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart_items_id = $_POST['cart_items_id'] ?? null;
    $action = $_POST['action'] ?? null;
    $redirect = $_POST['redirect'] ?? '../cart';

    if ($cart_items_id && in_array($action, ['increase', 'decrease'])) {
        
        $stmt = $pdo->prepare("SELECT quantity FROM cart_items WHERE cart_items_id = ?");
        $stmt->execute([$cart_items_id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item) {
            $quantity = (int)$item['quantity'];

            if ($action === 'increase') {
                $quantity++;
            } elseif ($action === 'decrease') {
                $quantity = max(1, $quantity - 1);
            }

            
            $stmt = $pdo->prepare("UPDATE cart_items SET quantity = ? WHERE cart_items_id = ?");
            $stmt->execute([$quantity, $cart_items_id]);
        }
    }

    header("Location: $redirect");
    exit;
}
