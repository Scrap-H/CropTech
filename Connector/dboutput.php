<?php
function outputUserData($conn) {
    $sql = "SELECT * FROM users";
    $stmt = $conn->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($users as $user) {
        echo "User: " . $user['first_name'] . " " . $user['last_name'] . "<br>";
        // Output other user details as needed
    }
}
?>