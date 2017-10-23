<?php

function wpfw_simple_list($ob) {
	
	?>
	<ul class="list">
  	<?php foreach($ob['settings']['elements'] as $element) { ?>
  	<?php if ($element['ListElementTitle']) { ?>
  		<li class="list-item">
  			<?php if($ob['settings']['SimpleListIcon']) { ?>
	    		<span data-font-size="<?php echo $ob['settings']['SimpleListIconSize']; ?>" 
	    					data-color="<?php echo $ob['settings']['SimpleListIconColor']; ?>" 
	    					class="<?php echo wpfw_icon_class($ob['settings']['SimpleListIcon']).' icon-bullet'; ?>"></span>
	    	<?php } ?>
	    	<p class="list-group-item-text"><?php echo $element['ListElementTitle']; ?></p>
  	<?php } ?>
  	<?php } ?>
  </ul>
  <?php
	
}

?>