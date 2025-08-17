<?php

// router.php
session_start();

$url = $_GET['url'] ?? 'landing';
$url = rtrim($url, '/');

$routes = [
    
    'dashboard' => ['view/dashboard.php', 'buyer'],
    'cart' => ['view/cart.php', 'buyer'],
    'settings' => ['view/settings.php', 'buyer'],
    'checkout_success' => ['view/checkout_success.php', 'buyer'],

    
    'admindashboard' => ['view/admindashboard.php', 'admin'],
    'Customers' => ['view/customers.php', 'admin'],
    'Addproducts' => ['view/Addproducts.php', 'admin'],
    'Edit' => ['view/Edit.php', 'admin'],
    'Orders' => ['view/Orders.php', 'admin'],

    
    'masterdetail' => ['view/masterdetail.php', 'both'],

    
    'login' => ['view/login.php', 'guest'],
    'register' => ['view/register.php', 'guest'],
    'landing' => ['view/landing.php', 'guest'],
];


if (!array_key_exists($url, $routes)) {
    http_response_code(404);
    echo "404 - Page not found.";
    exit;
}

$page = $routes[$url];
$file = $page[0];
$required_role = $page[1];


$user_role = $_SESSION['role'] ?? 'guest';

$allowed = $required_role === 'guest' ||
          $required_role === $user_role ||
          ($required_role === 'both' && in_array($user_role, ['buyer', 'admin']));

if ($allowed) {
    include $file;
} else {
    http_response_code(403);
    echo "403 - Forbidden: You don't have access to this page.";
    exit;
}
