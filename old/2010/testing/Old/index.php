<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Heath Hauflaire | Designer</title>

<link rel="stylesheet" type="text/css" href="../css/main.css" />
<script src="http://trevordavis.net/wp-content/themes/td-v3/js/jquery.js" type="text/javascript"></script>
<script src="/js/submitform.js" type="text/javascript"></script>

<script src="http://widgets.twimg.com/j/2/widget.js"></script>

<?php
// Include Wordpress 
define('WP_USE_THEMES', false);
require('../blog/wp-load.php');
query_posts('showposts=3');
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />";
?> 
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
		<div id="pageHeader">
			<img border="0" src="/images/welcome.gif" alt="welcome to my website. my name is heath, I design solutions, interactions, graphics, brands &amp; experiences" />
		</div>
			<?php while (have_posts()): the_post(); ?>
			<div class="projectCont">
			<h2><?php the_title(); ?></h2>
			<h4><?php the_content(); ?></h4>
			<h5><u><a href="<?php the_permalink(); ?>">Read more...</a></u></h5>
			</div>
			<?php endwhile; ?>
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
		<div id="footer">
		<p class="ft1"> &copy;2010 Heath Hauflaire </p>
	</div>

	</div>
</div>

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