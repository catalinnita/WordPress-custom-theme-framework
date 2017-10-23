<?php
function wpfw_divider($ob) {
	
	?>
	<div data-border-color="<?php echo $ob['settings']['DividerColor']; ?>" class="divider <?php echo strtolower($ob['settings']['DividerType']); ?>"></div>
	<?php
		
}
?>