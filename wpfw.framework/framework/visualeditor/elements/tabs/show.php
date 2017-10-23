<?php
function wpfw_tabs($ob) {
	
	?>
	<div data-easing="<?php echo $ob['settings']['TabsEasing']; ?>" 
		 	 data-speed="<?php echo $ob['settings']['TabsEffectSpeed']; ?>"
		 	 data-effect="<?php echo $ob['settings']['TabsEffect']; ?>"
			 class="tabs-container <?php echo strtolower($ob['settings']['TabsPosition']); ?>">
	<ul class="active-<?php echo strtolower($ob['settings']['TabsActiveStyle']); ?> nav nav-<?php echo strtolower($ob['settings']['TabsStyle']); ?> nav-<?php echo strtolower($ob['settings']['TabsPosition']); ?> <?php if ($ob['settings']['TabsJustified'] == 'yes') echo 'nav-justified'; ?>">
  	
  	<?php 
  	$nr = 1;
  	foreach($ob['settings']['elements'] as $element) { 
	  	if($element['TabsElementTitle']) {
		  	?>
		  	<li>
		  		<a href="#tab<?php echo $nr; ?>" data-toggle="tab" class="tab-<?php echo strtolower($element['TabsElementStyle']); ?>"><?php echo $element['TabsElementTitle']; ?></a>
		  	</li>
		  	<?php
		  	$nr++;
	  	}
  	}
  	?>
 	</ul>
 	
  	<div class="tab-content <?php echo strtolower($ob['settings']['TabsStyle']); ?>">
  	<?php 
  	$nr = 1;
  	foreach($ob['settings']['elements'] as $element) { 
	  	if($element['TabsElementContent']) {	
		  	?>
			  <div class="tab-pane" id="tab<?php echo $nr; ?>">
					<?php echo $element['TabsElementContent']; ?>
			  </div>
		  	<?php
		  	$nr++;
		  	}	
	  	}
  	?>  	
	  </div>
		</div>
 
  <?php
	
}
?>