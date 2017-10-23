<ul id="HomepageSliderMob">
	<?php					
  	$slides= wp_count_posts('homeslider');
  	$total = $slides->publish;
		$the_query2 = new WP_Query("post_type=homeslider&orderby=menu_order&order=ASC&posts_per_page=-1");
		$nr = 1;
		while($the_query2->have_posts()):$the_query2->the_post();
	?>
	<li class="panel<?php echo $nr; ?> panel">
		<a href="<?php mb('sliderlink'); ?>" class="ne"><?php the_post_thumbnail("mobile_slider"); ?></a>
	</li>	
	<?php
		$nr++;
		endwhile;
	?>
</ul>