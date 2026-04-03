<?php
include("connection.php");

if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['car_id'])) {
    // Delete car from database
    $car_id = $_GET['car_id'];
    $delete_query = "DELETE FROM cars WHERE car_id = $car_id";
    mysqli_query($conn, $delete_query);
}

$sort_by="";
$fetch_query = "SELECT car_id, car_name, car_brand, engine_cc, car_price, mileage, category, seats, image_front FROM cars;";
if(isset($_GET['filter'])){

    $sort_by = $_GET['sort_cars'];


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

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="col-span-12 intro-y md:col-span-6 lg:col-span-4 xl:col-span-3">
        <div class="box">
            <div class="p-5">
                <div class="h-40 overflow-hidden rounded-md 2xl:h-56 image-fit before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
                <img alt="' . $row['car_name'] . '" class="rounded-md" src="data:image/jpeg;base64,'.base64_encode($row['image_front']).'">
                    <span class="absolute top-0 z-10 px-2 py-1 m-5 text-xs text-white rounded bg-pending/80">Featured</span>
                    <div class="absolute bottom-0 z-10 px-5 pb-6 text-white">
                        <a href="#top" class="block text-base font-medium">' . $row['car_brand'] . ' ' . $row['car_name'] . '</a>
                        <span class="mt-3 text-xs text-white/90">Engine: ' . $row['engine_cc'] . ' cc</span>
                    </div>
                </div>
                <div class="mt-5 text-slate-600 dark:text-slate-500">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide-icon lucide lucide-link stroke-[1.3] w-4 h-4 mr-2">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                        </svg>
                        Price: &#8377; ' . $row['car_price'] . '
                    </div>
                    <div class="flex items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide-icon lucide lucide-layers stroke-[1.3] w-4 h-4 mr-2">
                            <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                            <polyline points="2 17 12 22 22 17"></polyline>
                            <polyline points="2 12 12 17 22 12"></polyline>
                        </svg>
                        Seats: ' . $row['seats'] . '
                    </div>
                    <div class="flex items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide-icon lucide lucide-check-square stroke-[1.3] w-4 h-4 mr-2">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        Mileage: ' . $row['mileage'] . ' kmpl
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center p-5 border-t lg:justify-end border-slate-200/60 dark:border-darkmode-400">
                <a class="flex items-center mr-auto text-primary" href="preview.php?car_id=' . $row['car_id'] . '">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide-icon lucide lucide-eye stroke-[1.3] w-4 h-4 mr-1">
                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    Preview
                </a>
                <a class="flex items-center mr-3" href="edit_car_form.php?car_id='.$row['car_id'].'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide-icon lucide lucide-check-square stroke-[1.3] w-4 h-4 mr-1">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                    Edit
                </a>
                <a class="flex items-center text-danger" href="delete_car.php?action=delete&car_id=' . $row['car_id'] . '">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide-icon lucide lucide-trash-2 stroke-[1.3] w-4 h-4 mr-1">
                        <path d="M3 6h18"></path>
                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                    Delete
                </a>
            </div>
        </div>
    </div>';
}





?>
