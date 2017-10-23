<?php
function wpfw_content_box($ob) {
	
	if ($ob['settings']['ContentBoxContent']) { ?>
	
	<div class="panel panel-<?php echo strtolower($ob['settings']['ContentBoxType']); ?>">
  	
  	<?php if ($ob['settings']['ContentBoxTitle'] || $ob['settings']['ContentBoxSubTitle']) { ?>
  	<div class="panel-heading">
  		<?php if ($ob['settings']['ContentBoxTitle']) { ?>
    	<<?php echo $ob['settings']['ContentBoxTitleTag']; ?> class="panel-title"><?php echo $ob['settings']['ContentBoxTitle']; ?></<?php echo $ob['settings']['ContentBoxTitleTag']; ?>>
    	<?php } ?>
    	<?php if ($ob['settings']['ContentBoxSubTitle']) { ?>
    	<p><?php echo $ob['settings']['ContentBoxSubTitle']; ?></p>
    	<?php } ?>
    </div>
  	<?php } ?>
    
    <div class="panel-body">
    	<?php echo do_shortcode($ob['settings']['ContentBoxContent']); ?>
    </div>
    
    <?php if ($ob['settings']['ContentBoxFooter']) { ?>
    <div class="panel-footer"><?php echo do_shortcode($ob['settings']['ContentBoxFooter']); ?></div>
  	<?php } ?>
  
  </div>
  <?php
	}
	
}
?>