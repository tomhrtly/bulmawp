<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.2
 */

/* FUNCTIONS */
function bulmawp_get_pagination_config() {
  $paginationAlignment = get_option( 'pagination_alignment' );
  if( $paginationAlignment != 'Default' ) :
    echo $paginationAlignment, ' ';
  endif;

  $paginationSizes = get_option( 'pagination_sizes' );
  if( $paginationSizes != 'Default' ) :
    echo $paginationSizes, ' ';
  endif;
  
	$paginationRounded = get_option( 'pagination_styles' );
	if ( $paginationRounded != 'Default' ) :
    echo $paginationRounded;
  endif;
}

function bulmawp_pagination_alignment() {
  $options = get_option( 'pagination_alignment' );
  $alignments = array( 'Default', 'is-centered', 'is-right' );
  foreach ( $alignments as $alignment ) {
  	$checked = ( @$options == $alignment ? 'checked' : '' );
  	echo '<p><label class="radio"><input type="radio" name="pagination_alignment" value=' . $alignment . ' ' . $checked . '/><code>' . $alignment . '</code></label></p>';
  }
}

function bulmawp_pagination_sizes() {
  $options = get_option( 'pagination_sizes' );
  $sizes = array( 'Default', 'is-small', 'is-medium', 'is-large' );
  foreach ( $sizes as $size ) {
  	$checked = ( @$options == $size ? 'checked' : '' );
  	echo '<p><label class="radio"><input type="radio" name="pagination_sizes" value=' . $size . ' ' . $checked . '/><code>' . $size . '</code></label></p>';
  }
}

function bulmawp_pagination_styles() {
  $options = get_option( 'pagination_styles' );
  $styles = array( 'Default', 'is-rounded' );
  foreach ( $styles as $style ) {
  	$checked = ( @$options == $style ? 'checked' : '' );
  	echo '<p><label class="radio"><input type="radio" name="pagination_styles" value=' . $style . ' ' . $checked . '/><code>' . $style . '</code></label></p>';
  }
}
