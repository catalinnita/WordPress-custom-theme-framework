<?php
if (!function_exists("get_wp_path")) {
	function get_wp_path($filename) {
		$url = explode("wp-content", getcwd());
		if (count($url) <= 1) {
			$url = explode("wp-admin", getcwd());
			if (count($url) <= 1) {
				$url[0] = getcwd()."/";
			}
		}	
		return $url[0].$filename;
	}
}

require_once(get_wp_path('wp-load.php'));
require_once(get_wp_path('wp-includes/pluggable.php'));
require_once(get_wp_path('wp-admin/includes/upgrade.php'));	
include('settings.php');

global $wpdb;

$icons = $wpdb->get_results("SELECT wpfw_icons.* 
															FROM wpfw_icons, wpfw_icons_tags, wpfw_icon_tags
																WHERE wpfw_icon_tags.TagName like '%".$_GET['k']."%'
																	AND wpfw_icons_tags.TagID = wpfw_icon_tags.ID
																		AND wpfw_icons_tags.IconID = wpfw_icons.ID");
																		
foreach($icons as $icon) {
	?>
		<div data-id="<?php echo $icon->ID; ?>" class="iconthumb <?php echo $icon->ClassName; ?>"></div>
	<?php
}																		
?>