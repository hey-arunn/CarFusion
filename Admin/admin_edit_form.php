
<?php
include('header.php');
include('sidemenu.php'); ?>
<style>
    .mt-3 {
        display: inline-block;
        width: 50%;
        float: left;
        padding: 0 10px;
    }

    .p-5 {
        padding: 15px 15px 50px 15px;
    }

    .button {
        width: 10%;
    }

    .btn {
        width: 140%;
    }
</style>
<div class="content">
    <?php include('top_bar.php'); ?>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Admin
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div id="input" class="p-5">
                    <div class="preview">

                        <!-- Registering Admin in Database -->



                        <!-- If admin wants to edit other admin -->

                        <?php
                        include("connection.php");

                        if (isset($_GET['admin_id'])) {
                            $id = $_GET['admin_id'];
                            $admin_select_query = "SELECT * FROM admin_login WHERE admin_id = $id";

                            $admin_cursor = mysqli_query($conn, $admin_select_query);

                            if ($row = mysqli_fetch_assoc($admin_cursor)) {
                                $name = $row['admin_name'];
                                $email = $row['admin_email_id'];
                                $pass = $row['admin_password'];
                                $status = $row['admin_status'];
                            }
                        }
                        ?>

                        <form action="#" method="post">
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Admin Name</label>
                                <input id="regular-form-2" type="text" name="admin_name" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Admin Email</label>
                                <input id="regular-form-2" type="text" name="admin_email" class="form-control" placeholder="Enter e-mail" value="<?php echo $email ?>">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Admin Password</label>
                                <input id="regular-form-2" type="text" name="admin_password" class="form-control" placeholder="Enter Password" value="<?php echo $pass ?>">
                                <br><br>
                            </div>
                            <div class="mt-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1" <?php if($status == 1) echo 'Selected' ?> >Active</option>
                                    <option value="0" <?php if($status == 0) echo 'Selected' ?>>Inactive</option>
                                </select>
                                <br>
                                <br>
                            </div>
                            <br><br>
                            <div class="button">
                                <div style="margin-left: 10px;">
                                    <button class="btn btn-primary mt-5" name="admin_form_sbm_btn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Connection close -->

                    <?php

                    if (isset($_POST['admin_form_sbm_btn'])) {

                        $admin_name = $_POST['admin_name'];
                        $admin_email = $_POST['admin_email'];
                        $admin_password = $_POST['admin_password'];
                        $status = $_POST['status'];

                        $admin_update_query = "UPDATE `admin_login` SET `admin_name`= '$admin_name',`admin_email_id`='$admin_email',`admin_password`='$admin_password', admin_status=$status WHERE `admin_id`=$id";

                        $response = mysqli_query($conn, $admin_update_query);

                        if (!$response) {
                            echo "<script> alert('Admin Not Updated!!') </script>";
                        } else {
                            echo "<script> alert('Admin Updated Successfully!!') </script>";
                            echo "<script> window.location.href = 'Admin.php' </script>";
                        }
                    }

                    mysqli_close($conn);
                    ?>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- END: Content -->
</div>
<script src="dist/js/app.js"></script>
<!-- END: JS Assets-->
</body>

</html>