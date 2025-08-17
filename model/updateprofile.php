<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require __DIR__ . '/../config/database.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id      = $_SESSION['user_id'];
    $full_name    = $_POST['name'] ?? '';
    $phone_number = $_POST['contact'] ?? '';
    $address1     = $_POST['address'] ?? '';
    $address2     = $_POST['address2'] ?? '';
    $city         = $_POST['city'] ?? '';
    $province     = $_POST['province'] ?? '';
    $postal_code  = $_POST['postal_code'] ?? '';

    
    if (empty($full_name) || empty($phone_number) || empty($address1) || empty($city) || empty($province) || empty($postal_code)) {
        $_SESSION['status'] = "All required fields must be filled.";
        header("Location: ../settings");
        exit();
    }

    
    $uploadDir = "../public/uploads/";
    $profilePicPath = null;

    if (!empty($_FILES['profile']['name'])) {
        $imageName = basename($_FILES['profile']['name']);
        $targetPath = $uploadDir . $imageName;

        
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['profile']['tmp_name'], $targetPath)) {
            $profilePicPath = "public/uploads/" . $imageName;
        }
    }

    
    $stmt = $pdo->prepare("SELECT * FROM user_profile WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $profile = $stmt->fetch();

    if ($profile) {
        
        $query = "UPDATE user_profile SET full_name=?, phone_number=?, address_line1=?, address_line2=?, city=?, province=?, postal_code=?";
        $params = [$full_name, $phone_number, $address1, $address2, $city, $province, $postal_code];

        if ($profilePicPath) {
            $query .= ", profile_pic=?";
            $params[] = $profilePicPath;
        }

        $query .= " WHERE user_id=?";
        $params[] = $user_id;

        $updateStmt = $pdo->prepare($query);
        $updateStmt->execute($params);

        $_SESSION['status'] = "Profile updated successfully.";
    } else {
        
        $insert = $pdo->prepare("INSERT INTO user_profile (user_id, full_name, phone_number, address_line1, address_line2, city, province, postal_code, profile_pic)
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->execute([
            $user_id,
            $full_name,
            $phone_number,
            $address1,
            $address2,
            $city,
            $province,
            $postal_code,
            $profilePicPath ?? ''
        ]);

        $_SESSION['status'] = "Profile created successfully.";
    }

    header("Location: ../settings");
    exit();
}
