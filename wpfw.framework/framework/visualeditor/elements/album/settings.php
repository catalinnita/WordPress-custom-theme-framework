<?php
if (function_exists(wpfw_get_all_albums)) {

$albums = wpfw_get_all_albums();

$album_options = array();

$album_options[] = array('ID' => 'AlbumConfig',
													'type' => 'TopTab', 
													'name' => 'Album Config',
													'title' => 'Select Album');
													

$album_options[] = array('type' => 'option', 													
													'parent' => 'AlbumConfig',
													'field' => array('ID' => 'GalleryType',
																					 'name' => 'Gallery type',
																					 'type' => 'selectbox',
																					 'default' => 'Grid',
																					 'options' => array("Grid"=>"Grid", "Vertical"=>"Vertical", "Horizontal"=>"Horizontal")));																	

$album_options[] = array('type' => 'option', 													
													'parent' => 'AlbumConfig',
													'field' => array('ID' => 'AlbumID',
																					 'name' => 'Select Album',
																					 'type' => 'selectbox',
																					 'default' => 'Select Album',
																					 'options' => $albums));					

																					 								
													
													
$album_item = array(
	'ID' => 'Album',
	'Name' => 'Photo Album',
	'Description' => 'Add an album from WPFW Photo Gallery plugin.',
	'PHP' => array('album/show.php'),
	'Func' => 'wpfw_image_gallery_album',
	'Icon' => 'elements/album/images/icon.png',
	'Order' => 1,
	'Parent' => 'CustomElements',
	'Options' => $album_options
);

wpfw_add_builder_item($album_item);
}
?>