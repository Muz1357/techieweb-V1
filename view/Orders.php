<?php include 'model/orders.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Orders</title>
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
            <h2 class="text-3xl font-bold mb-6">Orders</h2>

            
            <div class="space-y-4">

                
                <?php foreach ($orders as $order): ?>
                    <div class="border-2 border-lblue rounded-lg p-4 mb-4">
                        <h3 class="text-xl font-semibold">Order #<?php echo htmlspecialchars($order['order_id']); ?></h3>
                        <p class="text-gray-700">Customer: <?php echo htmlspecialchars($order['customer_name']); ?></p>
                        <p class="text-gray-500">Total: $<?php echo htmlspecialchars($order['total_amount']); ?></p>
                        <p class="text-gray-400">Date: <?php echo htmlspecialchars($order['order_date']); ?></p>

                        
                        <div class="mt-4 border-t pt-4 text-sm text-gray-600">
                            <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($order['payment_method'] ?? 'N/A'); ?></p>
                            <p><strong>Payment Status:</strong> <?php echo htmlspecialchars($order['payment_status'] ?? 'N/A'); ?></p>
                            <p><strong>Payment Date:</strong> <?php echo htmlspecialchars($order['payment_date'] ?? 'N/A'); ?></p>
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
            </a>
        </div>
    </div>

</body>
</html>
