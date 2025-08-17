<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link href="styles.css" rel="stylesheet">
    <style>
        
        .landing-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
            text-align: center;
        }

        .hero {
            background-color: #6BC6E4;
            padding: 50px;
            border-radius: 10px;
            color: white;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .cta-buttons a {
            padding: 12px 20px;
            background-color: #333;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .cta-buttons a:hover {
            background-color: #555;
        }
    </style>
</head>
<body class="bg-gray-100">

    
    <div class="bg-lblue text-white p-4 rounded-lg shadow-lg m-8 flex justify-between items-center">
        <a href="index.php" class="flex items-center">
            <img src="public/assets/logo.png" alt="Logo Image" class="w-10 h-10 cursor-pointer">
        </a>

        <div class="flex items-center space-x-4">
            <a href="login" class="flex items-center " style="border-radius: 100px;">
                <span>Login</span>
            </a>
            <a href="register" class="flex items-center " style="border-radius: 100px;">
                <span>Register</span>
            </a>
        </div>
    </div>

    
    <div class="landing-container">
        <div class="hero">
            <h1>Welcome to Our Tech Store</h1>
            <p>Welcome to Techie, your one-stop destination for high-quality tech products . We’re committed to providing a seamless shopping experience with fast, reliable delivery and secure payments powered by PayHere. Our smart cart system keeps your orders up to date in real time, while detailed order tracking ensures transparency from checkout to doorstep <br><br> Browse the latest and greatest tech products with ease.</p>

            <div class="cta-buttons">
                <a href="login">Shop Now</a>
            </div>
        </div>
    </div>

</body>
</html>
