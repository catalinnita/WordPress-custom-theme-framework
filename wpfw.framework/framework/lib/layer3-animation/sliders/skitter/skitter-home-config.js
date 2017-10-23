jQuery(document).ready(function($) {
	$("#HomepageSlider").skitter({
		dots: false, 
	 	hideTools: true,
	 	auto_play: homeautoPlay,
	 	controls: false,
	 	focus: false,
	 	interval: homepauseTime,
	 	label: true,
	 	navigation: true,
	 	numbers: false,
	 	animation: skitterhomeanimationType,
	 	stop_over: homeautoPlayPause,
	 	onLoad: function(self) { 
	 		$("#HomepageSlider").children(".next_button").html(">");
	 		$("#HomepageSlider").children(".prev_button").html("<");
	 	}
	});
});