<?php
session_start();
include("connection.php");

if(isset($_SESSION['user_id'])){
   
    $user_id = $_SESSION['user_id'];
    
    $car_id = $_GET['car_id']; 
    
    // Delete from wishlist table
    $sql = "DELETE FROM wishlist WHERE user_id = $user_id AND car_id = $car_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>alert('Removed from wishlist')</script>";
        echo "<script>window.location.href = 'wishlist.php'; </script>";
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else{
    echo "Please login to remove from wishlist";
    header("Location: index.php");
}
?>
