<?php
$simple_list_options = array();

$simple_list_options[] = array('ID' => 'SimpleListConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Set-up the list details.');

$simple_list_options[] = array('ID' => 'ListElements',
													'type' => 'TopTab', 
													'name' => 'Elements',
													'title' => 'Set-up the list details.');		

$simple_list_options[] = array('type' => 'option', 													
													'parent' => 'SimpleListConfig',
													'field' => array('ID' => 'SimpleListIcon',
																					 'name' => 'Icon',
																					 'desc' => 'Please select the icon for list bullet',
																					 'type' => 'icon',
																					 'default' => ''));			
																					 			
																					 
$simple_list_options[] = array('type' => 'option', 													
													'parent' => 'SimpleListConfig',
													'field' => array('ID' => 'SimpleListIconSize',
																					 'name' => 'Icon size',
																					 'type' => 'slider',
																					 'default' => 20,
																					 'min' => 12,
																					 'max' => 45,
																					 'step' => 1,
																					 'desc' => 'Choose the icon size. ',
																					 ));									
																					 
$simple_list_options[] = array('type' => 'option', 													
													'parent' => 'SimpleListConfig',
													'field' => array('ID' => 'SimpleListIconColor',
																					 'name' => 'Icon Color',
																					 'desc' => 'Please select the bullet color.',
																					 'type' => 'color',
																					 'default' => '333333'));																							 																					 							
													
$list_element_fields = array();
$list_element_fields[] = array('ID' => 'ListElementTitle',
																					 'name' => 'Item',
																					 'hidetitle' => 'yes',
																					 'type' => 'textarea',
																					 'rows' => 2);
																					 
$simple_list_options[] = array('type' => 'option', 													
													'parent' => 'ListElements',
													'field' => array('ID' => 'ListElement',
																					 'type' => 'simplemultiple',
																					 'defaultnr' => 5,
																					 'fields' => $list_element_fields
																					)
														);																					 													
													
													
$simple_list_item = array(
	'ID' => 'SimpleList',
	'Name' => 'Simple List',
	'Description' => 'Add lists with any bullet you want. You can choose from almost 2000 icons. If you want to add just a normal basic list please use SIMPLE TEXT element and add the list using the editor.',
	'PHP' => array('lists/show.php'),
	'Func' => 'wpfw_simple_list',
	'Icon' => 'elements/lists/images/icon.png',
	'Order' => 1,
	'Parent' => 'Articles',
	'Options' => $simple_list_options
);

wpfw_add_builder_item($simple_list_item);
?>