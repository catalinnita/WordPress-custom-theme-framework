<?php

function wpfw_map($ob) {
	if($ob['settings']['MapType'] == 'Static Image') {
		
		$ar = explode("-", $ob['settings']['MapHeight']);
		
		$mapwidth = $ob['w'];
		if($mapwidth > 640) $mapwidth = 640;
		$mapheight = intval($mapwidth*$ar[1]/$ar[0]);
		
		$src = 'center='.$ob['settings']['MapLat'].','.$ob['settings']['MapLng'];
		$src .= '&zoom='.$ob['settings']['MapZoom'];
		$src .= '&size='.$mapwidth.'x'.$mapheight;
		$src .= '&scale=2';
		$src .= '&maptype='.strtolower($ob['settings']['MapDesign']);
		
		if(count($ob['settings']['elements']) > 0) {
		  
		  foreach($ob['settings']['elements'] as $element) { 
		  	if($element['MapPinLatitude'] && $element['MapPinLongitude']) {
		  		$src .= '&markers=';
		  		$src .= 'color:0x'.$element['MapPinColor'];
		  		$src .= '%7Clabel:'.$element['MapPinLabel'];
		  		$src .= '%7C'.$element['MapPinLatitude'].','.$element['MapPinLongitude'];
		  	}
		  }
		}
	
		$src .= '&sensor=false';
		?>
				<img class="google_map_img" 
						 src="http://maps.googleapis.com/maps/api/staticmap?<?php echo $src; ?>" />
		<?php
	}
	if($ob['settings']['MapType'] == 'Interactive') {
		?>
		<script>
			function pinSymbol(color) {
			    return {
			        path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0',
			        fillColor: color,
			        fillOpacity: 1,
			        strokeColor: '#000',
			        strokeWeight: 1,
			        scale:1
			   }
			}
			
			function init_map_<?php echo $ob['id']; ?>() {
			  var mapOptions = {
			    zoom: <?php echo $ob['settings']['MapZoom']; ?>,
			    mapTypeId:google.maps.MapTypeId.<?php echo strtoupper($ob['settings']['MapDesign']); ?>,
			    center: new google.maps.LatLng(<?php echo $ob['settings']['MapLat']; ?>, <?php echo $ob['settings']['MapLng']; ?>),
					mapTypeControl: false,
			    panControl: false,
			    scaleControl: false
			  };
			  map<?php echo $ob['id']; ?> = new google.maps.Map(document.getElementById("map_<?php echo $ob['id']; ?>"), mapOptions);
			
				<?php 
				if(count($ob['settings']['elements']) > 0) {
			  	$nr = 1;
			  	foreach($ob['settings']['elements'] as $element) { 		
						if($element['MapPinLatitude'] && $element['MapPinLongitude']) {
						?>
						
						var pinLatlng<?php echo $nr; ?> = new google.maps.LatLng(<?php echo $element['MapPinLatitude']; ?>, <?php echo $element['MapPinLongitude']; ?>);     
						var marker<?php echo $nr; ?> = new google.maps.Marker({
					     position: pinLatlng<?php echo $nr; ?>,
					     icon: pinSymbol("#<?php echo $element['MapPinColor']; ?>"),
					     map: map<?php echo $ob['id']; ?>,
					  });
					  <?php if($element["MapPinTitle"] || $element["MapPinText"]) { ?>
					  	var contentString<?php echo $nr; ?> = '<div class="mapWindow">'+
					      <?php if($element["MapPinTitle"]) { ?>'<h3><?php echo $element["MapPinTitle"]; ?></h3>'+<?php } ?>
					      <?php if($element["MapPinText"]) { ?>'<div class="mapWindowContent">'+
					      '<?php echo $element["MapPinText"]; ?>'+
					      '</div>'+
					    	<?php } ?>
					      '</div>';
					
					  var infowindow<?php echo $nr; ?> = new google.maps.InfoWindow({
					      content: contentString<?php echo $nr; ?>
					  });
					  
						<?php } ?>

					  google.maps.event.addListener(marker<?php echo $nr; ?>, 'click', function() {
					    infowindow<?php echo $nr; ?>.open(map<?php echo $ob['id']; ?>,marker<?php echo $nr; ?>);
					  });					  
					  
					  <?php
					  $nr++;
						}
					}
				}
				?>
			} 
			google.maps.event.addDomListener(window, 'load', init_map_<?php echo $ob['id']; ?>);     		
			
		</script>
		<div class="EmbeddedObject format format<?php echo $ob['settings']['MapHeight']; ?>" id="map_<?php echo $ob['id']; ?>"></div>
		<?php
		
	}
	
}
?>