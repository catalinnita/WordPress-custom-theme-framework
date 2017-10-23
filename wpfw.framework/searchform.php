<div id="search">
	<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
		  <fieldset>
		  	<input id="s" type="text" name="s" 
		   				 value="<?php if(isset($_GET['s'])) { echo $_GET['s']; } else { _e('Search', 'wpfw-website'); } ?>" 
		   			 	 onclick="if (this.value=='<?php _e('Search', 'wpfw-website'); ?>') { this.value = ''; }" />
		  	<span class="search-button"><input type="submit" value="L" /></span>
			</fieldset>
	</form>
</div>