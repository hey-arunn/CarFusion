<?php
session_start();
include 'connection.php';

// Set header to return JSON
header('Content-Type: application/json');

// Debug session information
$session_info = [
    'session_id' => session_id(),
    'session_status' => session_status(),
    'session_data' => $_SESSION,
];

// Check if admin is logged in
if (!isset($_SESSION['admin_name']) || empty($_SESSION['admin_name'])) {
    echo json_encode([
        'success' => false, 
        'message' => 'Admin not logged in',
        'debug' => $session_info
    ]);
    exit();
}

// Check if it's a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Start transaction
    $conn->begin_transaction();
    
    try {
        // Get order ID and status from POST data
        $order_id = isset($_POST['order_id']) ? intval($_POST['order_id']) : 0;
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        
        // Validate inputs
        if ($order_id <= 0) {
            throw new Exception('Invalid order ID');
        }
        
        if (!in_array($status, ['pending', 'accepted', 'rejected'])) {
            throw new Exception('Invalid status');
        }
        
        // If status is rejected, process refund
        if ($status === 'rejected') {
            // First, get the order details
            $get_order = "SELECT o.*, p.id as payment_id, p.mode as payment_mode 
                         FROM orders o 
                         LEFT JOIN payments p ON o.order_id = p.order_id 
                         WHERE o.order_id = ?";
            $stmt = $conn->prepare($get_order);
            $stmt->bind_param("i", $order_id);
            $stmt->execute();
            $order = $stmt->get_result()->fetch_assoc();
            
            if (!$order) {
                throw new Exception('Order not found');
            }

            // Insert refund record
            $refund_sql = "INSERT INTO payments (reference_id, amount, order_id, user_id, mode, details, dt) 
                          VALUES (?, ?, ?, ?, ?, ?, NOW())";
            $stmt = $conn->prepare($refund_sql);
            $refund_reference = 'REF-' . time();
            $refund_details = 'Refund for rejected order #' . $order_id;
            $refund_mode = 'refund_' . $order['payment_mode'];
            $refund_amount = $order['amount']; // Amount to be refunded
            
            $stmt->bind_param("siisss", 
                $refund_reference,
                $refund_amount,
                $order_id,
                $order['customer_id'],
                $refund_mode,
                $refund_details
            );
            $stmt->execute();
        }
        
        // Update the order status
        $update_sql = "UPDATE orders SET order_status = ? WHERE order_id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("si", $status, $order_id);
        $stmt->execute();
        
        // If we get here, commit the transaction
        $conn->commit();
        
        // Send email notification to user
        if ($status === 'rejected') {
            // Get user email
            $get_user = "SELECT u.user_email, u.user_name 
                        FROM users u 
                        JOIN orders o ON u.user_id = o.customer_id 
                        WHERE o.order_id = ?";
            $stmt = $conn->prepare($get_user);
            $stmt->bind_param("i", $order_id);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
            
            if ($user) {
                $to = $user['user_email'];
                $subject = "Order #$order_id Update - Refund Initiated";
                $message = "Dear " . $user['user_name'] . ",\n\n";
                $message .= "Your order #$order_id has been rejected and a refund has been initiated.\n";
                $message .= "Refund Amount: ₹" . number_format($refund_amount, 2) . "\n";
                $message .= "Refund Reference: $refund_reference\n\n";
                $message .= "The refund will be processed to your original payment method. Please allow 5-7 business days for the refund to reflect in your account.\n\n";
                $message .= "If you have any questions, please contact our support team.\n\n";
                $message .= "Best regards,\nWheels & Bytes Team";
                
                $headers = "From: noreply@wheelsandbytes.com";
                
                mail($to, $subject, $message, $headers);
            }
        }
        
        echo json_encode([
            'success' => true, 
            'message' => $status === 'rejected' ? 
                'Order status updated and refund initiated' : 
                'Order status updated successfully'
        ]);
        
    } catch (Exception $e) {
        // If we catch an error, rollback the transaction
        $conn->rollback();
        
        echo json_encode([
            'success' => false, 
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
    
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?> 