<?php
/* The template for displaying Comments. */

?>

<div class="comments">
<?php if ( have_comments() ) : ?>

	<div class="comments_title"><span>Comments</span></div>
	
	<?php
	$args = array(
    'walker'            => null,
    'style'             => 'div',
    'callback'          => 'c_comment',
    'type'              => 'comment',
    'avatar_size'       => 30);
   	wp_list_comments($args);
   	paginate_comments_links();
	?>

  <div class="cleaner"></div>
  <?php  
	endif; 
	?>
	
	<?php if ( ! comments_open() ) {  ?>
	<!--<p class="nocomments"><?php _e( 'Comments are closed.', 'wpfw-website' ); ?></p>-->
	<?php } else { ?>
		
		
		
		<!-- comments reply form -->
			<div class="comments-form">
				<div class="comments-form-container">
					<?php 
					$args = array(
						'fields' => apply_filters( 'comment_form_default_fields', array(
							'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name', 'wpfw-website' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
							'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'wpfw-website' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /></p>',
						)),
						'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8"></textarea></p>'
					);
					comment_form($args); ?>
				</div>
			</div>

<?php }?>
</div>