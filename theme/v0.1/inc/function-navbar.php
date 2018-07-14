<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.1
 */

/* FUNCTIONS */
function bulmawp_navbar() {}

function bulmawp_navbar_transparent() {
  $options = get_option('navbar_transparent');
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label class="checkbox"><input type="checkbox" name="navbar_transparent" value="1" '.$checked.' /></label>';
}

function bulmawp_get_navbar_config() {
  $navbarTransparent = get_option('navbar_transparent');
  if($navbarTransparent == 1) {
    echo 'is-transparent';
  }
  echo ' ';
  $navbarIsSpaced = get_option('navbar_is_spaced');
  if($navbarIsSpaced == 1) {
    echo 'is-spaced';
  }
  echo ' ';
  $navbarIsFixed = get_option('navbar_is_fixed');
  if($navbarIsFixed == "is-fixed-top") {
    echo 'is-fixed-top';
  } else if($navbarIsFixed == "is-fixed-bottom") {
    echo 'is-fixed-bottom';
  }
  echo ' ';
  $navbarColor = get_option('navbar_color');
  if($navbarColor == 'is-primary') {
    echo 'is-primary';
  } else if($navbarColor == 'is-link') {
    echo 'is-link';
  } else if($navbarColor == 'is-info') {
    echo 'is-info';
  } else if($navbarColor == 'is-success') {
    echo 'is-success';
  } else if($navbarColor == 'is-warning') {
    echo 'is-warning';
  } else if($navbarColor == 'is-danger') {
    echo 'is-danger';
  } else if($navbarColor == 'is-black') {
    echo 'is-black';
  } else if($navbarColor == 'is-dark') {
    echo 'is-dark';
  } else if($navbarColor == 'is-light') {
    echo 'is-light';
  } else if($navbarColor == 'is-white') {
    echo 'is-white';
  }
}

function bulmawp_navbar_is_spaced() {
  $options = get_option('navbar_is_spaced');
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label class="checkbox"><input type="checkbox" name="navbar_is_spaced" value="1" '.$checked.' /></label>';
}

function bulmawp_navbar_is_fixed() {
  $options = get_option('navbar_is_fixed');
	$fixes = array("Default", "is-fixed-top", "is-fixed-bottom");
	foreach($fixes as $fix) {
		$checked = ( @$options== $fix ? 'checked' : '' );
		echo '<label class="radio"><input type="radio" name="navbar_is_fixed" value='.$fix.' '.$checked.'/><code>'.$fix.'</code></label>';
	}
}

function bulmawp_navbar_color() {
  $options = get_option('navbar_color');
	$colors = array("Default", "is-primary", "is-link", "is-info", "is-success", "is-warning", "is-danger", "is-black", "is-dark", "is-light", "is-white");
	foreach($colors as $color) {
		$checked = ( @$options== $color ? 'checked' : '' );
		echo '<label class="radio"><input type="radio" name="navbar_color" value='.$color.' '.$checked.'/><code>'.$color.'</code></label>';
	}
}

function bulmawp_get_navbar_is_fixed_html() {
  $navbarIsFixed = get_option('navbar_is_fixed');
  if($navbarIsFixed == "is-fixed-top") {
    echo 'has-navbar-fixed-top';
  } else if($navbarIsFixed == "is-fixed-bottom") {
    echo 'has-navbar-fixed-bottom';
  }
}

function my_menu_notitle( $menu ) {
	return $menu = preg_replace( '/ title=\"(.*?)\"/', '', $menu );
}

add_filter( 'wp_nav_menu', 'my_menu_notitle' );
add_filter( 'wp_page_menu', 'my_menu_notitle' );
add_filter( 'wp_list_categories', 'my_menu_notitle' );
