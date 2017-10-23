<!-- Homepage Article Start -->
<div id="HomepageArticle">
<?php
	
	// page type
	if (of_get_option("fatype") == 'page') { 
		if (of_get_option("about") > 0) {
			$r = new WP_Query('page_id='.of_get_option("about"));
			while ($r->have_posts()) : $r->the_post(); 
			?>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<?php
			endwhile;
		} 
	}
	
	// custom text
	if (of_get_option("fatype") == 'custom text') { 
		if (of_get_option("ctpic")) { 
		?>
			<a class="align<?php echo of_get_option("fatalign"); ?>" href="<?php echo of_get_option("ctlinkurl"); ?>"><img src="<?php echo of_get_option("ctpic"); ?>" /></a>
		<?php
		}
		?>
		<h2><?php echo of_get_option("cttitle"); ?></h2>
		<p><?php echo nl2br(of_get_option("cttext")); ?></p>
		<p><a href="<?php echo of_get_option("ctlinkurl"); ?>" class="button"><?php echo of_get_option("ctlinktext"); ?></a></p>
		<?php 
	} 
	
	// image
	if (of_get_option("fatype") == 'image') { 
	?>
		<center>
		<a href="<?php echo of_get_option("ctlinkurl"); ?>"><img src="<?php echo of_get_option("ctpic"); ?>" /></a>
		</center>
		<?php
	}
	
	// html code				
	if (of_get_option("fatype") == 'HTML code') { 
		echo of_get_option("htmlcode");
	}
?>

</div>
<!-- Homepage Article End -->

