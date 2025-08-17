<?php

require_once 'config/database.php';  

function getuserprofilepic($pdo) {
    if (!isset($_SESSION['user_id'])) {
        return '/public/assets/default-user.png';  
    }

    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("SELECT profile_pic FROM user_profile WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $row = $stmt->fetch();

    if ($row && !empty($row['profile_pic'])) {
        return htmlspecialchars($row['profile_pic']);
    }

    return '/public/assets/default-user.png'; 
}
