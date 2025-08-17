<?php include 'model/cart.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Shopping Cart</title>

  
  <script src="https://cdn.tailwindcss.com"></script>

  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            lblue: '#6BC6E4',
          },
        },
      },
    }
  </script>

  
  <link href="styles.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4 md:p-8">

  <h1 class="text-3xl font-bold mb-6 text-center md:text-left">Shopping Cart</h1>
  <hr>

  
  <div class="hidden md:grid grid-cols-4 gap-4 font-bold text-gray-700 border-b-2 pb-3 mb-4">
    <div>Product Detail</div>
    <div class="text-center">Quantity</div>
    <div class="text-center">Price</div>
    <div class="text-right">Total</div>
  </div>

  <?php if (!$cart_items): ?>
    <p class="text-center text-gray-500 mt-8">Your cart is empty.</p>
  <?php else: ?>

    <?php foreach ($cart_items as $item): 
        $item_total = $item['price'] * $item['quantity'];
    ?>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 items-center border-b py-4 bg-white rounded-lg shadow mb-4">

        
        <div class="flex justify-center col-span-2 md:col-span-1">
          <div class="border-2 border-blue-300 rounded-lg p-4 bg-white shadow-md flex flex-col items-center w-[150px]">
            <img src="./<?php echo htmlspecialchars($item['image_url']); ?>" 
              alt="<?php echo htmlspecialchars($item['name']); ?>" 
              class="w-24 h-24 object-cover mb-2" />
            <h3 class="text-sm font-semibold text-center"><?php echo htmlspecialchars($item['name']); ?></h3>
            <form method="POST" action="model/removeitem.php" onsubmit="return confirm('Are you sure you want to remove this product?');">
              <input type="hidden" name="cart_items_id" value="<?php echo htmlspecialchars($item['cart_items_id']); ?>"><br>
              <button type="submit" class="bg-slate text-white px-6 py-2 rounded-full hover:bg-blue-600" style="width: 100px">
               Remove
              </button>
            </form>
          </div>
        </div>

        
        <div class="flex justify-center items-center space-x-3">
          <form method="POST" action="model/quantity.php" class="inline-flex">
            <input type="hidden" name="cart_items_id" value="<?php echo $item['cart_items_id']; ?>">
            <input type="hidden" name="redirect" value="../cart">
            <button type="submit" name="action" value="decrease" class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-1 px-2 rounded">-</button>
          </form>
          <span class="text-lg"><?php echo $item['quantity']; ?></span>
          <form method="POST" action="model/quantity.php" class="inline-flex">
            <input type="hidden" name="cart_items_id" value="<?php echo $item['cart_items_id']; ?>">
            <input type="hidden" name="redirect" value="../cart">
            <button type="submit" name="action" value="increase" class="bg-gray-300 hover:bg-gray-400 text-black font-bold py-1 px-2 rounded">+</button>
          </form>
        </div>
        
        <div class="text-center text-lg">$<?php echo number_format($item['price'], 2); ?></div>

        
        <div class="text-right text-lg font-semibold">$<?php echo number_format($item_total, 2); ?></div>
      </div>
    <?php endforeach; ?>

    
    <div class="mt-8 bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
      <h2 class="text-2xl font-bold mb-4">Checkout</h2>
      <hr>

      <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6 text-gray-800">
        <div>
          <p class="font-medium">Subtotal:</p>
          <p>$<?php echo number_format($subtotal, 2); ?></p>
        </div>
        <div>
          <p class="font-medium">Tax:</p>
          <p>$<?php echo number_format($tax, 2); ?></p>
        </div>
        <div>
          <p class="font-medium">Total:</p>
          <p class="font-bold">$<?php echo number_format($total, 2); ?></p>
        </div>
      </div>

      <div class="text-right">
        <form method="POST" action="model/checkout.php" class="text-right mt-4">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Proceed to Checkout
          </button>
        </form>
      </div>
    </div>

  <?php endif; ?>

</body>
</html>