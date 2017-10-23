<?php
if(function_exists("wpfw_get_all_galleries")) {

$galleries = wpfw_get_all_galleries();
$gallery_options = array();

$gallery_options[] = array('ID' => 'GalleryConfig',
													'type' => 'TopTab', 
													'name' => 'Gallery Config',
													'title' => 'Select Gallery');
													


$gallery_options[] = array('type' => 'option', 													
													'parent' => 'GalleryConfig',
													'field' => array('ID' => 'GalleryType',
																					 'name' => 'Gallery type',
																					 'type' => 'selectbox',
																					 'default' => 'Gallery type',
																					 'options' => array("Grid"=>"Grid", "Vertical"=>"Vertical", "Horizontal"=>"Horizontal")));				
																					 
$gallery_options[] = array('type' => 'option', 													
													'parent' => 'GalleryConfig',
													'field' => array('ID' => 'GalleryCols',
																					 'name' => 'Number of columns',
																					 'type' => 'slider',
																					 'default' => 4,
																					 'min' => 1,
																					 'max' => 8,
																					 'step' => 1));																							 													

$gallery_options[] = array('type' => 'option', 													
													'parent' => 'GalleryConfig',
													'field' => array('ID' => 'GalleryID',
																					 'name' => 'Select Gallery',
																					 'type' => 'selectbox',
																					 'default' => 'Select Gallery',
																					 'options' => $galleries));			
																					 
																					 

																					 								
													
													
$gallery_item = array(
	'ID' => 'Gallery',
	'Name' => 'Gallery',
	'Description' => 'Add a gallery from WPFW Photo Gallery plugin',
	'PHP' => array('gallery/show.php'),
	'Func' => 'wpfw_image_gallery_gallery',
	'Icon' => 'elements/gallery/images/icon.png',
	'Order' => 1,
	'Parent' => 'CustomElements',
	'Options' => $gallery_options
);

wpfw_add_builder_item($gallery_item);
}
?>