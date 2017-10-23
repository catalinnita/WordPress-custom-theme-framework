<?php
function wpfw_article_top_thumb($ob) {
	
	if($ob['settings']['ArticleTopThumbPic']['AttachmentID'] && $ob['settings']['ArticleTopThumbPosition'] == 'before') {
		if($ob['settings']['ArticleTopThumbLink']) { ?>
		<a data-background="<?php echo $ob['settings']['ArticleTopThumbBackground']; ?>"
			 data-border-style="<?php echo $ob['settings']['ArticleTopThumbBorderStyle']; ?>"
			 data-border-width="<?php echo $ob['settings']['ArticleTopThumbBorderWidth']; ?>"
			 data-border-color="<?php echo $ob['settings']['ArticleTopThumbBorderColor']; ?>"
			 href="<?php echo $ob['settings']['ArticleTopThumbLink']; ?>" 
			 target="<?php echo $ob['settings']['ArticleTopThumbTarget']; ?>" 
			 class="thumbnail thumbnail-<?php echo $ob['settings']['ArticleTopThumbShape']; ?> thumbnail-top pw-<?php echo $ob['settings']['ArticleTopThumbPic']['Size']; ?>">
		<?php } else { ?>
		<div data-background="<?php echo $ob['settings']['ArticleTopThumbBackground']; ?>"
			 data-border-style="<?php echo $ob['settings']['ArticleTopThumbBorderStyle']; ?>"
			 data-border-width="<?php echo $ob['settings']['ArticleTopThumbBorderWidth']; ?>"
			 data-border-color="<?php echo $ob['settings']['ArticleTopThumbBorderColor']; ?>"
			 class="thumbnail thumbnail-<?php echo $ob['settings']['ArticleTopThumbShape']; ?> thumbnail-top pw-<?php echo $ob['settings']['ArticleTopThumbPic']['Size']; ?>">		
		<?php } ?>
			<?php echo wpfw_get_image($ob['settings']['ArticleTopThumbPic'], true); ?>
		<?php if($ob['settings']['ArticleTopThumbLink']) { ?>
		</a>
		<?php 
		} else {
		?>
		</div>	
		<?php }
	}
	?>
	<?php
	if ($ob['settings']['ArticleTopThumbTitle']) {
	?>
	<<?php echo $ob['settings']['ArticleTopThumbTitleTag']; ?> class="title text-align-<?php echo $ob['settings']['ArticleTopThumbTitleAlign']; ?>"><?php echo $ob['settings']['ArticleTopThumbTitle']; ?></<?php echo $ob['settings']['ArticleTopThumbTitleTag']; ?>>
	<?php } ?>

	<?php 
	if($ob['settings']['ArticleTopThumbPic']['AttachmentID'] && $ob['settings']['ArticleTopThumbPosition'] == 'after') {
		if($ob['settings']['ArticleTopThumbLink']) { ?>
		<a data-background="<?php echo $ob['settings']['ArticleTopThumbBackground']; ?>"
			 data-border-style="<?php echo $ob['settings']['ArticleTopThumbBorderStyle']; ?>"
			 data-border-width="<?php echo $ob['settings']['ArticleTopThumbBorderWidth']; ?>"
			 data-border-color="<?php echo $ob['settings']['ArticleTopThumbBorderColor']; ?>"
			 href="<?php echo $ob['settings']['ArticleTopThumbLink']; ?>" 
			 target="<?php echo $ob['settings']['ArticleTopThumbTarget']; ?>" 
			 class="thumbnail thumbnail-<?php echo $ob['settings']['ArticleTopThumbShape']; ?> thumbnail-top pw-<?php echo $ob['settings']['ArticleTopThumbPic']['Size']; ?>">
		<?php } else { ?>
		<div data-background="<?php echo $ob['settings']['ArticleTopThumbBackground']; ?>"
			 data-border-style="<?php echo $ob['settings']['ArticleTopThumbBorderStyle']; ?>"
			 data-border-width="<?php echo $ob['settings']['ArticleTopThumbBorderWidth']; ?>"
			 data-border-color="<?php echo $ob['settings']['ArticleTopThumbBorderColor']; ?>"
			 class="thumbnail thumbnail-<?php echo $ob['settings']['ArticleTopThumbShape']; ?> thumbnail-top pw-<?php echo $ob['settings']['ArticleTopThumbPic']['Size']; ?>">		
		<?php } ?>
			<?php echo wpfw_get_image($ob['settings']['ArticleTopThumbPic'], true); ?>
		<?php if($ob['settings']['ArticleTopThumbLink']) { ?>
		</a>
		<?php 
		} else {
		?>
		</div>	
		<?php }
	}
	
	
	echo $ob['settings']['ArticleTopThumbContent']; ?>	
	<?php
	if($ob['settings']['ArticleTopThumbButtonText'] && $ob['settings']['ArticleTopThumbLink']) {
		?>
		<a href="<?php echo $ob['settings']['ArticleTopThumbLink']; ?>" target="<?php echo $ob['settings']['ArticleTopThumbTarget']; ?>" class="btn btn-<?php echo strtolower($ob['settings']['ArticleTopThumbButtonStyle']); ?>" role="button"><?php echo $ob['settings']['ArticleTopThumbButtonText']; ?></a>
		<?php
	}

}

?>