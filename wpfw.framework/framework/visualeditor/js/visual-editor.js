	jQuery(document).ready(function($){ 
		
		$("#wpfw-visual-editor-options").css({minHeight: parseInt($("#wpfw-visual-editor-playground").height()) });
		
		$("#wpfw-editor-export").click(function() {
			window.location = $(this).attr("data-link");
		});
		
		$("#wpfw-editor-import").change(function() {
			$(this).parent().submit();
		});
		
		
		$(".FullScreenEditor").unbind("click");
		$(".FullScreenEditor").click(function() {
			var editorid = $(this).attr("href").replace("#","");
			var minieditor = tinyMCE.get($(this).attr("data-link"));
			var editor = tinyMCE.get(editorid);
			if (minieditor && editor) {
			    editor.setContent(minieditor.getContent());
			    $($(this).attr("href")+'Container').css({display: 'block'});
			}
			$("#wpfw-advance-editor-save").click(function() {
				minieditor.setContent(editor.getContent());
				$("#"+editorid+'Container').css({display: 'none'});
			});
			$("#wpfw-advance-editor-cancel").click(function() {
				//minieditor.setContent(editor.getContent());
				$("#"+editorid+'Container').css({display: 'none'});
			});			 
		});
		
		// sortable initialization
		$(".rowcontainer").sortable({
			connectWith: ".rowcontainer",
			placeholder: "ui-marker",
			zIndex: 1001,
			start: function(event, ui) {
				ui.item.removeClass("element").addClass("floatingelement").css({zIndex: 1001});
				//checkrows();
				coord(ui);
			},
			beforeStop: function(event, ui) {
				ui.item.removeClass("floatingelement").addClass("element").css({zIndex: 'auto'});
			},
			deactivate: function(event, ui) {
				$(".rowcontainer").children("li").resizable({
					grid: step,
					handles: "e",
					maxWidth: cwidth,
					minWidth: elementwidth,
					placeholder: "ui-marker",
					resize: function(event, ui) {
						coord(ui);
						var parentid = ui.helper.parent("ul").attr("id");
						var ctw = getmaxwidth(parentid, cwidth, ui);
						ui.element.resizable("option", "maxWidth", ctw);				
						checkrows();	
					}
				});
			},
			stop: function(event, ui) {
				giveIds();
				checkrows();
			},
			receive: function(event, ui) {
				giveIds();
				checkrows();
				showOptions();
			},
			remove: function( event, ui ) {
				giveIds();
				checkrows();
			}
		});			
		
		// draggable initialization
		$(".droptrue > li").draggable({
			connectToSortable: ".rowcontainer",
			placeholder: "ui-marker",
			scroll: true, 
			scrollSpeed: 100,
			helper: "clone",
			revert: "invalid",
			revertDuration: 0,
			zIndex: 1001,
			start: function(event, ui) {
				console.log("drag start");
				//checkrows();
			},
			stop: function(event, ui) {
				$(ui.helper).remove();
				giveIds();
				checkrows();
				console.log("drag stop");
				//showOptions();
			}			
		});				
		
		
		
		// resizable initialization
		$(".rowcontainer").children("li").resizable({
				grid: step,
				handles: "e",
				maxWidth: cwidth,
				minWidth: elementwidth,
				placeholder: "ui-marker",
				resize: function(event, ui) {
					coord(ui);
					var parentid = ui.helper.parent("ul").attr("id");
					var ctw = getmaxwidth(parentid, cwidth, ui);
					ui.element.resizable("option", "maxWidth", ctw);				
					checkrows();	
				}
		});
		

		
		$(".rowcontainer").droppable({	
			accept: '.element',
			drop: function(event, ui) {
				giveIds();
				checkrows();	
				console.log("drop end");
			}
		});		
		
			
		
		
		function getmaxwidth(ob, maxw, ui) {
			var tw = 0;
			$("#"+ob).children("li").not(ui.element).each(function() { 
				if ($(this) != ui.element) {
					tw = tw+parseInt($(this).width())+12;
				}
			});
			
			var ret = maxw-tw;
			return ret;
		}

		function coord(ui) {
				
				var moff = $("#wpfw-visual-editor-mainarea").offset();
				var mol = parseInt(moff.left+10);
				var mot = parseInt(moff.top+10);
				var mor = mol+parseInt($("#wpfw-visual-editor-mainarea").width());
				var mob = mot+parseInt($("#wpfw-visual-editor-mainarea").height());
				
				var off = ui.helper.offset();
				var ol = parseInt(off.left)-mol;
				var ot = parseInt(off.top)-mot;
				var or = ol+parseInt(ui.helper.width())+12;
				var ob = ot+parseInt(ui.helper.height())+12;		
				var ow = parseInt(ui.helper.width());
				
				$(".ui-marker").css({width: ow+'px'});
				
		}
		
		function top_tabs() {
			$("#wpfw-visual-editor-playground .top-tabs li a").unbind("click");

			$("#visual-editor-close, #wpfw-editor-close").click(function() {
				$("#adminmenuback, #adminmenuwrap, #wpcontent, #wpfooter", parent.document).css({display: 'block'});
				$('iframe#wpfw-visual-editor', parent.document).css({display: 'none'});
				$("html", parent.document).addClass('wp-toolbar');
			});
			
			$("#wpfw-visual-editor-playground .top-tabs li a").not("#wpfw-visual-editor-playground .top-tabs li.menu a").click(function() {
				
				var tid = $(this).attr("href").replace("#", "");
				$(this).parent("li").parent("ul").children("li").removeClass("active");
				$(this).parent("li").addClass("active");			
				$("#sortable1").children("li").css({display: 'none'});
				$("#sortable1").children("li").each(function() {
					if($(this).hasClass(tid)) {
						$(this).css({display: 'block'});
					}
				});
				return false;
				
			});				
		}		
		
		function checkrows() {
			var twidth = cwidth;
			var elwidth = elementwidth+12;
			var activeel = '';
			var total = 0;
			
			$(".rowcontainer").each(function() {
				var tw = 0;
				var cid = $(this).attr("id");
				$("#"+cid).children("li").each(function() {
					tw = tw+parseInt($(this).width())+12;
				});
				
				total = twidth-tw;
				if (total >= elwidth) {
					if (activeel == '') {
						activeel = "#"+cid;
					}
					else {
						activeel = activeel+', #'+cid;
					}
				}
				
				// set up hidden inputs

				if($(this).children("li").size() < 1) {
					for(i = 1 ; i <=4 ; i++) {
						$('#'+cid+'-el'+i).val("");
					}
				} else {
					var elnr = 1;
					$(this).children("li").each(function() {
						//alert($(this).attr("id"));
						if ($(this).attr("id")) {
							var objval = '{id:'+$(this).attr("id").substr(3,999)+';w:'+parseInt($(this).width())+';t:'+$(this).children("span").attr("id")+'}';
						}
						else {
							var objval = '';
						}
						$('#'+cid+'-el'+elnr).val(objval);
						elnr = elnr+1;	
					});
					if (elnr < 4) {
					 for(i = elnr ; i <=4 ; i++) {
						$('#'+cid+'-el'+i).val("");
					 }
					}
				}
				
			});
			$(".del").unbind("click");
			$(".del").click(function(event) {
				//event.stopImmediatePropagation();
				var elid = $(this).parent().parent().parent(".element").attr("id");
				var rowid = $(this).parent().parent().parent(".element").parent(".rowcontainer").attr("id").substr(3,999);
				var elidnr = elid.substr(3,999);
				//alert($(this).parent().parent().parent(".element").parent(".rowcontainer").attr("id"));
				var elnr = 1;
				var selnr = 0;
				$(this).parent().parent().parent(".element").parent(".rowcontainer").children("li").each(function() {
					if ($(this).attr("id") == elid) {
						selnr = elnr;
					}
					elnr = elnr+1;
				});
				$('#row'+rowid+'-el'+selnr).val("");
				if($("#obj"+elidnr).children().children(".icon").hasClass("active")){
					$(".no-element-selected").css({display: 'block'});
				}
				$("#wpfw-options-"+elidnr).remove();
				$(this).parent().parent().parent(".element").empty().remove();
				
				checkrows();
			});			
			
			// update elements info
			//$(".droptrue > li").draggable("option", "connectToSortable", activeel);
			//$(".rowcontainer").sortable("option", "connectWith", activeel);				
			
			// add rows if necessary
		}

	
		$("body").data("maxid", 0);
		function getMax() {
			$("li.ui-resizable").each(function() {
				var cid = $(this).attr("id");
				if (cid != undefined) {
					cid = cid.substr(3, 999);
					if (parseInt(cid) > $("body").data("maxid")) { $("body").data("maxid", cid); }
				}
			});
			return parseInt($("body").data("maxid"))+1;
		}
		
		function giveIds() {
			var maxid = getMax();
			$("li.ui-resizable").each(function() {
				var cid = $(this).attr("id");
				if ($(this).attr("id") == undefined) {
					$(this).attr({id:'obj'+maxid});
				}
			});
		}		
				
		function showOptions() {
			$(".rowcontainer li.element .container").unbind("click");
			$(".rowcontainer li.element .container").click(function(event) {
				var id = $(this).parent("li").attr("id").substr(3,999);
				
				// the object was added after save
				if($("#wpfw-options-"+id).attr("id") == undefined) {
					$("#wpfw-visual-editor-options").append('<div class="wpfw-builder-options" id="wpfw-options-'+id+'" style="display: none;"></div>');
					$("#wpfw-options-"+id).load("options.php?visual_editor=true&id="+id+"&obj="+$(this).attr("id"), function() {
						options_setup(id);
					});
				}
				
				$(".wpfw-builder-options, .no-element-selected").css({display: 'none'});
				$("#wpfw-options-"+id).css({display: 'block'});
				$(".icon").removeClass("active");
				$(this).children(".icon").addClass("active");
				options_setup(id);
			});
		}

		
		
		var options = { 
   			success : function() {
					$("#wpfw-saving-animation").css({display: 'none'});
						$("#wpfw-editor-save").css({display: 'block'});	
						$("#wpfw-editor-save").animate({width: 136, height: 40, marginTop: 0}, 200, function() {
							$("#wpfw-editor-save").val("Save");
						});
						$(".loading").removeClass("loading");
						$(".WPFWImagePreview").each(function() {
							if($(this).attr("data-url") != '' && $(this).attr("data-url") != undefined) {
								$(this).html('<img src="'+$(this).attr("data-url")+'" alt="" />');	
							}
						})
   			}
   		}
			$('#wpfw-options-form').ajaxForm(options); 			
		
		$("#wpfw-editor-save").click(function() {
			$(".FullScreenEditor").each(function() {
				if($(this).attr("data-link").indexOf("--nr--") == -1) {
					var editorid = $(this).attr("data-link");
					var editor = tinyMCE.get(editorid);
					$("#"+editorid).html(editor.getContent());
				}
			});			
			checkrows();
			$("#wpfw-editor-save").val("").animate({width: 200, height: 20, marginTop: 10}, 200, function() {
				$("#wpfw-editor-save").css({display: 'none'});
				$("#wpfw-saving-animation").css({display: 'block'});	
			});
			$("#wpfw-options-form").submit();
		});
		
		top_tabs();
		showOptions();		
		checkrows();
		addElements();

	
	});