<?php
include("connection.php");

if(isset($_GET['admin_id'])){
    $id = $_GET['admin_id'];
    $delete_query = "DELETE FROM `admin_login` WHERE `admin_id`='$id'";
    
    $response = mysqli_query($conn, $delete_query);
    if($response){
        header("Location: Admin.php");
        exit();
    }
    else {
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
