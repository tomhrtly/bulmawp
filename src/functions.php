<?php
/**
 * @package bulmawp
 * @since 0.1.0
 * @version 0.4.0
 */

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


/**
 * Enqueues the CSS and JS for the front-end and back-end.
 *
 * @since 0.1.0
 * @since 0.2.2 Added enqueue "comment-reply"
 */

function bulmawp_enqueue() {
	wp_deregister_style( 'wp-block-library' );

	wp_enqueue_style( 'bulmawp-style', get_template_directory_uri() . '/assets/css/style.css', '', '0.4.0' );

	wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', '', '3.3.1', true );
	wp_enqueue_script( 'bulmawp-script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '0.4.0', true );
  wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.7.2/js/all.js', '', '5.7.2', true );

	if( is_single() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'bulmawp_enqueue' );


/**
 * Requires theme files needed for front-end and back-end.
 *
 * @since 0.1.0
 */

require get_template_directory() . '/inc/navbar-walker.php';
require get_template_directory() . '/inc/comment-walker.php';


/**
 * Registers the menus and limits the menu depth to just one child.
 *
 * @since 0.1.0
 * @since 0.2.0 Seperate menus for "navbar-start" and "navbar-end"
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


/**
 * Displays the pagination on the homepage.
 *
 * @since 0.1.0
 *
 * @global $wp_query
 */

function bulmawp_pagination() {
	if( is_singular() ) {
 		return;
 	}
 	global $wp_query;
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
 	if( ! in_array( 1, $links ) ) {
 		$class = 1 == $paged ? ' is-current' : '';
 		$aria_current = 1 == $paged ? ' aria-current="page"' : '';
 		printf( '<li><a href="%s" class="pagination-link%s" aria-label="Go to page 1"%s>%s</a></li>', esc_url( get_pagenum_link( 1 ) ), $class, $aria_current, '1' );
 		if( ! in_array( 2, $links ) ) {
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
