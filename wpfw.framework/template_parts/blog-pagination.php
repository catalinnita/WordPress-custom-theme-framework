<!-- start pagination -->		
<?php 
if ($wp_query->max_num_pages > 1 ) : ?>
	<div class="pagination">
		<?php //if(function_exists('wp_paginate')) { wp_paginate(); }  else { ?>
			<div class="prev"><?php next_posts_link( __( '<span>&lt; Older</span>', 'wpfw-website')); ?></div>
			<div class="next"><?php previous_posts_link( __( '<span>Newer &gt;</span>', 'wpfw-website')); ?></div>
		<?php //} ?>
		<!--END .navigation ,page-navigation -->
		<div class="cleaner"></div>
	</div>	

<?php endif; ?>			
<!-- end pagination -->	

