<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.1
 */

/* FUNCTIONS */
function bulmawp_get_pagination_config() {
  $paginationAlignment = get_option('pagination_alignment');
  if($paginationAlignment == 'is-centered') {
    echo 'is-centered';
  } else if($paginationAlignment == 'is-right') {
    echo 'is-right';
  }
  echo ' ';
  $paginationSizes = get_option('pagination_sizes');
  if($paginationSizes == 'is-small') {
    echo 'is-small';
  } else if($paginationSizes == 'is-medium') {
    echo 'is-medium';
  } else if($paginationSizes == 'is-large') {
    echo 'is-large';
  }
	echo ' ';
	$paginationRounded = get_option('pagination_styles');
	if($paginationRounded == 'is-rounded') {
    echo 'is-rounded';
  }
}

function bulmawp_pagination_alignment() {
  $options = get_option('pagination_alignment');
  $alignments = array("Default", "is-centered", "is-right");
  foreach($alignments as $alignment) {
  	$checked = ( @$options== $alignment ? 'checked' : '' );
  	echo '<label class="radio"><input type="radio" name="pagination_alignment" value='.$alignment.' '.$checked.'/><code>'.$alignment.'</code></label>';
  }
}

function bulmawp_pagination_sizes() {
  $options = get_option('pagination_sizes');
  $sizes = array("Default", "is-small", "is-medium", "is-large");
  foreach($sizes as $size) {
  	$checked = ( @$options== $size ? 'checked' : '' );
  	echo '<label class="radio"><input type="radio" name="pagination_sizes" value='.$size.' '.$checked.'/><code>'.$size.'</code></label>';
  }
}

function bulmawp_pagination_styles() {
  $options = get_option('pagination_styles');
  $styles = array("Default", "is-rounded");
  foreach($styles as $style) {
  	$checked = ( @$options== $style ? 'checked' : '' );
  	echo '<label class="radio"><input type="radio" name="pagination_styles" value='.$style.' '.$checked.'/><code>'.$style.'</code></label>';
  }
}
