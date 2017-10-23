jQuery(document).ready(function($) {
	 if (homeautoPlay == false) { ma = true; } else { ma = false; }
   $("#HomepageSlider").nivoSlider({
        effect:nivohomeanimationType,
        slices:20,
        boxCols:8,
        boxRows:4,
        animSpeed:homeanimationTime,
        pauseTime:homepauseTime,
        pauseOnHover:homeautoPlayPause,
        startSlide:0,
        directionNav:true,
        controlNav:false,
        controlNavThumbs:false,
        manualAdvance: ma,
        prevText: '<', // Prev directionNav text
        nextText: '>', // Next directionNav text
        captionOpacity: 1,
	      afterLoad: function(){
					$(".nivo-control").html("");
				}        
    });
	
});