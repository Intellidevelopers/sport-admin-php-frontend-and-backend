<?php
// Include database connection
include('dbconn.php');

// Start session
session_start();

// Load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../frontend/vendor/autoload.php';

// Function to send verification email
function sendemail_verify($name, $email, $verify_token) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'adeagbojosiah1@gmail.com';
    $mail->Password   = 'wwjriqzwxbczmner'; // Generate an app password for Gmail
    $mail->SMTPSecure = 'tls'; // Use TLS encryption
    $mail->Port       = 587;   // Set the port to 587 for TLS

    // Set email headers and content
    $mail->setFrom('adeagbojosiah1@gmail.com', $name);
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Verify Your Email Address';
    $mail->Body    = 'Please click on the following link to verify your email address: <a href="http://localhost/sport-admin/frontend/verify.php?token=' . $verify_token . '">Verify Email</a>';
    $mail->AltBody = 'Please copy and paste the following URL in your browser to verify your email address: http://localhost/sport-admin/frontend/verify.php?token=' . $verify_token;

    if ($mail->send()) {
        echo 'Message has been sent';
    } else {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// Handle user registration
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

    // Check if email already exists
    $check_email_query = "SELECT email FROM `users` WHERE email = ?";
    $stmt_check_email = mysqli_prepare($conn, $check_email_query);
    mysqli_stmt_bind_param($stmt_check_email, 's', $email);
    mysqli_stmt_execute($stmt_check_email);
    mysqli_stmt_store_result($stmt_check_email);

    if (mysqli_stmt_num_rows($stmt_check_email) > 0) {
        $_SESSION['status'] = "Email Id Already Exists";
        header("Location: register.php");
        exit();
    }

    // Insert new user data into the database using prepared statement
    $insert_query = "INSERT INTO users (name,email, password, verify_token) VALUES (?, ?, ?, ?)";
    $stmt_insert_user = mysqli_prepare($conn, $insert_query);

    if ($stmt_insert_user === false) {
        $_SESSION['status'] = "Error in preparing statement: " . mysqli_error($conn);
        header("Location: register.php");
        exit();
    }

    mysqli_stmt_bind_param($stmt_insert_user, 'ssss', $name, $email, $password, $verify_token);
    $query_run = mysqli_stmt_execute($stmt_insert_user);

    if ($query_run) {
        $_SESSION['status'] = "Registration Successful. Please verify your Email Address";
        // Send verification email
        sendemail_verify($name, $email, $verify_token);
        header("Location: register.php");
        exit();
    } else {
        $_SESSION['status'] = "Registration Failed: " . mysqli_error($conn);
        header("Location: register.php");
        exit();
    }
}


