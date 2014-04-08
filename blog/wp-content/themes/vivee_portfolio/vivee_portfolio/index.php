<?php get_header(); ?>
        <div id="main">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>        
        	<div class="wpis_main"><!-- pojedynczy wpis na stronie głównej -->
            	<div class="img"><?php custom_field_image("obrazek1");?></div>
                <div class="tresc">
                	<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <div class="entry">
					<?php the_content("więcej", the_title('', '', false)); ?>
                    </div>
                </div>
                <div class="end"></div>
            </div><!-- koniec wpisu -->
			<?php endwhile; ?>
            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('&laquo; Starsze wpisy') ?></div>
                <div class="alignright"><?php previous_posts_link('Nowsze wpisy &raquo;') ?></div>
                <div class="end"></div>
            </div>
			<?php else : ?>

            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>
            <?php include (TEMPLATEPATH . "/searchform.php"); ?>
            <?php endif; ?>            
        </div>
    </div><!-- koniec page -->
<?php get_footer(); ?>
