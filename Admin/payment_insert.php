<?php
include('connection.php');

if (isset($_POST['btn'])) {
  
    $reference_id = $_POST['reference_id'];
    $amount = $_POST['amount'];
    $order_id = $_POST['order_id'];
    $user_id = $_POST['user_id'];
    $mode = $_POST['mode'];
    $details = $_POST['details'];
    
    // Insert data into the payments table
    $query = "INSERT INTO payments (reference_id, amount, order_id, user_id, mode, details, dt) VALUES ('$reference_id', '$amount', '$order_id', '$user_id', '$mode', '$details', NOW())";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Payment added successfully');</script>";
    } else {
        echo mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>
