(function (e) {
    e.fn.sorted = function (t) {
    		
        var n = {
            by: function (e) {
                return parseInt($(e).attr("data-id"));
            
        }};
        return e.extend(n, t), 
        			 $data = e(this), 
        			 arr = $data.get(), 
        			 arr.sort(function (t, r) {
            var i = n.by(e(t)),
                s = n.by(e(r));
            return n.reversed ? i < s ? 1 : i > s ? -1 : 0 : i < s ? -1 : i > s ? 1 : 0
        }), e(arr)
    
}})(jQuery);

jQuery(document).ready(function($) {
		// prepare the grid for quick sand
		//$(".QSContainer.grid").addGridAbsoluteWidth();
 	  var e = function (e) {
        var t = {
            selected: !1,
            type: 0
        };
        for (var n = 0; n < e.length; n++) e[n].indexOf("selected-") == 0 && (t.selected = !0), e[n].indexOf("segment-") == 0 && (t.segment = e[n].split("-")[1]);
        return t
    }, t = function (e) {
            var t = e.parent().filter('[class*="selected-"]');
            return t.find("a").attr("data-qs")
        }, n = function (e) {
            var t = e.parent().filter('[class*="selected-"]');
            return t.find("a").attr("data-qs")
        }, r = {
                	adjustHeight: 'dynamic',
                	adjustWidth: 'dynamic',
                	useScaling: true,
                	retainExisting : false,
                	enhancement : function(c) {
                		c.addGridAbsoluteWidth();
										$(".WPFW-Frame").addFancyBox().addHoverEffect();
                	}
                } , i = $(".QSContainer"),
        s = i.clone(),
        o = $(".QSFilter ul");
    o.each(function (u) {
        var a = $(this),
            f = a.find("a");
        f.bind("click", function (u) {
        	
            var a = $(this),
                l = a.parent(),
                c = e(l.attr("class").split(" ")),
                h = c.selected,
                p = c.segment;
            if (!h) {
                f.parent().removeClass("btn-primary").addClass("btn-default").removeClass("selected-0").removeClass("selected-1").removeClass("selected-2"), l.addClass("selected-" + p).removeClass("btn-default").addClass("btn-primary");
                var d = t(o.eq(1).find("a")),
                    v = n(o.eq(0).find("a"));
                if (v == "wpfw-all") var m = s.children("div.QS");
                	else var m = s.children("div." + v); 
                	
                if (d) {
                	var g = m.sorted({
                    by: function (e) {
                        return parseFloat($(e).find(d).text())
                    }
	                });	
              	}
                else {
                	var g = m;
                }
                
                g.removeGridCleaners().addGridCleaners();
                
                i.quicksand(g, r)
            }
            u.preventDefault()
        })
    });
});