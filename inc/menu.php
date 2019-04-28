<?php
/**
 * @package bulmawp
 * @since 0.4.0
 * @version 0.4.0
 */

if ( ! defined( 'ABSPATH' ) ) :	die; endif; // Exit if accessed directly.

/**
 * Registers the menus and limits the menu depth to just one child.
 *
 * @since 0.1.0
 * @since 0.2.0 Separate menus for "navbar-start" and "navbar-end"
 */

function bulmawp_register_menus() {
	register_nav_menu( 'navbar_start', 'Navbar Start Menu' );
	register_nav_menu( 'navbar_end', 'Navbar End Menu' );
}

add_action( 'after_setup_theme', 'bulmawp_register_menus' );


/**
 * Limits the menu depth to 1 child as multi-level structures are not supported with Bulma out of the box.
 *
 * @since 0.1.0
 *
 * @param string $hook
 *
 * @return void
 */

function bulmawp_limit_depth( $hook ) {
	if( $hook != 'nav-menus.php' ) {
		return;
	}

	wp_add_inline_script( 'nav-menu', 'wpNavMenu.options.globalMaxDepth = 1;', 'after' );
}

add_action( 'admin_enqueue_scripts', 'bulmawp_limit_depth' );