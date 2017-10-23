		<?php
		// NORMAL POST TEMPLATE PART
		
		$category = get_the_category();
	  if (isset($category[0]->term_id))
	  	$category_link = get_category_link($category[0]->term_id);
	  $date1 = 'jS';
	  $date2 = 'M';
		?>
	
		<?php if (has_post_thumbnail()) { ?>
		<span class="date"><span class="day"><?php the_time($date1); ?></span><span class="month"><?php the_time($date2); ?></span></span>
		<a class="blog-pic ne" href="<?php the_permalink(); ?>"><?php the_post_thumbnail("blog_thumb", array('class' => 'grayscale')); ?></a>
		<?php } ?>
		<div class="blog-details">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<p class="author_date">
				<span class="by_author"><span class="avatar"><?php echo get_avatar(get_the_author_meta('ID'), '30', get_bloginfo('template_url').'/images/default_avatar.png'); ?></span><span class="prefix"><?php _e("by"); ?></span> <?php the_author_posts_link(); ?></span>
				<span class="alt_date"><span class="prefix"><?php _e("on"); ?></span> <?php the_time(get_option('date_format')); ?></span>
			</p>
			<?php 
				global $more;
			  $content = apply_filters("the_content", str_replace(get_the_content('',true), '', get_the_content())); 

			  if (!$content) {
			  	the_excerpt();
			  }
			  else {
			  	echo $content;
			  }
			?>	
			<div class="blog-info">
				<span class="tags"><?php the_tags('', ', ', ''); ?></span>
				<span class="categories"><?php echo get_the_category_list(', ', '', get_the_ID()); ?></span>
				<?php get_template_part('template_parts/blog-shares'); ?>
				<div class="cleaner"></div>
			</div>
		</div>