jQuery(function($){
	
	var dds = $(".navbar-nav .dropdown .dropdown-menu li");
	
	dds.hover(function(e){
		// positioning the third level dd
		var eoff = $(this).offset();
		var doff = $(this).parent("ul").offset();
		var ddt = parseInt(eoff.top)-parseInt(doff.top);
		var ddl = parseInt($(this).width());
		var ddt = 0; // add by wpfw
		$(this).children(".dropdown-menu").css({top: ddt, left: ddl});
		
  	$(this).children(".dropdown-menu").css({display: 'block'});
  }).mouseleave(function(e) {
  	$(this).children(".dropdown-menu").css({display: 'none'});
  });
  
});