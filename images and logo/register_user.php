<?php
include("connection.php");

if(isset($_POST['signup-submit'])){

    if (!preg_match("/^[a-zA-Z][a-zA-Z\s]*$/", trim($_POST["signup-name"]))) {
        echo "<script> alert('Name must start with alphabets!'); </script>";
        echo "<script> window.location.href = 'index.php'; </script>";
    } elseif (!preg_match("/^[0-9]{10}$/", trim($_POST["signup-number"]))) {
        echo "<script> alert('Invalid phone number!'); </script>";
        echo "<script> window.location.href = 'index.php'; </script>";
    } elseif (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", trim($_POST["signup-password"]))) {
        echo "<script> alert('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit'); </script>";
        echo "<script> window.location.href = 'index.php'; </script>";
    } else {
    
        // Insertion into Database
        $name = $_POST['signup-name'];
        $number = $_POST['signup-number'];
        $email = $_POST['signup-email'];
        $state = $_POST['signup-state'];
        $city = $_POST['signup-city'];
        $address = $_POST['signup-address'];
        $password = $_POST['signup-password']; 
    
        $insert_query = "INSERT INTO `users`(`user_name`, `user_phone`, `user_address`, `user_email`, `user_city`, `user_state`, `user_password`) VALUES ('$name', '$number', '$address', '$email', '$city', '$state', '$password')";
        $result = mysqli_query($conn, $insert_query);
    
        if($result){
            echo "<script> alert('User registered successfully!'); </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
    
}

mysqli_close($conn);

?>
