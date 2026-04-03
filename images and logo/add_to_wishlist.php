<?php
session_start();
include("connection.php");

if (isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];

    $car_id = $_GET['car_id'];

    $check_query = "SELECT * FROM wishlist WHERE user_id = $user_id AND car_id = $car_id";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Already added to wishlist');</script>";
        echo "<script>window.location.href='view all cars.php';</script>";
    } else {

        // Insert into wishlist table
        $sql = "INSERT INTO wishlist (user_id, car_id) VALUES ($user_id, $car_id)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Added to wishlist');</script>";
            echo "<script>window.location.href='view all cars.php';</script>";
        } else {
            echo mysqli_error($conn);
        }
    }
} else {
   
    echo "<script> alert('Please Login First!!'); </script>";
    echo "<script>window.location.href='index.php'</script>";
}

mysqli_close($conn);
?>
