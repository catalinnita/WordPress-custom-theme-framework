<?php
$youtube_options = array();
$youtube_options[] = array('ID' => 'YouTubeConfig',
													'type' => 'TopTab', 
													'name' => 'Layout',
													'title' => '');
													
$youtube_options[] = array('ID' => 'YouTubeConfigControl',
													'type' => 'TopTab', 
													'name' => 'Control',
													'title' => '');													

$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfig',
													'field' => array('ID' => 'YouTubeURL',
																					 'name' => 'URL',
																					 'type' => 'textarea',
																					 'rows' => 4,
																					 'desc' => 'Please add the YouTube video URL exactly like it appears in your browser address bar.<br/>
																					 						<b>Ex. https://www.youtube.com/watch?v=oWeL1bXPjdc</b>',
																					 'default' => ''));			
																					 
$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfig',
													'field' => array('ID' => 'YouTubeFormat',
																					 'name' => 'Aspect ratio',
																					 'type' => 'format',
																					 'desc' => 'Please select the aspect ratio for the embedded object.',
																					 'default' => '16-9'));		
																					 
$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfig',
													'field' => array('ID' => 'YouTubeAutoHide',
																					 'name' => 'Auto hide the controls',
																					 'type' => 'selectbox',
																					 'default' => '2',
																					 'options' => array('0'=>'No', '1'=>'On Inactive', '2'=>'Progess Bar'),
																					 'desc' => 'This parameter indicates whether the video controls will automatically hide after a video begins 						playing. The default behavior <b>PROGESS BAR</b> is for the video progress bar to fade out while 						the player controls (play button, volume control, etc.) remain visible.<br/>
																					 						If this parameter is set to <b>ON INACTIVE</b>, then the video progress bar and the player controls will slide out of view a couple of seconds after the video starts playing. They will only reappear if the user moves her mouse over the video player or presses a key on her keyboard.<br/>
																					 						If this parameter is set to <b>NO</b>, the video progress bar and the video player controls will be visible throughout the video and in fullscreen.'));		
																					 
$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfigControl',
													'field' => array('ID' => 'YouTubeAutoplay',
																					 'name' => 'Autoplay',
																					 'type' => 'yesno',
																					 'default' => 'no',
																					 'options' => array('yes', 'no'),
																					 'desc' => 'Do you want this video to start when the page is loaded?'));																						 
																					 
$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfig',
													'field' => array('ID' => 'YouTubeColor',
																					 'name' => 'Video Color',
																					 'type' => 'selectbox',
																					 'options' => array('red'=>'Red', 'white'=>'White'),
																					 'default' => 'red',
																					 'desc' => 'Select the video color'));
																					 
																					 
$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfig',
													'field' => array('ID' => 'YouTubeTheme',
																					 'name' => 'Controls bar theme',
																					 'type' => 'selectbox',
																					 'options' => array('dark'=>'Dark', 'light'=>'Light'),
																					 'default' => 'dark',
																					 'desc' => 'This parameter indicates whether the embedded player will display player controls (like a play button or volume control) within a dark or light control bar.'));																					 
																					 

$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfig',
													'field' => array('ID' => 'YouTubeLogo',
																					 'name' => 'Remove YouTube Logo',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no'),
																					 'desc' => 'Select yes for removing the YouTube logo from player. This option works just with <b>RED</b> color.'));									
	
																					 
$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfig',
													'field' => array('ID' => 'YouTubeInfo',
																					 'name' => 'Show video info',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no'),
																					 'desc' => 'If you set the parameter value to <b>NO</b>, then the player will not display information like the video title and uploader before the video starts playing.'));						
																					 
$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfigControl',
													'field' => array('ID' => 'YouTubeStart',
																					 'name' => 'Start',
																					 'type' => 'textfield',
																					 'default' => '',
																					 'width' => 'half',
																					 'desc' => 'This parameter causes the player to begin playing the video at the given number of SECONDS from the start of the video.'));	
																					 
$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfigControl',
													'field' => array('ID' => 'YouTubeEnd',
																					 'name' => 'End',
																					 'type' => 'textfield',
																					 'default' => '',
																					 'width' => 'half',
																					 'desc' => 'This parameter specifies the time, measured in SECONDS from the start of the video, when the player should stop playing the video.'));		
																					 
																					 
$youtube_options[] = array('type' => 'option', 													
													'parent' => 'YouTubeConfigControl',
													'field' => array('ID' => 'YouTubeRelated',
																					 'name' => 'Show related videos',
																					 'type' => 'yesno',
																					 'default' => 'yes',
																					 'options' => array('yes', 'no'),
																					 'desc' => 'This parameter indicates whether the player should show related videos when playback of the initial video ends.'));																							 																				 																						 																 																																 												 																					 							
													
$youtube_item = array(
	'ID' => 'YouTubeVideo',
	'Name' => 'YouTube Video',
	'Description' => 'Add a <a href="http://YouTube.com" target="_blank">YouTube</a> video and set up all possible YouTube api settings. Please follow the instructions for best results.',
	'PHP' => array('youtube/show.php'),
	'Func' => 'wpfw_youtube',
	'Icon' => 'elements/youtube/images/icon.png',
	'Order' => 1,
	'Parent' => 'MediaElements',
	'Options' => $youtube_options
);

wpfw_add_builder_item($youtube_item);
?>