
<?php
    include "inc/nav.inc.php";
    session_start();

    function validate_member_id($member_id) {
        // Create database connection.

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
            return false; // Connection failed
        }

        // Execute query to check if the member_id exists in the glaskin_members table
        $sql = "SELECT COUNT(*) AS member_count FROM glaskin_members WHERE member_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $member_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        // Close the database connection
        $conn->close();

        // Check if the member_id exists
        return $row['member_count'] > 0;
    }

    // Example usage (replace with actual member ID)
    $desired_member_id = 123;  // Example member_id
    if (validate_member_id($desired_member_id)) {
        // Proceed with inserting or updating data in the Orders table
        // Insert your code here
    } else {
        echo "Error: Member with member_id $desired_member_id does not exist.";
    }

    include "inc/footer.inc.php";
    ?>
    <main>
        
    </main>
</body>

</html>