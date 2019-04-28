<?php
/**
 * @package bulmawp
 * @since 0.1.0
 * @version 0.4.0
 */

if ( ! defined( 'ABSPATH' ) ) :	die; endif; // Exit if accessed directly.

/**
 * Require theme includes.
 *
 * @since 0.4.0
 */

$bulmawp_includes = array(
	'walkers/comment-walker.php',
	'walkers/navbar-walker.php',
	'breadcrumbs.php',
	'enqueue.php',
	'menu.php',
	'pagination.php',
	'sidebar.php',
	'theme-support.php'
);

foreach( $bulmawp_includes as $bulmawp_include ) {
	require_once 'inc/' . $bulmawp_include;
}