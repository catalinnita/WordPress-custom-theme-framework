function addElements() {
	

	
	// multiple elements
	jQuery(".add-element").unbind("click");
	jQuery(".add-element").click(function() {

			var nextnr = parseInt(jQuery(this).parent().find(".ui-sortable").children("li").size())+1;

			jQuery(this).parent().find(".ui-sortable")
				.append(jQuery(this).parent().find(".element-sample").html().replace(/--nr--/g, nextnr))
				.sortable("refresh")
				.accordion("refresh");
				
				jQuery("#element"+nextnr).find(".wp-editor-container .wp-editor-area").each(function() {
					//tinyMCE.execCommand('mceRemoveEditor', false, jQuery(this).attr("id"));
					jQuery("#"+jQuery(this).attr("id")).css({display: 'block'});
					jQuery("#"+jQuery(this).attr("id")).parent().children(".mce-container").remove();
				});
				jQuery("#element"+nextnr).find(".wp-editor-container .wp-editor-area").each(function() {

						tinyMCE.settings.toolbar1 = 'bold,italic,underline,alignleft,aligncenter,alignright,link,unlink';
						tinyMCE.settings.toolbar2 = '';         
						tinyMCE.execCommand('mceAddEditor', false, jQuery(this).attr("id"));
					});
					jQuery(".FullScreenEditor").unbind("click");
					jQuery(".FullScreenEditor").click(function() {
						var editorid = jQuery(this).attr("href").replace("#","");
						
						
						var minieditor = tinyMCE.get(jQuery(this).attr("data-link"));
						var editor = tinyMCE.get(editorid);
						if (minieditor && editor) {
						    editor.setContent(minieditor.getContent());
						    jQuery(jQuery(this).attr("href")+'Container').css({display: 'block'});
						}
						jQuery("#wpfw-advance-editor-save").click(function() {
							minieditor.setContent(editor.getContent());
							jQuery("#"+editorid+'Container').css({display: 'none'});
						});
						jQuery("#wpfw-advance-editor-cancel").click(function() {
							//minieditor.setContent(editor.getContent());
							jQuery("#"+editorid+'Container').css({display: 'none'});
						});		
					});			
				yes_no_options(jQuery(this))
				initSelectBoxes();
				deleteElements();
				
				return false;
			
		});
	}

		function deleteElements() {
		jQuery(".del-element").unbind("click");
		 jQuery(".del-element").click(function() {
			var obj = jQuery(this).parent("li").parent("ul");
				
			// remove editor control
			obj.find(".wp-editor-container .wp-editor-area").each(function() {
				tinyMCE.execCommand('mceRemoveEditor', false, jQuery(this).attr("id"));
			});
			
			jQuery(this).parent().remove();
			reorderElements(obj);
			
			// add editor control back with new names.
			obj.find(".wp-editor-container .wp-editor-area").each(function() {
				//alert(jQuery(this).attr("id"));
				var editor = tinyMCE.get(jQuery(this).attr("id"));
				if(!editor) {

					tinyMCE.settings.toolbar1 = 'bold,italic,underline,alignleft,aligncenter,alignright,link,unlink';
					tinyMCE.settings.toolbar2 = '';         
					tinyMCE.execCommand('mceAddEditor', false, jQuery(this).attr("id"));
				}				
			});
			
		 });
		}

		function reorderElements(obj) {
			var nr = 1;
			

			
			// change id and name attributes
			obj.children(".element").each(function() {
				
				var aelementnr = jQuery(this).attr("id").substr(7,999);
				var aobjectnr = jQuery(".icon.active").parent().parent().attr("id").substr(3,999);
				
				jQuery(this).attr("id", "element"+nr);
				jQuery(this).find("input, textarea, div.wp-editor-wrap, div.wp-editor-container, .FullScreenEditor").each(function() {
					//alert("-"+aobjectnr+"-"+aelementnr+", -"+aobjectnr+"-"+nr);
					if(jQuery(this).attr("name")) {
						jQuery(this).attr("name", jQuery(this).attr("name").replace("-"+aobjectnr+"-"+aelementnr, "-"+aobjectnr+"-"+nr));
					}
					if(jQuery(this).attr("id")) {
						jQuery(this).attr("id", jQuery(this).attr("id").replace("-"+aobjectnr+"-"+aelementnr, "-"+aobjectnr+"-"+nr));
					}
					if(jQuery(this).attr("data-link")) {
						jQuery(this).attr("data-link", jQuery(this).attr("data-link").replace("-"+aobjectnr+"-"+aelementnr, "-"+aobjectnr+"-"+nr));
					}
				});
				
				nr = nr+1;
				
			});
			

			

			
		}
		
