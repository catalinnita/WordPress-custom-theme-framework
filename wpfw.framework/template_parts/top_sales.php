<div id="MainWrap" class="BestSale horizontal">
		<div class="title">Top Sellers</div>
		<div id="BestSale" class="BestSaleContainer carousel">
			<a href="#" class="carousel_prev" rel="BestSale"><</a>
			<div class="carousel_container">
				<ul>
					
		<?php

			$number = 12;
		
    	$query_args = array(
    		'posts_per_page' => $number,
    		'post_status' 	 => 'publish',
    		'post_type' 	 => 'product',
    		'meta_key' 		 => 'total_sales',
    		'orderby' 		 => 'meta_value',
    		'no_found_rows'  => 1,
    	);

    	$query_args['meta_query'] = array();

    	/*if ( isset( $instance['hide_free'] ) && 1 == $instance['hide_free'] ) {
    		$query_args['meta_query'][] = array(
			    'key'     => '_price',
			    'value'   => 0,
			    'compare' => '>',
			    'type'    => 'DECIMAL',
			);
    	}*/

	    //$query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
	    //$query_args['meta_query'][] = $woocommerce->query->visibility_meta_query();

		$r = new WP_Query($query_args);

		if ($r->have_posts()) :
?>
		<?php  while ($r->have_posts()) : $r->the_post(); ?>
		<li>
			<div class="inner">
				<a class="article-4-1" href="<?php the_permalink() ?>" style="background: url(<?php echo get_thumbnail_src(get_the_post_thumbnail(get_the_ID(),'shop_listing')); ?>) center center no-repeat;">
					<span class="bs-title"><?php the_title(); ?></span>
				</a>
			</div>
		</li>
		<?php endwhile; ?>
	<?php
		endif;




?>

				</ul>
			</div>					
			<a href="#" class="carousel_next" rel="BestSale">></a>		
			<div class="cleaner"></div>			
		</div>
	</div>