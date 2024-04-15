<?php

// The code below has been taken and slightly modified for use , It has been taken from : 
// https://learn.microsoft.com/en-us/azure/mysql/flexible-server/connect-php?tabs=windows
// Title of sections : Insert data

$host = 'croptech.mysql.database.azure.com';
$username = 'xciernemex';
$password = 'ZRWCk$5wSb26ma2X';
$db_name = 'userdetail';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

//Create an Insert prepared statement and run it
$Username = '';
$Email = '';
$Pass = '';
if ($stmt = mysqli_prepare($conn, "INSERT INTO UserDetails (UserName, Email, Pass) VALUES (?, ?, ?)")) {
mysqli_stmt_bind_param($stmt, 'ssd', $Username, $Email, $Pass);
mysqli_stmt_execute($stmt);
printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>