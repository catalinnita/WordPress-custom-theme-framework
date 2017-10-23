jQuery(document).ready(function($) {
   
   
   $(".slider.NivoSlider").each(function() {
   	
			var sliderc = $(this);
   		
   		var manualadvance = true;
   		if (sliderc.attr("data-auto-start") == 'true') 
   			manualadvance = false;
   			
   		sliderc.nivoSlider({
        effect: sliderc.attr("data-effect"),
        animSpeed: sliderc.attr("data-speed"),
        pauseTime: sliderc.attr("data-delay"),
        directionNav: stringToBoolean(sliderc.attr("data-arrows")),
			  controlNav: true,
        pauseOnHover: stringToBoolean(sliderc.attr("data-pause")),
        manualAdvance: manualadvance,
        slices:8,
        boxCols:8,
        boxRows:4,
        startSlide:1,
			  controlNavThumbs:false,
			  captionOpacity: 1,
			  afterLoad: function(){
			  	sliderc.find(".nivo-prevNav").html("").addClass(sliderc.attr("data-icon-prev"));
					sliderc.find(".nivo-nextNav").html("").addClass(sliderc.attr("data-icon-next"));
					sliderc.find(".nivo-directionNav").children("a").css({
						fontSize: parseInt(sliderc.attr("data-icon-size"))+'px',
						color: sliderc.attr("data-arrows-color")
					});
					
					if(sliderc.attr("data-arrows-outside") == 'true') {
								var bw = 0-parseInt(sliderc.find(".nivo-prevNav").width())-10;
								var nw = 0-parseInt(sliderc.find(".nivo-nextNav").width())-10;
								
								sliderc.find(".nivo-prevNav").css({marginLeft: bw+'px'});
								sliderc.find(".nivo-nextNav").css({marginRight: nw+'px' });
								
							}
					
			  }
    	});
   });
	
});