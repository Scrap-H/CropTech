<?php

function userdetailIN($conn , $firstName , $lastName , $email , $password){
    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$firstName, $lastName, $email, $password]);
    echo "Registration data saved successfully!";
}


?>