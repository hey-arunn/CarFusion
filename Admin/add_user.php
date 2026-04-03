<?php
if (isset($_POST['user_form_sbm_btn'])) {

    if ($_POST['user_name'] == "" || $_POST['user_email'] == "" || $_POST['user_phone'] == "" || $_POST['user_password'] == "" || $_POST['user_city'] == "" || $_POST['user_address'] == "") {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Empty Fields!</strong> Please Fill All The fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        return;
    } else {

        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_phone = $_POST['user_phone'];
        $user_password = $_POST['user_password'];
        $user_city = $_POST['user_city'];
        $user_address = $_POST['user_address'];
        $user_state = $_POST['user_state'];
        $user_status = $_POST['status'];

        //Check if email and phone already exists
        $email_check = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
        $phone_check = "SELECT * FROM `users` WHERE `user_phone` = $user_phone";

        $email_response = mysqli_query($conn, $email_check);
        $phone_response = mysqli_query($conn, $phone_check);
        if (mysqli_num_rows($email_response) > 0) {
            echo "<script> alert('Email Already Exists!!') </script>";
            return;
        } elseif (mysqli_num_rows(mysqli_query($conn, $phone_check)) > 0) {
            echo "<script> alert('Phone Number Already Exists!!') </script>";
            return;
        } else {

            $user_insert_query = "INSERT INTO `users`(`user_name`, `user_phone`, `user_address`, `user_email`, `user_city`, `user_state`, `user_password`, user_status) VALUES ('$user_name', $user_phone, '$user_address', '$user_email', '$user_city', '$user_state', '$user_password', $user_status)";

            $response = mysqli_query($conn, $user_insert_query);

            if (!$response) {
                echo "<script> alert('User Not Registered!!') </script>";
            } else {
                echo "<script> alert('User Registered Successfully!!') </script>";
            }
        }
    }
}
