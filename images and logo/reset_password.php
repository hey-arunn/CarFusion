<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        body {
            background: linear-gradient(135deg, #2980b9, #6dd5fa);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Form styling */
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .btn-fill {
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>

<?php
include("send_otp.php");
?>
<form action="#" method="post" class="border p-5 rounded">
    <div class="form-group">
        <input type="email" class="form-control" name="reset_pass_email" placeholder="Enter E-Mail" value="<?php if(isset($_POST['reset_pass_email'])) echo htmlspecialchars($_POST['reset_pass_email']); ?>">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-fill" name="generate_otp">Generate OTP</button>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="reset_pass_password" placeholder="Enter New Password">
    </div>
    <div class="form-group">
        <input type="number" class="form-control" name="otp_field" placeholder="Enter OTP">
    </div>
    <div class="form-group d-flex flex-column">
        <button type="submit" class="btn btn-success btn-fill mb-2" name="submit_otp">Verify OTP</button>
        <a href="index.php" class="btn btn-info btn-fill" style="color: #fff;">Login</a>
    </div>
</form>


    
<!-- Add Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
