<?php get_header(); ?>

<!-- Makes for better pagination. -->
<?php if ( $paged < 1 ) { ?>

<?php if ( get_option('gpp_slider') == 'true' ) { include (TEMPLATEPATH . '/apps/slider.php'); } ?>

<?php if ( get_option('gpp_slider_posts') == 'true' ) { include (TEMPLATEPATH . '/apps/slider-posts.php'); } ?>

<?php if ( get_option('gpp_featured') == 'true' || !get_option('gpp_featured') ) { include ('featured.php'); } ?>

<!-- End Better Pagination -->
<?php } ?>

<?php if ( get_option('gpp_blog') == 'true' ) { include (TEMPLATEPATH . '/apps/blog.php'); } ?>

<?php if ( get_option('gpp_category_columns') == 'true' ) { include ('category-stack.php'); } ?>

<!-- Begin Footer -->
<?php get_footer(); ?>