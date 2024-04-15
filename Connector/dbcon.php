<?php

// The code below has been taken and slightly modified for use , It has been taken from : 
// https://learn.microsoft.com/en-us/azure/mysql/flexible-server/connect-php?tabs=windows
// Title of sections : Connect and create a table

$host = 'croptech.mysql.database.azure.com';
$username = 'lfwbbgtfko';
$password = 'AIOF0$4uERgdq$m0';
$db_name = 'userdetail';

$con = mysqli_init();
mysqli_ssl_set($con,NULL,NULL, "DigiCertGlobalRootCA.crt.pem", NULL, NULL);
mysqli_real_connect($conn, $host, $username, "$password", "db_name", 3306, MYSQLI_CLIENT_SSL);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}


$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

// Run the create table query
if (mysqli_query($conn, '
CREATE TABLE UserDetails (
`Id` INT NOT NULL AUTO_INCREMENT ,
`UserName` VARCHAR(200) NOT NULL ,
`Email` VARCHAR(50) NOT NULL ,
`Pass` DOUBLE NOT NULL ,
PRIMARY KEY (`Id`)
);
')) {
printf("Table created\n");
}

//Close the connection
mysqli_close($conn);






?>