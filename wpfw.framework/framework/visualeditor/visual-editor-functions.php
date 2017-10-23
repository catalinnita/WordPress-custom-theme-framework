<?php

/*
Role:       
Adds an object for visual editor. The element is appended to the global $wpfw_elements array

Usage:
Can be used anywere in the theme files.

Parameters: 
$builder_item = array() - contains the element info - see more on wpfp.net (path here)
*/

function wpfw_add_builder_item($builder_item) {
	global $wpfw_elements;
	
	$wpfw_elements[$builder_item['ID']] = $builder_item;
	
}

/*
Transforms the post serialized array in array.
*/
function wpfw_get_array($s) {
	
	$arr = array();
	$s = explode(";", str_replace("{", "", str_replace("}","",$s)));
	foreach ($s as $v) {
		$kv = explode(":", $v);
		$arr[$kv[0]] = $kv[1];
	}
	
	return $arr;
			
}

/*
Gets a setting value for an element
Parameters:
$arr 		 = page elements array
$val 		 = the value for the request key
$k   		 = the key which must be selected ??
$sett_id = the option name for which the value must be returned
*/
function wpfw_get_options_by_key($arr, $val, $k, $sett_id, $is_multiple, $element_nr) {
	//print_r($arr);
	
	if(is_array($arr)) {
		foreach ($arr as $el) {
			if ($el[$k] == $val) {
				if ($is_multiple) {
					return $el['settings']['elements'][$element_nr][$sett_id];
				}
				else {
					return $el['settings'][$sett_id];
				}
			}
		}
		return false;
	}
}

/*
Gets the post saved builder elements into an array
Parameters:
$post_id = the post id
*/
function wpfw_get_post_array($post_id) {
	global $wpdb;
	if(isset($post_id)) {
	$Objects = $wpdb->get_results("SELECT Objects FROM wpfw_builder_elements WHERE PostID = ".$post_id);
	if ($Objects[0]->Objects) {
		
		$ret = unserialize($Objects[0]->Objects);
		return $ret;
	}
	else {
		return false;
	}
	}
	else {
		return false;
	}
	
}


/*

Parameters:
$post_id = the post id
*/
function wpfw_get_export_data($post_id) {
	global $wpdb;
	if(isset($post_id)) {
	$Objects = $wpdb->get_results("SELECT Objects FROM wpfw_builder_elements WHERE PostID = ".$post_id);
	if ($Objects[0]->Objects) {
		return base64_encode($Objects[0]->Objects);
	}
	else {
		return false;
	}
	}
	else {
		return false;
	}
}

