<?php include 'model/admindashboard.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="styles.css" rel="stylesheet">
    <style>
        
        @media screen and (max-width: 768px) {
            .layout-container {
                flex-direction: column;
                align-items: center; 
            }
            .app-bar {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
            .sidebar {
                display: none;
            }
            .mobile-bottom-nav {
                display: block;
            }
            .main-content {
                width: 90%; 
                margin: 0 auto;
            }
            .product-container {
                grid-template-columns: 1fr;
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

    
    <div class="bg-lblue text-white p-4 rounded-lg shadow-lg m-8 flex justify-between items-center">
        <a class="flex items-center">
            <img src="public/assets/logo.png" alt="Logo Image" class="w-10 h-10 cursor-pointer">
        </a>

        <div class="flex items-center space-x-4">
        </div>
    </div>

    
    <div class="layout-container flex m-8">

        
        <div class="sidebar bg-lblue rounded-lg p-6 min-h-[80vh] shadow-lg flex flex-col justify-between">
            
            <div class="space-y-4">
                <a href="admindashboard" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2  border-white">
                    <span>Dashboard</span>
                </a>
                <a href="Customers" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2  border-white">
                    <span>Customers</span>
                </a>
                <a href="Orders" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2  border-white">
                    <span>Orders</span>
                </a><br><br>
                 <a href="model/logout.php" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2  border-white">
                    Log Out
                </a>
            </div>
            
        </div>

        
        <div class="main-content w-3/4 bg-white rounded-lg p-6 shadow-lg ml-6 flex flex-col">

            
            <div class="flex justify-end mb-6">
                <a href="Addproducts" class="bg-lblue text-white px-6 py-2 rounded-full hover:bg-blue-600 shadow">
                    Create New Product
                </a>
            </div>

            
            <div class="product-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                
                <?php foreach ($products as $product): ?>
                    <div class="border-2 border-lblue rounded-lg p-4 bg-white shadow-md flex flex-col items-center" style="width: 200px">
                        <a href="masterdetail?product_id=<?php echo htmlspecialchars($product['product_id']); ?>">
                            <img src="./<?php echo htmlspecialchars($product['image_url']); ?>" alt="Product Image" class="w-32 h-32 object-cover mb-4">
                        </a>
                        <h3 class="text-xl font-semibold mb-4 text-center"><?php echo htmlspecialchars($product['name']); ?></h3>

                        <div class="flex justify-center space-x-4 mt-4">
                            <a href="Edit?product_id=<?php echo htmlspecialchars($product['product_id']); ?>" class="bg-lblue text-white px-4 py-2 rounded-full hover:bg-yellow-500 text-center">
                                Edit
                            </a>
                            <form method="POST" action="model/deleteproduct.php" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['product_id']); ?>">
                                <button type="submit" class="bg-slate text-white px-6 py-2 rounded-full hover:bg-blue-600" style="width: 90px">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>


                

            </div>

        </div>

    </div>

   

    
    <div class="mobile-bottom-nav fixed bottom-0 left-0 right-0 bg-lblue p-4 space-y-2 z-50">
        <div class="space-y-2">
            <a href="admindashboard" class="block text-center bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Dashboard
            </a><br>
            <a href="Customers" class="block text-center bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Customers
            </a><br>
            <a href="Orders" class="block text-center bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Orders
            </a><br>
            <a href="model/logout.php" class="block text-center bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Log Out
            </a>
        </div>
    </div>

</body>
</html>
