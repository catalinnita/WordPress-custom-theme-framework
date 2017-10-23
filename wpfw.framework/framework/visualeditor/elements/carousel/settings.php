<?php
$carousel_options = array();

$carousel_options[] = array('ID' => 'CarouselAnimationConfig',
													'type' => 'TopTab', 
													'name' => 'Animation',
													'title' => 'Select the carousel settings');
													
$carousel_options[] = array('ID' => 'CarouselLayoutConfig',
													'type' => 'TopTab', 
													'name' => 'Layout',
													'title' => 'Select the carousel settings');													

$carousel_options[] = array('ID' => 'CarouselAddContent',
													'type' => 'TopTab', 
													'name' => 'Content',
													'title' => 'Add carousel content');

$carousel_options[] = array('ID' => 'CarouselAddElements',
													'type' => 'TopTab', 
													'name' => 'Elements',
													'title' => 'Add carousel elements');
													
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselLayoutConfig',
													'field' => array('ID' => 'CarouselTitleTag',
																					 'name' => 'Title Tag',
																					 'desc' => 'Please select the tag that will enclose the MAIN TITLE',
																					 'type' => 'selectbox',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'default' => 'h2'));			
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselLayoutConfig',
													'field' => array('ID' => 'CarouselElementsTitleTag',
																					 'name' => 'Title Tag',
																					 'desc' => 'Please select the tag that will enclose the ELEMENTS TITLE',
																					 'type' => 'selectbox',
																					 'options' => array('h1'=>'h1','h2'=>'h2','h3'=>'h3','h4'=>'h4','h5'=>'h5','strong'=>'strong'),
																					 'default' => 'h4'));																								 		
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselLayoutConfig',
													'field' => array('ID' => 'CarouselVisibleElements',
																					 'name' => 'Visible',
																					 'desc' => 'Select how many elements should be displayed on a carousel slide. Please take in cosideration the carousel width.',
																					 'type' => 'slider',
																					 'default' => 1,
																					 'min' => 1,
																					 'max' => 8,
																					 'step' => 1
																					 ));			
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselLayoutConfig',
													'field' => array('ID' => 'CarouselPrev',
																					 'name' => 'Previous Icon',
																					 'desc' => 'Select the icon for previous button.',
																					 'type' => 'icon',
																					 'width' => 'half',
																					 'default' => 562));					
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselLayoutConfig',
													'field' => array('ID' => 'CarouselNext',
																					 'name' => 'Next Icon',
																					 'desc' => 'Select the icon for next button.',
																					 'type' => 'icon',
																					 'width' => 'half',
																					 'default' => 563));				
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselLayoutConfig',
													'field' => array('ID' => 'CarouselIconSize',
																					 'name' => 'Icon Size',
																					 'desc' => 'Select the icons size in pixels.',
																					 'type' => 'slider',
																					 'default' => 25,
																					 'min' => 20,
																					 'max' => 40,
																					 'step' => 1
																					 ));					
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselLayoutConfig',
													'field' => array('ID' => 'CarouselBoxed',
																					 'name' => 'Box Style',
																					 'type' => 'selectbox',
																					 'desc' => 'Please select the box style. For displaying no box please select None.',
																					 'default' => 'None',
																					 'options' => array('None'=>'None', 'Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger')
																					 ));																										 

																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselAnimationConfig',
													'field' => array('ID' => 'CarouselStep',
																					 'name' => 'Step',
																					 'desc' => 'Select how many elements you want to move when next or previous buttons are triggered.',
																					 'type' => 'slider',
																					 'default' => 1,
																					 'min' => 1,
																					 'max' => 8,
																					 'step' => 1
																					 ));																						 																			 
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselAnimationConfig',
													'field' => array('ID' => 'CarouselAutoStart',
																					 'name' => 'Auto Start',
																					 'desc' => 'Select if you want the carousel to start automatic.',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));																		 
																					 
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselAnimationConfig',
													'field' => array('ID' => 'CarouselWrap',
																					 'name' => 'Wrap',
																					 'desc' => '<b>None</b> - When the carousel shows the first or the last element stops<br/>
																					 						<b>Left</b> - When the carousel shows the first element and previous button is clicked it starts over from the end<br/>
																					 						<b>Right</b> - When the carousel shows the last element and the next button is clicked it starts oever from the beginning<br/>
																					 						<b>Both Ways</b> - When the carosel shows any of the first or the last element the carousel will start over<br/>
																					 						<b>Circular</b> - The carousel will have no end.',
																					 'type' => 'selectbox',
																					 'default' => 'null',
																					 'options' => array('null'=>'None', 'first'=>'Left', 'last'=>'Right', 'both'=>'Both Ways', 'circular'=>'Circular')));																							 
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselAnimationConfig',
													'field' => array('ID' => 'CarouselTimeBetweenSlides',
																					 'name' => 'Time Between Slides',
																					 'desc' => 'Select how many seconds the carousel waits between slides.',
																					 'type' => 'slider',
																					 'default' => 7,
																					 'min' => 1,
																					 'max' => 20,
																					 'step' => 1
																					 ));	
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselAnimationConfig',
													'field' => array('ID' => 'CarouselEasing',
																					 'name' => 'Effect Easing',
																					 'desc' => 'Select the <a href="http://api.jqueryui.com/easings/" target="_blank">easing type</a> for sliding effect.',
																					 'type' => 'selectbox',
																					 'default' => 'jswing',
																					 'options' => wpfw_easings()));																							 

