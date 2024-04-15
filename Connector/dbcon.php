<?php

// The code below has been taken and slightly modified for use , It has been taken from : 
// https://learn.microsoft.com/en-us/training/modules/develop-apps-with-azure-database-mysql/2-connect-to-mysql-from-app?pivots=php
// Title of sections : Connecting to flexible server using TLS/SSL in PHP (and below)

$host = 'croptech-server.mysql.database.azure.com';
$username = 'xciernemex';
$password = 'ZRWCk$5wSb26ma2X';
$db_name = 'your_database';

$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "<your_path_to_SSL_cert>", NULL, NULL);
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}
printf("Connection Established.\n");



















?>