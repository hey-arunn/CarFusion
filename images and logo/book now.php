<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first')</script>";
    echo "<script>window.location.href = 'index.php'; </script>";
}else{
    echo "<script> 
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.login-form-container').classList.remove('active');
            document.querySelector('.login-btn').classList.add('remove');
            document.querySelector('#user-panel').classList.add('active');
            
        });
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" href="CarFusion.jpg">
    <link rel="stylesheet" href="book now.css">
    <!-- <link rel="stylesheet" href="wb.css"> -->
    <!-- <link rel="stylesheet" href="signup.css"> -->
</head>

<body>
    <!-- -------------------------------------header section-------------------------------  -->
    <?php include("header.php"); ?>
    <!-- header section ends -->
    <!-- ------------------------------------------------login form--------------------------------------------------------------- -->
    
    <!-- -----------------------------------------main body-------------------------------------------------- -->


    <div class="book-now-div">

        <?php

        include("connection.php");

        $user_id = $_SESSION['user_id'];
        $fetch_query = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $fetch_query);
        $row = mysqli_fetch_assoc($result);
        $name = $row['user_name'];
        $number = $row['user_phone'];
        $email = $row['user_email'];
        $address = $row['user_address'];
        $city = $row['user_city'];
        $state = $row['user_state'];

        if (isset($_POST['book-now-continue'])) {
            
                
                $car_id = $_GET['car_id'];
                $name = $_POST['book-now-name'];
                $number = $_POST['book-now-number'];
                $email = $_POST['book-now-email'];
                $license = $_POST['book-now-license'];
                $address = $_POST['book-now-address'];
                $altnumber = $_POST['book-now-altnumber'];
                $pincode = $_POST['book-now-pincode'];
                $aadhar = $_POST['book-now-aadhar'];
                $pincode = $_POST['book-now-pincode'];

                $insert_query = "INSERT INTO `orders`(`customer_id`, `car_id`, `amount`, `aadhaar_num`, `license_num`, `booking_address`, `pincode`, details) VALUES ('$user_id','$car_id',10000,'$aadhar','$license','$address','$pincode', 'Car Booking')";
                $result = mysqli_query($conn, $insert_query);
                $order_id = mysqli_insert_id($conn);
                if ($result) {
                    echo "<script>alert('Details Saved Successfully!');</script>";
                    echo "<script>window.location.href = 'payment book now.php?car_id=".$car_id."&order_id=".$order_id."'; </script>";
                } else {
                    echo mysqli_error($conn);
                }


                
        }

        ?>

        <form action="" method="POST">
            <h3>Booking Details</h3>

            <input type="text" placeholder="Name" class="booking-detail " name="book-now-name" value="<?php echo $name; ?>" required id="book-detail-name"> <br>


            <input type="number" placeholder="Mobile Number" name="book-now-number " class="booking-detail" id="" maxlength="10" minlength="10" value="<?php echo $number; ?>" required> <br>


            <input type="number" placeholder="Alternate Number (if any)" name="book-now-altnumber " class="booking-detail" id="" maxlength="10" minlength="10"> <br>

            <input type="email" placeholder="Email" class="booking-detail" name="book-now-email" value="<?php echo $email; ?>" required id=""><br>

            <input type="text" placeholder="Driving License number (if any)" class="booking-detail " name="book-now-license"><br>


            <input type="text" placeholder="Aadhaar Card number" class="booking-detail" name="book-now-aadhar" required><br>


            <input type="text" placeholder="Address" class="booking-detail" value="<?php echo $address.' '.$city.' '.$state; ?>" name="book-now-address" required><br>

            <input type="number" name="book-now-pincode" placeholder="Pincode" class="booking-detail"><br>


            <!-- <div class="continue"> -->
            <input type="submit" value="Continue" class="continue" name="book-now-continue">
            <!-- Changed input type="button" to type="button" -->
            <!-- <button id="continue-button" class="continue" name="book-now-continue">Continue</button> -->


        </form>



    </div>
    <div class="note">
        <p>
        <h3>Note: You have to have pay only booking amount(charges) now </h3>
        </p>
    </div>
    <!-- ----------------------------------------footer--------------------------------------------- -->
    <footer>
        <div class="footer-main-container" id="contactus">

            <div class="footer-flex-container">
                <div class="company-logo">
                    <p id="product">Products</p>
                    <p id="product-names">Toyota <br>
                        Maruti suzuki <br>
                        Kia <br>
                        Honda <br>
                        Hunydai <br>
                        Tata <br>
                        Mahindra
                    </p>
                </div>

                <div class="about-company">
                    <p id="about-company-descption">
                        About the company
                    </p>

                    <p id="main-para">At CarFusion, we're driven by a passion for innovation at the intersection
                        of automotive excellence and cutting-edge technology.
                        As industry leaders, we specialize in revolutionizing the way people
                        interact with vehicles through our advanced software solutions, intuitive applications, and smart device
                        integration.

                    </p>
                </div>

                <div class="address-company">
                    <p id="contact-us">Contact Us</p>
                    <div class="location"> <i class="fa-solid fa-location-dot" style="color: #ffffff;"></i>
                        <p>2,Bhagwan Mahavir University</p>
                    </div>
                    <div class="phonenum"> <i class="fa-solid fa-phone" style="color: #ffffff;"></i>
                        <p>8000450949</p>
                    </div>
                    <div class="email"> <i class="fa-regular fa-envelope" style="color: #ffffff;"></i>
                        <p> <a href="#" style="color: #ffffff;">ourteamcarfusion@gmail.com </a></p>
                    </div>
                </div>

            </div>
            <div class="social-media-box">
                <a href="#"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>
                <a href="#"> <i class="fa-brands fa-facebook" style="color: #ffffff;"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter" style="color: #ffffff;"></i></a>

            </div>
        </div>
    </footer>

    <script src="wb.js"></script>
    <script src="login-signup.js"></script>


</body>