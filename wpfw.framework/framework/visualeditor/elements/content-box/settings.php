<?php
$content_box_options = array();

$content_box_options[] = array('ID' => 'ContentBoxConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Set-up the content box details.');
													
$content_box_options[] = array('ID' => 'ContentBoxContent',
													'type' => 'TopTab', 
													'name' => 'Content',
													'title' => 'Set-up the content box details.');													

$content_box_options[] = array('type' => 'option', 													
													'parent' => 'ContentBoxConfig',
													'field' => array('ID' => 'ContentBoxTitleTag',
																					 'name' => 'Title Tag',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the html tag for the box title. Depending on what tag you are choosing the page SEO could be affected.',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'default' => 'h4'));					

$content_box_options[] = array('type' => 'option', 													
													'parent' => 'ContentBoxConfig',
													'field' => array('ID' => 'ContentBoxType',
																					 'name' => 'Style',
																					 'type' => 'selectbox',
																					 'desc' => 'Select a style for this box',
																					 'options' => array('Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger'),
																					 'default' => 'Default'));	

$content_box_options[] = array('type' => 'option', 													
													'parent' => 'ContentBoxContent',
													'field' => array('ID' => 'ContentBoxTitle',
																					 'name' => 'Title',
																					 'desc' => 'The title appears in box header. This is an optional field',
																					 'type' => 'textfield',
																					 'default' => ''));			
																					 

$content_box_options[] = array('type' => 'option', 													
													'parent' => 'ContentBoxContent',
													'field' => array('ID' => 'ContentBoxSubTitle',
																					 'name' => 'Subtitle',
																					 'desc' => 'The subtitle appears in box header in smaller size than the title. This is an optional field',
																					 'type' => 'textarea',
																					 'default' => ''));																												 										
													
$content_box_options[] = array('type' => 'option', 													
													'parent' => 'ContentBoxContent',
													'field' => array('ID' => 'ContentBoxContent',
																					 'name' => 'Content',
																					 'desc' => 'Add the box content. This is a required field. ',
																					 'type' => 'editor',
																					 'default' => ''));
																					 
$content_box_options[] = array('type' => 'option', 													
													'parent' => 'ContentBoxContent',
													'field' => array('ID' => 'ContentBoxFooter',
																					 'name' => 'Box Footer',
																					 'desc' => 'Box footer can be used for notes or links.',
																					 'type' => 'editor',
																					 'default' => ''));																					 
																					 
		
													
$content_box_item = array(
	'ID' => 'ContentBox',
	'Name' => 'Boxed Text',
	'Description' => 'While not always necessary, sometimes you need to put your content in a box. For those situations, try the boxed text component.',
	'PHP' => array('content-box/show.php'),
	'Func' => 'wpfw_content_box',
	'Icon' => 'elements/content-box/images/icon.png',
	'Order' => 1,
	'Parent' => 'Articles',
	'Options' => $content_box_options
);

wpfw_add_builder_item($content_box_item);
?>