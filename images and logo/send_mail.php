<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$sender_email = 'kartikpatelcllg1254@gmail.com';
$sender_name = 'CarFusion';


$mail = new PHPMailer(true);


try {
    $mail->SMTPDebug = false;									 
    $mail->isSMTP();										 
    $mail->Host	 = 'smtp.gmail.com;';				 
    $mail->SMTPAuth = true;							 
    $mail->Username = 'kartikpatelcllg1254@gmail.com';				 
    $mail->Password = 'bbmk yhee owss pkro';					 
    $mail->SMTPSecure = 'tls';							 
    $mail->Port	 = 587; 

    $mail->setFrom($sender_email, $sender_name);		 
    $mail->addAddress($email_id);
    
    $mail->isHTML(true);								 
    $mail->Subject = 'CarFusion';
    $mail->Body = "Your One Time Password Is : <b>$otp</b><br>Please do not share the OTP with others.";
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $SEND = $mail->send();

    if($SEND){
    echo "<script> alert('Otp sent successfully!!') </script>";
    }
    

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>