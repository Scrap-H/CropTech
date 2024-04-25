<?php

if(isset($_POST["submit"])) {

    $firstName = $_POST["First_Name"];
    $lastName = $_POST["Last_Name"];
    $email = $_POST["email"];
    $password = $_POST["Password"];
    $password_confirmation = $_POST["PasswordVerification"];
    $errorDisplay = array();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    require_once("dbCon.php");

    
    $sql = "SELECT * FROM userdetails WHERE email = :email";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result) {
        
        echo "Email already in use";
    }else{


        $sql = "INSERT INTO userdetails (FirstName, LastName, Email, Password) VALUES (:firstName, :lastName, :email, :hashed_password)";
    $stmt = $conn->prepare($sql);

    if($stmt) {
        $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':hashed_password', $hashed_password, PDO::PARAM_STR);

        if($stmt->execute()) {
            echo "Registered";
            header("Location: ../pages/login.php");
        } else {
            echo "Registration Error: " . $stmt->errorInfo()[2];
        }
    } else {
        die("Preparation of statement failed");
    }

    }

}

    


?>