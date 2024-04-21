<?php
$hostName = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "croptech";


try{

    $conn = new PDO("mysql:host=$hostName;dbname=$dbname", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "conn failed" . $e->getMessage();
}

?>