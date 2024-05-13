<?php 
require '../config/function.php';

// ban_user.php

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $sql = "UPDATE users SET status = 'banned' WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        // Redirect back to the user details page or any desired location
        header("Location: user-profile.php?id=$userId");
        exit();
    } else {
        echo "Failed to prepare statement.";
    }
} else {
    echo "User ID not specified.";
}
