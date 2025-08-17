<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles.css" rel="stylesheet">
  <style>
    @media screen and (max-width: 768px) {
      .register-container {
        flex-direction: column;
      }
      .form-section {
        width: 100%;
      }
      .image-section {
        display: none;
      }
    }

    @media screen and (min-width: 769px) {
      .register-container {
        display: flex;
      }
      .form-section {
        width: 50%;
      }
      .image-section {
        width: 50%;
        display: block;
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

  <div class="register-container min-h-screen">
    
    <div class="form-section p-8 bg-white flex flex-col justify-start items-start space-y-4">
      <h2 class="text-3xl font-regular mb-6">Create Account</h2><br>
      <form action="model/register_user.php" method="POST" class="w-full max-w-md space-y-6">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            required 
            class="mt-1 block w-full px-4 py-3 border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 border-lblue"
            style="border-radius: 100px; height: 50px"
          >
        </div><br>

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
        </div><br><br>

        <div class="flex justify-between items-center">
          <button 
            type="submit" 
            class="w-full bg-lblue text-white border border-transparent shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:bg-blue-600"
            style="border-radius: 100px; height: 50px"
          >Create Account</button>
        </div>
        <div class="flex justify-center mt-4">
          <p class="text-sm text-black-500">
            Already have an account?
            <a href="login" class="underline hover:text-blue-700">Log In</a>
          </p>
        </div><br>
      </form>
    </div>

   
    <div class="image-section bg-cover bg-center" style="background-image: url('public/assets/image2.png'); height: 100vh;">
    </div>
  </div>
</body>
</html>
