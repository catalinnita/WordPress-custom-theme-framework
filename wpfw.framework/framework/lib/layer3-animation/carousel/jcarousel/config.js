jQuery(document).ready(function($) {
	
	$(".JCO").each(function() {
		
		var vertical = false;
		var rtl = false;
		
		var auto = 0;
		if($(this).attr("data-auto-start") == 'yes') var auto = parseInt($(this).attr("data-delay")); 
		
		var wrap = $(this).attr("data-wrap");
		var animation = parseInt($(this).attr("data-speed"));
		var easing = $(this).attr("data-easing");
		var visiblenr = parseInt($(this).attr("data-visible"));
		var scrollnr = parseInt($(this).attr("data-step"));
		var iconsize = $(this).attr("data-icon-size");
		var marginsize = parseInt(iconsize)+8;
		var prevbutton = $(this).attr("data-prev-icon");
		var nextbutton = $(this).attr("data-next-icon");
		
		// plus add custom navigation
		
		$(this).jcarousel({
       vertical 	: vertical,
       rtl 				: rtl,
       scroll			: scrollnr,
       animation  : animation,
       easing 		: easing,
       auto				: auto,
       visible 		: visiblenr,
       wrap 			: wrap,
       buttonPrevHTML: '<div data-font-size="'+iconsize+'" class="'+prevbutton+'"></div>',
       buttonNextHTML: '<div data-font-size="'+iconsize+'" class="'+nextbutton+'"></div>',
    });
    
    $(this).parent(".jcarousel-clip-horizontal").css({marginLeft: marginsize+'px', marginRight: marginsize+'px'}); 
		
	});
	
	// make plugin
	$("*[data-font-size]").each(function() {
		$(this).css("font-size", $(this).attr("data-font-size")+'px');
	});

	
});