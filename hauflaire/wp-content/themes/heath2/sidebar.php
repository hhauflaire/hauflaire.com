<div class="sidebar">
	<ul>
    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar()) : else : ?>
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
	<?php endif; ?>
	</ul>
</div>