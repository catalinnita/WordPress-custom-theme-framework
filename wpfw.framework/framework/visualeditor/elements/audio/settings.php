<?php
$audio_options = array();

$audio_options[] = array('ID' => 'AudioConfig',
													'type' => 'TopTab', 
													'name' => 'Audio Config',
													'title' => 'Select Audio');
													
$audio_options[] = array('type' => 'option', 													
													'parent' => 'AudioConfig',
													'field' => array('ID' => 'AudioTitle',
																					 'name' => 'Audio Title',
																					 'type' => 'textfield',
																					 'default' => ''));															

$audio_options[] = array('type' => 'option', 													
													'parent' => 'AudioConfig',
													'field' => array('ID' => 'AudioUrl',
																					 'name' => 'Audio URL',
																					 'type' => 'textarea',
																					 'default' => ''));															

$audio_options[] = array('type' => 'option', 													
													'parent' => 'AudioConfig',
													'field' => array('ID' => 'AudioAudio',
																					 'name' => 'Audio',
																					 'type' => 'upload',
																					 'default' => ''));					

																					 								
													
													
$audio_item = array(
	'ID' => 'Audio',
	'Name' => 'Audio',
	'Description' => 'Add an Audio File.',
	'PHP' => array('audio/show.php'),
	'Func' => 'wpfw_hosted_audio',
	'Icon' => 'elements/audio/images/icon.png',
	'Order' => 1,
	'Parent' => 'MediaElements',
	'Options' => $audio_options
);

wpfw_add_builder_item($audio_item);
?>