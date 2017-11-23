<ol>

	<li class="microblog">
		<h3>Microblog</h3>
		<?php
		$args = array(
			'posts_per_page' => 5,
			'post_type'=> 'post',
			'post_status' => 'publish',
			'order' => 'DESC',
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-status' )
				)
			)
		);
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ): while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<a href="<?php the_permalink() ?>#post" <?php post_class('anchor-list') ?>>
				<em class="comment">Reply to this</em>
				<strong class="date">
					<?php echo human_time_diff( get_the_time('U'), current_time( 'timestamp' ) ) ?> ago:
				</strong>
				<?php the_excerpt() ?>
			</a>
		<?php endwhile; endif; wp_reset_query() ?>
	</li>

	<li class="recent-photos">
		<h3>Random photos</h3>
		<?php
		$url = "https://photos.samwilson.id.au/ws.php?format=php&method=pwg.categories.getImages&per_page=5&order=random";
		$response = wp_remote_get($url);
		if ($response instanceof WP_Error || !is_serialized($response['body'])) {
			echo '<p>[Error: Unable to retrieve photos at this time.]</p>';
			$photos = [];
		} else {
			$photos = unserialize($response['body'])['result']['images'];
		}
		foreach ($photos as $photo) {
			$name = $photo['name'];
			$url = $photo['page_url'];
			$src = $photo['derivatives']['xsmall']['url'];
			$height = $photo['derivatives']['xsmall']['height'];
			$creationTime = strtotime($photo['date_creation']);
			$date = (!$creationTime) ? 'Date unknown' : date('l j F Y', $creationTime);
			echo "<p><a href='$url' class='anchor-list'><img src='$src' /><br />";
			echo "<strong class='date'>$date:</strong><br /><span class='caption'>$name</span></a>";
			echo "</p>";
		}
		?>
	</li>

	<?php wp_list_bookmarks( [
		'title_li'         => 'Links',
		'title_before'     => '<h3>',
		'title_after'      => '</h3>',
	] ); ?>

</ol>
