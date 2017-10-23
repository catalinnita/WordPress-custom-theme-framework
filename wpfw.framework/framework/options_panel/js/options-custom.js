/**
 * Prints out the inline javascript needed for the colorpicker and choosing
 * the tabs in the panel.
 */

jQuery(document).ready(function($) {
	

	
	// Fade out the save message
	$('.fade').delay(1000).fadeOut(1000);
	
	// Color Picker
	$('.colorSelector').each(function(){
		var Othis = this; //cache a copy of the this variable for use inside nested function
		var initialColor = $(Othis).next('input').attr('value');
		$(this).ColorPicker({
		color: initialColor,
		onShow: function (colpkr) {
		$(colpkr).fadeIn(500);
		return false;
		},
		onHide: function (colpkr) {
		$(colpkr).fadeOut(500);
		return false;
		},
		onChange: function (hsb, hex, rgb) {
		$(Othis).children('div').css('backgroundColor', '#' + hex);
		$(Othis).next('input').attr('value','#' + hex);
	}
	});
	}); //end color picker
	
	// Switches option sections
	$('.group').hide();
	$('.main-group').hide();
	$('.group:first').fadeIn();
	$('.main-group:first').fadeIn();
	$('.group .collapsed').each(function(){
		$(this).find('input:checked').parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).hasClass('last')) {
					$(this).removeClass('hidden');
						return false;
					}
				$(this).filter('.hidden').removeClass('hidden');
			});
	});
           					
	$('.group .collapsed input:checkbox').click(unhideHidden);
				
	function unhideHidden(){
		if ($(this).attr('checked')) {
			$(this).parent().parent().parent().nextAll().removeClass('hidden');
		}
		else {
			$(this).parent().parent().parent().nextAll().each( 
			function(){
				if ($(this).filter('.last').length) {
					$(this).addClass('hidden');
					return false;		
					}
				$(this).addClass('hidden');
			});
           					
		}
	}
	
	// Image Options
	$('.of-radio-img-img').click(function(){
		$(this).parent().parent().find('.of-radio-img-img').removeClass('of-radio-img-selected');
		$(this).addClass('of-radio-img-selected');		
	});
		
	$('.of-radio-img-label').hide();
	$('.of-radio-img-img').show();
	$('.of-radio-img-radio').hide();
	
	$('.of-nav li:first-child').each(function() {
		$(this).addClass('current');
	});
	
	$('.of-nav li a').click(function(evt) {
		
		$(this).parent().parent().children('li').removeClass('current');
		$(this).parent().addClass('current');
		var clicked_group = $(this).attr('href');
		
		$(this).parent().parent().parent().parent().children(".content").children('.group').hide();
		$(clicked_group).fadeIn();
		evt.preventDefault();
		
		var url = $(location).attr('href').split("#");

		history.pushState({}, '', url[0]+"#"+url[1]+clicked_group);
		
	}); 	 		
	
	
	$('.content div:first-child').each(function() {
		$(this).fadeIn();
	});	
	
	// left menu
	$('#of-left-nav li:first').addClass('current');
	$('#of-left-nav li a').click(function(evt) {
		$('#of-left-nav li').removeClass('current');
		$(this).parent().addClass('current');
		var clicked_group = $(this).attr('href');
		$('.main-group').hide();
		$(clicked_group).fadeIn();
		evt.preventDefault();
		
		var url = $(location).attr('href').split("#");
		var tab = $(clicked_group).find(".current").children("a").attr("href");
		history.pushState({}, '', url[0]+clicked_group+tab);
		
	}); 	 			
	
	$(".pattern-box").click(function() {
		$(".pattern-box").removeClass("active");
		$(this).addClass("active");
	});
	
	 var url = $(location).attr('href');
	 var l = url.split("#");
	 if(l.length > 1) {
	 	$('a[href="#'+l[1]+'"]').trigger("click");
	 	$('a[href="#'+l[2]+'"]').trigger("click");
	 }	
	
	// connections between options
	
	//change_options();
	default_options();
	$("#themeid").change(function() {
		change_options();
	});
	$("#menutype").change(function() {
		change_menu();
	});
	
	change_article_menu();
	jQuery("#fatype").change(function() {
		change_article_menu();
	});
	
  slider_settings();
  $("#homeslidertype, #hb_slidertype").change(function() {
  	slider_settings();
  });	
	
});	


