<?php
include('header.php');
include('sidemenu.php'); ?>

<div class="content">
	<?php include('top_bar.php'); ?>
	<style>
		th.whitespace-nowrap.id {
			padding-left: 50px;
		}

		th.whitespace-nowrap.name {
			padding-left: 33px;
		}

		th.whitespace-nowrap.address {
			padding-left: 95px;
		}

		td.td\.text-center\.idd {
			padding-left: 50px;
		}

		th.text-center.whitespace-nowrap.status {
			padding-left: 24px;
		}

		th.text-center.whitespace-nowrap.actions {
			padding-left: 11px;
		}
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

	<?php

	// $status = 'active';
	// $user_id = 12;
	if (isset($_GET['id']) && $_GET['action'] == 'delete') {
	}
	?>
	<h2 class="intro-y text-lg font-medium mt-10">
		All Cars
	</h2>
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
			<button class="btn btn-primary shadow-md mr-2"><a href="add_new_car_form.php">Add New Car</a></button>
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
										<select name="sort_cars" class="form-control" id="sort">
											<option value="" selected>Default</option>
											<optgroup label="Price">
												<option value="lowToHigh">Low To High</option>
												<option value="highToLow">High To Low</option>
											</optgroup>
											<hr class="dropdown-divider">
											<optgroup label="Categories">
												<option value="sedan">Sedan</option>
												<option value="hatchback">HatchBack</option>
												<option value="SUV">SUV</option>
											</optgroup>
											<hr class="dropdown-divider">
											<optgroup label="Brands">
												<option value="honda">Honda</option>
												<option value="hyundai">Hyundai</option>
												<option value="kia">Kia</option>
												<option value="suzuki">Suzuki</option>
												<option value="tata">Tata</option>
												<option value="toyota">Toyota</option>
												<option value="mahindra">Mahindra</option>
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

		<?php include("fetch_cars.php") ?>
	</div>
	<script src="dist/js/app.js"></script>
	<!-- END: JS Assets-->
	</body>

	</html>

	</html>