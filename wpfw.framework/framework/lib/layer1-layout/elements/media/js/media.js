jQuery(document).ready(function($){
	$('video').mediaelementplayer({
		    alwaysShowControls: false,
		    features: ['playpause','progress','volume','fullscreen'],
		    videoVolume: 'horizontal',
		    iPadUseNativeControls: true,
		    iPhoneUseNativeControls: true,
		    AndroidUseNativeControls: true
	});
	
	$('audio').mediaelementplayer({
		    alwaysShowControls: true,
		    features: ['playpause','progress','volume'],
		    audioVolume: 'horizontal',
		    audioWidth: 450,
		    audioHeight: 70,
		    iPadUseNativeControls: true,
		    iPhoneUseNativeControls: true,
		    AndroidUseNativeControls: true
	});
});