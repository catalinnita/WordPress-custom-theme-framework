<?php

function wpfw_alert_box($ob) {
	//print_r($ob);
	?>
	<div data-line-height="<?php echo $ob['settings']['AlertBoxIconSize']; ?>" class="alert alert-<?php echo strtolower($ob['settings']['AlertBoxType']); ?> <?php if($ob['settings']['AlertBoxClose'] == 'yes') echo 'alert-dismissable'; ?>">
			
			<?php if($ob['settings']['AlertBoxIcon']) { ?>
			<span data-font-size="<?php echo $ob['settings']['AlertBoxIconSize']; ?>" class="alert-icon <?php echo wpfw_icon_class($ob['settings']['AlertBoxIcon']); ?>"></span>
			<?php } ?>
			<div class="alert-container">
				<?php if($ob['settings']['AlertBoxTitle']) { ?>
		  		<<?php echo $ob['settings']['AlertBoxTitleTag']; ?>><?php echo $ob['settings']['AlertBoxTitle']; ?></<?php echo $ob['settings']['AlertBoxTitleTag']; ?>>
				<?php } ?>
		  	<?php echo $ob['settings']['AlertBoxContent']; ?>
  		</div>
  		<?php if($ob['settings']['AlertBoxClose'] == 'yes') { ?><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?php } ?>
  		
  </div>
  <?php
}

?>