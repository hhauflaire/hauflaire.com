<?php
if(isset($_POST['submitted'])) {
	if($_POST['name'] == '') {
		$emailToError = 'Please eter your name';
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", $_POST['emailTo'])) {
		$emailToError = 'Enter a valid email address';
	}
	if($_POST['email'] == '') {
		$emailFromError = 'You forgot to enter the email address to send from.';
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", $_POST['emailFrom'])) {
		$emailFromError = 'Please enter a valid email';
	}
	
	if($_POST['message'] == '') {
		$messageError = 'Please enter a message';
	}

	if(!isset($nameError) && !isset($emailFromError) && !isset($messageError)) {
		include('sendEmail.php');
		include('thanks.php');
	}
}

?>