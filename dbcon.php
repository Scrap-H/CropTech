<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:croptech.database.windows.net,1433; Database = UserDetail", "CroptechAdmin", "Crop#Tech~Admin$");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "CroptechAdmin", "pwd" => "Crop#Tech~Admin$", "Database" => "UserDetail", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:croptech.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>