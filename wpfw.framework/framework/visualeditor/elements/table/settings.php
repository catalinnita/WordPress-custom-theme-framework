<?php
$table_options = array();

$table_options[] = array('ID' => 'TableConfig',
													'type' => 'TopTab', 
													'name' => 'Table Config',
													'title' => 'Select the table settings');

$table_options[] = array('ID' => 'AddElements',
													'type' => 'TopTab', 
													'name' => 'Add Table',
													'title' => 'Add tabs content');
													
																					 
$table_options[] = array('type' => 'option', 													
													'parent' => 'TableConfig',
													'field' => array('ID' => 'TableStriped',
																					 'name' => 'Striped',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));		
$table_options[] = array('type' => 'option', 													
													'parent' => 'TableConfig',
													'field' => array('ID' => 'TableBoxed',
																					 'name' => 'Boxed',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));				
																					 
$table_options[] = array('type' => 'option', 													
													'parent' => 'TableConfig',
													'field' => array('ID' => 'TableHovered',
																					 'name' => 'Highlight on Hover',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));				
																					 
$table_options[] = array('type' => 'option', 													
													'parent' => 'TableConfig',
													'field' => array('ID' => 'TableResponsive',
																					 'name' => 'Resposive',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));																							 																			 																		 
													
													
$table_item = array(
	'ID' => 'TableItem',
	'Name' => 'Table',
	'Description' => 'Add a table',
	'PHP' => array('table/show.php'),
	'Icon' => 'elements/table/images/icon.png',
	'Order' => 1,
	'Parent' => 'ComplexElements',
	'Options' => $table_options
);

wpfw_add_builder_item($table_item);
?>