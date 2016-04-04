<ol>

	<li class="description">
		<p>
			<img style="float:right;margin:0 0 0 0.4em"
				 src="http://gravatar.com/avatar/fb786fe44024640b90a8bb15a11507df"
				 title="My Gravatar picture" alt="Gravatar picture" />
			<a style="float:left;margin:0 0.4em 0 0" href="<?php bloginfo('atom_url'); ?>" title="Subscribe to my news feed">
				<img src="<?php echo get_template_directory_uri() ?>/img/feed-icon-28x28.png" alt="Feed icon" />
			</a>
			<?php bloginfo('description') ?>
		</p>
		<p>I'm also on:
		<a rel="me" href="https://en.wikisource.org/wiki/User:Samwilson" title="Username: Samwilson">Wikisource</a>,
		<a rel="me" href="https://github.com/samwilson" title="Username: samwilson">GitHub</a>,
		<a rel="me" href="https://en.wikipedia.org/wiki/User:Samwilson" title="Username: Samwilson">Wikipedia</a>,
		<a rel="me" href="https://www.openstreetmap.org/user/Sam%20Wilson" title="Username: Sam Wilson">OpenStreetMap</a>,
		<a href="http://stackexchange.com/users/35218" title="My profile on Stack Exchange">Stack Exchange</a>,
		<a rel="me" href="https://twitter.com/samwilson" title="@samwilson">Twitter</a>, and
		<a rel="me" href="http://orcid.org/0000-0003-4308-3443" title="ID: 0000-0003-4308-3443">ORCID</a>.
		</p>
	</li>

	<li>
		<form action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get" role="search" class="search-form">
			<input type="search" placeholder="Search this site&hellip;" value="<?php get_search_query() ?>" name="s" id="s" class="search-field" size="13" />
			<input type="submit" class="search-submit" value="Search" />
		</form>
	</li>

	<li class="osm">
		<h3>Mapping</h3>
		<p>
			I've been <a href="http://hdyc.neis-one.org/?Sam%20Wilson"></a>contributing</a>
			to <a href="http://osm.org">OpenStreetMap</a> since 29 April 2008; my username is
			<a rel="me" href="http://www.openstreetmap.org/user/Sam%20Wilson" title="Username: Sam Wilson">Sam&nbsp;Wilson</a>.
			I'm currently living somewhere on this map:
		</p>
		<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
			src="https://www.openstreetmap.org/export/embed.html?bbox=115.72888612747192%2C-32.061518848030076%2C115.75785398483276%2C-32.04887945658629&amp;layer=mapnik"></iframe>
	</li>

	<li><h3>Categories</h3>
	<?php foreach (get_categories() as $cat): ?>
	<p>
		<a class="anchor-list" href="<?php echo get_category_link($cat->term_id) ?>" title="<?php echo "View all posts in $cat->name" ?>">
			<strong class="name"><?php echo $cat->name ?>:</strong>
			<?php echo $cat->description ?>
		</a>
	</p>
	<?php endforeach ?>
	</li>

	<li class="recent-posts"><h3>Recent Posts</h3><dl><?php // This bit is silly eh?
	$now = gmdate("Y-m-d H:i:s",time());
	$request = "SELECT ID, post_title, MONTHNAME(post_date) AS `month`, YEAR(post_date) AS `year` "
		." FROM $wpdb->posts "
		." WHERE post_status = 'publish' AND post_password = '' AND post_type='post' "
		." ORDER BY post_date DESC LIMIT 15";
	$posts = $wpdb->get_results($request);
	$prev_month = '';
	$prev_year = '';
	foreach ($posts as $post) {
		$post_title = stripslashes($post->post_title);
		$permalink = get_permalink($post->ID);
		if ($post->month!=$prev_month) {
			echo "<dt>$post->month $post->year</dt>";
		}
		echo "<dd><a href='$permalink'>$post_title</a></dd>";
		$prev_month = $post->month;
		$prev_year = $post->year;
	} ?>
	<dt><em>Earlier</em></dt>
	<dd>
		<a href="<?php site_url('/archive-of-posts').$prev_month.$prev_year ?>">
			View posts prior to <?php echo $prev_month.' '.$prev_year; ?>
		</a>
	</dd>
	</dl></li>

	<li>
		<h3>Recent Comments</h3>
		<ul><?php samwilson_recent_comments() ?></ul>
	</li>

	<li class="tags">
		<h3>Index</h3>
		<p><em>In descending order of frequency of use.</em>
			<?php foreach (get_tags('orderby=count&order=desc') as $tag): ?>
			<?php if ( $tag->count < 2 ) continue; ?>
			<a href="<?php echo site_url('/tag/'.$tag->slug) ?>" title="Count: <?php echo $tag->count ?>">
				<?php echo $tag->name ?>
			</a>
			<?php endforeach ?>
		</p>
	</li>

</ol> <!-- end #sidebar -->
