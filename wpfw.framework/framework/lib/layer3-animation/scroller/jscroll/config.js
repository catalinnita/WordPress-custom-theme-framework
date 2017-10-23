jQuery(document).ready(function($) {

	// options here for:
	// - hidden track
	// - track width
	// - show/hide arrows
	
	$(".SP").jScrollPane({
		showArrows : true,
		animateScroll : true,
		animateDuration : 1000,
		animateEase : 'easeInOutCubic',
		arrowButtonSpeed : 100,
		trackClickSpeed : 100,
		mouseWheelSpeed : 20,
		arrowScrollOnHover : false
	});

});