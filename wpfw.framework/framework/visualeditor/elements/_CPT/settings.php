<?php
$args = array(
 	'public'   => true
);
$post_types = get_post_types($args, 'objects');
foreach ( $post_types as $post_type ) {
	
	if($post_type->name != 'page' && $post_type->name != 'attachment') {
	
		// left thumb ==================================
		
		${$post_type->name.'_article_left_thumb_options'} = array();
		${$post_type->name.'_article_left_thumb_options'}[] = array(
													'ID' => $post_type->name.'LeftThumbConfig',
													'type' => 'TopTab', 
													'name' => $post_type->label.' Config',
													'title' => $post_type->label.' Settings');
													
		${$post_type->name.'_article_left_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'LeftThumbConfig',
													'field' => array('ID' => $post_type->name.'LeftThumbNumberOfPosts',
																					 'name' => 'Number of posts',
																					 'type' => 'textfield',
																					 'default' => '3'));	
																					 			
		${$post_type->name.'_article_left_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'LeftThumbConfig',
													'field' => array('ID' => $post_type->name.'LeftThumbShowDate',
																					 'name' => 'Show Date',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));		

		${$post_type->name.'_article_left_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'LeftThumbConfig',
													'field' => array('ID' => $post_type->name.'LeftThumbShowMore',
																					 'name' => 'Show More Button',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));			
																					 
		${$post_type->name.'_article_left_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'LeftThumbConfig',
													'field' => array('ID' => $post_type->name.'LeftThumbOrderBy',
																					 'name' => 'Order By',
																					 'type' => 'selectbox',
																					 'default' => 'Date',
																					 'options' => array('Date'=>'Date', 'Title'=>'Time')));					
																					 
		${$post_type->name.'_article_left_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'LeftThumbConfig',
													'field' => array('ID' => $post_type->name.'LeftThumbOrderDir',
																					 'name' => 'Order Direction',
																					 'type' => 'selectbox',
																					 'default' => 'Descending',
																					 'options' => array('Descending'=>'Descending', 'Ascending'=>'Ascending')));
		
		${$post_type->name.'_article_left_thumb_item'} = array(
			'ID' => 'ArticleLeftThumb'.$post_type->name,
			'Name' => '<strong>'.$post_type->label.'</strong> <br/>Left Thumb',
			'Description' => 'Add a text with a left thumb picture',
			'PHP' => array('_CPT/show.php'),
			'Icon' => 'elements/_CPT/images/left-thumb.png',
			'Order' => 1,
			'Parent' => 'CustomPostTypes',
			'Options' => ${$post_type->name.'_article_left_thumb_options'}
		);
		
		wpfw_add_builder_item(${$post_type->name.'_article_left_thumb_item'});
		
		
		// top thumb ==================================
		
		${$post_type->name.'_article_top_thumb_options'} = array();
		
		${$post_type->name.'_article_top_thumb_options'}[] = array(
													'ID' => $post_type->name.'TopThumbConfig',
													'type' => 'TopTab', 
													'name' => $post_type->label.' Config',
													'title' => $post_type->label.' Settings');
													
		${$post_type->name.'_article_top_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'TopThumbConfig',
													'field' => array('ID' => $post_type->name.'TopThumbNumberOfPosts',
																					 'name' => 'Number of posts',
																					 'type' => 'textfield',
																					 'default' => '3'));	
																					 			
		${$post_type->name.'_article_top_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'TopThumbConfig',
													'field' => array('ID' => $post_type->name.'TopThumbShowDate',
																					 'name' => 'Show Date',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));		

		${$post_type->name.'_article_top_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'TopThumbConfig',
													'field' => array('ID' => $post_type->name.'TopThumbShowMore',
																					 'name' => 'Show More Button',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));			
																					 
		${$post_type->name.'_article_top_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'TopThumbConfig',
													'field' => array('ID' => $post_type->name.'TopThumbOrderBy',
																					 'name' => 'Order By',
																					 'type' => 'selectbox',
																					 'default' => 'Date',
																					 'options' => array('Date'=>'Date', 'Title'=>'Time')));					
																					 
		${$post_type->name.'_article_top_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'TopThumbConfig',
													'field' => array('ID' => $post_type->name.'TopThumbOrderDir',
																					 'name' => 'Order Direction',
																					 'type' => 'selectbox',
																					 'default' => 'Descending',
																					 'options' => array('Descending'=>'Descending', 'Ascending'=>'Ascending')));		
		
		${$post_type->name.'_article_top_thumb_item'} = array(
			'ID' => 'ArticleTopThumb'.$post_type->name,
			'Name' => '<strong>'.$post_type->label.'</strong> <br/>Top Thumb',
			'Description' => 'Add a text with a top thumb picture',
			'PHP' => array('_CPT/show.php'),
			'Icon' => 'elements/_CPT/images/top-thumb.png',
			'Order' => 1,
			'Parent' => 'CustomPostTypes',
			'Options' => ${$post_type->name.'_article_top_thumb_options'}
		);
		
		wpfw_add_builder_item(${$post_type->name.'_article_top_thumb_item'});		
		
		// carousel ==================================
		
		${$post_type->name.'_carousel_thumb_options'} = array();
		
		${$post_type->name.'_carousel_thumb_options'}[] = array(
													'ID' => $post_type->name.'CarouselConfig',
													'type' => 'TopTab', 
													'name' => $post_type->label.' Config',
													'title' => $post_type->label.' Settings');
													
		${$post_type->name.'_carousel_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'CarouselConfig',
													'field' => array('ID' => $post_type->name.'CarouselNumberOfPosts',
																					 'name' => 'Number of posts',
																					 'type' => 'textfield',
																					 'default' => '3'));	
																					 
		${$post_type->name.'_carousel_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'CarouselConfig',
													'field' => array('ID' => $post_type->name.'CarouselShowTitle',
																					 'name' => 'Show Title',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));		
																					 																					 			
		${$post_type->name.'_carousel_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'CarouselConfig',
													'field' => array('ID' => $post_type->name.'CarouselShowDate',
																					 'name' => 'Show Date',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));		
																					 
		${$post_type->name.'_carousel_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'CarouselConfig',
													'field' => array('ID' => $post_type->name.'CarouselOrderBy',
																					 'name' => 'Order By',
																					 'type' => 'selectbox',
																					 'default' => 'Date',
																					 'options' => array('Date'=>'Date', 'Title'=>'Time')));					
																					 
		${$post_type->name.'_carousel_thumb_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'CarouselConfig',
													'field' => array('ID' => $post_type->name.'CarouselOrderDir',
																					 'name' => 'Order Direction',
																					 'type' => 'selectbox',
																					 'default' => 'Descending',
																					 'options' => array('Descending'=>'Descending', 'Ascending'=>'Ascending')));			
																					 
		${$post_type->name.'_carousel_thumb_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'CarouselConfig',
															'field' => array('ID' => $post_type->name.'CarouselAutoStart',
																							 'name' => 'Auto Start',
																							 'type' => 'yesno',
																							 'default' => 'yes',
																							 'options' => array('yes', 'no')));
																							 
		
		${$post_type->name.'_carousel_thumb_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'CarouselConfig',
															'field' => array('ID' => $post_type->name.'CarouselPauseOnHover',
																							 'name' => 'Pause On Hover',
																							 'type' => 'yesno',
																							 'default' => 'yes',
																							 'options' => array('yes', 'no')));																							 
																							 
		${$post_type->name.'_carousel_thumb_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'CarouselConfig',
															'field' => array('ID' => $post_type->name.'CarouselTimeBetweenSlides',
																							 'name' => 'Time Between Slides',
																							 'type' => 'slider',
																							 'default' => 7,
																							 'min' => 1,
																							 'max' => 20,
																							 'step' => 1
																							 ));	
		
		${$post_type->name.'_carousel_thumb_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'CarouselConfig',
															'field' => array('ID' => $post_type->name.'CarouselEffectSpeed',
																							 'name' => 'Effects speed',
																							 'type' => 'slider',
																							 'default' => 1,
																							 'min' => 1,
																							 'max' => 7,
																							 'step' => 1
																							 ));																														 	
		
		${$post_type->name.'_carousel_thumb_item'} = array(
			'ID' => 'CarouselThumb'.$post_type->name,
			'Name' => '<strong>'.$post_type->label.'</strong> <br/>Carousel',
			'Description' => 'Add a carousel build with existing posts',
			'PHP' => array('_CPT/show.php'),
			'Icon' => 'elements/_CPT/images/carousel.png',
			'Order' => 1,
			'Parent' => 'CustomPostTypes',
			'Options' => ${$post_type->name.'_carousel_thumb_options'}
		);
		
		wpfw_add_builder_item(${$post_type->name.'_carousel_thumb_item'});			
		
		// slider ===================================
		
		${$post_type->name.'_slider_options'} = array();
		
		${$post_type->name.'_slider_options'}[] = array(
													'ID' => $post_type->name.'SliderConfig',
													'type' => 'TopTab', 
													'name' => $post_type->label.' Config',
													'title' => $post_type->label.' Settings');
													
		${$post_type->name.'_slider_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'SliderConfig',
													'field' => array('ID' => $post_type->name.'SliderNumberOfPosts',
																					 'name' => 'Number of posts',
																					 'type' => 'textfield',
																					 'default' => '3'));	
																					 
		${$post_type->name.'_slider_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'SliderConfig',
													'field' => array('ID' => $post_type->name.'SliderShowTitle',
																					 'name' => 'Show Title in Caption',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));		
																					 																					 			
		${$post_type->name.'_slider_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'SliderConfig',
													'field' => array('ID' => $post_type->name.'SliderShowExcerpt',
																					 'name' => 'Show Excerpt in Caption',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no')));		
																					 
		${$post_type->name.'_slider_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'SliderConfig',
													'field' => array('ID' => $post_type->name.'SliderOrderBy',
																					 'name' => 'Order By',
																					 'type' => 'selectbox',
																					 'default' => 'Date',
																					 'options' => array('Date'=>'Date', 'Title'=>'Time')));					
																					 
		${$post_type->name.'_slider_options'}[] = array(
													'type' => 'option', 													
													'parent' => $post_type->name.'SliderConfig',
													'field' => array('ID' => $post_type->name.'SliderOrderDir',
																					 'name' => 'Order Direction',
																					 'type' => 'selectbox',
																					 'default' => 'Descending',
																					 'options' => array('Descending'=>'Descending', 'Ascending'=>'Ascending')));		
																					 
		${$post_type->name.'_slider_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'SliderConfig',
															'field' => array('ID' => $post_type->name.'SliderType',
																							 'name' => 'Slider Type',
																							 'type' => 'selectbox',
																							 'default' => 'Slider Type',
																							 'options' => array("Anything Slider"=>"Anything Slider", "Nivo"=>"Nivo", "Parallax"=>"Parallax", "Skitter"=>"Skitter")));			
																							 
		${$post_type->name.'_slider_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'SliderConfig',
															'field' => array('ID' => $post_type->name.'SliderEffect',
																							 'name' => 'Slider Effect',
																							 'type' => 'selectbox',
																							 'default' => 'Slider Type',
																							 'options' => array("Horizontal Slide"=>"Horizontal Slide", "Vertical Slide"=>"Vertical Slide", "Fade"=>"Fade")));																							 
																							 
		${$post_type->name.'_slider_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'SliderConfig',
															'field' => array('ID' => $post_type->name.'SliderShowCaption',
																							 'name' => 'Show Caption',
																							 'type' => 'yesno',
																							 'default' => 'yes',
																							 'options' => array('yes', 'no')));		
																							 
		${$post_type->name.'_slider_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'SliderConfig',
															'field' => array('ID' => $post_type->name.'SliderAutoStart',
																							 'name' => 'Auto Start',
																							 'type' => 'yesno',
																							 'default' => 'yes',
																							 'options' => array('yes', 'no')));			
																							 
		
		${$post_type->name.'_slider_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'SliderConfig',
															'field' => array('ID' => $post_type->name.'SliderPauseOnHover',
																							 'name' => 'Pause On Hover',
																							 'type' => 'yesno',
																							 'default' => 'yes',
																							 'options' => array('yes', 'no')));																							 
																							 
		${$post_type->name.'_slider_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'SliderConfig',
															'field' => array('ID' => $post_type->name.'SliderTimeBetweenSlides',
																							 'name' => 'Time Between Slides',
																							 'type' => 'slider',
																							 'default' => 7,
																							 'min' => 1,
																							 'max' => 20,
																							 'step' => 1
																							 ));	
		
		${$post_type->name.'_slider_options'}[] = array(
															'type' => 'option', 													
															'parent' => $post_type->name.'SliderConfig',
															'field' => array('ID' => $post_type->name.'SliderEffectSpeed',
																							 'name' => 'Effects speed',
																							 'type' => 'slider',
																							 'default' => 1,
																							 'min' => 1,
																							 'max' => 7,
																							 'step' => 1
																							 ));																							 			
		
		${$post_type->name.'_slider_thumb_item'} = array(
			'ID' => 'SliderThumb'.$post_type->name,
			'Name' => '<strong>'.$post_type->label.'</strong> <br/>Slider',
			'Description' => 'Add a slider build with existing posts',
			'PHP' => array('_CPT/show.php'),
			'Icon' => 'elements/_CPT/images/slider.png',
			'Order' => 1,
			'Parent' => 'CustomPostTypes',
			'Options' => ${$post_type->name.'_slider_options'}
		);
		
		wpfw_add_builder_item(${$post_type->name.'_slider_thumb_item'});			
			
	}
	
}


?>