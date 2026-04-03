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
            Add New Admin
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div id="input" class="p-5">
                    <div class="preview">

                        <!-- Registering Admin in Database -->

                        <?php

                        include("connection.php");
                        include("admin_details_insert.php");

                        ?>

                        <form action="#" method="post">
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Admin Name</label>
                                <input id="regular-form-2" type="text" name="admin_name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Admin Email</label>
                                <input id="regular-form-2" type="text" name="admin_email" class="form-control" placeholder="Enter e-mail">
                            </div>
                            <div class="mt-3">
                                <label for="regular-form-2" class="form-label">Admin Password</label>
                                <input id="regular-form-2" type="text" name="admin_password" class="form-control" placeholder="Enter Password">
                                <br><br>
                            </div>
                            <div class="mt-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1" >Active</option>
                                    <option value="0" >Inactive</option>
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