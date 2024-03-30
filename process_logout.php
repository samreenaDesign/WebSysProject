<?php
include "inc/head.inc.php";
session_start();

// Check if the session is started, start if not
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Create database connection.

require_once('db_connection.php');   
$conn = new mysqli(
       $servername,
       $username,
       $password,
       $database,
   );
// Check connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    exit();
}

// Set default timezone to GMT+8
date_default_timezone_set('Asia/Shanghai'); // Change 'Asia/Shanghai' to your desired timezone

// Prepare the statement:
$stmt = $conn->prepare("UPDATE glaskin_members SET isloggedin=0 WHERE email=?");

// Bind & execute the query statement:
$stmt->bind_param("s", $_SESSION['email']);
$stmt->execute();

// Close the statement
$stmt->close();

// Close the connection
$conn->close();

// Clear the session variables
session_unset();
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit();
?>