/*

Parameters:
$post_id = the post id
*/
function wpfw_import_data($data) {
	global $wpdb;
	
	if(isset($data)) {
		$data = base64_decode($data);
		$check = $wpdb->get_results("SELECT Objects FROM wpfw_builder_elements WHERE PostID = ".$_GET['post_id']);
		if($check[0]->Objects) {
			$wpdb->query("UPDATE wpfw_builder_elements 
											SET Objects = '".$data."'
												WHERE PostID = ".$_GET['post_id']);
		}
		else {
			$wpdb->query("INSERT INTO wpfw_builder_elements 
											(Objects, PostID) 
												VALUES ('".$data."', ".$_GET['post_id'].")");
		}
	}
}

/*
Orders the saved builder elements on rows.
Parameters 
$elements = saved elements array
*/
function wpfw_build_rows($elements) {
	
	$rows = array();
	foreach($elements as $element) {
		$rows[$element['row']][$element['id']]['w'] = $element['w'];
		$rows[$element['row']][$element['id']]['t'] = $element['t'];
	}
	
	return $rows;
	
}

/*
Creates and displays saved elements on builder grid area
Parameters:
$post_id = the post id
$rownr   = number of empty rows which must be added after the elements rows.
*/

function wpfw_build_grid($post_id, $rownr = 7) {
	global $wpfw_elements, $default_path;
	
	$elements = wpfw_get_post_array($post_id);
	if (!$elements || count($elements) < 1) {
		// default
		?>
		<input type="hidden" name="rows" id="rows" value="<?php echo $rownr; ?>" />
		<?php
		for ($rnr = 1 ; $rnr <= $rownr ; $rnr++) {
		?>
		<input type="hidden" name="row<?php echo $rnr; ?>-el1" id="row<?php echo $rnr; ?>-el1" value="" />
		<input type="hidden" name="row<?php echo $rnr; ?>-el2" id="row<?php echo $rnr; ?>-el2" value="" />
		<input type="hidden" name="row<?php echo $rnr; ?>-el3" id="row<?php echo $rnr; ?>-el3" value="" />
		<input type="hidden" name="row<?php echo $rnr; ?>-el4" id="row<?php echo $rnr; ?>-el4" value="" />
		<li class="row"><ul id="row<?php echo $rnr; ?>" class="rowcontainer"></ul></li>
		<?php
		}
	}
	else {
		$rows = wpfw_build_rows($elements);
		?>
		<input type="hidden" name="rows" id="rows" value="<?php echo count($rows)+$rownr; ?>" />
		<?php
		foreach($rows as $key => $row) {
			?>
			<input type="hidden" name="row<?php echo $key; ?>-el1" id="row<?php echo $key; ?>-el1" value="" />
			<input type="hidden" name="row<?php echo $key; ?>-el2" id="row<?php echo $key; ?>-el2" value="" />
			<input type="hidden" name="row<?php echo $key; ?>-el3" id="row<?php echo $key; ?>-el3" value="" />
			<input type="hidden" name="row<?php echo $key; ?>-el4" id="row<?php echo $key; ?>-el4" value="" />
			<li class="row">
				<ul id="row<?php echo $key; ?>" class="rowcontainer">
					<?php
					foreach($row as $key => $element) {
					?>
					<li class="ui-state-default SliderItem ui-draggable element ui-resizable" style="display: list-item; z-index: auto; width: <?php echo $element['w']; ?>px;" id="obj<?php echo $key; ?>">
						<span id="<?php echo $element['t']; ?>" class="container">
							<span class="icon" style="background: url(<?php echo $default_path.$wpfw_elements[$element['t']]['Icon']; ?>) left -15px no-repeat;"></span>
							<span class="title">
								<span class="del"></span>
								<?php echo $wpfw_elements[$element['t']]['Name']; ?>
							</span>
						</span>
					</li>					
					<?php
					}
					?>
				</ul>
			</li>			
			<?php
		}
		
		for ($rnr = count($rows)+1 ; $rnr <= count($rows)+$rownr ; $rnr++) {
		?>
		<input type="hidden" name="row<?php echo $rnr; ?>-el1" id="row<?php echo $rnr; ?>-el1" value="" />
		<input type="hidden" name="row<?php echo $rnr; ?>-el2" id="row<?php echo $rnr; ?>-el2" value="" />
		<input type="hidden" name="row<?php echo $rnr; ?>-el3" id="row<?php echo $rnr; ?>-el3" value="" />
		<input type="hidden" name="row<?php echo $rnr; ?>-el4" id="row<?php echo $rnr; ?>-el4" value="" />
		<li class="row"><ul id="row<?php echo $rnr; ?>" class="rowcontainer"></ul></li>
		<?php
		}
		//print_r($rows);	
	}
		
		

}

function wpfw_calculate_bootstrap_col($width) {
	return 12/(900/($width+12));
}

function wpfw_grid($post_id) {
	$elements = wpfw_get_post_array($post_id);
	//print_r($elements);
	if (!$elements || count($elements) < 1) {
		?>
		There is no element.
		<?php
	}
	else {
		$rows = wpfw_build_rows($elements);
		?>
		<?php
		$col = 1;
		foreach($rows as $key => $row) {
			?>
			<div class="row">
				<?php
				foreach($row as $key => $element) {
					//print_r($elements[$col]);
				?>
					<div class="col-md-<?php echo wpfw_calculate_bootstrap_col($element['w']); ?>">
						<?php 
							foreach($elements[$col]['php'] as $file) {
								require_once(get_template_directory().'/framework/visualeditor/elements/'.$file);
							}
							$func = $elements[$col]['func'];
							//echo $col;
							$func($elements[$col]); 
						?>
					</div>
				<?php
				$col++;
				}
			?>
			</div>
		<?php
		}
	}
}

// gets the options for a specified element
function wpfw_get_options_array($options, $element_id, $elnr) {
	global $wpdb;
	
	$options_to_save = array();
	
	$saved_elements_s = $wpdb->get_results("SELECT Objects FROM wpfw_builder_elements WHERE PostID = ".$_GET['post_id']);

	foreach($options as $option) { 
		if ($option['type'] != 'TopTab' && $option['type'] != 'upload') {
			switch($option['field']['type']) {
				case 'editor':
					$options_to_save[$option['field']['ID']] = stripslashes($_POST[$option['field']['ID'].'-'.$element_id]);
				break;
				case 'multiple';
				case 'multipleimages';
				case 'simplemultiple':
					
					foreach($option['field']['fields'] as $multipleoption) {
						
						$element_nr = 1;
						$element_exists = true;
						while($element_exists == true) {
							if(isset($_POST[$multipleoption['ID'].'-'.$element_id.'-'.$element_nr]) || isset($_POST['ImageName-'.$multipleoption['ID'].'-'.$element_id.'-'.$element_nr])) {
								
									if($multipleoption['type'] == 'upload') {
										
										$imagename = $_POST['ImageName-'.$multipleoption['ID'].'-'.$element_id.'-'.$element_nr];
										
										if($imagename != 'del') {											
											if (strlen($imagename) > 0) {
												
											$upload_dir = wp_upload_dir();
											$abs_uploads_dir = $upload_dir['basedir'].$upload_dir['subdir'];
											
											$wp_filetype = wp_check_filetype(basename($imagename), null );
													$attachment = array(
														'post_mime_type' => $wp_filetype['type'],
														'post_title' => preg_replace('/\.[^.]+$/', '', basename($imagename)),
														'post_content' => '',
														'post_status' => 'inherit'
											);
													
											$attach_id = wp_insert_attachment( $attachment, substr($upload_dir['subdir'],1).'/'.$imagename);
					
											$attach_data = wp_generate_attachment_metadata($attach_id, $abs_uploads_dir.'/'.$imagename);
											wp_update_attachment_metadata($attach_id, $attach_data);					
											
											$options_to_save['elements'][$element_nr][$multipleoption['ID']]['AttachmentID'] = $attach_id;
		
										}
										else {
											$saved_elements_s = $wpdb->get_results("SELECT Objects FROM wpfw_builder_elements WHERE PostID = ".$_GET['post_id']);
											$saved_elements = unserialize($saved_elements_s[0]->Objects);
											$options_to_save['elements'][$element_nr][$multipleoption['ID']]['AttachmentID'] = $saved_elements[$elnr]['settings']['elements'][$element_nr][$multipleoption['ID']]['AttachmentID'];
										}
										
										$options_to_save['elements'][$element_nr][$multipleoption['ID']]['Size'] = $_POST['ImageSize-'.$multipleoption['ID'].'-'.$element_id.'-'.$element_nr];
										$options_to_save['elements'][$element_nr][$multipleoption['ID']]['Title'] = $_POST['ImageTitle-'.$multipleoption['ID'].'-'.$element_id.'-'.$element_nr];
										$options_to_save['elements'][$element_nr][$multipleoption['ID']]['Alt'] = $_POST['ImageAlt-'.$multipleoption['ID'].'-'.$element_id.'-'.$element_nr];
										$options_to_save['elements'][$element_nr][$multipleoption['ID']]['Caption'] = $_POST['ImageCaption-'.$multipleoption['ID'].'-'.$element_id.'-'.$element_nr];
										$options_to_save['elements'][$element_nr][$multipleoption['ID']]['Format'] = $_POST['ImageFormat-'.$multipleoption['ID'].'-'.$element_id.'-'.$element_nr];
										}
										else {
											$options_to_save['elements'][$element_nr][$multipleoption['ID']] = '';
										}
									
									}
									else {
										$valuetosave = $_POST[$multipleoption['ID'].'-'.$element_id.'-'.$element_nr];
										if($multipleoption['type'] == 'editor') {
											$valuetosave = stripslashes($valuetosave);
										}
											$options_to_save['elements'][$element_nr][$multipleoption['ID']] = $valuetosave;
									}
								
								
								
								$element_nr++;
							}
							else {
								$element_exists = false;
							}
						}
					}
				break;
				case 'htmlcode':
					$options_to_save[$option['field']['ID']] = base64_encode(stripslashes($_POST[$option['field']['ID'].'-'.$element_id]));
				break;
				default: 
					$options_to_save[$option['field']['ID']] = $_POST[$option['field']['ID'].'-'.$element_id];
				break;
			}

			
		}
	}
	return $options_to_save;
	
}

function wpfw_clean_up_content($content) {
	
	$content = str_replace('\"', '"', $content);
	
	return $content;
	
}

function wpfw_get_elements_nr($post_id, $default, $element_id) {
	

	
	$saved_elements_nr = count(wpfw_get_options_by_key(wpfw_get_post_array($post_id), $element_id, 'id', 'elements', false, ''));
	if ($saved_elements_nr > $default) {
			return $saved_elements_nr;
		}
		else {
			return $default;
		}
	
}

// shows a single option
function wpfw_show_option($field, $post_id='', $element_id='', $is_multiple=false, $element_nr='') {
		global $wpdb;
		// get value
		if ($post_id != '') {
			$option_saved_value = wpfw_get_options_by_key(wpfw_get_post_array($post_id), $element_id, 'id', $field['ID'], $is_multiple, $element_nr);
		}
		
		if($is_multiple && $element_nr > 0) {
			$element_id = $element_id.'-'.$element_nr;
		}
		
		if (!$option_saved_value) {
			$value = $field['default'];			
		}
		else {
			$value = $option_saved_value;
		}
		
		
	
		
	
		if($field['type'] == 'multiple' || $field['type'] == 'multipleimages') $container = 'multiple'; 
	
		?>
		<div class="op-fieldset <?php echo $field['width']; ?> <?php echo $container; ?>">
			
		<?php if($field['type'] != 'upload' && $field['hidetitle'] != 'yes') { ?>
		<label>
			<?php if($field['type'] == 'editor') { ?>
			<a data-link="<?php echo 'WPFWOptionsEditor'.$field['ID'].'-'.$element_id; ?>" class="FullScreenEditor" href="#WPFWOptionsEditor">Advanced Editor</a>
			<?php } ?>
			<strong><?php echo $field['name']; ?></strong>
		</label>		
		<?php	
		}
	
	switch($field['type']) {

		case 'textfield' :
		?>
		<div class="outside"><input <?php if($field['selector']) { ?>data-selector="<?php echo $field['selector']; ?>" <?php } ?> class="text" type="text" name="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="<?php echo $value; ?>"></div>
		<?php
		break;		
		
		case 'textarea' :
			if($field['rows']) { $rows = $field['rows']; } else { $rows = 4; }
			?>
			<div class="outside"><textarea 
				<?php if($field['selector']) { ?>data-selector="<?php echo $field['selector']; ?>" <?php } ?>
				rows="<?php echo $rows; ?>" class="text" name="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>"><?php echo $value; ?></textarea></div>
			<?php
		break;
		
		case 'htmlcode' :
			if($field['rows']) { $rows = $field['rows']; } else { $rows = 4; }
			?>
			<div class="outside"><textarea rows="<?php echo $rows; ?>" class="text" name="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>"><?php echo base64_decode($value); ?></textarea></div>
			<?php
		break;
		
		case 'editor':
	
			$settings = array( 
				'textarea_rows' => 8,
				'textarea_name' => $field['ID'].'-'.$element_id,
				'media_buttons' => false,
				'quicktags' => false,
				'tinymce' => array(
						'autofocus' => false,
		    		'toolbar1' => 'bold,italic,underline,alignleft,aligncenter,alignright,link,unlink',
		      	'toolbar2' => '',
		      	'toolbar3' => ''
		    )
				 
			);
			wp_editor($value, 'WPFWOptionsEditor'.$field['ID'].'-'.$element_id, $settings); 
		
		break;				
		
		case 'singleupload' :
		?>
			<div class="outside"><span class="button-container upload"><input class="button" type="button" value="Upload" /></span><input class="upload-text text" type="text" name="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value=""></div>
		<?php
		break;				
		
		case 'upload' :
		wpfw_image_uploader($field, $element_id, $value);
		break;		

		case 'selectbox' :
		?>
			<div class="outside select-box-outside">
				<input type="hidden" name="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="<?php echo $value; ?>" />
				<span class="button-container select-box-container">
					<span class="select-box"><span class="controler">&#59228;</span><?php if($value) { echo $field['options'][$value]; } else { echo 'Select ...'; } ?></span>
				</span>
				<div class="select-box-dd">
					<ul class="select-box-options">
						<?php
						$assoc = wpfw_is_assoc($field['options']);
						foreach($field['options'] as $key => $val) {
						if($assco) $data_value = $val; 
							else $data_value = $key;
						?>
						<li data-value="<?php echo $data_value; ?>"><a href="#"><?php echo $val; ?></a></li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		<?php
		break;				
		
		case 'color':
		?>
		<div class="outside color-outside"><input class="color-text text colorpicker" type="text" name="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="<?php echo $value; ?>"></div>
		<?php
		break;						
		
		case 'yesno' :
		?>
		<div class="outside yesno-outside">
				<div class="yesno-container">
					<input type="hidden" name="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" class="yesnoval" value="<?php echo $value; ?>">
					<?php
					$nr = 1; 
					foreach($field['options'] as $key => $val) {
					?>
					<div id="<?php if($nr == 1) { echo $field['options'][1]; } else { echo $field['options'][0]; } ?>" class="<?php if ($nr == 1) { echo 'yes-value'; } else { echo 'no-value'; } ?>"><?php echo $val; ?></div>
					<?php
					$nr++;
					}
					?>
					<span class="button-container yesno"><span class="stripes"></span><input class="button yesno-button" type="button" value="" /></span>
				</div>
			</div>		
		<?php
		break;						
		
		case 'slider':
		if($field['min']) { $min = $field['min']; } else { $min = 0; }
		if($field['max']) { $max = $field['max']; } else { $max = 20; }
		if($field['step']) { $step = $field['step']; } else { $step = 1; }
		?>
		<div class="outside outside-slider">
			<input class="text slider-text" type="text" name="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="<?php echo $value; ?>">
			<div data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-step="<?php echo $step; ?>" class="slider-line"></div>
		</div>		
		<?php
		break;	
		
		case 'format':
		
		?>
		<div class="WPFWFormat">
			<input id="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" type="hidden" name="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="<?php echo $value; ?>" />
			<?php if( !in_array('1-1', $field['exclude'])) { ?><a data-value="1-1" href="#" class="image-format s1-1 <?php if($value == '1-1') echo 'active'; ?>">1:1</a><?php } ?>
			<?php if( !in_array('4-3', $field['exclude'])) { ?><a data-value="4-3" href="#" class="image-format s4-3 <?php if($value == '4-3') echo 'active'; ?>">4:3</a><?php } ?>
			<?php if( !in_array('16-9', $field['exclude'])) { ?><a data-value="16-9" href="#" class="image-format s16-9 <?php if($value == '16-9') echo 'active'; ?>">16:9</a><?php } ?>
			<?php if( !in_array('2-1', $field['exclude'])) { ?><a data-value="2-1" href="#" class="image-format s2-1 <?php if($value == '2-1') echo 'active'; ?>">2:1</a><?php } ?>
			<?php if( !in_array('100-1', $field['exclude'])) { ?><a data-value="100-1" href="#" class="image-format s100-1 <?php if($value == '100-1') echo 'active'; ?>">100%</a><?php } ?>
		</div>
		<?php  
		
		break;
		
		case 'icon': 
			if ($value) { 
			
				$class = 'class="icon-preview '.wpfw_icon_class($value).'"'; 
			}
			?>
			<div <?php echo $class; ?> id="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>-preview">
				<a href="#" class="removeItem icomoon icomoon-close"></a>
			</div>
			<input type="hidden" name="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" id="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="<?php echo $value; ?>" />
			<a href="#" class="IconButton" data-link="<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" >Select Icon</a>
			<?php
		break;
		
		case 'multiple':				
			?>
			<ul class="sortable-elements">
			<?php
			if (!isset($field['defaultnr'])) $field['defaultnr'] = 2;
			for($i = 1; $i <= wpfw_get_elements_nr($post_id, $field['defaultnr'], $element_id) ; $i++) {
				?>
				<li id="element<?php echo $i; ?>" class="element <?php if($i == 1) echo 'open'; ?>">
					<span class="del-element"><span></span></span>
					<a class="element-title" href="#"><span class="sortable-handle">&#9679;<br/>&#9679;<br/>&#9679;<br/></span>Element <?php echo $i; ?></a>
					<div class="element-container">
						<?php
						foreach($field['fields'] as $multiplefield) {
							wpfw_show_option($multiplefield, $post_id, $element_id, true, $i);
						}
						?>
						<div class="cleaner"></div>
					</div>
				</li>
				<?php
			}
			?>
			</ul>
			<div class="cleaner"></div>
			
			<div class="element-sample">
				<li id="element--nr--" class="element">
					<span class="del-element"><span></span></span>
					<a class="element-title" href="#"><span class="sortable-handle">&#9679;<br/>&#9679;<br/>&#9679;<br/></span>Element --nr--</a>
					<div class="element-container">
						<?php
						foreach($field['fields'] as $multiplefield) {
							wpfw_show_option($multiplefield, $post_id, $element_id.'---nr--');
						}
						?>
						<div class="cleaner"></div>
					</div>
				</li>				
			</div>
			
			<div class="cleaner"></div>
			<a href="#" class="add-element">Add New</a>
			<?php
		break;
		
		case 'simplemultiple' :				
			?>
			<ul class="simple-sortable-elements">
			<?php
			if (!isset($field['defaultnr'])) $field['defaultnr'] = 2;
			for($i = 1; $i <= wpfw_get_elements_nr($post_id, $field['defaultnr'], $element_id) ; $i++) {
				?>
				<li id="element<?php echo $i; ?>" class="element">
					<span class="del-element"><span></span></span>
					<span class="sortable-handle">&#9679;<br/>&#9679;<br/>&#9679;<br/></span>
					<?php
					foreach($field['fields'] as $multiplefield) {
						wpfw_show_option($multiplefield, $post_id, $element_id, true, $i);
					}
					?>
					<div class="cleaner"></div>
				</li>
				<?php
			}
			?>
			</ul>
			
			<div class="element-sample">
				<li id="element--nr--" class="element">
					<span class="del-element"><span></span></span>
					<span class="sortable-handle">&#9679;<br/>&#9679;<br/>&#9679;<br/></span>
					<?php
					foreach($field['fields'] as $multiplefield) {
						wpfw_show_option($multiplefield, $post_id, $element_id.'---nr--');
					}
					?>
					<div class="cleaner"></div>
				</li>				
			</div>
			<div class="cleaner"></div>
			<a href="#" class="add-element">Add New</a>
			<?php
		break;		
		case 'multipleimages':
			?>
			<ul class="sortable-elements">
			<?php
			if (!isset($field['defaultnr'])) $field['defaultnr'] = 2;
			for($i = 1; $i <= wpfw_get_elements_nr($post_id, $field['defaultnr'], $element_id) ; $i++) {
				?>
				<li id="element<?php echo $i; ?>" class="element <?php if($i == 1) echo 'open'; ?>">
					<span class="del-element"><span></span></span>
					<a class="element-title" href="#"><span class="sortable-handle">&#9679;<br/>&#9679;<br/>&#9679;<br/></span>Element <?php echo $i; ?></a>
					<div class="element-container">
						<?php
						foreach($field['fields'] as $multiplefield) {
							wpfw_show_option($multiplefield, $post_id, $element_id, true, $i);
						}
						?>
						<div class="cleaner"></div>
					</div>
				</li>
				<?php
			}
			?>
			</ul>
			<div class="cleaner"></div>
			
			<div class="element-sample">
				<li id="element--nr--" class="element">
					<span class="del-element"><span></span></span>
					<a class="element-title" href="#"><span class="sortable-handle">&#9679;<br/>&#9679;<br/>&#9679;<br/></span>Element --nr--</a>
					<div class="element-container">
						<?php
						foreach($field['fields'] as $multiplefield) {
							wpfw_show_option($multiplefield, $post_id, $element_id.'---nr--');
						}
						?>
						<div class="cleaner"></div>
					</div>
				</li>				
			</div>
			
			<div class="cleaner"></div>
			<a href="#" class="add-element">Add New</a>
			<?php		
			break;											
		
	}
	?>
		<?php if (isset($field['desc'])) { ?>	
			<label>
			 <?php echo $field['desc']; ?>
			</label>	
		<?php } ?>
		</div>
	<?php
	
}

function wpfw_is_assoc($a){
   $a = array_keys($a);
   return ($a != array_keys($a));
}

function wpfw_image_uploader($field, $element_id, $value) {
	global $wpdb;
	
	?>
		<input id="ImageName-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" type="hidden" name="ImageName-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="" />
		<div class="WPFWImageDetails <?php if($value['AttachmentID'] > 0) { ?>visible<?php } ?>">
			<label><strong>Image Info</strong></label>
			<a href="#" class="removeItem icomoon icomoon-close"></a>
			<div class="WPFWImagePreview" id="WPFWImagePreview-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>">
				<?php
				if($value['AttachmentID'] > 0) {
					echo wp_get_attachment_image($value['AttachmentID'], 'original');
				}
				?>
			</div>
			<div class="WPFWImageInfo">
				<div class="outside">
					<?php if ($field['title'] != 'false') { ?><input class="small-text" type="text" placeholder="Photo title" name="ImageTitle-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="<?php echo $value['Title']; ?>" /><?php } ?>
					<?php if ($field['alt'] != 'false') { ?><input class="small-text" type="text" placeholder="Alternate text" name="ImageAlt-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="<?php echo $value['Alt']; ?>" /><?php } ?>
					<?php if ($field['caption'] != 'false') { ?><textarea class="small-text" placeholder="Photo Caption" name="ImageCaption-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" rows=2><?php echo $value['Caption']; ?></textarea><?php } ?>
				</div>
			</div>
			<label class="desc">Add the image additional info. All are optional but is strongly recommended to fill in the ALTERNATE TEXT.</label>
			<?php if ($field['format'] != 'false') { 
			
			if($field['format_default']) $format_value = $field['format_default'];
			if($value['Format']) $format_value = $value['Format']; 
			if(!$format_value) $format_value = '1-1';	
			?>
			<div class="WPFWImageFormat">
				<input id="ImageFormat-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" type="hidden" name="ImageFormat-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="<?php echo $format_value; ?>" />
				<a data-value="1-1" href="#" class="image-format s1-1 <?php if($format_value == '1-1') echo 'active'; ?>">1:1</a>
				<a data-value="4-3" href="#" class="image-format s4-3 <?php if($format_value == '4-3') echo 'active'; ?>">4:3</a>
				<a data-value="16-9" href="#" class="image-format s16-9 <?php if($format_value == '16-9') echo 'active'; ?>">16:9</a>
				<a data-value="2-1" href="#" class="image-format s2-1 <?php if($format_value == '2-1') echo 'active'; ?>">2:1</a>
				<a data-value="3-4" href="#" class="image-format s3-4 <?php if($format_value == '3-4') echo 'active'; ?>">3:4</a>
				<a data-value="9-16" href="#" class="image-format s9-16 <?php if($format_value == '9-16') echo 'active'; ?>">9:16</a>
				<a data-value="1-2" href="#" class="image-format s1-2 <?php if($format_value == '1-2') echo 'active'; ?>">1:2</a>
			</div>
			<label class="desc">Please select the image aspect ratio.</label>
			<?php } ?>
			<?php if ($field['size'] != 'false') { ?>
			<div class="outside outside-slider">
				<?php
				if($field['size_min']) { $min = $field['size_min']; } else { $min = 10; }
				if($field['size_max']) { $max = $field['size_max']; } else { $max = 80; }
				if($field['size_step']) { $step = $field['size_step']; } else { $step = 5; }
				
				if($field['size_default']) $size_value = $field['size_default'];
				if($value['Size']) $size_value = $value['Size']; 
				if(!$size_value) $size_value = 35;
				?>
				<input class="text slider-text" type="text" name="ImageSize-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" value="<?php echo $size_value; ?>">
				<div data-min="<?php echo $min; ?>" data-max="<?php echo $max; ?>" data-step="<?php echo $step; ?>"  class="slider-line"></div>
			</div>		
			<label class="desc">Please set up the image width percentage (%) from the column with.</label>
			<?php } ?>
		</div>		
		
		<div class="cleaner"></div>
		<div id="WPFWDropZone-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>">
		<div class="drop_area">
			<div class="text">DROP YOUR FILES HERE <br/>or<br/></div>
				<div class="WPFWUploadButton" id="WPFWUploadButton-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>">
					<span>Browse</span>
					<input class="fileupload" id="fileupload-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>" type="file" name="files[]" multiple />
				</div>
			</div>
			<div class="loading_bar_container"><div class="loading_bar"></div></div>	
		</div>
			
			<?php
			$url = get_bloginfo("template_directory").'/framework/visualeditor/wpfw_uploads/upload.php?visual_editor=true';
				?>
					<script>
					jQuery(function ($) {
			    'use strict';
			    var url = '<?php echo $url; ?>';
			    $("#fileupload-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>").fileupload({
			        maxChunkSize: 40000000,
			        maxNumberOfFiles: 1,
			        url: url,
			        acceptFileTypes: '/(\.|\/)(gif|jpe?g|png)$/i',
			        dataType: 'json',
			        dropZone: $("#WPFWDropZone-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>"),
			        drop: function(e, data) { $("#WPFWDropZone-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>").removeClass("over"); },
			        start: function (e, data) {
			        	$("#WPFWDropZone-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>").removeClass("error").addClass("loading");  
        	
			        },
			        done: function (e, data) {
			            
			            $.each(data.result.files, function (index, file) {
			                	//console.log(file);
			                	
			                	$("#ImageName-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>").val(file.name);
												var file_url = file.url;
												var preview = $("#WPFWImagePreview-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>");
												var format = $("#ImageFormat-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>");
												var image = $("#ImagePreview-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>");
												var f = format.val().split("-");
												if(f[0] > f[1]) {
													preview.html('<img src="'+file_url+'" alt="" width="150"/>');
												}
												else {
													preview.html('<img src="'+file_url+'" alt="" height="150"/>');
												}
												
												photo_format(format, preview);
												
												preview.parent(".WPFWImageDetails").addClass('visible');
												
			            });
			            $("#WPFWDropZone-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>").removeClass("loading");  
			        },
			        fail: function (e, data) {
			        	console.log(data);
			        	$("#WPFWDropZone-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>").addClass("error");  
			        },
			        
			    });
			    
			    $("#WPFWDropZone-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>").on("dragover", function(e) { 
			    	$("#WPFWDropZone-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>").addClass("over"); 
			    });
			    $("#WPFWDropZone-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>").on("dragleave", function(e) { 
			    	$("#WPFWDropZone-<?php echo $field['ID']; ?>-<?php echo $element_id; ?>").removeClass("over"); 
			    });
				
				});
				</script>				
	<?php
	
}

function wpfw_elements_options($post_id) {
	global $wpfw, $wpfw_elements;

	$wpfw_saved_elements = wpfw_get_post_array($post_id);
	// parse all saved elements
	if(is_array($wpfw_saved_elements)) {
		foreach ($wpfw_saved_elements as $wpfwse) {
			$wpfwe = $wpfw_elements[$wpfwse['t']]; // get the options for an object by object type
			?>
			<div class="wpfw-builder-options" id="wpfw-options-<?php echo $wpfwse['id']; ?>">
				
						
				<ul class="top-tabs">
					<?php 
					$nr = 1;
					foreach($wpfwe['Options'] as $wpfweo) { 
						if ($wpfweo['type'] == 'TopTab') {
					?>
						<li <?php if ($nr == 1) { echo 'class="active"'; } ?>><a href="#<?php echo $wpfweo['ID']; ?>-<?php echo $wpfwse['id']; ?>"><?php echo $wpfweo['name']; ?></a></li>
					<?php 
						$nr++;
						} 
						
					}
					?>
				</ul>
				<div class="optionsdesc"><?php echo $wpfwe['Description']; ?></div>
				<?php 
					$nr = 1;
					foreach($wpfwe['Options'] as $wpfweo) { 
						if ($wpfweo['type'] == 'TopTab') {
						?>
						<div id="content-<?php echo $wpfweo['ID']; ?>-<?php echo $wpfwse['id']; ?>" class="tab-content <?php if ($nr == 1) { echo 'active'; } ?>">
						<?php
						foreach($wpfwe['Options'] as $wpfweopt) { 
							if ($wpfweopt['type'] == 'option' && $wpfweopt['parent'] == $wpfweo['ID']) {
									
									wpfw_show_option($wpfweopt['field'], $post_id, $wpfwse['id']);
		
							} 
						}
						$nr++;
						?>
						</div>
						<?php
					}
				}
				?>
				
			</div>
			<?php
		}	
	}
	?>
	<div id="WPFWOptionsEditorContainer">
		<?php 
			$settings = array( 
			'textarea_rows' => 80
		 );
			wp_editor('', 'WPFWOptionsEditor', $settings); 
		?>
		<div class="wpfw-save-bar">
			<div class="wpfw-save-bar-container">
				<input type="button" id="wpfw-advance-editor-cancel" class="button-cancel" value="Exit Without Saving" />		
				<input type="button" id="wpfw-advance-editor-save" class="button-save" value="Save And Exit Advanced Mode" />	
			</div>
		</div>
	</div>
	
	<div id="IconSelectorWindow" class="wpfw_window_bg">
		<div class="wpfw_window large">
			<div class="wpfw_window_title"><div class="close">&#10060;</div>Select Icon</div>
			<input data-url="<?php echo get_bloginfo("template_directory").'/framework/visualeditor/icons-results.php'; ?>" type="text" id="IconSelectorSearch" name="IconSelectorSearch" placeholder="Search icons by tag. Minimum 3 characters." />
			<div id="IconSelector" class="wpfw_window_container">
			
				<?php wpfw_icon_selector(); ?>
			
			</div>
			<div class="wpfw_window_buttons">
				<button class="btn">Use This Icon</button>
			</div>
		</div>
	</div>	
	<?php
	
}
if (!function_exists("wpfw_icon_selector")) {
	function wpfw_icon_selector() {
		global $wpdb;
		
		$icons = $wpdb->get_results("SELECT * FROM wpfw_icons");
		foreach($icons as $icon) {
			
			?>
			<div data-id="<?php echo $icon->ID; ?>" class="iconthumb <?php echo $icon->ClassName; ?>"></div>
			<?php
			
		}
			
	}
}

if (!function_exists("wpfw_ve_enqueue_core_scripts")) {
	function wpfw_ve_enqueue_core_scripts() {
		global $wp_library, $js_library;
		
		if (count($wp_library)) {
			foreach($wp_library as $wp_script_name) {	
				wp_enqueue_script($wp_script_name); 
			}
		}
		
		if (count($js_library)) {
			foreach($js_library as $key => $path) {	
				wp_enqueue_script(
					$key,
					$path[0],
					array('jquery'),
					$path[1],
					true
				);				
			}
		}
	}
}

if (!function_exists("wpfw_ve_enqueue_core_styles")) {
	
	function wpfw_ve_enqueue_core_styles() {
		global $css_library;
		if (count($css_library)) {
			foreach($css_library as $key => $path) {
				if(!isset($path[2])) $path[2] = 'all';
				wp_register_style($key, $path[0], '', $path[1], $path[2]);
				wp_enqueue_style($key);
			}
		}
	
	}
}

if (!function_exists("get_wp_path")) {
	function get_wp_path($filename) {
		$url = explode("wp-content", getcwd());
		if (count($url) <= 1) {
			$url = explode("wp-admin", getcwd());
			if (count($url) <= 1) {
				$url[0] = getcwd()."/";
			}
		}	
		return $url[0].$filename;
	}
}

if(isset($external)) {
	require_once(get_wp_path('wp-load.php'));
	require_once(get_wp_path('wp-includes/pluggable.php'));
	require_once(get_wp_path('wp-admin/includes/upgrade.php'));	
	require_once(get_wp_path('wp-admin/includes/image.php'));
	global $wpdb;
}

if (!function_exists("wpfw_easings")) {
function wpfw_easings() {
	return $easing = array(
	"jswing" => "jswing",
	"easeInQuad" => "easeInQuad",
	"easeOutQuad" => "easeOutQuad",
	"easeInOutQuad" => "easeInOutQuad",
	"easeInCubic" => "easeInCubic",
	"easeOutCubic" => "easeOutCubic",
	"easeInOutCubic" => "easeInOutCubic",
	"easeInQuart" => "easeInQuart",
	"easeOutQuart" => "easeOutQuart",
	"easeInOutQuart" => "easeInOutQuart",
	"easeInQuint" => "easeInQuint",
	"easeOutQuint" => "easeOutQuint",
	"easeInOutQuint" => "easeInOutQuint",
	"easeInSine" => "easeInSine",
	"easeOutSine" => "easeOutSine",
	"easeInOutSine" => "easeInOutSine",
	"easeInExpo" => "easeInExpo",
	"easeOutExpo" => "easeOutExpo",
	"easeInOutExpo" => "easeInOutExpo",
	"easeInCirc" => "easeInCirc",
	"easeOutCirc" => "easeOutCirc",
	"easeInOutCirc" => "easeInOutCirc",
	"easeInElastic" => "easeInElastic",
	"easeOutElastic" => "easeOutElastic",
	"easeInOutElastic" => "easeInOutElastic",
	"easeInBack" => "easeInBack",
	"easeOutBack" => "easeOutBack",
	"easeInOutBack" => "easeInOutBack",
	"easeInBounce" => "easeInBounce",
	"easeOutBounce" => "easeOutBounce",
	"easeInOutBounce" => "easeInOutBounce");
}
}

if (!function_exists("wpfw_effects")) {
function wpfw_effects() {
	return $effect = array(
		"fade" => "Fade In / Fade Out",
		"slidevertical" => "Slide Up / Slide Down"
	);
}
}

if (!function_exists("wpfw_slider_effects")) {
function wpfw_slider_effects($effect='') {
	
	$anything_effects = array(
		"horizontal" => "Horizontal Slide", 
		"vertical" => "Vertical Slide", 
		"fade" => "Fade"
	);
	
	$nivo_effects = array(
		"sliceDown" => "Slice Down",
		"sliceDownLeft" => "Slice Down Left",
		"sliceUp" => "Slice Up",
		"sliceUpLeft" => "Slice Up Left",
		"sliceUpDown" => "Slice Up Down",
		"sliceUpDownLeft" => "Slice Up Down Left",
		"fold" => "Fold",
		"slideInRight" => "Slide In Right",
		"slideInLeft" => "Slide In Left",
		"boxRandom" => "Box Random",
		"boxRain" => "Box Rain",
		"boxRainReverse" => "Box Rain Reverse",
		"boxRainGrow" => "Box Rain Grow",
		"boxRainGrowReverse" => "Box Rain Grow Reverse",
		"nivorandom" => "Nivo Random Effects"
	);
	
	$skitter_effects = array(
		"cube" => "Cube", 
		"cubeRandom" => "Cube Random", 
		"block" => "Block", 
		"cubeStop" => "Cube Stop", 
		"cubeHide" => "Cube Hide", 
		"cubeSize" => "Cube Size", 
		"showBars" => "Show Bars", 
		"showBarsRandom" => "Show Bars Random", 
		"tube" => "Tube", 
		"fadeFour" => "Fade Four", 
		"paralell" => "Paralell", 
		"blind" => "Blind", 
		"blindHeight" => "Blind Height", 
		"blindWidth" => "Blind Width", 
		"directionTop" => "Direction Top", 
		"directionBottom" => "Direction Bottom", 
		"directionRight" => "Direction Right", 
		"directionLeft" => "Direction Left", 
		"cubeStopRandom" => "Cube Stop Random", 
		"cubeSpread" => "Cube Spread", 
		"cubeJelly" => "Cube Jelly", 
		"glassCube" => "Glass Cube", 
		"glassBlock" => "Glass Block", 
		"circles" => "Circles", 
		"circlesInside" => "Circles Inside", 
		"circlesRotate" => "Circles Rotate", 
		"cubeShow" => "Cube Show", 
		"upBars" => "Up Bars", 
		"downBars" => "Down Bars", 
		"hideBars" => "Hide Bars", 
		"swapBars" => "Swap Bars", 
		"swapBarsBack" => "Swap Bars Back", 
		"swapBlocks" => "Swap Blocks", 
		"cut" => "Cut", 
		"randomSmart" => "Random Smart",
		"skitterrandom" => "Skitter Random Effects"
	);
	
	if(!$effect) 
		return array_merge($anything_effects, $nivo_effects);
	
	if($effect) {
		if($anything_effects[$effect]) return 'AnythingSlider';
		if($nivo_effects[$effect]) return 'NivoSlider';
		if($skitter_effects[$effect]) return 'SkitterSlider';
	}
		
	
}
}



if (!function_exists("wpfw_icon_class")) {
function wpfw_icon_class($id) {
		global $wpdb;
		
		$classname = $wpdb->get_results("SELECT ClassName FROM wpfw_icons WHERE ID = ".$id);
		return $classname[0]->ClassName;
}
}

if (!function_exists("wpfw_get_image")) {
	
	function wpfw_get_image($arr=array(), $reset_size = false, $reset_title = false) {
		
		
		$size = ($arr['Size'] > 0 && !$reset_size) ? $arr['Size'] : 100;
		$f = explode('-', $arr['Format']);
		
		if($reset_title) $arr['Title'] = $reset_title;
		
		$img = wp_get_attachment_image_src($arr['AttachmentID'], 'original');
		
		?><img data-image-type="load-after" 
					 data-src="<?php echo $img[0]; ?>" 
					 data-size="<?php echo $size; ?>" 
					 data-aspect-ratio-width="<?php echo $f[0]; ?>"
					 data-aspect-ratio-height="<?php echo $f[1]; ?>"
					 src="" 
					 alt="<?php echo $arr['Alt']; ?>" 
					 title="<?php echo $arr['Title']; ?>" />
					 <?php if ($arr['Caption']) { ?>
					 <span class="image-caption"><?php echo $arr['Caption']; ?></span><?php
					 }
		
		
	}
	
}

?>