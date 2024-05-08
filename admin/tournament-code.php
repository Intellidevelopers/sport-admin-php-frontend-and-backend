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
            redirect('create_tournament.php', 'Failed to upload logo 1');
        }
    } else {
        redirect('create_tournament.php', 'Logo 1 file is not an image');
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
            redirect('create_tournament.php', 'Failed to upload logo 2');
        }
    } else {
        redirect('create_tournament.php', 'Logo 2 file is not an image');
    }

    // Insert into database after both images are uploaded
    $query = "INSERT INTO tournament (title, club_1, club_2, result_1, result_2, result_3, logo_1, logo_2) 
              VALUES ('$title', '$club_1', '$club_2', '$result_1', '$result_2', '$result_3', '$image_1', '$image_2')";
    $result = mysqli_query($conn, $query);

    if($result) {
        redirect('tournament.php', 'Tournament Added Successfully');
    } else {
        redirect('create_tournament.php', 'Something Went Wrong');
    }
} else {
    redirect('create_tournament.php', 'Please fill all the input fields');
}
?>
