<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

    <title><?php wp_title( '-', true, 'right' ); echo wp_specialchars( get_bloginfo('name'), 1 ); ?></title>

    <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<meta name="description" content="<?php bloginfo('description') ?>" />
	<?php if(is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
    <?php }?>
    
<!-- Styles  -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/print.css" type="text/css" media="print" />
	<!--[if IE]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/styles/ie.css" type="text/css" media="screen, projection" /><![endif]-->
	<!-- Conditional Javascripts -->
	<!--[if IE 6]>
	<script src="<?php bloginfo('template_directory'); ?>/includes/js/pngfix.js"></script>	
	<![endif]-->
	<!-- End Conditional Javascripts -->

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('gpp_feedburner_url') <> "" ) { echo get_option('gpp_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<script type="text/javascript"> 
	    jQuery(document).ready(function() { 
		   jQuery('.mover').hide();
			  jQuery('#slideToggle').click(function(){
				 jQuery(this).siblings('.mover').slideToggle();
			  });
		   jQuery('ul.sf-menu').superfish({ 
			  delay:       500,                            // one second delay on mouseout 
			  animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
			  speed:       'fast',                          // faster animation speed 
			  autoArrows:  false,                           // disable generation of arrow mark-up 
			  dropShadows: true                            // disable drop shadows 
		   }); 
	    }); 
	</script>

</head>

<body <?php body_class(); ?>>
<div class="container">
<div class="container-inner">
<?php include ('inside.php'); ?>
<!-- BeginHeader -->
<div id="masthead">
<div id="logo">
	<h1 class="sitename"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><?php if(get_option('gpp_logo_off')=="true") { bloginfo('name'); } else { ?><img class="title" src="<?php if ( get_option('gpp_logo') <> "" ) { echo get_option('gpp_logo').'"'; } else { bloginfo('stylesheet_directory'); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /><?php } ?></a></h1>
           
   	<div class="description"><?php bloginfo('description'); ?></div>
</div>
    
    <?php
	$contact_info = get_option('gpp_contact_info');
 	$email = get_option('gpp_email');
 	$phone = get_option('gpp_phone');
 	if ($email === FALSE) { $emailval = "you@email.com"; } else { $emailval = get_option('gpp_email');}
 	if ($phone === FALSE) { $phoneval = "1-800-867-5309"; } else { $phoneval = get_option('gpp_phone');}
 	
    if ( get_option('gpp_contact_info') == 'true' || !get_option('gpp_contact_info') ) { ?>
        <ul class="right">
        <?php if(($phone === FALSE || $phone != "")) { ?><li><a href="tel:<?php echo $phoneval; ?>" class="icon phone"><?php echo $phoneval; ?></a></li><?php } ?>
        <?php if(($email === FALSE || $email != "")) { ?><li><a href="mailto:<?php echo $emailval; ?>" class="icon email">email me</a></li><?php } ?>
        </ul>
    <?php } ?>
</div>
<div class="clear"></div>


<?php if (is_home()) { ?>
<?php if ( get_option('gpp_video') == 'true' ) { include (TEMPLATEPATH . '/apps/video-home.php'); } ?>
<?php if ( get_option('gpp_slideshow') == 'true' ) { include (TEMPLATEPATH . '/apps/slideshow.php'); } ?>
<?php include ('static.php'); ?>
<?php } ?>
<?php include ('nav.php');  ?>
<!-- EndHeader -->