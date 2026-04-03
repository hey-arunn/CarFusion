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
   
    <div class="container" style="margin-top: 14rem;">
        <h1>About CarFusion</h1>

        <div class="mission-vision">
            <h2>Our Mission</h2>
            <p>At CarFusion, our mission is to provide our customers with a seamless and rewarding car buying journey. We aim to exceed expectations by offering a curated selection of top-notch vehicles, transparent pricing, and exceptional customer service.</p>

            <h2>Our Vision</h2>
            <p>As pioneers in the automotive industry, we envision a future where buying a car is not just a transaction, but an unforgettable experience. Through continuous innovation and a customer-centric approach, we aspire to set new standards of excellence and reshape the way people perceive car dealerships.</p>
        </div>

  <!-- --------------------------------------------cards section---------------------------------------------------------           -->
  <section class="team-section">
    <div class="container">
      <h1>Meet Our Team</h1>
      <div class="team-members" style="display: flex; justify-content: space-between;">
        <!-- Team member 1 -->
        <div class="team-member">
          <img src="images/khushi.jpg" alt="Alex Smith">
          <h4>Khushi Bhalodiya</h4>
          <p>Frontend</p>
          <p>User Site's Frontend designed by me </p>
          <div class="social-icons">
            <a href="https://www.facebook.com/name" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com/name" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com/name" target="_blank"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <!-- Team member 2 -->
        <div class="team-member">
            <img src="images/arun.jpg" alt="Alex Smith">
            <h4>Arun Bharti</h4>
            <p>Backend</p>
            <p>Whole Admin panel and backend was done by me</p>
            <div class="social-icons">
              <a href="https://www.facebook.com/ab_arunn" target="_blank"><i class="fab fa-facebook"></i></a>
              <a href="https://twitter.com/ab_arunn" target="_blank"><i class="fab fa-twitter"></i></a>
              <a href="https://www.instagram.com/ab_arunn" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <!-- Team member 3 -->
        <div class="team-member">
            <img src="images/lawrence.jpg" alt="Alex Smith">
            <h4>Lawrence Cardoza</h4>
            <p>Admin side</p>
            <p>The Admin panel and backend was done by me</p>
            <div class="social-icons">
              <a href="https://facebook.com/name" target="_blank"><i class="fab fa-facebook"></i></a>
              <a href="https://twitter.com/name" target="_blank"><i class="fab fa-twitter"></i></a>
              <a href="https://instagram.com/name" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <!-- Team member 4 -->
        <div class="team-member">
            <img src="images/geeta.jpg" alt="Alex Smith">
            <h4>Geeta Barapatre</h4>
            <p>Informations</p>
            <p>I was contributing through collecting resources and Frontend. </p>
            <div class="social-icons">
              <a href="https://www.facebook.com/name" target="_blank"><i class="fab fa-facebook"></i></a>
              <a href="https://twitter.com/name" target="_blank"><i class="fab fa-twitter"></i></a>
              <a href="https://instagram.com/name" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
      </div>
    </div>
  </section>

        
        <div class="commitment">
            <h2>Our Commitment</h2>
            <p>At CarFusion, integrity, transparency, and customer satisfaction are at the core of everything we do. Whether you're in the market for a sleek sedan, a rugged SUV, or a reliable hatchback, you can trust CarFusion to deliver a premium car buying experience like no other.</p>
        </div>

        <div class="card-section">
            <h2>Why Choose CarFusion?</h2>
            <div class="card">
                <h3>Quality Vehicles</h3>
                <p>Each vehicle in our inventory undergoes rigorous inspections to ensure top quality and reliability.</p>
            </div>
            <div class="card">
                <h3>Transparent Pricing</h3>
                <p>We believe in transparency. Our pricing is upfront and competitive, with no hidden fees or surprises.</p>
            </div>
            <div class="card">
                <h3>Exceptional Service</h3>
                <p>Our team is dedicated to providing personalized service and expert guidance to help you find the perfect car.</p>
            </div>
            <div class="card">
                <h3>Innovative Solutions</h3>
                <p>We leverage the latest technology to enhance your car buying experience and streamline the process.</p>
            </div>
        </div>
    </div>
<footer id="footer">
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
    <a href="google.com"><i class="fa-brands fa-x-twitter" style="color: #ffffff;"></i></a>

</div>
</div>

</footer>
</body>
<script src="wb.js"></script>
<script src="login-signup.js"></script>
</html>

