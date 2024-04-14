<?php
require_once 'dbcon.php';
require_once 'dbinput.php';
require_once 'dboutput.php';

$conn = connectToDatabase();

// Handle form submission and input data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    insertUserData($conn, $_POST['FirstName'], $_POST['LastName'], $_POST['email'], $_POST['NewPassword']);
}

// Output data from the database (if needed)
outputUserData($conn);

// Close the database connection
$conn = null;
?>