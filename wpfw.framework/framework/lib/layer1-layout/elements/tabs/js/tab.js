jQuery(document).ready(function($) {
 	$(".tabs-container").each(function() {
 		var duration = parseInt($(this).attr("data-speed")/2);
		var easing  = $(this).attr("data-easing");
		var effect  = $(this).attr("data-effect");
		var dir = '';
		if(effect == 'fade') {
			hideEffect = 'fadeOut';
			showEffect = 'fadeIn';
		}
		if(effect == 'slidevertical') {
			hideEffect = 'slideUp';
			showEffect = 'slideDown';
		}
		
		if(effect == 'slideleft') {
			hideEffect = 'slide';
			showEffect = 'slide';
			dir = 'left';
		}		
		if(effect == 'slideright') {
			hideEffect = 'slide';
			showEffect = 'slide';
			dir = 'right';
			
		}				
		if(effect == 'clip') {
			hideEffect = 'clip';
			showEffect = 'clip';
		}				
		
 		$(this).tabs({
 			hide:	{
 				effect: hideEffect,
 				direction: dir,
 				duration: duration,
 				easing: easing
 			},
 			show:	{
 				effect: showEffect,
 				direction: dir,
 				duration: duration,
 				easing: easing
 			}
 		});
 	});
});