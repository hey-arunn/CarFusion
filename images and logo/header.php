
<header class="header">
    <div id="menu-btn" class="fas fa-bars"></div>
    <a href="index.php">
        <div class="logop"><img src="CarFusion.jpg" alt="" style="width: 20%;"></div>
    </a>
    
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="view all cars.php">Buy A Car</a>
        <a href="subscription.php">Car Subscription</a>
        <!-- <a href="#sellacar">Sell A Car</a> -->
        <a href="aboutus.php">About Us</a>
        
    </nav>
    <!-- navbar end  -->

    <!-- login btn  -->
    <div class="login-btn" id="login-btn">
        <button class="btn">Login</button>
        <i class="far fa-user"></i>
    </div>
    
    <!-- after login or signup -->
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
            <a href="wishlist.php">Whislist</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

</header>
<!-- header section ends -->
<!-- ------------------------------------------------login form--------------------------------------------------------------- -->


<!-- login form  -->

<div class="login-form-container" id="login-form">
    <!-- <span  class="fa-times" ></span> -->
    <!-- <span  class="fa-times" ></span> -->
    <i class="fa-solid fa-x" id="close-login-form"></i>

    <?php
    include("user_verify.php");
    ?>

    
    <form action="" method="post">
        <h3>USER LOGIN</h3>
        <input type="email" placeholder="Email" name="login-email" class="box" id="email" required>
        <!--user icon --> <i class="fa-solid fa-user fa" id="user"></i>
        <!-- eye icon for toggle -->
        <div id="password-img">
            <input type="password" placeholder="PASSWORD " name="login-password" class="box" id="password" required>
            <img src="eye-close.png" id="eyeicon">
        </div>
        <p><a href="reset_password.php">forgot your password?</a></p>
        <input type="submit" value="Continue" class="btn" id="continue-button" name="sbm_btn">
        <p>Don't have an account ?
        <div id="signup">
            <button class="btn">SIGN-UP</button>
        </div>
        </p>
    </form>


</div>

<!-- login form end  -->


<!-- signup form  -->

<div class="signup-form-container1">

    <i class="fa-solid fa-x" id="close-login-form1"></i>
    <?php include 'register_user.php'; ?>
    <form action="" method="post">
        <h3>Sign up</h3>
        <input type="text" placeholder="Name" class="box" name="signup-name" required id="signup-username">
        <span id="error-msg-signup-name"></span>
        <input type="number" placeholder="Mobile Number (10 digits)" name="signup-number" class="box" id="mobile-no" maxlength="10" minlength="10" required>
        <span id="error-msg-mobile-no"></span>
        <input type="email" placeholder="Email" class="box" name="signup-email" spellcheck="false" required id="signup-email">
        <span id="error-msg-signup-email"></span>
        <input type="text" placeholder="State" class="box" name="signup-state" id="signup_state" required>
        <input type="text" placeholder="City" class="box" name="signup-city" id="signup_city" required>
        <input type="text" placeholder="Address" class="box" name="signup-address" id="signup_address" required>
        <!-- eye icon for toggle -->
        <div id="password-img">
            <input type="password" placeholder="password" name="signup-password" class="box" id="signup-pass" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <img src="eye-close.png" id="eyeicon1">
        </div>
        <!-- <input type="checkbox" id="checkbox" > accept the terms of use & privacy policy<br> -->

        <input type="submit" value="SIGN-IN" name="signup-submit" class="btn" id="signup-button">
    </form>
</div>

<!-- ------------------------------------------------forgot password------------------------------------------------------------------ -->


<div class="forgot-password" id="forgot-password">
        <i class="fa-solid fa-x" id="close"></i>
        <form action="#">
            <h3>FORGOT PASSWORD</h3>
            <input type="email" class="box" required placeholder="Email">
            <div class="button-for-otp">
                <input type="submit" value="generate otp" class="btn otp-button" id="generate-otp">
            </div>
            <input type="number" class="box" placeholder="Otp" required>
            <div id="password-img">
                <input type="password" class="box" placeholder="New Password" id="forgot-pass">
                <img src="eye-close.png" id="eyeicon3">
            </div>
            <input type="submit" value="submit" class="btn" id="forgot-password-submit">

        </form>
    </div>