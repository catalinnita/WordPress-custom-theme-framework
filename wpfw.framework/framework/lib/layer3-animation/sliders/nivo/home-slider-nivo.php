<div id="HomepageSliderContainer" class="ASContainer <?php if (of_get_option("homeslidertype") != 'Anything Slider') { echo 'notablet'; } ?>">
<div class="nivo <?php if (of_get_option("homeslidertype") != 'Anything Slider') { echo 'notablet'; } ?>">	
	<div id="HomepageSlider">
		<?php					
		$the_query2 = new WP_Query("post_type=homeslider&orderby=menu_order&order=ASC&posts_per_page=-1");
		$nr = 0;
		while($the_query2->have_posts()):$the_query2->the_post();
		?>
		<a href="<?php mb('sliderlink'); ?>"><img class="grayscale" src="<?php echo get_thumbnail_src(get_the_post_thumbnail(get_the_ID(),'home_slider')); ?>" border="0"  <?php if (getmb("sliderinfoshow") != 'no') { ?>title="#HomepageSlider-caption-<?php echo $nr; ?><?php } ?>" /></a>
		<?php
		$nr++;
		endwhile;
		?>
	</div>
		<?php					
		$the_query2 = new WP_Query("post_type=homeslider&orderby=menu_order&order=ASC&posts_per_page=-1");
		$nr = 0;
		while($the_query2->have_posts()):$the_query2->the_post();
		?>	
		<?php if (getmb("sliderinfoshow") != 'no') { ?>
	<div id="HomepageSlider-caption-<?php echo $nr; ?>" class="info">
		<span class="nivo-info">
			<h1><?php the_title(); ?></h1>	
			<h2><?php echo get_the_content(); ?></h2>
			<a href="<?php mb('sliderlink'); ?>" class="book"><?php mb('sliderbutton'); ?></a>
		</span>
	</div>
	<?php } ?>
		<?php
		$nr++;
		endwhile;
		?>	
</div>	
</div>