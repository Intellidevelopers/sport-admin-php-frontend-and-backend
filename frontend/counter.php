<?php

require  '../config/function.php';

// $query=mysqli_query($conn,"SELECT * FROM `user`");

// $data=mysqli_fetch_all($query,MYSQLI_ASSOC);

// echo json_encode($data);

$query="SELECT * FROM counter";
$result=mysqli_query($conn, $query);

// Checking query error
if(!$result) {
    die("Retrieving Query Error");
}
$total_visitors=mysqli_num_rows($result);
