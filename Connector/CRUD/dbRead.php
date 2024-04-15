<?php

// The code below has been taken and slightly modified for use , It has been taken from : 
// https://learn.microsoft.com/en-us/azure/mysql/flexible-server/connect-php?tabs=windows
// Title of sections : Read data


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

//Run the Select query
printf("Reading data from table: \n");
$res = mysqli_query($conn, 'SELECT * FROM UserDetails');
while ($row = mysqli_fetch_assoc($res)) {
var_dump($row);
}

//Close the connection
mysqli_close($conn);
?>