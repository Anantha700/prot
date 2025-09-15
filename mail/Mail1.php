<?php
$to = "rockyanantha7.97@gmail.com";
$subject = "Mail from PHP";
$message = "This email was sent using the PHP mail() function.";
$headers = "From: Your Name <realanantha@gmail.com>";

if(mail($to, $subject, $message, $headers)) {
    echo "Mail sent";
} else {
    echo "Mail failed";
}
?>
