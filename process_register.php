<!DOCTYPE html>
<html lang="en">

<?php
include "inc/head.inc.php";
?>

<body>
    <?php
    include "inc/nav.inc.php";
    session_start();

    // Define variables and initialize with empty values
    $fname = $lname = $email = $password = $pwd_confirm = "";
    $errorMsg = $successMsg = "";
    $success = true; // Variable to track success of the operation

    // Function to sanitize input
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Function to display error message
    function displayError($message) {
        echo "<p class='text-danger'><strong>Error: </strong>$message</p>";
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate first name
        if (empty($_POST["fname"])) {
            $errorMsg .= "First name is required.<br>";
        } else {
            $fname = sanitize_input($_POST["fname"]);
        }

        // Validate last name
        if (empty($_POST["lname"])) {
            $errorMsg .= "Last name is required.<br>";
        } else {
            $lname = sanitize_input($_POST["lname"]);
        }

        // Validate email
        if (empty($_POST["email"])) {
            $errorMsg .= "Email is required.<br>";
        } else {
            $email = sanitize_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorMsg .= "Invalid email format.<br>";
            }
        }

        // Validate password
        if (empty($_POST["password"])) {
            $errorMsg .= "Password is required.<br>";
        } else {
            $password = sanitize_input($_POST["password"]);
        }

        // Validate password confirmation
        if (empty($_POST["pwd_confirm"])) {
            $errorMsg .= "Password confirmation is required.<br>";
        } else {
            $pwd_confirm = sanitize_input($_POST["pwd_confirm"]);
            if ($password !== $pwd_confirm) {
                $errorMsg .= "Passwords do not match.<br>";
            }
        }

        // If no errors, display success message
        if (empty($errorMsg)) {
            echo "<h4>Your registration is successful!</h4>";
            echo "<p>Email: " . $email . "</p>";
            echo '<button class="btn btn-success" onclick="window.location.href=\'login.php\'">Login</button>';
        } else {
            echo '<div class="mb-3">
            <h3>Oops!</h3>
            </div>';
            echo "<h4>The following input errors were detected:</h4>";
            echo "<p>" . $errorMsg . "</p>";
            echo "<p>" . $errorMsg . "</p>";
            echo "<p>" . $errorMsg . "</p>";
            echo '<div class="mb-3">
            <button class="btn btn-danger" onclick="window.location.href=\'register.php\'">Return to Sign Up</button>
            </div>';
        }

        // Call function to save member to database
        saveMemberToDB();

    }
        /*
        * Helper function to write the member data to the database.
        */
        function saveMemberToDB()
        {
            global $fname, $lname, $email, $password, $errorMsg, $success;

            // Create database connection
            // $config = parse_ini_file('/var/www/private/db-config.ini');
            // if (!$config) {
            //     $errorMsg = "Failed to read database config file.";
            //     $success = false;
            // } else {
             //   $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
             require_once('db_connection.php');   
             $conn = new mysqli(
                    $servername,
                    $username,
                    $password,
                    $database,
                );

                // Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
                    // Hash password
                    $pwd_hashed = password_hash($password, PASSWORD_DEFAULT);

                    // Prepare the statement
                    $stmt = $conn->prepare("INSERT INTO glaskin_members (fname, lname, email, password) VALUES (?, ?, ?, ?)");

                    // Bind parameters and execute the query statement
                    $stmt->bind_param("ssss", $fname, $lname, $email, $pwd_hashed);
                    if (!$stmt->execute()) {
                        $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                        $success = false;
                    }

                    // Close statement and connection
                    $stmt->close();
                    $conn->close();
                }
    
        }

        // Include navigation bar and footer
        include "inc/footer.inc.php";
    
    ?>
    <main>
        
    </main>
</body>

</html>