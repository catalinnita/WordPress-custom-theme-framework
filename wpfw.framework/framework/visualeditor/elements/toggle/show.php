<?php
function wpfw_toggle($ob) {
//print_r($ob);
?>
	<?php if ($ob['settings']['ToggleBeforeTitle']) { ?>
		<<?php echo $ob['settings']['ToggleBeforeTitleTag']; ?>><?php echo $ob['settings']['ToggleBeforeTitle']; ?></<?php echo $ob['settings']['ToggleBeforeTitleTag']; ?>>
	<?php } ?>
	<?php echo do_shortcode($ob['settings']['ToggleBeforeContent']); ?>	
	
<div data-icon="<?php echo wpfw_icon_class($ob['settings']['ToggleClosedIcon']); ?>" 
		 data-icon-active="<?php echo wpfw_icon_class($ob['settings']['ToggleOpenIcon']); ?>" 
		 data-easing="<?php echo $ob['settings']['ToggleEasing']; ?>" 
		 data-speed="<?php echo $ob['settings']['ToggleEffectSpeed']; ?>"
		 class="panel-group toggle icon-<?php echo strtolower($ob['settings']['ToggleIcon']); ?>" 
		 id="toggle<?php echo $ob['id']; ?>">
  <?php 
  $nr = 1;
  if(count($ob['settings']['elements']) > 0) {
	  foreach($ob['settings']['elements'] as $element) { 
	  
	  if($element['ToggleElementTitle'] && $element['ToggleElementContent']) {
		  ?>
		  	
		  <div <?php if($element['ToggleElementOpen'] == 'yes') { ?>data-open="open"<?php } ?> data-nr="<?php echo $nr; ?>" class="panel panel-<?php echo strtolower($element['ToggleElementStyle']); ?>">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" href="#collapse<?php echo $nr.'-'.$ob['id']; ?>">
		          <?php echo $element['ToggleElementTitle']; ?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapse<?php echo $nr.'-'.$ob['id']; ?>" class="panel-collapse collapse <?php if($element['ToggleElementOpen'] == 'yes') { ?>in<?php } ?>">
		      <div class="panel-body">
		      	<?php echo do_shortcode($element['ToggleElementContent']); ?>
		      </div>
		    </div>
		  </div>
			<?php 
			$nr++;
		}
		} 
	}
	?>
  
</div>
<?php echo do_shortcode($ob['settings']['ToggleAfterContent']); ?>	
<?php
}

?>