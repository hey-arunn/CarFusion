<?php
session_start();
if(isset($_SESSION['user_name'])){
    // User is logged in, show user panel
    echo "<script> 
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.login-form-container').classList.remove('active');
            document.querySelector('.login-btn').classList.add('remove');
            document.querySelector('#user-panel').classList.add('active');
            
        });
    </script>";
}else{
    // User is not logged in, show login button
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarFusion : About</title>
     <!--font awsome cdn link--> 
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
     <!-- google font  -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
 <link rel="icon" href="CarFusion.jpg"> 
 <link rel="stylesheet" href="aboutus.css">
 <link rel="stylesheet" href="wb.css">
 <style>
  h1{
    font-size: 4rem;
  }
  p,h4{
    font-size: 1.7rem;
  }
  h2{
    font-size: 2rem;
  }
  h3{
    font-size: 2rem;
  }
  .team-member{
    width: 17rem;
  }
  .card-section .card{
    width:93%;
    height:10rem;
  }
  #footer{
    margin-top:-33rem;
  }
 </style>
</head>
<body>
  <?php
  include("header.php");
  ?>


    <div class="black-container" id="carservice">
        <div class="main-para">
            <p id="premium">Our Subscription Services</p><br>
        </div>
        <div class="second-para">
            <p id="slogan">We provide safety for our customers </p>

            <!-- Subscription Plans Container -->
            <div class="premium-container">
                <!-- Basic Plan -->
                <div class="basic">
                    <p id="basic">BASIC</p><br>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Basic warranty coverage for mechanical issues for up to 6 months.</p>
                    <p id="description-of-sub"> <i class="fa-solid fa-check" style="color: #74C0FC;"></i> Access to basic maintenance resources and tips.</p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Limited roadside assistance coverage for 3 months.</p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Pricing: at very low cost for car purchase</p>
                    <div class="basic-sub-btn">
                        <a href="<?php echo isset($_SESSION['user_id']) ? 'basic.php' : 'javascript:alert(\'Please login first\')' ?>">
                            <input type="button" value="Rs.1200" class="basic-subcription">
                        </a>
                    </div>
                </div>

                <!-- Standard Plan -->
                <div class="standard">
                    <P id="standard">STANDARD</P>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Extended warranty coverage for mechanical issues for up to 1 year.</p>
                    <p id="description-of-sub"> <i class="fa-solid fa-check" style="color: #74C0FC;"></i> Access to a wider range of maintenance resources and guides.</p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i>Enhanced roadside assistance coverage for 6 months. </p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Priority customer support for any vehicle-related inquiries.</p>
                    <div class="standard-sub-btn">
                        <a href="<?php echo isset($_SESSION['user_id']) ? 'standard.php' : 'javascript:alert(\'Please login first\')'?>">
                            <input type="button" value="Rs.3000" class="standard-subcription">
                        </a>
                    </div>
                </div>

                <!-- Premium Plan -->
                <div class="premium">
                    <P id="premium">PREMUIM</P>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Extended warranty coverage for mechanical issues for up to 2 years.</p>
                    <p id="description-of-sub"> <i class="fa-solid fa-check" style="color: #74C0FC;"></i> Comprehensive maintenance resources, including scheduled service reminders.</p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i>Premium roadside assistance coverage for 1 year. </p>
                    <p id="description-of-sub"><i class="fa-solid fa-check" style="color: #74C0FC;"></i> Dedicated concierge service for personalized assistance with any vehicle-related needs.</p>
                    <div class="premium-sub-btn">
                        <a href="<?php echo isset($_SESSION['user_id']) ? 'premium.php' : 'javascript:alert(\'Please login first\')'?>">
                            <input type="button" value="Rs.7000" class="premium-subcription">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        // User menu dropdown functionality
        document.querySelector('#user-icon').onclick = () => {
            document.querySelector('.usermenu').classList.toggle('active');
        }

        // Login form functionality
        document.querySelector('#login-btn').onclick = () => {
            document.querySelector('.login-form-container').classList.add('active');
            document.querySelector('.signup-form-container1').classList.remove('active');
        }
        
        document.querySelector('#close-login-form').onclick = () => {
            document.querySelector('.login-form-container').classList.remove('active');
        }

        // Signup form functionality
        document.querySelector('#signup').onclick = () => {
            document.querySelector('.signup-form-container1').classList.add('active');
            document.querySelector('.login-form-container').classList.remove('active');
        }
        
        document.querySelector('#close-login-form1').onclick = () => {
            document.querySelector('.signup-form-container1').classList.remove('active');
        }

        // Password visibility toggle for login
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");
        eyeicon.onclick = function() {
            if(password.type == "password") {
                password.type = "text";
                eyeicon.src = "eye-open.png";
            } else {
                password.type = "password";
                eyeicon.src = "eye-close.png";
            }
        }

        // Password visibility toggle for signup
        let eyeicon1 = document.getElementById("eyeicon1");
        let signupPass = document.getElementById("signup-pass");
        eyeicon1.onclick = function() {
            if(signupPass.type == "password") {
                signupPass.type = "text";
                eyeicon1.src = "eye-open.png";
            } else {
                signupPass.type = "password";
                eyeicon1.src = "eye-close.png";
            }
        }

        // Show login form if not logged in
        <?php if (!isset($_SESSION['user_id'])) { ?>
            // Uncomment below line to show login form immediately when page loads
            // document.querySelector('.login-form-container').classList.add('active');
        <?php } ?>
    </script>
</body>
</html> 