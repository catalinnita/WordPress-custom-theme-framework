<?php
$toggle_options = array();
												

$toggle_options[] = array('ID' => 'ToggleConfig',
													'type' => 'TopTab', 
													'name' => 'Settings',
													'title' => '');

$toggle_options[] = array('ID' => 'ToggleAddElements',
													'type' => 'TopTab', 
													'name' => 'Content',
													'title' => 'Add slides in your slider');			
													
$toggle_options[] = array('ID' => 'ToggleBefore',
													'type' => 'TopTab', 
													'name' => 'Before',
													'title' => 'Select the toggle settings');
													
$toggle_options[] = array('ID' => 'ToggleAfter',
													'type' => 'TopTab', 
													'name' => 'After',
													'title' => 'Select the toggle settings');																								
													

$toggle_options[] = array('type' => 'option', 													
													'parent' => 'ToggleConfig',
													'field' => array('ID' => 'ToggleIcon',
																					 'name' => 'Show Icon',
																					 'desc' => 'Select where you want to show the icon.',
																					 'type' => 'selectbox',
																					 'default' => 'Right',
																					 'options' => array('None'=>'None', 'Left'=>'Left', 'Right'=>'Right')));																							 

$toggle_options[] = array('type' => 'option', 													
													'parent' => 'ToggleConfig',
													'field' => array('ID' => 'ToggleOpenIcon',
																					 'name' => 'Default Icon',
																					 'desc' => 'Select the icon for a closed panel.',
																					 'type' => 'icon',
																					 'width' => 'half',
																					 'default' => 577));					
																					 
$toggle_options[] = array('type' => 'option', 													
													'parent' => 'ToggleConfig',
													'field' => array('ID' => 'ToggleClosedIcon',
																					 'name' => 'Active Icon',
																					 'desc' => 'Select the icon for an open (active) panel.',
																					 'type' => 'icon',
																					 'width' => 'half',
																					 'default' => 574));		

$toggle_options[] = array('type' => 'option', 													
													'parent' => 'ToggleConfig',
													'field' => array('ID' => 'ToggleEffectSpeed',
																					 'name' => 'Effects speed',
																					 'desc' => 'For accuracy the effects speed are calculated in <a href="http://en.wikipedia.org/wiki/Millisecond" target="_blank">milliseconds</a>.',
																					 'type' => 'slider',
																					 'default' => 750,
																					 'min' => 50,
																					 'max' => 7000,
																					 'step' => 50
																					 ));							
																					 
																				 
																					 
$toggle_options[] = array('type' => 'option', 													
													'parent' => 'ToggleConfig',
													'field' => array('ID' => 'ToggleEasing',
																					 'name' => 'Effect Easing',
																					 'desc' => 'Select the <a href="http://api.jqueryui.com/easings/" target="_blank">easing type</a> for sliding effect.',
																					 'type' => 'selectbox',
																					 'default' => 'jswing',
																					 'options' => wpfw_easings()));						
																					 
																						 																			 															 
																					 
$toggle_element_fields = array();
$toggle_element_fields[] = array('ID' => 'ToggleElementTitle',
																					 'name' => 'Title',
																					 'type' => 'textfield');
																					 
$toggle_element_fields[] = array('ID' => 'ToggleElementContent',
																					 'name' => 'Content',
																					 'type' => 'editor');					
																					 
$toggle_element_fields[] = array('ID' => 'ToggleElementStyle',
																					 'name' => 'Element Style',
																					 'type' => 'selectbox',
																					 'default' => 'Default',
																					 'options' => array('Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger'));
																					 
$toggle_element_fields[] = array('ID' => 'ToggleElementOpen',
																					 'name' => 'Show it open',
																					 'type' => 'yesno',
																					 'default' => 'no',
																					 'options' => array('yes', 'no'));														 
																					 
$toggle_options[] = array('type' => 'option', 													
													'parent' => 'ToggleAddElements',
													'field' => array('ID' => 'ToggleElement',
																					 'type' => 'multiple',
																					 'defaultnr' => 3,
																					 'fields' => $toggle_element_fields
																					)
														);
														
														
$toggle_options[] = array('type' => 'option', 													
													'parent' => 'ToggleBefore',
													'field' => array('ID' => 'ToggleBeforeTitle',
																					 'name' => 'Before Title',
																					 'desc' => 'This is an optional heading title that will be placed before the toggle object',
																					 'type' => 'textfield',
																					 'default' => ''));					
																					 
$toggle_options[] = array('type' => 'option', 													
													'parent' => 'ToggleBefore',
													'field' => array('ID' => 'ToggleBeforeTitleTag',
																					 'name' => 'Title Tag',
																					 'desc' => 'Please select the tag that will enclose the title',
																					 'type' => 'selectbox',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'default' => 'h2'));																					 
																					 
$toggle_options[] = array('type' => 'option', 													
													'parent' => 'ToggleBefore',
													'field' => array('ID' => 'ToggleBeforeContent',
																					 'name' => 'Before Content',
																					 'desc' => 'This is an optional text that will be placed before the toggle object',
																					 'type' => 'editor',
																					 'default' => ''));					
																					 
$toggle_options[] = array('type' => 'option', 													
													'parent' => 'ToggleAfter',
													'field' => array('ID' => 'ToggleAfterContent',
																					 'name' => 'After Content',
																					 'desc' => 'This is an optional text that will be placed after the toggle object',
																					 'type' => 'editor',
																					 'default' => ''));																										 
												
													
													
$toggle_item = array(
	'ID' => 'ToggleItem',
	'Name' => 'Toggle',
	'Description' => 'Displays collapsible content panels for presenting information in a limited amount of space. On toggle elements you can select what element is open or closed.',
	'PHP' => array('toggle/show.php'),
	'Func' => 'wpfw_toggle',
	'Icon' => 'elements/toggle/images/icon.png',
	'Order' => 1,
	'Parent' => 'ComplexElements',
	'Options' => $toggle_options
);

wpfw_add_builder_item($toggle_item);
?>