<?php
get_header();
?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		
		<!-- meta headers -->
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
		<!-- RSS and pingback settings -->		
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />		
		
		<!-- favincon -->
		<link rel="shortcut icon" href="<?php echo of_get_option("favicon");?>" />
		
		<!-- load customizable styles -->	
		<?php get_customizable_styles(); ?>
		<!-- load scripts vars -->	
		<?php get_scripts_vars(); ?>
		<?php wp_head(); ?>

	</head>
	<body>
		<div class="booking_form content">
			<!--<input type="text" class="nomob date-input" value="<?php echo $_GET['date']; ?>" />-->
			<?php
			echo do_shortcode('[contact name="'.of_get_option("hb_booking_form").'" add_field="date"]');
			?>
			<p class="mob"><a href="<?php echo site_url(); ?>">Close this page</a></p>
		</div>
		
	<?php wp_footer(); ?>	
		<style>
			#wpadminbar { display: none !important; }
			html { margin-top: 0px !important; }
		</style>	
	</body>
</html>