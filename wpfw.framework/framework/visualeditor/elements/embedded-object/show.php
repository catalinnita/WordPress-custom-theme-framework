<?php
function wpfw_embedded_object($ob) {
	
	?>
	<div class="EmbeddedObject <?php if($ob['settings']['EmbeddedObjectFormat'] != '100-1') { ?> format format<?php echo $ob['settings']['EmbeddedObjectFormat']; } ?>">
		<?php echo base64_decode($ob['settings']['EmbeddedObject']); ?>
	</div>
	<?php
		
}
?>