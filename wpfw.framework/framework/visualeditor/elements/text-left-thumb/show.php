<?php
function wpfw_article_left_thumb($ob) {
	
	if($ob['settings']['ArticleLeftThumbPic']['AttachmentID'] && $ob['settings']['ArticleLeftThumbPosition'] == 'before') {
		if($ob['settings']['ArticleLeftThumbLink']) { ?>
		<a data-background="<?php echo $ob['settings']['ArticleLeftThumbBackground']; ?>"
			 data-border-style="<?php echo $ob['settings']['ArticleLeftThumbBorderStyle']; ?>"
			 data-border-width="<?php echo $ob['settings']['ArticleLeftThumbBorderWidth']; ?>"
			 data-border-color="<?php echo $ob['settings']['ArticleLeftThumbBorderColor']; ?>"
			 href="<?php echo $ob['settings']['ArticleLeftThumbLink']; ?>" 
			 target="<?php echo $ob['settings']['ArticleLeftThumbTarget']; ?>" 
			 class="thumbnail thumbnail-<?php echo $ob['settings']['ArticleLeftThumbShape']; ?> thumbnail-<?php echo $ob['settings']['ArticleLeftThumbAlign']; ?> pw-<?php echo $ob['settings']['ArticleLeftThumbPic']['Size']; ?>">
		<?php } else { ?>
		<div data-background="<?php echo $ob['settings']['ArticleLeftThumbBackground']; ?>"
			 data-border-style="<?php echo $ob['settings']['ArticleLeftThumbBorderStyle']; ?>"
			 data-border-width="<?php echo $ob['settings']['ArticleLeftThumbBorderWidth']; ?>"
			 data-border-color="<?php echo $ob['settings']['ArticleLeftThumbBorderColor']; ?>"
			 class="thumbnail thumbnail-<?php echo $ob['settings']['ArticleLeftThumbShape']; ?> thumbnail-<?php echo $ob['settings']['ArticleLeftThumbAlign']; ?> pw-<?php echo $ob['settings']['ArticleLeftThumbPic']['Size']; ?>">		
		<?php } ?>
			<?php echo wpfw_get_image($ob['settings']['ArticleLeftThumbPic'], true); ?>
		<?php if($ob['settings']['ArticleLeftThumbLink']) { ?>
		</a>
		<?php 
		} else {
		?>
		</div>	
		<?php }
	}
	?>
	<?php
	if ($ob['settings']['ArticleLeftThumbTitle']) {
	?>
	<<?php echo $ob['settings']['ArticleLeftThumbTitleTag']; ?> class="title"><?php echo $ob['settings']['ArticleLeftThumbTitle']; ?></<?php echo $ob['settings']['ArticleLeftThumbTitleTag']; ?>>
	<?php } ?>

	<?php 
	if($ob['settings']['ArticleLeftThumbPic']['AttachmentID'] && $ob['settings']['ArticleLeftThumbPosition'] == 'after') {
		if($ob['settings']['ArticleLeftThumbLink']) { ?>
		<a data-background="<?php echo $ob['settings']['ArticleLeftThumbBackground']; ?>"
			 data-border-style="<?php echo $ob['settings']['ArticleLeftThumbBorderStyle']; ?>"
			 data-border-width="<?php echo $ob['settings']['ArticleLeftThumbBorderWidth']; ?>"
			 data-border-color="<?php echo $ob['settings']['ArticleLeftThumbBorderColor']; ?>"
			 href="<?php echo $ob['settings']['ArticleLeftThumbLink']; ?>" 
			 target="<?php echo $ob['settings']['ArticleLeftThumbTarget']; ?>" 
			 class="thumbnail thumbnail-<?php echo $ob['settings']['ArticleLeftThumbShape']; ?> thumbnail-<?php echo $ob['settings']['ArticleLeftThumbAlign']; ?> pw-<?php echo $ob['settings']['ArticleLeftThumbPic']['Size']; ?>">
		<?php } else { ?>
		<div data-background="<?php echo $ob['settings']['ArticleLeftThumbBackground']; ?>"
			 data-border-style="<?php echo $ob['settings']['ArticleLeftThumbBorderStyle']; ?>"
			 data-border-width="<?php echo $ob['settings']['ArticleLeftThumbBorderWidth']; ?>"
			 data-border-color="<?php echo $ob['settings']['ArticleLeftThumbBorderColor']; ?>"
			 class="thumbnail thumbnail-<?php echo $ob['settings']['ArticleLeftThumbShape']; ?> thumbnail-<?php echo $ob['settings']['ArticleLeftThumbAlign']; ?> pw-<?php echo $ob['settings']['ArticleLeftThumbPic']['Size']; ?>">		
		<?php } ?>
			<?php echo wpfw_get_image($ob['settings']['ArticleLeftThumbPic'], true); ?>
		<?php if($ob['settings']['ArticleLeftThumbLink']) { ?>
		</a>
		<?php 
		} else {
		?>
		</div>	
		<?php }
	}
	
	
	echo $ob['settings']['ArticleLeftThumbContent']; ?>	
	<?php
	if($ob['settings']['ArticleLeftThumbButtonText'] && $ob['settings']['ArticleLeftThumbLink']) {
		?>
		<a href="<?php echo $ob['settings']['ArticleLeftThumbLink']; ?>" target="<?php echo $ob['settings']['ArticleLeftThumbTarget']; ?>" class="btn btn-<?php echo strtolower($ob['settings']['ArticleLeftThumbButtonStyle']); ?>" role="button"><?php echo $ob['settings']['ArticleLeftThumbButtonText']; ?></a>
		<?php
	}

}

?>