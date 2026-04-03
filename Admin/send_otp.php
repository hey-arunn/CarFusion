<?php
session_start();
$email_id = "";


include("connection.php");

//function to generate otp

function generate_otp(){
	$otp = rand(100000, 999999);
	return $otp;
}


$check = false;

//Clicking on button = Generate otp
if(isset($_POST['generate_otp'])){

    $email_id = $_POST['reset_pass_email'];

	$otp = generate_otp();
	// echo $otp;
	$_SESSION['otp'] = $otp;
	$_SESSION['email'] = $_POST['reset_pass_email'];

	if($email_id == ""){
		echo "<script> alert('Please Enter Email-Id') </script>";
	}
	else{
		

		$get_emailid_query = "SELECT `admin_email_id` FROM `admin_login`";
		$result = mysqli_query($conn, $get_emailid_query);

		while($cursor= mysqli_fetch_assoc($result)){

			//Checking if email id is stored in the database
			if($cursor['admin_email_id'] == $email_id){

				$check = true;
				
			}
			
		}

		//Sending mail-otp to only verified email-id
		if($check){
			include("send_mail.php");
		}
		else{
			echo "<script> alert('Email Address Not Exists!!') </script>";
		}
		
	}
}

	//Clicking on button = Verify otp
	if(isset($_POST['submit_otp'])){
		
		$input_otp = $_POST['otp_field'];
		$stored_otp = $_SESSION['otp'];
		$input_email_id = $_SESSION['email'];

		//If otp is valid password will be changed
		if($input_otp == $stored_otp){
			$input_pass = $_POST['reset_pass_password'];
			$admin_pass_update_query = "UPDATE `admin_login` SET `admin_password`='$input_pass' WHERE `admin_email_id`='$input_email_id'";

			$response = mysqli_query($conn, $admin_pass_update_query);
			if($response){
				echo "<script> alert('Password Changed Successfully') </script>";
			}
			else{
				echo "mysqli_error($conn)";
			}
			
			
		} else {
			echo "<script> alert('Incorrect Otp') </script>";
		}

	}

	//Close connection
	mysqli_close($conn);

?>