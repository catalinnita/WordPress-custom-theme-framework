<?php
$wpfw_icons = array();
get_wpfw_file('framework/lib/layer2-styling/icons/lists/entypo');
get_wpfw_file('framework/lib/layer2-styling/icons/lists/font-awesome');
get_wpfw_file('framework/lib/layer2-styling/icons/lists/glyphicons');
get_wpfw_file('framework/lib/layer2-styling/icons/lists/icomoon');
get_wpfw_file('framework/lib/layer2-styling/icons/lists/lineicons');
get_wpfw_file('framework/lib/layer2-styling/icons/lists/monosocial');
get_wpfw_file('framework/lib/layer2-styling/icons/lists/typicons');
get_wpfw_file('framework/lib/layer2-styling/icons/lists/websymbols');
get_wpfw_file('framework/lib/layer2-styling/icons/lists/zocial');

foreach($wpfw_icons as $i) {
	
	$val = explode("--", $i);
	$font_name = $val[0];
	$tags = $val[1];
	$class_name = $font_name.' '.$font_name.'-'.$tags;
	
	$check_font = $wpdb->get_results("SELECT ID FROM wpfw_icon_fonts WHERE FontName = '".$font_name."'");
	if (!$check_font[0]->ID) {
		$wpdb->query("INSERT INTO wpfw_icon_fonts (FontName) VALUES ('".$font_name."')");
		$font_id = $wpdb->insert_id;
	}
	else {
		$font_id = $check_font[0]->ID;
	}
	
	$check_icon = $wpdb->get_results("SELECT ID FROM wpfw_icons WHERE IconFontID = ".$font_id." AND ClassName = '".$class_name."'");
	if(!isset($check_icon[0]->ID)) {
		$wpdb->query("INSERT INTO wpfw_icons (IconFontID, ClassName)
													VALUES (".$font_id.", '".$class_name."')");
		$icon_id = $wpdb->insert_id;													
		
		$tags_list = explode('-', $tags);
		$tags_list[] = str_replace("-", " ", $tags);
		foreach($tags_list as $t) {
			
			if(strlen($t) >= 3) {

				// add tag name
				$check_tag = $wpdb->get_results("SELECT ID FROM wpfw_icon_tags WHERE TagName = '".$t."'");
				if (!$check_tag[0]->ID) {
					$wpdb->query("INSERT INTO wpfw_icon_tags (TagName) VALUES ('".$t."')");
					$tag_id = $wpdb->insert_id;
				}
				else {
					$tag_id = $check_tag[0]->ID;
				}
				
				// add tag-icon relationship
				$check_tag_icon = $wpdb->get_results("SELECT ID FROM wpfw_icons_tags WHERE TagID = ".$tag_id." AND IconID = ".$icon_id);	
				if(!$check_tag_icon[0]->ID) {
					$wpdb->query("INSERT INTO wpfw_icons_tags (TagID, IconID) VALUES (".$tag_id.", ".$icon_id.")");
				}
				
					
			}	
			
		}
		
		
		
	}
	

	
	
}
?>