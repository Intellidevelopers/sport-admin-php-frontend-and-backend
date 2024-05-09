<?php
session_start();

// Check if form was submitted with the delete_account parameter
if (isset($_POST['delete_account'])) {
    require_once "database.php"; // Include your database connection file

    // Verify user authentication (e.g., logged in)
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];

        // Additional verification (e.g., password confirmation) can be added here

        // Delete user account and associated data from the database
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $userId);
            mysqli_stmt_execute($stmt);

            // Close statement
            mysqli_stmt_close($stmt);

            // Optional: Log out user after account deletion
            session_unset();
            session_destroy();

            // Redirect to a confirmation page or home page
            header("Location: index.php");
            exit();
        } else {
            echo "Failed to prepare SQL statement.";
        }

        // Close database connection
        mysqli_close($conn);
    } else {
        echo "User not authenticated.";
    }
} else {
    echo "Invalid request.";
}
?>
