<?php
$boxed_list_options = array();

$boxed_list_options[] = array('ID' => 'BoxedListConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Set-up the list details.');

$boxed_list_options[] = array('ID' => 'BoxedListContent',
													'type' => 'TopTab', 
													'name' => 'Header',
													'title' => 'Set-up the list details.');		

$boxed_list_options[] = array('ID' => 'BoxedListElements',
													'type' => 'TopTab', 
													'name' => 'Elements',
													'title' => 'Set-up the list details.');													

$boxed_list_options[] = array('type' => 'option', 													
													'parent' => 'BoxedListContent',
													'field' => array('ID' => 'BoxedListTitle',
																					 'name' => 'Title',
																					 'type' => 'textfield',
																					 'desc' => 'Add a title to this boxed list header.',
																					 'default' => ''));				
																					 
$boxed_list_options[] = array('type' => 'option', 													
													'parent' => 'BoxedListContent',
													'field' => array('ID' => 'BoxedListSubtitle',
																					 'name' => 'Subtitle',
																					 'type' => 'textarea',
																					 'desc' => 'Add a subtitle to this boxed list header.',
																					 'rows' => 3,
																					 'default' => ''));																								 	

$boxed_list_options[] = array('type' => 'option', 													
													'parent' => 'BoxedListConfig',
													'field' => array('ID' => 'BoxedListTitleStyle',
																					 'name' => 'Title Style',
																					 'desc' => 'Change the color of the box header choosing one of the style.',
																					 'type' => 'selectbox',
																					 'default' => 'Primary',
																					 'options' => array('Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger'))); 

$boxed_list_options[] = array('type' => 'option', 													
													'parent' => 'BoxedListConfig',
													'field' => array('ID' => 'BoxedListIcon',
																					 'name' => 'Bullets icon',
																					 'desc' => 'Choose the optional icon from almost 2000 font icons.',
																					 'type' => 'icon'));					

$boxed_list_options[] = array('type' => 'option', 													
													'parent' => 'BoxedListConfig',
													'field' => array('ID' => 'BoxedListIconSize',
																					 'name' => 'Icon size',
																					 'type' => 'slider',
																					 'default' => 20,
																					 'min' => 12,
																					 'max' => 45,
																					 'step' => 1,
																					 'desc' => 'Choose the icon size. For less text adjust it to a smaller size, for more text increase the icons size.',
																					 ));																													 																 

$boxed_list_element_fields = array();
$boxed_list_element_fields[] = array('ID' => 'BoxedListElementTitle',
																					 'name' => 'Item Title',
																					 'type' => 'textfield');
																					 
$boxed_list_element_fields[] = array('ID' => 'BoxedListElementText',
																					 'name' => 'Item Text',
																					 'type' => 'textarea',
																					 'rows' => 2);
																					 
$boxed_list_element_fields[] = array('ID' => 'BoxedListElementLink',
																					 'name' => 'Item Link',
																					 'type' => 'textfield');		

$boxed_list_element_fields[] = array('ID' => 'BoxedListElementBadge',
																					 'name' => 'Item Bagde',
																					 'type' => 'textfield');		

$boxed_list_element_fields[] = array('ID' => 'BoxedListElementStyle',
																					 'name' => 'Item Style',
																					 'type' => 'selectbox',
																					 'default' => 'Default',
																					 'options' => array('Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger')); 
																					 
																					 
$boxed_list_options[] = array('type' => 'option', 													
													'parent' => 'BoxedListElements',
													'field' => array('ID' => 'BoxedListElement',
																					 'type' => 'multiple',
																					 'defaultnr' => 5,
																					 'fields' => $boxed_list_element_fields
																					)
														);
																					 								
													
													
$boxed_list_item = array(
	'ID' => 'BoxedList',
	'Name' => 'Boxed List',
	'Description' => 'List groups are a flexible and powerful component for displaying not only simple lists of elements, but complex ones with custom content.',
	'PHP' => array('boxed-lists/show.php'),
	'Func' => 'wpfw_boxed_list',
	'Icon' => 'elements/boxed-lists/images/icon.png',
	'Order' => 1,
	'Parent' => 'Articles',
	'Options' => $boxed_list_options
);

wpfw_add_builder_item($boxed_list_item);
?>