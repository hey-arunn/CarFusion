<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    echo "<script>alert('Please login first')</script>";
    echo "<script>window.location.href = 'index.php'; </script>";
    exit; // Stop further execution
} else {
    echo "<script> 
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.login-form-container').classList.remove('active');
            document.querySelector('.login-btn').classList.add('remove');
            document.querySelector('#user-panel').classList.add('active');
        });
    </script>";
}

// Don't include connection.php here, it will be included after header.php
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - CarFusion</title>
    <!--font awsome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" href="CarFusion.jpg">
    <link rel="stylesheet" href="wb.css">
    <style>
        .order-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }
        .order-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }
        .order-header {
            background: #f8f9fa;
            padding: 15px 20px;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .order-body {
            padding: 20px;
        }
        .status-badge {
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 14px;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-accepted {
            background-color: #d4edda;
            color: #155724;
        }
        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }
        .order-details {
            margin-top: 15px;
        }
        .order-amount {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .order-date {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .order-address {
            margin-top: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        .section-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #2c3e50;
        }
        .no-orders {
            text-align: center;
            padding: 40px;
            background: #f8f9fa;
            border-radius: 10px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="order-container">
        <h2 class="section-title">My Orders</h2>

        <?php
        // Include connection after header to ensure fresh connection
        include 'connection.php';
        
        $query = "SELECT * FROM orders WHERE customer_id = ? ORDER BY order_time DESC";
        $stmt = $conn->prepare($query);
        
        if ($stmt) {
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Get status badge class
                    $status_class = 'status-' . $row['order_status'];
                    $status_text = ucfirst($row['order_status']);

                    echo '<div class="order-card">';
                    echo '<div class="order-header">';
                    echo '<h3>Order #' . $row['order_id'] . '</h3>';
                    echo '<span class="status-badge ' . $status_class . '">' . $status_text . '</span>';
                    echo '</div>';
                    echo '<div class="order-body">';
                    echo '<div class="order-amount">₹' . number_format($row['amount'], 2) . '</div>';
                    echo '<div class="order-date">Ordered on: ' . date('F j, Y, g:i a', strtotime($row['order_time'])) . '</div>';
                    echo '<div class="order-details">';
                    echo '<h4>Order Details:</h4>';
                    echo '<p>' . $row['details'] . '</p>';
                    
                    // Add message for rejected orders
                    if ($row['order_status'] == 'rejected') {
                        echo '<div class="rejection-message" style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin: 10px 0;">';
                        echo '<p><strong>Important Notice:</strong> Please note that the advanced fee is non-refundable in accordance with the terms of the agreement.</p>';
                        echo '</div>';
                    }
                    
                    if (!empty($row['booking_address'])) {
                        echo '<div class="order-address">';
                        echo '<h4>Delivery Address:</h4>';
                        echo '<p>' . $row['booking_address'];
                        if (!empty($row['pincode'])) {
                            echo ' - ' . $row['pincode'];
                        }
                        echo '</p>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="no-orders">';
                echo '<h3>No Orders Found</h3>';
                echo '<p>You haven\'t placed any orders yet.</p>';
                echo '</div>';
            }
            
            // Close the statement
            $stmt->close();
        } else {
            echo '<div class="no-orders">';
            echo '<h3>Error</h3>';
            echo '<p>Unable to fetch orders at this time. Please try again later.</p>';
            echo '</div>';
        }
        
        // Close the connection at the end
        $conn->close();
        ?>
    </div>

    <script src="wb.js"></script>
    <script src="login-signup.js"></script>
</body>
</html> 