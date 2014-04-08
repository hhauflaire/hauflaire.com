<?php
 	$category_title = get_option('gpp_category_title');
 	$pages_title = get_option('gpp_pages_title');
 	$contact_info = get_option('gpp_contact_info');
 	$email = get_option('gpp_email');
 	$phone = get_option('gpp_phone');
 	$link_addition = get_option('gpp_link_addition');
 	$link_url = get_option('gpp_link_URL');
 	$link_title = get_option('gpp_link_title');
 	$link_url_2 = get_option('gpp_link_URL_2');
 	$link_url_3 = get_option('gpp_link_URL_3');
 	if ($email === FALSE) { $emailval = "you@email.com"; } else { $emailval = get_option('gpp_email');}
 	if ($phone === FALSE) { $phoneval = "1-800-867-5309"; } else { $phoneval = get_option('gpp_phone');}
 	$photoshelter_name = get_option('gpp_photoshelter_name');
 	
	
// Same as wp_list_categories But display the category which selected by Navigation Categories Option
function ro_list_categories( $args = '' ) {
	$defaults = array(
		'show_option_all' => '', 'orderby' => 'name',
		'order' => 'ASC', 'show_last_update' => 0,
		'style' => 'list', 'show_count' => 0,
		'hide_empty' => 1, 'use_desc_for_title' => 1,
		'child_of' => 0, 'feed' => '', 'feed_type' => '',
		'feed_image' => '', 'exclude' => '', 'exclude_tree' => '', 'current_category' => 0,
		'hierarchical' => true, 'title_li' => __( 'Categories' ),
		'echo' => 1, 'depth' => 0
	);

	$r = wp_parse_args( $args, $defaults );

	if ( !isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] ) {
		$r['pad_counts'] = true;
	}

	if ( isset( $r['show_date'] ) ) {
		$r['include_last_update_time'] = $r['show_date'];
	}

	if ( true == $r['hierarchical'] ) {
		$r['exclude_tree'] = $r['exclude'];
		$r['exclude'] = '';
	}

	extract( $r );
	
	
	
	// Edit By Rock
	$categ = get_categories( $r );
	foreach( $categ as $cat) {
		if( ( get_option("gpp_Navi_category_".$cat->term_id) == 'true') || !get_option("gpp_Navi_category_".$cat->term_id)  ) {
			$categories[] = $cat;
		}
		
	}
	//print_r($categories);
	// End
	
	
	

	$output = '';
	if ( $title_li && 'list' == $style )
			$output = '<li class="categories">' . $r['title_li'] . '<ul>';

	if ( empty( $categories ) ) {
		if ( 'list' == $style )
			$output .= '<li>' . __( "No categories" ) . '</li>';
		else
			$output .= __( "No categories" );
	} else {
		global $wp_query;

		if( !empty( $show_option_all ) )
			if ( 'list' == $style )
				$output .= '<li><a href="' .  get_bloginfo( 'url' )  . '">' . $show_option_all . '</a></li>';
			else
				$output .= '<a href="' .  get_bloginfo( 'url' )  . '">' . $show_option_all . '</a>';

		if ( empty( $r['current_category'] ) && is_category() )
			$r['current_category'] = $wp_query->get_queried_object_id();

		if ( $hierarchical )
			$depth = $r['depth'];
		else
			$depth = -1; // Flat.

		$output .= walk_category_tree( $categories, $depth, $r );
	}

	if ( $title_li && 'list' == $style )
		$output .= '</ul></li>';

	$output = apply_filters( 'wp_list_categories', $output );

	if ( $echo )
		echo $output;
	else
		return $output;
}

