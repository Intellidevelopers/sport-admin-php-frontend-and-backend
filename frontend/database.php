<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "sportdb";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