function wpfw_image_buttons() {
	jQuery(".mceIframeContainer iframe").hover(function() {
		var ifpos = jQuery(this).offset();
		jQuery(this).contents().find("img").click(function() {
			//jQuery(this).trigger("click").unbind("click");
			jQuery("#wp_editbtns").css({display: 'none'});
			var pos = jQuery(this).offset();
			var t = parseInt(pos.top)+parseInt(ifpos.top)+5;
			var l = parseInt(pos.left)+parseInt(ifpos.left)+5;
			jQuery("#wp_editbtns").css({display: 'block', top: t, left: l, zIndex: 15000});
		}).mouseleave(function() {
			jQuery("#wp_editbtns").css({display: 'none', top: 0, left: 0,  zIndex: -1});
		});
	});	
}

function photo_format(format, preview) {

												format.change(function() {
													
													var f = format.val().split("-");
													if(parseInt(f[0]) > parseInt(f[1])) {
														preview.find("img").css({'width': 150, 'height': 'auto'});
														var iwidth = 150;
														var iheight = parseInt(150*parseInt(f[1])/parseInt(f[0]));
														var borderh = parseInt((150-iheight)/2);
														var borderw = 0;
													}
													else {
														preview.find("img").css({'height': 150, 'width': 'auto'});
														var iheight = 150;
														var iwidth = parseInt(150*parseInt(f[0])/parseInt(f[1]));
														var borderh = 0;
														var borderw = parseInt((150-iwidth)/2);
													}
													
													preview.css({
														'width': iwidth,
														'height': iheight,
														'border-left-width': borderw,
														'border-right-width': borderw,
														'border-top-width': borderh,
														'border-bottom-width': borderh
													});
												});

}

function jPickerInit() {
	
	jQuery('.jPicker').remove();
	jQuery('.colorpicker').each(function() {

	var lreset = jQuery("#options-panel-content").offset();
		
	var pos = jQuery(this).offset();
	var lpos = parseInt(pos.left);
	if (lreset != null) {
		lpos = lpos-parseInt(lreset.left);
	}
	var tpos = pos.top;
	jQuery(this).jPicker(
		{
		window: {
			position:
    	{
      	x: 0, 
	      y: 39 
  	  }
		}
		}
	);
	
	});	
	
}

function yes_no_options(obj) {

	jQuery(".yesno").unbind("click");
	obj.find(".yesno-container").each(function() {
		
		var yval = parseInt(jQuery(this).children(".yes-value").width());
		var nval = parseInt(jQuery(this).children(".no-value").width());
		
		if (yval > nval) { 
			jQuery(this).children(".no-value").css({width: yval}); 
			var maxval = yval;
		} else { 
			jQuery(this).children(".yes-value").css({width: nval}); 
			var maxval = nval;
		}
		
		jQuery(this).children(".yesno").css({width: maxval+20});
		
		var lreset = jQuery("#options-panel-content").offset();
		
		var dval = jQuery(this).children(".yesnoval").val();
		var pos = jQuery(this).children("#"+dval).offset();
		var lpos = parseInt(pos.left);
		
		if (lreset != null) {
			lpos = lpos-parseInt(lreset.left);
		}
		
		jQuery(this).children(".yesno").css({left: lpos-9});
		jQuery(this).css({visibility: 'visible'});
		if(!jQuery("#"+dval).hasClass("yes-value")) {
			jQuery(this).addClass("on");
		}
		else {
			jQuery(this).removeClass("on");
		}
		
		//click event
		
		jQuery(this).children(".yesno").click(function() {
		
		var aval = jQuery(this).parent("div").children(".yesnoval").val();
		
		if (jQuery(this).parent("div").children("#"+aval).hasClass("yes-value")) {
			var nval = jQuery(this).parent("div").children(".no-value").attr("id");
		}
		else {
			var nval = jQuery(this).parent("div").children(".yes-value").attr("id");
		}
		
		jQuery(this).parent("div").children(".yesnoval").val(nval);	
		var lreset = jQuery("#options-panel-content").offset();
		var pos = jQuery(this).parent("div").children("#"+nval).offset();
		
		var lpos = parseInt(pos.left);
		if (lreset != null) {
			lpos = lpos-parseInt(lreset.left);
		}
		
		jQuery(this).animate({left: lpos-9}, 250, "easeOutQuart");
		
		if(!jQuery("#"+nval).hasClass("yes-value")) {
			jQuery(this).parent().addClass("on");
		}
		else {
			jQuery(this).parent().removeClass("on");
		}
		
	});			
		
	});
	
}

