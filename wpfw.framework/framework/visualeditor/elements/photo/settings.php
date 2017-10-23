<?php
$photo_options = array();

$photo_options[] = array('ID' => 'PhotoConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Select Photo');

$photo_options[] = array('type' => 'option', 													
													'parent' => 'PhotoConfig',
													'field' => array('ID' => 'PhotoPhoto',
																					 'name' => 'Photo',
																					 'type' => 'upload',
																					 'default' => '',
																					 'size' => 'false'));					

																 																		 																				 

																					 								
													
													
$photo_item = array(
	'ID' => 'Photo',
	'Name' => 'Photo',
	'Description' => 'Upload and insert JPG, GIF or PNG images in different formats. ',
	'PHP' => array('photo/show.php'),
	'Func' => 'wpfw_photo',
	'Icon' => 'elements/photo/images/icon.png',
	'Order' => 1,
	'Parent' => 'MediaElements',
	'Options' => $photo_options
);

wpfw_add_builder_item($photo_item);
?>