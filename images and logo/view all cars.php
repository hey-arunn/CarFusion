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
    <title>Browse Cars</title>
    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" href="CarFusion.jpg">
    <link rel="stylesheet" href="view all cars.css">
    
    <!-- <link rel="stylesheet" href="signup.css"> -->
</head>

<body>

    <!-- Header -->
    <?php include('header.php') ?>


    <!-- Sorting Menu -->
    <div class="sorting-div" style="margin-top: 14rem; margin-left: 3rem;">
        <form action="#" method="get">
            <label for="sortby" style="font-size: 2rem;">Sort By :</label>
            <select style="height: 4rem; border:1px solid blue; box-shadow: 1px 1px 10px rgb(0, 191, 255);" id="sort" name="sortby">
                <option value="" selected>Default</option>
                <optgroup label="Price">
                    <option value="lowToHigh">Low To High</option>
                    <option value="highToLow">High To Low</option>
                </optgroup>
                <hr class="dropdown-divider">
                <optgroup label="Categories">
                    <option value="sedan">Sedan</option>
                    <option value="hatchback">HatchBack</option>
                    <option value="suv">SUV</option>
                </optgroup>
                <hr class="dropdown-divider">
                <optgroup label="Brands">
                    <option value="honda">Honda</option>
                    <option value="hyundai">Hyundai</option>
                    <option value="kia">Kia</option>
                    <option value="suzuki">Suzuki</option>
                    <option value="tata">Tata</option>
                    <option value="toyota">Toyota</option>
                    <option value="mahindra">Mahindra</option>
                </optgroup>
            </select>

            <button type="submit" name="filter" class="btn btn-primary" style="height: 4rem; text-align: center; padding-top: .5rem; background-color: blue;">Apply</button>
        </form>
    </div>


    <!-- ----------------------------main body section for cars----------------------------------------  -->
    <div class="color-border" id="buyacar">
        
        <div class="cardflex">
            <!-- Fetch Cars from database -->
            <?php include('fetch_cars_formain.php') ?>
            
        </div>




        
        <!-- ---------------------------------------------footer section--------------------------------------------------------------- -->
        
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
            <p>2,Bhagwan Mahavir unversity</p>
        </div>
        <div class="phonenum"> <i class="fa-solid fa-phone" style="color: #ffffff;"></i>
            <p>&nbsp;8000450949</p>
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



        <script src="login-signup.js"></script>
        <script src="wb.js"></script>


</body>