<?php
session_start();
require_once '../config/database.php'; 


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: /login.php?error=unauthorized");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = trim($_POST['product_name']);
    $product_description = trim($_POST['product_description']);
    $product_price = intval($_POST['product_price']);
    $product_category = trim($_POST['product_category']);
    $user_id = $_SESSION['user_id'];

    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === 0) {
        $image_name = basename($_FILES['product_image']['name']);
        $image_tmp = $_FILES['product_image']['tmp_name'];
        $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($image_extension, $allowed_extensions)) {
            $new_filename = uniqid('product_', true) . '.' . $image_extension;
            $upload_dir = '../public/uploads/';
            $upload_path = $upload_dir . $new_filename;

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            if (move_uploaded_file($image_tmp, $upload_path)) {
                $image_url = '/public/uploads/' . $new_filename;
                $stock_quantity = 10;

               
                $stmt = $pdo->prepare("INSERT INTO product (user_id, name, description, price, stock_quantity, category, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$user_id, $product_name, $product_description, $product_price, $stock_quantity, $product_category, $image_url]);

                header("Location: ../admindashboard");
                exit();
            } else {
                echo "Failed to upload image.";
            }
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, WEBP are allowed.";
        }
    } else {
        echo "Image upload error.";
    }
} else {
    header("Location: ../Addproducts");
    exit();
}
