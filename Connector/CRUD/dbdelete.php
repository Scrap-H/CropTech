<?php

// The code below has been taken and slightly modified for use , It has been taken from : 
// https://learn.microsoft.com/en-us/azure/mysql/flexible-server/connect-php?tabs=windows
// Title of sections : Delete data

$host = 'croptech.mysql.database.azure.com';
$username = 'lfwbbgtfko';
$password = 'AIOF0$4uERgdq$m0';
$db_name = 'userdetail';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

//Run the Delete statement

if ($stmt = mysqli_prepare($conn, "DELETE FROM UserDetails WHERE UserName = ?")) {
mysqli_stmt_bind_param($stmt, 's', $product_name);
mysqli_stmt_execute($stmt);
printf("Delete: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
mysqli_stmt_close($stmt);
}

//Close the connection
mysqli_close($conn);
?>