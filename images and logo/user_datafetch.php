<?php

include("connection.php");

$id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE user_id = '$id'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['user_name'];
    $email = $row['user_email'];
    $mobile = $row['user_phone'];
    $address = $row['user_address'];
    $password = $row['user_password'];
    $state = $row['user_state'];
    $city = $row['user_city'];
}

mysqli_close($conn);
?>