<?php

$serverLink = "croptech.database.windows.net";
$name = "UserDetail";
$username =  "CroptechAdmin";
$password = "Crop#Tech~Admin$";

try {
    $conn = new PDO("sqlsrv:server = tcp:croptech.database.windows.net,1433; Database = UserDetail", "CroptechAdmin", "{your_password_here}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

