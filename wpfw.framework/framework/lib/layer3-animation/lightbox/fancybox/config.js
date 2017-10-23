jQuery.fn.extend({
	addFancyBox : function() {
		return this.each(function() {
			
			jQuery(this).click(function() {
		
				var titleshow = true;
				if(jQuery(this).attr("title") == '') { 
					titleshow = false;
				}
				
				if(jQuery(this).attr("data-gallery") == '') {
					
					if(jQuery(this).hasClass("VIDEO")) {
						jQuery.fancybox({
							'titleShow'     : titleshow,
							'transitionIn'  : 'fade',
				   		'transitionOut' : 'fade',
				     	'href' 					: jQuery(this).attr("href").replace(new RegExp("watch\\?v=", "i"), 'v/')+'?rel=0',
			        'type'      		: 'iframe',
			        'swf'       		: {'wmode':'transparent','allowfullscreen':'true'},				
				   		'overlayOpacity'	: 0.8,
							'overlayColor'		: '#000'	    		
						});			
					}
					else {
						jQuery.fancybox({
							'titleShow'     : titleshow,
							'transitionIn'  : 'fade',
				    	'transitionOut' : 'fade',
				    	'href' 					: jQuery(this).attr("href"),				
				    	'overlayOpacity'	: 0.8,
							'overlayColor'		: '#000'
						});
					}
				}
				else {
					
					// this is inactive
					var gall = jQuery(this).attr("data-gallery");
					var pics = new Array;
					var nr = 0;
					var cnr = 0;
					var chref = jQuery(this).attr("href");
					
					jQuery("a[data-gallery='"+gall+"']").each(function() {
						if (jQuery(this).attr("href") == chref) { cnr = nr; }
							if (jQuery(this).hasClass("VIDEO")) {
								pics[nr]= { 
									'href' : jQuery(this).attr("href").replace(new RegExp("watch\\?v=", "i"), 'v/')+'?rel=0',
									'type'      		: 'iframe',
									'width'					: 700,
									'height'				: 378,
									'swf'       		: {'wmode':'transparent','allowfullscreen':'true'},
									'title' : jQuery(this).attr("title")
								};
							}
							else {
								pics[nr]= { 'href' : jQuery(this).attr("href"), 'title' : jQuery(this).attr("title") };
							}
						nr = nr+1;
					});
					
					jQuery.fancybox(
						pics,
						{ 'titleShow'     : titleshow,
							'index': cnr, 
							'cyclic' : true,
							'titlePosition' : 'inside',
							'transitionIn'  : 'fade',
				    	'transitionOut' : 'fade',
				    	'overlayOpacity'	: 0.8,
							'overlayColor'		: '#000'
		
						});
				}
				
				return false;
			});
			
			
		});
	}
});
	// to add - youtube subscribe + related videos on/off + styling options
	

jQuery(document).ready(function($) {
	$("a.PIC, a.VIDEO").addFancyBox();
	$(".FYBCLOSE").click(function() {
	  $.fancybox.close();
		return false;
	});

});