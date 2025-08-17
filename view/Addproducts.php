<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Add New Product</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="styles.css" rel="stylesheet">
    <style>
        @media screen and (max-width: 768px) {
            .layout-container {
                flex-direction: column;
            }
            .sidebar {
                display: none;
            }
            .form-section {
                width: 100%;
                margin-left: 0;
            }
            .mobile-bottom-nav {
                display: block;
            }
        }

        @media screen and (min-width: 769px) {
            .layout-container {
                display: flex;
            }
            .sidebar {
                width: 25%;
                display: block;
            }
            .form-section {
                width: 75%;
                margin-left: 1.5rem;
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

    
    <div class="layout-container m-8">

        
        <div class="sidebar bg-lblue rounded-lg p-6 min-h-[80vh] shadow-lg flex flex-col justify-between">
            <div class="space-y-4">
                <a href="admindashboard" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                    <span>Dashboard</span>
                </a>
                <a href="Customers" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                    <span>Customers</span>
                </a>
                <a href="Orders" class="flex items-center space-x-3 bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                    <span>Orders</span>
                </a>
            </div>
        </div>

        
        <div class="form-section bg-white rounded-lg p-6 shadow-lg">
            <h2 class="text-3xl font-bold mb-6">Add New Product</h2>

            <form action="model/addproduct.php" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="product_name" class="block text-gray-700">Product Name</label>
                    <input type="text" name="product_name" id="product_name" class="w-full p-3 border-2 border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="product_description" class="block text-gray-700">Product Description</label>
                    <textarea name="product_description" id="product_description" rows="4" class="w-full p-3 border-2 border-gray-300 rounded-lg" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="product_price" class="block text-gray-700">Product Price</label>
                    <input type="number" name="product_price" id="product_price" class="w-full p-3 border-2 border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="product_image" class="block text-gray-700">Product Image</label>
                    <input type="file" name="product_image" id="product_image" class="w-full p-3 border-2 border-gray-300 rounded-lg" accept="image/*" required>
                </div>
                <div class="mb-4">
                    <label for="product_category" class="block text-gray-700">Product Category</label>
                    <select name="product_category" id="product_category" class="w-full p-3 border-2 border-gray-300 rounded-lg" required>
                        <option value="earbuds" <?= (isset($product) && $product['category'] == 'Earbuds') ? 'selected' : '' ?>>Earbuds</option>
                        <option value="Mobile Phones" <?= (isset($product) && $product['category'] == 'Mobile Phones') ? 'selected' : '' ?>>Mobile Phones</option>
                        <option value="Headphones" <?= (isset($product) && $product['category'] == 'Headphones') ? 'selected' : '' ?>>Headphones</option>
                        <option value="Laptops" <?= (isset($product) && $product['category'] == 'Laptops') ? 'selected' : '' ?>>Laptops</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-lblue text-white px-6 py-2 rounded-full hover:bg-blue-600 shadow">Add Product</button>
                </div>
            </form>
        </div>
    </div>

    
    <div class="mobile-bottom-nav fixed bottom-0 left-0 right-0 bg-lblue p-4 space-y-2 z-50">
        <div class="space-y-2">
            <a href="admindashboard.php" class="block text-center bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Dashboard
            </a><br>
            <a href="Customers.php" class="block text-center bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Customers
            </a><br>
            <a href="Orders.php" class="block text-center bg-lblue bg-opacity-20 text-white px-4 py-2 rounded-full hover:bg-opacity-40 border-2 border-white">
                Orders
            </a>
        </div>
    </div>

</body>
</html>
