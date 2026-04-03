<?php
include('header.php');
include('sidemenu.php'); 

include('connection.php');

if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    $sql = "SELECT * FROM `payments` WHERE `id` = $payment_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $reference_id = $row["reference_id"];
        $amount = $row["amount"];
        $order_id = $row["order_id"];
        $user_id = $row["user_id"];
        $mode = $row["mode"];
        $details = $row["details"];
    } else {
        echo "<script>alert('No results found')</script>";
    }

    if(isset($_POST['btn'])) {
        $reference_id = $_POST['reference_id'];
        $amount = $_POST['amount'];
        $order_id = $_POST['order_id'];
        $user_id = $_POST['user_id'];
        $mode = $_POST['mode'];
        $details = $_POST['details'];

        $sql = "UPDATE `payments` SET `reference_id` = '$reference_id', `amount` = '$amount', `order_id` = '$order_id', `user_id` = '$user_id', `mode` = '$mode', `details` = '$details' WHERE `id` = $payment_id";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Payment updated successfully')</script>";
            echo "<script>window.location.href='payments.php'</script>";
        } else {
            echo "<script>alert('Failed to update payment')</script>";
        }
    }

}

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
            Edit Payment
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
                                <label for="reference_id" class="form-label">Reference ID</label>
                                <input id="reference_id" name="reference_id" type="text" class="form-control" value="<?php echo $reference_id; ?>" placeholder="Enter Reference ID" required>
                            </div>
                            <div class="mt-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input id="amount" value="<?php echo $amount; ?>" name="amount" type="number" class="form-control" placeholder="Enter Amount" required>
                            </div>
                            <div class="mt-3">
                                <label for="order_id" class="form-label">Order ID</label>
                                <input id="order_id" value="<?php echo $order_id; ?>" name="order_id" type="number" class="form-control" placeholder="Enter Order ID" required>
                            </div>
                            <div class="mt-3">
                                <label for="user_id" class="form-label">Customer ID</label>
                                <input id="user_id" value="<?php echo $user_id; ?>" name="user_id" type="number" class="form-control" placeholder="Enter User ID" required>
                            </div>
                            <div class="mt-3">
                                <label for="mode" class="form-label">Payment Mode</label>
                                <input id="mode" value="<?php echo $mode; ?>" name="mode" type="text" class="form-control" placeholder="Enter Payment Mode" required>
                            </div>
                            <div class="mt-3">
                                <label for="details" class="form-label">Details</label>
                                <input id="details" value="<?php echo $details; ?>" name="details" type="text" class="form-control" placeholder="Enter Details" required>
                            </div>
                            <br><br>
                            <div class="button">
                                <div style="margin-left: 10px;">
                                    <button type="submit" class="btn btn-primary mt-5" name="btn">Submit</button>
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