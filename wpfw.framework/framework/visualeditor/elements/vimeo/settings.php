<?php
$vimeo_options = array();
$vimeo_options[] = array('ID' => 'VimeoConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => '');

$vimeo_options[] = array('type' => 'option', 													
													'parent' => 'VimeoConfig',
													'field' => array('ID' => 'VimeoURL',
																					 'name' => 'URL',
																					 'type' => 'textarea',
																					 'rows' => 4,
																					 'desc' => 'Please add the vimeo video URL exactly like it appears in your browser address bar.<br/>
																					 						<b>Ex. http://vimeo.com/79505580</b>',
																					 'default' => ''));			
																					 
$vimeo_options[] = array('type' => 'option', 													
													'parent' => 'VimeoConfig',
													'field' => array('ID' => 'VimeoFormat',
																					 'name' => 'Aspect ratio',
																					 'type' => 'format',
																					 'desc' => 'Please select the aspect ratio for the embedded object.',
																					 'default' => '16-9'));		
																					 
$vimeo_options[] = array('type' => 'option', 													
													'parent' => 'VimeoConfig',
													'field' => array('ID' => 'VimeoPortrait',
																					 'name' => 'User avatar',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no'),
																					 'desc' => 'Display user avatar?'));		

$vimeo_options[] = array('type' => 'option', 													
													'parent' => 'VimeoConfig',
													'field' => array('ID' => 'VimeoTitle',
																					 'name' => 'Video title',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no'),
																					 'desc' => 'Display video title?'));																					 																					 																						 										
																					 
$vimeo_options[] = array('type' => 'option', 													
													'parent' => 'VimeoConfig',
													'field' => array('ID' => 'VimeoByline',
																					 'name' => 'Video Byline',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no'),
																					 'desc' => 'Display video byline?'));			
																					 
																					 
$vimeo_options[] = array('type' => 'option', 													
													'parent' => 'VimeoConfig',
													'field' => array('ID' => 'VimeoAutoplay',
																					 'name' => 'Autoplay',
																					 'type' => 'yesno',
																					 'default' => 'no',
																					 'options' => array('yes', 'no'),
																					 'desc' => 'Do you want this video to start when the page is loaded?'));	
																					 
																		 	
																					 
																					 
$vimeo_options[] = array('type' => 'option', 													
													'parent' => 'VimeoConfig',
													'field' => array('ID' => 'VimeoColor',
																					 'name' => 'Video Color',
																					 'type' => 'color',
																					 'default' => '44BBFF',
																					 'desc' => 'Select the video color'));
													
$vimeo_item = array(
	'ID' => 'VimeoVideo',
	'Name' => 'Vimeo Video',
	'Description' => 'Add a <a href="http://vimeo.com" target="_blank">vimeo</a> video and set up all possible vimeo api settings. Please follow the instructions for best results.',
	'PHP' => array('vimeo/show.php'),
	'Func' => 'wpfw_vimeo',
	'Icon' => 'elements/vimeo/images/icon.png',
	'Order' => 1,
	'Parent' => 'MediaElements',
	'Options' => $vimeo_options
);

wpfw_add_builder_item($vimeo_item);
?>