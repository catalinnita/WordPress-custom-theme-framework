<?php
if(function_exists("wpfw_get_all_forms")) {
	
$forms = wpfw_get_all_forms();	
	
$forms_options = array();

$forms_options[] = array('ID' => 'FormsConfig',
													'type' => 'TopTab', 
													'name' => 'Forms Config',
													'title' => 'Select Form');
													

$forms_options[] = array('type' => 'option', 													
													'parent' => 'FormsConfig',
													'field' => array('ID' => 'FormID',
																					 'name' => 'Select Form',
																					 'type' => 'selectbox',
																					 'default' => 'Select Form',
																					 'options' => $forms));
													
													
$forms_item = array(
	'ID' => 'Forms',
	'Name' => 'Forms',
	'Description' => 'Add an Form from WPFW Forms Plugin',
	'PHP' => array('forms/show.php'),
	'Func' => 'wpfw_forms_display',
	'Icon' => 'elements/forms/images/icon.png',
	'Order' => 1,
	'Parent' => 'CustomElements',
	'Options' => $forms_options
);

wpfw_add_builder_item($forms_item);

}
?>