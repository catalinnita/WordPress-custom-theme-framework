<div id="HomepageSliderContainer" class="ASContainer <?php if (of_get_option("homeslidertype") != 'Anything Slider') { echo 'notablet'; } ?>">
<div id="HomepageSlider" <?php if (of_get_option("homeslidertype") != 'Anything Slider') { echo 'class="notablet"'; } ?>>
		<?php					
		$the_query2 = new WP_Query("post_type=homeslider&orderby=menu_order&order=ASC&posts_per_page=-1");
		$nr = 0;
		while($the_query2->have_posts()):$the_query2->the_post();
		?>	
		<div class="ls-layer">
			<div class="ls-s2 picture" style="
					delayIn: 0;  
					delayOut: 700;
					durationin: <?php echo of_get_option("homeslidertime")*1000; ?>; 
					durationout: <?php echo of_get_option("homeslidertime")*1000; ?>; 
					easingin: easeInOutCubic;
			"><a href="<?php mb('sliderlink'); ?>" class="ne"><?php the_post_thumbnail("home_slider"); ?></a></div>
			<div class="ls-s3 slider-info" style="delayin: 300; durationin: <?php echo of_get_option("homeslidertime")*1000+700; ?>; easingin: easeInOutCubic;">
				<?php if (getmb("sliderinfoshow") != 'no') { ?>
				<div class="info">
					<div class="info-container">
						<h1><?php the_title(); ?></h1>	
						<h2><?php echo get_the_content(); ?></h2>
						<a href="<?php mb('sliderlink'); ?>" class="book"><?php mb('sliderbutton'); ?></a>
					</div>
				</div>
				<?php } ?>	
			</div>
		</div>
		<?php
		$nr++;
		endwhile;
		?>			
</div>
</div>