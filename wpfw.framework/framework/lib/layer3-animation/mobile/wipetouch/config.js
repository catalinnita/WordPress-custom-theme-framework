jQuery(document).ready(function($) {

	// wipetouch and anything slider 
	// adds automatic wipe touch functionality for all anything sliders
	// for removing wipe touch functionality add NoWT class
	var NR = [];
	var AN = [];
	$(".AS").not(".NoWT").each(function() {
		// add custom cursor styles
		$(this).addClass("wtgrab");
		$(this).mousedown(function(){
			$(this).removeClass("wtgrab").addClass("wtgrabbing");
		}).mouseup(function() {
			$(this).removeClass("wtgrabbing").addClass("wtgrab");
		});
		var ASID = $(this).attr("id");
		AN[ASID] = 1;
		NR[ASID] = $('#'+ASID).children("li").size();
			$('#'+ASID).wipetouch({
					wipeLeft: function(result) { 
						if (AN[ASID] < NR[ASID]) {
							AN[ASID] = AN[ASID]+1;
							$('#'+ASID).anythingSlider(AN[ASID]);
						}
					},
					wipeRight: function(result) {
						if (AN[ASID] > 1) {
							AN[ASID] = AN[ASID]-1;
							$('#'+ASID).anythingSlider(AN[ASID]);
						}
					}
			});	
	});
	
	// wipetouch and jcarousel
	$(".JCO").not(".NoWT").each(function() {
		// add custom cursor styles
		$(this).addClass("wtgrab");
		$(this).mousedown(function(){
			$(this).removeClass("wtgrab").addClass("wtgrabbing");
		}).mouseup(function() {
			$(this).removeClass("wtgrabbing").addClass("wtgrab");
		});

		var JCOID = $(this).attr("id");
		
		$("#"+JCOID).wipetouch({
				moveX : 2,
				wipeLeft: function(result) { 
					$("#"+JCOID).parent(".jcarousel-clip").parent(".jcarousel-container").children(".jcarousel-next").trigger("click");
				},
				wipeRight: function(result) {
					$("#"+JCOID).parent(".jcarousel-clip").parent(".jcarousel-container").children(".jcarousel-prev").trigger("click");
				}
		});	
			
	});
	
	// wipetouch and jscroll
	
	
		
});