<?php
$text_iconized_options = array();

$text_iconized_options[] = array('ID' => 'IconizedArticleConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Add simple article content and select the options.');
													
$text_iconized_options[] = array('ID' => 'IconizedArticleContent',
													'type' => 'TopTab', 
													'name' => 'Content',
													'title' => 'Add simple article content and select the options.');													

$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleContent',
													'field' => array('ID' => 'IconizedArticleTitle',
																					 'name' => 'Title',
																					 'type' => 'textfield',
																					 'desc' => 'Please add title for this element. This field is optional.',
																					 'default' => ''));								
																					 
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleConfig',
													'field' => array('ID' => 'IconizedArticleTitleTag',
																					 'name' => 'Title Tag',
																					 'type' => 'selectbox',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'desc' => 'Select the html tag for the title. Depending on what tag you are choosing the page SEO could be affected.',
																					 'default' => 'h2'));			
																					 
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleConfig',
													'field' => array('ID' => 'IconizedArticleTitleAlign',
																					 'name' => 'Title Align',
																					 'type' => 'selectbox',
																					 'desc' => 'Select how the icon should be aligned.',
																					 'options' => array('left'=>'Left', 'center'=>'Center', 'right'=>'Right'),
																					 'default' => 'left'));																								 																					 					
													
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleContent',
													'field' => array('ID' => 'IconizedArticleContent',
																					 'name' => 'Content',
																					 'desc' => 'Please add the content of this element.',
																					 'type' => 'editor',
																					 'default' => ''));
																					 

$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleContent',
													'field' => array('ID' => 'IconizedIcon',
																					 'name' => 'Icon',
																					 'desc' => 'Please select an icon.',
																					 'type' => 'icon',
																					 'default' => ''));		
																					 
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleConfig',
													'field' => array('ID' => 'IconizedArticleAlign',
																					 'name' => 'Align',
																					 'type' => 'selectbox',
																					 'desc' => 'Select how the icon should be aligned.',
																					 'options' => array('left'=>'Left', 'center'=>'Center', 'right'=>'Right'),
																					 'default' => 'left'));																								 
																					 
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleConfig',
													'field' => array('ID' => 'IconizedArticleDropcapShape',
																					 'name' => 'Shape',
																					 'desc' => 'Select the shape of the dropcap. This should be used in combination with border and background settings. For removing completely the border and background, please choose <b>CLEAR</b> shape.',
																					 'type' => 'selectbox',
																					 'options' => array('clear'=>'Clear', 'square'=>'Square','roundcorners square'=>'Round Corners','circle'=>'Circle'),
																					 'default' => 'square'));																						 		
																					 																					 
																					 
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleConfig',
													'field' => array('ID' => 'IconizedArticleSize',
																					 'name' => 'Icon size',
																					 'type' => 'slider',
																					 'desc' => 'Set up the icons size in pixels.',
																					 'default' => 42,
																					 'min' => 12,
																					 'max' => 140,
																					 'step' => 1,
																					 'desc' => 'Choose the icon size. ',
																					 ));														
																					 
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleConfig',
													'field' => array('ID' => 'IconizedArticleColor',
																					 'name' => 'Icon Color',
																					 'desc' => 'Pick the icon color.',
																					 'type' => 'color',
																					 'default' => 'FFFFFF'));							
																					 
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleConfig',
													'field' => array('ID' => 'IconizedArticleBackground',
																					 'name' => 'Background color',
																					 'desc' => 'Setup the icon backround color. For no background just set it up to your website background color.',
																					 'type' => 'color',
																					 'default' => '666666'));		
													
			
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleConfig',
													'field' => array('ID' => 'IconizedArticleBorderStyle',
																					 'name' => 'Border style',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the icon border style. For no border please sele <b>NONE</b>',
																					 'options' => array('none'=>'None', 'solid'=>'Solid','dotted'=>'Dotted','dashed'=>'Dashed'),
																					 'default' => 'solid'));					
																					 
													
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleConfig',
													'field' => array('ID' => 'IconizedArticleBorderWidth',
																					 'name' => 'Border width',
																					 'type' => 'slider',
																					 'desc' => 'Set up the thumbnail border width in pixels. For no border please select <b>NONE</b> border style.',
																					 'default' => 3,
																					 'min' => 1,
																					 'max' => 15,
																					 'step' => 1,
																					 ));																							 																	 																		 
													
																					 
$text_iconized_options[] = array('type' => 'option', 													
													'parent' => 'IconizedArticleConfig',
													'field' => array('ID' => 'IconizedArticleBorderColor',
																					 'name' => 'Border color',
																					 'desc' => 'Setup the icon border color.',
																					 'type' => 'color',
																					 'default' => '333333'));															
													
													
$text_iconized_item = array(
	'ID' => 'TextIconized',
	'Name' => 'Iconized Text',
	'Description' => 'Add a text with an icon/dropcap before it. It works very well if you place one of if on each column of a row.',
	'PHP' => array('text-iconized/show.php'),
	'Func' => 'wpfw_text_iconized',
	'Icon' => 'elements/text-iconized/images/icon.png',
	'Order' => 1,
	'Parent' => 'Articles',
	'Options' => $text_iconized_options
);

wpfw_add_builder_item($text_iconized_item);
?>