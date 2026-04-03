<?php
include('header.php');
include('sidemenu.php'); ?>
<div class="content">
	<?php include('top_bar.php'); ?>
	<div class="grid grid-cols-12 gap-6">
		<div class="col-span-12 2xl:col-span-12">
			<div class="grid grid-cols-12 gap-6">
				<!-- BEGIN: General Report -->
				<div class="col-span-12 mt-8">
					<div class="intro-y flex items-center h-10">
						<h2 class="text-lg font-medium truncate mr-5">
							General Report
						</h2>
					</div>
					<div class="grid grid-cols-12 gap-6 mt-5">
						<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
							<div class="report-box zoom-in">
								<div class="box p-5">
									<div class="flex">
										<i data-lucide="indian-rupee" class="report-box__icon text-primary"></i>
									</div>
									<div class="text-3xl font-medium leading-8 mt-6">
										<?php
										include("connection.php");

										// Get the current month
										$current_month = date('m');

										$query = "SELECT SUM(amount) FROM `payments` WHERE MONTH(dt) = $current_month";

										$result = mysqli_query($conn, $query);
										$row = mysqli_fetch_array($result);
										$sum = $row[0];

										// Function to format numbers with k, m, etc.
										function format_number($number)
										{
											$suffix = '';
											if ($number >= 1000000) {
												$number = $number / 1000000;
												$suffix = 'm';
											} elseif ($number >= 1000) {
												$number = $number / 1000;
												$suffix = 'k';
											}
											return number_format($number, 2) . $suffix;
										}

										echo format_number($sum);
										?>
									</div>
									<div class="text-base text-slate-500 mt-1">Payment Recieved <sup>(This Month)</sup></div>
								</div>
							</div>
						</div>
						<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
							<div class="report-box zoom-in">
								<div class="box p-5">
									<div class="flex">
										<i data-lucide="credit-card" class="report-box__icon text-pending"></i>
									</div>
									<div class="text-3xl font-medium leading-8 mt-6">
										<?php include("connection.php");
										$query = "SELECT COUNT(*) FROM `orders`";
										$result = mysqli_query($conn, $query);
										$row = mysqli_fetch_array($result);
										echo $row[0];
										?>
									</div>
									<div class="text-base text-slate-500 mt-1">Total Sales</div>
								</div>
							</div>
						</div>
						<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
							<div class="report-box zoom-in">
								<div class="box p-5">
									<div class="flex">
										<i data-lucide="monitor" class="report-box__icon text-warning"></i>
										<div class="ml-auto">
											<!-- <div class="report-box__indicator bg-success tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div> -->
										</div>
									</div>
									<div class="text-3xl font-medium leading-8 mt-6">
										<?php
										include("connection.php");
										$query = "SELECT COUNT(*) FROM `orders` WHERE MONTH(order_time) = MONTH(CURRENT_DATE())";
										$result = mysqli_query($conn, $query);
										$row = mysqli_fetch_array($result);
										$sum = $row[0];
										echo $sum;
										?></div>
									<div class="text-base text-slate-500 mt-1">This Month Sales</div>
								</div>
							</div>
						</div>
						<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
							<div class="report-box zoom-in">
								<div class="box p-5">
									<div class="flex">
										<i data-lucide="user" class="report-box__icon text-success"></i>
									</div>
									<div class="text-3xl font-medium leading-8 mt-6"><?php include("users_count.php");  ?></div>
									<div class="text-base text-slate-500 mt-1">Total Customers</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END: General Report -->
				<!-- BEGIN: Sales Report -->
				<div class="col-span-12 lg:col-span-12 mt-8">
					<div class="intro-y block sm:flex items-center h-10">
						<h2 class="text-lg font-medium truncate mr-5">
							Sales Report
						</h2>
						<!-- <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
								<i data-lucide="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i> 
								<input type="text" class="datepicker form-control sm:w-56 box pl-10">
							</div> -->
					</div>
					<div class="intro-y box p-5 mt-12 sm:mt-5">
						<div class="flex flex-col md:flex-row md:items-center">
							<div class="flex">
								<div>
									<div class="text-primary dark:text-slate-300 text-lg xl:text-xl font-medium">&#8377;
										<?php
										include("connection.php");

										// Get the current month
										$current_month = date('m');

										$query = "SELECT SUM(amount) FROM `payments` WHERE MONTH(dt) = $current_month";

										$result = mysqli_query($conn, $query);
										$row = mysqli_fetch_array($result);
										$sum = $row[0];



										echo $sum;
										?></div>
									<div class="mt-0.5 text-slate-500">This Month</div>
								</div>
								<div class="w-px h-12 border border-r border-dashed border-slate-200 dark:border-darkmode-300 mx-4 xl:mx-5"></div>
								<div>
									<div class="text-slate-500 text-lg xl:text-xl font-medium">&#8377;
										<?php
										include("connection.php");

										// Current month total amount
										$query_current_month = "SELECT SUM(amount) FROM `orders` WHERE MONTH(order_time) = MONTH(CURRENT_DATE())";
										$result_current_month = mysqli_query($conn, $query_current_month);
										$row_current_month = mysqli_fetch_array($result_current_month);
										$sum_current_month = $row_current_month[0];


										// Last month total amount
										$query_last_month = "SELECT SUM(amount) FROM `orders` WHERE YEAR(order_time) = YEAR(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH)) AND MONTH(order_time) = MONTH(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH))";
										$result_last_month = mysqli_query($conn, $query_last_month);
										$row_last_month = mysqli_fetch_array($result_last_month);
										$sum_last_month = $row_last_month[0];

										echo $sum_last_month;

										mysqli_close($conn);
										?></div>
									<div class="mt-0.5 text-slate-500">Last Month</div>
								</div>
							</div>
							<!-- <div class="dropdown md:ml-auto mt-5 md:mt-0">
									<button class="dropdown-toggle btn btn-outline-secondary font-normal" aria-expanded="false" data-tw-toggle="dropdown"> Filter by Category <i data-lucide="chevron-down" class="w-4 h-4 ml-2"></i> </button>
									<div class="dropdown-menu w-40">
										<ul class="dropdown-content overflow-y-auto h-32">
											<li><a href="" class="dropdown-item">PC & Laptop</a></li>
											<li><a href="" class="dropdown-item">Smartphone</a></li>
											<li><a href="" class="dropdown-item">Electronic</a></li>
											<li><a href="" class="dropdown-item">Photography</a></li>
											<li><a href="" class="dropdown-item">Sport</a></li>
										</ul>
									</div>
								</div> -->
						</div>

						<?php
						include("connection.php");

						$data = array();

						for ($i = 1; $i <= 12; $i++) {
							$count_query = "SELECT COUNT(*) FROM orders WHERE MONTH(order_time) = $i";

							$result = mysqli_query($conn, $count_query);
							$row = mysqli_fetch_array($result);
							$count = (int)$row[0];
							array_push($data, $count);
						}



						$datasets_1 = json_encode($data);

						echo "<script>var datasets_1 = $datasets_1;</script>";
						?>


						<div class="report-chart">
							<div class="h-[275px]">
								<canvas id="report-line-chart" class="mt-6 -mb-6"></canvas>
							</div>
						</div>
					</div>
				</div>
				<!-- END: Weekly Top Products -->
			</div>
		</div>
	</div>
</div>
<!-- END: Content -->
</div>
<script src="dist/js/app.js"></script>
<!-- END: JS Assets-->
</body>

</html>