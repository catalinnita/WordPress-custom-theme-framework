<div id="NwlBox">
	<div class="nwl-box-title"><?php echo of_get_option("nwlbartext"); ?></div>
	<?php
	switch(of_get_option("nwltype")) {
		case 'Admin panel': echo do_shortcode("[newsletter_field]"); break;
		case 'Constant contact': if (function_exists (gConstantcontact)) gConstantcontact(); break;
		case 'MailChimp' : mailchimpSF_signup_form($args = array()); break;
	}
	?>
</div>