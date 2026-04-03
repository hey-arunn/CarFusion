<?php
include("connection.php");
$admin_select_query = "SELECT * FROM admin_login";

$admin_cursor = mysqli_query($conn, $admin_select_query);

while($row = mysqli_fetch_assoc($admin_cursor)){

    $admin_id = $row['admin_id'];
    echo '<tr class="intro-x"> 
    <td class="text-center idd">'.$row['admin_id'].'</td>';

    echo '<td>
    <a href="" class="font-medium whirtespace-nowrap">'.$row['admin_name'].'</a>  
    </td>';

    echo '<td class="text-center">'.$row['admin_email_id'].'</td>';

    echo '<td class="w-40">';

    
    if($row['admin_status']) {
        echo '<div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Active </div>';
    } 
    else{
    echo '<div class="flex items-center justify-center text-danger"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Inactive </div>';
    }
    echo '
    </td>
    <td class="table-report__action w-40">
        <div class="flex justify-center items-center">
        <a class="flex items-center mr-3" href="admin_edit_form.php?admin_id='.$admin_id.'"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a> 
    </div>
    </td>
    <td class="table-report__action w-40">
    <div class="flex justify-center items-center">
        <a class="flex items-center mr-3" href="delete_admin.php?admin_id='.$admin_id.'"> <i data-lucide="trash" class="w-4 h-4 mr-1"></i> Delete </a> 
    </div>
</td></tr>';
}

mysqli_close($conn);
?>