<?php
define('THEME_URL', get_template_directory_uri().'/');

// INCLUDE ALL ADDONS FROM LIB FOLDER

// carousels
get_wpfw_file('framework/lib/layer3-animation/carousel/jcarousel/config');

// hover effects
get_wpfw_file('framework/lib/layer3-animation/hover/boxshadow/config');

// lightboxes
get_wpfw_file('framework/lib/layer3-animation/lightbox/fancybox/config');

// masonry
get_wpfw_file('framework/lib/layer3-animation/masonry/jquerymasonry/config');

// mobile
get_wpfw_file('framework/lib/layer3-animation/mobile/wipetouch/config');

// parallax
get_wpfw_file('framework/lib/layer3-animation/parallax/jparallax/config');

// scroller
get_wpfw_file('framework/lib/layer3-animation/scroller/jscroll/config');

// sorting
get_wpfw_file('framework/lib/layer3-animation/sorting/quicksand/config');

// tooltips
get_wpfw_file('framework/lib/layer3-animation/tooltips/config');

// menus
get_wpfw_file('framework/lib/layer3-animation/menus/config');

// sliders
get_wpfw_file('framework/lib/layer3-animation/sliders/anything/config');
get_wpfw_file('framework/lib/layer3-animation/sliders/nivo/config');
get_wpfw_file('framework/lib/layer3-animation/sliders/parallax/config');
get_wpfw_file('framework/lib/layer3-animation/sliders/skitter/config');



// ENQUEUE ALL SCRIPTS AND STYLES FOR ADDONS
if(!function_exists("wpfw_enqueue_lib_scripts")) {
function wpfw_enqueue_lib_scripts() {
	global $lib_config;
	
	foreach($lib_config as $lib) {
			// main js file
			if (count($lib['PathToJS']) <= 1) { 
				$paths_to_js = array();
				$paths_to_js[0] = $lib['PathToJS']; 
			}
			else {
				$paths_to_js = $lib['PathToJS'];
			}
			foreach($paths_to_js as $key => $path_to_js) {
				wp_enqueue_script(
					'wpfw-'.$key.'-'.wpfw_nice_name($lib['Name']),
					$path_to_js,
					array('jquery'),
					'1.0',
					true
				);		
			}

			// config js file
			wp_enqueue_script(
				'wpfw-'.wpfw_nice_name($lib['Name']).'-config',
				$lib['PathToConfig'],
				array('jquery'),
				'1.0',
				true
			);					


	}
}
}

if(!function_exists("wpfw_enqueue_lib_styles")) {
function wpfw_enqueue_lib_styles() {
	global $lib_config;

	foreach($lib_config as $lib) {
		// main css file
		if (isset($lib['PathToCSS'])) {
				if (count($lib['PathToCSS']) <= 1) { 
					$paths_to_css = array();
					$paths_to_css[0] = $lib['PathToCSS']; 
				}
				else {
					$paths_to_css = $lib['PathToCSS'];
				}

				foreach($paths_to_css as $key => $path_to_css) {
					wp_register_style('wpfw-'.$key.'-'.wpfw_nice_name($lib['Name']).'-style', $path_to_css);
					wp_enqueue_style('wpfw-'.$key.'-'.wpfw_nice_name($lib['Name']).'-style');
				}
			}
	}
}
}
if(!isset($_GET['visual_editor']))	{	
	add_action('wp_enqueue_scripts', 'wpfw_enqueue_lib_styles');
	add_action('wp_enqueue_scripts', 'wpfw_enqueue_lib_scripts');
}

?>