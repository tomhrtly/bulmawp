<?php
/**
 * @package bulmawp
 * @since 0.4.0
 * @version 0.4.0
 */

if ( ! defined( 'ABSPATH' ) ) :	die; endif; // Exit if accessed directly.

/**
 * Adds theme support.
 *
 * @since 0.1.0
 */

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-logo', array(
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
));
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
add_theme_support( 'title-tag' );
