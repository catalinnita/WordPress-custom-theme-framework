<?php
get_header(); 
?>
<div class="grid">
<div id="LeftColumn" class="Content blog-feed blog-detail g23">
	<div id="LeftColumnContainer" <?php post_class(); ?>>
<?php
	if (have_posts()) : the_post();
		$date1 = 'jS';
	  $date2 = 'M'; 
?>	

	<div class="blog-post">
		<?php if (has_post_thumbnail()) { ?>
		<span class="date"><span class="day"><?php the_time($date1); ?></span><span class="month"><?php the_time($date2); ?></span></span>
		<?php } ?>
		<?php 
		switch(getmb('posttype')) {
		
			default: 
		?>		
		<a class="blog-pic ne" href="#">
			<?php the_post_thumbnail("blog_thumb", array('class' => 'grayscale')); ?>
		</a>
		<?php break; ?>
		
		<?php case 'video': ?>
		<?php 
			echo do_shortcode("[generalvideo width='668' height='376' src='".getmb('videolink')."']");
		?>				
		<?php break; ?>
		<?php } ?>
		
		<div class="blog-details">
			<h1><?php the_title(); ?></h1>
			<p class="author_date">
				<span class="by_author"><span class="avatar"><?php echo get_avatar(get_the_author_meta('ID'), '30', get_bloginfo('template_url').'/images/default_avatar.png'); ?></span><span class="prefix"><?php _e("by"); ?></span> <?php the_author_posts_link(); ?></span>
				<span class="alt_date"><span class="prefix"><?php _e("on"); ?></span> <?php the_time(get_option('date_format')); ?></span>
			</p>			
			<?php the_content(); ?>

			<div class="blog-info">
				<div class="container">
					<?php get_template_part('template_parts/blog-shares'); ?>
					<span class="categories"><?php echo get_the_category_list(', ', '', get_the_ID()); ?></span>
					<div class="cleaner"></div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="cleaner"></div>
	<?php wp_link_pages(); ?> 
	<?php get_template_part('template_parts/blog-related'); ?>
	<div class="cleaner"></div>
	
	<div id="CommentsContainer">
	<?php comments_template('', true); ?>	
	</div>
	
<?php endif; ?>
</div>
</div>
<div id="RightColumn" class="g13">
	<?php dynamic_sidebar('Blog Sidebar'); ?>
</div>
</div>

<?php 
$page = 'blog';
get_footer(); ?>