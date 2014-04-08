<?
/*
Plugin Name: Latest Comments With Avatars Reloaded
Plugin URI: http://www.connectedinternet.co.uk/category/projects/wordpress/
Version: 1.0
Description: This shows an overview of the recently active articles and the last people to comment on them, with their MyBlogLog Avatar if available.  Code tweaked and finalised with help from <a href="http://antieds.blog.163.com/">Billy Chung</a>.  For full instructions please visit the site.
Author: Everton Blair
Author URI:  http://www.connectedinternet.co.uk
Copyright 2006  Everton Blair  (email : admin@connectedinternet.co.uk)
Compatibility: 2.1+
License: GPL


    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

Release History

=============================================================================

2007-28-01	1.0	First Release

Installation:
Place the simple_recent_comments.php file in your /wp-content/plugins/ directory
and activate through the administration panel.

Usage:
1. Download the file lcareloaded.zip
2. Upload to your server?s /wp-content/plugins/ folder the file lca_reloaded.php and activate the plugin
3. Decide where you want to place the comments by adding the following code (the sidebar is an ideal place):

<?php if (function_exists('latest_comments_avatars')) latest_comments_avatars(); ?>
  
To display more posts increase the first function call, and the second call to show more avatars.  To include trackbacks change the second call to TRUE.
*/ 



// Adds CSS to the WordPress header (Thanks to Davide Salerno) 
/*
add_action("wp_head", "lca_header",1);
	
function lca_header() 
{
	echo '<link rel="stylesheet" href="'.get_settings('siteurl').'/wp-content/plugins/comments/comments_style.css" type="text/css" media="screen" />'."\n";
}
*/

function lca_myavatars($comment, $link) 
{

  //global 
  $lca_gravatar = "true";
  
	// START CONFIGURATION ***
	
	// Link URL when Gravatar is displayed
	$gravatar_URL  		= "http://www.gravatar.com/";

	// Link titles for mybloglog avatars: when avatars exist or not.
	$mybloglog_TITLE 	= "See my profile on MyBlogLog.com!";
	$mybloglog_NO_TITLE = "Click here to get Yourself a MyBlogLog profile!";

	// Link title for gravatar
	$gravatar_TITLE  	= "Get a Gravatar!";

	// Image shown when no avatar(s) are found, leave blank for the services' default
	$default_IMG		= "http://www.mybloglog.com/buzz/images/pict_none.gif";

	// Disabling this will make everyone see emails in links,
	// and MyBlogLog avatars shown also when no URL is provided.
	$safe_email 		= true;
	
	// END OF CONFIGURATION ***

	//global $comment;

	// Getting vars (now with Track(Ping)backs!)
	$url    			= $comment->comment_author_url;
	$email 				= $comment->comment_author_email;
	$nickname   		= $comment->comment_author;
	
	if($email == "")
	{
		// This is a track(ping)back
		// This works only for domains like http://www.myblog.ext
		// It will not work for blogs' address like http://www.mysite.ext/blog 
		$url = explode("/",$url);
		$url = "http://" . $url[2];
		
		// Just for a clean output...
		$nickname = ""; 
	}

	// Base URL for services
	if($url != ""  &&  $url != "http://")
		$mybloglog_URL = "http://www.mybloglog.com/buzz/co_redir.php?t=&amp;href=" . $url . "&amp;n=". $nickname;
	elseif($safe_email)
		$mybloglog_URL = "http://www.mybloglog.com/buzz/co_redir.php?t=";
	else
		$mybloglog_URL = "http://www.mybloglog.com/buzz/co_redir.php?t=&amp;href=mailto:" . $email . "&amp;n=". $nickname;

	// Image URL for services

	if($url != ""  &&  $url != "http://")
		$mybloglog_IMG = "http://pub.mybloglog.com/coiserv.php?href=" . $url . "&amp;n=". $nickname;
	elseif($safe_email)
		$mybloglog_IMG = "http://pub.mybloglog.com/coiserv.php?href=&amp;n=". $nickname;
	else
		$mybloglog_IMG = "http://pub.mybloglog.com/coiserv.php?href=mailto:" . $email . "&amp;n=". $nickname;

	$gravatar_IMG = "http://www.gravatar.com/avatar.php?gravatar_id=". md5($email) . "&amp;size=48&amp;default=".$default_IMG;
//class="MyAvatars"
//echo "<a$colstr href=\"".$link . "#comment-" . $commenter->comment_ID."\"$title>".stripslashes($commenter->comment_author)."</a>";

//this.parentNode.href = '" . $gravatar_URL . "'; this.parentNode.title = '" . $gravatar_TITLE . "';
// this.parentNode.title = '" . $mybloglog_NO_TITLE . "';
?> 
	
<?php 
}

 
function lca_outjs(){
echo <<<_HTML_

_HTML_;


} 
 
