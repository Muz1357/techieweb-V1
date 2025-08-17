<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="styles.css" rel="stylesheet">
  <style>
    @media screen and (max-width: 768px) {
      .login-form-container {
        width: 100%;
      }

      .image-container {
        display: none;
      }
    }

    @media screen and (min-width: 769px) {
      .login-form-container {
        width: 50%;
      }

      .image-container {
        width: 50%;
        display: block;
      }

      .login-page {
        display: flex;
      }
    }
  </style>
</head>
<body>
  <div class="bg-lblue text-white p-4 rounded-lg shadow-lg m-8 flex justify-between items-center">
    <a class="flex items-center">
      <img src="public/assets/logo.png" alt="Logo Image" class="w-10 h-10 cursor-pointer">
    </a>
  </div>

  <div class="login-page">
    
    <div class="login-form-container p-8 bg-white flex flex-col justify-start items-start space-y-4">
      <h2 class="text-3xl font-regular mb-6">Log In</h2>
      <p class="text-sm text-black-500 mt-4">
        Don't have an account?
        <a href="register" class="underline hover:text-blue-700">Register</a>
      </p><br>
      <form action="model/login.php" method="POST" class="w-full max-w-md space-y-6">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Username</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            required 
            class="mt-1 block w-full px-4 py-3 border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 border-lblue"
            style="border-radius: 100px; height: 50px"
          >
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input 
            type="password" 
            id="password" 
            name="password" 
            required 
            class="mt-1 block w-full px-4 py-3 border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 border-lblue"
            style="border-radius: 100px; height: 50px"
          >
        </div><br>

        <div class="flex justify-between items-center">
          <button 
            type="submit" 
            class="w-full bg-lblue text-white border border-transparent shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:bg-blue-600"
            style="border-radius: 100px; height: 50px"
          >Login</button>
        </div>
      </form>
    </div>

    
    <div class="image-container bg-cover bg-center" style="background-image: url('public/assets/image1.png'); height: 100vh;">
    </div>
  </div>
</body>
</html>