function change_options() {
	
	if (jQuery("#themeid").val() == 'zahira') { 
		jQuery("#menutype").val("zahira");
		jQuery("#menutype").attr({disabled: false});
		jQuery("#menucolor").val("zahira");
		jQuery(".pattern-box").removeClass('active');
		jQuery("#bgpattern").val("bg8.png");
		jQuery("#bg8").addClass("active");
		jQuery("#bgcolor").val("");
		change_menu();
  }
  else {
  	jQuery("#menutype").val("ribbon");
  	jQuery("#menutype").attr({disabled: 'disabled'});
  	jQuery("#menucolor").val(jQuery("#themeid").val());
  	jQuery(".pattern-box").removeClass('active');
  	if (jQuery("#themeid").val() == 'elegance') { 
  		jQuery("#bgpattern").val("bg9.png");
  		jQuery("#bg9").addClass("active");
  	}
  	else {
  		if (jQuery("#themeid").val() == 'WPC') {
  			jQuery("#bgpattern").val("bg10.png");
  			jQuery("#bg10").addClass("active");
  		} else {
  			if (jQuery("#themeid").val() == 'wilco') {
  				jQuery("#bgpattern").val("bg11.png");
  				jQuery("#bg11").addClass("active");
  			} else {
  				if (jQuery("#themeid").val() == 'loyallocal') {
  					jQuery("#bgpattern").val("bg12.png");
  					jQuery("#bg12").addClass("active");
  				}
  				else {
  					if (jQuery("#themeid").val() == 'GPSWA1') {
  						jQuery("#bgpattern").val("bg13.png");
  						jQuery("#bg13").addClass("active");
  					}
  					else {
  						jQuery("#bgpattern").val("bg.png");
  						jQuery("#bg").addClass("active");
  					}
  				}
  			}
  		}
  	}    	
  	
  	if (jQuery("#themeid").val() == 'blue') { var col = '#e9f2f4'; }
  	if (jQuery("#themeid").val() == 'green') { var col = '#eeffde';}
  	if (jQuery("#themeid").val() == 'orange') { var col = '#ffefde';}
  	if (jQuery("#themeid").val() == 'pink') { var col = '#f4deff';}
  	if (jQuery("#themeid").val() == 'purple') { var col = '#e6deff';}
  	if (jQuery("#themeid").val() == 'tan') { var col = '#ecfafb';}
  	if (jQuery("#themeid").val() == 'deepblue') { var col = '#d6e0ff'; }
  	jQuery("#bgcolor").val(col);
  	jQuery("#bgcolor_picker").children("div").css({backgroundColor: col});

  	jQuery(".colorpicker").first().children(".colorpicker_hex").children("input").val(col.replace("#",""));
		jQuery("#bgcolor_picker").ColorPickerSetColor(col);
  	change_menu();
  	
  	
  }
  
  if (jQuery("#cbgpattern").val() != '') {
  	jQuery(".pattern-box").removeClass('active');
  }
  

	
}


function default_options() {
	if (jQuery("#themeid").val() != 'zahira') { 
  	jQuery("#menutype").attr({disabled: 'disabled'});
  }	
	if (jQuery("#menutype").val() == 'zahira') { 
  	jQuery("#menucolor").attr({disabled: 'disabled'});
  }	  
  if (jQuery("#cbgpattern").val() != '') {
  	jQuery(".pattern-box").removeClass('active');
  }  
}

function change_menu() {
	
	if (jQuery("#menutype").val() == 'zahira') {
		jQuery("#menucolor").val("zahira");
		jQuery("#menucolor").attr({disabled: 'disabled'});
	}
	else {
		jQuery("#menucolor").attr({disabled: false});
	}
	
	// homepage article
		

	
}

