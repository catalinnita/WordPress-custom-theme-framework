<?php
// $_GET['obj'] = element type - ex. SliderItem
// $_GET['id'] = element id in grid
$external="true";

include('visual-editor-functions.php');
include('objects.php');

foreach ($wpfw_elements as $wpfwe) {
	?>
	
	<?php
	if ($wpfwe['ID'] == $_GET['obj']) {
	?>

		<ul class="top-tabs">
			<?php 
			$nr = 1;
			foreach($wpfwe['Options'] as $wpfweo) { 
				if ($wpfweo['type'] == 'TopTab') {
			?>
				<li <?php if ($nr == 1) { echo 'class="active"'; } ?>><a href="#<?php echo $wpfweo['ID']; ?>-<?php echo $_GET['id']; ?>"><?php echo $wpfweo['name']; ?></a></li>
			<?php 
				$nr++;
				} 
				
			}
			?>
		</ul>
		<div class="optionsdesc"><?php echo $wpfwe['Description']; ?></div>
		<?php 
			$nr = 1;
			foreach($wpfwe['Options'] as $wpfweo) { 
				if ($wpfweo['type'] == 'TopTab') {
				?>
				<div id="content-<?php echo $wpfweo['ID']; ?>-<?php echo $_GET['id']; ?>" class="tab-content <?php if ($nr == 1) { echo 'active'; } ?>">
				<?php
				foreach($wpfwe['Options'] as $wpfweopt) { 
					if ($wpfweopt['type'] == 'option' && $wpfweopt['parent'] == $wpfweo['ID']) {
							
							wpfw_show_option($wpfweopt['field'], '', $_GET['id']);

					} 
				}
				$nr++;
				?>
				</div>
				<?php
			}
		}
		?>
		
	<?php
	}	
}
?>