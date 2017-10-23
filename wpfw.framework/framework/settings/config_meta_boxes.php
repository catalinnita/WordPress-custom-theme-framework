<?php
$sql = "CREATE TABLE IF NOT EXISTS 
					es_extra_tags (
	  				ID bigint(20) NOT NULL AUTO_INCREMENT,
	  				PostID bigint(20) NOT NULL,
						FieldName varchar(255) NOT NULL,
						FieldValue text NOT NULL,
						PRIMARY KEY (`ID`) 
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
			";
					

$wpdb->query($sql);				

$metaboxes = array(

'page' => array (
	'showbuildercontent' => array(
					'box_title' => 'Hide WPFW builder content',
								'box_desc' => 'Please select where you want to show the page builder content or not in this page.',
								'pos' => 'side',
								'fields' => array('showbuildercontent' => array(
																		'type' => 'selectbox',
																		'values' => array('yes' => 'Show', 'no' => 'Hide')
																	)
																 )		
		),
		'hidetitle' => array(
					'box_title' => 'Show/Hide title',
								'box_desc' => 'Please select where you want to show the page title.',
								'pos' => 'side',
								'fields' => array('hidetitle' => array(
																		'type' => 'selectbox',
																		'values' => array('top' => 'On top of the page', 'content' => 'Inside the content box', 'no' => 'Hide it')
																	)
																 )		
		)
),

'post' => array (

		'posttype' => array(
					'box_title' => 'Post type',
								'box_desc' => 'Please select the post type',
								'pos' => 'side',
								'fields' => array('posttype' => array(
																		'type' => 'selectbox',
																		'values' => array('normal'=>'normal', 'mosaic gallery'=>'mosaic gallery', 'video'=>'video'),
																	)
																 )		
		),

		'videolink' => array(
					'box_title' => 'Add video as main thumbnail',
								'box_desc' => 'Please enter here the YouTube vide link as it appears in browser address bar.',
								'pos' => 'normal',
								'fields' => array('videolink' => array(
																		'type' => 'textfield')
																 )		
		),
		
		'showhomepage' => array(
					'box_title' => 'Show on homepage',
								'box_desc' => 'Show this post on homepage?',
								'pos' => 'side',
								'fields' => array('showhomepage' => array(
																		'type' => 'selectbox',
																		'values' => array('no'=>'no', 'yes'=>'yes'),
																	)
																 )		
		),		

	),
	
'blogslider' => array (

		'homesliderinfo' => array(
					'box_title' => 'Slide info',
								'box_desc' => 'Please enter the slide info',
								'pos' => 'normal',
								'fields' => array('sliderlink' => array('type' => 'halftextfield','name'=>'Slide link'),
																	'sliderinfoshow' => array('type' => 'selectbox','name'=>'Show info?', 'values' => array('yes'=>'yes', 'no'=>'no'))
																 )		
		),
		'videoconfig' => array(
					'box_title' => 'Video info',
								'box_desc' => 'Please enter the video link as it appear in browser address bar. This will replace all the other info for this slide.',
								'pos' => 'normal',
								'fields' => array('videolink' => array('type' => 'halftextfield','name'=>'Video link'))
																 )		
		
	),
	
'homeslider' => array (

		'homesliderinfo' => array(
					'box_title' => 'Slide info',
								'box_desc' => 'Please enter the slide info',
								'pos' => 'normal',
								'fields' => array('sliderlink' => array('type' => 'halftextfield','name'=>'Slide link'),
																	'sliderinfoshow' => array('type' => 'selectbox','name'=>'Show info?', 'values' => array('yes'=>'yes', 'no'=>'no'))
																 )		
		),
		'videoconfig' => array(
					'box_title' => 'Video info',
								'box_desc' => 'Please enter the video link as it appear in browser address bar. This will replace all the other info for this slide.',
								'pos' => 'normal',
								'fields' => array('videolink' => array('type' => 'halftextfield','name'=>'Video link'))
																 )		
		
	),
	
'homearticles' => array (

		'homearticleinfo' => array(
					'box_title' => 'Article info',
								'box_desc' => 'Please enter the article info',
								'pos' => 'normal',
								'fields' => array('articlelink' => array('type' => 'halftextfield','name'=>'Article link')
																 )		
		)
	),
	
'homesd' => array (

		'homesdinfo' => array(
					'box_title' => 'Tab extra info',
								'box_desc' => 'Please enter the tab extra info',
								'pos' => 'normal',
								'fields' => array('tabtype' => array('type' => 'selectbox',
																									   'values' => array('article'=>'article', 'video'=>'video'),
																									   'name' => 'Tab content type'),
																	'tabtitle' => array('type' => 'halftextfield','name'=>'Tab title'))
																 		
		),
		'videoconfig' => array(
					'box_title' => 'Tab video info',
								'box_desc' => 'Please enter the video link as it appear in browser address bar',
								'pos' => 'normal',
								'fields' => array('videolink' => array('type' => 'halftextfield','name'=>'Video link'))
																 )		
		)		
				

);


function wpfw_add_metaboxes() {
	global $metaboxes;	
	
	foreach ($metaboxes as $key1 => $mb) {
		foreach ($mb as $key2 => $m) {
			add_meta_box(str_replace(" ", "_", $key2), $m['box_title'], 
	                'extra_tags', $key1, $m['pos'], 'low', array('info' => $m, 'name' => str_replace(" ", "_", $key2)));   
	  } 
	}
}

if (is_admin())
	add_action('admin_menu', 'wpfw_add_metaboxes');

add_action('save_post', 'extra_tags_save');

function extra_tags($post, $metabox) {
	global $wpdb;
	
	$fields = $metabox['args']['info']['fields'];
	?><p class="description"><?php echo $metabox['args']['info']['box_desc']; ?></p><?php
	
	
	foreach ($fields as $key => $field) {
	if (isset($_GET['post'])) {
		$val = $wpdb->get_results("SELECT FieldValue FROM es_extra_tags WHERE FieldName = '".$key."' AND PostID = ".$_GET['post']." LIMIT 0,1");
		if (isset($val[0]->FieldValue)) {
			$default_value = $val[0]->FieldValue;
		}
		else {
			$default_value = '';
		}
	}
	else {
		$default_value = '';
	}
	switch($field['type']) {
			case 'textfield':
				?>
					<fieldset>
						<label><?php echo $field['name']; ?></label>
						<input type="text" name="<?php echo $key; ?>" value="<?php echo $default_value; ?>" style="width: 100%;" />
					</fieldset>
				<?php
			break;
			case 'halftextfield':
				?>
					<fieldset>
						<label style="width: 150px; display: block; float: left; clear: left;"><?php echo $field['name']; ?></label>
						<input type="text" name="<?php echo $key; ?>" value="<?php echo $default_value; ?>" style="width: 50%;" />
					</fieldset>
				<?php
			break;			
			case 'textarea':
				?>
					<fieldset>
						<label><?php echo $field['name']; ?></label>
						<textarea name="<?php echo $key; ?>" style="width: 100%;  height: 150px;"><?php echo $default_value; ?></textarea>
					</fieldset>
				<?php
			break;		
			case 'textarealist':
				?>
					<fieldset>
						<label><?php echo $field['name']; ?></label>
						<textarea name="<?php echo $key; ?>" style="width: 100%;"><?php echo $default_value; ?></textarea>
					</fieldset>
				<?php
			break;				
			case 'selectbox':
				?>
					<fieldset>
						<label style="width: 150px; display: block; float: left; clear: left;"><?php echo $field['name']; ?></label>
						<select name="<?php echo $key; ?>">
							<?php
							foreach($field['values'] as $key => $value) {
							?>
								<option value="<?php echo $key; ?>" <?php if ($default_value == $key) { echo ' selected="selected"'; } ?>><?php echo $value; ?></option>
							<?php
							}
							?>
						</select>
					</fieldset>
				<?php
			break;			
		}
	if (isset($field['help'])) {
		?>
		<p class="description"><?php echo $field['help']; ?></p>
		<?php
	}
	}
}
function extra_tags_save($post_id) {
	global $wpdb, $metaboxes;
	
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
     return $postID;
     
	if (isset($_POST['post_ID'])) {
     
  $posttype = get_post_type($_POST['post_ID']);
  
  if (count($metaboxes[$posttype]) > 0) {
  	
  foreach($metaboxes[$posttype] as $mkey => $mmb) {
  	//print_r($metaboxes[$posttype][$mkey]['fields']);
  	foreach($metaboxes[$posttype][$mkey]['fields'] as $key => $mb) {
  	
  	$fieldname = str_replace(" ", "_", $key);
	
		// something is filled in
  	if ($_POST[$fieldname]) {
  		
  		$check = $wpdb->get_results("SELECT ID FROM es_extra_tags 
  																WHERE FieldName = '".$fieldname."' 
  																	AND PostID = ".$_POST['post_ID']." 
  																		LIMIT 0,1");
  		//entry exists
  		if (!$check[0]->ID) {
  			$wpdb->query("INSERT INTO es_extra_tags (PostID, FieldName, FieldValue) 
  																			 VALUES (".$_POST['post_ID'].", '".$fieldname."', '".$_POST[$fieldname]."')");
  		}
  		else {
  			$wpdb->query("UPDATE es_extra_tags SET
  											FieldValue = '".$_POST[$fieldname]."'
  												WHERE PostID = ".$_POST['post_ID']."
  													AND FieldName = '".$fieldname."'");
  		}
  	}
  	// the field is empty
  	else {
  		$wpdb->query("DELETE FROM es_extra_tags 
  										WHERE FieldName = '".$fieldname."'
  											AND PostID = ".$_POST['post_ID']);
  	}
  	}	
  }
	}
	}
	
}

function getmb($fieldname, $id='') {
	global $wpdb, $metaboxes;
	
	// put the post id automatic
	if (!$id) { $id = get_the_ID(); }
	
	$fieldvalue = $wpdb->get_results("SELECT FieldValue FROM es_extra_tags 
  																WHERE FieldName = '".$fieldname."' 
  																	AND PostID = ".$id." 
  																		LIMIT 0,1");
	
	if(isset($fieldvalue[0]->FieldValue)) {
	$postype = get_post_type($id);
	$check = explode(",", str_replace(", ", ",", $fieldvalue[0]->FieldValue));
	
	if (count($check) > 1) {
		
		$vals = $check;
		if (count($vals) > 0 && strlen($vals[0]) > 1) {
			return $vals;
		}
		else {
			return false;
		}
	}
	else {
		if (isset($fieldvalue[0]->FieldValue)) {
			return $fieldvalue[0]->FieldValue;
		}
		else {
			return false;
		}
	}
	}
	else {
		return false;
	}

}

function mb($fieldname, $id='') {
	global $wpdb, $metaboxes;
	
	if (!$id) { $id = get_the_ID(); }
	echo getmb($fieldname, $id);
	
	if(isset($_POST['post_ID'])) {
	$sidebarexists = $wpdb->get_var($wpdb->prepare("SELECT ID FROM es_posts_sidebar WHERE PostID = ".$_POST['post_ID'], ""));		
	}
	
	if ($sidebarexists) {
		if ($_POST['SideBar'] != 0) {
		$wpdb->query("UPDATE es_posts_sidebar SET 
			SidebarID = '".$_POST['SideBar']."'
				WHERE PostID = ".$_POST['post_ID'] );		
		}
		else {
		$wpdb->query("DELETE FROM es_posts_sidebar 
				WHERE PostID = ".$_POST['post_ID'] );					
		}
	}
	else {
		if ($_POST['SideBar'] != 0) {
		$wpdb->query("INSERT INTO es_posts_sidebar 
			(PostID, SidebarID)
				VALUES (".$_POST['post_ID'].",".$_POST['SideBar'].")");
		}
	}
	

}

?>