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
            Edit Car
        </h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <br>
                <div id="input" class="p-5">
                    <h2 class="text-lg font-medium mr-auto">
                        Key Specifications
                    </h2>
                    <br>

                    <!-- If Admin wants to edit a car details -->
                    <?php
                    include("connection.php");

                    if (isset($_GET['car_id'])) {
                        $car_id = $_GET['car_id'];

                        $sel_q = "SELECT * FROM cars WHERE car_id='$car_id'";
                        $cursor = mysqli_query($conn, $sel_q);

                        if ($row = mysqli_fetch_assoc($cursor)) {

                            $car_name = $row['car_name'];
                            $price = $row['car_price'];
                            $engine = $row['engine_cc'];
                            $mileage = $row['mileage'];
                            $max_power = $row['torque'];
                            $fuel_tank_capacity = $row['tank_capacity'];
                            // $image_front = $row['image_front'];
                            // $image_back = $row['image_back'];
                            // $image_in = $row['image_inside'];
                            $cylinders = $row['cylinders'];
                            $fuel_type = $row['fuel_type'];
                            $transmission_type = $row['transmission'];
                            $body_type = $row['category'];
                            $seats = $row['seats'];
                            $car_brand = $row['car_brand'];
                        } else {
                            echo mysqli_error($conn);
                        }

                        //mysqli_close($conn);
                    }

                    ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="preview">
                            <div class="mt-3">
                                <label for="car_name" class="form-label">Car Name</label>
                                <input id="car_name" name="car_name" type="text" class="form-control" placeholder="Enter Name" value="<?php echo $car_name ?>">
                            </div>

                            <div class="mt-3">
                                <label for="price" class="form-label">Price</label>
                                <input id="price" name="price" type="text" class="form-control" placeholder="Enter Price" value="<?php echo $price ?>">
                            </div>
                            <div class="mt-3">
                                <label for="engine" class="form-label">Engine</label>
                                <input id="engine" name="engine" type="text" class="form-control" placeholder="Enter Engine CC" value="<?php echo $engine ?>">
                                <br><br>
                            </div>
                            <div class="mt-3">
                                <label for="mileage" class="form-label">Mileage</label>
                                <input id="mileage" name="mileage" type="text" class="form-control" placeholder="Enter Mileage" value="<?php echo $mileage ?>">
                                <br><br>
                            </div>
                            <div class="mt-3">
                                <label for="max_power" class="form-label">Max Power</label>
                                <input id="max_power" name="max_power" type="text" class="form-control" placeholder="Enter Max Power" value="<?php echo $max_power ?>">
                                <br><br>
                            </div>
                            <div class="mt-3">
                                <label for="fuel_tank_capacity" class="form-label">Fuel Tank Capacity</label>
                                <input id="fuel_tank_capacity" name="fuel_tank_capacity" type="text" class="form-control" placeholder="Enter Fuel Tank Capacity" value="<?php echo $fuel_tank_capacity ?>">
                                <br><br>
                            </div>
                            <div class="mt-3">
                                <label for="car_brand" class="form-label">Brand</label>
                                <select name="car_brand" id="car_brand" class="form-control">
                                    <option value="Honda" <?php if ($car_brand == "Honda") {
                                                                echo "selected";
                                                            } ?>>Honda</option>
                                    <option value="Hyundai" <?php if ($car_brand == "Hyundai") {
                                                                echo "selected";
                                                            } ?>>Hyundai</option>
                                    <option value="Kia" <?php if ($car_brand == "Kia") {
                                                            echo "selected";
                                                        } ?>>Kia</option>
                                    <option value="Suzuki" <?php if ($car_brand == "Suzuki") {
                                                                echo "selected";
                                                            } ?>>Suzuki</option>
                                    <option value="Tata" <?php if ($car_brand == "Tata") {
                                                                echo "selected";
                                                            } ?>>Tata</option>
                                    <option value="Toyota" <?php if ($car_brand == "Toyota") {
                                                                echo "selected";
                                                            } ?>>Toyota</option>
                                    <option value="Mahindra" <?php if ($car_brand == "Mahindra") {
                                                                    echo "selected";
                                                                } ?>>Mahindra</option>
                                </select>
                            </div>
                            <!-- <div class="mt-3">
                                <label for="image_file_path" class="form-label">Image Front</label>
                                <input type="file" id="image_front" name="image_front"  class="form-control" placeholder="E.g.dist/images/honda_amaze.jpg">
                                <br><br>
                            </div>

                            <div class="mt-3">
                                <label for="image_file_path" class="form-label">Image Back</label>
                                <input type="file" id="image_back" name="image_back" class="form-control" placeholder="E.g.dist/images/honda_amaze.jpg">
                                <br><br>
                            </div>

                            <div class="mt-3">
                                <label for="image_file_path" class="form-label">Image Inside</label>
                                <input type="file" id="image_in" name="image_in" class="form-control" placeholder="E.g.dist/images/honda_amaze.jpg">
                                <br><br>
                            </div> -->
                            <div class="mt-3">
                                <label for="cylinders" class="form-label">No. of Cylinders</label>
                                <select id="cylinders" name="cylinders" class="form-control">
                                    <option value="3" <?php if ($cylinders == 3) {
                                                            echo "selected";
                                                        } ?>>3</option>
                                    <option value="4" <?php if ($cylinders == 4) {
                                                            echo "selected";
                                                        } ?>>4</option>
                                </select>
                                <br>
                                <br>
                            </div>
                            <div class="mt-3">
                                <label for="fuel_type" class="form-label">Fuel Type</label>
                                <select id="fuel_type" name="fuel_type" class="form-control">
                                    <option value="Petrol" <?php if ($fuel_type == "Petrol") {
                                                                echo "selected";
                                                            } ?>>Petrol</option>
                                    <option value="Diesel" <?php if ($fuel_type == "Diesel") {
                                                                echo "selected";
                                                            } ?>>Diesel</option>
                                    <option value="CNG" <?php if ($fuel_type == "CNG") {
                                                            echo "selected";
                                                        } ?>>CNG</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="transmission_type" class="form-label">Transmission Type</label>
                                <select id="transmission_type" name="transmission_type" class="form-control">
                                    <option value="Automatic" <?php if ($transmission_type == "Automatic") {
                                                                    echo "selected";
                                                                } ?>>Automatic</option>
                                    <option value="Manual" <?php if ($transmission_type == "Manual") {
                                                                echo "selected";
                                                            } ?>>Manual</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="body_type" class="form-label">Body Type</label>
                                <select id="body_type" name="body_type" class="form-control">
                                    <option value="SUV" <?php if ($body_type == "SUV") {
                                                            echo "selected";
                                                        } ?>>SUV</option>
                                    <option value="Sedan" <?php if ($body_type == "Sedan") {
                                                                echo "selected";
                                                            } ?>>Sedan</option>
                                    <option value="Hatchback" <?php if ($body_type == "Hatchback") {
                                                                    echo "selected";
                                                                } ?>>Hatchback</option>
                                </select>
                            </div>

                            <div class="mt-3">
                                <label for="seats" class="form-label">Seats</label>
                                <select id="seats" name="seats" class="form-control">
                                    <option value="2" <?php if ($seats == 2) echo "selected"; ?>>2</option>
                                    <option value="5" <?php if ($seats == 5) {
                                                            echo "selected";
                                                        } ?>>5</option>
                                    <option value="7" <?php if ($seats == 7) echo "selected"; ?>>7</option>
                                </select>
                            </div>
                            
                            <!-- <h2 class="text-lg font-medium mr-auto"> -->
                            <!-- <br><br> -->
                            <div class="button">
                                <div style="margin-left: 10px;">
                                    <button class="btn btn-primary mt-5" name="submit_btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- saving data to database -->
                    <?php

                    if (isset($_POST['submit_btn'])) {

                        $car_name = $_POST['car_name'];
                        $price = $_POST['price'];
                        $engine = $_POST['engine'];
                        $mileage = $_POST['mileage'];
                        $torque = $_POST['max_power'];
                        $fuel_tank_capacity = $_POST['fuel_tank_capacity'];
                        $cylinders = $_POST['cylinders'];
                        $transmission_type = $_POST['transmission_type'];
                        $body_type = $_POST['body_type'];
                        $fuel_type = $_POST['fuel_type'];
                        $seats = $_POST['seats'];
                        $brand = $_POST['car_brand'];

                        // Assuming $car_id is already defined elsewhere
                        $upd_query = "UPDATE `cars` SET `car_brand`='$brand',`car_name`='$car_name',`car_price`='$price',`engine_cc`='$engine',`mileage`='$mileage',`torque`='$torque', `tank_capacity`='$fuel_tank_capacity', `transmission`='$transmission_type', `fuel_type`='$fuel_type', `seats`='$seats', `category`='$body_type', `cylinders`='$cylinders', `car_added_time`=NOW()
                        WHERE `car_id`='$car_id'";

                        $response = mysqli_query($conn, $upd_query);

                        if ($response) {
                            echo "<script>alert('Product Updated Successfully'); window.location.href='cars.php';</script>";
                        } else {
                            echo mysqli_error($conn);
                        }
                        mysqli_close($conn);
                    }

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