$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselAnimationConfig',
													'field' => array('ID' => 'CarouselEffectSpeed',
																					 'name' => 'Effects speed',
																					 'desc' => 'For accuracy the effects speed are calculated in <a href="http://en.wikipedia.org/wiki/Millisecond" target="_blank">milliseconds</a>.',
																					 'type' => 'slider',
																					 'default' => 750,
																					 'min' => 50,
																					 'max' => 5000,
																					 'step' => 50
																					 ));							
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselAddContent',
													'field' => array('ID' => 'CarouselMainTitle',
																					 'name' => 'Main Title',
																					 'desc' => 'This is an optional heading title that will be placed before the carousel',
																					 'type' => 'textfield',
																					 'default' => ''));					
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselAddContent',
													'field' => array('ID' => 'CarouselMainContent',
																					 'name' => 'Main Content',
																					 'desc' => 'This is an optional text that will be placed BEFORE the carousel',
																					 'type' => 'editor',
																					 'default' => ''));			
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselAddContent',
													'field' => array('ID' => 'CarouselFooterContent',
																					 'name' => 'Footer Content',
																					 'desc' => 'This is an optional text that will be placed AFTER the carousel',
																					 'type' => 'editor',
																					 'default' => ''));																							 																				 																 																								 																				 																			 
																					 
$carousel_element_fields = array();
$carousel_element_fields[] = array('ID' => 'CarouselImage',
																					 'name' => 'Image',
																					 'type' => 'upload',
																					 'size' => 'false',
																					 'caption' => 'false');
																					 
$carousel_element_fields[] = array('ID' => 'CarouselTitle',
																					 'name' => 'Title',
																					 'type' => 'textfield');
																					 
$carousel_element_fields[] = array('ID' => 'CarouselSubtitle',
																					 'name' => 'Text',
																					 'type' => 'textarea');
																					 
$carousel_options[] = array('type' => 'option', 													
													'parent' => 'CarouselAddElements',
													'field' => array('ID' => 'CarouselElement',
																					 'type' => 'multipleimages',
																					 'defaultnr' => 5,
																					 'fields' => $carousel_element_fields
																					)
														);																											 
																		 
																		 
																		 
													
													
$carousel_item = array(
	'ID' => 'CarouselItem',
	'Name' => 'Carousel',
	'Description' => 'Add a carousel slideshow with images and text. Customize the icons and the animation using the settings below.',
	'PHP' => array('carousel/show.php'),
	'Func' => 'wpfw_carousel',
	'Icon' => 'elements/carousel/images/icon.png',
	'Order' => 1,
	'Parent' => 'ComplexElements',
	'Options' => $carousel_options
);

wpfw_add_builder_item($carousel_item);
?>