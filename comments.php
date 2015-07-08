<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php echo get_comments_number() ?> comments
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 100,
					'format' => 'xhtml', // current_theme_supports( 'html5', 'comment-list' ) ? 'html5' : 'xhtml',
				) );
			?>
		</ol><!-- .comment-list -->
		<?php paginate_comments_links() ?>

	<?php endif; // have_comments() ?>

	<?php if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ): ?>
		<p class="no-comments">Comments are closed.</p>
	<?php endif; ?>

	<div class="panel"><?php comment_form(); ?></div>

</div><!-- .comments-area -->
