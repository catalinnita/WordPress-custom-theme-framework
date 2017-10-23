<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$theme = wp_get_theme();
	$themename = $theme['Name'];
	$optionsframework_settings = get_option('optionsframework');
	
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	global $wpdb;
	// Multicheck Array
	$multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
						$patterns = array(
							"bg.png" => "bg.png",
							"bg1.png" => "bg1.png",
							"bg2.png" => "bg2.png",
							"bg3.png" => "bg3.png",
							"bg4.png" => "bg4.png",
							"bg5.png" => "bg5.png",
							"bg6.png" => "bg6.png",
							"bg7.png" => "bg7.png",
							"bg8.png" => "bg8.png",
							"bg9.png" => "bg9.png",
							"bg10.png" => "bg10.png",
							"bg11.png" => "bg11.png",
							"bg12.png" => "bg12.png",
							"bg13.png" => "bg13.png",
							"none" => "bg-none.png",
						);			
						
	$anything_slider_type = array("horizontal" => "horizontal slide", "vertical" => "vertical slide", "fade" => "fade");
	$parallax_slider_type = array("left" => "slide left", "right" => "slide right", "top" => "slide top", "bottom" => "slide bottom");
	$nivo_slider_type = array(
		"sliceDown" => "sliceDown",
		"sliceDownLeft" => "sliceDownLeft",
		"sliceUp" => "sliceUp",
		"sliceUpLeft" => "sliceUpLeft",
		"sliceUpDown" => "sliceUpDown",
		"sliceUpDownLeft" => "sliceUpDownLeft",
		"fold" => "fold",
		"fade" => "fade",
		"random" => "random",
		"slideInRight" => "slideInRight",
		"slideInLeft" => "slideInLeft",
		"boxRandom" => "boxRandom",
		"boxRain" => "boxRain",
		"boxRainReverse" => "boxRainReverse",
		"boxRainGrow" => "boxRainGrow",
		"boxRainGrowReverse" => "boxRainGrowReverse"
	);
	$skitter_slider_type = array(
		"cube" => "cube", 
		"cubeRandom" => "cubeRandom", 
		"block" => "block", 
		"cubeStop" => "cubeStop", 
		"cubeHide" => "cubeHide", 
		"cubeSize" => "cubeSize", 
		"horizontal" => "horizontal", 
		"showBars" => "showBars", 
		"showBarsRandom" => "showBarsRandom", 
		"tube" => "tube", 
		"fade" => "fade", 
		"fadeFour" => "fadeFour", 
		"paralell" => "paralell", 
		"blind" => "blind", 
		"blindHeight" => "blindHeight", 
		"blindWidth" => "blindWidth", 
		"directionTop" => "directionTop", 
		"directionBottom" => "directionBottom", 
		"directionRight" => "directionRight", 
		"directionLeft" => "directionLeft", 
		"cubeStopRandom" => "cubeStopRandom", 
		"cubeSpread" => "cubeSpread", 
		"cubeJelly" => "cubeJelly", 
		"glassCube" => "glassCube", 
		"glassBlock" => "glassBlock", 
		"circles" => "circles", 
		"circlesInside" => "circlesInside", 
		"circlesRotate" => "circlesRotate", 
		"cubeShow" => "cubeShow", 
		"upBars" => "upBars", 
		"downBars" => "downBars", 
		"hideBars" => "hideBars", 
		"swapBars" => "swapBars", 
		"swapBarsBack" => "swapBarsBack", 
		"swapBlocks" => "swapBlocks", 
		"cut" => "cut", 
		"random" => "random", 
		"randomSmart" => "randomSmart"
	);
	$slider_autoplay = array("false"=>"no", "true"=>"yes");

	$yesno = array("yes" => "yes", "no" => "no");


	// Pull all testimonials into an array
	$test = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = 'tests' AND post_status = 'publish'");
	$testimonials = array();
	$testimonials[0] = 'none';
	foreach($test as $t) {
		$testimonials[$t->ID] = $t->post_title;
	}
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}


	// *** PLUGINS ****
	// Pull all contact forms - if wpfw_contact_forms is installed
	if(function_exists("contact_form")) {
		$formsdb = $wpdb->get_results("SELECT * FROM es_forms");
		$forms_list = array();
		foreach($formsdb as $form_db) {
			$forms_list[$form_db->Name] = $form_db->Name;
		}	
	}
	
	// Pull all galleries into an array - if wpfw_image_galleries is installed
	if(function_exists("wpfw_get_all_galleries")) {
		$gall = $wpdb->get_results("SELECT * FROM es_photo_galleries");
		$galleries = array();
		foreach($gall as $gal) {
			$galleries[$gal->ID] = $gal->GalleryTitle;
		}	
	}
	
	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/images/';
		
	
	
		
	$options = array();
		
	// GENERAL
	$options[] = array( "name" => __("General", "wpfw"),
						"type" => "leftheading",
						"icon" => "dashicons-performance");			
			
			
			// LOGOS
			$options[] = array( "name" => __("Logos", "wpfw"),
								"type" => "heading",
								"parent" => __("General", "wpfw"));
		
					$options[] = array( "name" => __("Upload Logo", "wpfw"),
										"desc" => "Uploading an image logo you will replace the <a href='options-general.php'>Site Title</a> option. Leaving this field empty you can show the Site Title as text logo. The logo font can be updated under typography tab. ",
										"id" => "logo",
										"std" => "",
										"type" => "upload",
										"parent" => __("General", "wpfw"));
										
					$options[] = array( "name" => __("Upload Footer Logo", "wpfw"),
										"desc" => "Ideal size is 208x80px",
										"id" => "footerlogo",
										"std" => "",
										"type" => "upload",
										"parent" => __("General", "wpfw"));										

					$options[] = array( "name" => __("Upload Favicon", "wpfw"),
										"desc" => __("16x16px .ico file", "wpfw"),
										"id" => "favicon",
										"std" =>  get_template_directory_uri()."/images/blank.png",
										"type" => "upload",
										"parent" => __("General", "wpfw"));
										
			// HEADER		
			$options[] = array( "name" => __("Header", "wpfw"),
								"type" => "heading",
								"parent" => __("General", "wpfw"));																		
								
					$options[] = array( "name" => __("Phone Number", "wpfw"),
										"desc" => "",
										"id" => "phonenumber",
										"std" => "(888) 555-8888",
										"type" => "textarea",
										"parent" => __("General", "wpfw"));			
										
					$options[] = array( "name" => __("Header Padding Top", "wpfw"),
										"desc" => "",
										"id" => "header_top",
										"std" => "20px",
										"type" => "text",
										"parent" => __("General", "wpfw"));		
										
					$options[] = array( "name" => __("Header Padding Bottom", "wpfw"),
										"desc" => "",
										"id" => "header_bottom",
										"std" => "20px",
										"type" => "text",
										"parent" => __("General", "wpfw"));												
										
					$options[] = array( "name" => __("Website Description Left Space", "wpfw"),
										"desc" => "",
										"id" => "website_desc_left",
										"std" => "4px",
										"type" => "text",
										"parent" => __("General", "wpfw"));		
					$options[] = array( "name" => __("Website Description Top Space", "wpfw"),
										"desc" => "",
										"id" => "website_desc_top",
										"std" => "106px",
										"type" => "text",
										"parent" => __("General", "wpfw"));							
										
					$options[] = array( "name" => __("Header social icons shape", "wpfw"),
										"desc" => "",
										"id" => "socialiconsstyle",
										"std" => "blank",
										"type" => "select",
										"options" => array('blank' => 'No style', 'square' => 'Square', 'round_corners' => 'Round Corners', 'circle' => 'Circle'),
										"img" => "",
										"parent" => __("General", "wpfw"));								
										
					$options[] = array( "name" => __("Header social icons border size", "wpfw"),
										"desc" => "",
										"id" => "socialiconsborder",
										"std" => "0px",
										"type" => "text",
										"parent" => __("General", "wpfw"));					
																																															
					$options[] = array( "name" => __("Header social icons border color", "wpfw"),
										"desc" => "",
										"id" => "socialiconsbordercolor",
										"std" => "#cccccc",
										"type" => "color",
										"parent" => __("General", "wpfw"));			
										
					$options[] = array( "name" => __("Header social icons background color", "wpfw"),
										"desc" => "",
										"id" => "socialiconsbackgroundcolor",
										"std" => "#efefef",
										"type" => "color",
										"parent" => __("General", "wpfw"));		
										
					$options[] = array( "name" => __("Header social icons icon color", "wpfw"),
										"desc" => "",
										"id" => "socialiconscolor",
										"std" => "#666666",
										"type" => "color",
										"parent" => __("General", "wpfw"));						
										
					$options[] = array( "name" => __("Header social icons size", "wpfw"),
										"desc" => "",
										"id" => "socialiconssize",
										"std" => "31px",
										"type" => "text",
										"parent" => __("General", "wpfw"));							
										
										
					$options[] = array( "name" => __("Header social icons spacing", "wpfw"),
										"desc" => "",
										"id" => "socialiconspadding",
										"std" => "2px",
										"type" => "text",
										"parent" => __("General", "wpfw"));								
										
																																															
					$options[] = array( "name" => __("Header social icons hover border color", "wpfw"),
										"desc" => "",
										"id" => "socialiconsbordercolorh",
										"std" => "#666666",
										"type" => "color",
										"parent" => __("General", "wpfw"));			
										
					$options[] = array( "name" => __("Header social icons hover background color", "wpfw"),
										"desc" => "",
										"id" => "socialiconsbackgroundcolorh",
										"std" => "#ffffff",
										"type" => "color",
										"parent" => __("General", "wpfw"));		
										
					$options[] = array( "name" => __("Header social icons hover icon color", "wpfw"),
										"desc" => "",
										"id" => "socialiconscolorh",
										"std" => "#333333",
										"type" => "color",
										"parent" => __("General", "wpfw"));											
										
																														
								
			// FOOTER					
			$options[] = array( "name" => __("Footer", "wpfw"),
								"type" => "heading",
								"parent" => __("General", "wpfw"));																		
								
					$options[] = array( "name" => __("Footer copyright text", "wpfw"),
										"desc" => "",
										"id" => "copyright",
										"std" => "&copy; All Rights Reserved PWT",
										"type" => "textarea",
										"parent" => __("General", "wpfw"));		
										
	/* 
	//HOMEPAGE										
	$options[] = array( "name" => __("Homepage", "wpfw"),
						"type" => "leftheading",
						"icon" => "dashicons-admin-home");												
								
			// SHOW/HIDE ELEMENTS
			$options[] = array( "name" => __("Show/Hide Elements", "wpfw"),
								"type" => "heading",
								"parent" => __("Homepage", "wpfw"));									
								
					$options[] = array( "name" => __("Show homepage slider", "wpfw"),
										"desc" => "",
										"id" => "homeslidershow",
										"std" => "yes",
										"type" => "select",
										"options" => $yesno,
										"img" => "",
										"parent" => __("Homepage", "wpfw"));		
										
					$options[] = array( "name" => __("Show homepage articles", "wpfw"),
										"desc" => "",
										"id" => "homearticlesshow",
										"std" => "yes",
										"type" => "select",
										"options" => $yesno,
										"img" => "",
										"parent" => __("Homepage", "wpfw"));												
										
					$options[] = array( "name" => __("Show homepage call to action bar", "wpfw"),
										"desc" => "",
										"id" => "homecalltoactionshow",
										"std" => "yes",
										"type" => "select",
										"options" => $yesno,
										"img" => "",
										"parent" => __("Homepage", "wpfw"));														

					$options[] = array( "name" => __("Show homepage custom article", "wpfw"),
										"desc" => "",
										"id" => "homearticleshow",
										"std" => "yes",
										"type" => "select",
										"options" => $yesno,
										"img" => "",
										"parent" => __("Homepage", "wpfw"));	
										
					$options[] = array( "name" => __("Show homepage blog posts", "wpfw"),
										"desc" => "",
										"id" => "homeblogshow",
										"std" => "yes",
										"type" => "select",
										"options" => $yesno,
										"img" => "",
										"parent" => __("Homepage", "wpfw"));																										
										
			// SLIDER							
			$options[] = array( "name" => __("Slider", "wpfw"),
								"type" => "heading",
								"parent" => __("Homepage", "wpfw"));	
								
						
						$options[] = array( "name" => __("Slider type", "wpfw"),
										"desc" => "",
										"id" => "homeslidertype",
										"std" => "Anything Slider",
										"type" => "select",
										"options" => array("Anything Slider" => "Anything Slider", "Parallax" => "Parallax", "Nivo" => "Nivo", "Skitter" => "Skitter"),
										"parent" => __("Homepage", "wpfw"));							
					
					$options[] = array( "name" => __("Show Slider Caption?", "wpfw"),
										"desc" => "",
										"id" => "hoemslidercaption",
										"std" => "fade",
										"type" => "select",
										"options" => $yesno,
										"parent" => __("Homepage", "wpfw"));		
					
					$options[] = array( "name" => __("Slider effect", "wpfw"),
										"desc" => "",
										"id" => "anything_homestype",
										"std" => "fade",
										"type" => "select",
										"options" => $anything_slider_type,
										"parent" => __("Homepage", "wpfw"));			
								
					$options[] = array( "name" => __("Slider effect", "wpfw"),
										"desc" => "",
										"id" => "parallax_homestype",
										"std" => "vertical",
										"type" => "select",
										"options" => $parallax_slider_type,
										"parent" => __("Homepage", "wpfw"));			
										
					$options[] = array( "name" => __("Slider effect", "wpfw"),
										"desc" => "",
										"id" => "nivo_homestype",
										"std" => "random",
										"type" => "select",
										"options" => $nivo_slider_type,
										"parent" => __("Homepage", "wpfw"));			
										
					$options[] = array( "name" => __("Slider effect", "wpfw"),
										"desc" => "",
										"id" => "skitter_homestype",
										"std" => "random",
										"type" => "select",
										"options" => $skitter_slider_type,
										"parent" => __("Homepage", "wpfw"));																
							
										
					$options[] = array( "name" => __("Auto play", "wpfw"),
										"desc" => "",
										"id" => "homesautoplay",
										"std" => "false",
										"type" => "select",
										"options" => $slider_autoplay,
										"parent" => __("Homepage", "wpfw"));					
										
					$options[] = array( "name" => __("Pause on hover", "wpfw"),
										"desc" => "For auto play only.",
										"id" => "homespause",
										"std" => "false",
										"type" => "select",
										"options" => $slider_autoplay,
										"parent" => __("Homepage", "wpfw"));	
										
					$options[] = array( "name" => __("Time between slides", "wpfw"),
										"desc" => __("in seconds. For auto play only.", "wpfw"),
										"id" => "homesslidestime",
										"std" => "7",
										"type" => "text",
										"parent" => __("Homepage", "wpfw"));										
								
										
					$options[] = array( "name" => __("Slider effects time", "wpfw"),
										"desc" => __("in seconds", "wpfw"),
										"id" => "homeslidertime",
										"std" => "1",
										"type" => "text",
										"parent" => __("Homepage", "wpfw"));													
								
							
			// ACTION BAR					
			$options[] = array( "name" => __("Action Bar Content", "wpfw"),
								"type" => "heading",
								"parent" => __("Homepage", "wpfw"));			
								
					$options[] = array( "name" => __("Action Bar Title", "wpfw"),
										"desc" => "",
										"id" => "abtitle",
										"std" => "Enter here your action bar headline title",
										"type" => "textarea",
										"parent" => __("Homepage", "wpfw"));									
								
					$options[] = array( "name" => __("Action Bar Text", "wpfw"),
										"desc" => "",
										"id" => "abtext",
										"std" => "Proin mollis libero vitae tortor hendrerit porta. In hac habitasse platea dictumst. Cras tincidunt ullamcorper turpis a rhoncus. Mauris bibendum fermentum leo, sit amet interdum sem faucibus consequat.",
										"type" => "textarea",
										"parent" => __("Homepage", "wpfw"));									
										
					$options[] = array( "name" => __("Action Bar Button Text", "wpfw"),
										"desc" => "",
										"id" => "abbuttontext",
										"std" => "Read More",
										"type" => "text",
										"parent" => __("Homepage", "wpfw"));		
										
										
					$options[] = array( "name" => __("Action Bar Button Link", "wpfw"),
										"desc" => "",
										"id" => "abbuttonlink",
										"std" => "#",
										"type" => "text",
										"parent" => __("Homepage", "wpfw"));																												
							
			// CUSTOM ARTICLE					
			$options[] = array( "name" => __("Custom Article", "wpfw"),
								"type" => "heading",
								"parent" => __("Homepage", "wpfw"));		
								
					$options[] = array( "name" => __("Homepage featured article", "wpfw"),
										"desc" => "For showing a wordpress page please select page and enter the id of the page in next field. <br/><br/>For custom content please select custom text and fill in all the other fields below.",
										"id" => "fatype",
										"std" => "custom text",
										"type" => "select",
										"options" => array("page" => "page", "custom text" => "custom text", "image" => "image", "HTML code" => "HTML code"),
										"parent" => __("Homepage", "wpfw"));			
	
					$options[] = array( "name" => __("About page ID", "wpfw"),
										"desc" => "",
										"id" => "about",
										"std" => "",
										"type" => "select",
										"options" => $options_pages,
										"parent" => __("Homepage", "wpfw"));
						
					$options[] = array( "name" => __("Custom text title", "wpfw"),
										"desc" => "",
										"id" => "cttitle",
										"std" => "Homepage article title",
										"type" => "text",
										"parent" => __("Homepage", "wpfw"));					
										
					$options[] = array( "name" => __("Custom text", "wpfw"),
										"desc" => "",
										"id" => "cttext",
										"std" => "Nunc a nibh vel justo placerat sollicitudin. Mauris pellentesque sed erat sit amet fermentum. Donec laoreet neque non sollicitudin mollis. Nunc at ante felis. In dignissim nisl at congue euismod. Nunc ac pellentesque mi, ut porta urna. Sed condimentum purus sodales lacus vehicula, in commodo nisi posuere. Suspendisse sed eros eu justo mollis semper id at augue. Nullam quis turpis in est interdum pretium ac nec quam. Duis a fringilla eros, quis tincidunt sapien.
															Curabitur tincidunt elit sed cursus scelerisque. Nullam mauris augue, consequat nec libero ut, ornare iaculis lacus. Cras sit amet nisl enim. Sed vestibulum eros quis commodo suscipit. Aliquam tristique felis ac vestibulum lacinia. Mauris dignissim sed nibh non dictum. In ultrices odio nec nisl volutpat gravida.",
										"type" => "textarea",
										"parent" => __("Homepage", "wpfw"));				
										
					$options[] = array( "name" => __("Link text", "wpfw"),
										"desc" => "",
										"id" => "ctlinktext",
										"std" => "Read More",
										"type" => "text",
										"parent" => __("Homepage", "wpfw"));				
										
					$options[] = array( "name" => __("Link URL", "wpfw"),
										"desc" => "",
										"id" => "ctlinkurl",
										"std" => "#",
										"type" => "text",
										"parent" => __("Homepage", "wpfw"));				
										
					$options[] = array( "name" => __("Featured article image", "wpfw"),
										"desc" => "The image will NOT be resized",
										"id" => "ctpic",
										"std" => "",
										"type" => "upload",
										"parent" => __("Homepage", "wpfw"));				

						$options[] = array( "name" => __("Featured image align", "wpfw"),
										"desc" => "Select none if you want to display just the image",
										"id" => "fatalign",
										"std" => "page",
										"type" => "select",
										"options" => array("none" => "none", "left" => "left", "right" => "right"),
										"parent" => __("Homepage", "wpfw"));			
										
					$options[] = array( "name" => __("Custom HTML Code", "wpfw"),
										"desc" => "",
										"id" => "htmlcode",
										"std" => "",
										"type" => "textarea",
										"parent" => __("Homepage", "wpfw"));				
										
		// HOMEPAGE BLOG								
		$options[] = array( "name" => __("Homepage Blog", "wpfw"),
								"type" => "heading",
								"parent" => __("Homepage", "wpfw"));		
								
		$options[] = array( "name" => __("Homepage Blog Box Title", "wpfw"),
										"desc" => "",
										"id" => "homepageblogtitle",
										"std" => "From The Blog",
										"type" => "text",
										"parent" => __("Homepage", "wpfw"));			

		$options[] = array( "name" => __("Homepage Blog Box Subtitle", "wpfw"),
										"desc" => "",
										"id" => "homepageblogsubtitle",
										"std" => "Latest News, Updates, Erat Sed and Noin Phatera From the Debonair Blog",
										"type" => "textarea",
										"parent" => __("Homepage", "wpfw"));														
										
		$options[] = array( "name" => __("Homepage Blog Excerpt Size", "wpfw"),
										"desc" => "Number of characters",
										"id" => "homepageblogexcr",
										"std" => "65",
										"type" => "text",
										"parent" => __("Homepage", "wpfw"));																	
	*/
	// LAYOUT	
	$options[] = array( "name" => __("Layout Settings", "wpfw"),
						"type" => "leftheading",
						"icon" => "dashicons-desktop");			
						
			$options[] = array( "name" => __("Layout", "wpfw"),
								"type" => "heading",
								"parent" => __("Layout Settings", "wpfw"));				
								
					$options[] = array( "name" => __("Select the website layout style", "wpfw"),
										"desc" => "",
										"id" => "layout_style",
										"std" => "FullWidth",
										"type" => "select",
										"options" => array("FullWidth"=>"Full Width", "Boxed"=>"Boxed"),
										"parent" => __("Layout Settings", "wpfw"));								
										
					$options[] = array( "name" => __("Website width", "wpfw"),
										"desc" => "Please add the website maximum width. It could be a percentage from the screen width or it could be a fixed with in pixels. For full width website, the header and the footer will be 100% of the window width.",
										"id" => "layout_width",
										"std" => "90%",
										"type" => "text",
										"parent" => __("Layout Settings", "wpfw"));														
												
						
			// COLORS	
			$options[] = array( "name" => __("Colors", "wpfw"),
								"type" => "heading",
								"parent" => __("Layout Settings", "wpfw"));							
								
					$options[] = array( "name" => __("Main Color", "wpfw"),
										"desc" => "",
										"id" => "color1",
										"std" => "#ffc682",
										"type" => "color",
										"parent" => __("Layout Settings", "wpfw"));					

					$options[] = array( "name" => __("Secondary Color", "wpfw"),
										"desc" => "",
										"id" => "color2",
										"std" => "#ec82d2",
										"type" => "color",
										"parent" => __("Layout Settings", "wpfw"));			
			
			// IMAGE EFFECTS
			$options[] = array( "name" => __("Images", "wpfw"),
								"type" => "heading",
								"parent" => __("Layout Settings", "wpfw"));
								
					$options[] = array( "name" => __("Select default images style", "wpfw"),
										"desc" => "",
										"id" => "imagestyle",
										"std" => "grayscale",
										"type" => "select",
										"options" => array("color"=>"color", "grayscale"=>"grayscale", "sepia"=>"sepia"),
										"parent" => __("Layout Settings", "wpfw"));									
						
	// SOCIAL & MARKETING					
	$options[] = array( "name" => __("Social & Marketing", "wpfw"),
						"type" => "leftheading",
						"icon" => "dashicons-facebook");			
			
			$options[] = array( "name" => __("Social General", "wpfw"),
								"type" => "heading",
								"parent" => __("Social & Marketing", "wpfw"));					

					$monosocials = array('fivehundredpx', 'aboutme', 'addme', 'amazon', 'aol', 'appstorealt', 'appstore', 'apple', 'bebo', 'behance', 'bing', 'blip', 'blogger', 'coroflot', 'daytum', 'delicious', 'designbump', 'designfloat', 'deviantart', 'diggalt', 'digg', 'dribble', 'drupal', 'ebay', 'email', 'emberapp', 'etsy', 'facebook', 'feedburner', 'flickr', 'foodspotting', 'forrst', 'foursquare', 'friendsfeed', 'friendstar', 'gdgt', 'github', 'githubalt', 'googlebuzz', 'googleplus', 'googletalk', 'gowallapin', 'gowalla', 'grooveshark', 'heart', 'hyves', 'icondock', 'icq', 'identica', 'imessage', 'itunes', 'lastfm', 'linkedin', 'meetup', 'metacafe', 'mixx', 'mobileme', 'mrwong', 'msn', 'myspace', 'newsvine', 'paypal', 'photobucket', 'picasa', 'pinterest', 'podcast', 'posterous', 'qik', 'quora', 'reddit', 'retweet', 'rss', 'scribd', 'sharethis', 'skype', 'slashdot', 'slideshare', 'smugmug', 'soundcloud', 'spotify', 'squidoo', 'stackoverflow', 'star', 'stumbleupon', 'technorati', 'tumblr', 'twitterbird', 'twitter', 'viddler', 'vimeo', 'virb', 'www', 'wikipedia', 'windows', 'wordpress', 'xing', 'yahoobuzz', 'yahoo', 'yelp', 'youtube', 'instagram');
					$defaultsocials = array('email', 'facebook', 'flickr', 'googleplus', 'linkedin', 'pinterest', 'rss', 'skype', 'tumblr', 'twitterbird', 'vimeo', 'yahoo', 'youtube', 'instagram');
					
					foreach($monosocials as $ms) {
						if (in_array($ms, $defaultsocials)) 
							$std = "#";
							else 
								$std = '';
						$options[] = array( "name" => __("Enter Your <strong>".$ms."</strong> URL", "wpfw"),
											"desc" => "",
											"id" => "s_".$ms,
											"std" => $std,
											"type" => "text",
											"inline" => "yes",
											"parent" => __("Social & Marketing", "wpfw"),
											"icon" => $ms);
					}
										
					
				
				
				
				/* THIS SHOULD BE ACTIVATED WITH NEWSLETTER PLUGIN
				$options[] = array( "name" => __("Newsletter", "wpfw"),
								"type" => "heading",
								"parent" => __("Social & Marketing", "wpfw"));				
								
					$options[] = array( "name" => __("Show newsletter box on homepage", "wpfw"),
										"desc" => "",
										"id" => "nwlboxshow",
										"std" => "yes",
										"type" => "select",
										"options" => $yesno,
										"img" => "",
										"parent" => __("Social & Marketing", "wpfw"));	
										
					$options[] = array( "name" => __("Newsletter box title", "wpfw"),
										"desc" => "",
										"id" => "nwlbartitle",
										"std" => "Subscribe to our newsletter",
										"type" => "text",
										"parent" => __("Social & Marketing", "wpfw"));												
										
					$options[] = array( "name" => __("Newsletter box text", "wpfw"),
										"desc" => "",
										"id" => "nwlbartext",
										"std" => "Subscribe to our mailing list to get the updates to your email inbox.",
										"type" => "textarea",
										"parent" => __("Social & Marketing", "wpfw"));						
										
					$options[] = array( "name" => __("Newsletter box button text", "wpfw"),
										"desc" => "",
										"id" => "nwlbarbuttontext",
										"std" => "Subscribe",
										"type" => "text",
										"parent" => __("Social & Marketing", "wpfw"));																		
										
					$options[] = array( "name" => __("Where the subscribers emails should go?", "wpfw"),
										"desc" => "",
										"id" => "nwltype",
										"std" => "Admin panel",
										"type" => "select",
										"options" => $newsletter,
										"parent" => __("Social & Marketing", "wpfw"));																											
								
					$options[] = array( "name" => __("Receive an email when a user signs up", "wpfw"),
										"desc" => "<b>This is available just for <em>Admin panel</em> option. For MailChimp and ConstantContact you can set up in your account if you want to receive an email when somebody subscribes.</b>",
										"id" => "nwlemailannounce",
										"std" => "yes",
										"type" => "select",
										"options" => $yesno,
										"parent" => __("Social & Marketing", "wpfw"));							

					$options[] = array( "name" => __("Email address", "wpfw"),
										"desc" => "The email address where the announcement will be sent.",
										"id" => "nwlemail",
										"type" => "text",
										"parent" => __("Social & Marketing", "wpfw"));			
										
										
					$options[] = array( "name" => __("System Email", "wpfw"),
										"desc" => "",
										"id" => "system_email",
										"std" => "",
										"type" => "text",
										"parent" => __("Social & Marketing", "wpfw"));													
										

				$options[] = array( "name" => __("Constant Contact", "wpfw"),
								"type" => "heading",
								"parent" => __("Social & Marketing", "wpfw"));						
								
					$options[] = array( "name" => __("Constant contact username", "wpfw"),
										"desc" => "The username of your constant contact account.",
										"id" => "cc_username",
										"type" => "text",
										"parent" => __("Social & Marketing", "wpfw"));			
										
					$options[] = array( "name" => __("Constant contact password", "wpfw"),
										"desc" => "The password of your constant contact account.",
										"id" => "cc_password",
										"type" => "text",
										"parent" => __("Social & Marketing", "wpfw"));			
										
					$options[] = array( "name" => __("Constant contact list name", "wpfw"),
										"desc" => 'The list where you want to save the emails. <a target="_blank" href="http://support2.constantcontact.com/articles/FAQ/2156?l=en_US&c=Topic%3AAdd_Contacts&fs=RelatedArticle#create">Click here to find out how to add a new list in Constant Contact.</a>',
										"id" => "cc_list",
										"type" => "text",
										"parent" => __("Social & Marketing", "wpfw"));			
										
				$options[] = array( "name" => __("MailChimp", "wpfw"),
								"type" => "heading",
								"parent" => __("Social & Marketing", "wpfw"));						
								
					$options[] = array( "name" => __("API Key", "wpfw"),
										"desc" => 'Please enter the MailChimp API Key.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a target="_blank" href="http://kb.mailchimp.com/article/where-can-i-find-my-api-key">Click here to see how you can obtain an API Key for your MailChimp account</a>',
										"id" => "mc_api",
										"type" => "text",
										"parent" => __("Social & Marketing", "wpfw"));			
										
					$options[] = array( "name" => __("MailChimp list ID", "wpfw"),
										"desc" => 'The list where you want to save the emails. <a target="_blank" href="http://kb.mailchimp.com/article/how-can-i-find-my-list-id">Please click here to see how you can get the List ID from your MailChimp Account</a>',
										"id" => "mc_list",
										"type" => "text",
										"parent" => __("Social & Marketing", "wpfw"));																																							
																																																	
							*/														
					
	
	// TYPOGRAPHY

	$options[] = array( "name" => __("Typography", "wpfw"),
						"type" => "leftheading",
						"icon" => "dashicons-editor-paste-word");
			
			// LOGO
			$options[] = array( "id" => "Headert",
								"name" => __("Header", "wpfw"),
								"type" => "heading",
								"parent" => "Typography");			
								
					$options[] = array( "name" => __("Select font for website logo", "wpfw"),
										"desc" => "",
										"id" => "font_logo",
										"tag" => "h1#Logo, h1#Logo a",
										"type" => "typography",
										"std" => array("size" => "90px", "face" => "alex_brushregular", "style" => "normal", "color" => "#ffc682"),
										"parent" => "Typography");
										
					$options[] = array( "name" => __("Select font for website description", "wpfw"),
											"desc" => "",
											"id" => "font_description",
											"tag" => "h2#Headline",
											"type" => "typography",
											"std" => array("size" => "14px", "face" => "Century Gothic", "style" => "normal", "color" => "#cccccc"),
											"parent" => "Typography");
					
					$options[] = array( "name" => __("Select font for header phone number", "wpfw"),
											"desc" => "",
											"id" => "font_phone",
											"tag" => "#Header .PhoneNumber",
											"type" => "typography",
											"std" => array("size" => "20px", "face" => "Century Gothic", "style" => "normal", "color" => "#ec82d2"),
											"parent" => "Typography");					
											
					$options[] = array( "name" => __("Select font for main menu", "wpfw"),
											"desc" => "",
											"id" => "font_mainmenu",
											"tag" => "#MainMenuList li a",
											"type" => "typography",
											"hover" => true,
											"std" => array("size" => "16px", "face" => "Century Gothic", "style" => "normal", "color" => "#5b5c59", "color_hover" => "#ffffff"),
											"parent" => "Typography");					
																						
											
			$options[] = array( "id" => "Footert",
								"name" => __("Footer", "wpfw"),
								"type" => "heading",
								"parent" => "Typography");				
								
					$options[] = array( "name" => __("Select font for copyright", "wpfw"),
										"desc" => "",
										"id" => "font_copyright",
										"tag" => "#Copyright",
										"type" => "typography",
										"std" => array("size" => "12px", "face" => "Century Gothic", "style" => "normal", "color" => "#5b5c59"),
										"parent" => "Typography");
										
					$options[] = array( "name" => __("Select font for footer menu", "wpfw"),
											"desc" => "",
											"id" => "font_footer_menu",
											"tag" => "#Copyright a, #BottomMenu li a",
											"type" => "typography",
											"hover" => true,
											"underline" => true,
											"std" => array("size" => "12px", "face" => "Century Gothic", "style" => "normal", "color" => "#5b5c59", "underline" => "none", "color_hover" => "#ec82d2", "underline_hover" => "none"),
											"parent" => "Typography");																	
					

		// CONTENT
		$options[] = array( "id" => "ContentT",
												"name" => __("Content", "wpfw"),
												"type" => "heading",
												"parent" => "Typography");		
				
					$options[] = array( "name" => __("Select font for h1", "wpfw"),
										"desc" => "",
										"id" => "font_h1",
										"tag" => "h1",
										"type" => "typography",
										"std" => array("size" => "35px", "face" => "Century Gothic", "style" => "bold", "color" => "#ec82d2"),
										"parent" => "Typography");		
					$options[] = array( "name" => __("Select font for h2", "wpfw"),
										"desc" => "",
										"id" => "font_h2",
										"tag" => "h2",
										"type" => "typography",
										"std" => array("size" => "30px", "face" => "Century Gothic", "style" => "bold", "color" => "#ec82d2"),
										"parent" => "Typography");			
					$options[] = array( "name" => __("Select font for h3", "wpfw"),
										"desc" => "",
										"id" => "font_h3",
										"tag" => "h3",
										"type" => "typography",
										"std" => array("size" => "28px", "face" => "Century Gothic", "style" => "normal", "color" => "#ec82d2"),
										"parent" => "Typography");	
					$options[] = array( "name" => __("Select font for h4", "wpfw"),
										"desc" => "",
										"id" => "font_h4",
										"tag" => "h4",
										"type" => "typography",
										"std" => array("size" => "25px", "face" => "Century Gothic", "style" => "normal", "color" => "#ec82d2"),
										"parent" => "Typography");	
					$options[] = array( "name" => __("Select font for h5", "wpfw"),
										"desc" => "",
										"id" => "font_h5",
										"tag" => "h5",
										"type" => "typography",
										"std" => array("size" => "20px", "face" => "Century Gothic", "style" => "normal", "color" => "#ec82d2"),
										"parent" => "Typography");	
					$options[] = array( "name" => __("Select font for h6", "wpfw"),
										"desc" => "",
										"id" => "font_h6",
										"tag" => "h6",
										"type" => "typography",
										"std" => array("size" => "18px", "face" => "Century Gothic", "style" => "normal", "color" => "#ec82d2"),
										"parent" => "Typography");	
										
					$options[] = array( "name" => __("Select font for general paragraph", "wpfw"),
										"desc" => "",
										"id" => "font_p",
										"tag" => "p",
										"type" => "typography",
										"std" => array("size" => "14px", "face" => "Museo300", "style" => "normal", "color" => "#494646"),
										"parent" => "Typography");						
										
					$options[] = array( "name" => __("Select font for general button", "wpfw"),
										"desc" => "",
										"id" => "font_button",
										"tag" => ".button",
										"type" => "typography",
										"std" => array("size" => "14px", "face" => "Museo300", "style" => "normal", "color" => "#FFFFFF"),
										"parent" => "Typography");							
										
					$options[] = array( "name" => __("Select font for general hyperlinks", "wpfw"),
										"desc" => "",
										"id" => "font_hyperlinks",
										"tag" => "p a",
										"type" => "typography",
										"hover" => true,
										"underline" => true,
										"std" => array("size" => "14px", "face" => "Museo300", "style" => "normal", "color" => "#de56bc", "underline" => "underline", "color_hover" => "#de56bc", "underline_hover" => "none"),
										"parent" => "Typography");																									
								
						
	$options[] = array( 
						"id" => "Homepaget",
						"name" => __("Homepage", "wpfw"),
						"type" => "heading",
						"parent" => "Typography");								

					$options[] = array( "name" => __("Select font for homepage slider title", "wpfw"),
										"desc" => "",
										"id" => "font_slider_title",
										"tag" => "#HomepageSlider h1",
										"type" => "typography",
										"std" => array("size" => "26px", "face" => "Century Gothic", "style" => "bold", "color" => "#FFFFFF"),
										"parent" => "Typography");	
										
					$options[] = array( "name" => __("Select font for homepage slider text", "wpfw"),
										"desc" => "",
										"id" => "font_slider_text",
										"tag" => "#HomepageSlider h2",
										"type" => "typography",
										"std" => array("size" => "16px", "face" => "Century Gothic", "style" => "normal", "color" => "#FFFFFF"),
										"parent" => "Typography");									
										
					$options[] = array( "name" => __("Select font for homepage articles title", "wpfw"),
										"desc" => "",
										"id" => "font_homepage_articles_title",
										"tag" => "#HomepageArticles .article-3-1 h3 a",
										"type" => "typography",
										"std" => array("size" => "22px", "face" => "Century Gothic", "style" => "normal", "color" => "#FFFFFF"),
										"parent" => "Typography");																						
										
					$options[] = array( "name" => __("Select font for homepage action bar title", "wpfw"),
										"desc" => "",
										"id" => "font_action_bar_title",
										"tag" => "#HomepageActionBar h1",
										"type" => "typography",
										"std" => array("size" => "40px", "face" => "Century Gothic", "style" => "normal", "color" => "#FFFFFF"),
										"parent" => "Typography");				
										
					$options[] = array( "name" => __("Select font for homepage action bar text", "wpfw"),
										"desc" => "",
										"id" => "font_action_bar_text",
										"tag" => "#HomepageActionBar p",
										"type" => "typography",
										"std" => array("size" => "16px", "face" => "Century Gothic", "style" => "normal", "color" => "#FFFFFF"),
										"parent" => "Typography");					
										
					$options[] = array( "name" => __("Select font for homepage action bar button", "wpfw"),
										"desc" => "",
										"id" => "font_action_bar_button",
										"tag" => "#HomepageActionBar a",
										"type" => "typography",
										"std" => array("size" => "14px", "face" => "Century Gothic", "style" => "bold", "color" => "#ffc682"),
										"parent" => "Typography");																														
						
					$options[] = array( "name" => __("Select font for homepage custom article title", "wpfw"),
										"desc" => "",
										"id" => "font_custom_article_title",
										"tag" => "#HomepageArticle h2",
										"type" => "typography",
										"std" => array("size" => "30px", "face" => "Century Gothic", "style" => "bold", "color" => "#ec82d2"),
										"parent" => "Typography");							
										
					$options[] = array( "name" => __("Select font for homepage custom article text", "wpfw"),
										"desc" => "",
										"id" => "font_custom_article_text",
										"tag" => "#HomepageArticle p",
										"type" => "typography",
										"std" => array("size" => "14px", "face" => "Museo300", "style" => "normal", "color" => "#494646"),
										"parent" => "Typography");				
										
					$options[] = array( "name" => __("Select font for homepage blog feed title", "wpfw"),
										"desc" => "#HomepageFromTheBlog h2",
										"id" => "font_blog_feed_title",
										"tag" => "",
										"type" => "typography",
										"std" => array("size" => "30px", "face" => "Century Gothic", "style" => "bold", "color" => "#ec82d2"),
										"parent" => "Typography");							
										
					$options[] = array( "name" => __("Select font for homepage blog feed articles title", "wpfw"),
										"desc" => "",
										"id" => "font_blog_feed_article_title",
										"tag" => "#HomepageFromTheBlog.widget ul.faves_widget li a.listing_link",
										"type" => "typography",
										"std" => array("size" => "16px", "face" => "Century Gothic", "style" => "bold", "color" => "#524F4F"),
										"parent" => "Typography");				
										
					$options[] = array( "name" => __("Select font for homepage blog feed articles text", "wpfw"),
										"desc" => "",
										"id" => "font_blog_feed_article_text",
										"tag" => "#HomepageFromTheBlog.widget ul.faves_widget li p",
										"type" => "typography",
										"std" => array("size" => "14px", "face" => "Museo300", "style" => "normal", "color" => "#494646"),
										"parent" => "Typography");																																	
						
			// BLOG 							
