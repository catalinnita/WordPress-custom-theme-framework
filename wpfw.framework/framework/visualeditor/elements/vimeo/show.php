<?php
function wpfw_vimeo($ob) {
	
	if($ob['settings']['VimeoURL']) {
	$video_id = substr($ob['settings']['VimeoURL'], 17, 999);
	$display_settings = '';
	if ($ob['settings']['VimeoPortrait'] == 'no') $display_settings .= 'portrait=0&amp;';
	if ($ob['settings']['VimeoTitle'] == 'no') $display_settings .= 'title=0&amp;';
	if ($ob['settings']['VimeoByline'] == 'no') $display_settings .= 'byline=0&amp;';
	if ($ob['settings']['VimeoAutoplay'] == 'yes') $display_settings .= 'autoplay=1&amp;';
	
	?>
	<div class="EmbeddedObject <?php if($ob['settings']['VimeoFormat'] != '100-1') { ?> format format<?php echo $ob['settings']['VimeoFormat']; } ?>">
		<iframe 
			src="//player.vimeo.com/video/<?php echo $video_id; ?>?badge=0&amp;<?php echo $display_settings; ?>color=<?php echo $ob['settings']['VimeoColor']; ?>" 
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