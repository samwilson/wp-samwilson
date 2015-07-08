<?php if (have_posts()): while (have_posts()): the_post() ?>

<article <?php $single = is_single() ? 'is-single' : 'is-not-single'; post_class($single) ?>>
	<div class="header">
		<h2>
			<a href='<?php the_permalink(); ?>' title="Permanent link">
				<strong class="title"><?php echo $post->post_title; ?></strong>
				<?php if ( ! is_page() ): ?>
					<?php if ( ! empty( $post->post_title ) ): ?><span class="title-separator">&mdash;</span><?php endif ?>
					<em class="date"><?php the_time('F jS, Y') ?>, <?php the_time('gA') ?></em>
				<?php endif ?>
			</a>
		</h2>
		<p class="category"><em><?php the_category(' '); ?></em></p>
	</div>
	<p class="header-bottom"></p>

	<div class="post-body">

		<?php if (!empty($post->post_excerpt)) : ?>
			<div class="excerpt"><?php the_excerpt(); ?></div>
		<?php endif; ?>

	<?php if (is_archive() && !isset($_GET['show-full'])) the_excerpt(); else the_content(); ?>

	</div><!-- .post-body -->

	<?php wp_link_pages() ?>

	<p class="info">
		<?php comments_popup_link('[No comments]', '[One comment]', '[% comments]' ,'', '') ?>
		<?php the_tags('[Keywords: ', ', ', ']') ?>
		<a href='<?php the_permalink() ?>'>[Permanent link]</a>
		<?php edit_post_link('[Edit]','','') ?>
	</p>

	<?php if (is_single() || is_page()): ?>
		<div class="comments">
			<?php $withcomments=1; comments_template(); ?>
		</div><!-- end div.comments -->
	<?php endif; ?>

	<!--
	<?php trackback_rdf(); ?>
	-->
</article>

<?php endwhile; endif ?>
