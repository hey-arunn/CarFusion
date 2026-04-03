<?php
// Include Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Load email configuration
$config = require_once __DIR__ . '/config/mail_config.php';

function sendEmail($to_email, $subject, $body, $isHTML = true) {
    global $config;
    
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                           // Send using SMTP
        $mail->Host       = $config['smtp']['host'];
        $mail->SMTPAuth   = true;                  // Enable SMTP authentication
        $mail->Username   = $config['smtp']['username'];
        $mail->Password   = $config['smtp']['password'];
        $mail->SMTPSecure = $config['smtp']['encryption'];
        $mail->Port       = $config['smtp']['port'];

        // Recipients
        $mail->setFrom($config['smtp']['from_address'], $config['smtp']['from_name']);
        $mail->addAddress($to_email);

        // Content
        $mail->isHTML($isHTML);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        return ['success' => true, 'message' => 'Email sent successfully'];
    } catch (Exception $e) {
        return ['success' => false, 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"];
    }
}

// If this file is called directly for OTP
if (isset($email_id) && isset($otp)) {
    $subject = 'CarFusion - OTP';
    $body = "Your One Time Password Is : <b>$otp</b><br>Please do not share the OTP with others.";
    
    $result = sendEmail($email_id, $subject, $body);
    
    if ($result['success']) {
        echo "<script>alert('OTP sent successfully!');</script>";
    } else {
        echo "<script>alert('Failed to send OTP: " . addslashes($result['message']) . "');</script>";
    }
}
?>