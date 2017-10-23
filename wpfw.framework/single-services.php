<?php
get_header(); ?>
<?php
	if (have_posts()) : the_post(); 
?>
	<div id="MainWrapContainer">
		<div id="LeftColumn" class="content">
		<h1><?php the_title(); ?></h1>
					
		<?php the_content(); ?>
	
	<?php
	endif;
	?>						
	</div>
		<div id="RightColumn">
		<?php 
		dynamic_sidebar("Services Sidebar"); 
?>
	</div>
	<div class="cleaner"></div>
</div>
<?php get_footer(); ?>