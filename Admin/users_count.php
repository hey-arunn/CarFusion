<?php

include("connection.php");

$user_count_query = "SELECT COUNT(*) AS total_users FROM users";

$response = mysqli_query($conn, $user_count_query);

if($response){
    $row = mysqli_fetch_assoc($response);
    echo '<div class="text-3xl font-medium leading-8 mt-6">'.($row['total_users']/*+1*/).'</div>';
}
else{
    echo mysqli_error($conn);
}


mysqli_close($conn);
?>