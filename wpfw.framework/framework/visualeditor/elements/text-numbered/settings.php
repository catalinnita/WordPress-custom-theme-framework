<?php
$text_numbered_options = array();

$text_numbered_options[] = array('ID' => 'NumberedArticleConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Add simple article content and select the options.');

$text_numbered_options[] = array('ID' => 'NumberedArticleContent',
													'type' => 'TopTab', 
													'name' => 'Content',
													'title' => 'Add simple article content and select the options.');
													
$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleContent',
													'field' => array('ID' => 'NumberedArticleTitle',
																					 'name' => 'Title',
																					 'desc' => 'Please add title for this element. This field is optional.',
																					 'type' => 'textfield',
																					 'default' => ''));													
													
$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleContent',
													'field' => array('ID' => 'NumberedArticleContent',
																					 'name' => 'Content',
																					 'desc' => 'Please add the content of this element.',
																					 'type' => 'editor',
																					 'default' => ''));
																					 

$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleContent',
													'field' => array('ID' => 'NumberedArticleNumber',
																					 'name' => 'Drop cap letter(s)',
																					 'desc' => 'Add the letter(s) for the dropcap.',
																					 'type' => 'textfield',
																					 'default' => ''));							
																					 
													
$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleConfig',
													'field' => array('ID' => 'NumberedArticleTitleTag',
																					 'name' => 'Title Tag',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the html tag for the title. Depending on what tag you are choosing the page SEO could be affected.',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'default' => 'h2'));				
																					 
$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleConfig',
													'field' => array('ID' => 'NumberedArticleDropcapSize',
																					 'name' => 'Drop cap size',
																					 'type' => 'slider',
																					 'desc' => 'Set up the drop cap size in pixels.',
																					 'default' => 40,
																					 'min' => 12,
																					 'max' => 140,
																					 'step' => 1,
																					 ));							
																					 
$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleConfig',
													'field' => array('ID' => 'NumberedArticleDropcapShape',
																					 'name' => 'Shape',
																					 'desc' => 'Select the shape of the dropcap. This should be used in combination with border and background settings. For removing completely the border and background, please choose <b>CLEAR</b> shape.',
																					 'type' => 'selectbox',
																					 'options' => array('clear'=>'Clear', 'square'=>'Square','roundcorners square'=>'Round Corners','circle'=>'Circle'),
																					 'default' => 'square'));																								 																				 																					 																 

$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleConfig',
													'field' => array('ID' => 'NumberedArticleTextColor',
																					 'name' => 'Dropcap text color',
																					 'desc' => 'Setup the dropcap text color.',
																					 'type' => 'color',
																					 'default' => 'FFFFFF'));	

$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleConfig',
													'field' => array('ID' => 'NumberedArticleBackground',
																					 'name' => 'Dropcap background color',
																					 'desc' => 'Setup the dropcap backround color. For no background just set it up to your website background color.',
																					 'type' => 'color',
																					 'default' => '666666'));		
													
			
$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleConfig',
													'field' => array('ID' => 'NumberedArticleBorderStyle',
																					 'name' => 'Dropcap Border style',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the dropcap border style. For no border please sele <b>NONE</b>',
																					 'options' => array('none'=>'None', 'solid'=>'Solid','dotted'=>'Dotted','dashed'=>'Dashed'),
																					 'default' => 'solid'));					
																					 
													
$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleConfig',
													'field' => array('ID' => 'NumberedArticleBorderWidth',
																					 'name' => 'Dropcap border width',
																					 'type' => 'slider',
																					 'desc' => 'Set up the thumbnail border width in pixels. For no border please select <b>NONE</b> border style.',
																					 'default' => 3,
																					 'min' => 1,
																					 'max' => 15,
																					 'step' => 1,
																					 ));		
																					 
$text_numbered_options[] = array('type' => 'option', 													
													'parent' => 'NumberedArticleConfig',
													'field' => array('ID' => 'NumberedArticleBorderColor',
																					 'name' => 'Dropcap border color',
																					 'type' => 'color',
																					 'desc' => 'Setup the dropcap border color.',
																					 'default' => '333333'));																							 													
													
													
$text_numbered_item = array(
	'ID' => 'TextNumbered',
	'Name' => 'Numbered Text',
	'Description' => 'Add a text with a number icon/dropcap before it. It works very well if you place one of if on each column of a row.',
	'PHP' => array('text-numbered/show.php'),
	'Icon' => 'elements/text-numbered/images/icon.png',
	'Func' => 'wpfw_text_numbered',
	'Order' => 1,
	'Parent' => 'Articles',
	'Options' => $text_numbered_options
);

wpfw_add_builder_item($text_numbered_item);
?>