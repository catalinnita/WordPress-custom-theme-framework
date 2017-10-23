<?php
$article_top_thumb_options[] = array('ID' => 'ArticleTopThumbConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Add the text and the image for left thumb article object.');
													
$article_top_thumb_options[] = array('ID' => 'ArticleTopThumbContent',
													'type' => 'TopTab', 
													'name' => 'Content',
													'title' => 'Add the text and the image for left thumb article object.');													

		
																					 
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbConfig',
													'field' => array('ID' => 'ArticleTopThumbTitleTag',
																					 'name' => 'Title Tag',
																					 'type' => 'selectbox',
																					 'width' => 'half',
																					 'desc' => 'Select the html tag for the title. Depending on what tag you are choosing the page SEO could be affected.',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'default' => 'h2'));				
																					 
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbConfig',
													'field' => array('ID' => 'ArticleTopThumbTitleAlign',
																					 'name' => 'Title Align',
																					 'type' => 'selectbox',
																					 'width' => 'half',
																					 'desc' => 'Select how the title should be aligned.',
																					 'options' => array('left'=>'Left', 'center'=>'Center', 'right'=>'Right'),
																					 'default' => 'left'));																			 					

$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbConfig',
													'field' => array('ID' => 'ArticleTopThumbPosition',
																					 'name' => 'Position',
																					 'type' => 'selectbox',
																					 'desc' => 'Select where the thumbail should be displayed.',
																					 'options' => array('before'=>'Before Title', 'after'=>'After Title'),
																					 'default' => 'before'));																							 																			 
																					 
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbConfig',
													'field' => array('ID' => 'ArticleTopThumbShape',
																					 'name' => 'Shape',
																					 'desc' => 'Select the shape of the thumbnail. This should be used in combination with border and background settings. For removing completely the border and background, please choose <b>CLEAR</b> shape.<br/>For <b>CIRCLE</b> and <b>SQUARE</b> shapes please use <b>1:1</b> image format.',
																					 'type' => 'selectbox',
																					 'options' => array('clear'=>'Clear', 'square'=>'Square','roundcorners square'=>'Round Corners','circle'=>'Circle'),
																					 'default' => 'square'));						
																					 
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbConfig',
													'field' => array('ID' => 'ArticleTopThumbBackground',
																					 'name' => 'Thumbnail background color',
																					 'desc' => 'Select the thumbnail background color. For no background just select your website background color.>',
																					 'type' => 'color',
																					 'default' => '666666'));		
													
			
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbConfig',
													'field' => array('ID' => 'ArticleTopThumbBorderStyle',
																					 'name' => 'Thumbnail border style',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the thumbnail border style. For no border please sele <b>NONE</b>',
																					 'options' => array('none'=>'None', 'solid'=>'Solid','dotted'=>'Dotted','dashed'=>'Dashed'),
																					 'default' => 'solid'));					
																					 
													
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbConfig',
													'field' => array('ID' => 'ArticleTopThumbBorderWidth',
																					 'name' => 'Thumbnail border width',
																					 'type' => 'slider',
																					 'desc' => 'Set up the thumbnail border width in pixels. For no border please select <b>NONE</b> border style.',
																					 'default' => 3,
																					 'min' => 1,
																					 'max' => 15,
																					 'step' => 1,
																					 ));										
																					 
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbConfig',
													'field' => array('ID' => 'ArticleTopThumbBorderColor',
																					 'name' => 'Thumbnail border color',
																					 'desc' => 'Select the thumbnail border color.',
																					 'type' => 'color',
																					 'default' => '333333'));																							 																	 
																					 
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbContent',
													'field' => array('ID' => 'ArticleTopThumbTitle',
																					 'name' => 'Title',
																					 'desc' => 'Please add title for this element. This field is optional.',
																					 'type' => 'textfield',
																					 'default' => ''));																								 																					 															 								
													
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbContent',
													'field' => array('ID' => 'ArticleTopThumbContent',
																					 'name' => 'Content',
																					 'desc' => 'Please add the content of this element.',
																					 'type' => 'editor',
																					 'default' => ''));
																					 

$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbContent',
													'field' => array('ID' => 'ArticleTopThumbPic',
																					 'name' => 'Picture',
																					 'type' => 'upload',
																					 'desc' => 'Upload an image. After the image will be uploaded the setting will be displayed. If you want to replace the image just upload another one.',
																					 'size_min' => 25,
																					 'size_max' => 100,
																					 'size_default' => 100,
																					 'format_default' => '1-1'
																					 ));						
																				
																					 
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbContent',
													'field' => array('ID' => 'ArticleTopThumbButtonText',
																					 'name' => 'Button Text',
																					 'desc' => 'Add the text for the options button. You should also add a link, otherwise the button will not be displayed.',
																					 'type' => 'textfield',
																					 'default' => ''));																							 
																					 																	 
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbContent',
													'field' => array('ID' => 'ArticleTopThumbLink',
																					 'name' => 'Link URL',
																					 'desc' => 'The link URL will be used for the optional button and the thumbnail link.',
																					 'type' => 'textfield',
																					 'default' => ''));		
																					 
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbConfig',
													'field' => array('ID' => 'ArticleTopThumbButtonStyle',
																					 'name' => 'Button style',
																					 'type' => 'selectbox',
																					 'desc' => 'Select the button style.',
																					 'options' => array('Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger'),
																					 'default' => 'Default'));																						 
																					 
$article_top_thumb_options[] = array('type' => 'option', 													
													'parent' => 'ArticleTopThumbConfig',
													'field' => array('ID' => 'ArticleTopThumbTarget',
																					 'name' => 'URL Target',
																					 'desc' => 'Select the link target for action bar button.',
																					 'type' => 'selectbox',
																					 'options' => array("_self"=>"Same Window", "_blank"=>"New Window"),
																					 'default' => '_self'));																						 
													
													
$article_top_thumb_item = array(
	'ID' => 'ArticleTopThumb',
	'Name' => 'Top Thumb Text',
	'Description' => 'Add a text block with title, thumbail on top and an optional button in different styles. If you want to add a text block with a thumbnail on left or right please use Left Thumb Text element.',
	'PHP' => array('text-top-thumb/show.php'),
	'Func' => 'wpfw_article_top_thumb',
	'Icon' => 'elements/text-top-thumb/images/icon.png',
	'Order' => 1,
	'Parent' => 'Articles',
	'Options' => $article_top_thumb_options
);

wpfw_add_builder_item($article_top_thumb_item);
?>