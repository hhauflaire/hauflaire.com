<?php

$mailTo = $_POST['hhauflaire@gmail.com'];
$name = $_POST['name'];
$mailFrom = $_POST['email'];
$message = $_POST['message'];

			
mail($mailTo, $subject, $message, "From: ".$mailFrom);
?>