<?php
session_start();


require_once __DIR__ . '/../config/database.php'; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = trim($_POST['email']); 
    $password = trim($_POST['password']);

    
    if (empty($username) || empty($password)) {
        $_SESSION['error'] = "Username and password are required.";  
        header("Location: ../login");
        exit();
    }

    
    $stmt = $pdo->prepare("SELECT * FROM user_account WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    
    if ($user) {
        
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];  
            $_SESSION['role'] = $user['role']; 
            $_SESSION['name'] = $user['name']; 

            
            if ($user['role'] === 'admin') {
                header("Location: ../admindashboard");
            } else {
                header("Location: ../dashboard");
            }
            exit();
        } else {
            
            $_SESSION['error'] = "Invalid password.";
            header("Location: ../login");
            exit();
        }
    } else {
       
        $_SESSION['error'] = "No user found with that username.";
        header("Location: ../login");
        exit();
    }
} else {
    
    header("Location: ../login");
    exit();
}
