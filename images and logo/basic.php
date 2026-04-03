<?php session_start();
if (!isset($_SESSION['user_id'])) {

    echo "<script>alert('Please Login First')</script>";
    echo "<script>window.location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Subscription</title>
    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- google font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" href="CarFusion.jpg">
    <link rel="stylesheet" href="payment book now.css">
    <!-- <link rel="stylesheet" href="signup.css"> -->
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
            <a href="index.php">Car Subcription</a>
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
                <a href="wishlist.php">Wishlist</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>

        <!-- navbar end  -->
    </header>

    
    <div class="main-container">
        <div class="payment-container">
            <div class="payable-amount">
                <p id="amount">Total amount payable</p>
                <p id="green"> Rs.1200</p>
            </div>
            <p id="choose-pay"> Choose a Payment option </p>

            <div class="credit-card" id="credit-card-btn">
                <div class="icon"><i class="fa-regular fa-credit-card"></i></div>
                <p>Credit card</p>
            </div>
            <div class="debit-card" id="debit-card-btn">
                <div class="icon">
                    <i class="fa-regular fa-credit-card"></i>
                </div>
                <p>Debit card</p>
            </div>
            <div class="upi-form-btn">
                <div class="upi-img"><img src="upi icon.jpg" style="width: 3rem;  height: 2.5rem; padding-left: 0.1rem;" alt=""></div>
                <p>UPI</p>

            </div>
        </div>
        <div class="payment-detail-conatiner">
            <!-- -------------------------------------------credit card form -------------------------------------------------- -->
            <div class="credit">
                <h2>Credit card</h2>
                <form action="order_processing.php?mode=credit_card&amount=1200" method="post" id="payment-form">
                    <label for="card-holder-name">Card Holder's Name</label>
                    <input type="text" id="card-holder-name" name="card-holder-name" placeholder="Name" required>
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9012 3456" maxlength="16" minlength="16" required>
                    <div class="row">
                        <label for="expiry-date" id="exp1">Expiry Date</label>
                        <input type="date" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>
                        <label for="cvv" id="cvv1">CVV</label>
                        <input type="text" id="cvv" name="cvv" placeholder="123" required>
                    </div>
                    <label for="amount">Amount</label>
                    <input type="text" id="amount" name="amount" placeholder="1200.00" readonly>
                    <button type="submit">Pay Now</button>
                </form>
            </div>
            <!-- -------------------------------debit card--------------------------------------------------------- -->
            <div class="debit">
                <h2>Debit Card</h2>
                <form action="order_processing.php?mode=debit_card&amount=1200" method="post" id="payment-form">
                    <label for="card-holder-name">Card Holder's Name</label>
                    <input type="text" id="card-holder-name" name="card-holder-name" placeholder="Name" required>
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9012 3456" maxlength="16" minlength="16" required>
                    <div class="row">
                        <label for="expiry-date" id="exp1">Expiry Date</label>
                        <input type="date" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>
                        <label for="cvv" id="cvv1">CVV</label>
                        <input type="text" id="cvv" name="cvv" placeholder="123" required>
                    </div>
                    <label for="amount">Amount</label>
                    <input type="text" id="amount" name="amount" placeholder="1200.00" readonly>
                    <button type="submit">Pay Now</button>
                </form>
            </div>

            <!-- -------------------------------------------upi form------------------------------------------------------ -->
            <div class="upi-form">
                <h2>UPI Payment Form</h2>
                <form action="order_processing.php?mode=upi&amount=1200" method="post">
                    <label for="amount">Amount:</label><br>
                    <input type="number" id="amount" name="amount" value="1200" readonly><br>

                    <label for="upi_id">UPI ID:</label><br>
                    <div class="upi-input">
                        <input type="text" id="upi_id" name="upi_id" value="" required>
                        <span class="upi-prefix">@upi</span>
                    </div>

                    <input type="submit" value="Pay Now">
                </form>
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
                <a href="google.com"><i class="fa-brands fa-x-twitter" style="color: #ffffff;"></i></a>

            </div>
        </div>
    </footer>


    <script>
        //     document.querySelector('#debit-card-btn').onclick = (event) => {
        //         // alert("h");
        //     event.preventDefault(); // Prevent the default form submission behavior
        //     document.querySelector('debit').classList.toggle('active');

        // }
        document.addEventListener('DOMContentLoaded', function() {
            const debitCardBtn = document.querySelector('#debit-card-btn');
            const creditCardBtn = document.querySelector('#credit-card-btn');
            const debitForm = document.querySelector('.debit');
            const creditForm = document.querySelector('.credit');
            const payment_option = document.querySelector('.payment-container');
            const upi_form_btn = document.querySelector('.upi-form-btn');
            const upi_form = document.querySelector('.upi-form');


            // Function to show debit card form
            debitCardBtn.addEventListener('click', function(event) {
                event.preventDefault();
                debitForm.classList.add('active');
                creditForm.classList.add('active');
                payment_option.classList.add('active');
                upi_form.classList.remove('active');


            });

            // Function to show credit card form
            creditCardBtn.addEventListener('click', function(event) {
                event.preventDefault();
                creditForm.classList.remove('active');
                debitForm.classList.remove('active');
                upi_form.classList.remove('active');

            });
            upi_form_btn.addEventListener('click', function(event) {
                event.preventDefault();
                creditForm.classList.add('active');
                debitForm.classList.remove('active');
                upi_form.classList.add('active');
            });

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
</body>