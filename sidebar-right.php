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
			<a href="<?php the_permalink() ?>#commentform" <?php post_class('anchor-list') ?>>
				<em class="comment">Reply to this</em>
				<strong class="date">
					<?php echo human_time_diff( get_the_time('U'), current_time( 'timestamp' ) ) ?> ago:
				</strong>
				<?php the_excerpt() ?>
			</a>
		<?php endwhile; endif; wp_reset_query() ?>
	</li>

	<li>
		<h3>Recent photos</h3>
		<?php
		$url = "https://photos.samwilson.id.au/ws.php?format=php&method=pwg.categories.getImages&per_page=5&order=date_creation";
		$response = wp_remote_get($url);
		$photos = unserialize($response['body']);
		foreach ($photos['result']['images'] as $photo) {
			$name = $photo['name'];
			$url = $photo['page_url'];
			$src = $photo['derivatives']['xsmall']['url'];
			$height = $photo['derivatives']['xsmall']['height'];
			$date = date('l j F Y', strtotime($photo['date_creation']));
			echo "<p><a href='$url' class='anchor-list'><img src='$src' /><br />";
			echo "<strong class='date'>$date:</strong><br /><span class='caption'>$name</span></a>";
			echo "</p>";
		}
		?>
	</li>

</ol>
