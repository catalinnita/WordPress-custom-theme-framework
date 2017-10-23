<?php

function wpfw_enqueue_core_scripts() {
	
	// wordpress library
	$wp_library = array();
	$wp_library[] = 'jquery';
	$wp_library[] = 'jquery-form';
	$wp_library[] = 'jquery-color';
	$wp_library[] = 'jquery-ui-core';
	$wp_library[] = 'jquery-ui-datepicker';
	$wp_library[] = 'jquery-ui-widget';
	$wp_library[] = 'jquery-ui-mouse';
	$wp_library[] = 'jquery-ui-accordion';
	$wp_library[] = 'jquery-ui-autocomplete';
	$wp_library[] = 'jquery-ui-slider';
	$wp_library[] = 'jquery-ui-tabs';
	$wp_library[] = 'jquery-ui-sortable';
	$wp_library[] = 'jquery-ui-draggable';
	$wp_library[] = 'jquery-ui-droppable';
	$wp_library[] = 'jquery-ui-selectable';
	$wp_library[] = 'jquery-ui-position';
	$wp_library[] = 'jquery-ui-resizable';
	$wp_library[] = 'jquery-ui-dialog';
	$wp_library[] = 'jquery-ui-button';
	
	
	$js_library = array();
	
	// addons + custom scripts
	if(get_php_browser() == 'ie8' || get_php_browser() == 'ie7') {
		$js_library['wpfw-html5-ie8'] = array('http://html5shim.googlecode.com/svn/trunk/html5.js', '3.7.0');
	}
	$js_library['wpfw-jquery-waitforimages'] = array('/framework/lib/layer3-animation/addon/jquery.waitforimages.min.js', '1.5.0');
	$js_library['wpfw-jquery-easing'] = array('/framework/lib/layer3-animation/addon/jquery.easing.js', '1.3');
	$js_library['wpfw-mouse-wheel'] = array('/framework/lib/layer3-animation/addon/jquery.mousewheel.js', '1.0');
	
	$external_library['google-maps'] = array('http://maps.google.com/maps/api/js?sensor=false', 3.0);
	
	// jquery plugins
	// library_addons.php file
	// transform effects.js in menu.js $js_library['wpfw-effects'] = array('/scripts/main/effects.js', '1.0'); and add it to library_addons
	
	
	foreach($wp_library as $wp_script_name) {	
		wp_enqueue_script($wp_script_name); 
	}
	
	
	foreach($js_library as $key => $path) {	
		wp_enqueue_script(
			$key,
			get_template_directory_uri().$path[0],
			array('jquery'),
			$path[1],
			true
		);				
	}
	
	foreach($external_library as $key => $path) {	
		wp_enqueue_script(
			$key,
			$path[0],
			array('jquery'),
			$path[1],
			false
		);			
	}
}

if (!is_admin() && !isset($_GET['visual_editor']))	{
add_action('wp_enqueue_scripts', 'wpfw_enqueue_core_scripts');
}


?>