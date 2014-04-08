<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" 
<?php language_attributes(); ?>
> 
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title> 
<?php wp_title(''); ?>
<?php if ( !(is_404()) && (is_single()) or (is_page()) or (is_archive()) ) { ?>
		:: 
<?php } ?>
<?php bloginfo('name'); ?>
	</title>
<?php 
// Do not delete
	wp_head(); 
// Controls the style through theme options
	global $options;
	foreach ($options as $value) {
		if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; }
		else { $$value['id'] = get_settings( $value['id'] ); } } 
	global $style, $show_cats, $show_feature, $feed, $feed_email;
	$style = $st_theme_style;
	$show_cats = $st_show_tabs_categories;
	$show_feature = $st_show_feature;
	$feed = $st_feed;
	$feed_email = $st_feed_email; ?>

	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/screen.css" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/print.css" type="text/css" media="print" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" media="screen, projection" />
<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/lib/ie.css" type="text/css" media="screen, projection" /><![endif]--> 
<!-- Javascripts  -->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery-1.2.3.js"></script>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.innerfade.js"></script>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/functions.js"></script>

<!--[if lt IE 7]>
	<script defer type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/pngfix.js"></script>
	<![endif]-->
<!--[if gte IE 5.5]>
   <script language="javaScript" src="<?php bloginfo('stylesheet_directory'); ?>/js/dhtml.js" type="text/javaScript"></script>
<script language="javaScript" src="<?php bloginfo('stylesheet_directory'); ?>/js/dhtml2.js" type="text/javaScript"></script>
   <![endif]-->
<!-- Show the grid and baseline  -->
<style type="text/css">
/*		.container { background: url(<?php bloginfo('stylesheet_directory'); ?>/css/lib/img/grid.png); }*/
	</style> 
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript">

	   $(document).ready(

				function(){

					$('#news').innerfade({

						animationtype: 'slide',

						speed: 750,

						timeout: 2000,

						type: 'random',

						containerheight: '1em'

					});

					

					$('ul#portfolio').innerfade({

						speed: 1000,

						timeout: 5000,

						type: 'sequence',

						containerheight: '480px'

					});

					

					$('.fade').innerfade({

						speed: 1000,

						timeout: 6000,

						type: 'random_start',

						containerheight: '1.5em'

					});

					

					$('.adi').innerfade({

						speed: 'slow',

						timeout: 5000,

						type: 'random',

						containerheight: '150px'

					});



			});

  	</script>
</head>
<body>
<div class="container">
<div class="container-bg">
<!-- Top Navigation -->
<ul id="navmenu-h-r">
<?php wp_list_categories('title_li='); ?>
</ul>
<!-- Search -->
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<!-- Logo -->
<div class="logo"><h1><a href="<?php echo get_settings('home'); ?>/" title="Return to the frontpage"><?php bloginfo('name'); ?></a></h1></div>
<!-- Navigation -->
<div class="column span-24 large" id="nav">
<div class="content">
<ul id="navmenu-h">
<li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
<?php wp_list_pages('sort_column=menu_order&depth=2&title_li='); ?>
<li class="alignright"><a href="<?php bloginfo('rss2_url'); ?>">Subscribe via RSS</a></li>
</ul>
</div>
</div>
