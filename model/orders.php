<?php
require_once __DIR__ . '/../config/database.php';

$stmt = $pdo->prepare("
    SELECT 
        o.order_id,
        o.user_id,
        o.order_date,
        o.status,
        o.total_amount,
        u.full_name AS customer_name,
        p.payment_method,
        p.payment_status,
        p.payment_date
    FROM orders o
    JOIN user_profile u ON o.user_id = u.user_id
    LEFT JOIN payment p ON o.order_id = p.order_id
    ORDER BY o.order_date DESC
");

$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
