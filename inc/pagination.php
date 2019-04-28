<?php
/**
 * @package bulmawp
 * @since 0.4.0
 * @version 0.4.0
 */

if ( ! defined( 'ABSPATH' ) ) :	die; endif; // Exit if accessed directly.

/**
 * Displays the pagination on the homepage.
 *
 * @since 0.1.0
 *
 * @global $wp_query
 */

function bulmawp_pagination() {
	global $wp_query;

	if( is_singular() ) {
		return;
	}
	if( $wp_query->max_num_pages <= 1 ) {
		return;
	}
	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max = intval( $wp_query->max_num_pages );
	if( $paged >= 1 ) {
		$links[] = $paged;
	}
	if( $paged >= 3 ) {
		$links[] = $paged - 1;
	}
	if( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 1;
	}
	echo '<nav class="pagination" role="navigation" aria-label="pagination">';
	if( get_previous_posts_link() ) {
		printf( '%s', get_previous_posts_link( 'Previous' ) );
	}
	if( get_next_posts_link() ) {
		printf( '%s', get_next_posts_link( 'Next' ) );
	}
	echo '<ul class="pagination-list">';
	if( !in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' is-current' : '';
		$aria_current = 1 == $paged ? ' aria-current="page"' : '';
		printf( '<li><a href="%s" class="pagination-link%s" aria-label="Go to page 1"%s>%s</a></li>', esc_url( get_pagenum_link( 1 ) ), $class, $aria_current, '1' );
		if( !in_array( 2, $links ) ) {
			echo '<li><span class="pagination-ellipsis">&hellip;</span></li>' . "\n";
		}
	}
	sort( $links );
	foreach( ( array ) $links as $link ) {
		$class = $paged == $link ? ' is-current' : '';
		$aria_current = $paged == $link ? ' aria-current="page"' : '';
		printf( '<li><a href="%s" class="pagination-link%s" aria-label="Go to page %s"%s>%s</a></li>', esc_url( get_pagenum_link( $link ) ), $class, $link, $aria_current, $link );
	}
	if( ! in_array( $max, $links ) ) {
		if( ! in_array( $max - 1, $links ) ) {
			echo '<li><span class="pagination-ellipsis">&hellip;</span></li>' . "\n";
		}
		$class = $paged == $max ? ' is-current' : '';
		$aria_current = $paged == $max ? ' aria-current="page"' : '';
		printf( '<li><a href="%s" class="pagination-link%s" aria-label="Goto page %s"%s>%s</a></li>', esc_url( get_pagenum_link( $max ) ), $class, $max, $aria_current, $max );
	}
	echo '</ul></nav>';
}

add_filter( 'next_posts_link_attributes', 'bulmawp_next_posts_link_class' );
add_filter( 'previous_posts_link_attributes', 'bulmawp_previous_posts_link_class' );

function bulmawp_next_posts_link_class() {
	return 'class="pagination-next"';
}

function bulmawp_previous_posts_link_class() {
	return 'class="pagination-previous"';
}