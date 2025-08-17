<?php
require_once 'config/database.php';  

try {
    
    $stmt = $pdo->query("SELECT product_id, name, image_url FROM product");
    $products = $stmt->fetchAll();
} catch (Exception $e) {
    echo "Error loading products: " . $e->getMessage();
    $products = [];
}
?>