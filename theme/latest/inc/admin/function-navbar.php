<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.2
 */

/* FUNCTIONS */
function bulmawp_navbar() {}

function bulmawp_navbar_transparent() {
  $options = get_option( 'navbar_transparent' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label class="checkbox"><input type="checkbox" name="navbar_transparent" value="1" ' . $checked . ' /></label>';
}

function bulmawp_get_navbar_config() {
  $navbarTransparent = get_option( 'navbar_transparent' );
  if ( $navbarTransparent == 1 ) :
    echo 'is-transparent ';
  endif;

  $navbarIsSpaced = get_option( 'navbar_is_spaced' );
  if( $navbarIsSpaced == 1 ) :
    echo 'is-spaced ';
  endif;

  $navbarIsFixed = get_option( 'navbar_is_fixed' );
  if( $navbarIsFixed != 'Default' ) :
    echo $navbarIsFixed, ' ';
  endif;

  $navbarColor = get_option( 'navbar_color' );
  if( $navbarColor != 'Default' ) :
    echo $navbarIsFixed, ' ';
  endif;
}

function bulmawp_navbar_is_spaced() {
  $options = get_option( 'navbar_is_spaced' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label class="checkbox"><input type="checkbox" name="navbar_is_spaced" value="1" ' . $checked . ' /></label>';
}

function bulmawp_navbar_is_fixed() {
  $options = get_option( 'navbar_is_fixed' );
	$fixes = array( 'Default', 'is-fixed-top', 'is-fixed-bottom' );
	foreach ( $fixes as $fix ) {
		$checked = ( @$options == $fix ? 'checked' : '' );
		echo '<p><label class="radio"><input type="radio" name="navbar_is_fixed" value=' . $fix . ' ' . $checked . '/><code>' . $fix . '</code></label></p>';
	}
}

function bulmawp_navbar_color() {
  $options = get_option( 'navbar_color' );
	$colors = array( 'Default', 'is-primary', 'is-link', 'is-info', 'is-success', 'is-warning', 'is-danger', 'is-black', 'is-dark', 'is-light', 'is-white' );
	foreach($colors as $color) {
		$checked = ( @$options== $color ? 'checked' : '' );
		echo '<p><label class="radio"><input type="radio" name="navbar_color" value=' . $color . ' ' . $checked . '/><code>' . $color . '</code></label></p>';
	}
}

function bulmawp_get_navbar_is_fixed_html() {
  $navbarIsFixed = get_option( 'navbar_is_fixed' );
  if ( $navbarIsFixed == 'is-fixed-top' ) {
    echo 'has-navbar-fixed-top';
  } else if ( $navbarIsFixed == 'is-fixed-bottom' ) {
    echo 'has-navbar-fixed-bottom';
  }
}
