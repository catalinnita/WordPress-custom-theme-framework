<?php
/* Template Name: Page Blog */
get_header(); 
?>
		<?php 
		if (of_get_option('blogslidershow') == 'yes') { 
			get_template_part('template_parts/blog-slider-anything');
		} 
		?>
		<?php if (getmb("hidetitle") == 'content') { ?>
		<h1><?php the_title(); ?></h1>
		<?php } ?>
		<!-- Left Column Start -->
		<div class="grid">
		<article class="g23">
			<?php 
			$nr = 1;
	    global $paged;
			query_posts('post_type=post&paged='.$paged);
			while (have_posts()) : the_post(); 
			?>
			<div class="blog-post <?php echo str_replace(" ", "_", getmb('posttype')); ?>-post">
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
			
			get_template_part('template_parts/blog-pagination');
			
			wp_reset_query();
			?>
		</article>
		<!-- Left Column End -->
		<!-- Right Column Start -->
		<aside class="g13">
			<?php get_sidebar(); ?>
		</aside>
		<!-- Right Column End -->
		
	</div>

<?php 
$page = 'blog';
get_footer(); 
?>