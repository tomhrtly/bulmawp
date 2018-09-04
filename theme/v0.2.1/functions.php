<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.1
 */

/* BREADCRUMBS */
function get_bulmawp_breadcrumbs() {
	$breadcrumbsEnable = get_option( 'breadcrumbs_enable' );
	$breadcrumbsIcons = get_option( 'breadcrumbs_icons' );
	$postIcon = get_post_meta( get_the_ID(), 'bulmawp_breadcrumbs_icon', true );
  if( $breadcrumbsEnable == 1 ) {
		$custom_taxonomy = '';
		global $post, $wp_query;
		if( !is_front_page() ) {
			echo '<nav class="breadcrumb ';
	    echo bulmawp_get_breadcrumbs_config();
	    echo '" aria-label="breadcrumbs">';
			echo '<ul>';
			echo '<li><a href="' . get_home_url() . '">';
			if( $breadcrumbsIcons == 1 ) {
	    	echo '<span class="icon ';
				echo bulmawp_breadcrumbs_icon_size();
				echo '"><i class="fas fa-home"></i></span>';
			}
	    echo '<span>Home</span></a></li>';
			if( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
				echo '<li class="is-active"><a href="#" aria-current="page">';
				if( $breadcrumbsIcons == 1 ) {
					echo '<span class="icon ';
					echo bulmawp_breadcrumbs_icon_size();
					echo '"><i class="fas ';
					echo bulmawp_breadcrumbs_font_awesome_size();
					echo ' fa-calendar"></i></span>';
				}
				echo '<span>' . get_the_archive_title() . '</span></a></li>';
			}
			else if( is_archive() && is_tax() && !is_category() && !is_tag() ) {
				$post_type = get_post_type();
				if( $post_type != 'post' ) {
					$post_type_object = get_post_type_object( $post_type );
					$post_type_archive = get_post_type_archive_link( $post_type );
					echo '<li><a href="' . $post_type_archive . '">' . $post_type_object->labels->name . '</a></li>';
				}
				$custom_tax_name = get_queried_object()->name;
				echo '<li class="is-active"><a href="#" aria-current="page">';
				if( $breadcrumbsIcons == 1 ) {
					echo '<span class="icon ';
					echo bulmawp_breadcrumbs_icon_size();
					echo '"><i class="fas ';
					echo bulmawp_breadcrumbs_font_awesome_size();
					echo ' fa-home"></i></span>';
				}
				echo '<span>' . $custom_tax_name . '</span></a></li>';
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
					if( $breadcrumbsIcons == 1 ) {
						echo '<span class="icon ';
						echo bulmawp_breadcrumbs_icon_size();
						echo '"><i class="fas ';
						echo bulmawp_breadcrumbs_font_awesome_size();
						echo ' fa-home"></i></span>';
					}
					echo '<span>' . get_the_title() . '</span></a></li>';
				}
				else if( !empty( $cat_id ) ) {
					echo '<li><a href="' . $cat_link . '">' . $cat_name . '</a></li>';
					echo '<li class="is-active"><a href="#" aria-current="page">' . get_the_title() . '</a></li>';
				}
				else {
					echo '<li class="is-active"><a href="#" aria-current="page">';
					if( $breadcrumbsIcons == 1 ) {
						echo '<span class="icon ';
						echo bulmawp_breadcrumbs_icon_size();
						echo '">';
						if( empty( $postIcon) ) {
						} else {
							echo '<i class="fas ';
							echo bulmawp_breadcrumbs_font_awesome_size();
							echo ' ' . $postIcon . '"></i>';
						}
						echo '</span>';
					}
					echo '<span>' . get_the_title() . '</span></a></li>';
				}
			}
			else if( is_category() ) {
				echo '<li class="is-active"><a href="#" aria-current="page">';
				if( $breadcrumbsIcons == 1 ) {
					echo '<span class="icon ';
					echo bulmawp_breadcrumbs_icon_size();
					echo '"><i class="fas ';
					echo bulmawp_breadcrumbs_font_awesome_size();
					echo ' fa-file"></i></span>';
				}
				echo '<span>' . single_cat_title('', false) . '</span></a></li>';
			}
			else if( is_page() ) {
				if( $post->post_parent ) {
					$anc = get_post_ancestors( $post->ID );
					$anc = array_reverse( $anc );
					if( !isset($parents) ) $parents = null;
					foreach( $anc as $ancestor ) {
						$parents.= '<li><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
					}
					echo $parents;
					echo '<li class="is-active"><a href="#" aria-current="page">' . get_the_title() . '</a></li>';
				}
				else {
					echo '<li class="is-active"><a href="#" aria-current="page">';
					if( $breadcrumbsIcons == 1 ) {
						echo '<span class="icon ';
						echo bulmawp_breadcrumbs_icon_size();
						echo '">';
						if( empty( $postIcon) ) {
						} else {
							echo '<i class="fas ';
							echo bulmawp_breadcrumbs_font_awesome_size();
							echo ' ' . $postIcon . '"></i>';
						}
						echo '</span>';
					}
					echo '<span>' . get_the_title() . '</span></a></li>';
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
				if( $breadcrumbsIcons == 1 ) {
					echo '<span class="icon ';
					echo bulmawp_breadcrumbs_icon_size();
					echo '"><i class="fas ';
					echo bulmawp_breadcrumbs_font_awesome_size();
					echo ' fa-tag"></i></span>';
				}
				echo '<span>' . $get_term_name . '</span></a></li>';
			}
			else if( is_day() ) {
				echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . ' Archives</a></li>';
				echo '<li><a href="' . get_month_link(get_the_time('Y') , get_the_time('m')) . '">' . get_the_time('M') . ' Archives</a></li>';
				echo '<li class="is-active"><a href="#" aria-current="page">' . get_the_time('jS') . '' . get_the_time('M') . ' Archives</a></li>';
			}
			else if( is_month() ) {
				echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . ' Archives</a></li>';
				echo '<li>' . get_the_time('M') . ' Archives</li>';
			}
			else if( is_year() ) {
				echo '<li class="is-active"><a href="#" aria-current="page">' . get_the_time('Y') . ' Archives</a></li>';
			}
			else if( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				echo '<li class="is-active"><a href="#" aria-current="page">' . 'Author:' . $userdata->display_name . '</a></li>';
			}
			else if( get_query_var('paged') ) {
				echo '<li class="is-active"><a href="#" aria-current="page">' . __('Page ') . '' . get_query_var('paged') . '</a></li>';
			}
			else if( is_search() ) {
				echo '<li class="is-active"><a href="#" aria-current="page">';
				if( $breadcrumbsIcons == 1 ) {
					echo '<span class="icon ';
					echo bulmawp_breadcrumbs_icon_size();
					echo '">';
					if( empty( $postIcon ) ) {
					} else {
						echo '<i class="fas ';
						echo bulmawp_breadcrumbs_font_awesome_size();
						echo ' fa-search"></i>';
					}
					echo '</span>';
				}
				echo '<span>Search results for: ' . get_search_query() . '</span></a></li>';
			}
	    echo '</ul>';
	    echo '</nav>';
		}
	}
}

