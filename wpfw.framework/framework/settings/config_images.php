<?php

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );

	// slider home and blog
	$sizes = array(1920, 1440, 960, 720, 480, 240, 120, 60, 30);
	$formats = array('1-1', '4-3', '16-9', '2-1', '3-4', '9-16', '1-2');
	
	foreach($sizes as $width) {
		foreach($formats as $format) {
			$f = explode('-', $format);
			$height = $width*$f[1]/$f[0];
			add_image_size('is-'.$width.'-'.$height, $width, $height, true);
		}
	}

	
	$args = array(
		'flex-width'    => true,
		'width'         => 1280,
		'flex-height'   => true,
		'height'        => 154,
		'default-image' => '',
		'header-text'   => false
	);
	add_theme_support( 'custom-header', $args );
	
	$defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );	
	
}

?>