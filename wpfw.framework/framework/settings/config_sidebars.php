<?php

function vp_widgets_init(){
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'Debonair' ),
		'id' => 'blog-widget-area',
		'description' => __( 'Add here widgets for all blog pages. If you want to add custom sidebars please use the infinite sidebars plugins', 'Debonair' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="title">',
		'after_title' => '</div>'
	) );
	

}

add_action( 'widgets_init', 'vp_widgets_init' );

?>