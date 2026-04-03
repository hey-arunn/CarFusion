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
            Edit User
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div id="input" class="p-5">

                    <!-- Adding user in the database -->
                    <?php
                    include("connection.php");
                    // include("add_user.php");

                    // If Admin wants to edit user details
                    if (isset($_GET['user_id'])) {
                        $user_id = $_GET['user_id'];

                        $sel_query = "SELECT * FROM users WHERE user_id = '$user_id'";
                        $cursor = mysqli_query($conn, $sel_query);

                        if ($row = mysqli_fetch_assoc($cursor)) {

                            $user_name = $row['user_name'];
                            $phone = $row['user_phone'];
                            $email = $row['user_email'];
                            $state = $row['user_state'];
                            $address = $row['user_address'];
                            $password = $row['user_password'];
                            $city = $row['user_city'];
                            $status = $row['user_status'];
                        }
                    }
                    ?>

                    <form action="#" method="post">
                        <div class="preview">
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Enter User Name</label>
                                <input id="regular-form-2" type="text" name="user_name" class="form-control" placeholder="Enter Name" value="<?php echo $user_name; ?>">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Enter User Phone</label>
                                <input id="regular-form-2" type="tel" name="user_phone" class="form-control" placeholder="Enter Phone" value="<?php echo $phone; ?>">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Enter User Email</label>
                                <input id="regular-form-2" type="text" name="user_email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>">
                            </div>
                            
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Enter User Address</label>
                                <input id="regular-form-2" type="text" name="user_address" class="form-control" placeholder="Enter Address" value="<?php echo $address; ?>">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Enter User City</label>
                                <input id="regular-form-2" type="text" name="user_city" class="form-control" placeholder="Enter City" value="<?php echo $city; ?>">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-1" class="form-label">Select State</label>
                                <select class="form-control" name="user_state">
                                    <option value="Andhra Pradesh" <?php if ($state == 'Andhra Pradesh') echo 'selected'; ?>>Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh" <?php if ($state == 'Arunachal Pradesh') echo 'selected'; ?>>Arunachal Pradesh</option>
                                    <option value="Assam" <?php if ($state == 'Assam') echo 'selected'; ?>>Assam</option>
                                    <option value="Bihar" <?php if ($state == 'Bihar') echo 'selected'; ?>>Bihar</option>
                                    <option value="Chhattisgarh" <?php if ($state == 'Chhattisgarh') echo 'selected'; ?>>Chhattisgarh</option>
                                    <option value="Goa" <?php if ($state == 'Goa') echo 'selected'; ?>>Goa</option>
                                    <option value="Gujarat" <?php if ($state == 'Gujarat') echo 'selected'; ?>>Gujarat</option>
                                    <option value="Haryana" <?php if ($state == 'Haryana') echo 'selected'; ?>>Haryana</option>
                                    <option value="Himachal Pradesh" <?php if ($state == 'Himachal Pradesh') echo 'selected'; ?>>Himachal Pradesh</option>
                                    <option value="Jharkhand" <?php if ($state == 'Jharkhand') echo 'selected'; ?>>Jharkhand</option>
                                    <option value="Karnataka" <?php if ($state == 'Karnataka') echo 'selected'; ?>>Karnataka</option>
                                    <option value="Kerala" <?php if ($state == 'Kerala') echo 'selected'; ?>>Kerala</option>
                                    <option value="Madhya Pradesh" <?php if ($state == 'Madhya Pradesh') echo 'selected'; ?>>Madhya Pradesh</option>
                                    <option value="Maharashtra" <?php if ($state == 'Maharashtra') echo 'selected'; ?>>Maharashtra</option>
                                    <option value="Manipur" <?php if ($state == 'Manipur') echo 'selected'; ?>>Manipur</option>
                                    <option value="Meghalaya" <?php if ($state == 'Meghalaya') echo 'selected'; ?>>Meghalaya</option>
                                    <option value="Mizoram" <?php if ($state == 'Mizoram') echo 'selected'; ?>>Mizoram</option>
                                    <option value="Nagaland" <?php if ($state == 'Nagaland') echo 'selected'; ?>>Nagaland</option>
                                    <option value="Odisha" <?php if ($state == 'Odisha') echo 'selected'; ?>>Odisha</option>
                                    <option value="Punjab" <?php if ($state == 'Punjab') echo 'selected'; ?>>Punjab</option>
                                    <option value="Rajasthan" <?php if ($state == 'Rajasthan') echo 'selected'; ?>>Rajasthan</option>
                                    <option value="Sikkim" <?php if ($state == 'Sikkim') echo 'selected'; ?>>Sikkim</option>
                                    <option value="Tamil Nadu" <?php if ($state == 'Tamil Nadu') echo 'selected'; ?>>Tamil Nadu</option>
                                    <option value="Telangana" <?php if ($state == 'Telangana') echo 'selected'; ?>>Telangana</option>
                                    <option value="Tripura" <?php if ($state == 'Tripura') echo 'selected'; ?>>Tripura</option>
                                    <option value="Uttar Pradesh" <?php if ($state == 'Uttar Pradesh') echo 'selected'; ?>>Uttar Pradesh</option>
                                    <option value="Uttarakhand" <?php if ($state == 'Uttarakhand') echo 'selected'; ?>>Uttarakhand</option>
                                    <option value="West Bengal" <?php if ($state == 'West Bengal') echo 'selected'; ?>>West Bengal</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1" <?php if($status == 1) echo 'Selected'; ?>>Active</option>
                                    <option value="0" <?php if($status == 0) echo 'Selected'; ?>>Inactive</option>
                                </select>
                                <br>
                                <br>
                            </div>
                        </div>
                        <br />
                        <div class="button">
                            <div style="margin-left: 10px;">
                                <button class="btn btn-primary mt-5" name="user_edit_form_sbm_btn">Submit</button>
                            </div>
                        </div>
                </div>
                </form>


                <?php
                if (isset($_POST['user_edit_form_sbm_btn'])) {
                    $user_name = $_POST['user_name'];
                    $user_email = $_POST['user_email'];
                    $user_phone = $_POST['user_phone'];
                    $user_city = $_POST['user_city'];
                    $user_address = $_POST['user_address'];
                    $user_state = $_POST['user_state'];
                    $status = $_POST['status'];

                    $user_update_query = "UPDATE users 
                    SET 
                        user_name = '$user_name',
                        user_email = '$user_email',
                        user_phone = '$user_phone',
                        user_city = '$user_city',
                        user_address = '$user_address',
                        user_state = '$user_state',
                        user_status = $status
                    WHERE 
                        user_id = $user_id;
                    ";

                    $response = mysqli_query($conn, $user_update_query);

                    if (!$response) {
                        echo "<script> 
                            alert('User Not Updated!!');
                            window.location.href = 'user_edit_form.php?user_id=$user_id';
                        </script>";
                    } else {
                        echo "<script> 
                            alert('User Updated Successfully!!');
                            window.location.href = 'users.php';
                        </script>";
                    }
                }

                ?>

                <!-- Connection Close -->
                <?php

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