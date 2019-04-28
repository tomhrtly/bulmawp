<?php
/**
 * @package bulmawp
 * @since 0.4.0
 * @version 0.4.0
 */

if ( ! defined( 'ABSPATH' ) ) :	die; endif; // Exit if accessed directly.

/**
 * Displays the breadcrumbs on all pages except the homepage.
 *
 * @since 0.1.0
 *
 * @global $post, $wp_query
 */

function bulmawp_breadcrumbs() {
	$custom_taxonomy = '';
	global $post, $wp_query;
	if( !is_front_page() ) {
		echo '<nav class="breadcrumb" aria-label="breadcrumbs">';
		echo '<ul>';
		echo '<li><a href="', get_home_url(), '">';
		echo '<span class="icon"><i class="fas fa-home"></i></span>';
		echo '<span>', __( 'Home' ), '</span></a></li>';
		if( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
			echo '<li class="is-active"><a href="#" aria-current="page">';
			echo '<span class="icon"><i class="fas fa-calendar"></i></span>';
			echo '<span>', get_the_archive_title(), '</span></a></li>';
		}
		else if( is_archive() && is_tax() && !is_category() && !is_tag() ) {
			$post_type = get_post_type();
			if( $post_type != 'post' ) {
				$post_type_object = get_post_type_object( $post_type );
				$post_type_archive = get_post_type_archive_link( $post_type );
				echo '<li><a href="', $post_type_archive, '">', $post_type_object->labels->name, '</a></li>';
			}
			$custom_tax_name = get_queried_object()->name;
			echo '<li class="is-active"><a href="#" aria-current="page">';
			echo '<span class="icon"><i class="fas fa-home"></i></span>';
			echo '<span>', $custom_tax_name, '</span></a></li>';
		}
		else if( is_single() ) {
			$taxonomy_exists = taxonomy_exists( $custom_taxonomy );
			if( empty( $last_category ) && !empty( $custom_taxonomy ) && $taxonomy_exists) {
				$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
				$cat_id = $taxonomy_terms[0]->term_id;
				$cat_nicename = $taxonomy_terms[0]->slug;
				$cat_link = get_term_link( $taxonomy_terms[0]->term_id, $custom_taxonomy );
				$cat_name = $taxonomy_terms[0]->name;
			}
			if( !empty( $last_category ) ) {
				echo $cat_display;
				echo '<li class="is-active"><a href="#" aria-current="page">';
				echo '<span class="icon"><i class="fas fa-home"></i></span>';
				echo '<span>', get_the_title(), '</span></a></li>';
			}
			else if( !empty( $cat_id ) ) {
				echo '<li><a href="', $cat_link, '">', $cat_name, '</a></li>';
				echo '<li class="is-active"><a href="#" aria-current="page">', get_the_title(), '</a></li>';
			}
			else {
				echo '<li class="is-active"><a href="#" aria-current="page">', get_the_title(), '</a></li>';
			}
		}
		else if( is_category() ) {
			echo '<li class="is-active"><a href="#" aria-current="page">';
			echo '<span class="icon"><i class="fas fa-file"></i></span>';
			echo '<span>', single_cat_title( '', false), '</span></a></li>';
		}
		else if( is_page() ) {
			if( $post->post_parent ) {
				$ancestors = get_post_ancestors( $post->ID );
				$ancestors = array_reverse( $ancestors );
				if( !isset($parents) ) $parents = null;
				foreach( $ancestors as $ancestor ) {
					$parents.= '<li><a href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a></li>';
				}
				echo $parents;
				echo '<li class="is-active"><a href="#" aria-current="page">', get_the_title(), '</a></li>';
			}
			else {
				echo '<li class="is-active"><a href="#" aria-current="page">', get_the_title(), '</a></li>';
			}
		}
		else if( is_tag() ) {
			$term_id = get_query_var( 'tag_id' );
			$taxonomy = 'post_tag';
			$args = 'include=' . $term_id;
			$terms = get_terms( $taxonomy, $args );
			$get_term_id = $terms[0]->term_id;
			$get_term_slug = $terms[0]->slug;
			$get_term_name = $terms[0]->name;
			echo '<li class="is-active"><a href="#" aria-current="page">';
			echo '<span class="icon"><i class="fas fa-tag"></i></span>';
			echo '<span>', $get_term_name, '</span></a></li>';
		}
		else if( is_day() ) {
			echo '<li><a href="', get_year_link( get_the_time( 'Y' ) ), '">', get_the_time( 'Y' ), __( ' Archives' ), '</a></li>';
			echo '<li><a href="', get_month_link( get_the_time( 'Y' ) , get_the_time( 'm' ) ), '">', get_the_time( 'M' ), __( ' Archives' ), '</a></li>';
			echo '<li class="is-active"><a href="#" aria-current="page">', get_the_time( 'jS' ), '', get_the_time( 'M' ), __( ' Archives' ), '</a></li>';
		}
		else if( is_month() ) {
			echo '<li><a href="', get_year_link( get_the_time( 'Y' ) ), '">', get_the_time( 'Y' ), __( ' Archives' ), '</a></li>';
			echo '<li>', get_the_time( 'M' ), __( ' Archives' ), '</li>';
		}
		else if( is_year() ) {
			echo '<li class="is-active"><a href="#" aria-current="page">', get_the_time( 'Y' ), __( ' Archives' ), '</a></li>';
		}
		else if( is_author() ) {
			global $author;
			$userdata = get_userdata( $author );
			echo '<li class="is-active"><a href="#" aria-current="page">', __( 'Author:' ), $userdata->display_name, '</a></li>';
		}
		else if( get_query_var( 'paged' ) ) {
			echo '<li class="is-active"><a href="#" aria-current="page">', __( 'Page ' ), '', get_query_var( 'paged' ), '</a></li>';
		}
		else if( is_search() ) {
			echo '<li class="is-active"><a href="#" aria-current="page">';
			echo '<span class="icon"><i class="fas fa-search"></i></span>';
			echo '<span>', __( 'Search results for: ' ), get_search_query(), '</span></a></li>';
		}
		echo '</ul>';
		echo '</nav>';
	}
}