<?php
include("connection.php");

$car_id = $_GET['car_id'];

$fetch_query = "SELECT * FROM cars WHERE car_id = '$car_id'";

$response = mysqli_query($conn, $fetch_query);

if ($car_details = mysqli_fetch_assoc($response)) {
	// Fetching car details from the database
} else {
	echo "<script>alert('404 Not found!')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CarFusion: Car Preview</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding-bottom: 50px;
			text-align: center;
		}

		.slider-container {
			position: relative;
			width: 100%;
			margin: 0 auto;
			overflow: hidden;
			border-radius: 15px;
		}

		.slider {
			display: flex;
			transition: transform 0.5s ease-in-out;
		}

		.slider img {
			width: 100%;
			height: auto;
		}

		.prev-btn,
		.next-btn {
			position: absolute;
			top: 50%;
			transform: translateY(-50%);
			background-color: rgba(0, 0, 0, 0.5);
			color: white;
			border: none;
			padding: 10px 20px;
			cursor: pointer;
		}

		.prev-btn {
			left: 0;
		}

		.next-btn {
			right: 0;
		}

		body {
			background-color: #fafafa;
		}

		.container {
			background-color: #fff;
			padding: 15px;
			border: 1px solid #e2e2e2;
			border-radius: 10px;
			max-width: 1200px;
		}

		h1.specs_heading {
			font-family: sans-serif;
			font-size: 21px;
			padding-bottom: 8px;
			border-bottom: 1px solid black;
			margin-bottom: 30px;
			width: 17%;
			margin-left: 22px;
			text-align: start;
		}

		.span {
			font-family: sans-serif;
			color: black;
			font-size: 15px;
			font-weight: 400;
			line-height: 1.5;
			margin-left: 5px;
			vertical-align: middle;
		}

		.iconsname {
			line-height: 1.5;
			font-family: roboto, Sans-Serif, Arial;
			border-collapse: collapse;
			border-spacing: 0;
			font-size: 15px;
			box-sizing: border-box;
			margin: 0;
			padding: 0;
			width: 50%;
			color: #24272c;
			text-align: right;
			font-weight: 500;
		}

		.specs_list1,
		.specs_list2 {
			border-bottom: 1px solid #e2e2e2;
			padding-bottom: 10px;
			padding-top: 16px;
		}

		.specs_list1 {
			margin-right: 30px;
		}

		.specs_list1 {
			margin-left: 30px;
		}

		.center {
			text-align: end;
		}

		.gap {
			height: 30px
		}

		.check {
			max-width: 50%;
			height: auto;
			display: inline-block;
		}

		.start {
			width: 50%;
			text-align: justify;
		}

		.specs-container {
			background-color: white;
			border: 1px solid #e2e2e2;
			border-radius: 15px;
			padding: 30px 0px 20px 0px;
			margin-bottom: 20px;
			margin-top: 40px;
		}

		.width {
			width: 1200px;
			margin: 0 auto;
		}

		h1.car-name {
			text-align: justify;
			font-family: sans-serif;
			font-size: 30px;
			font-weight: 600;
		}

		h1.car-price {
			text-align: justify;
			font-family: sans-serif;
			font-size: 18px;
			font-weight: 500;
		}

		span.on-road-price {
			font-size: 14px;
			color: #2176ae;
			font-family: monospace;
			font-weight: 600;
		}

		p.shoeroom-price {
			color: grey;
			font-family: monospace;
			font-size: 13px;
			margin-top: 5px;
		}

		input.book-now {
			background-color: #1441ac;
			border: none;
			padding: 12px 60px;
			border-radius: 9px;
			color: white;
			font-family: sans-serif;
			letter-spacing: 0.6px;
			font-size: 17px;
			margin-top: 40px;
		}

		img.promotion {
			width: 20px;
		}

		.book-now-btn {
			text-align: start;
		}

		.tag-icon {
			margin-top: 12px;
			color: grey;
			font-family: system-ui;
		}

		.container-specs {
			background-color: #fff;
			padding: 15px;
			border: 1px solid #e2e2e2;
			border-radius: 10px;
			max-width: 1200px;
			margin: 20px auto;
		}

		.specs_list {
			padding-bottom: 10px;
			padding-top: 16px;
		}

		.specs_list {
			margin-right: 30px;
			margin-left: 30px;
		}

		img.specs-img {
			width: 25px;
		}
	</style>
	<div class="specs-container">
		<div class="row width">
			<div class="col-md-5">
				<div class="slider-container">
					<div class="slider">
						<img src="data:image/jpeg;base64,<?php echo base64_encode($car_details['image_front']) ?>" alt="Image 1">
						<img src="data:image/jpeg;base64,<?php echo base64_encode($car_details['image_back']) ?>" alt="Image 2">
						<img src="data:image/jpeg;base64,<?php echo base64_encode($car_details['image_inside']) ?>" alt="Image 3">
						<!-- <img src="tharslider4.png" alt="Image 4"> -->
					</div>
					<button class="prev-btn" onclick="prevSlide()">&#10094;</button>
					<button class="next-btn" onclick="nextSlide()">&#10095;</button>
				</div>

				<script src="script.js"></script>

				<div class="col-md-7">
				</div>
			</div>
			<div class="col-md-7">
				<h1 class="car-name">
					<?php echo $car_details['car_brand'] . ' ' . $car_details['car_name']; ?>
				</h1>
				<h1 class="car-price">
					Rs.<?php echo $car_details['car_price']; ?>*
					<!-- <span class="on-road-price">Get On-Road Price</span> -->
					<p class="shoeroom-price">*Ex-showroom Price</p>
				</h1>
				<div class="book-now-btn">
					<a href="book now.php?car_id=<?php echo $car_id;?>">
					<input class="book-now" type="button" value="Book Now" name="Book Now"></a>
					<div class="tag-icon"> <img class="promotion" src="icons/promotion.png"> Don't miss out on the best offers for this month </div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-specs">
		<h1 class="specs_heading">
			Key Features
		</h1>
		<div class="row">
			<div class=" col-md-5 specs_list">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<img class="specs-img" src="icons/engine.png">
							<span class="span">Engine</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['engine_cc']; ?> cc</td>
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<img class="specs-img" src="icons/power.png">
							<span class="span">Power</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php $power_hp = ($car_details['engine_cc'] * $car_details['torque']) / 5252;
												echo round($power_hp); ?> hp</td>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-5 specs_list">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<img class="specs-img" src="icons/torque-wrench.png">
							<span class="span">Torque</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['torque']; ?> Nm</td>
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<img class="specs-img" src="icons/seat.png">
							<span class="span">Seating Capacity</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['seats']; ?></td>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-5 specs_list">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<img class="specs-img" src="icons/tyre.png">
							<span class="span">Drive Type</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['transmission']; ?></td>
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<img class="specs-img" src="icons/speedometer.png">
							<span class="span">Mileage</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['mileage']; ?> kmpl</td>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<h1 class="specs_heading">
			Key Specifications
		</h1>
		<div class="row">
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<span class="span">Mileage</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['mileage']; ?> kmpl</td>
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<span class="span">Fuel Type</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['fuel_type']; ?></td>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<span class="span">Engine Displacement</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['engine_cc']; ?>cc</td>
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<span class="span">No. of Cylinders</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['cylinders']; ?></td>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<span class="span">Max Power</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo round($power_hp); ?> hp</td>
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<span class="span">Max Torque</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['torque']; ?> Nm</td>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<span class="span">Seating Capacity</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['seats']; ?></td>
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<span class="span">Transmission Type</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['transmission']; ?></td>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<span class="span">Fuel Tank Capacity</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['tank_capacity']; ?> Liters</td>
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-6 start">
						<td class="iconshold">
							<span class="span">Body Type</span>
						</td>
					</div>
					<div class="col-md-6 center">
						<td class="iconsname"><?php echo $car_details['category']; ?></td>
					</div>
				</div>
			</div>
		</div>
		<div class="gap"></div>
		<h1 class="specs_heading">
			Key Specifications
		</h1>
		<div class="row">
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-10">
						<td class="iconshold">
							<span class="span">Power Steering</span>
						</td>
					</div>
					<div class="col-md-2 center">
						<img class="check" src="icons/check.png">
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-10">
						<td class="iconshold">
							<span class="span">Power Windows Front</span>
						</td>
					</div>
					<div class="col-md-2 center">
						<img class="check" src="icons/check.png">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-10">
						<td class="iconshold">
							<span class="span">Anti Lock Braking System</span>
						</td>
					</div>
					<div class="col-md-2 center">
						<img class="check" src="icons/check.png">
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-10">
						<td class="iconshold">
							<span class="span">Air Conditioner</span>
						</td>
					</div>
					<div class="col-md-2 center">
						<img class="check" src="icons/check.png">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-10">
						<td class="iconshold">
							<span class="span">Driver Airbag</span>
						</td>
					</div>
					<div class="col-md-2 center">
						<img class="check" src="icons/check.png">
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-10">
						<td class="iconshold">
							<span class="span">Passenger Airbag</span>
						</td>
					</div>
					<div class="col-md-2 center">
						<img class="check" src="icons/check.png">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-10">
						<td class="iconshold">
							<span class="span">Alloy Wheels</span>
						</td>
					</div>
					<div class="col-md-2 center">
						<img class="check" src="icons/check.png">
					</div>
				</div>
			</div>
			<div class=" col-md-5 specs_list1">
				<div class="row">
					<div class="col-md-10">
						<td class="iconshold">
							<span class="span">Multi-function Steering Wheel </span>
						</td>
					</div>
					<div class="col-md-2 center">
						<img class="check" src="icons/check.png">
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		let slideIndex = 0;
		const slides = document.querySelectorAll('.slider img');
		const totalSlides = slides.length;

		function showSlide() {
			if (slideIndex < 0) {
				slideIndex = totalSlides - 1;
			} else if (slideIndex >= totalSlides) {
				slideIndex = 0;
			}

			const offset = -slideIndex * 100;
			document.querySelector('.slider').style.transform = `translateX(${offset}%)`;
		}

		function nextSlide() {
			slideIndex++;
			showSlide();
		}

		function prevSlide() {
			slideIndex--;
			showSlide();
		}

		// Automatically advance slides every 3 seconds (optional)
		setInterval(nextSlide, 3000);
	</script>
	</body>

</html>