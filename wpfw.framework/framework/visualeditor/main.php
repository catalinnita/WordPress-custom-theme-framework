<?php
function wpfw_ve_metabox() {
	add_meta_box("wpfw-visual-editor-meta-box", "Visual Editor", 'wpfw_builder_metabox', 'page', 'side', 'high');
}

if (is_admin())
	add_action('admin_menu', 'wpfw_ve_metabox');
	
function wpfw_builder_metabox() {
	global $wpfw_dir;
	?>
	For building a page with wonderful WPFW page builder, please save the post first as draft of public article.<br/><br/>
	<input <?php if(!$_GET['post']) { ?>disabled<?php } ?> type="button" class="button-secondary" id="visual-editor-open" value="Visual Editor" >	
	<?php
}

function wpfw_get_post_type() {
	
	if (isset($_GET['post'])) {
		if (isset($_GET['post_type']))	{
			return $_GET['post_type'];
		}
		else {
			return get_post_type($_GET['post']);
		}
	}
	else {
		return false;
	}
}

function wpfw_display_visual_editor() {
	
	?>
	<iframe id="wpfw-visual-editor" src="<?php echo get_bloginfo('template_url'); ?>/framework/visualeditor/visual-editor.php?visual_editor=true&post_id=<?php echo $_GET['post']; ?>" width="100%" height="100%" style="display: none;"></iframe>
	
	<script>
	jQuery(document).ready(function($){ 
		$("#visual-editor-open").click(function() {
			//$("#wpwrap").css({display: 'none'});
			$("#adminmenuback, #adminmenuwrap, #wpcontent, #wpfooter").css({display: 'none'});
			$("#wpfw-visual-editor").css({display: 'block', position: 'fixed', 'z-index': 999, top: 0});
			$("html").removeClass('wp-toolbar');
		});
	});
	</script>
	
	<?php
	
}

if (wpfw_get_post_type() == 'page' && isset($_GET['post'])) {
	
	add_action( 'admin_footer', 'wpfw_display_visual_editor' );

}

?>