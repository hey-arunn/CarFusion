<?php session_start();

if (isset($_SESSION['user_name'])) {
    // User is logged in, showing user panel
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
    <title>CarFusion : A journey through our automobile website</title>
    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" href="CarFusion.jpg">
    <link rel="stylesheet" href="wb.css">
    <!-- <link rel="stylesheet" href="signup.css"> -->
</head>

<body>

    <!-- ---------------------------------------------header section--------------------------------------------------------------- -->
    <!-- header section start  -->

    <?php
    include("header.php");
    ?>



    <!-- <div class="check"> -->
    <!-- ---------------------------------------------slide images--------------------------------------------------------------- -->

    <div class="parent" id="home">
        <div class="con">
            <img id="slide1" src="slide11.jpg" class="img">
            <img id="slide2" src="slide2.jpg" class="img">
            <img id="slide3" src="slide3.webp" class="img">
            <img id="slide4" src="slide4.jpg" class="img">
            <img id="slide5" src="slide5.png" class="img">
            <div class="slider-nav">
                <a href="#slide1"></a>
                <a href="#slide2"></a>
                <a href="#slide3"></a>
                <a href="#slide4"></a>
                <a href="#slide5"></a>
            </div>
        </div>
    </div>


    <!-- -----------------------------------------company logos ----------------------------------------------------------------------- -->


    <div class="featured-car">
        <h1 style="margin-top: 4rem; text-align: center; font-size: 5rem;">FEATURED CARS</h1>
        <div class="car-logo-container">
            <div class="cars-logos">
                <img src="toyota.jpg" alt="honda-amaze">
            </div>
            <div class="cars-logos">
                <img src="hyundai.jpg" alt="honda-amaze">
            </div>
            <div class="cars-logos">
                <img src="kia.png" alt="honda-amaze">
            </div>
            <div class="cars-logos">
                <img src="honda.jpg" alt="honda-amaze">
            </div>

        </div>
        <!-- 2nd row -->
        <div class="car-container2">
            <div class="cars-logos">
                <img src="suzuki.jpg" alt="honda-amaze">
            </div>
            <div class="cars-logos">
                <img src="Tata-Logo-Wallpaper.webp" alt="honda-amaze">
            </div>
            <div class="cars-logos">
                <img src="mahindra.jpg" alt="honda-amaze">
            </div>

        </div>

    </div>
    <!-- -----------------------------------------car section for sedan------------------------------------------------------------------- -->
    <!-- for blue border  -->
    <!-- sedan cars  -->


    <h1 style="margin-top: 20rem; text-align: center; font-size: 5rem;">Sedan cars</h1>

    <div class="color-border" id="buyacar">
        <!-- <h1 id="addedcar">Recently added Cars</h1> -->
        <div class="cardflex">
            <!-- Fetching 4 Sedan's From Database -->
            <?php include("fetch4sedan.php"); ?>

        </div>
        <div>
            <a href="view all cars.php?sortby=sedan&filter=#"><input type="button" value="View More" class="viewallcar" id="forgot-password-submit"></a>
        </div>
    </div>

    <!------------------------------------card section for hatchback car---------------------------------------------------->


    <h1 style="margin-top:7rem; text-align: center; font-size: 5rem;">Hatchback cars</h1>
    <div class="color-border">
        <!-- <h1 id="addedcar">Recently added Cars</h1> -->
        <div class="cardflex">
            <!-- Fetching 4 Hatchback's From Database -->
        <?php include("fetch4hatchback.php"); ?>
        </div>
        <div>
            <a href="view all cars.php?sortby=hatchback&filter=#"><input type="button" value="View More" class="viewallcar" id="forgot-password-submit"></a>
        </div>
    </div>

    <!----------------------------suv car section ------------------------------------------------------- -->


    <h1 style="margin-top: 7rem; text-align: center; font-size: 5rem;">Suv cars</h1>
    <div class="color-border">
        <!-- <h1 id="addedcar">Recently added Cars</h1> -->
        <div class="cardflex">
            <!-- Fetching 4 SUV's from Database -->
        <?php include("fetch4suv.php"); ?>
        </div>
        <div>
            <a href="view all cars.php?sortby=suv&filter=#"><input type="button" value="View More" class="viewallcar" id="forgot-password-submit"></a>
        </div>
    </div>


    <!--------------------------- subcription ----------------------------------------------------------- -->



    <div class="black-container" id="carservice">
        <div class="main-para">
            <p id="premium">Our Subcription Services</p><br>
        </div>
        <div class="second-para">
            <p id="slogan">We provide safety for our customers </p>

            <!-- -----------------------------------------------premium subcription--------------------------------------------------- -->
            <div class="premium-container">
                <div class="basic">
                    <p id="basic">BASIC</p><br>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Basic warranty coverage for mechanical issues for up to 6 months.</p>
                    <p id="description-of-sub"> <i class="fa-solid fa-check" style="color: #74C0FC;"></i> Access to basic maintenance resources and tips.</p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Limited roadside assistance coverage for 3 months.</p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Pricing: at very low cost for car purchase</p>
                    <div class="basic-sub-btn">
                        <a href="basic.php"><input type="button" value="Rs.1200" class="basic-subcription"></a>
                    </div>
                </div>
                <!-- ------------------------------standard sub card --------------------------------------------------------------------- -->
                <div class="standard">
                    <P id="standard">STANDARD</P>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Extended warranty coverage for mechanical issues for up to 1 year.</p>
                    <p id="description-of-sub"> <i class="fa-solid fa-check" style="color: #74C0FC;"></i> Access to a wider range of maintenance resources and guides.</p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i>Enhanced roadside assistance coverage for 6 months. </p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Priority customer support for any vehicle-related inquiries.</p>
                    <!-- <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Pricing: Available as an add-on for $99 with every car purchase.</p> -->
                    <div class="standard-sub-btn">
                        <a href="standard.php"><input type="button" value="Rs.3000" class="standard-subcription"></a>
                    </div>
                </div>
                <!-------------------------------- premuim sub card ----------------------------------------------- -->
                <div class="premium">
                    <P id="premium">PREMUIM</P>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Extended warranty coverage for mechanical issues for up to 2 years.</p>
                    <p id="description-of-sub"> <i class="fa-solid fa-check" style="color: #74C0FC;"></i> Comprehensive maintenance resources, including scheduled service reminders.</p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i>Premium roadside assistance coverage for 1 year. </p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Dedicated concierge service for personalized assistance with any vehicle-related needs.</p>

                    <div class="premium-sub-btn">
                        <a href="premium.php"><input type="button" value="Rs.7000" class="premium-subcription"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------- footer ------------------- -->

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





    <!-- js file  -->
    <script src="wb.js"></script>
    <script src="login-signup.js"></script>
</body>

</html>