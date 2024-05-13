<?php
require '../config/function.php';


// Check if form is submitted for updating tournament
if (isset($_POST["updateTournament"])) {
    // Retrieve form data
    $tournamentId = $_POST["userId"];
    $title = $_POST["title"];
    $club_1 = $_POST["club_1"];
    $club_2 = $_POST["club_2"];
    $result_1 = $_POST["result_1"];
    $result_2 = $_POST["result_2"];
    $result_3 = $_POST["result_3"];

    // Handle image uploads
    $logo_1_name = $_FILES["logo_1"]["name"];
    $logo_2_name = $_FILES["logo_2"]["name"];
    $logo_1_tmp = $_FILES["logo_1"]["tmp_name"];
    $logo_2_tmp = $_FILES["logo_2"]["tmp_name"];


    // Update tournament details in the database
    $sql = "UPDATE tournament SET title=?, club_1=?, club_2=?, result_1=?, result_2=?, result_3=?, logo_1=?, logo_2=? WHERE id=?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssssi", $title, $club_1, $club_2, $result_1, $result_2, $result_3, $logo_1_name, $logo_2_name, $tournamentId);

        // Move uploaded files to desired directory (e.g., 'uploads/')
        move_uploaded_file($logo_1_tmp, "uploads/" . $logo_1_name);
        move_uploaded_file($logo_2_tmp, "uploads/" . $logo_2_name);

        // Execute the update statement
        if (mysqli_stmt_execute($stmt)) {
            // Close prepared statement and database connection
            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            // Redirect back to tournament.php after successful update
            header("Location: tournament.php");
            exit; // Ensure that subsequent code is not executed after redirection
        } else {
            echo "<div class='alert alert-danger'>Error updating tournament. Please try again.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Database error. Please try again.</div>";
    }

    // Close statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}