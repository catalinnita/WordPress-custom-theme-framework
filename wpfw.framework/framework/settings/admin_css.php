<?php
function wpfw_admin_color_schemes() {
	//Get the theme directory
	$theme_dir = get_template_directory_uri();

	//Ocean
	wp_admin_css_color( 'wpfw', __( 'WPFW' ),
		$theme_dir . '/style/admin/admin-colors.css',
		array( '#007777', '#009999', '#005555', '#efefef' )
	);
}
add_action('admin_init', 'wpfw_admin_color_schemes');

function wpfw_default_admin_color($user_id) {
	$args = array(
		'ID' => $user_id,
		'admin_color' => 'wpfw'
	);
	wp_update_user( $args );
}
add_action('user_register', 'wpfw_default_admin_color');

function wpfw_rename_fresh_color_scheme() {
	global $_wp_admin_css_colors;
	$color_name = $_wp_admin_css_colors['fresh']->name;

	if( $color_name == 'Default' ) {
		$_wp_admin_css_colors['fresh']->name = 'Fresh';
	}
	return $_wp_admin_css_colors;
}
add_filter('admin_init', 'wpfw_rename_fresh_color_scheme');

?>