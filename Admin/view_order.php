<?php
include('header.php');
include('sidemenu.php');
include('connection.php');

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Fetch order details with user information and car details
    $sql = "SELECT orders.*, users.user_name, users.user_phone, users.user_email, users.user_city, users.user_state, 
            cars.car_name, cars.car_brand, cars.car_price, cars.engine_cc, cars.mileage, cars.transmission, 
            cars.fuel_type, cars.seats, cars.category, cars.cylinders, cars.torque, cars.tank_capacity
            FROM orders 
            JOIN users ON orders.customer_id = users.user_id
            LEFT JOIN cars ON orders.car_id = cars.car_id
            WHERE orders.order_id = $order_id";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
    } else {
        echo "<script>alert('Order not found'); window.location.href='orders.php';</script>";
        exit;
    }
} else {
    header("Location: orders.php");
    exit;
}
?>

<style>
    .order-details-container {
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin: 20px;
    }
    .order-details-section {
        margin-bottom: 30px;
    }
    .order-details-section h3 {
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
    .car-specs-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    .car-spec-item {
        display: flex;
        margin-bottom: 10px;
    }
    .car-spec-label {
        width: 150px;
        font-weight: bold;
        color: #666;
    }
    .car-spec-value {
        flex: 1;
    }
</style>

<div class="content">
    <?php include('top_bar.php'); ?>
    
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Order Details #<?php echo $order_id; ?>
        </h2>
    </div>
    
    <div class="order-details-container">
        <div class="order-details-section">
            <h3>Order Information</h3>
            <div class="detail-row">
                <div class="detail-label">Order ID:</div>
                <div class="detail-value"><?php echo $order['order_id']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Order Date:</div>
                <div class="detail-value"><?php echo $order['order_time']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Order Type:</div>
                <div class="detail-value"><?php echo $order['details']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Amount:</div>
                <div class="detail-value">₹<?php echo $order['amount']; ?></div>
            </div>
        </div>

        <div class="order-details-section">
            <h3>Customer Information</h3>
            <div class="detail-row">
                <div class="detail-label">Name:</div>
                <div class="detail-value"><?php echo $order['user_name']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Phone:</div>
                <div class="detail-value"><?php echo $order['user_phone']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Email:</div>
                <div class="detail-value"><?php echo $order['user_email']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Location:</div>
                <div class="detail-value"><?php echo $order['user_city'] . ', ' . $order['user_state']; ?></div>
            </div>
        </div>

        <?php if($order['car_id']): ?>
        <div class="order-details-section">
            <h3>Car Information</h3>
            <div class="detail-row">
                <div class="detail-label">Car Brand:</div>
                <div class="detail-value"><?php echo $order['car_brand']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Car Name:</div>
                <div class="detail-value"><?php echo $order['car_name']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Car Price:</div>
                <div class="detail-value">₹<?php echo $order['car_price']; ?></div>
            </div>
            
            <h4 style="margin-top: 20px; margin-bottom: 15px;">Car Specifications</h4>
            <div class="car-specs-grid">
                <div class="car-spec-item">
                    <div class="car-spec-label">Category:</div>
                    <div class="car-spec-value"><?php echo $order['category']; ?></div>
                </div>
                <div class="car-spec-item">
                    <div class="car-spec-label">Engine Capacity:</div>
                    <div class="car-spec-value"><?php echo $order['engine_cc']; ?> cc</div>
                </div>
                <div class="car-spec-item">
                    <div class="car-spec-label">Mileage:</div>
                    <div class="car-spec-value"><?php echo $order['mileage']; ?> km/l</div>
                </div>
                <div class="car-spec-item">
                    <div class="car-spec-label">Torque:</div>
                    <div class="car-spec-value"><?php echo $order['torque']; ?> Nm</div>
                </div>
                <div class="car-spec-item">
                    <div class="car-spec-label">Transmission:</div>
                    <div class="car-spec-value"><?php echo $order['transmission']; ?></div>
                </div>
                <div class="car-spec-item">
                    <div class="car-spec-label">Fuel Type:</div>
                    <div class="car-spec-value"><?php echo $order['fuel_type']; ?></div>
                </div>
                <div class="car-spec-item">
                    <div class="car-spec-label">Seats:</div>
                    <div class="car-spec-value"><?php echo $order['seats']; ?></div>
                </div>
                <div class="car-spec-item">
                    <div class="car-spec-label">Cylinders:</div>
                    <div class="car-spec-value"><?php echo $order['cylinders']; ?></div>
                </div>
                <div class="car-spec-item">
                    <div class="car-spec-label">Tank Capacity:</div>
                    <div class="car-spec-value"><?php echo $order['tank_capacity']; ?> L</div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="order-details-section">
            <h3>Additional Information</h3>
            <div class="detail-row">
                <div class="detail-label">Booking Address:</div>
                <div class="detail-value"><?php echo $order['booking_address']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Pincode:</div>
                <div class="detail-value"><?php echo $order['pincode']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">License Number:</div>
                <div class="detail-value"><?php echo $order['license_num']; ?></div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Aadhaar Number:</div>
                <div class="detail-value"><?php echo $order['aadhaar_num']; ?></div>
            </div>
        </div>
    </div>

    <div class="back-button">
        <a href="orders.php" class="btn btn-secondary">Back to Orders</a>
    </div>
</div>

<script src="dist/js/app.js"></script>
</body>
</html> 