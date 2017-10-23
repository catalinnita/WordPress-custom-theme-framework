jQuery.fn.extend({
	removeGridCleaners : function() {
		
		return this.each(function() {
			jQuery(this).removeClass("cleanerl");
		});
	}, 
	addGridCleaners : function() {
		var i = 0;
		return this.each(function() {
      if (i == 12) {
	    	jQuery(this).addClass("cleanerl");
	    	i = 0;
	    }
			
			var classList = jQuery(this).attr('class').split(/\s+/);
	    jQuery.each(classList, function(index, item){
	        if(item.substr(0,3) == 'col') {
	        	i = i+parseInt(item.substr(7,2));
	        }
	    });
      jQuery(this).addClass("t"+i);
    });
	},
	addGridAbsoluteWidth : function() {
		return this.each(function() { 
			var pwidth = parseInt(jQuery(this).width());
			jQuery(this).waitForImages(function() {
			
				jQuery(this).children().each(function() {
					
						var classList = jQuery(this).attr('class').split(/\s+/);
				    jQuery.each(classList, function(index, item){
				        if(item.substr(0,3) == 'col') {
				        	ew = pwidth*(parseInt(item.substr(7,2))/12);
				        }
				    });					
						
						jQuery(this).css({width: ew});
					
				});				
			});
		});		
		
	},
	addHoverEffect : function() {
		return this.each(function() {
			jQuery(this).hover(function() {
				jQuery(this).children(".hover").fadeIn(400, "easeInOutExpo");
			}).mouseleave(function() {
				jQuery(this).children(".hover").fadeOut(400, "easeInOutExpo");
			});
		});
	}
});

function get_proper_image(img, mwidth, mwl) {
		
		var ext = img.attr('data-src').split('.').pop();
		var mheight = parseInt(mwidth[mwl]*parseInt(img.attr("data-aspect-ratio-height"))/parseInt(img.attr("data-aspect-ratio-width")));		
		var isrc = img.attr('data-src').replace('.'+ext, '-'+mwidth[mwl]+'x'+mheight+'.'+ext);
			jQuery.ajax({
		    url: isrc,
		    type: "HEAD",
		    dataType: "image",
		    success: function() {
		       img.attr("src", isrc).css("maxWidth", img.attr("data-size")+'%');	
		       img.load(function() {

		       	var caption = img.next();
		       	//var cwidth = parseInt(img.width())-parseInt(caption.css("padding-left"))-parseInt(caption.css("padding-right"))-parseInt(caption.css("border-left-width"))-parseInt(caption.css("border-right-width"))
		       	var cwidth = parseInt(img.width())-parseInt(caption.css("border-left-width"))-parseInt(caption.css("border-right-width"))
		       	caption.css({width: cwidth});
		       	var ctop = 0-parseInt(caption.height())-parseInt(caption.css("padding-top"))-parseInt(caption.css("padding-bottom"))-parseInt(caption.css("border-top-width"))-parseInt(caption.css("border-bottom-width"));
		       	caption.css({marginTop: ctop, visibility: 'visible'});
		       	
						slider = jQuery(this).parent("li").parent("ul").data("AnythingSlider");
						if(slider != undefined) {
							var imgh = parseInt(img.height());
		       		jQuery(this).parent("li").css({height: imgh});
		       		jQuery(this).parent("li").parent("ul").css({height: imgh})
							slider.updateSlider();		       	
						}
						slider = jQuery(this).parent(".NivoSlider");
						if(slider != undefined) {
			  			var imgh = parseInt(img.height());
			  			slider.css({'height': imgh+'px'});
			  			slider.find(".nivo-control[rel=0]").trigger("click");
						}
		       	
		      });
		    },
		    error: function(){
		      if(mwl-1 >= 0) {
						get_proper_image(img, mwidth, mwl-1);
					} else {
							return false
						}
		     } 
			})

}

function get_parent_width(obj, i) {
	
	var iwidth = parseInt(obj.parent().width());
	return iwidth;
		
}

