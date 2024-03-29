<?php

/**
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 * https://labs.ahmadawais.com/_child/
 *
 * @since	1.0.0
 * @package aa
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

if (!function_exists('aa_enqueue_styles')) {
	// Add enqueue function to the desired action.
	add_action('wp_enqueue_scripts', 'aa_enqueue_styles');

	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */
	function aa_enqueue_styles()
	{
		// Parent style variable.
		$parent_style = 'parent-style';

		// Enqueue Parent theme's stylesheet.
		wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');

		// Enqueue Child theme's stylesheet.
		// Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
		wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
	}
}

//Page Slug Body Class
function add_slug_body_class($classes)
{
	global $post;
	if (isset($post)) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter('body_class', 'add_slug_body_class');

// Email obfuscation
// https://www.isitwp.com/email-encode-shortcode/
// Use in posts: [email]youremail@example.com[/email]
function email_encode_function($atts, $content)
{
	return '<a href="' . antispambot("mailto:" . $content) . '">' . antispambot($content) . '</a>';
}
add_shortcode('email', 'email_encode_function');
