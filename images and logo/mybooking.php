<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    echo "<script>alert('Please login first')</script>";
    echo "<script>window.location.href = 'index.php'; </script>";
    exit; // Stop further execution
}else{
    echo "<script> 
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.login-form-container').classList.remove('active');
            document.querySelector('.login-btn').classList.add('remove');
            document.querySelector('#user-panel').classList.add('active');
            
        });
    </script>";
}

// Include your database connection file
include("connection.php");

// Fetch user ID from session
$user_id = $_SESSION['user_id'];

// Query to fetch orders of the user
$order_query = "SELECT * FROM orders WHERE customer_id = $user_id";

// Execute the query
$result = mysqli_query($conn, $order_query);
if (!$result) {
    echo mysqli_error($conn);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders</title>
    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" href="CarFusion.jpg">
    <link rel="stylesheet" href="wb.css">
    <!-- <link rel="stylesheet" href="payment book now.css"> -->
    <!-- <link rel="stylesheet" href="signup.css"> -->
    <!-- CSS styles -->
    <style>
        /*     
.card-section p {
   
} */
        .cards {
            margin-top: 13rem;
            margin-left: 3rem;
            margin-right: 5rem;
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
        }

        .cards p {
            font-size: 2rem;
            margin-top: 1rem;
        }

        .cards:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.5);
        }

        .img-product {
            display: flex;
            gap: 3rem;
        }

        img {
            height: 6rem;
            width: 10rem;
        }

        .price p {
            font-size: 1.5rem;
        }

        i {
            font-size: 1.3rem;
            margin-right: .5rem;
        }

        .order p {
            font-size: 1.3rem;
        }

        #accepted {
            margin-top: -.5rem;
        }

        #insurance-card {
            margin-top: 2rem;
        }

        a {
            font-size: 1.5rem;
            color: red;
        }
    </style>
    
</head>

<body>

    <!-- Header -->
    <?php include 'header.php'; ?>

    <!-- Display user orders -->
    <?php
    include("connection.php");
    // Check if there are any orders
    if (mysqli_num_rows($result) > 0) {
        // Loop through each order and display them
        while ($row = mysqli_fetch_assoc($result)) {

            $order_details = $row['details'];
            $amount = $row['amount'];

            //Checking order type
            if ($order_details == 'Car Booking') {
                $car_id = $row['car_id'];
                $car_query = "SELECT * FROM cars WHERE car_id = $car_id";
                $car_result = mysqli_query($conn, $car_query);
                $car_row = mysqli_fetch_assoc($car_result);
                if (!$car_result) {
                    echo mysqli_error($conn);
                }
                $name = ucwords($car_row['car_brand'] . ' ' . $car_row['car_name']);
                $price = $car_row['car_price'];


                echo "<div class='cards'>";
                echo "<div class='img-product'>";
                echo '<img alt="' . $car_row['car_name'] . '" src="data:image/jpeg;base64,' . base64_encode($car_row['image_front']) . '">';
                echo "<p>" . $name . "</p>";
                echo "</div>";
                echo "<div class='price'>";
                echo "<p><i class='fa-solid fa-indian-rupee-sign'></i>" . $price . "</p>";
                echo "</div>";
                echo "<div class='order'>";
                echo "<p>Order Date: " . $row['order_time'] . "</p>";
                // echo "<p id='accepted'>" . $row['order_status'] . "</p>";
                echo "<a href='view_bill_cars.php?user_id=".$user_id."&car_id=".$car_id."&order_id=" . $row['order_id'] . "'>View Bill</a>";
                echo "</div>";
                echo "</div>";
            } elseif ($order_details == 'Premium_subscription' || $order_details == 'Standard_subscription' || $order_details == 'Basic_subscription') {

                echo "<div class='cards'>";
                echo "<div class='img-product'>";
                echo "<img src='insurance.jpg' alt=''>";
                echo "<p>" . $order_details . "</p>";
                echo "</div>";
                echo "<div class='price'>";
                echo "<p><i class='fa-solid fa-indian-rupee-sign'></i>" . $amount . "</p>";
                echo "</div>";
                echo "<div class='order'>";
                echo "<p>Order Date: " . $row['order_time'] . "</p>";
                // echo "<p id='accepted'>" . $row['order_status'] . "</p>";
                echo "<a href='view_bill_subscription.php?user_id=".$user_id."&order_id=" . $row['order_id'] . "'>View Bill</a>";
                echo "</div>";
                echo "</div>";
            }
        }
    } else {

        echo "<script>alert('No orders found')</script>";
        echo "<script>window.location.href = 'index.php'; </script>";
    }

    // Close database connection
    mysqli_close($conn);
    ?>

    <!-- Include JavaScript files -->
    <script src="wb.js"></script>
    <script src="login-signup.js"></script>
</body>

</html>