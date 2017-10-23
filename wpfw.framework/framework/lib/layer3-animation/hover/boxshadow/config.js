jQuery(document).ready(function($) {
	
	// doc here
	$('.BS').each(function() {
		var opt = [];
		$(this).attr('class').split(' ').map(function(el){ 
			if(el.substr(0,5) == 'BSOPT') {
				opt = el.split("-");
			}
		});
		
		$(this).mouseover(function() {
			$(this).animate({boxShadow: opt[1] + 'px ' + opt[2] + 'px ' + opt[3] + 'px #' + opt[4]});
		}).mouseout(function() {
			$(this).animate({boxShadow: '0px 0px 0px #ffffff'});
		});
	});
	
});