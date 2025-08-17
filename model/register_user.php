<?php

require_once '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        
        $stmt = $pdo->prepare("SELECT user_id FROM user_account WHERE username = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            echo "User already exists.";
            exit;
        }

        
        $stmt = $pdo->prepare("INSERT INTO user_account (username, password, role) VALUES (?, ?, ?)");
        $stmt->execute([$email, $hashedPassword, 'buyer']);

        
        header("Location: ../login");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
