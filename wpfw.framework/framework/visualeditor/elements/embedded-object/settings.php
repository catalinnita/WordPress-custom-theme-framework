<?php
$embedded_object_options = array();
$embedded_object_options[] = array('ID' => 'EmbeddedObjectConfig',
													'type' => 'TopTab', 
													'name' => 'Config',
													'title' => '');

$embedded_object_options[] = array('type' => 'option', 													
													'parent' => 'EmbeddedObjectConfig',
													'field' => array('ID' => 'EmbeddedObject',
																					 'name' => 'Code',
																					 'type' => 'htmlcode',
																					 'rows' => 10,
																					 'desc' => 'Please add the embedded object code here. You can add IFRAME or OBJECT elements.',
																					 'default' => ''));			
																					 
$embedded_object_options[] = array('type' => 'option', 													
													'parent' => 'EmbeddedObjectConfig',
													'field' => array('ID' => 'EmbeddedObjectFormat',
																					 'name' => 'Aspect ratio',
																					 'type' => 'format',
																					 'desc' => 'Please select the aspect ratio for the embedded object.<br/>
																					 						<b>100%</b> will set up an object with 100% WIDTH and AUTO height',
																					 'default' => '100-1'));																								 										
													
$embedded_object_item = array(
	'ID' => 'EmbeddedObject',
	'Name' => 'Embedded Object',
	'Description' => 'With an embedded object element, you can embed add videos, audios or custom flash objects. You can use iframes or objects as well.',
	'PHP' => array('embedded-object/show.php'),
	'Func' => 'wpfw_embedded_object',
	'Icon' => 'elements/embedded-object/images/icon.png',
	'Order' => 1,
	'Parent' => 'MediaElements',
	'Options' => $embedded_object_options
);

wpfw_add_builder_item($embedded_object_item);
?>