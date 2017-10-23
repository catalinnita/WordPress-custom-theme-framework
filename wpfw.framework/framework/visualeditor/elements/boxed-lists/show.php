<?php
function wpfw_boxed_list($ob) {
	
	?>
	<ul class="list-group">
  	
  	<?php
  	if($ob['settings']['BoxedListTitle'] || $ob['settings']['BoxedListSubTitle']) {
  	?>
  	<li class="list-group-item active list-group-item-<?php echo strtolower($ob['settings']['BoxedListTitleStyle']); ?>">
    	<?php	if($ob['settings']['BoxedListTitle']) { ?><h4 class="list-group-item-heading"><?php echo $ob['settings']['BoxedListTitle']; ?></h4><?php } ?>
      <?php	if($ob['settings']['BoxedListSubTitle']) { ?><p class="list-group-item-text"><?php echo $ob['settings']['BoxedListSubTitle']; ?></p><?php } ?>
    </li>
    <?php
  	}
  	?>
    
    <?php 
    if(count($ob['settings']['elements']) > 0) {
	    foreach($ob['settings']['elements'] as $element) { ?>
	    <?php if($element['BoxedListElementTitle'] || $element['BoxedListElementText']) { ?>
	    <li class="list-group-item <?php if(!$element['BoxedListElementLink']) { ?>no-link <?php } ?> list-group-item-<?php echo strtolower($element['BoxedListElementStyle']); ?>">
	    	<?php if($element['BoxedListElementLink']) { ?>
	    	<a class="list-group-item-<?php echo strtolower($element['BoxedListElementStyle']); ?>" href="<?php echo $element['BoxedListElementLink']; ?>">
	    	<?php } ?>
	    		
	    		<?php if($ob['settings']['BoxedListIcon']) { ?>
	    			<span data-font-size="<?php echo $ob['settings']['BoxedListIconSize']; ?>" class="<?php echo wpfw_icon_class($ob['settings']['BoxedListIcon']).' icon-bullet'; ?>"></span>
	    		<?php } ?>
	    	
	    		<?php if($element['BoxedListElementBadge']) { ?><span class="badge"><?php echo $element['BoxedListElementBadge']; ?></span><?php } ?>
	    		<?php if($element['BoxedListElementTitle']) { ?><h4 <?php if($ob['settings']['BoxedListIcon']) { ?>data-margin-left="<?php echo $ob['settings']['BoxedListIconSize']+2; ?>"<?php } ?> class="list-group-item-heading"><?php echo $element['BoxedListElementTitle']; ?></h4><?php } ?>
	      	<?php if($element['BoxedListElementText']) { ?><p <?php if($ob['settings']['BoxedListIcon']) { ?>data-margin-left="<?php echo $ob['settings']['BoxedListIconSize']+2; ?>"<?php } ?>class="list-group-item-text"><?php echo $element['BoxedListElementText']; ?></p><?php } ?>
	      <?php if($element['BoxedListElementLink']) { ?>
	      </a>
	      <?php } ?>
	    </li>
	  	<?php }
	  	} 
	  }
	  ?>
  	
  </ul>
  <?php
	
}
?>