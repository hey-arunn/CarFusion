<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" href="CarFusion.jpg">
    <!-- <link rel="stylesheet" href="payment book now.css"> -->
    <!-- <link rel="stylesheet" href="signup.css"> -->
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
        max-width: 300px;
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
    $date = date('d/m/y');

    $fetch_query = "SELECT * FROM users WHERE user_id = '$userid'";
    $fetch_res = mysqli_query($conn, $fetch_query);
    $fetch_row = mysqli_fetch_assoc($fetch_res);
    $name = $fetch_row['user_name'];
    $city = $fetch_row['user_city'];
    $state = $fetch_row['user_state'];
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

    $car_id = $_GET['car_id'];
    $car_fetch_query = "SELECT * FROM cars WHERE car_id = '$car_id'";
    $car_fetch_res = mysqli_query($conn, $car_fetch_query);
    $car_fetch_row = mysqli_fetch_assoc($car_fetch_res);
    $model = ucwords($car_fetch_row['car_brand'] . ' ' . $car_fetch_row['car_name']);
    $brand = $car_fetch_row['car_brand'];
    $body_type = $car_fetch_row['category'];
    $engine = $car_fetch_row['engine_cc'];
    $price = $car_fetch_row['car_price'];
    $image = $car_fetch_row['image_front'];
    if (!$car_fetch_res) {
        echo mysqli_error($conn);
    }

    ?>

    <div class="container">
        <header>
            <img src="CarFusion.jpg" alt="Company Logo">
        </header>
        <h2>Car Booking Advance Payment Bill</h2>

        <div class="car-details">
            <div class="car-image">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($image)?>" alt="Car Photo">
            </div>
            <div class="car-info">
                <p><strong>Model:</strong> <?php echo $model; ?></p>
                <p><strong>Body Type:</strong> <?php echo $body_type; ?></p>
                <p><strong>Engine:</strong> <?php echo $engine; ?> cc</p>
                <p><strong>Order Number:</strong> <?php echo $order_id; ?></p>
                <p><strong>Date of Purchasing:</strong> <?php echo $date; ?></p>
                <p><strong>Showroom Price:</strong> <?php echo $price; ?></p>
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
            <h3>Things to Carry at Showroom:</h3>
            <ul>
                <li>Identity proof (PAN Card / Passport / Driving License / Voter ID Card / Aadhar Card)</li>
                <li>Payment receipt</li>
                <li>Passport size photos (3 copies)</li>
                <li>Insurance documents (if any)</li>
                <li>Form 20 (for vehicle registration)</li>
                <li>Trade license (for commercial vehicle purchases)</li>
                <li>Letter of authorization (if someone else is completing the purchase on your behalf)</li>
                <li>Vehicle delivery note</li>
            </ul>
        </div>

        <div class="terms-conditions">
            <h3>Terms and Conditions:</h3>
            <ol>
                <li>The advance payment amounting to 10,000 has been received from the buyer as a token to reserve the selected car.</li>
                <li>This payment is non-refundable.</li>
                <li>The remaining balance must be paid upon the collection of the car.</li>
                <li>In case of cancellation by the buyer, the advance payment will not be refunded.</li>
            </ol>
        </div>

        <div class="total-amount">
            <p><strong>Total Advance Payment:</strong> 10,000</p>
        </div>

        <p>Thank you for choosing CarFusion for your car purchase. If you have any further queries, feel free to contact us at teamcarfusion@gmail.com.</p>

        <!-- Download button -->
        <!-- <div class="download-button">
            <a href="#" download="car_booking_bill.html">Download Bill</a>
        </div> -->
    </div>

</body>

</html>