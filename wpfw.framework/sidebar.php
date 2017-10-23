<?php 
if (is_active_sidebar('blog-widget-area')) {
	dynamic_sidebar('blog-widget-area');	
}
else {
	?>
	<p><?php _e('You have no widgets in Blog Sidebar.<br /><a href="'.site_url().'/wp-admin/widgets.php">Please add some</a>.', 'wpfw'); ?></p>
	<?php
}
?>