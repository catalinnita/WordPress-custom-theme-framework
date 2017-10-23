<?php
$divider_options = array();

$divider_options[] = array('ID' => 'DividerConfig',
													'type' => 'TopTab', 
													'name' => 'Divider Config',
													'title' => 'Divider type');

$divider_options[] = array('type' => 'option', 													
													'parent' => 'DividerConfig',
													'field' => array('ID' => 'DividerType',
																					 'name' => 'Type',
																					 'type' => 'selectbox',
																					 'desc' => 'Please select the divider line type',
																					 'options' => array('Continuous'=>'Continuous', 'Dotted'=>'Dotted', 'Dashed'=>'Dashed', 'Double'=>'Double', 'Continuous X2'=>'Continuous X2', 'Dotted X2'=>'Dotted X2', 'Dashed X2'=>'Dashed X2'),
																					 'default' => 'Continuous'));													

$divider_options[] = array('type' => 'option', 																	
													 'parent' => 'DividerConfig',
													 'field' => array('ID' => 'DividerColor',
																					 'name' => 'Color',
																					 'desc' => 'Please select the divider line color',
																					 'type' => 'color',
																					 'default' => 'cccccc'));			
																					 
													
$divider_item = array(
	'ID' => 'Divider',
	'Name' => 'Divider',
	'Description' => 'Dividers are simple but useful elements for separating content zones. You can use it in some different styles and any color.',
	'PHP' => array('divider/show.php'),
	'Func' => 'wpfw_divider',
	'Icon' => 'elements/divider/images/icon.png',
	'Order' => 1,
	'Parent' => 'Articles',
	'Options' => $divider_options
);

wpfw_add_builder_item($divider_item);
?>