<?php

$host = 'croptech-server.mysql.database.azure.com';
$username = 'xciernemex';
$password = 'ZRWCk$5wSb26ma2X';
$db_name = 'your_database';

$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}






















?>