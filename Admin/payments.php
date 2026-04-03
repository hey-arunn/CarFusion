<?php 
include('header.php');
include('sidemenu.php');?> 
<div class="content">
<?php include('top_bar.php');?>
 <style>
th.whitespace-nowrap.date {
    padding-left: 60px;
}
th.whitespace-nowrap.current-name {
    padding-left: 33px;
}
th.whitespace-nowrap.amount {
    padding-left: 70px;
}
th.whitespace-nowrap.amount {
    padding-left: 6px;
}
td.text-center.current-date {
    width: 13%;
}
.delete:hover{
	color:red;
}
.edit:hover{
	color:#1441ac;
}
td.text-center.id {
    padding-left: 26px;
}
th.whitespace-nowrap.id {
    padding-left: 30px;
}
th.whitespace-nowrap.date {
    padding-left: 53px;
}
td.text-center.current-date {
    padding-left: 0;
}
td.order-amount {
    padding-left: 0px;
}

 </style> 
	<h2 class="intro-y text-lg font-medium mt-10">
		All Payments
	</h2>
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<!-- <button class="btn btn-primary shadow-md mr-2"><a href="add_new_payment_form.php">Add New Payment</a></button>
			<div class="dropdown"> -->

			</div> 
			
		</div>
		<!-- BEGIN: Data List -->
		<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
			<table class="table table-report -mt-2">
				<thead>
					<tr> 
						<th class="whitespace-nowrap id">ID</th> 
						<th class="whitespace-nowrap date">Date</th> 
						<th class="whitespace-nowrap amount">Amount</th>
						<th class="text-center whitespace-nowrap Status order-details">Order ID</th>
						<th class="text-center whitespace-nowrap Status user-detail">User Name</th>
						<th class="text-center whitespace-nowrap Status user-detail">Payment Mode</th>
						<th class="text-center whitespace-nowrap actions view">View</th>
						<!-- <th class="text-center whitespace-nowrap actions delete">Delete</th> -->
					</tr>
				</thead>
				<tbody>
				<?php include("fetch_payments.php"); ?>
				</tbody>
			</table>
		</div> 
	</div>
	<!-- BEGIN: Delete Confirmation Modal -->
	<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body p-0">
					<div class="p-5 text-center">
						<i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
						<div class="text-3xl mt-5">Are you sure?</div>
						<div class="text-slate-500 mt-2">
							Do you really want to delete these records? 
							<br>
							This process cannot be undone.
						</div>
					</div>
					<div class="px-5 pb-8 text-center">
						<button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
						<button type="button" class="btn btn-danger w-24">Delete</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END: Delete Confirmation Modal -->
 </div> 
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>
</html>