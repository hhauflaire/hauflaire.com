<?php get_header(); ?>
        <div id="sub">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>      
        	<div class="wpis_sub">
                <div class="tresc">
                	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="entry">
                    	<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                    </div>
                </div>
                <div class="end"></div>
            </div><!-- koniec wpisu -->
		<?php endwhile; endif; ?>
	<?php edit_post_link('edytuj ta strone', '<p>', '</p>'); ?>          
        </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>   