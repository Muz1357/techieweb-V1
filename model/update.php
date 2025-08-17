<?php


require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $product_id = $_POST['product_id'] ?? null;
    $name = $_POST['product_name'] ?? '';
    $description = $_POST['product_description'] ?? '';
    $price = $_POST['product_price'] ?? '';
    $category = $_POST['product_category'] ?? '';
    
    if (!$product_id || !is_numeric($product_id)) {
        die('Invalid product ID');
    }

    $product_id = intval($product_id);

    
    if (empty($name) || empty($description) || empty($price) || empty($category)) {
        die('Please fill all required fields');
    }

   
    $image_url = null;
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $tmpName = $_FILES['product_image']['tmp_name'];
        $fileName = basename($_FILES['product_image']['name']);
        $targetFilePath = $uploadDir . time() . '_' . $fileName;

        if (move_uploaded_file($tmpName, $targetFilePath)) {
            
            $image_url = str_replace('../', '', $targetFilePath);
        } else {
            die('Failed to upload image');
        }
    }

    
    if ($image_url) {
        $sql = "UPDATE product SET name = ?, description = ?, price = ?, category = ?, image_url = ? WHERE product_id = ?";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $description, $price, $category, $image_url, $product_id]);
    } else {
        
        $sql = "UPDATE product SET name = ?, description = ?, price = ?, category = ? WHERE product_id = ?";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name, $description, $price, $category, $product_id]);
    }

    if ($result) {
        
        header("Location: ../admindashboard");
        exit;
    } else {
        die('Failed to update product');
    }
} else {
    die('Invalid request method');
}
