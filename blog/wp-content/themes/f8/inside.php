<!-- Begin more inside -->
<?php
$featured_category = get_option('gpp_featured_cat');
if($featured_category=="") {$featured_category = "Latest";}
$featured_category_ID = get_cat_ID($featured_category);
?>
<?php $default_thumb = get_bloginfo('stylesheet_directory') . "/images/default-thumb.jpg"; ?>
<div id="inside-wrap">
<div class="pusher png_bg" id="slideToggle"><a class="more">View Work</a></div>
<div class="mover">
<?php if ( get_option('gpp_welcome') == 'true' || !get_option('gpp_welcome') ) { include (TEMPLATEPATH . '/apps/welcome.php'); } ?>

<!-- Begin portfolio -->
<h3 class="sub"><?php echo "$featured_category"; ?></h3>
<?php $my_query = new WP_Query("cat='$featured_category_ID'&showposts=9"); ?>
	<?php $i = 0; ?>
	<?php while ($my_query->have_posts()) : $my_query->the_post();
		$do_not_duplicate = $post->ID; $i++; ?>
			<div class="span-8<?php if ($i == 3) { ?> last<?php $i = 0; } ?>">
			<div class="post-<?php the_ID(); ?> portfolio-image-wrapper">
			<?php get_the_image( "custom_key=thumbnail&default_size=thumbnail&width=310&image_class=attachment-thumbnail&default_image=$default_thumb" ); ?>
			<div class="category-overlay"><?php if (the_category(', '))  the_category(); ?></div>
			<h6 class="title-overlay"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h6>
			</div>
			<div class="clear"></div>
			</div>
	<?php endwhile; wp_reset_query(); ?>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>