function hideSelectBoxes() {
	jQuery(".select-box-dd").css({display: 'none'});
	jQuery(".select-box-container").removeClass("opened");
	jQuery('html').unbind("click");
}
	
function initSelectBoxes() {	
	jQuery(".select-box-options").children("li").children("a").unbind("click");
	jQuery(".select-box-options").children("li").children("a").click(function() {
			var tval = jQuery(this).parent().attr("data-value");
			var vval = jQuery(this).html();
			jQuery(this).parent("li").parent("ul").parent(".select-box-dd").parent(".select-box-outside").children("input").val(tval);
			if (vval.length > 40) {
				vval = vval.substr(0,40)+'...';
			}
			var newval = '<span class="controler">&#59228;</span>'+vval;
			jQuery(this).parent().parent().parent().parent().children(".select-box-container").removeClass("opened");
			jQuery(this).parent().parent().parent().parent().children(".select-box-container").children(".select-box").html(newval);
			jQuery(".select-box-dd").css({ display: 'none' });
		return false;
	});

	jQuery(".select-box-container").unbind("click");
	jQuery(".select-box-container").click(function(event) {
		if (jQuery(this).hasClass("opened")) {
			hideSelectBoxes();
			event.stopPropagation();
		}
		else {
			hideSelectBoxes();
			jQuery('html').click(function() {
				hideSelectBoxes();
			});
			jQuery(this).parent().children(".select-box-dd").css({display: 'block'});
			jQuery(this).addClass("opened");
			event.stopPropagation();
			
		}	
	});
	
	}

