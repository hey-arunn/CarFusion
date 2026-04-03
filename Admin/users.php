<?php
include('header.php');
include('sidemenu.php');
?>
<div class="content">
	<?php include('top_bar.php'); ?>
	
	<style>
		.sortby {
			display: inline-block;
			width: 22%;
			padding-bottom: 30px;
			padding-left: 20px;
		}

		.input-group {
			display: inline-flex;
			width: 72%;
		}

		.input-group-append {
			padding-left: 10px;
		}

		.filterbtn {
			width: 100px;
		}
	</style>
	<h2 class="intro-y text-lg font-medium mt-10">
		All Customers
	</h2>
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<!-- <button class="btn btn-primary shadow-md mr-2"><a href="user_form.php">Add New User</a></button> -->
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
										<select name="sort_users" class="form-control" id="sort">
											<option value="" selected>Default</option>
											<optgroup label="Status">
												<option value="1">Active</option>
												<option value="0">Inactive</option>
											</optgroup>
											<hr class="dropdown-divider">
											<optgroup label="Subscription">
												<option value="None">None</option>
												<option value="Basic">Basic</option>
												<option value="Standard">Standard</option>
												<option value="Premium">Premium</option>
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
						<th class="whitespace-nowrap">ID</th>
						<th class="whitespace-nowrap">Name</th>
						<th class="whitespace-nowrap">Address</th>
						<th class="text-center whitespace-nowrap">Subscription</th>
						<th class="text-center whitespace-nowrap">STATUS</th>
						<th class="text-center whitespace-nowrap">ACTIONS</th>
					</tr>
				</thead>
				<tbody>

					<!-- Php script for fetching user data from database -->
					<?php
					include('users_datafetch.php');
					?>


				</tbody>
			</table>

		</div>

	</div>
</div>


<script src="dist/js/app.js"></script>
<!-- END: JS Assets-->
</body>

</html>