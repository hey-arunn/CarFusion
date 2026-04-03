<?php
session_start();
include("connection.php");

$mode = $_GET['mode'];
$amount = $_GET['amount'];
$user_id = $_SESSION['user_id'];

//Determining the type of subscription based on the amount
if($amount == 1200){
    $type = "Basic_subscription";
}elseif($amount == 3000){
    $type = "Standard_subscription";
}elseif($amount == 7000){
    $type = "Premium_subscription";
}

//Inserting the order details
$ord_query = "INSERT INTO orders (customer_id, amount, details) VALUES ('$user_id', $amount, '$type')";
$ord_res = mysqli_query($conn, $ord_query);
$order_id = mysqli_insert_id($conn);
if(!$ord_res){
    echo  mysqli_error($conn);
}

//Inserting the payment details
$pay_query = "INSERT INTO payments (amount, order_id, user_id, details, mode) VALUES ($amount, $order_id, $user_id, '$type', '$mode')";
$pay_res = mysqli_query($conn, $pay_query);


//Determining the membership plan based on the amount
$plan_type;
if($amount == 1200){
    $plan_type = "2";
}elseif($amount == 3000){
    $plan_type = "3";
}elseif($amount == 7000){
    $plan_type = "4";
}

//Updating the user's membership plan
$upd_query = "UPDATE `users` SET `membership_plan_id` = '$plan_type', `user_last_updated` = NULL WHERE `users`.`user_id` = $user_id;";
$upd_res = mysqli_query($conn, $upd_query);
if(!$upd_res){
    echo mysqli_error($conn);
}elseif(!$pay_res){
    echo mysqli_error($conn);
}else{

echo "<script>alert('Payment Successful!')</script>";


echo "<script>window.location.href='insurance bill.php?order_id=".$order_id."'</script>";
}

mysqli_close($conn);

?>
