<?php
$the_query2 = new WP_Query("post_type=post&cat=".of_get_option('favescategory')."&posts_per_page=4");
$nr = 1;
if ($the_query2->have_posts()) {
?>

<div id="BlogFooterContainer">
	<div id="BlogFooter" class="WebsiteWidth"> 
		<div class="grid">
		<?php
		while($the_query2->have_posts()):$the_query2->the_post(); 				
		if (get_the_post_thumbnail(get_the_ID(),'blog_footer')) { 
		?>	
		<div class="footer-item g14">
			<div class="container">
				<?php if (get_the_post_thumbnail(get_the_ID(),'blog_footer')) { ?>
				<a class="thumb ne" href="<?php the_permalink(); ?>">
					<img class="grayscale" src="<?php echo get_thumbnail_src(get_the_post_thumbnail(get_the_ID(),'blog_footer')); ?>" alt="<?php the_title(); ?>" />
					<span class="hover">K</span>
				</a>
				<?php } ?>
				<a href="<?php the_permalink(); ?>" class="a-title"><?php the_title(); ?></a>
				<div class="cleaner"></div>
			</div>
		</div>							
			
		<?php
		$nr++;
		}
		endwhile;
		?>
		<div class="cleaner"></div>
		</div>
	</div>
</div>
<?php 
} 
?>