<?php
// Get form data
$firstName = $_POST['FirstName'];
$lastName = $_POST['LastName'];
$email = $_POST['email'];
$password = $_POST['NewPassword'];
$passwordVerification = $_POST['PasswordVerification'];

// Validate form data (add your validation logic here)

// Create or open Excel file
$excelFile = 'data.xlsx';

// Data to be written to Excel
$excelData = [$firstName, $lastName, $email, $password, $passwordVerification];

// Write data to Excel file
$fp = fopen($excelFile, 'a'); // Open file for writing (append mode)
fputcsv($fp, $excelData); // Write data to file
fclose($fp); // Close file

// Redirect user back to the form page or any other page
header("Location: ../pages/login.html");
exit;
?>