/* COMMENTS */
function get_bulmawp_comments( $comment, $args, $depth ){
   $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
      <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
        <div class="columns">
          <div class="column is-1">
            <?php echo get_avatar( $comment, 66 ); ?>
          </div>
          <div class="column">
            <span class="name is-size-4"><?php printf( __( '%s' ), sprintf( '%s', get_comment_author_link( $comment ) ) ); ?></span>
            <span class="is-size-7">
              <time datetime="<?php comment_time( 'c' ); ?>">
                <?php printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() ); ?>
              </time>
              <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
            </span>
            <?php comment_text(); ?>
            <?php
            comment_reply_link( array_merge( $args, array(
              'add_below' => '',
              'depth'     => $depth,
              'max_depth' => $args['max_depth'],
              'before'    => '<div class="reply">',
              'after'     => '</div>'
            ) ) );
            echo '</div></div>';
          }

/* DASHBOARD WIDGET */
add_action( 'wp_dashboard_setup', 'bulmawp_dashboard_widgets' );
function bulmawp_dashboard_widgets() {
	wp_add_dashboard_widget( 'bulmawp', 'From the Developer', 'bulmawp_dashboard_widget' );
}
function bulmawp_dashboard_widget() {
	$json = file_get_contents( 'https://bulmawp.io/js/notice.json' );
	$data = json_decode( $json );
	echo $data->notice;
}

