<?php
$slider_options = array();

$slider_options[] = array('ID' => 'SliderConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => 'Select the slider type effects and times');
													
$slider_options[] = array('ID' => 'SliderLayout',
													'type' => 'TopTab', 
													'name' => 'Layout',
													'title' => 'Select the slider type effects and times');													

$slider_options[] = array('ID' => 'AddSlides',
													'type' => 'TopTab', 
													'name' => 'Slides',
													'title' => 'Add slides in your slider');													
													
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderConfig',
													'field' => array('ID' => 'SliderEffect',
																					 'name' => 'Slider Effect',
																					 'type' => 'selectbox',
																					 'desc' => 'Please select the transition effect',
																					 'default' => 'fade',
																					 'options' => wpfw_slider_effects()));																							 

																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderConfig',
													'field' => array('ID' => 'SliderAutoStart',
																					 'name' => 'Auto Start',
																					 'desc' => 'Please choose if you want the slideshow to start without clicking a button',
																					 'type' => 'yesno',
																					 'default' => 'no',
																					 'options' => array('yes', 'no')));			
																					 

$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderConfig',
													'field' => array('ID' => 'SliderPauseOnHover',
																					 'name' => 'Pause On Hover',
																					 'type' => 'yesno',
																					 'desc' => 'Please choose if the slider should stop when the mouse pointer is placed over it. This options is available just for autostart sliders.',
																					 'default' => 'no',
																					 'options' => array('yes', 'no')));																							 
																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderConfig',
													'field' => array('ID' => 'SliderTimeBetweenSlides',
																					 'name' => 'Time Between Slides',
																					 'type' => 'slider',
																					 'default' => 7,
																					 'desc' => 'Please choose the time in seconds between the slides. This options is available just for autostart sliders.',
																					 'min' => 1,
																					 'max' => 20,
																					 'step' => 1
																					 ));	

$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderConfig',
													'field' => array('ID' => 'SliderEffectSpeed',
																					 'name' => 'Effects speed',
																					 'desc' => 'For accuracy the effects speed are calculated in <a href="http://en.wikipedia.org/wiki/Millisecond" target="_blank">milliseconds</a>.  This option is available just for fade and slide effects.',
																					 'type' => 'slider',
																					 'default' => 750,
																					 'min' => 50,
																					 'max' => 7000,
																					 'step' => 50
																					 ));
																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderConfig',
													'field' => array('ID' => 'SliderEffectEasing',
																					 'name' => 'Effect Easing',
																					 'desc' => 'Select the <a href="http://api.jqueryui.com/easings/" target="_blank">easing type</a> for transition effect. This option is available just for fade and slide effects.',
																					 'type' => 'selectbox',
																					 'default' => 'jswing',
																					 'options' => wpfw_easings()));																									 
																					 
																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderLayout',
													'field' => array('ID' => 'SliderShowCaption',
																					 'name' => 'Show Caption',
																					 'desc' => 'Please select if you want to show or not the slider title, text and button',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));		
																					 
																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderLayout',
													'field' => array('ID' => 'SliderShowArrows',
																					 'name' => 'Show Arrows',
																					 'type' => 'yesno',
																					 'desc' => 'Please select if you want to show previous and next slide buttons',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));		
																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderLayout',
													'field' => array('ID' => 'SliderShowArrowsOutside',
																					 'name' => 'Show arrows on outside',
																					 'type' => 'yesno',
																					 'desc' => 'Please select if you want to show next and previous buttons ouside the photos',
																					 'default' => 'no',
																					 'options' => array('yes', 'no')));																							 
																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderLayout',
													'field' => array('ID' => 'SliderPreviousIcon',
																					 'name' => 'Previous Arrow Icon',
																					 'desc' => 'Select the icon for previous slide button.',
																					 'type' => 'icon',
																					 'width' => 'half',
																					 'default' => 575));					
																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderLayout',
													'field' => array('ID' => 'SliderNextIcon',
																					 'name' => 'Next Arrow Icon',
																					 'desc' => 'Select the icon for next slide button',
																					 'type' => 'icon',
																					 'width' => 'half',
																					 'default' => 576));			
																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderLayout',
													'field' => array('ID' => 'SliderIconsSize',
																					 'name' => 'Icons size',
																					 'type' => 'slider',
																					 'default' => 20,
																					 'min' => 12,
																					 'max' => 65,
																					 'step' => 1,
																					 'desc' => 'Choose the icon size. ',
																					 ));	
																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderLayout',
													'field' => array('ID' => 'SliderIconsColor',
																					 'name' => 'Slider icons colors',
																					 'desc' => 'Please select the color for next and previous buttons',
																					 'type' => 'color',
																					 'default' => 'FFFFFF'));																							 																					 																			 

																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'SliderLayout',
													'field' => array('ID' => 'SliderShowNavigation',
																					 'name' => 'Show Navigation',
																					 'desc' => 'Please select if you want to show the navigation dots',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));																						 
																					 
$slider_element_fields = array();
$slider_element_fields[] = array('ID' => 'SliderImage',
																					 'name' => 'Slide Image',
																					 'type' => 'upload',
																					 'size' => 'false',
																					 'caption' => 'false'
																					 );
																					 
$slider_element_fields[] = array('ID' => 'SliderTitle',
																					 'name' => 'Slide Title',
																					 'type' => 'textfield');
																					 
$slider_element_fields[] = array('ID' => 'SliderSubtitle',
																					 'name' => 'Slide Text',
																					 'type' => 'textarea');
																					 
$slider_element_fields[] = array('ID' => 'SliderButton',
																					 'name' => 'Slide Button Text',
																					 'type' => 'textfield');		

$slider_element_fields[] = array('ID' => 'SliderButtonStyle',
																					 'name' => 'Button Style',
																					 'type' => 'selectbox',
																					 'default' => 'Default',
																					 'options' => array('Default'=>'Default', 'Primary'=>'Primary', 'Success'=>'Success', 'Info'=>'Info', 'Warning'=>'Warning', 'Danger'=>'Danger'));																					 																		 																					 																			 
																					 
$slider_element_fields[] = array('ID' => 'SliderLink',
																					 'name' => 'Slide Link',
																					 'rows' => 2,
																					 'type' => 'textarea');			
																					 
																					 
$slider_options[] = array('type' => 'option', 													
													'parent' => 'AddSlides',
													'field' => array('ID' => 'SliderElement',
																					 'type' => 'multipleimages',
																					 'fields' => $slider_element_fields
																					)
														);																																		 
																					 
																		 
													
													
$slider_item = array(
	'ID' => 'SliderItem',
	'Name' => 'Slider',
	'Description' => 'Add a custom photos slideshow with complex caption. You can choose from plenty of effects and layout options. For showing more than one picture on a slide, please use CAROUSEL object.',
	'PHP' => array('slider/show.php'),
	'Icon' => 'elements/slider/images/icon.png',
	'Func' => 'wpfw_slider',
	'Order' => 1,
	'Parent' => 'ComplexElements',
	'Options' => $slider_options
);

wpfw_add_builder_item($slider_item);
?>