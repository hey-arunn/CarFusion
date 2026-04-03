<?php
session_start();
include("connection.php");

$mode = $_GET['mode'];
$user_id = $_SESSION['user_id'];
$car_id = $_GET['car_id'];
$order_id = $_GET['order_id'];
echo $order_id;

//Inserting the payment details
$pay_query = "INSERT INTO payments (amount, order_id, user_id, details, mode) VALUES (10000, $order_id, $user_id, 'Car_booking', '$mode')";
$pay_res = mysqli_query($conn, $pay_query);

if(!$pay_res){
    echo mysqli_error($conn);
}else{

    //Showing the invoice to the user on Mail.
echo "<script>window.location.href='billing.php?car_id=".$car_id."&order_id=".$order_id."'</script>";
}
mysqli_close($conn);

?>
