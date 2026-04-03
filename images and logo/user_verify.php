<?php
// session_start();

include("connection.php");

if (isset($_POST['sbm_btn'])) {
    $email = $_POST['login-email'];
    $password = $_POST['login-password'];

    $query = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        if ($row['user_status'] == 0) {
            echo "<script> alert('User Account Is Deactivated!!'); </script>";
        } else {
            // Store username in session
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            echo "<script> alert('User verified'); </script>";
            echo "<script> document.querySelector('.login-form-container').classList.remove('active');
            document.querySelector('.login-btn').classList.add('remove');
            document.querySelector('#user-panel').classList.add('active');
            document.querySelector('.usermenu').classList.add('active'); 
            window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script> alert('Invalid Credentials!!'); </script>";
    }
}
mysqli_close($conn);
