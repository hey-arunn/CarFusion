<?php
include("connection.php");

$sort_by="";
$fetch_query = "SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front FROM cars;";
if(isset($_GET['filter'])){

    $sort_by = $_GET['sortby'];


    if($sort_by == 'lowToHigh') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        ORDER BY car_price ASC';
    } elseif ($sort_by == 'highToLow') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        ORDER BY car_price DESC';
    } elseif ($sort_by == 'sedan') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        WHERE category = "Sedan"';
    } elseif ($sort_by == 'hatchback') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        WHERE category = "Hatchback"';
    } elseif ($sort_by == 'suv') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        WHERE category = "SUV"';
    } elseif ($sort_by == 'honda') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        WHERE car_brand = "Honda"';
    } elseif ($sort_by == 'hyundai') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        WHERE car_brand = "Hyundai"';
    } elseif ($sort_by == 'kia') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        WHERE car_brand = "Kia"';
    } elseif ($sort_by == 'suzuki') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        WHERE car_brand = "Suzuki"';
    } elseif ($sort_by == 'tata') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        WHERE car_brand = "Tata"';
    } elseif ($sort_by == 'toyota') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        WHERE car_brand = "Toyota"';
    } elseif ($sort_by == 'mahindra') {
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front 
                        FROM cars 
                        WHERE car_brand = "Mahindra"';
    } else {
        // Default query when no sorting option is selected
        $fetch_query = 'SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front FROM cars';
    }
    

}

$result = mysqli_query($conn, $fetch_query);

while ($row = mysqli_fetch_assoc($result)) 
{
    $id = $row['car_id'];
    echo '<div class="card" id="move">
    <img alt="' . $row['car_name'] . '" src="data:image/jpeg;base64,'.base64_encode($row['image_front']).'">
    <div class="card-body">
        <div class="title">
            <h5>'.$row['car_brand'].' '.$row['car_name'].'</h5>
            <a href="add_to_wishlist.php?car_id='.$id.'">
            <i class="far fa-heart heart"  id="heart" data-id="heart1"></i></a>
        </div>
        <p><i class="fa-solid fa-indian-rupee-sign"></i><strong id="price-id">Price : </strong> ₹ '.$row['car_price'].'*<br><div class="engine-class"> <img src="car-engine_2061956.png"  alt="">
            <strong>Engine : </strong> '.$row['engine_cc'].'</div><br><div  class="mileage-class"> <img src="mileage.jpg" alt="">
            <strong>Mileage : </strong> '.$row['mileage'].'</p></div>
        <div class="btnnow">
            <a href="book now.php?car_id='.$id.'" class="btnbook">Book Now</a>
            <a href="preview.php?car_id='.$id.'" class="moreinfo"> Know more</a>
        </div>
    </div>
</div>';
}

mysqli_close($conn);

?>