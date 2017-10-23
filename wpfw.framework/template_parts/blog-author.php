	<div class="AboutTheAuthor">
		<div class="author-container">
		<div class="author-container">
			<div class="author-thumb">
				<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_avatar(get_the_author_meta('user_email'), 196); ?></a>
				<span class="author-name"><?php the_author_meta('display_name'); ?></span>
			</div>
			<div class="title">About The Author</div>
			<p><?php the_author_meta('user_description'); ?></p>
			<div class="cleaner"></div>
		</div>
		</div>
	</div>		