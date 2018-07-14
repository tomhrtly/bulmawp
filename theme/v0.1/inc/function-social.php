<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.1
 */

/* FUNCTIONS */
function bulmawp_social() {}

function bulmawp_social_facebook() {
  $socialFacebook = esc_attr(get_option('social_facebook'));
  echo '<input type="url" name="social_facebook" value="'.$socialFacebook.'" class="input" />';
}

function bulmawp_social_twitter() {
  $socialTwitter = esc_attr(get_option('social_twitter'));
  echo '<input type="url" name="social_twitter" value="'.$socialTwitter.'" class="input" />';
}

function bulmawp_social_rss() {
  $options = get_option('social_rss');
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label class="checkbox"><input type="checkbox" name="social_rss" value="1" '.$checked.' /></label>';
}

function bulmawp_social_google() {
  $socialGoogle = esc_attr(get_option('social_google'));
  echo '<input type="url" name="social_google" value="'.$socialGoogle.'" class="input" />';
}

function bulmawp_social_instagram() {
  $socialInstagram = esc_attr(get_option('social_instagram'));
  echo '<input type="url" name="social_instagram" value="'.$socialInstagram.'" class="input" />';
}

function bulmawp_social_pinterest() {
  $socialPinterest = esc_attr(get_option('social_pinterest'));
  echo '<input type="url" name="social_pinterest" value="'.$socialPinterest.'" class="input" />';
}
?>
