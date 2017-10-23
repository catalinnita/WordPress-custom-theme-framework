<?php
/* Template Name: Testimonials page */
get_header(); ?>
<div class="Content">
	<?php if (getmb("hidetitle") == 'content') { ?>
	<h1><?php the_title(); ?></h1>
	<?php } ?>

	<div id="TestimonialsContainer">
	<ul id="Testimonials" class="AS hslide arrows">
		<?php
		$nr = 1;
	  $the_query2 = new WP_Query("post_type=testimonials&orderby=menu_order&order=ASC&posts_per_page=-1");
		while($the_query2->have_posts()):$the_query2->the_post();  
		?>	
		<li class="panel active panel1">
			<div class="testimonial-thumb" style="background: url(<?php echo get_thumbnail_src(get_the_post_thumbnail(get_the_ID(),'testimonial')); ?>) center center no-repeat;">
				<div class="testimonial-thumb-frame"></div>
			</div>
			<div class="testimonial">
				<?php the_content(); ?>
				<div class="name"><?php the_title(); ?></div>
			</div>
			<div class="cleaner"></div>
		</li>
		<?php 
		$nr++;
		endwhile; 
		?>		
		
	</ul>
	</div>
	<div class="cleaner"></div>
</div>
<div id="ThumbsTestimonials" class="Content AST">
<div class="BottomThumbsContainer">
	<ul id="TestimonialsBottomThumbs" class="BottomThumbs JCO">
			<?php
			$nr = 1;
			$the_query2 = new WP_Query("post_type=testimonials&orderby=menu_order&order=ASC&posts_per_page=-1");
			while($the_query2->have_posts()):$the_query2->the_post();  
			?>
			<li><a href="#<?php echo $nr; ?>"><img class="grayscale" src="<?php echo get_thumbnail_src(get_the_post_thumbnail(get_the_ID(),'gallery2_thumb')); ?>" alt="<?php the_title(); ?>" /><?php the_title(); ?></a></li>
			<?php
			$nr++;
			endwhile;
			?>
	</ul>
</div>
</div>

<?php 
get_footer(); ?>