/* ENQUEUE */
function bulmawp_enqueue() {
  wp_enqueue_style( 'bulma', 'https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css', '', '0.7.1' );
  wp_enqueue_style( 'bulmawp', get_template_directory_uri() .'/style.css', '', '0.1' );
	wp_enqueue_script( 'bulmawp-script', get_template_directory_uri() .'/js/script.js', array('jquery'), '0.1', true );
  wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.3.1/js/all.js', array('jquery'), '5.3.1', true );
}
function bulmawp_enqueue_admin() {
  wp_enqueue_style( 'bulmawp-admin', 'https://bulmawp.io/css/admin.css' );
}
add_action( 'wp_enqueue_scripts', 'bulmawp_enqueue' );
add_action( 'admin_enqueue_scripts', 'bulmawp_enqueue_admin' );

/* INCLUDES */
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/post-meta.php';
require get_template_directory() . '/inc/walker.php';

/* MENU */
function bulmawp_register_menus() {
	register_nav_menu( 'navbar_start', 'Navbar Start Menu' );
	register_nav_menu( 'navbar_end', 'Navbar End Menu' );
}
add_action( 'after_setup_theme', 'bulmawp_register_menus' );

function bulmawp_limit_depth( $hook ) {
	if( $hook != 'nav-menus.php' ) {
		return;
	}
	wp_add_inline_script( 'nav-menu', 'wpNavMenu.options.globalMaxDepth = 1;', 'after' );
}
add_action( 'admin_enqueue_scripts', 'bulmawp_limit_depth' );

/* PAGINATION */
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
	echo '<nav class="pagination ';
	echo bulmawp_get_pagination_config();
	echo '" role="navigation" aria-label="pagination">' . "\n";
	if ( get_previous_posts_link() ) {
		printf( '%s' . "\n", get_previous_posts_link('Previous') );
	}
	if ( get_next_posts_link() ) {
		printf( '%s' . "\n", get_next_posts_link('Next page') );
	}
	echo '<ul class="pagination-list">' . "\n";
	if( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' is-current' : '';
		$aria_current = 1 == $paged ? ' aria-current="page"' : '';
		printf( '<li><a href="%s" class="pagination-link%s" aria-label="Goto page 1"%s>%s</a></li>' . "\n", esc_url( get_pagenum_link( 1 ) ), $class, $aria_current, '1' );
		if ( ! in_array( 2, $links ) ) {
			echo '<li><span class="pagination-ellipsis">&hellip;</span></li>' . "\n";
		}
	}
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' is-current' : '';
		$aria_current = $paged == $link ? ' aria-current="page"' : '';
		printf( '<li><a href="%s" class="pagination-link%s" aria-label="Goto page %s"%s>%s</a></li>' . "\n", esc_url( get_pagenum_link( $link ) ), $class, $link, $aria_current, $link );
	}
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			echo '<li><span class="pagination-ellipsis">&hellip;</span></li>' . "\n";
		}
		$class = $paged == $max ? ' is-current' : '';
		$aria_current = $paged == $max ? ' aria-current="page"' : '';
		printf( '<li><a href="%s" class="pagination-link%s" aria-label="Goto page %s"%s>%s</a></li>' . "\n", esc_url( get_pagenum_link( $max ) ), $class, $max, $aria_current, $max );
	}
	echo '</ul></nav>' . "\n";
}

add_filter( 'next_posts_link_attributes', 'next_posts_link_class' );
add_filter( 'previous_posts_link_attributes', 'previous_posts_link_class' );

function next_posts_link_class() {
	return 'class="pagination-next"';
}

function previous_posts_link_class() {
	return 'class="pagination-previous"';
}

/* SIDEBAR */
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
	  'before_widget' => '',
	  'after_widget' => '',
		'before_title' => '<h2 class="menu-label">',
		'after_title' => '</h2>',
	) );
}

/* THEME SUPPORT */
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-logo', array(
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array('site-title', 'site-description' ),
));
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
add_theme_support( 'title-tag' );
