<!-- Begin slider -->
<?php
$slider_cat = get_option('gpp_slider_cat');
$slider_cat_ID = get_cat_ID($slider_cat);
?>

<div id="slider-section">
<div class="sliderGallery">
<?php $i = 0;
		$my_query = new WP_Query("showposts=-1&cat=$slider_cat_ID"); ?>
<ul class="items">
	<?php while ($my_query->have_posts() && $i<10) : $my_query->the_post();
		$do_not_duplicate = $post->ID; $i++ ?>

	<li class="post-<?php the_ID(); ?> slider-item"><?php get_the_image( "custom_key=thumbnail&default_size=thumbnail&width=310&height=150&image_class=attachment-thumbnail&default_image=$default_thumb" ); ?><span class="slider-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title() ?></a></span></li>
    <?php endwhile; wp_reset_query(); $i=0 ?>
</ul>
</div>
</div>
<div id="slider-handle">
	<div id="content-slider"></div>
</div>