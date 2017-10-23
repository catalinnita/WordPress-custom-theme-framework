<?php
$text_simple_options = array();

$text_simple_options[] = array('ID' => 'SimpleArticleConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Add simple article content.');
													
$text_simple_options[] = array('ID' => 'SimpleArticleContent',
													'type' => 'TopTab', 
													'name' => 'Content',
													'title' => 'Add simple article content.');													
													
$text_simple_options[] = array('type' => 'option', 													
													'parent' => 'SimpleArticleContent',
													'field' => array('ID' => 'SimpleArticleTitle',
																					 'name' => 'Title',
																					 'desc' => 'Please add the article title. This field is optional.',
																					 'type' => 'textfield',
																					 'default' => ''));													
																					 
$text_simple_options[] = array('type' => 'option', 													
													'parent' => 'SimpleArticleConfig',
													'field' => array('ID' => 'SimpleArticleTitleTag',
																					 'name' => 'Title Tag',
																					 'type' => 'selectbox',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'desc' => 'Select the html tag for the title. Depending on what tag you are choosing the page SEO could be affected.',
																					 'default' => 'h2'));																											 
													
$text_simple_options[] = array('type' => 'option', 													
													'parent' => 'SimpleArticleContent',
													'field' => array('ID' => 'SimpleArticleContent',
																					 'name' => 'Content',
																					 'type' => 'editor',
																					 'desc' => 'Please add the main content.',
																					 'default' => ''));
													
													
$text_simple_item = array(
	'ID' => 'TextSimple',
	'Name' => 'Simple Text',
	'Description' => 'Add a simple text using the TinyMCE editor. This is best choice for small columns of text with simple elements like default lists or inline images.',
	'PHP' => array('text-simple/show.php'),
	'Func' => 'wpfw_text_simple',
	'Icon' => 'elements/text-simple/images/icon.png',
	'Order' => 1,
	'Parent' => 'Articles',
	'Options' => $text_simple_options
);

wpfw_add_builder_item($text_simple_item);
?>