function options_setup(objid) {
	if (objid) {
		var app = '#wpfw-options-'+objid+' ';
	}
	else {
		var app = '';
	}
	var scrl = 0;

	yes_no_options(jQuery("#wpfw-visual-editor-options"));
	initSelectBoxes();
	wpfw_image_buttons();
	
	jQuery(".image-format").each(function() {
		var format = jQuery(this).parent().children('input');
		var preview = jQuery(this).parent().parent().children('.WPFWImagePreview');
		format.trigger("change");
		photo_format(format, preview);
	});
	
	jQuery("textarea[data-selector='MapAddress']").bind("keydown change", function() {
	
			var loc = jQuery(this).val();
			var par = jQuery(this).parent().parent().parent();
      
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode( {'address': loc }, function(results, status) { 
      	if(results != null && results[0] != undefined) {
      		par.find("input[data-selector='MapLatitude']").val(results[0].geometry.location.lat()); 
    			par.find("input[data-selector='MapLongitude']").val(results[0].geometry.location.lng()); 
    		}
     });		
     
	});
	
	// image settings 
	jQuery(".image-format").click(function() {
		jQuery(this).parent().children('.image-format').removeClass("active");
		jQuery(this).addClass("active");
		
		var format = jQuery(this).parent().children('input');
		var preview = jQuery(this).parent().parent().children('.WPFWImagePreview');
		
		format.val(jQuery(this).attr('data-value')).trigger("change");
		
		photo_format(format, preview);
		
		return false;
	});
		
	
	// icons window
	jQuery(".IconButton").unbind("click");
	jQuery(".IconButton").click(function() {
		wl = (parseInt(jQuery(window).width())-parseInt(jQuery("#IconSelectorWindow").children(".wpfw_window").width()))/2;
		wt = (parseInt(jQuery(window).height())-parseInt(jQuery("#IconSelectorWindow").children(".wpfw_window").height()))/2;
		jQuery("#IconSelectorWindow").children(".wpfw_window").css({left: wl, top: wt});
		jQuery("#IconSelectorWindow").css({display: 'block'});
		jQuery("#IconSelectorWindow").attr("data-item", jQuery(this).attr("data-link"));
	});
	
	jQuery(".wpfw_window_title .close").click(function() {
		jQuery("#IconSelectorWindow").fadeOut(200);
	});
	
	jQuery("#IconSelectorSearch").keyup(function() {
		
		clearTimeout(jQuery.data(this, 'timer'));
 		var wait = setTimeout(icons_search, 200);
  	jQuery(this).data('timer', wait);
		
		
	});
	
	function icons_search() {
		if(jQuery("#IconSelectorSearch").val().length > 2) {
			jQuery("#IconSelector").load(jQuery("#IconSelectorSearch").attr("data-url")+'?k='+jQuery("#IconSelectorSearch").val(), function() {
				set_icon_back();
			});
		} else {
			jQuery("#IconSelector").load(jQuery("#IconSelectorSearch").attr("data-url"), function() {
				set_icon_back();
			});
		}		
		
	}
	
	function removeIcons() {
		jQuery(".icon-preview").children(".removeItem").unbind("click");
		jQuery(".icon-preview").children(".removeItem").click(function() {
			jQuery(this).parent().attr("class", "");
			jQuery(this).parent().parent().children("input").val("");
			return false;
			
		});
	}		
	
	function removeImages() {
		jQuery(".WPFWImageDetails").children(".removeItem").unbind("click");
		jQuery(".WPFWImageDetails").children(".removeItem").click(function() {
			jQuery(this).parent().removeClass("visible");
			jQuery(this).parent().parent().children("input").val("del");
			return false;
			
		});
	}		
	
	function set_icon_back() {
		jQuery(".iconthumb").unbind("click");
		jQuery(".iconthumb").click(function() {
			jQuery("#"+jQuery("#IconSelectorWindow").attr("data-item")).val(jQuery(this).attr("data-id"));
			jQuery("#"+jQuery("#IconSelectorWindow").attr("data-item")+'-preview').attr("class", jQuery(this).attr("class")+' icon-preview').removeClass("iconthumb");
			jQuery("#IconSelectorWindow").fadeOut(0);
			removeIcons();
		});
	}
	
	set_icon_back();	
	removeIcons();
	removeImages();

	jQuery(".wpfw-builder-options").children(".top-tabs").children("li").children("a").unbind("click");
	jQuery(".wpfw-builder-options").children(".top-tabs").children("li").children("a").click(function() {
		
		var tid = jQuery(this).attr("href").replace("#", "");
		jQuery(this).parent("li").parent("ul").children("li").removeClass("active");
		jQuery(this).parent("li").addClass("active");

		jQuery(this).parent("li").parent("ul").parent(".wpfw-builder-options").children(".tab-content").removeClass("active");
		jQuery("#content-"+tid).addClass("active");
		options_setup(objid);
		return false;
		
	});	
	
	// slider
	jQuery(".slider-line").each(function() {
		var min_var = parseInt(jQuery(this).attr("data-min"));
		var max_var = parseInt(jQuery(this).attr("data-max"));
		var step_var = parseInt(jQuery(this).attr("data-step"));
		jQuery(this).slider({
			range: "min",
			min: min_var,
			max: max_var,
			step: step_var,
			slide: function( event, ui ) {
				jQuery(this).parent("div").children(".slider-text").val(ui.value );
			},
			create: function(event, ui) {
				jQuery(this).children(".ui-widget-header").html('<span></span>');
				jQuery(this).children(".ui-slider-handle").html('<span><span></span></span>');
			}
		});
	});
	
	jQuery(".slider-line").each(function() {
		var sval = jQuery(this).parent("div").children(".slider-text").val();
		jQuery(this).slider("value", sval);
	});
	
	jQuery(".slider-text").change(function() {
		jQuery(this).parent("div").children(".slider-line").slider("value", jQuery(this).val());
	});
	
	// select box
	
	

	
	
  // color
	jPickerInit();
	
	// editor
	jQuery(".wp-editor-container .wp-editor-area").each(function() {

			var editor = tinyMCE.get(jQuery(this).attr("id"));
			if(!editor) {

				tinyMCE.settings.toolbar1 = 'bold,italic,underline,alignleft,aligncenter,alignright,link,unlink';
				tinyMCE.settings.toolbar2 = '';
				tinyMCE.execCommand('mceAddEditor', false, jQuery(this).attr("id"));
			}

	});
	jQuery(".FullScreenEditor").unbind("click");
		jQuery(".FullScreenEditor").click(function() {
			var editorid = jQuery(this).attr("href").replace("#","");
			var minieditor = tinyMCE.get(jQuery(this).attr("data-link"));
			var editor = tinyMCE.get(editorid);
			if (minieditor && editor) {
					//alert(minieditor.getContent());
			    // Ok, the active tab is Visual
			    editor.setContent(minieditor.getContent());
			    //$($(this).attr("href")+'Container').attr("data-linkback", $(this).attr("data-link"));
			    jQuery(jQuery(this).attr("href")+'Container').css({display: 'block'});
			}
			jQuery("#wpfw-advance-editor-save").unbind("click");
			jQuery("#wpfw-advance-editor-save").click(function() {
				minieditor.setContent(editor.getContent());
				jQuery("#"+editorid+'Container').css({display: 'none'});
			});
			jQuery("#wpfw-advance-editor-cancel").unbind("click");
			jQuery("#wpfw-advance-editor-cancel").click(function() {
				//minieditor.setContent(editor.getContent());
				jQuery("#"+editorid+'Container').css({display: 'none'});
			});
			 
		});
		
		
		// multiple
		jQuery( ".sortable-elements" )
      .accordion({
        header: "> li > a",
        heightStyle: "content",
        collapsible: true,
        activate: function(event, ui) {
        	yes_no_options(ui.newPanel);	
        	jPickerInit();
        }
      })
      .sortable({
        axis: "y",
        handle: "a.element-title .sortable-handle",
        start: function( event, ui ) {
        	ui.item.parent().find(".wp-editor-container .wp-editor-area").each(function() {
        		var eh = parseInt(jQuery(this).parent().find(".mce-tinymce").height())-55;
        		jQuery(this).css({'height': eh+'px',
        											'border-top': '37px solid #f2f2f2',
        											'color': '#fff',
        											'border-bottom': '18px solid #ffffff'});
						tinyMCE.execCommand('mceRemoveEditor', false, jQuery(this).attr("id"));
					});
        },
        stop: function( event, ui ) {
          // IE doesn't register the blur when sorting
          // so trigger focusout handlers to remove .ui-state-focus
          reorderElements(ui.item.parent());
          ui.item.children( "a.element-title" ).triggerHandler( "focusout" );
          ui.item.parent().find(".wp-editor-container .wp-editor-area").each(function() {
						tinyMCE.settings.toolbar1 = 'bold,italic,underline,alignleft,aligncenter,alignright,link,unlink';
						tinyMCE.settings.toolbar2 = '';   
						tinyMCE.execCommand('mceAddEditor', false, jQuery(this).attr("id"));
					});
					wpfw_image_buttons();

        }
      });
      
		jQuery( ".simple-sortable-elements" )
      .sortable({
        axis: "y",
        handle: ".sortable-handle",
        start: function( event, ui ) {
        	ui.item.parent().find(".wp-editor-container .wp-editor-area").each(function() {
						tinyMCE.execCommand('mceRemoveEditor', false, jQuery(this).attr("id"));
					});
        },
        stop: function( event, ui ) {
          // IE doesn't register the blur when sorting
          // so trigger focusout handlers to remove .ui-state-focus
          reorderElements(ui.item.parent());
          ui.item.parent().find(".wp-editor-container .wp-editor-area").each(function() {
						tinyMCE.settings.toolbar1 = 'bold,italic,underline,alignleft,aligncenter,alignright,link,unlink';
						tinyMCE.settings.toolbar2 = '';         
						tinyMCE.execCommand('mceAddEditor', false, jQuery(this).attr("id"));
					});
					wpfw_image_buttons();
        }
      });  
      
   deleteElements();  
	 addElements();
	}