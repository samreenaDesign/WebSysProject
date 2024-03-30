<?php
// Include database configuration and any other necessary files
session_start();

// Check if the user is logged in
if (!isset($_SESSION['member_id'])) {
    // Redirect the user or display an error message
    echo json_encode(array('success' => false, 'message' => 'User is not logged in.'));
    exit;
}

// Retrieve cart data from the request body
$cartItems = file_get_contents('php://input');
if (empty($cartItems)) {
    // Handle case where cart data is empty
    echo json_encode(array('success' => false, 'message' => 'Cart data is empty.'));
    exit;
}

// Decode cart data
$cartItems = json_decode($cartItems, true);

include_once("db_connection.php");
// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Handle database connection error
    echo json_encode(array('success' => false, 'message' => 'Database connection failed.'));
    exit;
}

// Select the database
if (!$conn->select_db('websysstore')) {
    // Handle database selection error
    echo json_encode(array('success' => false, 'message' => 'Database selection failed.'));
    exit;
}


// Generate a unique order_id
$order_id = uniqid('ORDER');
$member_id = $_SESSION['member_id'];

// Insert a new row into the Orders table
$sql = "INSERT INTO orders (order_id, member_id) VALUES ('$order_id', $member_id)";
if (mysqli_query($conn, $sql)) {
    $successMessages[] = 'Order is created successfully';
} else {
    $errorMessages[] = 'Error in inserting order data: ' . mysqli_error($conn);
}

// Insert cart items into OrderDetails table
foreach ($cartItems as $item) {
    $product_name = $item['name'];
    $quantity = $item['quantity'];

    $sql1 = "INSERT INTO order_details (order_id, product_name, quantity) VALUES ('$order_id', '$product_name', $quantity)";

    if (mysqli_query($conn, $sql1)) {
      //  $successMessages[] = 'Order details are inserted successfully';
    } else {
        $errorMessages[] = 'Error in inserting order details: ' . mysqli_error($conn);
    }
}

// Close database connection
$conn->close();

// Prepare the final response
if (!empty($errorMessages)) {
    // If there are errors, return them
    echo json_encode(array('success' => false, 'message' => $errorMessages));
} else {
    // If no errors, return success message
    echo json_encode(array('success' => true, 'message' => $successMessages, 'order_id' => $order_id));
}
?>
