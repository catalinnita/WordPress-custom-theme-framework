<?php
$pagegname = 'blog';
get_header(); 
?>
<div class="grid">
		<div id="LeftColumn" class="blog-feed g23">
			
			<?php 
			$nr = 1;
	    global $paged;
			while (have_posts()) : the_post(); 
			?>
			<div class="blog-post <?php if(getmb('posttype') == 'video') { echo 'video-post'; } ?>">
			<?php
				switch(getmb('posttype')) {
					default: get_template_part('template_parts/blog-normal'); break;
					case 'mosaic gallery': get_template_part('template_parts/blog-mosaic-gallery'); break;
					case 'video': get_template_part('template_parts/blog-video'); break;
				}
			?>
				<div class="cleaner"></div>
			</div>
			<?php
			$nr++;
			endwhile;
			?>		

			<?php get_template_part('template_parts/blog-pagination'); ?>
	
	</div>
	<div id="RightColumn" class="g13">
		<?php dynamic_sidebar('Blog Sidebar'); ?>
	</div>
</div>

<?php 
$page = 'blog';
get_footer(); ?>