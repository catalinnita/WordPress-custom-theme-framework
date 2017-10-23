<!-- Homepage Articles Start -->
<div id="HomepageArticles" class="grid">
	<?php
	$the_query2 = new WP_Query(array("post_type"=>"homearticles","orderby"=>"menu_order", "order"=>"ASC", "posts_per_page"=>3));
	$nr = 1;
	while($the_query2->have_posts()):$the_query2->the_post();				
		get_thumbnail_src(get_the_post_thumbnail(get_the_ID(),'home_article'));
		?>
		<div class="article-3-1 g13">
			<div class="frame">
				<a href="<?php mb('articlelink'); ?>" class="article-link ne"><?php the_post_thumbnail('home_article', array('class' => 'grayscale')); ?></a>
				<h3><a href="<?php mb('articlelink'); ?>"><?php the_title(); ?></a></h3>
			</div>
		</div>
		<?php
		$nr++;
	endwhile;
	?>			
</div>
<!-- Homepage Articles End -->