<?php
$map_options = array();

$map_options[] = array('ID' => 'MapConfig',
													'type' => 'TopTab', 
													'name' => 'Position',
													'title' => 'Map Position');
													
$map_options[] = array('ID' => 'MapStyle',
													'type' => 'TopTab', 
													'name' => 'Layout',
													'title' => 'Map Settings');				
													
$map_options[] = array('ID' => 'MapPins',
													'type' => 'TopTab', 
													'name' => 'Pins',
													'title' => 'Map Pins');																						



$map_options[] = array('type' => 'option', 													
													'parent' => 'MapConfig',
													'field' => array('ID' => 'MapMap',
																					 'selector' => 'MapAddress',
																					 'name' => 'Address',
																					 'type' => 'textarea',
																					 'desc' => 'The address field is optional and is used just to retrive the latitude and longitude coordinates. For getting a more accurate position for the center of the map add a complete address. Also is recomended to add at least the City or State. If no geolocation coordinate will be retrieved, then please use <a href="http://mygeoposition.com/" target="_blank">this aplication</a> for getting them.',
																					 'default' => ''));
																					 
$map_options[] = array('type' => 'option', 													
													'parent' => 'MapConfig',
													'field' => array('ID' => 'MapLat',
																					 'selector' => 'MapLatitude',
																					 'name' => 'Latitude',
																					 'desc' => '<a href="http://en.wikipedia.org/wiki/Latitude" target="_blank">Latitude</a> coordintate for the center of the map.',
																					 'width' => 'half',
																					 'type' => 'textfield',
																					 'default' => ''));			
																					 
$map_options[] = array('type' => 'option', 													
													'parent' => 'MapConfig',
													'field' => array('ID' => 'MapLng',
																					 'selector' => 'MapLongitude',
																					 'name' => 'Longitude',
																					 'desc' => '<a href="http://en.wikipedia.org/wiki/Longitude" target="_blank">Longitude</a> coordintate for the center of the map.',
																					 'width' => 'half',
																					 'type' => 'textfield',
																					 'default' => ''));																								 
																					 

$map_options[] = array('type' => 'option', 													
													'parent' => 'MapStyle',
													'field' => array('ID' => 'MapType',
																					 'name' => 'Map Type',
																					 'type' => 'selectbox',
																					 'desc' => 'You can add a static image or an interactive map. For simple maps an image map is recomanded for optimization reasons.',
																					 'options' => array("Static Image"=>"Static Image", "Interactive"=>"Interactive"),
																					 'default' => 'Static Image'));																							 
																					 
$map_options[] = array('type' => 'option', 													
													'parent' => 'MapStyle',
													'field' => array('ID' => 'MapZoom',
																					 'name' => 'Zoom level',
																					 'type' => 'slider',
																					 'default' => 4,
																					 'desc' => 'A bigger zoom level will show a more detailed map.',
																					 'min' => 0,
																					 'max' => 20,
																					 'step' => 1
																					 ));		
																				 
$map_options[] = array('type' => 'option', 													
													'parent' => 'MapStyle',
													'field' => array('ID' => 'MapDesign',
																					 'name' => 'Map Style',
																					 'type' => 'selectbox',
																					 'desc' => 'ROADMAP - Displays a normal, default 2D map<br/>
																					 SATELLITE- Displays a photographic map<br/>
																					 TERRAIN	Displays a map with mountains, rivers, etc.<br/>
																					 HYBRID - Displays a photographic map + roads and city names',
																					 'options' => array("Roadmap"=>"Roadmap", "Satellite"=>"Satellite", "Terrain"=>"Terrain", "Hybrid"=>"Hybrid"),
																					 'default' => 'Roadmap'));		
																					 
$map_options[] = array('type' => 'option', 													
													'parent' => 'MapStyle',
													'field' => array('ID' => 'MapHeight',
																					 'name' => 'Aspect ratio',
																					 'type' => 'format',
																					 'desc' => 'Please select the aspect ratio for your map.',
																					 'default' => '16-9',
																					 'exclude' => array('100-1')
																					 ));																							 	
																					 
$map_pins_fields = array();
$map_pins_fields[] = array('ID' => 'MapPinAddress',
																	 'name' => 'Pin Address',
																	 'selector' => 'MapAddress',
																	 'desc' => 'The address field is optional and is used just to retrive the latitude and longitude coordinates. If no geolocation coordinate will be retrieved, then please use <a href="http://mygeoposition.com/" target="_blank">this aplication</a> for getting them.',
																	 'type' => 'textarea');			
																	 
$map_pins_fields[] = array('ID' => 'MapPinLatitude',
																	 'name' => 'Pin Latitude',
																	 'selector' => 'MapLatitude',
																	 'width' => 'half',
																	 'type' => 'textfield');
																	 
$map_pins_fields[] = array('ID' => 'MapPinLongitude',
																	 'name' => 'Pin Longitude',
																	 'selector' => 'MapLongitude',
																	 'width' => 'half',
																	 'type' => 'textfield');																	 
																	 
$map_pins_fields[] = array('ID' => 'MapPinLabel',
																	 'name' => 'Pin Label',
																	 'desc' => 'Pin label shoud be one letter. This option is available just fot static image map type.',
																	 'type' => 'textfield');
																	 
$map_pins_fields[] = array('ID' => 'MapPinTitle',
																	 'name' => 'Popup Title',
																	 'desc' => 'This option is available just for interactive map type',
																	 'type' => 'textfield');
																	 
$map_pins_fields[] = array('ID' => 'MapPinText',
																	 'name' => 'Popup Text',
																	 'desc' => 'This option is available just for interactive map type',
																	 'type' => 'textarea');			
																	 
$map_pins_fields[] = array('ID' => 'MapPinColor',
																	 'name' => 'Pin Color',
																	 'type' => 'color',
																	 'default' => 'cc0000');																	 														 
																					 
$map_options[] = array('type' => 'option', 													
													'parent' => 'MapPins',
													'field' => array('ID' => 'MapPin',
																					 'type' => 'multiple',
																					 'defaultnr' => 3,
																					 'fields' => $map_pins_fields));																							 																					 																				 
																					 
																						 																			 					

																					 								
													
													
$map_item = array(
	'ID' => 'Map',
	'Name' => 'Map',
	'Description' => 'Add Google Maps, static or interactive. You can set up the map type, style, format and place how many pins you want.',
	'PHP' => array('map/show.php'),
	'Func' => 'wpfw_map',
	'Icon' => 'elements/map/images/icon.png',
	'Order' => 1,
	'Parent' => 'MediaElements',
	'Options' => $map_options
);

//wpfw_add_builder_item($map_item);
?>