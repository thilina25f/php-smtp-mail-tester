<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';  // Your SMTP server (e.g., smtp.gmail.com)
    $mail->SMTPAuth   = true;
    $mail->Username   = 'email address';     // Your email address
    $mail->Password   = 'App auth password';      // Your email password or app-specific password
    $mail->SMTPSecure = 'tls';                      // Encryption: 'tls' or 'ssl'
    $mail->Port       = 587;                        // TCP port to connect to
	$mail->SMTPDebug = 2;  // Optional: for detailed debugging output

    // Recipients
    $mail->setFrom('email address', 'Your Name');
    $mail->addAddress('receiver email address', 'Recipient Name');
	$mail->addBcc('receiver email address', 'Recipient Name');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a <b>test</b> email sent using PHPMailer.';

    $mail->send();
    echo 'Message has been sent successfully.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}