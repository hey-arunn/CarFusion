<?php
include("connection.php");

$sort_by = "";
$fetch_query = "SELECT * FROM cars WHERE category = 'SUV' LIMIT 4;";

$result = mysqli_query($conn, $fetch_query);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['car_id'];
    echo '<div class="card" id="move">
    <img alt="' . $row['car_name'] . '" src="data:image/jpeg;base64,' . base64_encode($row['image_front']) . '">
    <div class="card-body">
        <div class="title">
            <h5>' . $row['car_brand'] . ' ' . $row['car_name'] . '</h5>
            <a href="add_to_wishlist.php?car_id=' . $id . '">
            <i class="far fa-heart heart"  id="heart" data-id="heart1"></i></a>
        </div>
        <p><i class="fa-solid fa-indian-rupee-sign"></i><strong id="price-id">Price : </strong> ₹ ' . $row['car_price'] . '*<br><div class="engine-class"> <img src="car-engine_2061956.png"  alt="">
            <strong>Engine : </strong> ' . $row['engine_cc'] . '</div><br><div  class="mileage-class"> <img src="mileage.jpg" alt="">
            <strong>Mileage : </strong> ' . $row['mileage'] . '</p></div>
        <div class="btnnow">
            <a href="book now.php?car_id=' . $id . '" class="btnbook">Book Now</a>
            <a href="preview.php?car_id=' . $id . '" class="moreinfo"> Know more</a>
        </div>
    </div>
</div>';
}

mysqli_close($conn);
