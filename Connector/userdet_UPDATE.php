<?php

    require_once('dbCon.php');

    $user_id = $_SESSION["user_id"];


    $new_first_name = $_POST['NewFirstName'] ?? null;
    $new_last_name = $_POST['NewLastName'] ?? null;
    $new_email = $_POST['Newemail'] ?? null;
    $new_password = $_POST['Newpassword'] ?? null;
    
    // Update user details in the database based on the form inputs
    if (!empty($new_first_name)) {
        $stmt = $conn->prepare("UPDATE userdetails SET FirstName = ? WHERE ID = ?");
        $stmt->execute([$new_first_name, $user_id]);
    }
    
    if (!empty($new_last_name)) {
        $stmt = $conn->prepare("UPDATE userdetails SET LastName = ? WHERE ID = ?");
        $stmt->execute([$new_last_name, $user_id]);
    }
    
    if (!empty($new_email)) {
        $stmt = $conn->prepare("UPDATE userdetails SET email = ? WHERE ID = ?");
        $stmt->execute([$new_email, $user_id]);
    }
    
    if (!empty($new_password)) {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE userdetails SET Password = ? WHERE ID = ?");
        $stmt->execute([$hashed_password, $user_id]);
    }
header("Location: ../pages/dashboard.php");
exit();
?>