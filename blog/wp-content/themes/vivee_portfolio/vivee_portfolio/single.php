<?php get_header(); ?>
        <div id="sub">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="navigation">
                <div class="alignleft"><?php previous_post_link('%link') ?></div>
                <div class="alignright"><?php next_post_link('%link') ?></div>
                <div class="end"></div>
            </div>        
        	<div class="wpis_sub"><!-- pojedynczy wpis na stronie głównej -->
                <div class="tresc">
                	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="dane">
                        <p>Kategoria: <?php the_category(', ') ?></p>
                    </div>
                    
                    <div class="entry">
                    	<?php the_content("więcej", the_title('', '', false)); ?>
                        <div class="img"><?php custom_field_image("obrazek2");?></div>
                    </div>
                </div>
                <div class="end"></div>
            </div><!-- koniec wpisu -->
			<?php comments_template(); ?>
			<?php endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>            
        </div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>        
