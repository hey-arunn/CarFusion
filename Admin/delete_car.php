<?php
include("connection.php");

if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['car_id'])) {
    // Get car ID
    $car_id = $_GET['car_id'];
    
    // First delete related records from payments
    $delete_payments = "DELETE FROM payments WHERE order_id IN (SELECT order_id FROM orders WHERE car_id = $car_id)";
    $payments_deleted = mysqli_query($conn, $delete_payments);
    
    if ($payments_deleted) {
        // Then delete related records from orders
        $delete_orders = "DELETE FROM orders WHERE car_id = $car_id";
        $orders_deleted = mysqli_query($conn, $delete_orders);
        
        if ($orders_deleted) {
            // Then delete related records from wishlist
            $delete_wishlist = "DELETE FROM wishlist WHERE car_id = $car_id";
            $wishlist_deleted = mysqli_query($conn, $delete_wishlist);
            
            if ($wishlist_deleted) {
                // Finally delete the car
                $delete_query = "DELETE FROM cars WHERE car_id = $car_id";
                $response = mysqli_query($conn, $delete_query);
                
                if($response){
                    header("Location: cars.php");
                    exit();
                }
                else {
                    echo "Error deleting car: " . mysqli_error($conn);
                }
            } else {
                echo "Error deleting wishlist records: " . mysqli_error($conn);
            }
        } else {
            echo "Error deleting order records: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting payment records: " . mysqli_error($conn);
    }
}
?>
