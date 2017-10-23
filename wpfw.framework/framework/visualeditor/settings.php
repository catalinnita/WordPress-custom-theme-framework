<?php
// styles and scripts for admin
$wp_library = array();
$js_library = array();
$css_library = array();

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
	

$js_library['wpfw-admin-transport-js'] = array(get_bloginfo("template_directory").'/framework/visualeditor/js/jquery.iframe-transport.js', 1.0 );
$js_library['wpfw-admin-fileupload-js'] = array(get_bloginfo("template_directory").'/framework/visualeditor/js/jquery.fileupload.js', 1.0);

$js_library['wpfw-visualeditor-easing'] = array(get_bloginfo("template_directory").'/framework/visualeditor/js/jquery.easing.1.3.js', '1.0');
$js_library['wpfw-visualeditor-coloranimation'] = array(get_bloginfo("template_directory").'/framework/visualeditor/js/jquery.animate.colors.min.js', '1.0');
$js_library['wpfw-visualeditor-jpicker'] = array(get_bloginfo("template_directory").'/framework/visualeditor/js/jpicker/jpicker-1.1.6.js', '1.0');
//$js_library['google-maps'] = array('http://maps.google.com/maps/api/js?sensor=false', 3.0);

$js_library['wpfw-visualeditor-optionspanel'] = array(get_bloginfo("template_directory").'/framework/visualeditor/js/options-panel.js', '1.0');
$js_library['wpfw-visualeditor-core'] = array(get_bloginfo("template_directory").'/framework/visualeditor/js/visual-editor.js', '1.0');


	
$css_library['wpfw-visualeditor-jqueryui-css'] = array(get_bloginfo("template_directory").'/framework/visualeditor/styles/jquery-ui/jquery-ui-1.9.1.custom.css', '1.0');
$css_library['wpfw-visualeditor-optionspanel-css'] = array(get_bloginfo("template_directory").'/framework/visualeditor/styles/options-panel-builder.css', '1.0');
$css_library['wpfw-visualeditor-core-css'] = array(get_bloginfo("template_directory").'/framework/visualeditor/styles/visual-editor.css', '1.0');
$css_library['wpfw-window-css'] = array(get_bloginfo("template_directory").'/framework/visualeditor/styles/wpfw-window.css', '1.0');
$css_library['wpfw-visualeditor-jpicker-css'] = array(get_bloginfo("template_directory").'/framework/visualeditor/js/jpicker/css/jPicker-1.1.6.css', '1.0');

$css_library['wpfw-entypo'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/entypo.css', '1.0');
$css_library['wpfw-font-awesome'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/font-awesome.css', '1.0');
$css_library['wpfw-glyphicons'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/glyphicons.css', '1.0');
$css_library['wpfw-icomoon'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/icomoon.css', '1.0');
$css_library['wpfw-line-icons'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/line-icons.css', '1.0');
$css_library['wpfw-monosocial'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/monosocial.css', '1.0');
$css_library['wpfw-typicons'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/typicons.css', '1.0');
$css_library['wpfw-web-symbols'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/web-symbols.css', '1.0');
$css_library['wpfw-zocial'] = array(get_bloginfo('template_url').'/framework/lib/layer2-styling/icons/css/zocial.css', '1.0');





if(isset($_GET['visual_editor']))	{
	add_action('wp_enqueue_scripts', 'wpfw_ve_enqueue_core_scripts');
	add_action('wp_enqueue_scripts', 'wpfw_ve_enqueue_core_styles');	
}


$cwidth = 900; // container width
$maxelement = 4; // max elements number on a row
$step = 75; // max elements number on a row
$elementwidth = ($cwidth/$maxelement)-12; // element minimum width 
?>