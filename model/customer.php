<?php
require 'config/database.php'; 

$sql = "SELECT full_name AS name, phone_number AS phone, 
               CONCAT(address_line1, ' ', address_line2, ', ', city, ', ', province, ' ', postal_code) AS address
        FROM user_profile
        ORDER BY full_name ASC";

$stmt = $pdo->query($sql);
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