$options[] = array( "name" => __("Blog", "wpfw"),
						"type" => "heading",
						"parent" => "Typography");				
						
					$options[] = array( "name" => __("Select font for homepage blog articles title", "wpfw"),
										"desc" => "",
										"id" => "font_blog_titles",
										"tag" => ".blog-post h1, .blog-post h1 a",
										"type" => "typography",
										"hover" => "true",
										"std" => array("size" => "24px", "face" => "Century Gothic", "style" => "bold", "color" => "#de56bc", "color_hover" => "#494545"),
										"parent" => "Typography");			
										
					$options[] = array( "name" => __("Select font for homepage blog info", "wpfw"),
										"desc" => "Blog info: author link, categories links, tags links, share text.",
										"id" => "font_blog_info",
										"tag" => ".blog-info .categories a, .tags a, .author-link, .blog-info .cshares span",
										"type" => "typography",
										"std" => array("size" => "14px", "face" => "Museo300", "style" => "normal", "color" => "#494545"),
										"parent" => "Typography");									
										
					$options[] = array( "name" => __("Select blog faves title", "wpfw"),
										"desc" => "",
										"id" => "font_blog_faves_title",
										"tag" => "#faves_title",
										"type" => "typography",
										"std" => array("size" => "60px", "face" => "alex_brushregular", "style" => "normal", "color" => "#494545"),
										"parent" => "Typography");											
										
					$options[] = array( "name" => __("Select blog faves sub-title", "wpfw"),
										"desc" => "",
										"id" => "font_blog_faves_subtitle",
										"tag" => "#faves_subtitle",
										"type" => "typography",
										"std" => array("size" => "16px", "face" => "Century Gothic", "style" => "normal", "color" => "#494545"),
										"parent" => "Typography");				
										
					$options[] = array( "name" => __("Select blog faves article title", "wpfw"),
										"desc" => "",
										"id" => "font_blog_faves_article_title",
										"tag" => "#BlogFooter .footer-item .a-title",
										"type" => "typography",
										"std" => array("size" => "18px", "face" => "Century Gothic", "style" => "bold", "color" => "#373636"),
										"parent" => "Typography");		
										
					$options[] = array( "name" => __("Select blog faves article text", "wpfw"),
										"desc" => "",
										"id" => "font_blog_faves_article_text",
										"tag" => "#BlogFooter .footer-item p",
										"type" => "typography",
										"std" => array("size" => "14px", "face" => "Museo300", "style" => "normal", "color" => "#373636"),
										"parent" => "Typography");						
										
					$options[] = array( "name" => __("Select font for comments title", "wpfw"),
										"desc" => "Comments title and comment form title",
										"id" => "font_comments_title",
										"tag" => ".comments_title, .comment-respond .comment-reply-title",
										"type" => "typography",
										"std" => array("size" => "30px", "face" => "Century Gothic", "style" => "bold", "color" => "#ec82d2"),
										"parent" => "Typography");																																	
																														
					$options[] = array( "name" => __("Select font for comments body text", "wpfw"),
										"desc" => "",
										"id" => "font_comments_text",
										"tag" => ".comment-text p",
										"type" => "typography",
										"std" => array("size" => "14px", "face" => "Museo300", "style" => "normal", "color" => "#373636"),
										"parent" => "Typography");																																																
										
															
					$options[] = array( "name" => __("Select font for widgets title", "wpfw"),
										"desc" => "",
										"id" => "font_widgets_title",
										"tag" => ".widget .title, .widget .title a",
										"type" => "typography",
										"std" => array("size" => "18px", "face" => "Century Gothic", "style" => "bold", "color" => "#FFFFFF"),
										"parent" => "Typography");																		
										
					$options[] = array( "name" => __("Select font for widgets text", "wpfw"),
										"desc" => "",
										"id" => "font_widgets_text",
										"tag" => ".widget",
										"type" => "typography",
										"std" => array("size" => "14px", "face" => "Museo300", "style" => "normal", "color" => "#494545"),
										"parent" => "Typography");					
										
					$options[] = array( "name" => __("Select font for widgets menus", "wpfw"),
										"desc" => "",
										"id" => "font_widgets_menus",
										"tag" => ".widget ul li a",
										"type" => "typography",
										"std" => array("size" => "13px", "face" => "Century Gothic", "style" => "normal", "color" => "#8d8787"),
										"parent" => "Typography");															
																		
																		
					if (function_exists("get_related_ids")) {										
						$options[] = array( "name" => __("Related articles", "wpfw"),
												"type" => "heading",
												"parent" => "Typography");
												
					$options[] = array( "name" => __("Select font for related articles titles", "wpfw"),
										"desc" => "",
										"id" => "font_related_title",
										"tag" => ".r-title",
										"type" => "typography",
										"std" => array("size" => "30px", "face" => "Century Gothic", "style" => "bold", "color" => "#ec82d2"),
										"parent" => "Typography");								
										
					$options[] = array( "name" => __("Select font for related articles posts titles", "wpfw"),
										"desc" => "",
										"id" => "font_related_article_title",
										"tag" => ".related-title",
										"type" => "typography",
										"std" => array("size" => "16px", "face" => "Century Gothic", "style" => "bold", "color" => "#585555"),
										"parent" => "Typography");																					
												
					$options[] = array( "name" => __("Select font for related articles posts text", "wpfw"),
										"desc" => "",
										"id" => "font_related_article_text",
										"tag" => ".r-article p",
										"type" => "typography",
										"std" => array("size" => "14px", "face" => "Museo300", "style" => "normal", "color" => "#585555"),
										"parent" => "Typography");															
												
												
					}
										
				
						
