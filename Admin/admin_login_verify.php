<?php
include('connection.php');

if (isset($_POST['admin_login_button'])) {

    $username = $_POST['admin_login_username'];
    $password = $_POST['admin_login_password'];

    $query = "SELECT `admin_name`, `admin_password`, admin_status FROM `admin_login` WHERE `admin_name` = '$username' AND `admin_password` = '$password'";
    $cursor = mysqli_query($conn, $query);

    if (mysqli_num_rows($cursor) > 0) {


        $row = mysqli_fetch_assoc($cursor);
        if (!$row['admin_status']) {
            echo "<script>alert('Your Account is Deactivated')</script>";
        } else {
            session_start();
            $_SESSION['admin_name'] = $row['admin_name'];
            header('Location: http://localhost/php/Admin/dashboard.php?admin_name=' . urlencode($_SESSION['admin_name']));
        }
    } else {
        echo "<script>alert('Invalid Cardentials')</script>";
    }
}

mysqli_close($conn);
