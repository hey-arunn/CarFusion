<?php session_start();
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first')</script>";
    echo "<script>window.location.href = 'index.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>wheels and bytes : a journey through our automobile website</title>
    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" href="CarFusion.jpg">
    <link rel="stylesheet" href="h&f with user_icon.css">
    <link rel="stylesheet" href="whislist.css">
</head>

<body>
    <!-- header section  -->
    <header class="header">
        <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
        <a href="index.php">
            <div class="logop"><img src="CarFusion.jpg" alt=""></div>
        </a>
        <!-- <a href="#" class="logo"><span>WHEELS</span> <span id="logospan">&</span> BYTES</a> -->
        <!-- <div class="i"><i class="fa-solid fa-car-side"></i></div> -->
        <!-- navbar start  -->
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="view all cars.php">Buy A Car</a>
            <!-- <a href="#sellacar">Sell A Car</a> -->
            <a href="#carservice">Car Subcription</a>
            <a href="aboutus.php">About Us</a>
        </nav>
        <div class="user-panel" id="user-panel">
            <div id="user-icon">
                <!-- humburger icon -->
                <img src="user.png" style="width: 6rem; height: 6rem;" alt="">
            </div>
            <div class="usermenu">
                <!-- menu for user -->
                <a href=""><?php echo $_SESSION['user_name'] ?></a>
                <a href="myprofile.php">My Profile</a>
                <a href="mybooking.php">My Booking</a>
                <a href="my_orders.php">My Orders</a>
                <a href="wishlist.php">Wishlist</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>


        <!-- navbar end  -->
    </header>

    <div id="wishlist">
        <!-- Wishlist content will be dynamically added here -->
        <?php

        include("connection.php");
        $user_id = $_SESSION['user_id'];

        $wish_query = "SELECT cars.car_id, cars.car_name, cars.car_brand, cars.engine_cc, cars.car_price, cars.mileage, cars.image_front
            FROM wishlist
            INNER JOIN cars ON wishlist.car_id = cars.car_id
            WHERE wishlist.user_id = $user_id";

        $result = mysqli_query($conn, $wish_query);
        while ($row = mysqli_fetch_assoc($result)) {
            
            $id = $row['car_id'];
            echo '<div class="card" id="move">
                <img alt="' . $row['car_name'] . '" src="data:image/jpeg;base64,' . base64_encode($row['image_front']) . '">
                <div class="card-body">
                    <div class="title">
                        <h5>' . $row['car_brand'] . ' ' . $row['car_name'] . '</h5>
                        <a href="remove_from_wishlist.php?car_id='. $id .'">
                        <i class="fa-solid fa-xmark"></i></a>
                    </div>
                    <p><i class="fa-solid fa-indian-rupee-sign"></i><strong id="price-id">Price : </strong> ₹ ' . $row['car_price'] . '*<br><div class="engine-class"> <img src="car-engine_2061956.png"  alt="">
                        <strong>Engine : </strong> ' . $row['engine_cc'] . '</div><br><div  class="mileage-class"> <img src="mileage.jpg" alt="">
                        <strong>Mileage : </strong> ' . $row['mileage'] . '</p></div>
                    <div class="btnnow">
                        <a href="book now.php" class="btnbook">Book Now</a>
                        <a href="preview.php?car_id=' . $id . '" class="moreinfo"> Know more</a>
                    </div></div></div>';
        }

        mysqli_close($conn);
        ?>
    </div>


    <p></p>
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

                    <p id="main-para">CarFusion, we're driven by a passion for innovation at the intersection
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
                <a href="google.com"><i class="fa-brands fa-x-twitter" style="color: #ffffff;"></i></a>

            </div>
        </div>
    </footer>


    <script src="wb.js"></script>
    <script>
        document.querySelector('#user-icon').onclick = () => {
            const userMenu = document.querySelector('.usermenu');
            if (userMenu.classList.contains('active')) {
                userMenu.classList.remove('active');
            } else {
                userMenu.classList.add('active');
            }
        };
        // var heartIcons = document.querySelectorAll('.heart');

        // // Loop through each heart icon
        // heartIcons.forEach(function(icon) {
        //     icon.addEventListener('click', function() {
        //         // Toggle heart icon class
        //         this.classList.toggle('fas');
        //         this.classList.toggle('far');

        //         // Toggle heart icon color
        //         this.classList.toggle('red-heart');
        //     });
        // });
    </script>
</body>