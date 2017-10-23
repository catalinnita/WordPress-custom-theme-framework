
function stringToBoolean(string){
		switch(string.toLowerCase()){
			case "true": case "yes": case "1": return true;
			case "false": case "no": case "0": case null: return false;
			default: return Boolean(string);
		}
	}	

jQuery(document).ready(function($) {
	
	
	// add classes as values
	// hslide, vslide, arrows, buttons, auto
		$(".slider.AnythingSlider").each(function() {
			
			var sliderc = $(this);
			var slideru = $(this).children("ul");
			var arrowleft = '';
			var arrowright = '';
			
					slideru.anythingSlider({
						buildNavigation: stringToBoolean(sliderc.attr("data-navigation")),
						buildArrows: stringToBoolean(sliderc.attr("data-arrows")),
						easing: sliderc.attr("data-easing"),
						animationTime: sliderc.attr("data-speed"),				
						backText : arrowleft,
						forwardText  : arrowright,
						mode : sliderc.attr("data-effect"),
						autoPlay : stringToBoolean(sliderc.attr("data-auto-start")),
						pauseOnHover : stringToBoolean(sliderc.attr("data-pause")),
						delay : sliderc.attr("data-delay"),
						buildStartStop: false,
						resizeContents : false,
						hashTags: false,
						expand: false,
						onInitialized: function(e, slider) {
							sliderc.find(".arrow.back").children("a").addClass(sliderc.attr("data-icon-prev"));
							sliderc.find(".arrow.forward").children("a").addClass(sliderc.attr("data-icon-next"));
							sliderc.find(".arrow").children("a").css({	
								fontSize: parseInt(sliderc.attr("data-icon-size"))+'px',
								color: sliderc.attr("data-arrows-color")
							});
							if(sliderc.attr("data-arrows-outside") == 'true') {
								var bw = 0-parseInt(sliderc.find(".arrow.back").width())-10;
								var nw = 0-parseInt(sliderc.find(".arrow.forward").width())-10;
								
								sliderc.find(".arrow.back").css({marginLeft: bw+'px'});
								sliderc.find(".arrow.forward").css({marginRight: nw+'px' });
								
							}
						}
						
					});	           

		});
	
	// href should be #nr
	// id should be Thumbs{sliderid}
	$(".AST").each(function() {
		var sid = $(this).attr('id').substring(6);
		$(this).find("a").click(function() {
			var slide = $(this).attr('href').substring(1);
			$('#'+sid).anythingSlider(slide);
		});
	});
		
	// bottom thumbs for anything slider
	$(".BottomThumbs li:first-child a").addClass("active");
	$(".BottomThumbs li a").click(function() {
		$(this).parent().parent().find("a").removeClass("active");
		$(this).addClass("active");
	});	

	
	
});