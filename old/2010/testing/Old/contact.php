<?php
//If the form is submitted
if(isset($_POST['submit'])) {

	//Check to make sure that the name field is not empty
	if(trim($_POST['name']) == '') {
		$hasError = true;
	} else {
		$name = trim($_POST['name']);
	}

	//Check to make sure sure that a valid email address is submitted
	if(trim($_POST['email']) == '')  {
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
	
	//Check to make sure comments were entered
	if(trim($_POST['message']) == '') {
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$comments = stripslashes(trim($_POST['message']));
		} else {
			$comments = trim($_POST['message']);
		}
	}

	//If there is no error, send the email
	if(!isset($hasError)) {
		$emailTo = 'hhauflaire@gmail.com'; //Put your own email address here
		$body = "Name: $name \n\nEmail: $email \n\nComments:\n $comments";
		$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;

		mail($emailTo, $subject, $body, $headers);
		$emailSent = true;
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Heath Hauflaire : Designer</title>

<link rel="stylesheet" type="text/css" href="http://www.hauflaire.com/css/main.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
<script src="jquery.validate.pack.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
	$("#contactform").validate();
});
</script>

</head>

<body>
<div id="container">
	<div id="left">
		<div id="logo"> <a href="index.html"/>
		</div>
		<div id="main_nav">
			<a id="homeButton" href="index.html" title="home"><span> HOME</span></a>
			<a id="workButton" href="index.html" title="home"></a>
				<ul>
				<li class="subnav"> <a href="wts.html" title="What's The Scene?: Rating for Transient Virtual Communities"><span class="numbers">01.</span> What's The Scene?</a></li>
              	<li class="subnav"> <a href="spruce.html" title="Spruce: A Mobile Medical Records Concept"><span class="numbers">02.</span> Spruce</a></li>
             	<li class="subnav"> <a href="exacttarget.html" title="ExactTarget Brand Book"><span class="numbers">03.</span> ExactTarget Brand Book</a></li>
       	      	<li class="subnav"> <a href="furnforless.html" title="Furniture For Less Website"><span class="numbers">04.</span> Furniture For Less Website</a></li>
              	<li class="subnav"> <a href="colcourt.html" title="College Court Brochure"><span class="numbers">05.</span> College Court Brochure</a></li>
              	</ul>
			<a id="aboutButton" href="about.html" title="about me"><span> ABOUT ME</span></a>
			<a id="contactButton" href="contact.html" title="contact me"><span> CONTACT ME</span></a>
		</div>
	</div>
	<div id="right">
		<div id="projectCont">
			<div id="formCont">
				<h1>Contact Me</h1>
					<form class="form-general" action="?" method="post" id="sendEmail">
					<p class="text">Do you have any questions, comments or concerns?</p>
					<br />
					<p class="text3"> all fields are mandatory</p>

						<ol class="floatClear">
						<?php if(isset($hasError)) { //If errors are found ?>
						<p class="error">Please check if you've filled all the fields with valid information. Thank you.</p>
						<?php } ?>

						<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
						<p><strong>Email Successfully Sent!</strong></p>
						<p>Thank you <strong><?php echo $name;?></strong> for using my contact form! Your email was successfully sent and I will be in touch with you soon.</p>
						<?php } ?>

						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">						
						<li class="form"><label for="name">name:</label><input type="text" id="name" name="name" value="" /></li>
						&nbsp;
						<li class="form"><label for="email">email:</label><input type="text" id="email" name="email" value="" /></li>
						<br />
						<li class="formMessage"><label for="message">message:</label><textarea id="message" name="message" cols="20" rows="10"></textarea></li>
						<fieldset class="button">
							<legend></legend>
							<input name="submit" id="submit" type="submit" alt="submit" value=""/>
						</fieldset>
						</ol>

						<div class="clearing"></div>
					
					</form>
				<div class="projectContent">
					<p class="text2">
						<a class="linkedin-profileinsider-popup" href="http://www.linkedin.com/in/hhauflaire">My LinkedIn Profile</a>
					</p>
					<br />
				</div>
				<div class="projectContent">
					<a href="http://www.twitter.com/hhauflaire"><img src="http://twitter-badges.s3.amazonaws.com/follow_me-a.png" border="0" alt="Follow hhauflaire on Twitter"/></a>
				</div>
				<br />
				<br />
				<div class="projectContent">
					<object type="application/x-shockwave-flash" data="https://clients4.google.com/voice/embed/webCallButton" width="230" height="85"><param name="movie" value="https://clients4.google.com/voice/embed/webCallButton" /><param name="wmode" value="transparent" /><param name="FlashVars" value="id=401ab8c390c30ca24262027a0f22da95f7bbee96&style=0" /></object>
				</div>
		</div>
		<div id="footer">
			<p class="ft1"> &copy;2010 Heath Hauflaire </p>
		</div>
	</div>
</div>
</body>
</html>