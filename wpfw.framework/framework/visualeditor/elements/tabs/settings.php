<?php
$tabs_options = array();

$tabs_options[] = array('ID' => 'TabsConfig',
													'type' => 'TopTab', 
													'name' => 'Tabs Config',
													'title' => 'Select the carousel settings');

$tabs_options[] = array('ID' => 'AddTabsElements',
													'type' => 'TopTab', 
													'name' => 'Add Tabs',
													'title' => 'Add tabs content');
													
																					 
$tabs_options[] = array('type' => 'option', 													
													'parent' => 'TabsConfig',
													'field' => array('ID' => 'TabsStyle',
																					 'name' => 'Tabs Style',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the type of the tabs.',
																					 'default' => 'Tabs',
																					 'options' => array('Tabs'=>'Tabs', 'Pills'=>'Pills')));
																					 
$tabs_options[] = array('type' => 'option', 													
													'parent' => 'TabsConfig',
													'field' => array('ID' => 'TabsPosition',
																					 'name' => 'Tabs Position',
																					 'desc' => 'Select where the tabs show be placed.<br/><b>Normal</b> on top of the content<br/><b>Stacked</b> on the left side of the content.',
																					 'type' => 'selectbox',
																					 'default' => 'Normal',
																					 'options' => array('Normal'=>'Normal', 'Stacked'=>'Stacked')));
				
$tabs_options[] = array('type' => 'option', 													
													'parent' => 'TabsConfig',
													'field' => array('ID' => 'TabsActiveStyle',
																					 'name' => 'Active Tab Style',
																					 'desc' => 'Select the style of the active tab.',
																					 'type' => 'selectbox',
																					 'default' => 'None',
																					 'options' => array('None'=>'None', 'Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger')));
																					 
$tabs_options[] = array('type' => 'option', 													
													'parent' => 'TabsConfig',
													'field' => array('ID' => 'TabsJustified',
																					 'name' => 'Justified',
																					 'desc' => 'Choose if you want to equaly enlarge tabs on the full width of the column. It applies just on normal tabs position.',
																					 'type' => 'yesno',
																					 'default' => 'no',
																					 'options' => array('yes', 'no')));																						 
																					 	
$tabs_options[] = array('type' => 'option', 													
													'parent' => 'TabsConfig',
													'field' => array('ID' => 'TabsEffect',
																					 'name' => 'Effect',
																					 'desc' => 'Select the effect for hiding and showing tabs.',
																					 'type' => 'selectbox',
																					 'default' => 'fade',
																					 'options' => wpfw_effects()));																																					 																					 																					 																	 																								 																				 																			 

$tabs_options[] = array('type' => 'option', 													
													'parent' => 'TabsConfig',
													'field' => array('ID' => 'TabsEffectSpeed',
																					 'name' => 'Effects speed',
																					 'desc' => 'For accuracy the effects speed are calculated in <a href="http://en.wikipedia.org/wiki/Millisecond" target="_blank">milliseconds</a>.',
																					 'type' => 'slider',
																					 'default' => 750,
																					 'min' => 50,
																					 'max' => 7000,
																					 'step' => 50
																					 ));							
																					 
																					 
$tabs_options[] = array('type' => 'option', 													
													'parent' => 'TabsConfig',
													'field' => array('ID' => 'TabsEasing',
																					 'name' => 'Effect Easing',
																					 'desc' => 'Select the <a href="http://api.jqueryui.com/easings/" target="_blank">easing type</a> for switching tabs transition.',
																					 'type' => 'selectbox',
																					 'default' => 'jswing',
																					 'options' => wpfw_easings()));																
													
													
$tabs_element_fields = array();
$tabs_element_fields[] = array('ID' => 'TabsElementTitle',
																					 'name' => 'Tab Label',
																					 'type' => 'textfield');
																					 
$tabs_element_fields[] = array('ID' => 'TabsElementContent',
																					 'name' => 'Content',
																					 'type' => 'editor');					
																					 
$tabs_element_fields[] = array('ID' => 'TabsElementStyle',
																					 'name' => 'Element Style',
																					 'type' => 'selectbox',
																					 'default' => 'None',
																					 'options' => array('None'=>'None', 'Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger'));																					 																 
																					 
$tabs_options[] = array('type' => 'option', 													
													'parent' => 'AddTabsElements',
													'field' => array('ID' => 'TabElement',
																					 'type' => 'multiple',
																					 'defaultnr' => 3,
																					 'fields' => $tabs_element_fields
																					)
														);													
													
													
$tabs_item = array(
	'ID' => 'TabsItem',
	'Name' => 'Tabs',
	'Description' => 'Add multiple content blocks with tabs browsing. You can choose from different type and styles of tabs and customize the transition effect, duration and easing.',
	'PHP' => array('tabs/show.php'),
	'Func' => 'wpfw_tabs',
	'Icon' => 'elements/tabs/images/icon.png',
	'Order' => 1,
	'Parent' => 'ComplexElements',
	'Options' => $tabs_options
);

wpfw_add_builder_item($tabs_item);
?>