<?php get_header(); ?>

	<div id="mid" class="archive">
		
		<!-- Start slider -->
		<div class="stripViewer">
			<div class="panelContainer">
			
			<?php if (have_posts()) : ?>
				<?php $c=0; ?>
				
				<?php while (have_posts()) : the_post(); ?>
				<?php if ($c==0) : ?>
					<div class="panel">
				<?php endif; ?>
				
				<div class="wrapper-archive">
					<?php $image = get_post_meta($post->ID, 'archive_image', true); if ($image=="") { $image = get_post_meta($post->ID, 'lead_image', true); } ?>
					<img src="<?php echo $image; ?>" alt="" width="270" height="172" />
					<div class="post-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					</div>
					<div class="postmetadata-archive">
					Posted on: <?php the_time('l, F jS, Y') ?><br />
					Filed under: <?php the_category(', ') ?><br />
					<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
					</div>
					
				</div>
				
				<?php $c++; if ($c==6){ $c=0; ?>
					</div>
				<?php } endwhile; ?>
				<?php if ($c==0) { ?>
				<div class="panel" id="nav-panel">
				<?php } ?>
					<div class="wrapper-archive">
						<img src="<?php bloginfo('template_directory'); ?>/images/nav-archive.png" alt="" width="270" height="172" />
						<div class="post-title">
							Where next?
						</div>
						<div class="postmetadata-archive">
							<?php previous_posts_link('&laquo; Newer Entries  |  ') ?>
							<?php next_posts_link('Older Entries &raquo;') ?>
						</div>
					</div>
				</div>
				
			<?php else : ?>
		
			<?php endif; ?>
	
			</div><!-- .panelContainer -->
		</div><!--.stripViewer -->
		
	</div><!-- .mid -->
	
	<div class="stripNavL" id="stripNavL0"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/left.png" alt="Left" /></a></div>
	<div class="stripNavR" id="stripNavR0"><a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/right.png" alt="Right" /></a></div>

<?php get_footer(); ?>

