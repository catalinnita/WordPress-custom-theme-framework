<?php
if ($_POST['like-id'] && $_POST['update_likes'] == 1) {
	es_update_likes($_POST['like-id']);
	$_POST['update_likes'] = 0;
}
?>
<form class="likes-form" id="likes-<?php the_ID(); ?>" name="likes-<?php the_ID(); ?>" method="post" action="<?php echo curPageURL(); ?>">
	<input type="hidden" name="like-id" value="<?php the_ID(); ?>">
	<input type="hidden" name="update_likes" value="1">
	<a href="#" class="likes"><span class="loading"></span><?php echo es_get_likes(get_the_ID()); ?></a>
</form>