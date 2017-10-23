jQuery(document).ready(function($) {
	
	$(".accordion").each(function() {
		var duration = parseInt($(this).attr("data-speed"));
		var easing  = $(this).attr("data-easing");
		var icon = $(this).attr("data-icon");
		var activeicon  = $(this).attr("data-icon-active");
		if($(this).attr("data-open") == 'no') 
			var isactive = false; 
			else 
				var isactive = 0; 

		$(this).accordion({
    		active: isactive,
    		heightStyle: "content",
    		header: '.panel-heading',
    		animate: {
    			duration: duration,
    			easing: easing
    		},
    		icons: {
      		header: icon,
      		activeHeader: activeicon
    		}
    });
    
    $(this).find(".ui-icon").each(function() {
    	$(this).css({lineHeight: parseInt($(this).parent().height())+'px'});
    });
  });
  
  
  $(".toggle").each(function() {
		var duration = parseInt($(this).attr("data-speed"));
		var easing  = $(this).attr("data-easing");
		var icon = $(this).attr("data-icon");
		var activeicon  = $(this).attr("data-icon-active");
		//if($(this).attr("data-open") == 'no') {}
		var isactive = [];
		$(this).children(".panel[data-open='open']").each(function() {
			isactive.push(parseInt($(this).attr("data-nr"))); 
		});

		if (isactive.length > 0) { isactive = isactive; } else { isactive = false; }
			
		$(this).multipleaccordion({
				active : isactive,
    		heightStyle: "content",
    		header: '.panel-heading',
    		animate: {
    			duration: duration,
    			easing: easing
    		},
    		icons: {
      		header: icon,
      		activeHeader: activeicon
    		}
    });
    
    $(this).find(".ui-icon").each(function() {
    	$(this).css({lineHeight: parseInt($(this).parent().height())+'px'});
    });
  });
  
  
		
			
			
});