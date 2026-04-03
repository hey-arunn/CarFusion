<?php
include('connection.php');

$query = "SELECT payments.*, orders.order_id AS order_id, users.user_name
          FROM payments
          JOIN orders ON payments.order_id = orders.order_id
          JOIN users ON payments.user_id = users.user_id";
$result = mysqli_query($conn, $query);

// Check if there are any records
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // Output each row as a table row
        echo '<tr class="intro-x">';
        echo '<td class="text-center idd">' . $row['id'] . '</td>';
        echo '<td class="text-center current-date">' . $row['dt'] . '</td>';
        echo '<td class="order-amount">';
        echo '<a href="" class="font-medium whirtespace-nowrap">' . $row['amount'] . '</a>';
        echo '</td>';
        echo '<td class="text-center">' . $row['order_id'] . '</td>';
        echo '<td class="text-center">' . $row['user_name'] . '</td>';
        echo '<td class="text-center">' . $row['mode'] . '</td>';
        echo '<td class="table-report__action w-46">';
        echo '<div class="flex justify-center items-center">';
        echo '<a class="flex items-center mr-3 view" href="view_payment.php?payment_id=' . $row['id'] . '"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View </a>';
        echo '</div>';
        echo '</td>';
        echo '<td class="table-report__action w-46">';
        // echo '<div class="flex justify-center items-center">';
        // echo '<a class="flex items-center mr-3 delete" href="delete_payment.php?id=' . $row['id'] . '"> <i data-lucide="trash" class="w-4 h-4 mr-1"></i> Delete </a>';
        // echo '</div>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    
    echo '<tr><td colspan="8" class="text-center">No payments found</td></tr>';
}

mysqli_close($conn);
?>
