<?php
function wpfw_text_simple($ob) {
	
	if($ob['settings']['SimpleArticleTitle']) {
	?>
	<<?php echo $ob['settings']['SimpleArticleTitleTag']; ?>><?php echo $ob['settings']['SimpleArticleTitle']; ?></<?php echo $ob['settings']['SimpleArticleTitleTag']; ?>>
	<?php } ?>
	<?php echo $ob['settings']['SimpleArticleContent']; 
	
}
?>