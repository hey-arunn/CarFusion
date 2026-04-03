<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Invoice</title>
    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" href="CarFusion.jpg">
   

</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        margin-top: 13rem;
    }

    header {
        text-align: center;
        margin-bottom: 20px;
    }

    img {
        max-width: 200px;
        /* Adjust the width of the logo */
        height: auto;
    }

    h2 {
        text-align: center;
    }

    .car-details {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    .car-details img {
        max-width: 350px;
        /* Adjust the width of the image */
        height: auto;
    }

    .buyer-info {
        margin-top: 20px;
    }

    .things-to-carry {
        margin-top: 20px;
    }

    .terms-conditions {
        margin-top: 20px;
    }

    .total-amount {
        margin-top: 20px;
        text-align: right;
    }

    .download-button {
        text-align: center;
        margin-top: 20px;
    }

    .download-button a {
        text-decoration: none;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .download-button a:hover {
        background-color: #45a049;
    }
</style>
</head>

<body>

    
    <?php

    include("connection.php");
    $userid = $_SESSION['user_id'];

    $fetch_query = "SELECT * FROM users WHERE user_id = '$userid'";
    $fetch_res = mysqli_query($conn, $fetch_query);
    $fetch_row = mysqli_fetch_assoc($fetch_res);
    $name = $fetch_row['user_name'];
    $contact = $fetch_row['user_phone'];
    $email = $fetch_row['user_email'];
    $address = $fetch_row['user_address'];
    if (!$fetch_res) {
        echo mysqli_error($conn);
    }

    $order_id = $_GET['order_id'];
    $ord_fetch_query = "SELECT * FROM orders WHERE order_id = '$order_id'";
    $ord_fetch_res = mysqli_query($conn, $ord_fetch_query);
    $ord_fetch_row = mysqli_fetch_assoc($ord_fetch_res);
    $amount = $ord_fetch_row['amount'];
    $details = $ord_fetch_row['details'];
    $time = $ord_fetch_row['order_time'];
    if (!$ord_fetch_res) {
        echo mysqli_error($conn);
    }

    ?>

    <div class="container">
        <header>
            <img src="CarFusion.jpg" alt="Company Logo">
        </header>
        <h2>Subscription Bill</h2>

        <div class="car-details">
            <div class="car-image">
                <img src="insurance.jpg" alt="Car Photo">
            </div>
            <div class="car-info">
                <p><strong>Insurance type:</strong> <?php echo $details; ?></p>
                <p><strong>Valid upto:</strong> <?php
                switch($details){
                    case "Basic_subscription":
                        echo "6";
                        break;
                    case "Standard_subscription":
                        echo "9";
                        break;
                    case "Premium_subscription":
                        echo "12";
                        break;
                }
                ?> months</p>
                <!-- <p><strong>:</strong> 2023</p> -->
                <p><strong>Order Number:</strong> <?php echo $order_id; ?></p>
                <p><strong>Date of Purchasing:</strong> <?php echo $time; ?></p>
                <p><strong>Price:</strong> Rs. <?php echo $amount; ?></p>
            </div>
        </div>

        <div class="buyer-info">
            <h3>Buyer's Information:</h3>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Contact Number:</strong> <?php echo $contact; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
        </div>

        <div class="things-to-carry">
            <h3>Things Covered in Insurance:</h3>
            <ul>
                <li><?php
                switch($details){
                    case "Basic_subscription":
                        echo "Basic";
                        break;
                    case "Standard_subscription":
                        echo "Standard";
                        break;
                    case "Premium_subscription":
                        echo "Full";
                        break;
                }
                ?> warranty coverage for mechanical issues for up to <?php
                switch($details){
                    case "Basic_subscription":
                        echo "6";
                        break;
                    case "Standard_subscription":
                        echo "9";
                        break;
                    case "Premium_subscription":
                        echo "12";
                        break;
                }
                ?> months.</li>
                <li>Access to basic maintenance resources and tips.</li>
                <li>Limited roadside assistance coverage for <?php
                switch($details){
                    case "Basic_subscription":
                        echo "3";
                        break;
                    case "Standard_subscription":
                        echo "6";
                        break;
                    case "Premium_subscription":
                        echo "12";
                        break;
                }
                ?> months.</li>
                <li>Pricing: at a very low cost for car purchase.</li>
            </ul>
        </div>

        <div class="terms-conditions">
            <h3>Terms and Conditions:</h3>
            <ol>
                <li>The insurance payment amounting to Rs.<?php
                switch($details){
                    case "Basic_subscription":
                        echo "1200";
                        break;
                    case "Standard_subscription":
                        echo "3000";
                        break;
                    case "Premium_subscription":
                        echo "7000";
                        break;
                }
                ?> has been received from the buyer.</li>
                <li>This payment is non-refundable.</li>
                <li>The insurance coverage will be valid for a period of <?php
                switch($details){
                    case "Basic_subscription":
                        echo "6";
                        break;
                    case "Standard_subscription":
                        echo "9";
                        break;
                    case "Premium_subscription":
                        echo "12";
                        break;
                }
                ?> months from the date of purchase.</li>
                <li>In case of cancellation by the buyer, the insurance payment will not be refunded.</li>
            </ol>
        </div>

        <div class="total-amount">
            <p><strong>Total Insurance Payment:</strong> Rs. <?php echo $amount; ?></p>
        </div>


        <p>Thank you for choosing CarFusion for your car. Should you have any further queries, feel free to contact us at teamcarfusion@gmail.com.</p>

        <!-- Download button -->
        <!-- <div class="download-button">
            <a href="#" download="car_booking_bill.html">Download Bill</a>
        </div> -->
    </div>
    
</body>

</html>