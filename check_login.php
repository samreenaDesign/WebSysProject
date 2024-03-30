<?php
session_start(); // Start the session

// Include database configuration
include_once('db_connection.php');

// Create database connection
$conn = new mysqli(
    $servername,
    $username,
    $password,
    $database,
);


// Check connection
if ($conn->connect_error) {
    die(json_encode(array("error" => "Connection failed: " . $conn->connect_error)));
}

// Check if the user is logged in
if (isset($_SESSION['member_id'])) {
    // User is logged in
    $member_id = $_SESSION['member_id'];

    // Prepare the statement to select the logged-in status of the user from the members table
    $stmt = $conn->prepare("SELECT loggedin FROM glaskin_members WHERE member_id = ?");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $loggedin = $row["loggedin"];
        echo json_encode(array("status" => "success", "loggedin" => ($loggedin == 1)));
    } else {
        // No records found for the user, return false
        echo json_encode(array("status" => "success", "loggedin" => false));
    }

    // Close prepared statement
    $stmt->close();
} else {
    // User is not logged in
    echo json_encode(array("status" => "success", "loggedin" => false));
}

// Close database connection
$conn->close();
?>