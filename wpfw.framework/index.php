<?php get_header(); ?>
<!-- Homepage Slider Start -->
<div id="HomepageSliderBg">
	<div id="HomepageSliderShadow">
		<?php 
		if (of_get_option('homeslidershow') == 'yes') {
			get_template_part('template_parts/home-slider-anything');
			switch(of_get_option("homeslidertype")) { 
				case "Nivo": get_template_part('framework/sliders/nivo/home-slider-nivo'); break;
				case "Parallax": get_template_part('framework/sliders/parallax/home-slider-parallax'); break;
				case "Skitter": get_template_part('framework/sliders/skitter/home-slider-skitter'); break;
			}
		}
		?>
	</div>
</div>
<!-- Homepage Slider End -->

<!-- Main Wrap Start -->
<div id="MainWrapShadow">				
	<div id="MainWrapContainer">
		<div id="MainWrap" class="WebsiteWidth">				
			<div id="Content">
				
				<?php 
				if (of_get_option('homearticlesshow') == 'yes') { 
					get_template_part('template_parts/homepage_articles'); 
				}

				if (of_get_option('homecalltoactionshow') == 'yes') {
					get_template_part('template_parts/homepage_action_bar'); 
				}
				
				if (of_get_option('homearticleshow') == 'yes') {
					get_template_part('template_parts/homepage_article'); 
				}
				
				if (of_get_option('homeblogshow') == 'yes') {
					get_template_part('template_parts/homepage_blog'); 
				}

				?>
				<div class="cleaner"></div>	
			</div>

<?php get_footer(); ?>