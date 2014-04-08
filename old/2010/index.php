<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Heath Hauflaire | Designer</title>

<link rel="stylesheet" type="text/css" href="css/main.css" />
<script src="http://trevordavis.net/wp-content/themes/td-v3/js/jquery.js" type="text/javascript"></script>
<script src="/js/submitform.js" type="text/javascript"></script>

<script src="http://widgets.twimg.com/j/2/widget.js"></script>

</head>


<body>
<div id="container">
	<div id="left">
		<div id="logo"> <a href="index.php"/></a>
		</div>
		<div id="main_nav">
			<?php
			include ('menu.php');
			?> 	
		</div>
	</div>
	<div id="right">
		<div id="pageHeader">
			<img border="0" src="images/welcome.gif" alt="welcome to my website. my name is heath, I design solutions, interactions, graphics, brands &amp; experiences" />
		</div>
		<div class="projectCont">
			<script>
				new TWTR.Widget({
				version: 2,
				type: 'profile',
				rpp: 1,
				interval: 6000,
				width: 700,
				height: 100,
				theme: {
				shell: {
				background: '#ffffff',
				color: '#666666'
				},
				tweets: {
				background: '#ffffff',
				color: '#333333',
				links: '#999999'
				}
				},
				features: {
				scrollbar: false,
				loop: false,
				live: false,
				hashtags: true,
				timestamp: true,
				avatars: false,
				behavior: 'all'
				}
				}).render().setUser('hhauflaire').start();
			</script>
		</div>
		<div class="projectCont">
			<h1><a href="wts.php">What's The Scene?</a></h1>
			<div class="project_img">
				<a href="wts.php"><img border="0" src="images/wts.jpg" alt="image of What's The Scene screens"/></a>
			</div>
			<p class="text2">A concept and prototype for a location-aware, micro-blogging application for transient virtual communities built for the iPhone. <a href="wts.php"><u><i>Learn more about What's The Scene</i></u></a></p>
		</div>
		<div class="projectCont">
			<h1><a href="spruce.php">Spruce</a></h1>
			<div class="project_img">
				<a href="spruce.php"><img border="0" src="images/spruce1.jpg" alt="image of spruce screens"/></a>
			</div>
			<p class="text2">A device and application design concept and prototype for use in hospital emergency departments as a mediary between triage and the front-line care workers. <a href="spruce.php"><u><i>Learn more about Spruce</i></u></a></p>
		</div>
		<div class="projectCont">
			<h1><a href="ecometer.php">ecoMeter: A Home Energy Monitoring Concept</a></h1>
			<div class="project_img">
				<a href="ecometer.php"><img border="0" src="images/portfolio/ecometer/ecometer1.jpg" alt="image of ecoMeter"/></a>
			</div>
			<p class="text2">A concept for a device for monitoring and controlling home energy usage. <a href="exacttarget.php"><u><i>Learn more about ecoMeter</i></u></a></p>
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