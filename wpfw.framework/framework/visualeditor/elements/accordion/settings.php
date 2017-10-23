<?php
$accordion_options = array();
												

$accordion_options[] = array('ID' => 'AccordionConfig',
													'type' => 'TopTab', 
													'name' => 'Settings',
													'title' => '');

$accordion_options[] = array('ID' => 'AccordionAddElements',
													'type' => 'TopTab', 
													'name' => 'Content',
													'title' => 'Add slides in your slider');			
													
$accordion_options[] = array('ID' => 'AccordionBefore',
													'type' => 'TopTab', 
													'name' => 'Before',
													'title' => 'Select the accordion settings');
													
$accordion_options[] = array('ID' => 'AccordionAfter',
													'type' => 'TopTab', 
													'name' => 'After',
													'title' => 'Select the accordion settings');																								
													

$accordion_options[] = array('type' => 'option', 													
													'parent' => 'AccordionConfig',
													'field' => array('ID' => 'AccordionIcon',
																					 'name' => 'Show Icon',
																					 'desc' => 'Select where you want to show the icon.',
																					 'type' => 'selectbox',
																					 'default' => 'Right',
																					 'options' => array('None'=>'None', 'Left'=>'Left', 'Right'=>'Right')));																							 

$accordion_options[] = array('type' => 'option', 													
													'parent' => 'AccordionConfig',
													'field' => array('ID' => 'AccordionOpenIcon',
																					 'name' => 'Default Icon',
																					 'desc' => 'Select the icon for a closed panel.',
																					 'type' => 'icon',
																					 'width' => 'half',
																					 'default' => 577));					
																					 
$accordion_options[] = array('type' => 'option', 													
													'parent' => 'AccordionConfig',
													'field' => array('ID' => 'AccordionClosedIcon',
																					 'name' => 'Active Icon',
																					 'desc' => 'Select the icon for an open (active) panel.',
																					 'type' => 'icon',
																					 'width' => 'half',
																					 'default' => 574));		

$accordion_options[] = array('type' => 'option', 													
													'parent' => 'AccordionConfig',
													'field' => array('ID' => 'AccordionEffectSpeed',
																					 'name' => 'Effects speed',
																					 'desc' => 'For accuracy the effects speed are calculated in <a href="http://en.wikipedia.org/wiki/Millisecond" target="_blank">milliseconds</a>.',
																					 'type' => 'slider',
																					 'default' => 750,
																					 'min' => 50,
																					 'max' => 7000,
																					 'step' => 50
																					 ));							
																					 
																				 
																					 
$accordion_options[] = array('type' => 'option', 													
													'parent' => 'AccordionConfig',
													'field' => array('ID' => 'AccordionEasing',
																					 'name' => 'Effect Easing',
																					 'desc' => 'Select the <a href="http://api.jqueryui.com/easings/" target="_blank">easing type</a> for sliding effect.',
																					 'type' => 'selectbox',
																					 'default' => 'jswing',
																					 'options' => wpfw_easings()));						
																					 
																						 																			 															 
																					 
$accordion_element_fields = array();
$accordion_element_fields[] = array('ID' => 'AccordionElementTitle',
																					 'name' => 'Title',
																					 'type' => 'textfield');
																					 
$accordion_element_fields[] = array('ID' => 'AccordionElementContent',
																					 'name' => 'Content',
																					 'type' => 'editor');					
																					 
$accordion_element_fields[] = array('ID' => 'AccordionElementStyle',
																					 'name' => 'Element Style',
																					 'type' => 'selectbox',
																					 'default' => 'Default',
																					 'options' => array('Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger'));
																					 
$accordion_options[] = array('type' => 'option', 													
													'parent' => 'AccordionAddElements',
													'field' => array('ID' => 'AccordionElement',
																					 'type' => 'multiple',
																					 'defaultnr' => 3,
																					 'fields' => $accordion_element_fields
																					)
														);
														
														
$accordion_options[] = array('type' => 'option', 													
													'parent' => 'AccordionBefore',
													'field' => array('ID' => 'AccordionBeforeTitle',
																					 'name' => 'Before Title',
																					 'desc' => 'This is an optional heading title that will be placed before the accordion object',
																					 'type' => 'textfield',
																					 'default' => ''));					
																					 
$accordion_options[] = array('type' => 'option', 													
													'parent' => 'AccordionBefore',
													'field' => array('ID' => 'AccordionBeforeTitleTag',
																					 'name' => 'Title Tag',
																					 'desc' => 'Please select the tag that will enclose the title',
																					 'type' => 'selectbox',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'default' => 'h2'));																					 
																					 
$accordion_options[] = array('type' => 'option', 													
													'parent' => 'AccordionBefore',
													'field' => array('ID' => 'AccordionBeforeContent',
																					 'name' => 'Before Content',
																					 'desc' => 'This is an optional text that will be placed before the accordion object',
																					 'type' => 'editor',
																					 'default' => ''));					
																					 
$accordion_options[] = array('type' => 'option', 													
													'parent' => 'AccordionAfter',
													'field' => array('ID' => 'AccordionAfterContent',
																					 'name' => 'After Content',
																					 'desc' => 'This is an optional text that will be placed after the accordion object',
																					 'type' => 'editor',
																					 'default' => ''));																										 
												
													
													
$accordion_item = array(
	'ID' => 'AccordionItem',
	'Name' => 'Accordion',
	'Description' => 'Displays collapsible content panels for presenting information in a limited amount of space. On accordion elements, one and just one panel is always open. ',
	'PHP' => array('accordion/show.php'),
	'Func' => 'wpfw_accordion',
	'Icon' => 'elements/accordion/images/icon.png',
	'Order' => 1,
	'Parent' => 'ComplexElements',
	'Options' => $accordion_options
);

wpfw_add_builder_item($accordion_item);
?>