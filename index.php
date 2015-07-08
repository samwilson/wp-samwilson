<!doctype html>
<html class="no-js" <?php language_attributes() ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/foundation.css" />
		<link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/style.css" />
		<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/modernizr.js"></script>
		<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ) ?>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class() ?>>

		<header>
			<div class="row">
				<div class="columns large-12 small-12">
					<em></em>
				</div>
			</div>
			<div class="row">
				<div class="columns large-6 small-12">
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</h1>
				</div>
				<div class="columns large-6 small-12 text-right menu">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
				</div>
			</div>
		</header>

		<div class="row">
			<div class="small-12 large-9 columns">
				<?php get_template_part( 'main' ) ?>
				<?php the_posts_pagination( array( 'screen_reader_text' => 'Go to page:' ) ) ?>
			</div>
			<div class="small-12 large-3 columns">
				<?php get_sidebar() ?>
			</div>
		</div>

		<footer class="row">
			<ul>
				<li class="columns small-12 large-3">
					&copy; 2003&ndash;<?php echo date('Y')?>
				</li>

				<li class="columns small-12 large-3">
					<div id="hcard-Sam-Wilson" class="vcard">
						<a class="url fn" href="http://samwilson.id.au/">Sam Wilson</a>
						&lt;<a class="email" title="Email me" href="mailto:sam@samwilson.id.au">sam@samwilson.id.au</a>&gt;
						<div class="adr">
							<span class="locality">Fremantle</span>, <span class="region">Western Australia</span>
							<span style="display:none"><span class="country-name">Australia</span> <span class="postal-code">6163</span></span>
						</div>
					</div>
				</li>

				<li class="columns small-12 large-3">
					<?php if (is_user_logged_in()) echo '<a href="/wp-admin">Admin</a> | ' ?><?php wp_loginout() ?>
				</li>

				<li class="columns small-12 large-3">
					<a href="<?php bloginfo('atom_url'); ?>">
						News feed
						<img src="<?php echo get_template_directory_uri() ?>/img/feed-icon-14x14.png" alt="Feed icon" />
					</a>
				</li>
			</ul>
		</footer>

		<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.js"></script>
		<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
<?php wp_footer(); ?>
	</body>
</html>
