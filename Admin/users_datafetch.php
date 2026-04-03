<?php
include('connection.php');

$query = "SELECT user_id, `user_name`, `user_address`,`user_city`, `user_state`, user_status, plan_name
    FROM `users`
    INNER JOIN membership_plans on users.membership_plan_id=membership_plans.membership_plan_id";

$sort_by="";
if(isset($_GET['filter'])){
    $sort_by = $_GET['sort_users'];

    if($sort_by == '1') {
        $query = "SELECT user_id, `user_name`, `user_address`,`user_city`, `user_state`, user_status, plan_name
        FROM `users`
        INNER JOIN membership_plans on users.membership_plan_id=membership_plans.membership_plan_id
        WHERE user_status = 1";
    } elseif ($sort_by == '0') {
        $query = "SELECT user_id, `user_name`, `user_address`,`user_city`, `user_state`, user_status, plan_name
        FROM `users`
        INNER JOIN membership_plans on users.membership_plan_id=membership_plans.membership_plan_id
        WHERE user_status = 0";
    }elseif ($sort_by == 'None') {
        $query = "SELECT user_id, `user_name`, `user_address`,`user_city`, `user_state`, user_status, plan_name
        FROM `users`
        INNER JOIN membership_plans on users.membership_plan_id=membership_plans.membership_plan_id
        WHERE plan_name = 'None'"; 
    }elseif ($sort_by == 'Basic') {
        $query = "SELECT user_id, `user_name`, `user_address`,`user_city`, `user_state`, user_status, plan_name
        FROM `users`
        INNER JOIN membership_plans on users.membership_plan_id=membership_plans.membership_plan_id
        WHERE plan_name = 'Basic'";
    } elseif ($sort_by == 'Standard') {
        $query = "SELECT user_id, `user_name`, `user_address`,`user_city`, `user_state`, user_status, plan_name
        FROM `users`
        INNER JOIN membership_plans on users.membership_plan_id=membership_plans.membership_plan_id
        WHERE plan_name = 'Standard'";
    } elseif ($sort_by == 'Premium') {
        $query = "SELECT user_id, `user_name`, `user_address`,`user_city`, `user_state`, user_status, plan_name
        FROM `users`
        INNER JOIN membership_plans on users.membership_plan_id=membership_plans.membership_plan_id
        WHERE plan_name = 'Premium'";
    }
} else {
    $query = "SELECT user_id, `user_name`, `user_address`,`user_city`, `user_state`, user_status, plan_name
    FROM `users`
    INNER JOIN membership_plans on users.membership_plan_id=membership_plans.membership_plan_id";
}

// $query = "SELECT user_id, `user_name`, `user_address`,`user_city`, `user_state`, user_status, plan_name
// FROM `users`
// INNER JOIN membership_plans on users.membership_plan_id=membership_plans.membership_plan_id";

$cursor = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($cursor)){

    echo '<tr class="intro-x"> 
    <td class="text-left">'.$row['user_id'].'</td>';
    
    echo '<td>
    <a href="#" class="font-medium whirtespace-nowrap">'.$row['user_name'].'</a>  
    </td>';

    echo '<td class="text-left">'.ucwords($row['user_address']).', '.ucwords($row['user_city']).', '.ucwords($row['user_state']).'</td>';



    echo '<td class="text-center">'.$membership = $row['plan_name'].'</td>';

    if ($row['user_status']) {
        echo '<td class="w-40">
                <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Active </div>
              </td>';
    } else {
        echo '<td class="w-40">
                <div class="flex items-center justify-center text-danger"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Inactive </div>
              </td>';
    }
    

    echo '<td class="table-report__action w-30">
    <div class="flex justify-center items-center">
        <a class="flex items-center mr-3" href="user_edit_form.php?user_id='.$row['user_id'].'"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a> 
    </div>
</td>
<td class="table-report__action w-30">
    <div class="flex justify-center items-center">
        <a class="flex items-center mr-3" href="delete_user.php?user_id='.$row['user_id'].'"> <i data-lucide="trash" class="w-4 h-4 mr-1"></i> Delete </a> 
    </div>
</td>
</tr> ';
}


?>
