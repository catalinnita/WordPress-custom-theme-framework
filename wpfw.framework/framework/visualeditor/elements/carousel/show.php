<?php

function wpfw_carousel($ob) {
	
	if($ob['settings']['elements'][1]['CarouselTitle'] || $ob['settings']['elements'][1]['CarouselSubtitle'] || $ob['settings']['elements'][1]['CarouselImage']['AttachmentID']) {
	
	if($ob['settings']['CarouselBoxed'] != 'None') { 
		?><div class="panel panel-<?php echo strtolower($ob['settings']['CarouselBoxed']); ?>"><?php
	}
		if($ob['settings']['CarouselMainTitle']) { 
			if($ob['settings']['CarouselBoxed'] != 'None') { 
				?><div class="panel-heading"><?php
			}
			?><<?php echo $ob['settings']['CarouselTitleTag']; ?> <?php if($ob['settings']['CarouselBoxed'] != 'None') { ?>class="panel-title"<?php } ?>>
					<?php echo $ob['settings']['CarouselMainTitle']; ?>
				</<?php echo $ob['settings']['CarouselTitleTag']; ?>><?php
			if($ob['settings']['CarouselBoxed'] != 'None') { 
				?></div><?php
			}			
		}
		
		if($ob['settings']['CarouselMainContent']) { 
			if($ob['settings']['CarouselBoxed'] != 'None') { 
				?><div class="panel-body"><?php
			}
			?><?php echo $ob['settings']['CarouselMainContent']; ?><?php
			if($ob['settings']['CarouselBoxed'] != 'None') { 
				?></div><?php
			}				
		}
	?>
	<ul data-auto-start="<?php echo $ob['settings']['CarouselAutoStart']; ?>"
			data-delay="<?php echo $ob['settings']['CarouselTimeBetweenSlides']; ?>"
			data-easing="<?php echo $ob['settings']['CarouselEasing']; ?>" 
		 	data-speed="<?php echo $ob['settings']['CarouselEffectSpeed']; ?>"
		 	data-visible="<?php echo $ob['settings']['CarouselVisibleElements']; ?>"
		 	data-step="<?php echo $ob['settings']['CarouselStep']; ?>"
		 	data-wrap="<?php echo $ob['settings']['CarouselWrap']; ?>"
		 	data-prev-icon="<?php echo wpfw_icon_class($ob['settings']['CarouselPrev']); ?>"
		 	data-next-icon="<?php echo wpfw_icon_class($ob['settings']['CarouselNext']); ?>"
		 	data-icon-size="<?php echo $ob['settings']['CarouselIconSize']; ?>"
			class="JCO">
	<?php
		$nr = 1;
	  foreach($ob['settings']['elements'] as $element) { 
		if($element['CarouselTitle'] || $element['CarouselSubtitle'] || $element['CarouselImage']['AttachmentID']) {
		?>
			<li>
				<a href="#<?php echo $nr; ?>">
					<?php echo wp_get_attachment_image($element['CarouselImage']['AttachmentID'], array(150,150)); ?>
				</a>
				<<?php echo $ob['settings']['CarouselElementsTitleTag']; ?>><?php echo $element['CarouselTitle']; ?></<?php echo $ob['settings']['CarouselElementsTitleTag']; ?>>
				<p><?php echo $element['CarouselSubtitle']; ?></p>
				
			</li>
			<?php
			$nr++;
		}
		}
		?>
	</ul>
	<?php	
	if($ob['settings']['CarouselFooterContent']) { 
			if($ob['settings']['CarouselBoxed'] != 'None') { 
				?><div class="panel-footer"><?php
			}		
		?><p><?php echo $ob['settings']['CarouselFooterContent']; ?></p><?php
			if($ob['settings']['CarouselBoxed'] != 'None') { 
				?></div><?php
			}			
	}
	}
	if($ob['settings']['CarouselBoxed'] != 'None') { 
		?></div><?php
	}	
}

?>
