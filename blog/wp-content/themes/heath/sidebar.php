<div class="sidebar">

	<ul>
    
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar()) : else : ?>
    
    	<li id="search">
        	<?php include(TEMPLATEPATH.'/searchform.php'); ?>
    	</li>
        
		<li><h2><?php _e('Categories'); ?></h2>
        	<ul>
            	<?php wp_list_cats('sort_column=name&optioncount=1&heirarchical=0'); ?>
			</ul>                
		</li>

		<li><h2><?php _e('Archives'); ?></h2>
        	<ul>
            	<?php wp_get_archives('type=monthly'); ?>
   			</ul>
      	</li>

		<?php get_links_list(); ?>
        
        <li><h2><?php _e('Meta'); ?></h2>
        	<ul>
            	<?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
       		</ul>
  		</li>

	<?php endif; ?>

	</ul>

</div>