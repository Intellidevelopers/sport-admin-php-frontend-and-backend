<?php 
require '../config/function.php';

// Create User
if(isset($_POST['createUser'])) {
    $full_name = validate($_POST['full_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);

    if($full_name != '' || $email != '' || $password != '' || $role != '') {
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
}

// Update Customers details
if(isset($_POST['saveChanges'])){
    $full_name = validate($_POST['full_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);

    $userId = validate($_POST['userId']);

    $user = getById('users',$userId);
    if($user['status'] != 200){
        redirect('user-edit.php?id='.$userId,'No Such Id Found');
    }

    if($full_name != '' || $email != '' || $password != '' || $role != '') {
        $query = "UPDATE users SET
        full_name='$full_name',
        email='$email',
        password='$password',
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
