<?php get_header(); ?>

<div id="container">
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	<div id="left">
		<div id="logo"> <a href="index.html"/>
		</div>
		<div id="main_nav">
			<?php
			include ('../menu.php');
			?> 	
		</div>
	</div>    	
    <div id="right">
    	<div id="navmenu">
		</div>
		<div class="post">
        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        	<div class="entry">
        		<?php the_content(); ?>
                <p class="postmetadata">
				<?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><br />
				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
				</p>
				<?php get_footer(); ?>
			</div>
        </div>
		<?php endwhile; ?>
    	<div class="navigation">
        	<?php posts_nav_link('|','<','>'); ?>
        </div>
    	<?php else : ?>
    	<div class="post" id="post-<?php the_ID(); ?>">
        	<h2><?php _e('Not Found'); ?></h2>
			<?php endif; ?>
		</div>
		</div>
		<div id="sidebar">
		<?php get_sidebar(); ?>
		</div>
	</div>
</div>
</body>
</html>