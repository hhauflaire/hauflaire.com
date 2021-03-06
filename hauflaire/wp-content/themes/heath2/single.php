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
    	<div class="post">
        	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        	<div class="entry">
        		<?php the_content(); ?>
                <?php link_pages('<p><strong>Pages:</strong>','</p>','number'); ?>
                <p class="postmetadata">
					<?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><?php edit_post_link('Edit', ' &#124; ', ''); ?>
				</p>
			</div>
            <div class="comments-template">
            <?php comments_template(); ?>
            </div>
         <?php get_footer(); ?>
        </div>
		<?php endwhile; ?>
    	<div class="navigation">
        	<?php previous_post_link('&laquo; %link') ?><?php next_post_link('%link &raquo;') ?>
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
</body>
</html>