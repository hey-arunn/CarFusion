<?php
include('header.php');
include('sidemenu.php');
include('connection.php');

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $sql = "SELECT * FROM `orders` WHERE `order_id` = $order_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $customer_id = $row["customer_id"];
        $car_id = $row["car_id"];
        $amount = $row["amount"];
        $aadhaar_num = $row["aadhaar_num"];
        $license_num = $row["license_num"];
        $booking_address = $row["booking_address"];
        $pincode = $row["pincode"];
        $details = $row["details"];
    } else {
        echo "No results found";
    }
}

if (isset($_POST['submit'])) {
    $customer_id = $_POST['customer_id'];
    $car_id = $_POST['car_id'];
    $amount = $_POST['amount'];
    $aadhaar_num = $_POST['aadhaar_num'];
    $license_num = $_POST['license_num'];
    $booking_address = $_POST['booking_address'];
    $pincode = $_POST['pincode'];
    $details = $_POST['details'];

    $sql = "UPDATE `orders` SET `customer_id` = '$customer_id', `car_id` = '$car_id', `amount` = '$amount', `aadhaar_num` = '$aadhaar_num', `license_num` = '$license_num', `booking_address` = '$booking_address', `pincode` = '$pincode', `details` = '$details' WHERE `order_id` = $order_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Order updated successfully')</script>";
        echo "<script>window.location.href='orders.php'</script>";
    } else {
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
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
            Edit Order
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div id="input" class="p-5">
                    <div class="preview">

                    <form action="#" method="post">
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Customer ID</label>
                            <input name="customer_id" id="regular-form-2" type="text" class="form-control" value="<?php echo $customer_id; ?>" placeholder="Enter Customer ID">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Car ID</label>
                            <input name="car_id" <?php if($details=="Premium_subscription" || $details=="Basic_subscription" || $details=="Standard_subscription"){
                                echo "disabled";
                            }
                            ?>
                            id="regular-form-2" type="text" class="form-control" value="<?php echo $car_id; ?>" placeholder="Enter Car ID">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Address</label>
                            <input name="booking_address" id="regular-form-2" type="text" class="form-control" <?php if($details=="Premium_subscription" || $details=="Basic_subscription" || $details=="Standard_subscription"){
                                echo "disabled";
                            }
                            ?> value="<?php echo $booking_address; ?>" placeholder="Enter Address">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Pincode</label>
                            <input name="pincode" id="regular-form-2" type="text" class="form-control" <?php if($details=="Premium_subscription" || $details=="Basic_subscription" || $details=="Standard_subscription"){
                                echo "disabled";
                            }
                            ?> value="<?php echo $pincode; ?>" placeholder="Enter Pincode">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">License Number</label>
                            <input name="license_num" id="regular-form-2" type="text" class="form-control" <?php if($details=="Premium_subscription" || $details=="Basic_subscription" || $details=="Standard_subscription"){
                                echo "disabled";
                            }
                            ?> value="<?php echo $license_num; ?>" placeholder="Enter License no.">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Order details</label>
                            <input name="details" id="regular-form-2" type="text" class="form-control" value="<?php echo $details; ?>" placeholder="Enter Order details">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Amount</label>
                            <input name="amount" id="regular-form-2" type="text" class="form-control" value="<?php echo $amount; ?>" placeholder="Enter Amount">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Aadhhar Number</label>
                            <input name="aadhaar_num" id="regular-form-2" type="text" class="form-control" <?php if($details=="Premium_subscription" || $details=="Basic_subscription" || $details=="Standard_subscription"){
                                echo "disabled";
                            }
                            ?> value="<?php echo $aadhaar_num; ?>" placeholder="Enter Aadhhar no.">
                        </div>
                        <br><br>
                        <div class="button">
                            <div style="margin-left: 10px;">
                                <button name="submit" class="btn btn-primary mt-5">Submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
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