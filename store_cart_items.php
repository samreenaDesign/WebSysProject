<?php
session_start(); // Start the session

echo "disdfs";

die; 
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the JSON data from the request body
    $json_data = file_get_contents("php://input");
    // Decode the JSON data into an associative array
    $cart_items = json_decode($json_data, true);
    // Check if the user is logged in
    if (isset($_SESSION['member_id'])) {
        // Get the member ID from the session
        $member_id = $_SESSION['member_id'];

        // Store cart items in the session
        $_SESSION['cart'] = $cart_items;

        // Respond with a success message
        echo json_encode(array("status" => "success", "message" => "Cart items stored successfully."));
    } else {
        // If the user is not logged in, respond with an error message
        echo json_encode(array("status" => "error", "message" => "User not logged in."));
    }
} else {
    // If the request method is not POST, respond with an error message
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>
