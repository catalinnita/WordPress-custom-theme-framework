<?php

function wpfw_slider($ob) {
	
	$slider_type = wpfw_slider_effects($ob['settings']['SliderEffect']);
	
 
	// Anything Slider
	if($slider_type == 'AnythingSlider') { ?>
	
	<div data-icon-prev="<?php echo wpfw_icon_class($ob['settings']['SliderPreviousIcon']); ?>" 
		   data-icon-next="<?php echo wpfw_icon_class($ob['settings']['SliderNextIcon']); ?>" 
		   data-icon-size="<?php echo $ob['settings']['SliderIconsSize']; ?>" 
		   data-arrows="<?php if($ob['settings']['SliderShowArrows'] == 'yes') echo 'true'; else echo 'false'; ?>" 
		   data-navigation="<?php if($ob['settings']['SliderShowNavigation'] == 'yes') echo 'true'; else echo 'false'; ?>" 
		   data-easing="<?php echo $ob['settings']['SliderEffectEasing']; ?>" 
		   data-speed="<?php echo $ob['settings']['SliderEffectSpeed']; ?>"
		   data-effect="<?php echo $ob['settings']['SliderEffect']; ?>"
		   data-delay="<?php echo $ob['settings']['SliderTimeBetweenSlides']*1000; ?>"
		   data-auto-start="<?php if($ob['settings']['SliderAutoStart'] == 'yes') echo 'true'; else echo 'false'; ?>"
		   data-pause="<?php if($ob['settings']['SliderPauseOnHover'] == 'yes') echo 'true'; else echo 'false'; ?>"
		   data-arrows-outside="<?php if($ob['settings']['SliderShowArrowsOutside'] == 'yes') echo 'true'; else echo 'false'; ?>"
		   data-arrows-color="#<?php echo $ob['settings']['SliderIconsColor']; ?>"
			 class="slider <?php echo $slider_type; ?>">
	
	
	
		<ul id="Slider<?php echo $ob['id']; ?>">
			<?php
			
			$nr = 1;
			foreach($ob['settings']['elements'] as $element) {
				?>
				<li>
					<?php if($element['SliderLink']) { ?>
					<a href="<?php echo $element['SliderLink']; ?>">
					<?php } ?>
	
					<?php if($element['SliderImage']['AttachmentID']) { ?>
						<?php echo wpfw_get_image($element['SliderImage'], true); ?>
					<?php } ?>
						
					<?php if($element['SliderLink']) { ?>	
					</a>
					<?php } ?>
					
					<?php if($ob['settings']['SliderShowCaption'] == 'yes' && ($element['SliderTitle'] || $element['SliderSubtitle'])) { ?>
					<span class="info">
						<?php if (getmb("sliderinfoshow") != 'no') { ?>
						<?php if($element['SliderTitle']) { ?><h1><?php echo $element['SliderTitle']; ?></h1><?php } ?>
						<?php if($element['SliderSubtitle']) { ?><h2><?php echo $element['SliderSubtitle']; ?></h2><?php } ?>
						<?php if($element['SliderLink'] && $element['SliderButton']) { ?><a href="<?php echo $element['SliderLink']; ?>"><?php echo $element['SliderButton']; ?></a><?php } ?>
						<?php } ?>
					</span>
					<?php } ?>
				</li>
				<?php
				$nr++;
			}
			
			?>
			
		</ul>
		<?php if($ob['settings']['SliderShowNavigation'] == 'yes') { ?>
		<div class="slider-controls">
		<?php
			$nr = 1;
			foreach($ob['settings']['elements'] as $element) {
			?>
				<a href="#<?php echo $nr; ?>" class="<?php if ($nr == 1) { echo 'active'; } ?>"></a>
				<?php
				$nr++;
			}
			?>
		</div>
		<?php
		}
		?>
	</div>
	<?php
	}
	
	// Nivo Slider
	if($slider_type == 'NivoSlider') { ?>
		<div data-icon-prev="<?php echo wpfw_icon_class($ob['settings']['SliderPreviousIcon']); ?>" 
		   data-icon-next="<?php echo wpfw_icon_class($ob['settings']['SliderNextIcon']); ?>" 
		   data-icon-size="<?php echo $ob['settings']['SliderIconsSize']; ?>" 
		   data-arrows="<?php if($ob['settings']['SliderShowArrows'] == 'yes') echo 'true'; else echo 'false'; ?>" 
		   data-navigation="<?php if($ob['settings']['SliderShowNavigation'] == 'yes') echo 'true'; else echo 'false'; ?>" 
		   data-easing="<?php echo $ob['settings']['SliderEffectEasing']; ?>" 
		   data-speed="<?php echo $ob['settings']['SliderEffectSpeed']; ?>"
		   data-effect="<?php echo $ob['settings']['SliderEffect']; ?>"
		   data-delay="<?php echo $ob['settings']['SliderTimeBetweenSlides']*1000; ?>"
		   data-auto-start="<?php if($ob['settings']['SliderAutoStart'] == 'yes') echo 'true'; else echo 'false'; ?>"
		   data-pause="<?php if($ob['settings']['SliderPauseOnHover'] == 'yes') echo 'true'; else echo 'false'; ?>"
		   data-arrows-outside="<?php if($ob['settings']['SliderShowArrowsOutside'] == 'yes') echo 'true'; else echo 'false'; ?>"
		   data-arrows-color="#<?php echo $ob['settings']['SliderIconsColor']; ?>"		   
			 class="slider <?php echo $slider_type; ?>">			
			<?php
			$nr = 1;
			foreach($ob['settings']['elements'] as $element) {
				?>
					<?php if($element['SliderLink']) { ?>
					<a href="<?php echo $element['SliderLink']; ?>">
					<?php } ?>
	
					<?php if($element['SliderImage']['AttachmentID']) { ?>
						<?php 
							if ($ob['settings']['SliderShowCaption'] == 'yes' && ($element['SliderTitle'] || $element['SliderSubtitle'])) {
								echo wpfw_get_image($element['SliderImage'], true, '#caption'.$ob['id'].'-'.$nr); 
							}
							else {
								echo wpfw_get_image($element['SliderImage'], true); 
							}
						?>
					<?php } ?>
						
					<?php if($element['SliderLink']) { ?>	
					</a>
					<?php } ?>
					
					
				<?php
				$nr++;
			}
			?>
			</div><?php
			$nr = 1;
			foreach($ob['settings']['elements'] as $element) {
				if($ob['settings']['SliderShowCaption'] == 'yes' && ($element['SliderTitle'] || $element['SliderSubtitle'])) { ?>
					<span id="caption<?php echo $ob['id']; ?>-<?php echo $nr; ?>" class="info nivo-html-caption">
						<?php if (getmb("sliderinfoshow") != 'no') { ?>
						<?php if($element['SliderTitle']) { ?><h1><?php echo $element['SliderTitle']; ?></h1><?php } ?>
						<?php if($element['SliderSubtitle']) { ?><h2><?php echo $element['SliderSubtitle']; ?></h2><?php } ?>
						<?php if($element['SliderLink'] && $element['SliderButton']) { ?><a href="<?php echo $element['SliderLink']; ?>"><?php echo $element['SliderButton']; ?></a><?php } ?>
						<?php } ?>
					</span>
					<?php } ?>
			<?php
				$nr++;
			}

	}
	
	// Skitter Slider
	if($slider_type == 'SkitterSlider') { ?>
	
	<div data-icon-prev="<?php echo wpfw_icon_class($ob['settings']['SliderPreviousIcon']); ?>" 
		   data-icon-next="<?php echo wpfw_icon_class($ob['settings']['SliderNextIcon']); ?>" 
		   data-icon-size="<?php echo $ob['settings']['SliderIconsSize']; ?>" 
		   data-arrows="<?php if($ob['settings']['SliderShowArrows'] == 'yes') echo 'true'; else echo 'false'; ?>" 
		   data-navigation="<?php if($ob['settings']['SliderShowNavigation'] == 'yes') echo 'true'; else echo 'false'; ?>" 
		   data-easing="<?php echo $ob['settings']['SliderEffectEasing']; ?>" 
		   data-speed="<?php echo $ob['settings']['SliderEffectSpeed']; ?>"
		   data-effect="<?php echo $ob['settings']['SliderEffect']; ?>"
		   data-delay="<?php echo $ob['settings']['SliderTimeBetweenSlides']*1000; ?>"
		   data-auto-start="<?php if($ob['settings']['SliderAutoStart'] == 'yes') echo 'true'; else echo 'false'; ?>"
		   data-pause="<?php if($ob['settings']['SliderPauseOnHover'] == 'yes') echo 'true'; else echo 'false'; ?>"
			 class="slider <?php echo $slider_type; ?> box_skitter">
	
	
	
		<ul id="Slider<?php echo $ob['id']; ?>">
			<?php
			
			$nr = 1;
			foreach($ob['settings']['elements'] as $element) {
				?>
				<li>
					<?php if($element['SliderLink']) { ?>
					<a href="<?php echo $element['SliderLink']; ?>">
					<?php } ?>
	
					<?php if($element['SliderImage']['AttachmentID']) { ?>
						<?php echo wpfw_get_image($element['SliderImage'], true); ?>
					<?php } ?>
						
					<?php if($element['SliderLink']) { ?>	
					</a>
					<?php } ?>
					
					<?php if($ob['settings']['SliderShowCaption'] == 'yes' && ($element['SliderTitle'] || $element['SliderSubtitle'])) { ?>
					<span class="info">
						<?php if (getmb("sliderinfoshow") != 'no') { ?>
						<?php if($element['SliderTitle']) { ?><h1><?php echo $element['SliderTitle']; ?></h1><?php } ?>
						<?php if($element['SliderSubtitle']) { ?><h2><?php echo $element['SliderSubtitle']; ?></h2><?php } ?>
						<?php if($element['SliderLink'] && $element['SliderButton']) { ?><a href="<?php echo $element['SliderLink']; ?>"><?php echo $element['SliderButton']; ?></a><?php } ?>
						<?php } ?>
					</span>
					<?php } ?>
				</li>
				<?php
				$nr++;
			}
			
			?>
			
		</ul>
		<?php if($ob['settings']['SliderShowNavigation'] == 'yes') { ?>
		<div class="slider-controls">
		<?php
			$nr = 1;
			foreach($ob['settings']['elements'] as $element) {
			?>
				<a href="#<?php echo $nr; ?>" class="<?php if ($nr == 1) { echo 'active'; } ?>"></a>
				<?php
				$nr++;
			}
			?>
		</div>
		<?php
		}
		?>
	</div>
	<?php
	}		
	
}

?>