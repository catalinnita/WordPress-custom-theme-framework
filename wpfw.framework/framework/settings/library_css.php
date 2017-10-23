<?php
function wpfw_enqueue_core_styles() {
	
	$css_library = array();
	
	// ========================
	// LAYER 0 - BASE
	// ========================
	// Base layer contains the indispensable css files for cross-browser consintency, website layout(main objects wireframing), 
	// grid and bootstrap base elements properties
	// ------------------------
	// 1. normalize.css - makes browsers render all elements more consistently and in line with modern standards. 
	// It precisely targets only the styles that need normalizing.
	// Ref: http://necolas.github.io/normalize.css/ 
	// ------------------------
	
	$css_library['wpfw-reset'] = array(get_bloginfo('template_url').'/framework/lib/layer0-base/normalize.css', '3.0');
	
	// ------------------------
	// 2. responsive-grid.css - Bootstrap includes a responsive, mobile first fluid grid system that appropriately scales up to 
	// 12 columns as the device or viewport size increases
	// Ref: http://getbootstrap.com/css/#grid
	// ------------------------
	
	$css_library['wpfw-grid'] = array(get_bloginfo('template_url').'/framework/lib/layer0-base/responsive-grid.css', '3.0');
	
	// ------------------------
	// 3. layout.css - Custom made style for handeling the full-width or boxed layouts
	// Ref: http://wpfw.net/support/layer0/
	// ========================
	
	$css_library['wpfw-layout'] = array(get_bloginfo('template_url').'/framework/lib/layer0-base/layout.css', '1.0');

	// ------------------------
	// 4. base.css - bootstrap main elements properties
	// Ref: http://getbootstrap.com/css/ - the grid and elements styles are loaded separately
	// ========================

	$css_library['wpfw-base'] = array(get_bloginfo('template_url').'/framework/lib/layer0-base/base.css', '3.0.2');
	
	
	// ========================
	// LAYER 1 - LAYOUT
	// ========================
	// Layout layer includes the grid and the resposive elements. Also includes all visual editor simple and complex elements, which will be 
	// used on building the website templates.
	// ------------------------
	// 1. Dynamic load of bootstrap and custom elements. All are loaded in library_elements.php
	// ------------------------
	// 2. The resposive part is build using the bootstrap resposive grid. 
	// Ref: http://getbootstrap.com/css/#grid
	// Responsive css styles for 6 resolution intervals are created just for customization purpose. 
	// Please use them in child theme - on framework updates all core files are replaced.
	// ========================
	
	$css_library['wpfw-bigscreens'] = array(get_bloginfo('template_url').'/style/responsive/bigscreens.css', '1.0', 'screen and (min-width: 1174px)');
	$css_library['wpfw-desktop'] = array(get_bloginfo('template_url').'/style/responsive/desktop.css', '1.0', 'screen and (min-width: 1019px) and (max-width: 1174px)');
	$css_library['wpfw-tablet-landscape'] = array(get_bloginfo('template_url').'/style/responsive/tablet-landscape.css', '1.0', 'screen and (max-width: 1019px)');
	$css_library['wpfw-tablet-portrait'] = array(get_bloginfo('template_url').'/style/responsive/tablet-portrait.css', '1.0', 'screen and (max-width: 768px)');
	$css_library['wpfw-phone-landscape'] = array(get_bloginfo('template_url').'/style/responsive/phone-landscape.css', '1.0', 'screen and (max-width: 640px)');
	$css_library['wpfw-phone-portait'] = array(get_bloginfo('template_url').'/style/responsive/phone-portrait.css', '1.0', 'screen and (max-width: 480px)');
	
	
	// ========================
	// LAYER 2 - STYLING
	// ========================
	// 1. Fonts - all fonts are managed using wpfw_fonts plugin
	// Ref: http://wpfw.net/plugins/fonts-plugin/
	// The plugin is mandatory for all WPFW themes.
	// ------------------------
	// 2. Icons - includes 9 web fonts (~1844 icons) with symbols that can be used as icons, instead of images. 
	// Entypo: http://www.entypo.com/
	// Font Awsome: http://fortawesome.github.io/Font-Awesome/
	// Glypicons: (included in bootstrap 3.0 and it can be used as stand alone) http://getbootstrap.com/components/#glyphicons
	// Icomoon: (includes icomoon free pack) http://icomoon.io/app/#/select
	// Line Icons: http://designmodo.com/linecons-free/
	// Monosocial: (used for theme top social icons configurable from options panel) http://drinchev.github.io/monosocialiconsfont/
	// TypIcons: http://typicons.com/
	// Web Symbols: http://www.justbenice.ru/studio/websymbols/, http://www.fontsquirrel.com/fonts/web-symbols
	// Zocial: http://zocial.smcllns.com/
	// ------------------------
		
	$css_library['wpfw-entypo'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/entypo.css', '1.0');
	$css_library['wpfw-font-awesome'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/font-awesome.css', '1.0');
	$css_library['wpfw-glyphicons'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/glyphicons.css', '1.0');
	$css_library['wpfw-icomoon'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/icomoon.css', '1.0');
	$css_library['wpfw-line-icons'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/line-icons.css', '1.0');
	$css_library['wpfw-monosocial'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/monosocial.css', '1.0');
	$css_library['wpfw-typicons'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/typicons.css', '1.0');
	$css_library['wpfw-web-symbols'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/web-symbols.css', '1.0');
	$css_library['wpfw-zocial'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/zocial.css', '1.0');

	// ------------------------
	// 3. Themes - (load from theme files using @import: bootstrap, custom, jquery ui)
	//    a. bootstrap-theme - theme for all bootstrap elements
	//    b. custom-theme - theme for all the other elements
	// For customization please use the files from child theme
	// ------------------------
	
	$css_library['wpfw-bootstrap-theme'] = array(get_bloginfo('template_url').'/style/themes/bootstrap-theme.css', '3.0.2');
	$css_library['wpfw-custom-theme'] = array(get_bloginfo('template_url').'/style/themes/custom-theme.css', '1.0');
	
	// ------------------------
	// 4. Colors - color.css file is loaded using color.php which takes the colors from settings and replace all instances from colors.css file
	// ========================
	
	$css_library['wpfw-colors'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/colors/colors.php', '1.0');
		
	
	// ========================
	// LAYER 3 - ANIMATION
	// ------------------------
	// 1. css transitions - for simple effect css transitions are used and the file is loaded from child theme directory
	// ------------------------
	
	$css_library['wpfw-animations'] = array(get_bloginfo('template_url').'/style/animations/css-transitions.css', '1.0');
	
	// ------------------------
	// 2. jQuery plugins - are loaded in framework/settings/library_addons.php file.
	// ========================

	
	foreach($css_library as $key => $path) {
		if (!isset($path[2])) { $path[2] = 'all'; }
		wp_register_style($key, $path[0], '', $path[1], $path[2]);
		wp_enqueue_style($key);
	}

}

if(!isset($_GET['visual_editor']))	{
	add_action('wp_enqueue_scripts', 'wpfw_enqueue_core_styles');
}

// 

function wpfw_enqueue_core_admin_styles() {
	$css_library = array();
	
	// main admin css files
	$css_library['wpfw-admin'] = array(get_bloginfo('template_url').'/style/admin/admin.css', '1.0');
	
	foreach($css_library as $key => $path) {
		if (!isset($path[2])) { $path[2] = 'all'; }
		wp_register_style($key, $path[0], '', $path[1], $path[2]);
		wp_enqueue_style($key);
	}
	
}

add_action('admin_enqueue_scripts', 'wpfw_enqueue_core_admin_styles');


function wpfw_theme_add_editor_styles() {
    global $post;
		
    $post_type = get_post_type( $post );
    $editor_style = 'editor-style-' . $post_type . '.css';
    add_editor_style( $editor_style );
}
add_action('pre_get_posts', 'wpfw_theme_add_editor_styles' );

?>