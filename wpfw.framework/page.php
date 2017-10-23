<?php 
get_header(); 

if (have_posts()) : the_post(); 
?>
<article class="Content">
	<?php if (getmb("hidetitle") == 'content') { ?>
	<h1><?php the_title(); ?></h1>
	<?php } ?>
	<?php the_content(); ?>
	<?php
	if (function_exists("wpfw_grid") && getmb('showbuildercontent') == 'yes') {
		wpfw_grid(get_the_ID());
	}
?>
</article>
<?php
endif;
?>

<?php get_footer(); ?>