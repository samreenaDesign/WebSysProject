<!DOCTYPE html>
<html lang="en">

<?php
include "inc/head.inc.php";
?>

<?php
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
    $errorMsg .= "password is required.<br>";
    $success = false;
} else {
   
}

if ($success) {
    // Call the function to authenticate the user
    authenticateUser();

    if ($success) {
        // User authentication successful
        echo '<div class="alert alert-success" role="alert">';
        echo "<h4 class='alert-heading'>Login successful!</h4>";
        echo "<p>Welcome back, $fname $lname!</p>";
        echo '<a href="index.php" class="btn btn-success">Return to Home</a>';
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

// Helper function to authenticate the login.
function authenticateUser()
{
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;

    // Create database connection.
    $config = parse_ini_file('/var/www/private/db-config.ini');
    if (!$config) {
        $errorMsg = "Failed to read database config file.";
        $success = false;
    } else {
        $conn = new mysqli(
            $config['servername'],
            $config['username'],
            $config['password'],
            $config['dbname']
        );
        // Check connection
        if ($conn->connect_error) {
            $errorMsg = "Connection failed: " . $conn->connect_error;
            $success = false;
        } else {
            // Prepare the statement:
            $stmt = $conn->prepare("SELECT * FROM world_of_pets_members WHERE email=?");
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
                }
            } else {
                $errorMsg = "Email not found or password doesn't match...";
                $success = false;
            }
            $stmt->close();
        }
        $conn->close();
    }
}

?>
</body>

</html>