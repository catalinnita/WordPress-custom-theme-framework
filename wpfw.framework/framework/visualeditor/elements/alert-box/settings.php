<?php
$alert_box_options = array();

$alert_box_options[] = array('ID' => 'AlertBoxConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Set-up the alert box details.');
													
$alert_box_options[] = array('ID' => 'AlertBoxContent',
													'type' => 'TopTab', 
													'name' => 'Content',
													'title' => 'Set-up the alert box details.');													
							
$alert_box_options[] = array('type' => 'option', 													
													'parent' => 'AlertBoxConfig',
													'field' => array('ID' => 'AlertBoxTitleTag',
																					 'name' => 'Title Tag',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the html tag for the alert box title. Depending on what tag you are choosing the page SEO could be affected.',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'default' => 'strong'));																					
																				 
$alert_box_options[] = array('type' => 'option', 													
													'parent' => 'AlertBoxConfig',
													'field' => array('ID' => 'AlertBoxType',
																					 'name' => 'Alert Type',
																					 'type' => 'selectbox',
																					 'desc' => 'Choose the style for the whole alert box.',
																					 'options' => array('Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger'),
																					 'default' => 'Default'));									

$alert_box_options[] = array('type' => 'option', 													
													'parent' => 'AlertBoxConfig',
													'field' => array('ID' => 'AlertBoxIcon',
																					 'name' => 'Icon',
																					 'type' => 'icon',
																					 'desc' => 'Choose the optional icon from almost 2000 font icons.',
																					 'default' => ''));
																					 
$alert_box_options[] = array('type' => 'option', 													
													'parent' => 'AlertBoxConfig',
													'field' => array('ID' => 'AlertBoxIconSize',
																					 'name' => 'Icon size',
																					 'type' => 'slider',
																					 'default' => 24,
																					 'min' => 12,
																					 'max' => 75,
																					 'step' => 1,
																					 'desc' => 'Choose the icon size. For less text adjust it to a smaller size, for more text increase the icons size.',
																					 ));																						 
																					 
$alert_box_options[] = array('type' => 'option', 													
													'parent' => 'AlertBoxConfig',
													'field' => array('ID' => 'AlertBoxClose',
																					 'name' => 'Show close button',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'desc' => 'Choose if you want to display or not a close X for this alert box',
																					 'options' => array('yes', 'no')));																							 			

$alert_box_options[] = array('type' => 'option', 													
													'parent' => 'AlertBoxContent',
													'field' => array('ID' => 'AlertBoxTitle',
																					 'name' => 'Title',
																					 'desc' => 'Add an optional title for this alert box',
																					 'type' => 'textfield',
																					 'default' => ''));

$alert_box_options[] = array('type' => 'option', 													
													'parent' => 'AlertBoxContent',
													'field' => array('ID' => 'AlertBoxContent',
																					 'name' => 'Text',
																					 'desc' => 'Add the alert box content',
																					 'type' => 'editor',
																					 'default' => ''));
																					 
			
											
													
$alert_box_item = array(
	'ID' => 'AlertBox',
	'Name' => 'Alert Box',
	'Description' => 'Provide contextual feedback messages for typical user actions with the handful of available and flexible alert messages.',
	'PHP' => array('alert-box/show.php'),
	'Func' => 'wpfw_alert_box',
	'Icon' => 'elements/alert-box/images/icon.png',
	'Order' => 1,
	'Parent' => 'Articles',
	'Options' => $alert_box_options
);

wpfw_add_builder_item($alert_box_item);
?>