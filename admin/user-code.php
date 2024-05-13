<?php 
require '../config/function.php';

if (isset($_POST["createUser"])) {
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $date = $_POST["date"];
    $role = $_POST["role"];
    $passwordRepeat = $_POST["repeat_password"];

    $errors = [];

    // Validate input fields
    if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat) || empty($phone) || empty($city) || empty($state) || empty($country) || empty($date) || empty($role)) {
        $errors[] = "All fields are required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is not valid";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }

    if ($password !== $passwordRepeat) {
        $errors[] = "Passwords do not match";
    }

    // Check if email already exists
    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Email already exists";
        }
    } else {
        $errors[] = "Database error";
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        // Hash the password
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into database
        $sql = "INSERT INTO users (full_name, email, password, phone, city, state, country, date,role)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssssssss", $fullName, $email, $passwordHash, $phone, $city, $state, $country, $date,$role);
            mysqli_stmt_execute($stmt);
            redirect('users.php','User Added Successfully');
        } else {
            redirect('create-user.php','Something Went Wrong');
        }
        mysqli_stmt_close($stmt);

    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    }

    // Close database connection
    mysqli_close($conn);
}


// Create User
/*if(isset($_POST['createUser'])) {
    $full_name = validate($_POST['full_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);

    if($full_name != '' || $email != '' || $password != '' || $role != '' ) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (full_name,email,password,role) 
                    VALUE ('$full_name','$email','$password','$role')";
        $result = mysqli_query($conn, $query);

        if($result){
            redirect('users.php','User Added Successfully');
        }else{
            redirect('create-user.php','Something Went Wrong');
        }
    }
    else{
       redirect('create-user.php','Please fill all the inputs fields');
    }
})*/

// Update Customers details
if(isset($_POST['saveChanges'])){
    $full_name = validate($_POST['full_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $amount = validate($_POST['amount']);
    $role = validate($_POST['role']);

    $userId = validate($_POST['userId']);

    $user = getById('users',$userId);
    if($user['status'] != 200){
        redirect('user-edit.php?id='.$userId,'No Such Id Found');
    }

    if($full_name != '' || $email != '' || $password != '' || $role != '' || $amount != '') {
        $query = "UPDATE users SET
        full_name='$full_name',
        email='$email',
        password='$password',
        amount='$amount',
        role='$role'

        WHERE id='$userId' ";

        $result = mysqli_query($conn, $query);

        if($result){
            redirect('users.php','User Updated Successfully');
        }else{
            redirect('create-user.php','Something Went Wrong');
        }
    }
    else{
       redirect('create-user.php','Please fill all the inputs fields');
    }
}
