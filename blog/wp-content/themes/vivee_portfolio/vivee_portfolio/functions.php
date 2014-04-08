<?php 
function custom_field_image($rodzaj){
	global $post;
	$dir = "http://palmiak.p5.dot.pl/wordpressik/obr/";
	$key = get_post_meta($post->ID, $rodzaj, true);
	
	if ($key!=null) {
		printf('<img src="%s%s" alt="wstep"/>', $dir, $key);
	}
}
?>