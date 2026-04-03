<?php
include("connection.php");

if(isset($_POST['submit_btn'])){

    $car_name = $_POST['car_name'];
    $price = $_POST['price'];
    $engine = $_POST['engine'];
    $mileage = $_POST['mileage'];
    $torque = $_POST['max_power'];
    $fuel_tank_capacity = $_POST['fuel_tank_capacity'];
    // $image_file_path = $_POST['image_file_path'];
    $cylinders = $_POST['cylinders'];
    $transmission_type = $_POST['transmission_type'];
    $body_type = $_POST['body_type'];
    $fuel_type = $_POST['fuel_type'];
    $seats = $_POST['seats'];
    $brand = $_POST['car_brand'];

    $front = addslashes(file_get_contents($_FILES['image_front']['tmp_name']));
    $back = addslashes(file_get_contents($_FILES['image_back']['tmp_name']));
    $inside = addslashes(file_get_contents($_FILES['image_in']['tmp_name']));

   
    $cars_insert_query = "INSERT INTO cars (car_brand, car_name, car_price, engine_cc, mileage, torque, tank_capacity, transmission, fuel_type, seats, category, cylinders, image_front, image_back, image_inside) VALUES ('$brand', '$car_name', $price, $engine, $mileage, $torque, $fuel_tank_capacity, '$transmission_type', '$fuel_type', $seats, '$body_type', $cylinders, '$front', '$back', '$inside')";

    $response = mysqli_query($conn, $cars_insert_query);

    if($response){
        echo "<script> 
            alert('Product Saved Successfully');
            window.location.href = 'cars.php';
        </script>";
    }
    else{
        echo mysqli_error($conn);
    }
mysqli_close($conn);

}

?>