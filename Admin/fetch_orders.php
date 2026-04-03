<?php
include('connection.php');

// Fetch orders along with user details from the database
$query = "SELECT orders.*, users.user_name, users.user_phone, users.user_address, users.user_email, users.user_city, users.user_state
FROM orders
JOIN users ON orders.customer_id = users.user_id";

if(isset($_GET['filter'])){

    $sort_by = $_GET['sort_orders'];

    if($sort_by == 'car_booking'){
        $query = "SELECT orders.*, users.user_name, users.user_phone, users.user_address, users.user_email, users.user_city, users.user_state
        FROM orders
        JOIN users ON orders.customer_id = users.user_id
        WHERE details = 'Car Booking'";
    }

    if($sort_by == 'Premium_subscription'){
        $query = "SELECT orders.*, users.user_name, users.user_phone, users.user_address, users.user_email, users.user_city, users.user_state
        FROM orders
        JOIN users ON orders.customer_id = users.user_id
        WHERE details = 'Premium_subscription'";
    }

    if($sort_by == 'Standard_subscription'){
        $query = "SELECT orders.*, users.user_name, users.user_phone, users.user_address, users.user_email, users.user_city, users.user_state
        FROM orders
        JOIN users ON orders.customer_id = users.user_id
        WHERE details = 'Standard_subscription'";
    }

    if($sort_by == 'Basic_subscription'){
        $query = "SELECT orders.*, users.user_name, users.user_phone, users.user_address, users.user_email, users.user_city, users.user_state
        FROM orders
        JOIN users ON orders.customer_id = users.user_id
        WHERE details = 'Basic_subscription'";
    }
}

$result = mysqli_query($conn, $query);

// Check if there are any records
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // Output each row as a table row
        echo '<tr class="intro-x">';
        echo '<td class="text-center idd">' . $row['order_id'] . '</td>';
        echo '<td class="text-center current-date">' . $row['order_time'] . '</td>';
        echo '<td class="order-amount">';
        echo '<a href="" class="font-medium whirtespace-nowrap">' . $row['amount'] . '</a>';
        echo '</td>';
        echo '<td class="text-center">' . $row['details'] . '</td>';
        echo '<td class="text-center">' . $row['user_name'] . '<br>' . $row['user_phone'] . '<br>' . $row['user_email'] . '<br>' . $row['user_city'] . ', ' . $row['user_state'] . '</td>';
        echo '<td class="text-center">';
        // Display order status with appropriate color
        $status_class = '';
        switch($row['order_status']) {
            case 'accepted':
                $status_class = 'text-success';
                break;
            case 'rejected':
                $status_class = 'text-danger';
                break;
            default:
                $status_class = 'text-warning';
        }
        echo '<span class="' . $status_class . '">' . ucfirst($row['order_status']) . '</span>';
        echo '</td>';
        echo '<td class="table-report__action w-46">';
        echo '<div class="flex justify-center items-center">';
        echo '<a class="flex items-center mr-3 view" href="view_order.php?order_id=' . $row['order_id'] . '"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> View </a>';
        if($row['order_status'] == 'pending') {
            echo '<button class="btn btn-success btn-sm mr-2 accept-order" data-order-id="' . $row['order_id'] . '">Accept</button>';
            echo '<button class="btn btn-danger btn-sm reject-order" data-order-id="' . $row['order_id'] . '">Reject</button>';
        }
        echo '</div>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    // No records found
    echo '<tr><td colspan="7" class="text-center">No orders found</td></tr>';
}

// Close database connection
mysqli_close($conn);
?>

<script>
// Make sure this script runs after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, attaching event listeners');
    
    // Handle Accept Order
    document.querySelectorAll('.accept-order').forEach(button => {
        button.addEventListener('click', function() {
            console.log('Accept button clicked for order:', this.getAttribute('data-order-id'));
            const orderId = this.getAttribute('data-order-id');
            updateOrderStatus(orderId, 'accepted');
        });
    });

    // Handle Reject Order
    document.querySelectorAll('.reject-order').forEach(button => {
        button.addEventListener('click', function() {
            console.log('Reject button clicked for order:', this.getAttribute('data-order-id'));
            const orderId = this.getAttribute('data-order-id');
            updateOrderStatus(orderId, 'rejected');
        });
    });

    function updateOrderStatus(orderId, status) {
        console.log('Updating order status:', orderId, status);
        
        // Create form data
        const formData = new FormData();
        formData.append('order_id', orderId);
        formData.append('status', status);
        
        // Send the request
        fetch('update_order_status.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log('Response received:', response);
            return response.json();
        })
        .then(data => {
            console.log('Data received:', data);
            if(data.success) {
                alert('Order status updated successfully');
                location.reload();
            } else {
                alert('Error updating order status: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error updating order status. Please try again.');
        });
    }
});
</script>
