<?php get_header(); ?>

<div class="span-<?php if (get_option('gpp_sidebar') == 'true' || !get_option('gpp_sidebar')) { echo "15 colborder home"; } else { echo "24 last"; } ?>">

		<?php if (have_posts()) : ?>

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
<div class="content">
<?php while (have_posts()) : the_post(); ?>
<div <?php if(function_exists('post_class')) : ?><?php post_class(); ?><?php else : ?>class="post post-<?php the_ID(); ?>"<?php endif; ?>>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h2>
<?php include (TEMPLATEPATH . '/apps/multimedia.php'); ?>

<?php if (get_option('gpp_sidebar') =='true' || !get_option('gpp_sidebar')) { include (TEMPLATEPATH . '/apps/video-medium.php'); } else { include (TEMPLATEPATH . '/apps/video.php'); } ?>
<?php the_content(); ?>
<div class="clear"></div>
<p class="postmetadata"><?php the_time('M d, Y') ?> | Categories: <?php if (the_category(', '))  the_category(); ?> <?php if (get_the_tags()) the_tags('| Tags: '); ?> | <?php comments_popup_link('Leave A Comment &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', '| ', ''); ?> </p>
</div>
<hr />
<?php endwhile; ?>

<div class="clear"></div>

<div class="nav-interior">
			<div class="prev"><?php next_posts_link('&larr; Older Entries') ?></div>
			<div class="next"><?php previous_posts_link('Newer Entries &rarr;') ?></div>
		</div>
<div class="clear"></div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>
</div>
</div>
		
<?php if (get_option('gpp_sidebar') =='true' || !get_option('gpp_sidebar')) { get_sidebar(); } ?>

<!-- Begin Footer -->
<?php get_footer(); ?>