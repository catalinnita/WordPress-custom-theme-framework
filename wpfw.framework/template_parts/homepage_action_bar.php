<!-- Action Bar Start -->
<div id="HomepageActionBarShadow">	
	<div id="HomepageActionBar">
		<?php if(of_get_option("abtitle")) { ?><h1><?php echo of_get_option("abtitle"); ?></h1><?php } ?>
		<?php if(of_get_option("abtext")) { ?><p><?php echo of_get_option("abtext"); ?></p><?php } ?>
		<?php if(of_get_option("abbuttontext")) { ?><a href="<?php echo of_get_option("abbuttonlink"); ?>"><?php echo of_get_option("abbuttontext"); ?></a><?php } ?>
		<div class="cleaner"></div>
	</div>
</div>
<!-- Action Bar End -->