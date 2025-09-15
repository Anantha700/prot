<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';   // Your SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'rockyanantha7@gmail.com'; // Your email
    $mail->Password   = 'vdkw smfz aics qwsb';    // App password or SMTP password
    $mail->SMTPSecure = 'tls';                  // 'ssl' also works if supported
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('rockyanantha7@gmail.com', 'Anantha');
    $mail->addAddress('rockyanantha7.97@gmail.com', 'Pathmanapan');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = '<h1>Welcome to </h1>';
    $mail->AltBody = 'Welcome to SJC';

    $mail->send();
    echo 'Message has been sent successfully';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