//function latest_comments_avatars($num_posts = 5, $num_comments = 6, $hide_pingbacks_and_trackbacks = true, $prefix = "<li class='alternate'>", $postfix = "</li>", $fade_old = true, $range_in_days = 10, $new_col = "#444444", $old_col = "#cccccc")
function latest_comments_avatars($num_posts = 5, $num_comments = 6, $hide_pingbacks_and_trackbacks = true, $prefix = "<li>", $postfix = "</li>")
{
lca_outjs();
	global $wpdb;
if (!function_exists('clamp')){
	function clamp($min, $max, $val) 
	{
		return max($min,min($max,$val));
	}
}  

	$usetimesince = function_exists('time_since'); // Work nicely with Dunstan's Time Since plugin (adapted by Michael Heilemann)

	// This is compensating for the lack of subqueries in mysql 3.x
	// The approach used in previous versions needed the user to
	// have database lock and create tmp table priviledges. 
	// This uses more queries and manual DISTINCT code, but it works with just select privs.
	if(!$hide_pingbacks_and_trackbacks)
		$ping = "";
	else
		$ping = "AND comment_type<>'pingback' AND comment_type<>'trackback'";
	$posts = $wpdb->get_results("SELECT 
		comment_post_ID, post_title 
		FROM ($wpdb->comments LEFT JOIN $wpdb->posts ON (comment_post_ID = ID))
		WHERE comment_approved = '1' 
		AND $wpdb->posts.post_status='publish'
		$ping
		ORDER BY comment_date DESC;");
		
	$seen = array();	
	$num = 0;

	
	foreach($posts as $post)
	{
		// The following 5 lines is a manual DISTINCT and LIMIT,
		// since mysql 3.x doesn't allow you to control which way a DISTINCT
		// select merges multiple entries.
		if(array_key_exists($post->comment_post_ID, $seen))
			continue;
		$seen[$post->comment_post_ID] = true;	
		if($num++ > $num_posts)
			break;
		
		$commenters = $wpdb->get_results("SELECT *, UNIX_TIMESTAMP(comment_date) AS unixdate FROM $wpdb->comments
	       			WHERE comment_approved = '1'
				AND comment_post_ID = '".$post->comment_post_ID."'
				$ping
				ORDER BY comment_date DESC
				LIMIT $num_comments;");

		$count = $wpdb->get_var("SELECT COUNT(comment_ID) AS c FROM $wpdb->comments WHERE comment_post_ID = $post->comment_post_ID AND comment_approved = '1' ".$ping);
		$i = 0;
		$link = get_permalink($post->comment_post_ID);
		if($usetimesince)
			$title = " title=\"Last comment was ".time_since($comment->unixdate)." ago\"";
		else
			$title  = "";
		echo "<li><a href=\"".$link."\"$title class=\"activityentry\">".stripslashes($post->post_title).
"</a></li>";
		foreach($commenters as $commenter)
		{
			if($usetimesince)
				$title = " title=\"Posted ".time_since($commenter->unixdate)." ago\"";

/*
			if($i++ > 0)
				echo ", ";
*/
		lca_myavatars($commenter, $link);
			//echo "<a$colstr href=\"".$link . "#comment-" . $commenter->comment_ID."\"$title>".stripslashes($commenter->comment_author)."</a>";
		}
		

	}
}

?>
