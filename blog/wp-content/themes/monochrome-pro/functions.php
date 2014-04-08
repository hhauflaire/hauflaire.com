<?php
function getPost($post = NULL) {
	include('post.php');
}
if ( function_exists('register_sidebar') )
{
    register_sidebar
    (   array
        (
          'name' => 'Sidebar',
          'before_widget' => '<div class="bottombar">',
          'after_widget' => '</div>',
          'before_title' => '<h2 class="widgettitle">',
          'after_title' => '</h2>',
        )
    );
    register_sidebar
    (   array
        (
          'name' => 'Sidebar-Home',
          'before_widget' => '<div class="bottombar">',
          'after_widget' => '</div>',
          'before_title' => '<h2 class="widgettitle">',
          'after_title' => '</h2>',
        )
    );  
    register_sidebar
    (   array
        (
          'name' => 'Bottom-Left',
          'before_widget' => '<div class="bottombar">',
          'after_widget' => '</div>',
          'before_title' => '<h2 class="widgettitle">',
          'after_title' => '</h2>',
        )
    );  
    register_sidebar
    (   array
        (
          'name' => 'Bottom-Middle',
          'before_widget' => '<div class="bottombar">',
          'after_widget' => '</div>',
          'before_title' => '<h2 class="widgettitle">',
          'after_title' => '</h2>',
        )
    );   
 register_sidebar
    (   array
        (
          'name' => 'Bottom-Right',
          'before_widget' => '<div class="bottombar">',
          'after_widget' => '</div>',
          'before_title' => '<h2 class="widgettitle">',
          'after_title' => '</h2>',
        )
    );   
}
// THEME OPTIONS - DO NOT EDIT
$themename = "Monochrome";
$shortname = "dt";
$options = array (
	array("name" => "Top Left Category",
		"id" => $shortname."_top_left_cat",
		"std" => "1",
		"type" => "text"),
	array("name" => "Top Right Category",
		"id" => $shortname."_top_right_cat",
		"std" => "",
		"type" => "text"),
	array("name" => "Middle Left Category",
		"id" => $shortname."_mid_left_cat",
		"std" => "",
		"type" => "text"),
	array("name" => "Middle Right Category",
		"id" => $shortname."_mid_right_cat",
		"std" => "",
		"type" => "text"),
	array("name" => "Bottom 1st Category",
		"id" => $shortname."_bot_1st_cat",
		"std" => "",
		"type" => "text"),
	array("name" => "Bottom 2nd Category",
		"id" => $shortname."_bot_2nd_cat",
		"std" => "",
		"type" => "text"),
	array("name" => "Bottom 3rd Category",
		"id" => $shortname."_bot_3rd_cat",
		"std" => "",
		"type" => "text"),
	array("name" => "Bottom 4th Category",
		"id" => $shortname."_bot_4th_cat",
		"std" => "",
		"type" => "text"),
	array("name" => "Bottom 5th Category",
		"id" => $shortname."_bot_5th_cat",
		"std" => "",
		"type" => "text")
);
/*
Plugin Name: Get The Image
Plugin URI: http://justintadlock.com/archives/2008/05/27/get-the-image-wordpress-plugin
Description: This is a highly intuitive script that gets an image either by custom field input or post attachment.
Version: 0.1 Beta
Author: Justin Tadlock
Author URI: http://justintadlock.com
License: GPL
*/

/***********************************************************
Catchall function for getting images
***********************************************************/
function get_the_image($arr = false, $default_size = 'medium', $default_img = false) {
	global $post;
	$cf_array = load_the_image($arr, $post, $default_size);
	$image = display_the_image($cf_array, $post, $default_size, $default_img);
	if($image == false) $image = '<!-- No images were added to this post. -->';
	return $image;
}

/***********************************************************
Catchall function for getting images with a link
***********************************************************/
function get_the_image_link($arr = false, $default_size = 'medium', $default_img = false) {
	global $post;
	$cf_array = load_the_image($arr, $post, $default_size);
	$image = display_the_image($cf_array, $post, $default_size, $default_img);

	if($image == false) :
		$image_link = '<!-- No images were added to this post. -->';
	else :
		$post_perm = get_permalink($post->ID);
		$image_link = "<a href=\"$post_perm\" title=\"$post->post_title\">$image</a>";
	endif;
	return $image_link;
}

