<?php
include('header.php');
include('sidemenu.php');
include('connection.php');

if (isset($_GET['payment_id'])) {
    $payment_id = $_GET['payment_id'];

    // Fetch payment details with user information and order details
    $sql = "SELECT payments.*, users.user_name, users.user_phone, users.user_email, users.user_city, users.user_state, 
            orders.order_time, orders.details, orders.amount as order_amount, orders.booking_address, orders.pincode,
            cars.car_name, cars.car_brand, cars.car_price
            FROM payments 
            JOIN users ON payments.user_id = users.user_id
            JOIN orders ON payments.order_id = orders.order_id
            LEFT JOIN cars ON orders.car_id = cars.car_id
            WHERE payments.id = $payment_id";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $payment = $result->fetch_assoc();
    } else {
        echo "<script>alert('Payment not found'); window.location.href='payments.php';</script>";
        exit;
    }
} else {
    header("Location: payments.php");
    exit;
}
?>

<style>
    .payment-details-container {
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin: 20px;
    }
    .payment-details-section {
        margin-bottom: 30px;
    }
    .payment-details-section h3 {
        color: #333;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    .detail-row {
        display: flex;
        margin-bottom: 15px;
    }
    .detail-label {
        width: 200px;
        font-weight: bold;
        color: #666;
    }
    .detail-value {
        flex: 1;
    }
    .back-button {
        margin: 20px;
    }
</style>

<div class="content">
    <?php include('top_bar.php'); ?>
    
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Payment Details #<?php echo $payment_id; ?>
        </h2>
    </div>
    
    <div class="payment-details-container">
        <div class="payment-details-section">
            <h3>Payment Information</h3>
            <div class="detail-row">
                <div class="detail-label">Payment ID:</div>
                <div class="detail-value"><?php echo $payment['id']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Payment Date:</div>
                <div class="detail-value"><?php echo $payment['dt']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Payment Mode:</div>
                <div class="detail-value"><?php echo $payment['mode']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Amount Paid:</div>
                <div class="detail-value">₹<?php echo $payment['amount']; ?></div>
            </div>
        </div>

        <div class="payment-details-section">
            <h3>Order Information</h3>
            <div class="detail-row">
                <div class="detail-label">Order ID:</div>
                <div class="detail-value"><?php echo $payment['order_id']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Order Date:</div>
                <div class="detail-value"><?php echo $payment['order_time']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Order Type:</div>
                <div class="detail-value"><?php echo $payment['details']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Order Amount:</div>
                <div class="detail-value">₹<?php echo $payment['order_amount']; ?></div>
            </div>
        </div>

        <div class="payment-details-section">
            <h3>Customer Information</h3>
            <div class="detail-row">
                <div class="detail-label">Name:</div>
                <div class="detail-value"><?php echo $payment['user_name']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Phone:</div>
                <div class="detail-value"><?php echo $payment['user_phone']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Email:</div>
                <div class="detail-value"><?php echo $payment['user_email']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Location:</div>
                <div class="detail-value"><?php echo $payment['user_city'] . ', ' . $payment['user_state']; ?></div>
            </div>
        </div>

        <?php if($payment['car_name']): ?>
        <div class="payment-details-section">
            <h3>Car Information</h3>
            <div class="detail-row">
                <div class="detail-label">Car Brand:</div>
                <div class="detail-value"><?php echo $payment['car_brand']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Car Name:</div>
                <div class="detail-value"><?php echo $payment['car_name']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Car Price:</div>
                <div class="detail-value">₹<?php echo $payment['car_price']; ?></div>
            </div>
        </div>
        <?php endif; ?>

        <div class="payment-details-section">
            <h3>Additional Information</h3>
            <div class="detail-row">
                <div class="detail-label">Booking Address:</div>
                <div class="detail-value"><?php echo $payment['booking_address']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Pincode:</div>
                <div class="detail-value"><?php echo $payment['pincode']; ?></div>
            </div>
        </div>
    </div>
    
    <div class="back-button">
        <a href="payments.php" class="btn btn-secondary">Back to Payments</a>
    </div>
</div>

<script src="dist/js/app.js"></script>
</body>
</html> 