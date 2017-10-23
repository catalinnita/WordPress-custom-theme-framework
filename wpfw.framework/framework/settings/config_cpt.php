<?php

$labels = array(
		'name' => _x('Testimonials', 'post type general name', 'wpfw'),
		'singular_name' => _x('Testimonial', 'post type singular name', 'wpfw'),
		'add_new' => _x('Add New', 'Testimonial', 'wpfw'),
		'add_new_item' => __('Add New Testimonial', 'wpfw'),
		'edit_item' => __('Edit Testimonial', 'wpfw'),
		'new_item' => __('New Testimonial', 'wpfw'),
		'view_item' => __('View Testimonial', 'wpfw'),
		'search_items' => __('Search testimonials', 'wpfw'),
		'not_found' =>  __('Nothing found', 'wpfw'),
		'not_found_in_trash' => __('Nothing found in Trash', 'wpfw'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => '',
		'supports' => array('title','editor','thumbnail', 'page-attributes')
	  ); 	
	  
	  register_post_type( 'testimonials' , $args );		
	
?>