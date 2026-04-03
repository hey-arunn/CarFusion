<?php

$conn = mysqli_connect("localhost", "root", "", "w&b");

if(!$conn)
    echo mysqli_connect_error($conn);

?>