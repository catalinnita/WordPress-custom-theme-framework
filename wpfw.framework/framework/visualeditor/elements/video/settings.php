<?php
$video_options = array();

$video_options[] = array('ID' => 'VideoConfig',
													'type' => 'TopTab', 
													'name' => 'Video Config',
													'title' => 'Add Video Info');

$video_options[] = array('type' => 'option', 													
													'parent' => 'VideoConfig',
													'field' => array('ID' => 'VideoUrl',
																					 'name' => 'Video URL',
																					 'type' => 'textarea',
																					 'default' => ''));		

$video_options[] = array('type' => 'option', 													
													'parent' => 'VideoConfig',
													'field' => array('ID' => 'VideoVideo',
																					 'name' => 'Video',
																					 'type' => 'upload',
																					 'default' => ''));					

																					 								
													
													
$video_item = array(
	'ID' => 'Video',
	'Name' => 'Video',
	'Description' => 'Add a Video.',
	'PHP' => array('video/show.php'),
	'Func' => 'wpfw_video',
	'Icon' => 'elements/video/images/icon.png',
	'Order' => 1,
	'Parent' => 'MediaElements',
	'Options' => $video_options
);

wpfw_add_builder_item($video_item);
?>