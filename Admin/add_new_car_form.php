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
            Add New Car
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

                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="preview">
                            <div class="mt-3">
                                <label for="car_name" class="form-label">Car Name</label>
                                <input id="car_name" name="car_name" type="text" class="form-control" placeholder="Enter Name">
                            </div>
                            
                            <div class="mt-3">
                                <label for="price" class="form-label">Price</label>
                                <input id="price" name="price" type="text" class="form-control" placeholder="Enter Price">
                            </div>
                            <div class="mt-3">
                                <label for="engine" class="form-label">Engine</label>
                                <input id="engine" name="engine" type="text" class="form-control" placeholder="Enter Engine CC">
                                <br><br>
                            </div>
                            <div class="mt-3">
                                <label for="mileage" class="form-label">Mileage</label>
                                <input id="mileage" name="mileage" type="text" class="form-control" placeholder="Enter Mileage">
                                <br><br>
                            </div>
                            <div class="mt-3">
                                <label for="max_power" class="form-label">Max Power</label>
                                <input id="max_power" name="max_power" type="text" class="form-control" placeholder="Enter Max Power">
                                <br><br>
                            </div>
                            <div class="mt-3">
                                <label for="fuel_tank_capacity" class="form-label">Fuel Tank Capacity</label>
                                <input id="fuel_tank_capacity" name="fuel_tank_capacity" type="text" class="form-control" placeholder="Enter Fuel Tank Capacity">
                                <br><br>
                            </div>
                            <div class="mt-3">
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
                            </div>
                            <div class="mt-3">
                                <label for="cylinders" class="form-label">No. of Cylinders</label>
                                <select id="cylinders" name="cylinders" class="form-control">
                                    <option value="3">3</option>
                                    <option value="4" selected>4</option>
                                </select>
                                <br>
                                <br>
                            </div>
                            <div class="mt-3">
                                <label for="fuel_type" class="form-label">Fuel Type</label>
                                <select id="fuel_type" name="fuel_type" class="form-control">
                                    <option value="Petrol" selected>Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="CNG">CNG</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="transmission_type" class="form-label">Transmission Type</label>
                                <select id="transmission_type" name="transmission_type" class="form-control">
                                    <option value="Automatic">Automatic</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="body_type" class="form-label">Body Type</label>
                                <select id="body_type" name="body_type" class="form-control">
                                    <option value="SUV">SUV</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Hatchback">Hatchback</option>
                                </select>
                            </div>
                            
                            <div class="mt-3">
                                <label for="seats" class="form-label">Seats</label>
                                <select id="seats" name="seats" class="form-control">
                                    <option value="2">2</option>
                                    <option value="5" selected>5</option>
                                    <option value="7">7</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="car_brand" class="form-label">Brand</label>
                                <select name="car_brand" id="car_brand" class="form-control">
                                    <option value="Honda">Honda</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Kia">Kia</option>
                                    <option value="Suzuki">Suzuki</option>
                                    <option value="Tata">Tata</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Mahindra">Mahindra</option>
                                </select>
                            </div>
                            <h2 class="text-lg font-medium mr-auto">
                                <br><br>
                                <div class="button">
                                    <div style="margin-left: 10px;">
                                        <button class="btn btn-primary mt-5" name="submit_btn">Submit</button>
                                    </div>
                                </div>
                        </div>
                    </form>

                    <!-- saving data to database -->
                    <?php include("car_insert_data.php"); ?>

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