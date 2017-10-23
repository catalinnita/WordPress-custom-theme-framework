<ul class="top-tabs">
	<li class="active"><a href="#Articles">Simple Elements</a></li>
	<li class=""><a href="#ComplexElements">Complex Elements</a></li>
	<li class=""><a href="#MediaElements">Media Elements</a></li>
	<li class=""><a href="#CustomElements">Custom Elements</a></li>
	<li class=""><a href="#CustomPostTypes">Custom Post Types</a></li>
	<li class="right menu"><a href="#">&#9776;</a>
		<ul class="sub-menu">
			<li><a href="<?php echo get_permalink($_GET['post_id']); ?>" target="_blank" class="highlight">Preview Website</a></li>
			<li><a id="visual-editor-close" href="#" class="highlight">Close Visual Editor</a></li>

			<li><a href="#">Help</a></li>
			<li><a href="#">Support</a></li>

			<li><a href="#">About WPFW</a></li>
		</ul></li>
	<!--<li class="right"><a href="#PageLayout">Page Layout</a></li>
	<li class="right"><a href="#Saved Templates">Saved Templates</a></li>-->
</ul>
<ul id="sortable1" class='droptrue'>
		<?php
			// get elements bar
			foreach ($wpfw_elements as $wpfwe) {
		?>
			<li class="ui-state-default element <?php echo $wpfwe['Parent']; ?> <?php echo $wpfwe['ID']; ?>">
				<span id="<?php echo $wpfwe['ID']; ?>" class="container">
					<span class="icon" style="background: url(<?php echo $default_path.$wpfwe['Icon']; ?>) left -15px no-repeat;"></span>
					<span class="title">
						<span class="del"></span>
						<?php echo $wpfwe['Name']; ?>
					</span>
				</span>
			</li>		
		<?php
		}
		?>
		</ul>