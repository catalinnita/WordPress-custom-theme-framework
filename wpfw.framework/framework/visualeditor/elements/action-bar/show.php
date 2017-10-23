<?php
function wpfw_action_bar($ob) {
	?>
	<div class="jumbotron">
  <?php if($ob['settings']['ActionBarTitle']) { ?>
  <<?php echo $ob['settings']['ActionBarTitleTag']; ?>><?php echo $ob['settings']['ActionBarTitle']; ?></<?php echo $ob['settings']['ActionBarTitleTag']; ?>>
	<?php } 
  echo $ob['settings']['ActionBarContent'];
  ?>
  <?php
  if($ob['settings']['ActionBarButtonText'] && $ob['settings']['ActionBarButtonLink']) {
  ?>
  <p><a href="<?php echo $ob['settings']['ActionBarButtonLink']; ?>" target="<?php echo $ob['settings']['ActionBarButtonTarget']; ?>" class="btn btn-<?php echo strtolower($ob['settings']['ActionBarButtonStyle']); ?> btn-lg" role="button"><?php echo $ob['settings']['ActionBarButtonText']; ?></a></p>
  <?php
	}
	?>
</div>
<?php
}
?>