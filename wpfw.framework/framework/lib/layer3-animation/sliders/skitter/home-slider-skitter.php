<div id="HomepageSliderContainer" class="ASContainer <?php if (of_get_option("homeslidertype") != 'Anything Slider') { echo 'notablet'; } ?>">
<div id="HomepageSlider" class="box_skitter <?php if (of_get_option("homeslidertype") != 'Anything Slider') { echo 'notablet'; } ?>">
<ul>
	<?php					
  	$slides= wp_count_posts('homeslider');
  	$total = $slides->publish;
		$the_query2 = new WP_Query("post_type=homeslider&orderby=menu_order&order=ASC&posts_per_page=-1");
		$nr = 1;
		while($the_query2->have_posts()):$the_query2->the_post();
	?>
	<li>
		<a href="<?php mb('sliderlink'); ?>" class="ne"><?php the_post_thumbnail("home_slider", array("class" => "grayscale")); ?></a>
		<?php if (getmb("sliderinfoshow") != 'no') { ?>
		<div class="label_text">
			<div class="info-container">
				<h1><?php the_title(); ?></h1>	
				<h2><?php echo get_the_content(); ?></h2>
				<a href="<?php mb('sliderlink'); ?>" class="book"><?php mb('sliderbutton'); ?></a>
			</div>
		</div>
		<?php } ?>
	</li>	
	<?php
		$nr++;
		endwhile;
	?>
</ul>
</div>
</div>