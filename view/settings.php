<?php include 'model/updateprofile.php';
include 'model/userprofile.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title> Settings Page</title>
  <link href="styles.css" rel="stylesheet">
  <style>
    
    .main-container {
      display: flex;
      flex-direction: column;
    }

    .sidebar {
      order: 2; 
      width: 100%;
    }

    .content-area {
      order: 1; 
      width: 100%;
    }

    
    @media (min-width: 768px) {
      .main-container {
        flex-direction: row;
      }

      .sidebar {
        width: 25%;
        order: 1;
      }

      .content-area {
        width: 75%;
        order: 2;
        margin-left: 1rem;
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
      <a href="cart" class="flex items-center bg-white" style="border-radius: 100px;">
        <img src="public/assets/image3.png" alt="Cart" class="w-10 h-10 cursor-pointer">
      </a>
      <a href="settings" class="flex items-center bg-white" style="border-radius: 100px;">
        <img src="<?php echo $account_image_url; ?>" alt="Account Image" class="w-10 h-10 cursor-pointer">
      </a>
    </div>
  </div>

  
  <div class="main-container m-8">

   
    <div class="sidebar bg-lblue rounded-lg p-6 shadow-lg flex flex-col space-y-6">
      <a href="dashboard" class="text-white px-4 py-2 rounded-full border-2 border-white bg-opacity-20 hover:bg-opacity-40">Dashboard</a>
      <a href="settings" class="text-white px-4 py-2 rounded-full border-2 border-white bg-opacity-20 hover:bg-opacity-40">Settings</a>
    </div>

     
    <div class="content-area bg-white rounded-lg p-6 shadow-lg flex flex-col">
      <h2 class="text-3xl font-bold mb-6">Profile Settings</h2>

      <form action="model/updateprofile.php" method="POST" enctype="multipart/form-data">
      <div class="mb-6">
        <label for="profile" class="block text-sm font-medium text-gray-700">Profile Picture</label>
        <div class="flex items-center space-x-4">
            <input type="file" id="profile" name="profile" class="border-2 border-lblue p-2 rounded-md w-full sm:w-auto">
        </div>
       </div>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($existing['name'] ?? '') ?>" class="w-full p-3 border-2 border-lblue rounded-md">
        </div><br>

        <div>
            <label for="contact" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="tel" id="contact" name="contact" value="<?= htmlspecialchars($existing['contact'] ?? '') ?>" class="w-full p-3 border-2 border-lblue rounded-md">
        </div><br>

        <div class="mb-6">
          <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
          <textarea id="address" name="address" rows="4" class="w-full p-3 border-2 border-lblue rounded-md"><?= htmlspecialchars($existing['address'] ?? '') ?></textarea>
        </div>

        <div class="mb-6">
          <label for="address2" class="block text-sm font-medium text-gray-700">Address line 2</label>
          <textarea id="address2" name="address2" rows="2" class="w-full p-3 border-2 border-lblue rounded-md"><?= htmlspecialchars($existing['address2'] ?? '') ?></textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
          <div>
            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" id="city" name="city" value="<?= htmlspecialchars($existing['city'] ?? '') ?>" class="w-full p-3 border-2 border-lblue rounded-md">
          </div>
          <div>
            <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
            <input type="text" id="province" name="province" class="w-full p-3 border-2 border-lblue rounded-md">
          </div>
          <div>
            <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
            <input type="text" id="postal_code" name="postal_code" value="<?= htmlspecialchars($existing['postal_code'] ?? '') ?>" class="w-full p-3 border-2 border-lblue rounded-md">
          </div>
        </div>

        <div class="flex justify-end">
          <button type="submit" class="bg-lblue text-white px-6 py-2 rounded-full hover:bg-blue-600 shadow">
            Save Changes
          </button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
