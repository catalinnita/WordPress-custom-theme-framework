<?php
function wpfw_photo($ob) {
	
		if($ob['settings']['PhotoLink']){
			?><a href="<?php echo $ob['settings']['PhotoLink']; ?>"><?php
		}
		wpfw_get_image($ob['settings']['PhotoPhoto']);
		if($ob['settings']['PhotoLink']){
		?>
		</a>
		<?php
		}
	
}
?>