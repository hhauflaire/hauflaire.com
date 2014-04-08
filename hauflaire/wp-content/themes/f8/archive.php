<?php get_header(); rewind_posts(); ?>
<div class="span-24 last">

		<?php 
		query_posts($query_string.'&posts_per_page=24');
		if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h3 class="sub"><?php single_cat_title(); ?></h3>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h3 class="sub">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h3>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h3 class="sub">Archive for <?php the_time('F jS, Y'); ?></h3>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h3 class="sub">Archive for <?php the_time('F, Y'); ?></h3>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h3 class="sub">Archive for <?php the_time('Y'); ?></h3>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h3 class="sub">Author Archive</h3>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h3 class="sub">Blog Archives</h3>
 	  <?php } ?>
<div class="clear"></div>
<?php $i = 0; ?>
<div class="content">
<?php while (have_posts()) : the_post(); $i++; ?>
	<div class="span-8<?php if ($i == 3) { ?> last<?php  } ?>">
		<div class="post-<?php the_ID(); ?> portfolio-image-wrapper">
			<?php get_the_image("custom_key=thumbnail&default_size=thumbnail&width=310&image_class=attachment-thumbnail&default_image=$default_thumb"); ?>
			<div class="category-overlay"><?php if (the_category(', '))  the_category(); ?></div>
			<h6 class="title-overlay"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h6>
			</div>
		</div>
<?php if ($i == 3) { ?><div class="clear"></div><?php $i = 0; } ?>
<?php endwhile; ?>
</div>
<div class="clear"></div>

<div class="nav-interior">
			<div class="prev"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="next"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
<div class="clear"></div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
</div>
</div>


<!-- Begin Footer -->
<?php get_footer(); ?>