<?php

function wpfw_image_gallery_gallery($ob) {
	
	echo do_shortcode('[wpfw_gallery id="'.$ob['settings']['GalleryID'].'" type="'.$ob['settings']['GalleryType'].'" cols="'.$ob['settings']['GalleryCols'].'"]');	
	
}

?>