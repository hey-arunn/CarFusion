<?php
include('header.php');
include('sidemenu.php');
?>
<div class="content">
    <?php include('top_bar.php'); ?>
    
    <h2 class="intro-y text-lg font-medium mt-10">
        Debug Orders
    </h2>
    
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <div class="alert alert-primary show mb-2" role="alert">
                This page is for debugging the order status update functionality.
            </div>
            
            <div class="box p-5">
                <h3>Test Order Status Update</h3>
                <div class="mt-3">
                    <label>Order ID:</label>
                    <input type="number" id="test-order-id" class="form-control w-40" value="1">
                </div>
                <div class="mt-3">
                    <label>Status:</label>
                    <select id="test-status" class="form-control w-40">
                        <option value="pending">Pending</option>
                        <option value="accepted">Accepted</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button id="test-update" class="btn btn-primary">Test Update</button>
                </div>
                <div class="mt-3">
                    <h4>Result:</h4>
                    <pre id="test-result" class="p-3 bg-gray-100 rounded">Results will appear here...</pre>
                </div>
            </div>
            
            <div class="box p-5 mt-5">
                <h3>JavaScript Console</h3>
                <div class="mt-3">
                    <pre id="js-console" class="p-3 bg-gray-100 rounded h-40 overflow-auto">JavaScript console output will appear here...</pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Override console.log to display in our custom console
const originalConsoleLog = console.log;
const originalConsoleError = console.error;
const jsConsole = document.getElementById('js-console');

console.log = function() {
    const args = Array.from(arguments);
    const message = args.map(arg => typeof arg === 'object' ? JSON.stringify(arg) : arg).join(' ');
    jsConsole.innerHTML += message + '\n';
    jsConsole.scrollTop = jsConsole.scrollHeight;
    originalConsoleLog.apply(console, arguments);
};

console.error = function() {
    const args = Array.from(arguments);
    const message = args.map(arg => typeof arg === 'object' ? JSON.stringify(arg) : arg).join(' ');
    jsConsole.innerHTML += '<span class="text-danger">' + message + '</span>\n';
    jsConsole.scrollTop = jsConsole.scrollHeight;
    originalConsoleError.apply(console, arguments);
};

// Test order status update
document.getElementById('test-update').addEventListener('click', function() {
    const orderId = document.getElementById('test-order-id').value;
    const status = document.getElementById('test-status').value;
    const resultElement = document.getElementById('test-result');
    
    console.log('Testing order status update:', { orderId, status });
    
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
        resultElement.textContent = JSON.stringify(data, null, 2);
    })
    .catch(error => {
        console.error('Error:', error);
        resultElement.textContent = 'Error: ' + error.message;
    });
});

// Test if event listeners are working
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, testing event listeners');
    
    // Simulate accept button click
    const acceptButton = document.createElement('button');
    acceptButton.className = 'accept-order';
    acceptButton.setAttribute('data-order-id', '1');
    document.body.appendChild(acceptButton);
    
    acceptButton.addEventListener('click', function() {
        console.log('Accept button clicked for order:', this.getAttribute('data-order-id'));
    });
    
    // Simulate reject button click
    const rejectButton = document.createElement('button');
    rejectButton.className = 'reject-order';
    rejectButton.setAttribute('data-order-id', '1');
    document.body.appendChild(rejectButton);
    
    rejectButton.addEventListener('click', function() {
        console.log('Reject button clicked for order:', this.getAttribute('data-order-id'));
    });
    
    // Trigger the events
    acceptButton.click();
    rejectButton.click();
    
    // Clean up
    document.body.removeChild(acceptButton);
    document.body.removeChild(rejectButton);
});
</script>

<?php include('footer.php'); ?> 