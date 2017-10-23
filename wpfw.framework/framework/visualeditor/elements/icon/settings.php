<?php
$icon_options = array();

$icon_options[] = array('ID' => 'IconConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Select Icon');

$icon_options[] = array('type' => 'option', 													
													'parent' => 'IconConfig',
													'field' => array('ID' => 'IconIcon',
																					 'name' => 'Icon',
																					 'desc' => 'Please select the icon.',
																					 'type' => 'icon',
																					 'default' => ''));				
																					 
$icon_options[] = array('type' => 'option', 													
													'parent' => 'IconConfig',
													'field' => array('ID' => 'IconAlign',
																					 'name' => 'Align',
																					 'type' => 'selectbox',
																					 'desc' => 'Select how the icon should be aligned.',
																					 'options' => array('left'=>'Left', 'center'=>'Center', 'right'=>'Right'),
																					 'default' => 'center'));																									 	
																					 
$icon_options[] = array('type' => 'option', 													
													'parent' => 'IconConfig',
													'field' => array('ID' => 'IconSize',
																					 'name' => 'Icon size',
																					 'type' => 'slider',
																					 'desc' => 'Set up the icons size in pixels.',
																					 'default' => 42,
																					 'min' => 12,
																					 'max' => 140,
																					 'step' => 1,
																					 'desc' => 'Choose the icon size. ',
																					 ));														
																					 
$icon_options[] = array('type' => 'option', 													
													'parent' => 'IconConfig',
													'field' => array('ID' => 'IconColor',
																					 'name' => 'Icon Color',
																					 'desc' => 'Pick the icon color.',
																					 'type' => 'color',
																					 'default' => '333333'));																							 							 

																					 								
													
													
$icon_item = array(
	'ID' => 'Icon',
	'Name' => 'Icon',
	'Description' => 'Add a font icon. Choose from almost 2000 icons in different styles.',
	'PHP' => array('icon/show.php'),
	'Func' => 'wpfw_icon',
	'Icon' => 'elements/icon/images/icon.png',
	'Order' => 1,
	'Parent' => 'MediaElements',
	'Options' => $icon_options
);

wpfw_add_builder_item($icon_item);
?>