function change_article_menu() {
	
		if (jQuery("#fatype").val() == 'page') {		
		jQuery("#about").parent().parent().parent().css({display: 'block'});
		jQuery("#cttitle").parent().parent().parent().css({display: 'none'});
		jQuery("#cttext").parent().parent().parent().css({display: 'none'});
		jQuery("#ctlinktext").parent().parent().parent().css({display: 'none'});
		jQuery("#ctlinkurl").parent().parent().parent().css({display: 'none'});
		jQuery("#ctpic").parent().parent().parent().css({display: 'none'});
		jQuery("#fatalign").parent().parent().parent().css({display: 'none'});
		jQuery("#htmlcode").parent().parent().parent().css({display: 'none'});
	}
	
	if (jQuery("#fatype").val() == 'image') {		
		jQuery("#about").parent().parent().parent().css({display: 'none'});
		jQuery("#cttitle").parent().parent().parent().css({display: 'none'});
		jQuery("#cttext").parent().parent().parent().css({display: 'none'});
		jQuery("#ctlinktext").parent().parent().parent().css({display: 'none'});
		jQuery("#ctlinkurl").parent().parent().parent().css({display: 'block'});
		jQuery("#ctpic").parent().parent().parent().css({display: 'block'});
		jQuery("#fatalign").parent().parent().parent().css({display: 'none'});
		jQuery("#htmlcode").parent().parent().parent().css({display: 'none'});
	}	
	
	if (jQuery("#fatype").val() == 'custom text') {		
		jQuery("#about").parent().parent().parent().css({display: 'none'});
		jQuery("#cttitle").parent().parent().parent().css({display: 'block'});
		jQuery("#cttext").parent().parent().parent().css({display: 'block'});
		jQuery("#ctlinktext").parent().parent().parent().css({display: 'block'});
		jQuery("#ctlinkurl").parent().parent().parent().css({display: 'block'});
		jQuery("#ctpic").parent().parent().parent().css({display: 'block'});
		jQuery("#fatalign").parent().parent().parent().css({display: 'block'});
		jQuery("#htmlcode").parent().parent().parent().css({display: 'none'});
	}		
	
	if (jQuery("#fatype").val() == 'HTML code') {		
		jQuery("#about").parent().parent().parent().css({display: 'none'});
		jQuery("#cttitle").parent().parent().parent().css({display: 'none'});
		jQuery("#cttext").parent().parent().parent().css({display: 'none'});
		jQuery("#ctlinktext").parent().parent().parent().css({display: 'none'});
		jQuery("#ctlinkurl").parent().parent().parent().css({display: 'none'});
		jQuery("#ctpic").parent().parent().parent().css({display: 'none'});
		jQuery("#fatalign").parent().parent().parent().css({display: 'none'});
		jQuery("#htmlcode").parent().parent().parent().css({display: 'block'});
	}		
}

function slider_settings() {
	
	if (jQuery("#homeslidertype").val() == 'Anything Slider') {
		jQuery("#section-anything_homestype").css({display: 'block'});
		jQuery("#section-nivo_homestype").css({display: 'none'});
		jQuery("#section-parallax_homestype").css({display: 'none'});
		jQuery("#section-skitter_homestype").css({display: 'none'});
		jQuery("#section-homespause").css({display: 'block'});
	}	
	if (jQuery("#homeslidertype").val() == 'Parallax') {
		jQuery("#section-anything_homestype").css({display: 'none'});	
		jQuery("#section-nivo_homestype").css({display: 'none'});
		jQuery("#section-parallax_homestype").css({display: 'block'});
		jQuery("#section-skitter_homestype").css({display: 'none'});
		jQuery("#section-homespause").css({display: 'none'});
	}
	if (jQuery("#homeslidertype").val() == 'Nivo') {
		jQuery("#section-anything_homestype").css({display: 'none'});	
		jQuery("#section-nivo_homestype").css({display: 'block'});
		jQuery("#section-parallax_homestype").css({display: 'none'});
		jQuery("#section-skitter_homestype").css({display: 'none'});
		jQuery("#section-homespause").css({display: 'block'});
	}		
	if (jQuery("#homeslidertype").val() == 'Skitter') {
		jQuery("#section-anything_homestype").css({display: 'none'});	
		jQuery("#section-nivo_homestype").css({display: 'none'});
		jQuery("#section-parallax_homestype").css({display: 'none'});
		jQuery("#section-skitter_homestype").css({display: 'block'});
		jQuery("#section-homespause").css({display: 'block'});
	}			
	
	if (jQuery("#hb_slidertype").val() == 'Anything Slider') {
		jQuery("#section-hb_anything_stype").css({display: 'block'});	
		jQuery("#section-hb_nivo_stype").css({display: 'none'});
	}
	if (jQuery("#hb_slidertype").val() == 'Nivo') {
		jQuery("#section-hb_anything_stype").css({display: 'none'});	
		jQuery("#section-hb_nivo_stype").css({display: 'block'});
	}	
}