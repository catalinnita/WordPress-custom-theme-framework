<?php
$post = get_post($_GET['post_id']);
?>
<div class="wpfw-save-bar">
	<div class="wpfw-save-bar-container">
		<input type="button" id="wpfw-editor-close" class="button-close" value="Close">
		<input data-link="export.php?visual_editor=true&post_id=<?php echo $_GET['post_id']; ?>&filename=<?php echo $post->post_name; ?>" type="button" id="wpfw-editor-export" class="button-export" value="Export">
		<form id="wpfw-template-import" action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="import-template" value="1">
			<div class="button-import">
				<span>Import</span>
				<input type="file" name="wpfw-editor-import" id="wpfw-editor-import" >		
			</div>
		</form>
		
		<input type="button" id="wpfw-editor-save" class="button-save" value="Save">
		<span id="wpfw-saving-animation" style="display: none; color: #FFF;"><img src="<?php bloginfo("template_directory");?>/framework/visualeditor/images/loading.gif" /></span>
	</div>
</div>