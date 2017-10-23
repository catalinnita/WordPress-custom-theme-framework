<?php
function wpfw_forms_display($ob) {
	
	echo do_shortcode('[wpfw_forms form_id="'.$ob['settings']['FormID'].'"]');
	
}

?>