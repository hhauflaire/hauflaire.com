<!-- Begin Category Stack Section -->
<div class="double-border"></div>
<div id="category-stack">
<div class="span-24 first last">
<?php
$cat_1 = get_option('gpp_category_column_1');
$cat_2 = get_option('gpp_category_column_2');
$cat_3 = get_option('gpp_category_column_3');
$cat_4 = get_option('gpp_category_column_4');
$cat_5 = get_option('gpp_category_column_5');

if($cat_1 === FALSE) {$cat_1 = "Uncategorized";}
if($cat_2 === FALSE) {$cat_2 = "Uncategorized";}
if($cat_3 === FALSE) {$cat_3 = "Uncategorized";}
if($cat_4 === FALSE) {$cat_4 = "Uncategorized";}
if($cat_5 === FALSE) {$cat_5 = "Uncategorized";}

$cat_1_ID = get_cat_ID($cat_1);
$cat_2_ID = get_cat_ID($cat_2);
$cat_3_ID = get_cat_ID($cat_3);
$cat_4_ID = get_cat_ID($cat_4);
$cat_5_ID = get_cat_ID($cat_5);

$categories_stack = array();

if($cat_1 != "") {array_push($categories_stack,"$cat_1_ID");}
if($cat_2 != "") {array_push($categories_stack,"$cat_2_ID");}
if($cat_3 != "") {array_push($categories_stack,"$cat_3_ID");}
if($cat_4 != "") {array_push($categories_stack,"$cat_4_ID");}
if($cat_5 != "") {array_push($categories_stack,"$cat_5_ID");}

$default_thumb1 = get_bloginfo('stylesheet_directory') . "/images/default-cat-thumb1.jpg";
$default_thumb2 = get_bloginfo('stylesheet_directory') . "/images/default-cat-thumb2.jpg";
$default_thumb3 = get_bloginfo('stylesheet_directory') . "/images/default-cat-thumb3.jpg";
$default_thumb4 = get_bloginfo('stylesheet_directory') . "/images/default-cat-thumb4.jpg";
$default_thumb5 = get_bloginfo('stylesheet_directory') . "/images/default-cat-thumb5.jpg";

$default_thumbarr = array($default_thumb1,$default_thumb2,$default_thumb3,$default_thumb4,$default_thumb5);
$j = 0; // for default array

foreach ($categories_stack as $category) { ?>
<?php query_posts("showposts=1&cat=$category"); ?>
<?php while (have_posts()) : the_post(); ?>
<h3 class="sub"><a href="<?php echo get_category_link($category);?>"><?php single_cat_title(); ?></a></h3>
<div class="span-16 colborder first">
	<?php get_the_image( "custom_key=thumbnail&default_size=thumbnail&width=310&height=150&image_class=attachment-thumbnail&default_image=$default_thumbarr[$j]" ); $j++;?>		
	<h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h6><p class="byline"><?php the_time('M d, Y') ?> | <a href="<?php the_permalink(); ?>">Read </a> | <?php comments_popup_link('Discuss', '1 Comment &#187;', '% Comments &#187;'); ?></p>
	<p><?php echo substr(get_the_excerpt(),0,325); ?></p>
</div>
<?php endwhile; ?>

<?php query_posts("showposts=5&offset=1&cat=$category"); ?>
<div class="span-7 more last">
<ul>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>" class="title"><?php the_title(); ?></a></li>
<?php endwhile; ?>
</ul>
</div>
<div class="double-border"></div>
<?php } ?>
</div>
</div>
<hr />