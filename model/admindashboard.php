<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config/database.php'; 


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: /login?error=unauthorized");
    exit();
}


$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM product WHERE user_id = ?");
$stmt->execute([$user_id]);
$products = $stmt->fetchAll();


$account_image_url = $_SESSION['account_image_url'] ?? 'public/assets/default-user.png';
?>
