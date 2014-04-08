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

<link rel="stylesheet" type="text/css" href="css/main.css" />
<script src="http://trevordavis.net/wp-content/themes/td-v3/js/jquery.js" type="text/javascript"></script>
<script src="js/submitform.js" type="text/javascript"></script>
<script type="text/javascript" src="http://www.linkedin.com/js/public-profile/widget-os.js"></script>

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
			<?php
			include ('menu.php');
			?> 	
		</div>
	</div>
	<div id="right">
		<div id="projectCont">
			<h1>Contact Me</h1>
			<div class="projectContent">
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
					
					</form>				<p class="text2">You can also contact me here:</p>
			</div>
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
			<object type="application/x-shockwave-flash" data="https://clients4.google.com/voice/embed/webCallButton" width="300" height="100"><param name="movie" value="https://clients4.google.com/voice/embed/webCallButton" /><param name="wmode" value="transparent" /><param name="FlashVars" value="id=401ab8c390c30ca24262027a0f22da95f7bbee96&style=0" /></object>
			</div>
		</div>
		<div id="footer">
			<p class="ft1"> &copy;2010 Heath Hauflaire </p>
		</div>
	</div>
</div>

<script type="text/javascript" src="http://www.hauflaire.com/clickheat/js/clickheat.js"></script><noscript><p><a href="http://www.labsmedia.com/clickheat/index.html">Web design optimisation</a></p></noscript><script type="text/javascript"><!--
clickHeatSite = 'hauflaire.com';clickHeatGroup = 'index';clickHeatServer = 'http://www.hauflaire.com/clickheat/click.php';initClickHeat(); //-->
</script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12492184-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>