// Same as wp_list_pages But display the category which selected by Navigation Pages Option
function ro_list_pages($args = '') {
	$defaults = array(
		'depth' => 0, 'show_date' => '',
		'date_format' => get_option('date_format'),
		'child_of' => 0, 'exclude' => '',
		'title_li' => __('Pages'), 'echo' => 1,
		'authors' => '', 'sort_column' => 'menu_order, post_title',
		'link_before' => '', 'link_after' => ''
	);

	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );

	$output = '';
	$current_page = 0;

	// sanitize, mostly to keep spaces out
	$r['exclude'] = preg_replace('/[^0-9,]/', '', $r['exclude']);

	// Allow plugins to filter an array of excluded pages
	$r['exclude'] = implode(',', apply_filters('wp_list_pages_excludes', explode(',', $r['exclude'])));

	// Query pages.
	$r['hierarchical'] = 0;


	
	
	// Edit By Rock
	$pagess = get_pages($r);
	foreach( $pagess as $onepage) {
		if( get_option("gpp_Navi_Pages_".$onepage->ID) == 'true' || !get_option("gpp_Navi_Pages_".$onepage->ID)) {
			$pages[] = $onepage;
		}
	}
	// End
	
	

	if ( !empty($pages) ) {
		if ( $r['title_li'] )
			$output .= '<li class="pagenav">' . $r['title_li'] . '<ul>';

		global $wp_query;
		if ( is_page() || is_attachment() || $wp_query->is_posts_page )
			$current_page = $wp_query->get_queried_object_id();
		$output .= walk_page_tree($pages, $r['depth'], $current_page, $r);

		if ( $r['title_li'] )
			$output .= '</ul></li>';
	}

	$output = apply_filters('wp_list_pages', $output);

	if ( $r['echo'] )
		echo $output;
	else
		return $output;
}
 ?>
<?php
	// multi level menu options
	if(get_option('gpp_multilevel_categories') == "true"){ $cparam = 'orderby=name&title_li=&show_up=true'; }
	else { $cparam = 'orderby=name&depth=-1&title_li=&show_up=true'; }
	if(get_option('gpp_multilevel_pages') == "true"){ $pparam = 'orderby=name&title_li='; }
	else { $pparam = 'orderby=name&depth=-1&title_li='; }
?>
<!-- Navigation -->
<ul class="sf-menu">
	<li>
		<a href="#"><?php if($category_title==="" || !$category_title) { echo 'categories'; } else { echo $category_title; } ?></a>
		<ul>
			<?php  ro_list_categories($cparam); ?>
		</ul>
	</li>
    <li>
		<a href="#"><?php if($pages_title==="" || !$pages_title) { echo 'pages'; } else { echo $pages_title; } ?></a>
		<ul>
			<?php ro_list_pages($pparam); ?>
		</ul>
	</li>

<?php if ( get_option('gpp_photoshelter') == 'true' ) { ?>
	<li>
	    <a href="http://www.photoshelter.com/c/<?php echo $photoshelter_name; ?>">image archive</a>
	    <ul>
			<li><a href="http://www.photoshelter.com/c/<?php echo $photoshelter_name; ?>">archive home</a></li>
			<li><a href="http://www.photoshelter.com/c/<?php echo $photoshelter_name; ?>/gallery-list">galleries</a></li>
			<li><a href="http://www.photoshelter.com/c/<?php echo $photoshelter_name; ?>/search-page">search</a></li>
			<li><a href="http://pa.photoshelter.com/c/<?php echo $photoshelter_name; ?>/cart/cart-show">cart</a></li>
			<li><a href="https://pa.photoshelter.com/c/<?php echo $photoshelter_name; ?>/usr/usr-account">client login</a></li>
			<li><a href="http://www.photoshelter.com/c/<?php echo $photoshelter_name; ?>/about">about</a></li>
        </ul>
    </li>
<?php } ?>
    
<?php if ( get_option('gpp_link_addition') == 'true' ) { ?>
    <li>
        <a href="<?php echo get_option('gpp_link_URL');?>"><?php echo get_option('gpp_link_title');?></a>
        <?php if( get_option('gpp_link_url_2') != "") { ?>
        <ul>
    		<li><a href="<?php echo get_option('gpp_link_URL_2');?>"><?php echo get_option('gpp_link_title_2');?></a></li>
    		<li><a href="<?php echo get_option('gpp_link_URL_3');?>"><?php echo get_option('gpp_link_title_3');?></a></li>
    	</ul>
    	<?php } ?>
    </li>
<?php } ?> 

      <li class="right"><?php if(function_exists('get_search_form')) : ?>
			<?php get_search_form(); ?>
			<?php else : ?>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			<?php endif; ?></li>
 
	
</ul>
