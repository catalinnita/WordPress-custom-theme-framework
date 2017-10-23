jQuery(document).ready(function($) {
	
	$(".slider.SkitterSlider").each(function() {
		
		var sliderc = $(this);
		var slideru = $(this).children("ul");
		sliderc.find("img").load(function(){	
			
			sliderc.skitter({
				dots: stringToBoolean(sliderc.attr("data-navigation")), 
				navigation: stringToBoolean(sliderc.attr("data-arrows")),
			  auto_play: stringToBoolean(sliderc.attr("data-auto-start")),
			 	interval: sliderc.attr("data-delay"),
			 	animation: sliderc.attr("data-effect"),
			 	stop_over: stringToBoolean(sliderc.attr("data-pause")),
			 	easing_default: sliderc.attr("data-easing"),
			 	label: true,
			 	hideTools: true,
			 	focus: false,
			 	controls: false,
			 	numbers: false,
			 	onLoad: function(self) { 
			 		
			 		}
			});
		});
	});
	
});