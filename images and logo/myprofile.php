<?php session_start();
if (!isset($_SESSION['user_id'])) {
    
    echo "<script>alert('Please Login First')</script>";
    echo "<script>window.location.href='index.php'</script>";
}
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <title>wheels and bytes</title> -->
    <title>Edit Profile</title>
    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" href="CarFusion.jpg">

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <!-- <link href='#' rel='stylesheet'> -->
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="myprofile.css">

    <style>
        /* --------------------------------------header------------------------------------------ */
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-shadow: border-box;
            /* background-color: white; */
            text-decoration: none;
            /* display: flex; */
            /* background-color: #232323; */
        }

        html {
            font-size: 62.5%;
            overflow-x: hidden;
            /* scroll-padding-top: 7rem; */
            scroll-behavior: smooth;
        }

        /* header section */
        .header {
            display: flex;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
            align-items: center;
            padding: 3rem 9%;
            border-bottom: .1rem solid rgb(0, 0, 0);
            background-color: white;
            padding-left: -50rem;
            /* box-shadow: 2px 6px 8px rgb(126, 15, 15); */
        }

        /* when we scroll header will active  */
        .header.active {
            box-shadow: 2px 5px 10px grey;
            padding: 2rem 9%;

        }

        /* company logo */

        .logop {
            margin-top: 1rem;
            margin-left: -3rem;
            width: 10rem;
            /* 60 */
            height: 2rem;
            /* 6 */
        }

        .logop img {
            width: 13rem;
            height: 5rem;
            margin-top: -2rem;
        }

        /* logo css end  */

        /* navbar css start  */
        .header .navbar {
            /* padding-left: -25rem; */
            margin-right: 30rem;
            /* width: 20rem; */
        }

        .header .navbar a {
            font-size: 2rem;
            margin: 0 2rem;
            /* margin-left: -3rem; */
            text-decoration: none;
            color: black;
            /* margin-left: 10rem; */
            /* padding-left: 2rem; */
        }

        .navbar #homeanchor {
            margin-left: 10rem;
            padding-right: 2rem;
        }

        .navbar a:hover {
            font-weight: 600;

        }

        /* navbar css end  */



        #new-password.active {
            border: 1px solid red;
            box-shadow: 0 0 9px red;
        }

        */

        /* login btn remove  after login/signup  */
        #login-btn.remove {
            margin-top: -100rem;
            opacity: 1;
        }

        /* user panel after login/signup  */
        .user-panel {
            /* display: none; */
            position: absolute;
            right: 14rem;
            top: .6rem;
            opacity: 1;
            /* z-index: 111; */
            /* top:3.9rem; */

        }

        #user-icon {
            /* position: absolute; */
            font-size: 3rem;
            cursor: pointer;
            margin-top: 2.2rem;
            /* left: -2rem; */
            /* z-index: 111; */

        }

        .usermenu {
            /* display: none; */
            right: 3rem;
            position: absolute;
            /* z-index: 111; */
            top: -90rem;
            /* top: 30px; */
            /* right: -9rem; */
            /* left: -9rem; */
            /* background-color: #fff; */
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
            padding: 10px;
            border-radius: 5px;
            background-color: #ffffff;
            /* display: none; */
            width: 12rem;
        }

        .usermenu a {
            display: block;
            border-bottom: .01px solid rgb(0, 0, 0);
            padding: 10px;
            /* width: 100%; */
            text-decoration: none;
            color: #000000;
            z-index: 1000;
            font-size: 1.5rem;
        }

        .usermenu a:hover {
            background-color: black;
            color: white;
            /* rgb(65, 65, 137); */
        }

        .user-panel.active {
            opacity: 1;
            top: 3.6rem;
        }

        .usermenu.active {
            top: 7rem;
            opacity: 1;
        }
    </style>


</head>

