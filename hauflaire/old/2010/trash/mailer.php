<?php
$to = "hhauflaire@gmail.com";
$subject = "Contact Us";
$email = $_REQUEST['email'] ;
$name = $_REQUEST['name'] ;
$message = $_REQUEST['message'] ;
$headers = "From: $email";
$sent = mail($to, $subject, $message, $headers) ;
if($email == '') {print "You have not entered an email, please go back and try again";}
else {print "Your mail was sent successfully"; }
?> 