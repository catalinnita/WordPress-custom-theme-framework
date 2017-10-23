<?php
function wpfw_image_gallery_album($ob) {
	echo do_shortcode('[wpfw_album_gallery id="'.$ob['settings']['AlbumID'].'" type="'.$ob['settings']['GalleryType'].'"]');	
	
}