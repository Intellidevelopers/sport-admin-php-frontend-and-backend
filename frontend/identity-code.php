<?php 
require '../config/function.php';

// Create Faq
if(isset($_POST['save'])) {
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $address = validate($_POST['address']);
    $date = validate($_POST['date']);
    $month = validate($_POST['month']);
    $year = validate($_POST['year']);
    $postal = validate($_POST['postal']);
    $phone = validate($_POST['phone']);
    $apartment = validate($_POST['apartment']);
    $city = validate($_POST['city']);
    $state = validate($_POST['state']);
    $country = validate($_POST['country']);

    if($first_name != '' || $last_name != ''|| $address != ''|| $date != ''|| $month != ''|| $year != ''|| $apartment != ''|| $city != ''|| $state != ''|| $country != ''|| $phone != '') {
        $query = "INSERT INTO users (first_name, last_name,address, date,month, year,apartment, city,state,country,phone) 
                    VALUE ('$first_name','$last_name','$address','$date','$month','$year','$apartment','$city','$state','$country','$phone')";
        $result = mysqli_query($conn, $query);

        if($result){
            redirect('identity.php','Identity Added Successfully');
        }else{
            redirect('identity.php','Something Went Wrong');
        }
    }
    else{
       redirect('identity.php','Please fill all the inputs fields');
    }
}