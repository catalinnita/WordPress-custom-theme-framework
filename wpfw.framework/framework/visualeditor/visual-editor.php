<?php
$external = 'true';
//require_once('../../../../../wp-load.php');

$wpfw_elements = array(); 

include('visual-editor-functions.php');
include('data.php');
include('settings.php');
include('objects.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WPFW - Visual Editor 0.0.1</title>
	
	<style>
		#wpfw-visual-editor-mainarea { width: <?php echo $cwidth;?>px; }
		#wpfw-visual-editor-mainarea .rowcontainer { width: <?php echo $cwidth;?>px; }	
		#wpfw-visual-editor-mainarea .rowcontainer li { width: <?php echo $elementwidth;?>px; }
	</style>
	<?php wp_head(); ?>
</head>
<body>
<?php

// import 
if ($_POST['import-template'] == 1) {
	if(pathinfo($_FILES['wpfw-editor-import']['name'], PATHINFO_EXTENSION) == 'wpfw') {
		$data = file_get_contents($_FILES['wpfw-editor-import']['tmp_name']);
		wpfw_import_data($data);
	}
	
}

// save 
if ($_POST['wpfw-options-saved'] == 1) {
	//print_r($_POST);
	$elements = array();
	$elnr = 1;
	//print_r($_POST);
	for($rnr = 1 ; $rnr <= $_POST['rows'] ; $rnr++) {
		for($cnr = 1 ; $cnr <= 4 ; $cnr++) {
			
			if ($_POST['row'.$rnr.'-el'.$cnr]) {
				
				//if($_POST['ImageName-'.$cnr;])

				$elements[$elnr] = wpfw_get_array($_POST['row'.$rnr.'-el'.$cnr]);
				$elements[$elnr]['row'] = $rnr;
				$elements[$elnr]['php'] = $wpfw_elements[$elements[$elnr]['t']]['PHP'];
				$elements[$elnr]['func'] = $wpfw_elements[$elements[$elnr]['t']]['Func'];
				$elements[$elnr]['settings'] = wpfw_get_options_array($wpfw_elements[$elements[$elnr]['t']]['Options'], $elements[$elnr]['id'], $elnr);
				
				
				foreach($wpfw_elements[$elements[$elnr]['t']]['Options'] as $option) {
				
					if($option['field']['type'] == 'upload') {
						$imagename = $_POST['ImageName-'.$option['field']['ID'].'-'.$elements[$elnr]['id']];
						if($imagename != 'del') {
							if (strlen($imagename) > 0) {
							$upload_dir = wp_upload_dir();
							$abs_uploads_dir = $upload_dir['basedir'].$upload_dir['subdir'];
							
							$wp_filetype = wp_check_filetype(basename($imagename), null );
									$attachment = array(
										'post_mime_type' => $wp_filetype['type'],
										'post_title' => preg_replace('/\.[^.]+$/', '', basename($imagename)),
										'post_content' => '',
										'post_status' => 'inherit'
							);
									
							$attach_id = wp_insert_attachment( $attachment, substr($upload_dir['subdir'],1).'/'.$imagename);
	
							$attach_data = wp_generate_attachment_metadata($attach_id, $abs_uploads_dir.'/'.$imagename);
							wp_update_attachment_metadata($attach_id, $attach_data);					
							
							$elements[$elnr]['settings'][$option['field']['ID']]['AttachmentID'] = $attach_id;
							}
							else {
								$saved_elements_s = $wpdb->get_results("SELECT Objects FROM wpfw_builder_elements WHERE PostID = ".$_GET['post_id']);
								$saved_elements = unserialize($saved_elements_s[0]->Objects);
								$elements[$elnr]['settings'][$option['field']['ID']]['AttachmentID'] = $saved_elements[$elnr]['settings'][$option['field']['ID']]['AttachmentID'];
							}
							
							$elements[$elnr]['settings'][$option['field']['ID']]['Size'] = $_POST['ImageSize-'.$option['field']['ID'].'-'.$elements[$elnr]['id']];
							$elements[$elnr]['settings'][$option['field']['ID']]['Title'] = $_POST['ImageTitle-'.$option['field']['ID'].'-'.$elements[$elnr]['id']];
							$elements[$elnr]['settings'][$option['field']['ID']]['Alt'] = $_POST['ImageAlt-'.$option['field']['ID'].'-'.$elements[$elnr]['id']];
							$elements[$elnr]['settings'][$option['field']['ID']]['Caption'] = $_POST['ImageCaption-'.$option['field']['ID'].'-'.$elements[$elnr]['id']];
							$elements[$elnr]['settings'][$option['field']['ID']]['Format'] = $_POST['ImageFormat-'.$option['field']['ID'].'-'.$elements[$elnr]['id']];
						}
						else {
							$elements[$elnr]['settings'][$option['field']['ID']] = '';
						}
					}
				}
				
				//print_r($wpfw_elements[$elements[$elnr]['t']]['Options']);
				//print_r($elements[$elnr]['id']);
				
				
				//$elements[$elnr]['data'] = elements if any	
				
				$elnr++;
			}
		}
		
	
}
	
	$check = $wpdb->get_results("SELECT Objects FROM wpfw_builder_elements WHERE PostID = ".$_GET['post_id']);
	if (!$check[0]->Objects) {
		$wpdb->query("INSERT INTO wpfw_builder_elements (PostID, Objects) VALUES (".$_GET['post_id'].", '".serialize($elements)."')");
		
	}
	else {
		$wpdb->query("UPDATE wpfw_builder_elements SET 
									Objects = '".serialize($elements)."'
										WHERE PostID = ".$_GET['post_id']);								
	}
}




?>
<?php //include('top-bar.php'); ?>
<?php include('save-bar.php'); ?>

	<form id="wpfw-options-form" name="wpfw-options-form" action="" method="post">
		<input type="hidden" name="wpfw-options-saved" value="1" />
		
		<!-- options zone -->
		<div id="wpfw-visual-editor-options">
			<div class="no-element-selected">
				NO OBJECT IS SELECTED.<br/>Please select one object from the grid by clicking on it. Its options will show up for editing. <br/><br/>
				If you want to learn more about <br/><strong>WPFW Visual Editor</strong><br/>please watch this video.
			</div>
			<?php 
			wpfw_elements_options($_GET['post_id']); ?>
		</div>
		
		<div id="wpfw-visual-editor-playground">
			<!-- elements bar -->
			<?php
			include('elements-bar.php');
			?>
			
			<!-- builder area -->
			<ul id="wpfw-visual-editor-mainarea">
				<?php wpfw_build_grid($_GET['post_id']); ?>
			</ul>
		</div>
		
	</form>
	<div class="cleaner"></div>
	
	
	<!-- pass interface vars from php to javascript -->
	<script>
	var step = <?php echo $step; ?>;
	var cwidth = <?php echo $cwidth; ?>;
	var elementwidth = <?php echo $elementwidth; ?>;
	</script>
	<!-- load visual editor script -->
	<?php wp_footer(); ?>
</body>
</html>