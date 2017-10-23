jQuery(document).ready(function($) {
	$('#HomepageSlider').layerSlider({
		skin         : 'defaultskin',
		skinsPath    : 'scripts/sliders/parallax/layerslider/skins/',
		navButtons   : false,			    
		navStartStop : false,
		autoStart    : homeautoPlay,
		navPrevNext  : true,
		slideDirection : parallaxhomeanimationType,
		slideDelay  :	homepauseTime
		
	});
	
});