<?php

function wpfw_icon($ob) {
	
	?>
	<div data-font-size="<?php echo $ob['settings']['IconSize']; ?>"
			 data-align="<?php echo $ob['settings']['IconAlign']; ?>" 
			 data-color="<?php echo '#'.$ob['settings']['IconColor']; ?>" 
			 class="<?php echo wpfw_icon_class($ob['settings']['IconIcon']); ?>"></div>
	<?php
	
}

?>