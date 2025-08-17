<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'model/masterdetail.php'; 

$dashboardLink = ($_SESSION['role'] ?? '') === 'admin' ? 'admindashboard' : 'dashboard';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Product Details</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="styles.css" rel="stylesheet">
    <style>
        @media screen and (max-width: 768px) {
            .layout-container { flex-direction: column; align-items: center; }
            .sidebar { display: none; }
            .main-content { width: 90%; margin: 0 auto; }
            .mobile-bottom-nav { display: block; }
        }
        @media screen and (min-width: 769px) {
            .layout-container { display: flex; gap: 20px; }
            .sidebar { width: 25%; display: block; margin-right: 20px; }
            .main-content { width: 75%; }
            .mobile-bottom-nav { display: none; }
        }
    </style>
</head>
<body class="bg-gray-100">


<div class="bg-lblue text-white p-4 rounded-lg shadow-lg m-8 flex justify-between items-center">
    <a class="flex items-center" href="admindashboard.php">
        <img src="public/assets/logo.png" alt="Logo Image" class="w-10 h-10 cursor-pointer">
    </a>
</div>


<div class="layout-container flex m-8">

    
    <div class="sidebar bg-lblue rounded-lg p-6 min-h-[80vh] shadow-lg flex flex-col justify-between">
        <div class="space-y-4">
            <a href="<?= $dashboardLink ?>" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Dashboard
            </a>
        </div>
    </div>

    
    <div class="main-content bg-white rounded-lg p-6 shadow-lg">
        <?php if ($product): ?>
            <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
                <h1 class="text-3xl font-bold text-[#6BC6E4] mb-4"><?= htmlspecialchars($product['name']) ?></h1>
                <img src="./<?= htmlspecialchars($product['image_url']) ?>" alt="Product Image" class="w-full h-80 object-cover rounded-lg mb-6">
                
                <p class="text-gray-700 text-lg mb-2"><strong>Description:</strong> <?= htmlspecialchars($product['description']) ?></p>
                <p class="text-gray-700 text-lg mb-2"><strong>Category:</strong> <?= htmlspecialchars($product['category']) ?></p>
                <p class="text-gray-700 text-lg mb-2"><strong>Price:</strong> <?= htmlspecialchars($product['price']) ?></p>
                <p class="text-gray-700 text-lg"><strong>Stock:</strong> <?= htmlspecialchars($product['stock_quantity']) ?> units</p>
            </div>
        <?php else: ?>
            <div class="text-center mt-10 text-red-500 text-xl">Product not found.</div>
        <?php endif; ?>
    </div>
</div>


<div class="mobile-bottom-nav fixed bottom-0 left-0 right-0 bg-lblue p-4 space-y-2 z-50">
    <a href="<?= $dashboardLink ?>" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
        Dashboard
    </a>
</div>

</body>
</html>