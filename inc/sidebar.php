<?php
/**
 * @package bulmawp
 * @since 0.4.0
 * @version 0.4.0
 */

if ( ! defined( 'ABSPATH' ) ) :	die; endif; // Exit if accessed directly.

/**
 * Registers the sidebar.
 *
 * @since 0.1.0
 */

function bulmawp_sidebar() {
	register_sidebar( array(
	'name' 						=> 'Sidebar',
	'id' 							=> 'sidebar',
	'before_widget' 	=> '<div class="widget">',
	'after_widget' 		=> '</div>',
	'before_title' 		=> '<h2 class="menu-label">',
	'after_title' 		=> '</h2>',
	) );
}

add_action( 'widgets_init', 'bulmawp_sidebar' );