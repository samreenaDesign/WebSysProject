<?php
session_start();
include_once('db_connection.php');

// Check if member_id is set in session
if(isset($_SESSION['member_id'])) {
    // Update the database to logout the user

    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $database,
    );
    // Check connection
        if (!$conn->connect_error) {
            $member_id = $_SESSION['member_id'];
            date_default_timezone_set('Asia/Shanghai');
            $lastLogoutTime = date('Y-m-d H:i:s');

            $stmt = $conn->prepare("UPDATE glaskin_members SET loggedin = 0, lastlogouttime = ? WHERE member_id = ?");
            if ($stmt) {
                $stmt->bind_param("si", $lastLogoutTime, $member_id);
                if ($stmt->execute()) {
                    // Destroy the session
                    session_unset();
                    session_destroy();
                    
                    // Clear cart items
                    unset($_SESSION['cartItems']); // Clear the cartItems session variable

                    // Redirect the user to index.php or any other page
                    header("Location: index.php");
                    exit(); // Make sure no other code is executed after redirection
                } else {
                    echo "Execution failed: " . $stmt->error;
                }
            } else {
                echo "Prepare failed: " . $conn->error;
            }
        } else {
            echo "Database connection failed.";
        } 
} else {
    // Redirect the user to index.php or any other page
    header("Location: index.php");
    exit(); // Make sure no other code is executed after redirection
}
?>