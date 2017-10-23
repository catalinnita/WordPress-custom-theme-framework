<?php
/* Template Name: Right sidebar page */
get_header(); ?>
<?php
	if (have_posts()) : the_post(); 
?>
	<div class="grid">
		<article class="g23">
		<?php if (getmb("hidetitle") == 'content') { ?><h1><?php the_title(); ?></h1><?php } ?>
					
		<?php the_content(); ?>
	
		<?php
		endif;
		?>						
		</article>
		<aside class="g13">
			<?php dynamic_sidebar(get_sidebar_name()); ?>
		</aside>
	</div>


<?php get_footer(); ?>