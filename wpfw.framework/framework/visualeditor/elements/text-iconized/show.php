<?php
function wpfw_text_iconized($ob) {
	
	if ($ob['settings']['IconizedArticleAlign'] == 'center') {
	?>
	<div data-font-size="<?php echo $ob['settings']['IconizedArticleSize']; ?>"
			 data-color="<?php echo '#'.$ob['settings']['IconizedArticleColor']; ?>" 
 			 data-background="<?php echo $ob['settings']['IconizedArticleBackground']; ?>"
			 data-border-style="<?php echo $ob['settings']['IconizedArticleBorderStyle']; ?>"
			 data-border-width="<?php echo $ob['settings']['IconizedArticleBorderWidth']; ?>"
			 data-border-color="<?php echo $ob['settings']['IconizedArticleBorderColor']; ?>"			 
			 class="dropcap inverse <?php echo $ob['settings']['IconizedArticleDropcapShape']; ?> icon-drop-cap align-<?php echo $ob['settings']['IconizedArticleAlign']; ?> <?php echo wpfw_icon_class($ob['settings']['IconizedIcon']); ?>"></div>
	<?php } 
	if ($ob['settings']['IconizedArticleTitle']) {
	?>
	<<?php echo $ob['settings']['IconizedArticleTitleTag']; ?> class="text-align-<?php echo $ob['settings']['IconizedArticleTitleAlign']; ?>"><?php echo $ob['settings']['IconizedArticleTitle']; ?></<?php echo $ob['settings']['IconizedArticleTitleTag']; ?>>
	<?php } ?>
	<?php if ($ob['settings']['IconizedArticleAlign'] != 'center') { ?>
	<div data-font-size="<?php echo $ob['settings']['IconizedArticleSize']; ?>"
			 data-color="<?php echo '#'.$ob['settings']['IconizedArticleColor']; ?>" 
 			 data-background="<?php echo $ob['settings']['IconizedArticleBackground']; ?>"
			 data-border-style="<?php echo $ob['settings']['IconizedArticleBorderStyle']; ?>"
			 data-border-width="<?php echo $ob['settings']['IconizedArticleBorderWidth']; ?>"
			 data-border-color="<?php echo $ob['settings']['IconizedArticleBorderColor']; ?>"			 
			 class="dropcap inverse <?php echo $ob['settings']['IconizedArticleDropcapShape']; ?> icon-drop-cap align-<?php echo $ob['settings']['IconizedArticleAlign']; ?> <?php echo wpfw_icon_class($ob['settings']['IconizedIcon']); ?>"></div>
	<?php } ?>
	<?php echo $ob['settings']['IconizedArticleContent']; ?>	
<?php
}
?>