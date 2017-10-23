<?php

function wpfw_text_numbered($ob) {
	
	if($ob['settings']['NumberedArticleTitle']) {
	?>
	<<?php echo $ob['settings']['NumberedArticleTitleTag']; ?>><?php echo $ob['settings']['NumberedArticleTitle']; ?></<?php echo $ob['settings']['NumberedArticleTitleTag']; ?>>
	<?php
	}
	?>
	<div 
		data-background="<?php echo $ob['settings']['NumberedArticleBackground']; ?>"
		data-border-style="<?php echo $ob['settings']['NumberedArticleBorderStyle']; ?>"
		data-border-width="<?php echo $ob['settings']['NumberedArticleBorderWidth']; ?>"
		data-border-color="<?php echo $ob['settings']['NumberedArticleBorderColor']; ?>"
		data-color="<?php echo $ob['settings']['NumberedArticleTextColor']; ?>" 
		data-font-size="<?php echo $ob['settings']['NumberedArticleDropcapSize']; ?>"
		class="dropcap inverse <?php echo $ob['settings']['NumberedArticleDropcapShape']; ?>"><?php echo $ob['settings']['NumberedArticleNumber']; ?></div>
	<?php echo $ob['settings']['NumberedArticleContent']; 
	
}

?>