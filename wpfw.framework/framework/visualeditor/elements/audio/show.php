<?php
function wpfw_hosted_audio($ob) { 
		
		$uploaded = wp_get_attachment_url($ob['settings']['AudioAudio']);
		
		if($ob['settings']['AudioTitle']) {
		?>	
		<div class="audio-player panel panel-default">
				<div class="panel-heading"><?php echo $ob['settings']['AudioTitle']; ?></div>
				<div class="panel-body">
					<audio controls
						data-info-album-art="http://farm5.staticflickr.com/4050/4353986539_ec89b52698_d.jpg"
						data-info-album-title="8874"
						data-info-artist="Billy Murray"
						data-info-title="Come, take a trip in my air-ship"
						data-info-label="Edison Gold Moulded Record"
						data-info-year="1905"
						data-info-att="University of California, Santa Barbara Library."
						data-info-att-link="http://cylinders.library.ucsb.edu/search.php?query=8874">
						<source src="<?php echo $uploaded; ?>" type="audio/mpeg" />
					</audio>
				</div>
			</div>
		
		<?php
		}	else {
		?>
		<div class="audio-player panel panel-default">
			<div class="panel-body">
				<audio controls>
					<source src="<?php echo $uploaded; ?>" type="audio/mpeg" />
				</audio>
			</div>
		</div>
		<?php	
		}
		
}
?>