<?php
include("connection.php");
session_start();

if(isset($_GET['user_id'])){
    $id = $_GET['user_id'];
    
    // First check existing records
    $check_orders = "SELECT * FROM `orders` WHERE `customer_id`='$id'";
    $orders_result = mysqli_query($conn, $check_orders);
    error_log("Found " . mysqli_num_rows($orders_result) . " orders for user ID " . $id);
    
    // Delete payments first (they reference orders)
    $delete_payments = "DELETE FROM `payments` WHERE order_id IN (SELECT order_id FROM orders WHERE customer_id='$id')";
    $payments_deleted = mysqli_query($conn, $delete_payments);
    if ($payments_deleted) {
        error_log("Successfully deleted payments for user's orders");
    } else {
        error_log("Error deleting payments: " . mysqli_error($conn));
    }
    
    // Delete wishlist records
    $delete_wishlist = "DELETE FROM `wishlist` WHERE `user_id`='$id'";
    $wishlist_deleted = mysqli_query($conn, $delete_wishlist);
    if ($wishlist_deleted) {
        error_log("Successfully deleted wishlist items");
    }
    
    // Then delete orders
    $delete_orders = "DELETE FROM `orders` WHERE `customer_id`='$id'";
    $orders_deleted = mysqli_query($conn, $delete_orders);
    if ($orders_deleted) {
        error_log("Successfully deleted orders");
    } else {
        error_log("Error deleting orders: " . mysqli_error($conn));
    }
    
    // Then delete the user
    $delete_query = "DELETE FROM `users` WHERE `user_id`='$id'";
    $response = mysqli_query($conn, $delete_query);
    
    if($response){
        // Check if the deleted user is currently logged in
        if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $id) {
            // Clear all session variables
            session_unset();
            // Destroy the session
            session_destroy();
        }
        header("Location: users.php");
        exit();
    }
    else {
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
