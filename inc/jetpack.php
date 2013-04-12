<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Open Streets Calgary
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function open_streets_calgary_infinite_scroll_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'open_streets_calgary_infinite_scroll_setup' );
