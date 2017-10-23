<!-- From The Blog Start -->
<div id="HomepageFromTheBlog">
<h2><?php echo of_get_option("homepageblogtitle"); ?></h2>
	<ul>
		<li>
				<?php 
				$nr = 1;
		    global $paged;
				query_posts('post_type=post&posts_per_page=-1');
				while (have_posts()) : the_post(); 
				if ($nr <= 5) {
				?>
				<div class="homepage_blog_item">
			<?php if (get_the_post_thumbnail(get_the_ID()) != '') { ?>
				<a href="<?php the_permalink(); ?>" class="thumbnail ne"><?php the_post_thumbnail("home_blog", array('class' => 'grayscale')); ?><span class="hover">K</span></a>
			<?php } ?>
				<a href="<?php the_permalink(); ?>" class="listing_link"><?php the_title(); ?></a>
				<p><?php echo excr(of_get_option("homepageblogexcr")); ?></p>
				<div class="cleaner"></div>
			</div>
			
			<?php
			}
			$nr++;
			endwhile;
			?>
		<div class="cleaner"></div>
		</li>
	</ul>	
</div>
<!-- From The Blog End -->