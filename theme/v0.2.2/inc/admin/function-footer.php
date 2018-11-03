<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.2
 */

/* FUNCTIONS */
function bulmawp_footer() {}

function bulmawp_footer_text() {
  $footerText = esc_attr( get_option( 'footer_text' ) );
  echo '<input type="text" name="footer_text" value="' . $footerText . '" class="input" />';
}

function bulmawp_footer_copyright() {
  $options = get_option( 'footer_copyright' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label class="checkbox"><input type="checkbox" name="footer_copyright" value="1" ' . $checked . ' /></label>';
}

function bulmawp_footer_enable() {
  $options = get_option( 'footer_enable' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label class="checkbox"><input type="checkbox" name="footer_enable" value="1" ' . $checked . ' /></label>';
}
