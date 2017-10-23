<a onclick="return !window.open(this.href, 'Twitter', 'width=640,height=300')" 
	href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php 
	echo urlencode(strip_tags(get_comment_text())); ?>" 
		class="cshare zocial twitter" title="Post on Twitter"></a>
<a onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" 
	href="http://www.facebook.com/sharer.php?s=100&amp;<?php 
	echo urlencode('p[title]='.get_the_title()); ?>&amp;<?php 
	echo urlencode('p[summary]='.strip_tags(get_comment_text())); ?>&amp;<?php 
	echo urlencode('p[url]='.get_permalink()); ?>&amp;<?php 
	echo urlencode('p[image]='.get_thumbnail_src(get_the_post_thumbnail(get_the_ID(),'blog_footer'))); ?>" 
		class="cshare zocial facebook" 
		title="Share on Facebook"></a>