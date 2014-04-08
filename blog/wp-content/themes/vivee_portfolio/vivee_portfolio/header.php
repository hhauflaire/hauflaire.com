<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <script type="text/javascript" src="<?php echo get_option('home'); ?>/wp-content/themes/vivee_portfolio/js/jquery.js"></script>
  <script type="text/javascript" src="<?php echo get_option('home'); ?>/wp-content/themes/vivee_portfolio/js/funkcje_jquery2.js"></script>

<?php wp_head(); ?>
</head>
<body>
    <div id="page">
    
    	<div id="head">
        	<div id="vivee"><a href="<?php echo get_option('home'); ?>/" title="Vivee Portfolio Theme"></a></div>
            <div id="menu"><!-- menu górne -->
            	<ul>
                	<li><a href="<?php echo get_option('home'); ?>/"><span>Strona główna</span></a></li>
                    <li><a href="<?php echo get_option('home'); ?>/o-mnie/"><span>O mnie</span></a></li>
                    <li><a href="<?php echo get_option('home'); ?>/category/portfolio/"><span>Portfolio</span></a></li>
                    <li><a href="<?php echo get_option('home'); ?>/oferta/"><span>Oferta</span></a></li>
                    <li><a href="<?php echo get_option('home'); ?>/kontakt/"><span>Kontakt</span></a></li>
                </ul>
            </div>
            <div class="end"></div>
        </div>
