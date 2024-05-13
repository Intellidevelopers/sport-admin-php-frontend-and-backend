<?php
require '../config/function.php';

// Create Tournament
if(isset($_POST['createTournament'])) {
    $title = validate($_POST['title']);
    $club_1 = validate($_POST['club_1']);
    $club_2 = validate($_POST['club_2']);
    $result_1 = validate($_POST['result_1']);
    $result_2 = validate($_POST['result_2']);
    $result_3 = validate($_POST['result_3']);

    // Image upload for logo_1
    $image_1 = $_FILES["logo_1"]['name'];
    $target_dir = "uploads/";
    $target_file_1 = $target_dir . basename($image_1);
    $imageFileType_1 = strtolower(pathinfo($target_file_1, PATHINFO_EXTENSION));

    // Check if image file for logo_1 is a valid image
    $check_1 = getimagesize($_FILES["logo_1"]["tmp_name"]);
    if($check_1 !== false) {
        if(move_uploaded_file($_FILES['logo_1']['tmp_name'], $target_file_1)) {
            // Image uploaded successfully for logo_1
        } else {
            redirect('create-tournament.php', 'Failed to upload logo 1');
        }
    } else {
        redirect('create-tournament.php', 'Logo 1 file is not an image');
    }

    // Image upload for logo_2
    $image_2 = $_FILES["logo_2"]['name'];
    $target_file_2 = $target_dir . basename($image_2);
    $imageFileType_2 = strtolower(pathinfo($target_file_2, PATHINFO_EXTENSION));

    // Check if image file for logo_2 is a valid image
    $check_2 = getimagesize($_FILES["logo_2"]["tmp_name"]);
    if($check_2 !== false) {
        if(move_uploaded_file($_FILES['logo_2']['tmp_name'], $target_file_2)) {
            // Image uploaded successfully for logo_2
        } else {
            redirect('create-tournament.php', 'Failed to upload logo 2');
        }
    } else {
        redirect('create-tournament.php', 'Logo 2 file is not an image');
    }

    // Insert into database after both images are uploaded
    $query = "INSERT INTO tournament (title, club_1, club_2, result_1, result_2, result_3, logo_1, logo_2) 
              VALUES ('$title', '$club_1', '$club_2', '$result_1', '$result_2', '$result_3', '$image_1', '$image_2')";
    $result = mysqli_query($conn, $query);

    if($result) {
        redirect('tournament.php', 'Tournament Added Successfully');
    } else {
        redirect('create-tournament.php', 'Something Went Wrong');
    }
} else {
    redirect('create-tournament.php', 'Please fill all the input fields');
}


// Update Tournament
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
    $logo_1 = $_FILES["logo_1"]["name"];
    $logo_2 = $_FILES["logo_2"]["name"];
    $logo_1_tmp = $_FILES["logo_1"]["tmp_name"];
    $logo_2_tmp = $_FILES["logo_2"]["tmp_name"];


    // Update tournament details in the database
    $sql = "UPDATE tournament SET title=?, club_1=?, club_2=?, result_1=?, result_2=?, result_3=?, logo_1=?, logo_2=? WHERE id=?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ssssssssi", $title, $club_1, $club_2, $result_1, $result_2, $result_3, $logo_1, $logo_2, $tournamentId);

        // Move uploaded files to desired directory (e.g., 'uploads/')
        move_uploaded_file($logo_1_tmp, "uploads/" . $logo_1);
        move_uploaded_file($logo_2_tmp, "uploads/" . $logo_2);

        // Execute the update statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<div class='alert alert-success'>Tournament updated successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error updating tournament. Please try again.</div>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<div class='alert alert-danger'>Database error. Please try again.</div>";
    }

    mysqli_close($conn); // Close database connection
}
