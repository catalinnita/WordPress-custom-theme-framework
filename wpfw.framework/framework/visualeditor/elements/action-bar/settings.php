<?php
$action_bar_options = array();

$action_bar_options[] = array('ID' => 'ActionBarConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => '');
													
$action_bar_options[] = array('ID' => 'ActionBarContent',
													'type' => 'TopTab', 
													'name' => 'Content',
													'title' => '');													
			
																					 																																		 	
																					 
$action_bar_options[] = array('type' => 'option', 													
													'parent' => 'ActionBarConfig',
													'field' => array('ID' => 'ActionBarTitleTag',
																					 'name' => 'Title Tag',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the html tag for the action bar title. Depending on what tag you are choosing the page SEO could be affected.',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'default' => 'h2'));																										 							
													
				 
$action_bar_options[] = array('type' => 'option', 													
													'parent' => 'ActionBarConfig',
													'field' => array('ID' => 'ActionBarButtonLink',
																					 'name' => 'Button URL',
																					 'desc' => 'Add the action bar button URL.',
																					 'type' => 'textfield',
																					 'default' => ''));		
																					 
$action_bar_options[] = array('type' => 'option', 													
													'parent' => 'ActionBarConfig',
													'field' => array('ID' => 'ActionBarButtonTarget',
																					 'name' => 'Button URL Target',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the link target for action bar button.',
																					 'options' => array("_self"=>"Same Window", "_blank"=>"New Window"),
																					 'default' => '_self'));			
	
$action_bar_options[] = array('type' => 'option', 													
													'parent' => 'ActionBarConfig',
													'field' => array('ID' => 'ActionBarButtonStyle',
																					 'name' => 'Button style',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the action bar button style.',
																					 'options' => array('Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger'),
																					 'default' => 'Primary'));		


$action_bar_options[] = array('type' => 'option', 													
													'parent' => 'ActionBarContent',
													'field' => array('ID' => 'ActionBarTitle',
																					 'name' => 'Title',
																					 'type' => 'textfield',
																					 'desc' => 'Optional title for action bar. The title keywords are important for page SEO.',
																					 'default' => ''));					
																					 
$action_bar_options[] = array('type' => 'option', 													
													'parent' => 'ActionBarContent',
													'field' => array('ID' => 'ActionBarContent',
																					 'name' => 'Content',
																					 'type' => 'editor',
																					 'desc' => 'Add the action bar content. You can add a simple text or custom content with images and shortcodes.',
																					 'default' => ''));
																					 

$action_bar_options[] = array('type' => 'option', 													
													'parent' => 'ActionBarContent',
													'field' => array('ID' => 'ActionBarButtonText',
																					 'name' => 'Button Text',
																					 'desc' => 'Add the action bar button text.',
																					 'type' => 'textfield',
																					 'default' => ''));																								 
													
													
$action_bar_item = array(
	'ID' => 'ActionBar',
	'Name' => 'Action Bar',
	'Description' => 'The action bar has the role to highlight a content block and attach an action to it. You can add and customize an action bar at any size with different button styles.',
	'PHP' => array('action-bar/show.php'),
	'Func' => 'wpfw_action_bar',
	'Icon' => 'elements/action-bar/images/icon.png',
	'Order' => 1,
	'Parent' => 'Articles',
	'Options' => $action_bar_options
);

wpfw_add_builder_item($action_bar_item);
?>