jQuery(document).ready(function($) {
	
	$("*[data-width]").each(function() {
		$(this).css("width", $(this).attr("data-width"));
	});
	$("*[data-line-height]").each(function() {
		$(this).css("lineHeight", $(this).attr("data-line-height")+'px');
	});
	$("*[data-font-size]").each(function() {
		$(this).css("font-size", $(this).attr("data-font-size")+'px');
	});
	$("*[data-margin-left]").each(function() {
		$(this).css("marginLeft", $(this).attr("data-margin-left")+'px');
	});
	$("*[data-border-color]").each(function() {
		$(this).css("borderColor", '#'+$(this).attr("data-border-color"));
	});		
	$("*[data-color]").each(function() {
		$(this).css("color", '#'+$(this).attr("data-color"));
	});
	$("*[data-align]").each(function() {
		$(this).css("text-align", $(this).attr("data-align"));
	});
	$("*[data-float]").each(function() {
		if($(this).attr("data-float") != 'center') {
			$(this).css("float", $(this).attr("data-float"));
		} else {
			$(this).css({'float': 'none', 'text-align': 'center'});
		}
		
	});
	
	$("*[data-border-width]").each(function() {
		$(this).css("border-width", $(this).attr("data-border-width")+'px');
	});
	$("*[data-border-style]").each(function() {
		$(this).css("border-style", $(this).attr("data-border-style"));
	});
	$("*[data-border-color]").each(function() {
		$(this).css("border-color", "#"+$(this).attr("data-border-color"));
	});
	$("*[data-background]").each(function() {
		$(this).css("background-color", "#"+$(this).attr("data-background"));
	});	
	
	$(".square").each(function() {
		var wid = parseInt($(this).height())+parseInt($(this).css("paddingTop"))+parseInt($(this).css("paddingBottom"))+parseInt($(this).css("border-top-width"))+parseInt($(this).css("border-bottom-width"));
		$(this).css({'min-width': wid});
	});
	$(".circle").each(function() {
		var wid = parseInt($(this).height())+parseInt($(this).css("paddingTop"))+parseInt($(this).css("paddingBottom"))+parseInt($(this).css("border-top-width"))+parseInt($(this).css("border-bottom-width"));
		$(this).css({'width': wid});
	});
	
	$("*[data-image-type='load-after']").each(function() {
		var sizes = [1920, 1440, 960, 720, 480, 240, 120, 60, 30];
		var iwidth = get_parent_width($(this))*($(this).attr("data-size")/100);
		var mwidth = []; 
		var matched = 0;
		var index = 0;
		for(i = sizes.length ; i >=0  ; i--) {
			if(sizes[i] < iwidth) {
				mwidth[index] = sizes[i];
				index = index+1;
			}
		}
		if(sizes.length-index-1 > 0)
			mwidth[index] = sizes[sizes.length-index-1];

		var mwl = mwidth.length-1;
		get_proper_image($(this), mwidth, mwl);
			
	});	
		

	$(".g78, .g68, .g34, .g58, .g48, .g12, .g24, .g38, .g28, .g14, .g18, .g23, .g13, .g15, .g16, .g17").each(function() {
		$(this).html('<div class="gb">'+$(this).html()+'</div>');
	});
	$(".grid").each(function() {
		$(this).children().eq(0).addClass("first");
		$(this).children().eq($(this).children().length-1).addClass("last");
		$(this).html($(this).html()+'<div class="cleaner"></div>').css({visibility: 'visible'});
	});
	
	$(".WPFW-Frame").addHoverEffect();
	$("#WPFW-Grid-Gallery > div").addGridCleaners();
	$("a[data-qa='wpfw-all']").trigger("click");

	
	// theme custom stuff 
	$("h2#Headline").css({top: $("html").css("marginTop")});
		
	// general top link
	$('a.toplink').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});
	
	// main menu
	function set_dd_pos(obj) {
		var mw = parseInt(obj.parent("li").parent("ul").parent(".sm").width())-parseInt(obj.parent("li").children("a").css("paddingLeft"))-10;
		var ph = parseInt(obj.parent("li").children("a").height());
		if (ph == 0) {
			ph = parseInt(obj.parent("li").children("a").css("lineHeight"));
		}
		var mh = 0-ph-parseInt(obj.parent("li").children("a").css("paddingTop"))-parseInt(obj.parent("li").children("a").css("paddingBottom"));
		obj.css({marginLeft: mw, marginTop: mh});		
	}
	
	$("#MainMenuList").children("li").each(function() {
		if ($(this).children("div").children("ul").hasClass("sub-menu")) {
			$(this).addClass("dd");
		}
	});
	
	$("#MainMenuList").children("li").children("div").children("ul").children("li").each(function() {
		if ($(this).children("div").children("ul").hasClass("sub-menu")) {
			$(this).addClass("dd");
		}
	});	
	
	$("#MainMenuList").find("li").hover(
		function() {
			$(this).addClass("hover");
			if ($(this).hasClass("active") == true) {
				$(this).removeClass('active').addClass('a');
			}
			$(this).children(".sm").clearQueue();
			$(this).children(".sm").css({zIndex: 10000, height: 'auto'});
			if ($(this).children(".sm").hasClass("type2")) {
				set_dd_pos($(this).children(".sm"));
				$(this).children(".sm").fadeIn(700, "easeInOutExpo");
			}
			else {
				$(this).children(".sm").slideDown(700, "easeInOutExpo", function() {
					$(this).css({overflow: 'visible'});
				});
			}
		},
		function() {
			if ($(this).hasClass("dd") == false) {
				$(this).removeClass('hover');
			}
			$(this).children(".sm").clearQueue();
			$(this).children(".sm").css({zIndex: 9998});
			if ($(this).children(".sm").hasClass("type2")) {
				$(this).children(".sm").fadeOut(700, "easeInOutExpo");
			}
			else {
				$(this).children(".sm").slideUp(400, "easeInOutExpo", function() {
					$(this).parent("li").removeClass('hover');
					if ($(this).parent("li").hasClass("a") == true) {
						$(this).parent("li").removeClass('a').addClass('active');
					}			
				});
			}
		});
	
		$(".MobileMainMenu").change(function(){
			window.location = $(this).val();
		});
		

});
