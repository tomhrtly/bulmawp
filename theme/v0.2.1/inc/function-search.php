<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.1
 */

/* FUNCTIONS */
function bulmawp_search() {}

function bulmawp_search_color() {
  $options = get_option( 'search_color' );
	$colors = array( 'Default', 'is-primary', 'is-link', 'is-info', 'is-success', 'is-warning', 'is-danger', 'is-black', 'is-dark', 'is-light', 'is-white' );
	foreach ( $colors as $color ) {
		$checked = ( @$options == $color ? 'checked' : '' );
		echo '<p><label class="radio"><input type="radio" name="search_color" value=' . $color . ' ' . $checked . '/><code>' . $color . '</code></label></p>';
	}
}
function bulmawp_search_icon() {
  $options = get_option( 'search_icon' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<p><label class="checkbox"><input type="checkbox" name="search_icon" value="1" ' . $checked . ' /></label></p>';
}
function bulmawp_search_placeholder() {
  $searchPlaceholder = esc_attr( get_option( 'search_placeholder' ) );
  echo '<p><input type="text" name="search_placeholder" value="' . $searchPlaceholder . '" class="input" /></p>';
}
?>
