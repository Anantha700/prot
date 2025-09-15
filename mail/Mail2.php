<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "PHPMailerAutoload.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $name = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'])) : '';
    $email = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : '';
    $message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'])) : '';


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
    $mail->addAddress('rockyanantha7.97@gmail.com');

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
}
?>

<!DOCTYPE html>
<html lan="en">
<head>
  <title>Send Mail</title>
</head>
<body>
  <form action="Mail2.php" method ="post">
    <input type="text" placeholder="Enter Name" name= "name"><br>
    <input type="email" placeholder="Enter Email" name= "email"><br>
    <input type="submit" value="submit" name="submit">
  </form>
</body>
</html>
