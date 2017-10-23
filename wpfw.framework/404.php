<?php
/* The template for displaying 404 pages (Not Found). */

get_header(); ?>

	<div id="left-column" class="full-width">
		<div class="article">
			<h1 class="entry-title"><?php _e( 'Not Found', 'wpfw-website'); ?></h1>
			<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'wpfw-website'); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>