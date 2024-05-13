<?php 
require '../config/function.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to update user status in the database
function updateUserStatus($conn, $user_id, $new_status) {
    $sql = "UPDATE users SET status = ? WHERE id = ?";
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("ii", $new_status, $user_id); // Assuming 'status' and 'id' are integers
    
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    
    $stmt->close();
    return true; // Return true on success
}

// Database connection details
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'sportdb';

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if required parameters are set
if (isset($_GET['d_id']) && isset($_GET['status'])) {
    $user_id = $_GET['d_id'];
    $new_status = $_GET['status'];

    // Update user status in the database
    if (updateUserStatus($conn, $user_id, $new_status)) {
        // Redirect to user list page after updating status
        header("Location: users.php");
        exit;
    } else {
        echo "Failed to update user status."; // Display error message
    }
} else {
    echo "Invalid request."; // Display error message for missing parameters
}

// Close database connection
$conn->close();

