<?php

include "inc/head.inc.php";


$email = $password = $errorMsg = "";
$success = true;

// Function to sanitize input
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Validate email
if (empty($_POST["email"])) {
    $errorMsg .= "Email is required.<br>";
    $success = false;
} else {
    $email = sanitize_input($_POST["email"]);

    // Additional check to make sure email address is well-formed.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg .= "Invalid email format.<br>";
        $success = false;
    }
}
// Validate password
if (empty($_POST["password"])) {
    $errorMsg .= "Password is required.<br>";
    $success = false;
} else {
    // No need to sanitize password as it will be hashed for comparison later
}

if ($success) {
    // Call the function to authenticate the user
    authenticateUser();

    if ($success) {
        // User authentication successful
        echo '<div class="alert alert-success" role="alert">';
        echo "<h4 class='alert-heading'>Login successful!</h4>";

        echo "<p>Welcome back, $fname $lname!</p>";
        // Logout button
        echo '<form action="logout.php" method="post">';
        echo '<input type="hidden" name="logout" value="true">';
        echo '<button type="submit" class="btn btn-danger">Logout</button>';
        echo '</form>';
        // Button to go to home page
        echo '<a href="index.php" class="btn btn-primary">Go to home</a>';
        echo '</div>';
    } else {
        // User authentication failed
        echo '<div class="alert alert-danger" role="alert">';
        echo "<h4 class='alert-heading'>Oops fail!</h4>";
        echo "<p>The following input errors were detected:</p>";
        echo "<hr>";
        echo "<p class='mb-0'>$errorMsg</p>";
        echo '<a href="login.php" class="btn btn-warning">Return to Login</a>';
        echo '</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">';
    echo "<h4 class='alert-heading'>Oops!</h4>";
    echo "<p>The following input errors were detected:</p>";
    echo "<hr>";
    echo "<p class='mb-0'>$errorMsg</p>";
    echo '<a href="login.php" class="btn btn-warning">Return to Login</a>';
    echo '</div>';
}

function authenticateUser()
{
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success, $conn;
    require_once('db_connection.php');
    // Create database connection.

        $conn = new mysqli(
            $servername,
            $username,
            $password,
            $database,
        );

        // Check connection
        if ($conn->connect_error) {
            $errorMsg = "Connection failed ffff: " . $conn->connect_error;
            $success = false;
        } else {
            // Set default timezone to GMT+8
            date_default_timezone_set('Asia/Shanghai'); // Change 'Asia/Shanghai' to your desired timezone

            // Prepare the statement:
            $stmt = $conn->prepare("SELECT * FROM glaskin_members WHERE email=?");
            // Bind & execute the query statement:
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                // Note that email field is unique, so should only have
                // one row in the result set.
                $row = $result->fetch_assoc();
                $fname = $row["fname"];
                $lname = $row["lname"];
                $pwd_hashed = $row["password"];


                // Check if the password matches:
                if (!password_verify($_POST["password"], $pwd_hashed)) {
                    // Don't be too specific with the error message - hackers don't
                    // need to know which one they got right or wrong. :)
                    $errorMsg = "Email not found or password doesn't match...";
                    $success = false;
                } else {
                    // Password matches, update login status and time
                    $loggedIn = 1;
                    $lastLoginTime = date('Y-m-d H:i:s'); // Get current time in GMT+8
                    $stmt_update = $conn->prepare("UPDATE glaskin_members SET loggedin=?, lastlogintime=? WHERE email=?");
                    $stmt_update->bind_param("iss", $loggedIn, $lastLoginTime, $email);
                    if (!$stmt_update->execute()) {
                        $errorMsg = "Failed to update login status and time.";
                        $success = false;
                    } else {
                        // Set member_id in session
                        $_SESSION['member_id'] = $row['member_id'];
                    }
                }
            } else {
                $errorMsg = "Email not found or password doesn't match...";
                $success = false;
            }
            $stmt->close();
        }
        $conn->close();

}


include "inc/footer.inc.php";
?>


