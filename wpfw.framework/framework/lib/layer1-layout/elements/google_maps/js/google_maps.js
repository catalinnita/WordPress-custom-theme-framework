function popOver(containerId, id, title, content) {
	content = '<div id="'+id+'" class="popover top in"><div class="arrow"></div><h3 class="popover-title">'+title+'</h3><div class="popover-content">'+content+'</div></div>';
	if ($("#"+id).length == 0) {
		$("#"+containerId).append(content);

		$("#mc").remove();
	
		$("#"+id).css({left: 0, top: 0});
		$("#"+id).fadeIn(200);
	}
	else {
		$("#"+id).remove();
	}
	

}