$options[] = array( "name" => __("Lists", "wpfw"),
						"type" => "heading",
						"parent" => "Typography");								
						
					$options[] = array( "name" => __("Select font for lists", "wpfw"),
										"desc" => "",
										"id" => "font_related_article_text",
										"tag" => "ul.inc li, ol.inc li",
										"type" => "typography",
										"std" => array("size" => "16px", "face" => "Century Gothic", "style" => "normal", "color" => "#585555"),
										"parent" => "Typography");								
						
						
	$options[] = array( "name" => __("List indent", "wpfw"),
						"desc" => "Left margin space in pixels",
						"id" => "list_left_margin",
						"std" => "20px",
						"type" => "text",
						"parent" => "Typography");				

	$options[] = array( "name" => __("List line space", "wpfw"),
						"desc" => "Space between list lines in pixels",
						"id" => "list_lines_margin",
						"std" => "5px",
						"type" => "text",
						"parent" => "Typography");														
						
	$options_bullet = array('none' => 'none', 'disc' => 'disc', 'square' => 'square','circle' => 'circle', 'custom image' => 'custom image');

	$options[] = array( "name" => __("List bullet type", "wpfw"),
						"desc" => "",
						"id" => "list_bullet_type",
						"type" => "select",
						"std" => "disc",
						"options" => $options_bullet,
						"parent" => "Typography");			
						
	$options[] = array( "name" => __("Upload bullet image", "wpfw"),
										"desc" => "16x16px",
										"id" => "list_bullet_image",
										"type" => "upload",
										"parent" => __("Typography", "wpfw"));									
										
	// BLOG SETTINGS										
	$options[] = array( "name" => __("Blog Settings", "wpfw"),
						"type" => "leftheading",
						"icon" => "dashicons-format-status");											
										
				$options[] = array( "name" => __("Blog Slider", "wpfw"),
								"type" => "heading",
								"parent" => __("Blog Settings", "wpfw"));				
								
					$options[] = array( "name" => __("Show blog slider", "wpfw"),
										"desc" => "",
										"id" => "blogslidershow",
										"std" => "yes",
										"type" => "select",
										"options" => array("yes" => "Yes", "no" => "No"),
										"parent" => __("Blog Settings", "wpfw"));																	
										
										
				$options[] = array( "name" => __("Footer faves", "wpfw"),
								"type" => "heading",
								"parent" => __("Blog Settings", "wpfw"));
								
					$options[] = array( "name" => __("Show footer faves", "wpfw"),
										"desc" => "",
										"id" => "favesshow",
										"std" => "6",
										"type" => "select",
										"options" => array("0" => "Do not show", "4" => "4 posts", "infinite" => "how many i select posts"),
										"parent" => __("Blog Settings", "wpfw"));										
								
					$options[] = array( "name" => __("Footer faves title", "wpfw"),
										"desc" => "",
										"id" => "favestitle",
										"std" => "Don't forget to check our fave's",
										"type" => "text",
										"parent" => __("Blog Settings", "wpfw"));					

					$options[] = array( "name" => __("Footer faves subtitle", "wpfw"),
										"desc" => "",
										"id" => "favessubtitle",
										"std" => "Don't forget to check our fave's",
										"type" => "text",
										"parent" => __("Blog Settings", "wpfw"));																	
								
					$options[] = array( "name" => __("Footer faves category", "wpfw"),
										"desc" => __("Please select from what category will be the posts displayed", "wpfw"),
										"id" => "favescategory",
										"std" => "",
										"type" => "select",
										"options" => $options_categories,
										"parent" => __("Blog Settings", "wpfw"));									
															
						/*								
										
				$options[] = array( "name" => __("Authors", "wpfw"),
								"type" => "heading",
								"parent" => __("Blog", "wpfw"));		
								
					$options[] = array( "name" => __("Show author info on blog posts?", "wpfw"),
										"desc" => "",
										"id" => "showauthor",
										"std" => "yes",
										"type" => "select",
										"options" => $yesno,
										"parent" => __("Blog", "wpfw"));																																
							*/			
																

	return $options;
}