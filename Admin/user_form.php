<?php
include('header.php');
include('sidemenu.php'); ?>
<style>
	.mt-3 {
		display: inline-block;
		width: 50%;
		float: left;
		padding: 0 10px;
	}

	.button {
		width: 10%;
	}

	.btn {
		width: 140%;
	}
</style>
<div class="content">
	<?php include('top_bar.php'); ?>
	<div class="intro-y flex items-center mt-8">
		<h2 class="text-lg font-medium mr-auto">
			Add New User
		</h2>
	</div>
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 lg:col-span-12">
			<!-- BEGIN: Input -->
			<div class="intro-y box">
				<div id="input" class="p-5">

					<!-- Adding user in the database -->
					<?php
					include("connection.php");
					include("add_user.php");

					?>

					<form action="#" method="post">
						<div class="preview">
							<div class="mt-3">
								<label for="regular-form-2" class="form-label">Enter User Name</label>
								<input id="regular-form-2" type="text" name="user_name" class="form-control" placeholder="Enter Name" >
							</div>
							<div class="mt-3">
								<label for="regular-form-2" class="form-label">Enter User Phone </label>
								<input id="regular-form-2" type="number" name="user_phone" class="form-control" placeholder="Enter Phone"  maxlength="10" minlength="10">
							</div>
							<div class="mt-3">
								<label for="regular-form-2" class="form-label">Enter User Email </label>
								<input id="regular-form-2" type="text" name="user_email" class="form-control" placeholder="Enter Email " >
							</div>
							<div class="mt-3">
								<label for="regular-form-2" class="form-label">Enter User Password </label>
								<div class="input-group">
									<input id="password" type="password" name="user_password" class="form-control" placeholder="Enter Password " required=" /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/">
									<button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
										<i data-lucide="eye" class="w-4 h-4"></i>
									</button>
								</div>
							</div>
							<div class="mt-3">
								<label for="regular-form-2" class="form-label">Enter User Address </label>
								<input id="regular-form-2" type="text" name="user_address" class="form-control" placeholder="Enter Address " >
							</div>
							<div class="mt-3">
								<label for="regular-form-2" class="form-label">Enter User City </label>
								<input id="regular-form-2" type="text" name="user_city" class="form-control" placeholder="Enter Address " >
							</div>
							<div class="mt-3">
								<label for="regular-form-1" class="form-label">Select State</label>
								<select class="form-control" name="user_state" required>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Arunachal Pradesh">Arunachal Pradesh</option>
									<option value="Assam">Assam</option>
									<option value="Bihar">Bihar</option>
									<option value="Chhattisgarh">Chhattisgarh</option>
									<option value="Goa">Goa</option>
									<option value="Gujarat">Gujarat</option>
									<option value="Haryana">Haryana</option>
									<option value="Himachal Pradesh">Himachal Pradesh</option>
									<option value="Jharkhand">Jharkhand</option>
									<option value="Karnataka">Karnataka</option>
									<option value="Kerala">Kerala</option>
									<option value="Madhya Pradesh">Madhya Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Manipur">Manipur</option>
									<option value="Meghalaya">Meghalaya</option>
									<option value="Mizoram">Mizoram</option>
									<option value="Nagaland">Nagaland</option>
									<option value="Odisha">Odisha</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Sikkim">Sikkim</option>
									<option value="Tamil Nadu">Tamil Nadu</option>
									<option value="Telangana">Telangana</option>
									<option value="Tripura">Tripura</option>
									<option value="Uttar Pradesh">Uttar Pradesh</option>
									<option value="Uttarakhand">Uttarakhand</option>
									<option value="West Bengal">West Bengal</option>
								</select>

							</div>
							<br />
							<div class="mt-3">
								<label for="status" class="form-label">Status</label>
								<select id="status" name="status" class="form-control">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
								<br>
								<br>
							</div>
							<div class="button">
								<div style="margin-left: 10px;">
									<button class="btn btn-primary mt-5" id="submit" name="user_form_sbm_btn">Submit</button>
								</div>
							</div>
						</div>
					</form>

					<!-- Connection Close -->
					<?php

					mysqli_close($conn);

					?>

				</div>
			</div>
		</div>

	</div>
</div>
<!-- END: Content -->
</div>
<script src="dist/js/app.js"></script>
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.querySelector('[data-lucide="eye"]');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('data-lucide', 'eye-off');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('data-lucide', 'eye');
        }
        lucide.createIcons();
    }
</script>
<!-- END: JS Assets-->
</body>

</html>