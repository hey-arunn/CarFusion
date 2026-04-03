<?php

if (isset($_POST['admin_form_sbm_btn'])) {

    if ($_POST['admin_name'] == "" || $_POST['admin_email'] == "" || $_POST['admin_password'] == "") {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Empty Fields!</strong> Please Fill All The fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        return;
    } else {

        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_password = $_POST['admin_password'];
        $status = $_POST['status'];

        //Check if admin already exists
        $fetch_query = "SELECT * FROM `admin_login` WHERE admin_email_id = '$admin_email'";
        $response = mysqli_query($conn, $fetch_query);

        if (mysqli_num_rows($response) > 0) {
            echo "<script> alert('E-Mail Already Exists!!') </script>";
            return;
        } else {

            $admin_insert_query = "INSERT INTO `admin_login`(`admin_name`, `admin_email_id`, `admin_password`, admin_status) VALUES('$admin_name','$admin_email','$admin_password', $status)";

            $response = mysqli_query($conn, $admin_insert_query);

            if (!$response) {
                echo "<script> alert('Admin Not Registered!!') </script>";
            } else {
                echo "<script> alert('Admin Registered Successfully!!') </script>";
            }
        }
    }
}