/***********************************************************
Function for loading an image
***********************************************************/
function load_the_image($custom_fields = false, $en_post, $default_size) {

// Checks only if there are custom fields to check for
	if(isset($custom_fields)) {

	// Loop through the custom fields, checking for images or video
		$i = 0;
		while(strcmp($image[0],'') == 0 && $i <= sizeof($custom_fields)) {

		// Check custom field values for image, image alt text, and image class
			$image = get_post_custom_values($key = $custom_fields[$i]);
			$image_alt = get_post_custom_values($key = $custom_fields[$i] . ' Alt');
			$image_class = get_post_custom_values($key = $custom_fields[$i] . ' Class');
		// Convert custom field key name to image class
			$img_class = $custom_fields[$i];
			$img_class = strtolower($img_class);
			$img_class = str_replace (" ", "-", $img_class);

		// Add space to image class if user inputs an extra class
			if($image_class == true) $image_class .= ' ';

		// Add user image class to default image classes
			if($default_size == 'thumbnail' && $img_class == 'thumbnail') $image_class .= $default_size;
			elseif($default_size == 'medium' && $img_class == 'medium') $image_class .= $default_size;
			elseif($default_size == 'full' && $img_class == 'full') $image_class .= $default_size;
			else $image_class .= $img_class . ' ' . $default_size;

		$i++;
		} // End while loop
	} // End check for custom field image

// If there is no image set through custom fields, check post attachments
	if($image == false && $default_size == true) {
		$img_att_arr = find_attachment_image($custom_fields[0], $en_post, $default_size);
		if(strcmp($image_att_arr[0],'') == 0) :
			$image = $img_att_arr[0];
			$image_class = $img_att_arr[1];
			$image_alt = false;
		else :
			$image = false; $image_alt = false; $image_class = false;
		endif;
	}

// Return array with an image, image alt, and image class
	return array($image, $image_alt, $image_class);
}

/***********************************************************
Function for displaying an image
***********************************************************/
function display_the_image($cf_array = false, $en_post = false, $default_size = false, $default_img = false) {

// Set nice names for image info
	if($cf_array[0] == false && $default_img == true) :
		$image[0] = $default_img;
		$image_class = $default_size;
	else :
		$image = $cf_array[0];
		$image_alt = $cf_array[1];
		$image_class = $cf_array[2];
	endif;

// If there's any kind of image for this post
	if(isset($image[0]) && strcmp($image[0],'') != 0) :
	// Open img tag
		$output = '<img src="'.$image[0].'"';
		$output .= ' alt="';
	// Image alt text
		if(isset($image_alt[0]) && strcmp($image_alt[0],'') != 0) $output .= $image_alt[0];
		else $output .= $en_post->post_title;
	// Image class
		$output .= '" class="';
		if(isset($image_class[0])) $output .= $image_class;
		else $output .= 'left';
	// Close img tag
		$output .= '" />';
// If there's no image
	else :
		$output = false;
	endif;
// Return the image
	return $output;
}

/***********************************************************
Function for finding an attachment image.
Only called if no custom field images are set.
***********************************************************/
function find_attachment_image($custom_fields = false, $en_post = false, $default_size = 'medium') {

	$custom = $custom_fields;
	$custom = strtolower($custom);
	$custom = str_replace (" ", "-", $custom);
// Don't repeat the same class name
	if($custom == 'thumbnail' || $custom == 'medium' || $custom == 'full') $img_class = $default_size;
	else $img_class = $custom . ' ' . $default_size;

	$attachments = get_children( array('post_parent' => $en_post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	if($attachments == true) :
		foreach($attachments as $id => $attachment) :
			$img = wp_get_attachment_image_src($id, $default_size);
			$img_arr[0] = $img;
		endforeach;
		$img_arr[1] = $img_class;
	else :
		$img_arr = false;
	endif;
	return $img_arr;
}
function theme_add_admin() { global $themename, $shortname, $options; if ( $_GET['page'] == basename(__FILE__) ) { if ( 'save' == $_REQUEST['action'] ) { foreach ($options as $value) { update_option( $value['id'], $_REQUEST[ $value['id'] ] ); } foreach ($options as $value) { if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } } header("Location: themes.php?page=functions.php&saved=true"); die; } else if( 'reset' == $_REQUEST['action'] ) { foreach ($options as $value) { delete_option( $value['id'] ); } header("Location: themes.php?page=functions.php&reset=true"); die; } }  add_theme_page($themename." Options", "Theme Options", 'edit_themes', basename(__FILE__), 'theme_admin'); } function theme_admin() { global $themename, $shortname, $options; if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>'; if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';?><div class="wrap"><h2><?php echo $themename; ?> settings</h2><div id="currenttheme"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/options.jpg" alt"" /></div><form method="post"><table class="optiontable"><?php foreach ($options as $value) { if ($value['type'] == "text") { ?><tr valign="top"><th scope="row"><?php echo $value['name']; ?>:</th><td><input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td></tr><?php } elseif ($value['type'] == "select") { ?><tr valign="top"><th scope="row"><?php echo $value['name']; ?>:<br /><small><?php echo $value['desc']; ?></small></th><td><select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td></tr><?php } } ?></table><p class="submit"><input name="save" type="submit" value="Save changes" /><input type="hidden" name="action" value="save" /></p></form><form method="post"><p class="submit"><input name="reset" type="submit" value="Reset" /><input type="hidden" name="action" value="reset" /></p></form><?php } function theme_wp_head() { ?> <?php } add_action('wp_head', 'theme_wp_head'); add_action('admin_menu', 'theme_add_admin'); ?>