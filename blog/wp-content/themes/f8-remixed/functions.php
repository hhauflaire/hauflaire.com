<?php

// Define Theme Options Variables

$themename='F8-Remixed';
$thumbnailsize = "310 x 150 pixels";
$slideshow = "false";
$thumbslider = "true";
$featured = "false";
$category_columns = "true";
$default_thumb = get_bloginfo('stylesheet_directory') . "/images/default-thumb.jpg";

function load_ie_head() { ?><!--[if IE]><link href="<?php bloginfo('stylesheet_directory'); ?>/ie-folio.css" rel="stylesheet" type="text/css" /><![endif]--><?php }
add_action('wp_head', 'load_ie_head');

function f8_options() {
$shortname = "gpp";

$options[] = array(	"name" => "Extend Featured Section",
					"desc" => "Check this to extend Thumbnails Section to 3 columns.",
					"id" => $shortname."_featured_columns",
					"std" => "false",
					"type" => "checkbox");	
   	return $options;
}
add_filter('childtheme_options', 'f8_options');

?>