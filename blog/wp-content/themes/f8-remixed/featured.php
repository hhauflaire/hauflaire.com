<?php
$featured_category = get_option('gpp_featured_cat');
if($featured_category=="") {$featured_category = "Latest";}
$featured_category_ID = get_cat_ID($featured_category);

$blog_number = get_option('gpp_blog_number');
$blog_category = get_option('gpp_blog_cat');
if($blog_category=="") {$blog_category = "Blog";}
$blog_category_ID = get_cat_ID($blog_category);

$featured_columns = get_option('gpp_featured_columns');
if($featured_columns=="true"){$col=3;$span="span-24 last";$noposts=9;}else{$col=2;$span="span-16 colborder home";$noposts=8;}
?>
<div class="<?php echo $span; ?>">

<h3 class="sub"><?php echo "$featured_category"; ?></h3>
	<?php $my_query = new WP_Query("cat='$featured_category_ID'&showposts=$noposts"); ?>
	<?php $i = 0; ?>
	<?php while ($my_query->have_posts()) : $my_query->the_post();
		$do_not_duplicate = $post->ID; $i++; ?>
			<div class="span-8<?php if (($i%2)==0) { ?> last<?php } ?>">
			<div class="post-<?php the_ID(); ?> portfolio-image-wrapper">
			
			<?php get_the_image( "custom_key=thumbnail&default_size=thumbnail&width=310&image_class=attachment-thumbnail&default_image=$default_thumb" ); ?>			
			
			<div class="category-overlay"><?php if (the_category(', '))  the_category(); ?></div>
			<h6 class="title-overlay"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h6>
			</div>
			<div class="clear"></div>
			</div>
			
	<?php endwhile; wp_reset_query(); ?>
</div>
<?php if($featured_columns!="true") { ?>
<div class="span-7 last">
<div id="sidebar">
<h3 class="sub">Latest Blog Entry</h3>
	<?php $my_query = new WP_Query("cat='$blog_category_ID'&showposts=1"); ?>
		<?php while ($my_query->have_posts()) : $my_query->the_post();
		$do_not_duplicate = $post->ID; ?>
			<h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h6>
			<p class="byline"><?php the_time('M d, Y') ?> | <?php comments_popup_link('Discuss', '1 Comment', '% Comments'); ?></p>
			<?php the_excerpt(); ?>
			<?php endwhile; ?>
<h3 class="sub">Previous Blog Entries</h3>
	<?php $my_query = new WP_Query("cat='$blog_category_ID'&showposts=5&offset=1"); ?>
	<ul>
		<?php while ($my_query->have_posts()) : $my_query->the_post();
		$do_not_duplicate = $post->ID; ?>
			<li class="post" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></li>
		<?php endwhile; ?>
	</ul>
</div>
</div>
<?php } ?>
<hr />