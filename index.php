<!doctype html>
<html class="no-js" <?php language_attributes() ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/style.css" />
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ) ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?>>

		<header>
			<h1>
				<a href="<?php echo esc_url( home_url( '/' ) ) ?>" rel="home">
					<?php bloginfo( 'name' ) ?>
				</a>
			</h1>
			<nav>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/contact' ) ) ?>">Contact</a></li>
					<li><a href="<?php echo esc_url( home_url( '/archives' ) ) ?>">Archives</a></li>
					<li><a href="https://photos.samwilson.id.au" class="external">Photos &nearr;</a></li>
					<li><a href="https://news.samwilson.id.au" class="external">News &nearr;</a></li>
				</ul>
			</nav>
		</header>

		<main>
			<div class="main-inner"><?php get_template_part( 'main' ) ?></div>
			<?php the_posts_pagination( array( 'screen_reader_text' => 'Go to page:' ) ) ?>
		</main>
		<aside id="left-sidebar">
			<?php get_sidebar('left') ?>
		</aside>
		<aside id="right-sidebar">
			<?php get_sidebar('right') ?>
		</aside>

		<footer>
			<ul>
				<li class="copyright">&copy;&nbsp;2003&ndash;<?php echo date('Y')?></li>

				<li class="author">
					<div id="hcard-Sam-Wilson" class="vcard">
						<a class="url fn" href="https://samwilson.id.au/">Sam Wilson</a>
						&lt;<a class="email" title="Email me" href="mailto:sam@samwilson.id.au">sam@samwilson.id.au</a>&gt;
						<div class="adr">
							<span class="locality">Fremantle</span>, <span class="region">Western Australia</span>
							<span style="display:none"><span class="country-name">Australia</span> <span class="postal-code">6163</span></span>
						</div>
					</div>
				</li>

				<li class="admin">
					<?php if (is_user_logged_in()) echo '<a href="/wp-admin">Admin</a> | ' ?><?php wp_loginout() ?>
				</li>

				<li class="feed">
					<a href="<?php bloginfo('atom_url'); ?>">
						News feed
						<img src="<?php echo get_template_directory_uri() ?>/img/feed-icon-14x14.png" alt="Feed icon" />
					</a>
				</li>
			</ul>
		</footer>

		<script src="<?php echo esc_url(get_template_directory_uri()); ?>/jquery.js"></script>
		<script src="<?php echo esc_url(get_template_directory_uri()); ?>/scripts.js"></script>
		<?php wp_footer(); ?>
	</body>
</html>