<body className='snippet-body' style="margin-top: 20rem;">
    <header class="header">
        <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
        <a href="index.php">
            <div class="logop"><img src="CarFusion.jpg" alt=""></div>
        </a>
        <!-- <a href="#" class="logo"><span>WHEELS</span> <span id="logospan">&</span> BYTES</a> -->
        <!-- <div class="i"><i class="fa-solid fa-car-side"></i></div> -->
        <!-- navbar start  -->
        <nav class="navbar">
            <a href="index.php" id="homeanchor">Home</a>
            <a href="view all cars.php">Buy A Car</a>
            <!-- <a href="#sellacar">Sell A Car</a> -->
            <a href="index.php">Car Subcription</a>
            <a href="aboutus.php">About Us</a>
        </nav>
        <!-- navbar end  -->

        <!-- login btn  -->
        <!-- <div class="login-btn" id="login-btn">
        <button class="btn">Login</button>
        <i class="far fa-user"></i>
    </div> -->
        <!-- afetr login or signup -->
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


    <div class="container rounded bg-white mt-5 mb-5" style="height: 90rem;">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="CarFusion.jpg"><span class="font-weight-bold">CarFusion</span><span class="text-black-50"></span><span> </span></div>
            </div>
            <div class="col-md-9 border-right" style="font-size: 3rem;">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <?php

                        include("connection.php");

                        if (isset($_POST['save_btn'])) {
                            $name = $_POST['name'];
                            $mobile = $_POST['mobile'];
                            $address = $_POST['address'];
                            $password = $_POST['password'];
                            $state = $_POST['state'];
                            $city = $_POST['city'];
                            $email = $_POST['email'];
                            $id = $_SESSION['user_id'];
                            $_SESSION['user_name'] = $name;
                            $query = "UPDATE users SET user_name = '$name', user_email = '$email', user_phone = '$mobile', user_address = '$address', user_password = '$password', user_state = '$state', user_city = '$city' WHERE user_id = '$id'";
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                echo "<script>alert('Profile Updated Successfully')</script>";
                                // header("refresh:0");
                            } else {
                                echo "<script>alert('Profile Not Updated')</script>";
                            }
                        }
                        mysqli_close($conn);

                        ?>
                        <?php include("user_datafetch.php") ?>
                        <form action="myprofile.php" method="post">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" name="name" value="<?php echo isset($name) ? $name : ''; ?>"></div>
                    </div>
                    <div class="row mt-3" style="font-size: 4rem;">
                        <div class="col-md-12">
                            <label class="labels">Mobile Number</label>
                            <input type="number" class="form-control" placeholder="enter phone number" name="mobile" value="<?php echo $mobile; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" placeholder="enter address" name="address" value="<?php echo $address; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Password</label>
                            <input type="text" class="form-control" placeholder="enter password" name="password" value="<?php echo $password; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">State</label>
                            <input type="text" class="form-control" placeholder="enter state" name="state" value="<?php echo $state; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">City</label>
                            <input type="text" class="form-control" placeholder="enter city" name="city" value="<?php echo $city; ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Email ID</label>
                            <input type="email" class="form-control" placeholder="enter email id" name="email" value="<?php echo $email; ?>">
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit" style="font-size: 2rem;" name="save_btn">Save Profile
                        </button>
                    </div>

                    </form>


                </div>
            </div>
        </div>
    </div>

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
                    <p>8000450949</p>
                </div>
                <div class="email"> <i class="fa-regular fa-envelope" style="color: #ffffff;"></i>
                    <p> <a href="#" style="color: #ffffff;">teamcarfusion@gmail.com </a></p>
                </div>
            </div>

        </div>
        <div class="social-media-box">
            <a href="#"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>
            <a href="#"> <i class="fa-brands fa-facebook" style="color: #ffffff;"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter" style="color: #ffffff;"></i></a>

        </div>
    </div>


    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'></script>
    <script type='text/javascript'>
        var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function(e) {
            e.preventDefault();
        });

        document.querySelector('#user-icon').onclick = () => {
            const userMenu = document.querySelector('.usermenu');
            if (userMenu.classList.contains('active')) {
                userMenu.classList.remove('active');
            } else {
                userMenu.classList.add('active');
            }
        };
    </script>


    <script src="login-signup.js"></script>
    <script src="wb.js"></script>

</body>

</html>