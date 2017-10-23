<div id="HomepageSliderContainer" class="WebsiteWidth">
	<ul id="HomepageSlider" class="AS arrows buttons">
	<?php					
  	$slides= wp_count_posts('homeslider');
  	$total = $slides->publish;
		$the_query2 = new WP_Query("post_type=homeslider&orderby=menu_order&order=ASC&posts_per_page=-1");
		$nr = 1;
		while($the_query2->have_posts()):$the_query2->the_post();
	?>
	<li class="panel<?php echo $nr; ?> panel">
		<?php if (getmb("videolink")) { ?>
		<?php 
			echo do_shortcode("[generalvideo width='100%' height='483' src='".getmb('videolink')."']");
		?>						
		<?php } else { ?>  
			
		<a href="<?php mb('sliderlink'); ?>" class="ne"><?php the_post_thumbnail("home_slider", array('class' => 'grayscale')); ?></a>
		
		<div class="info">
			<?php if (getmb("sliderinfoshow") != 'no') { ?>
			<h1><?php the_title(); ?></h1>	
			<h2><?php echo get_the_content(); ?></h2>	
			<?php } ?>
		</div>
		<?php } ?>
	</li>	
	<?php
		$nr++;
		endwhile;
	?>	
	</ul>
</div>