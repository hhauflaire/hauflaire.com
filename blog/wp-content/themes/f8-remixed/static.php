<!-- Begin slideshow -->
<div class="app">
<?php $my_query = new WP_Query("showposts=1"); ?>
<ul id="static-portfolio">
<?php while ($my_query->have_posts()) : $my_query->the_post(); 
		$do_not_duplicate = $post->ID; ?>
    <li class="post-<?php the_ID(); ?> static-image-wrapper">
    	<?php get_the_image( "custom_key=large-image&default_size=large&width=950" ); ?>
    	<div class="title-overlay">
    		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h2>
    		<?php the_excerpt(); ?>
    		<p class="postmetadata"><?php the_time('M d, Y') ?> | <?php comments_popup_link('Have your say &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
    	</div>
    </li>
<?php endwhile; wp_reset_query(); ?>
</ul>
</div>