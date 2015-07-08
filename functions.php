<?php

if (!isset($content_width)) {
	$content_width = 600;
}

add_action('after_setup_theme', function() {
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats', array('status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat'));
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
	add_theme_support('title-tag');
});


add_action('init', function () {
	register_nav_menu('header-menu', 'Header Menu');
});


function samwilson15_recent_comments($howmany = '10') {
	global $wpdb;
	$sql = "SELECT comment_author, comment_author_url, comment_ID, comment_date, " .
			"comment_post_ID FROM $wpdb->comments WHERE comment_approved = '1' " .
			"ORDER BY comment_date_gmt DESC LIMIT $howmany";
	if ($comments = $wpdb->get_results($sql)) {
		foreach ($comments as $comment) {
			$title = get_the_title($comment->comment_post_ID);
			if ($title == "")
				$title = "[untitled]";
			$date = substr($comment->comment_date, 0, 10);
			print("<li>$date: " .
					"<a href='" . get_permalink($comment->comment_post_ID) . "#comment-" . $comment->comment_ID . "'>" .
					"$title" .
					"</a> <em>(" . $comment->comment_author . ")</em></li>\n");
		}
	}
}

add_filter( 'pre_option_link_manager_enabled', '__return_true' );
