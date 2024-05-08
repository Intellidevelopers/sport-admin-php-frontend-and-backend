<?php 
require '../config/function.php';

// Create Customer
if(isset($_POST['saveCustomer'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $username = validate($_POST['username']);
    $zip = validate($_POST['zip']);
    $address = validate($_POST['address']);
    $date_created = validate($_POST['date_created']);
    $role = validate($_POST['role']);

    if($name != '' || $email != '' || $phone != '' || $password != '' || $zip != '' || $username != '' || $address != '' || $date_created != '' || $role != '') {
        $query = "INSERT INTO customers (name,username,email,address,phone,passwod,role,zip) 
                    VALUE ('$name','$email','$phone','$username','$address','$password','$role','$zip')";
        $result = mysqli_query($conn, $query);

        if($result){
            redirect('customers.php','Customer/Admin Added Successfully');
        }else{
            redirect('create-customer.php','Something Went Wrong');
        }
    }
    else{
       redirect('create-customer.php','Please fill all the inputs fields');
    }
}

// Update Customers details
if(isset($_POST['updateCustomer'])){
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $username = validate($_POST['username']);
    $zip = validate($_POST['zip']);
    $address = validate($_POST['address']);
    $role = validate($_POST['role']);

    $userId = validate($_POST['userId']);

    $user = getById('customers',$userId);
    if($user['status'] != 200){
        redirect('customer-edit.php?id='.$userId,'No Such Id Found');
    }

    if($name != '' || $email != '' || $phone != '' || $password != '' || $zip != '' || $username != '' || $address != '' || $date_created != '' || $role != '') {
        $query = "UPDATE customers SET
        name='$name',
        username='$username',
        email='$email',
        address='$address',
        phone='$phone',
        passwod='$password',
        role='$role',
        zip='$zip' 

        WHERE id='$userId' ";

        $result = mysqli_query($conn, $query);

        if($result){
            redirect('customers.php','Customer/Admin Updated Successfully');
        }else{
            redirect('create-customer.php','Something Went Wrong');
        }
    }
    else{
       redirect('create-customer.php','Please fill all the inputs fields');
    }
}

// Create Sellers
if(isset($_POST['saveSeller'])) {
    $name = validate($_POST['name']);
    $store_name = validate($_POST['store_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $products = validate($_POST['products']);
    $wallet_balance = validate($_POST['wallet_balance']);
    $date_created = validate($_POST['date_created']);

    if($name != '' && $email != '' && $store_name != '' && $password != '' && $products != '' && $date_created != '' && $wallet_balance != '' ) {
        $query = "INSERT INTO sellers (name, store_name, email, products, wallet_balance, password, date_created) 
                    VALUE ('$name', '$store_name', '$email', '$products', '$wallet_balance', '$password', '$date_created')";
        $result = mysqli_query($conn, $query);

        if($result){
            redirect('sellers.php', 'Seller Added Successfully');
        } else {
            redirect('create-seller.php', 'Something Went Wrong');
        }
    }
    else {
       redirect('create-seller.php', 'Please fill all the input fields');
    }
}
