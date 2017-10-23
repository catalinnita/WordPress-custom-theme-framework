<?php
function wpfw_youtube($ob) {
	
	if($ob['settings']['YouTubeURL']) {

	$video_id = substr(str_replace("http://", "", str_replace("https://", "", str_replace("www.", "", $ob['settings']['YouTubeURL']))), 20, 999);
	
	$display_settings = '';
	$display_settings .= 'autohide='.$ob['settings']['YouTubeAutoHide'].'&amp;';
	if ($ob['settings']['YouTubeLogo'] == 'yes') $display_settings .= 'modestbranding=1&amp;';
	if ($ob['settings']['YouTubeAutoplay'] == 'yes') $display_settings .= 'autoplay=1&amp;';
	if ($ob['settings']['YouTubeRelated'] == 'no') $display_settings .= 'rel=0&amp;';
	if ($ob['settings']['YouTubeInfo'] == 'no') $display_settings .= 'showinfo=0&amp;';
	$display_settings .= 'theme='.$ob['settings']['YouTubeTheme'].'&amp;';
	if ($ob['settings']['YouTubeStart']) $display_settings .= 'start='.$ob['settings']['YouTubeStart'].'&amp;';
	if ($ob['settings']['YouTubeEnd']) $display_settings .= 'end='.$ob['settings']['YouTubeEnd'].'&amp;';
	
	?>
	<div class="EmbeddedObject <?php if($ob['settings']['YouTubeFormat'] != '100-1') { ?> format format<?php echo $ob['settings']['YouTubeFormat']; } ?>">
		<iframe 
			src="http://www.youtube.com/embed/<?php echo $video_id; ?>?<?php echo $display_settings; ?>color=<?php echo $ob['settings']['YouTubeColor']; ?>" 
			width="971" 
			height="546" 
			frameborder="0" 
			
			webkitallowfullscreen 
			mozallowfullscreen 
			allowfullscreen
			
		></iframe> 
	</div>
	<?php
	}
		
}
?>