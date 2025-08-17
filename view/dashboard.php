<?php 
include 'model/dashboard.php';
include 'model/userprofile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="styles.css" rel="stylesheet">
    <style>
        
        @media screen and (max-width: 768px) {
            .layout-container {
                flex-direction: column;
            }
            .app-bar {
                flex-direction: row;
                justify-content: space-between; 
                align-items: center;
            }
            .app-bar .flex.items-center {
                justify-content: flex-end; 
            }
            .product-container {
                grid-template-columns: 1fr;
            }
            .mobile-bottom-nav {
                display: block;
            }
            .sidebar {
                display: none;
            }
        }

        
        @media screen and (min-width: 769px) {
            .layout-container {
                display: flex;
                gap: 20px;
            }
            .sidebar {
                width: 25%;
                display: block;
                margin-right: 20px;
            }
            .main-content {
                width: 75%;
            }
            .mobile-bottom-nav {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100">

    
    <div class="bg-lblue text-white p-4 rounded-lg shadow-lg m-8 flex justify-between items-center app-bar">
        <a class="flex items-center">
            <img src="public/assets/logo.png" alt="Logo Image" class="w-10 h-10 cursor-pointer">
        </a>

        <div class="flex items-center space-x-4">
            <a href="cart" class="flex items-center bg-white" style="border-radius: 100px;">
                <img src="public/assets/image3.png" alt="Cart" class="w-10 h-10 cursor-pointer">
            </a>
            <a href="settings" class="flex items-center bg-white" style="border-radius: 100px;">
                <img src="<?php echo $account_image_url; ?>" alt="Account Image" class="w-10 h-10 cursor-pointer">
            </a>
        </div>
    </div>

   
    <div class="layout-container mx-8 mb-8">

        
        <div class="sidebar bg-lblue rounded-lg p-6 min-h-[80vh] shadow-lg flex flex-col justify-between">
            <div class="space-y-4">
                <a href="dashboard" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                    <span>Dashboard</span>
                </a>
                <a href="settings" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                    <span>Settings</span>
                </a>
                <a href="model/logout.php" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2  border-white">
                    Log Out
                </a>
            </div>
        </div>

        
        <div class="main-content bg-white rounded-lg p-6 shadow-lg w-full">
            <h2 class="text-3xl font-bold mb-6">Products</h2>

            <div class="product-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <?php foreach ($products as $product): ?>
                    <div class="product-box">
                        <div class="border-2 border-lblue rounded-lg p-4 bg-white shadow-md flex flex-col items-center" style="border-radius: 70px; width: 250px;">
                            <a href="masterdetail?product_id=<?= htmlspecialchars($product['product_id']) ?>">
                                <img src="./<?= htmlspecialchars($product['image_url']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-32 h-32 object-cover mb-4 cursor-pointer">
                            </a>
                            <h3 class="text-xl font-semibold mb-4 text-center"><?= htmlspecialchars($product['name']) ?></h3>
                        </div><br>
                       <form method="POST" action="model/addtocart.php">
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                        <button type="submit" class="bg-lblue text-white px-6 py-2 rounded-full hover:bg-blue-600" style="width:150px">
                            Add to Cart
                        </button> 
                        </form>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>

    
    <div class="mobile-bottom-nav fixed bottom-0 left-0 right-0 bg-lblue p-4 space-y-2 z-50">
        <div class="space-y-2">
            <a href="dashboard" class="block text-center bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Dashboard
            </a><br>
            <a href="settings" class="block text-center bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Settings
            </a>
            <a href="model/logout.php" class="block text-center bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Log Out
            </a>
        </div>
    </div>

</body>
</html>
