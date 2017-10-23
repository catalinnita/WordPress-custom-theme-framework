<?php

add_theme_support('menus');
add_action( 'init', 'register_menus' );
function register_menus(){
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
          'main_menu' => 'Main menu',
          'footer_menu' => 'Footer menu',
	  		)
	  	);

	}}
	
?>