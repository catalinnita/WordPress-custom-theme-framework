<?php
function wpfw_accordion($ob) {
//print_r($ob);
?>
	<?php if ($ob['settings']['AccordionBeforeTitle']) { ?>
		<<?php echo $ob['settings']['AccordionBeforeTitleTag']; ?>><?php echo $ob['settings']['AccordionBeforeTitle']; ?></<?php echo $ob['settings']['AccordionBeforeTitleTag']; ?>>
	<?php } ?>
	<?php echo do_shortcode($ob['settings']['AccordionBeforeContent']); ?>	
	
<div data-icon="<?php echo wpfw_icon_class($ob['settings']['AccordionClosedIcon']); ?>" 
		 data-icon-active="<?php echo wpfw_icon_class($ob['settings']['AccordionOpenIcon']); ?>" 
		 data-easing="<?php echo $ob['settings']['AccordionEasing']; ?>" 
		 data-speed="<?php echo $ob['settings']['AccordionEffectSpeed']; ?>"
		 class="panel-group accordion icon-<?php echo strtolower($ob['settings']['AccordionIcon']); ?>" 
		 id="accordion<?php echo $ob['id']; ?>">
  <?php 
  $nr = 1;
  if(count($ob['settings']['elements']) > 0) {
	  foreach($ob['settings']['elements'] as $element) { 
	  
	  if($element['AccordionElementTitle'] && $element['AccordionElementContent']) {
		  ?>
		  	
		  <div class="panel panel-<?php echo strtolower($element['AccordionElementStyle']); ?>">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion<?php echo $ob['id']; ?>" href="#collapse<?php echo $nr.'-'.$ob['id']; ?>">
		          <?php echo $element['AccordionElementTitle']; ?>
		        </a>
		      </h4>
		    </div>
		    <div id="collapse<?php echo $nr.'-'.$ob['id']; ?>" class="panel-collapse collapse">
		      <div class="panel-body">
		      	<?php echo do_shortcode($element['AccordionElementContent']); ?>
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
<?php echo do_shortcode($ob['settings']['AccordionAfterContent']); ?>	
<?php
}

?>