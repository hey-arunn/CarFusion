<?php
include('header.php');
include('sidemenu.php');
?>
<div class="content">
	<?php include('top_bar.php'); ?>
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
			padding-left: 36px;
		}

		td.text-center.current-date {
			width: 13%;
		}

		.delete:hover {
			color: red;
		}

		.edit:hover {
			color: #1441ac;
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
			padding-left: 30px;
		}
	</style>
	<h2 class="intro-y text-lg font-medium mt-10">
		All Orders
	</h2>
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

			<div class="dropdown">
				<div class="container mt-6">
					<div class="row justify-content-center">
						<div class="col-md-2">
							<form action="" method="get">
								<div class="form-group">
									<div class="sortby">
										<label for="sort">Sort By</label>
									</div>
									<div class="input-group">
										<select name="sort_orders" class="form-control" id="sort">
											<option value="" selected>Default</option>
											<optgroup label="Type">
												<option value="car_booking">Car Booking</option>
												<!-- <option value="0">Subscription</option> -->
											</optgroup>
											<optgroup label="Subscription">
												<option value="Premium_subscription">Premium Subscription</option>
												<option value="Standard_subscription">Standard Subscription</option>
												<option value="Basic_subscription">Basic Subscription</option>
												<!-- <option value="0">Subscription</option> -->
											</optgroup>
										</select>
										<div class="input-group-append">
											<button name="filter" type="submit" class="btn btn-primary filterbtn">Filter</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
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
						<th class="text-center whitespace-nowrap Status order-details">Order Details</th>
						<th class="text-center whitespace-nowrap Status user-detail">User Details</th>
						<th class="text-center whitespace-nowrap Status">Status</th>
						<th class="text-center whitespace-nowrap actions">Actions</th>
					</tr>
				</thead>
				<tbody>

					<?php include("fetch_orders.php"); ?>
					<!-- <?php //for($i=0;$i<10;$i++){
							?>
					<tr class="intro-x"> 
					<td class="text-center idd"><?php //echo(rand(1,10));
												?></td>
						<td class="text-center current-date"><?php //echo '19-04-24' 
																?></td>
						<td class="order-amount">
							<a href="" class="font-medium whirtespace-nowrap">12 Lakhs</a>  
						</td>
						<td class="text-center">Khud Laga lena</td> 
						<td class="text-center">Khud Laga lena</td> 
					
						<td class="table-report__action w-46">
							<div class="flex justify-center items-center">
								<a class="flex items-center mr-3 edit" href="javascript:;"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a> 
							</div>
						</td>
						<td class="table-report__action w-46">
							<div class="flex justify-center items-center">
								<a class="flex items-center mr-3 delete" href="users.php?action=delete&id=<?php //echo $user_id;
																											?>"> <i data-lucide="trash" class="w-4 h-4 mr-1"></i> Delete </a> 
							</div>
						</td>
					</tr> 
				<?php //} 
				?>
				</tbody>
			</table>
		</div> 
	</div> -->
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