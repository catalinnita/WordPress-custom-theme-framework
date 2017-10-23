<?php
if (function_exists("wpfw_related_posts")) {

$ids = get_related_ids(get_the_ID());
if (count($ids) > 0) {				
?>
	<?php
	$nr = 1;
	foreach($ids as $id) {
	$rpost = get_post($id->RelatedPostID);		
	
	$category = get_the_category($rpost->ID);
	$category_link = get_category_link($category[0]->term_id);		
	?>	
	
	<div class="article-3-1 <?php if ($nr%3 == 1) { echo 'first'; } ?>">
		<a href="<?php echo get_permalink($rpost->ID); ?>" class="ha ne"><img class="grayscale" src="<?php echo get_thumbnail_src(get_the_post_thumbnail($rpost->ID,'home_article')); ?>" border="0" /></a>
		<h3><a href="<?php echo get_permalink($rpost->ID); ?>"><?php echo $rpost->post_title; ?></a></h3>
		<p><?php echo excr(150, $rpost->post_content); ?></p>
	</div>
	<?php if ($nr%3 == 0) { ?>
	<div class="cleaner"></div>		
	<?php } ?>
	
	<?php 
	$nr++;
	} 
	?>	

<?php } ?>
<?php } ?>