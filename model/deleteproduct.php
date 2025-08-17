<?php
session_start();
require_once '../config/database.php';


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: /login?error=unauthorized");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];

    
    $stmt = $pdo->prepare("DELETE FROM product WHERE product_id = ? AND user_id = ?");
    $stmt->execute([$product_id, $user_id]);

    header("Location: ../admindashboard");
    exit();
}
?>
