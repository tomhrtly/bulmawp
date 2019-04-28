<?php
/**
 * @package bulmawp
 * @since 0.4.0
 * @version 0.4.0
 */

if ( ! defined( 'ABSPATH' ) ) :	die; endif; // Exit if accessed directly.

/**
 * Enqueues the CSS and JS for the front-end and back-end.
 *
 * @since 0.1.0
 * @since 0.2.2 Added enqueue "comment-reply"
 */

function bulmawp_enqueue() {
	wp_enqueue_style( 'bulmawp-style', get_template_directory_uri() . '/assets/dist/css/style.min.css', '', '0.4.0' );

	wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'bulmawp-script', get_template_directory_uri() . '/assets/dist/js/script.min.js', '', '0.4.0', true );

	if( is_single() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'bulmawp_enqueue' );