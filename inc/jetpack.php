<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package bootscores
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function bootscores_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'bootscores_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function bootscores_jetpack_setup
add_action( 'after_setup_theme', 'bootscores_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function bootscores_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function bootscores_infinite_scroll_render
