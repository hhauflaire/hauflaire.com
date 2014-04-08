<?php get_header(); ?>

<!-- Pagination -->
<?php if ( $paged < 1 ) { ?>

<?php if ( get_option('gpp_slider_posts') == 'true' ) { include (TEMPLATEPATH . '/apps/slider-posts.php'); } ?>

<?php if ( get_option('gpp_slider') == 'true' || !get_option('gpp_slider')) { include ('slider.php'); } ?>

<?php if ( get_option('gpp_featured') == 'true' ) { include ('featured.php'); } ?>

<!-- End Better Pagination -->
<?php } ?>

<?php if ( get_option('gpp_blog') == 'true' ) { include (TEMPLATEPATH . '/apps/blog.php'); } ?>

<?php if ( get_option('gpp_category_columns') == 'true' || !get_option('gpp_category_columns') ) { include ('category-stack.php'); } ?>

<!-- Begin Footer -->
<?php get_footer(); ?>