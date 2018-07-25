<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2
 */

/* FUNCTIONS */
function bulmawp_breadcrumbs() {}

function bulmawp_breadcrumbs_enable() {
  $options = get_option( 'breadcrumbs_enable' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label class="checkbox"><input type="checkbox" name="breadcrumbs_enable" value="1" ' . $checked . ' /></label>';
}

function bulmawp_get_breadcrumbs_config() {
  $breadcrumbsAlignment = get_option( 'breadcrumbs_alignment' );
  if ( $breadcrumbsAlignment == 'is-centered' ) {
    echo 'is-centered';
  } else if ( $breadcrumbsAlignment == 'is-right' ) {
    echo 'is-right';
  }
  echo ' ';
  $breadcrumbsAlternativeSeperators = get_option( 'breadcrumbs_alternative_seperators' );
  if ( $breadcrumbsAlternativeSeperators == 'has-arrow-separator' ) {
    echo 'has-arrow-separator';
  } else if ( $breadcrumbsAlternativeSeperators == 'has-bullet-separator' ) {
    echo 'has-bullet-separator';
  } else if ( $breadcrumbsAlternativeSeperators == 'has-dot-separator' ) {
    echo 'has-dot-separator';
  } else if ( $breadcrumbsAlternativeSeperators == 'has-succeeds-separator' ) {
    echo 'has-succeeds-separator';
  }
  echo ' ';
  $breadcrumbsSizes = get_option( 'breadcrumbs_sizes' );
  if ( $breadcrumbsSizes == 'is-small' ) {
    echo 'is-small';
  } else if ( $breadcrumbsSizes == 'is-medium' ) {
    echo 'is-medium';
  } else if ( $breadcrumbsSizes == 'is-large' ) {
    echo 'is-large';
  }
}

function bulmawp_breadcrumbs_alignment() {
  $options = get_option( 'breadcrumbs_alignment' );
	$alignments = array( 'None', 'is-centered', 'is-right' );
	foreach( $alignments as $alignment ) {
		$checked = ( @$options == $alignment ? 'checked' : '' );
		echo '<p><label class="radio"><input type="radio" name="breadcrumbs_alignment" value=' . $alignment . ' ' . $checked . '/><code>' . $alignment . '</code></label></p>';
	}
}

function bulmawp_breadcrumbs_alternative_seperators() {
  $options = get_option( 'breadcrumbs_alternative_seperators' );
	$seperators = array( 'Default', 'has-arrow-separator', 'has-bullet-separator', 'has-dot-separator', 'has-succeeds-separator' );
	foreach( $seperators as $seperator) {
		$checked = ( @$options == $seperator ? 'checked' : '' );
		echo '<p><label class="radio"><input type="radio" name="breadcrumbs_alternative_seperators" value=' . $seperator . ' ' . $checked . '/><code>' . $seperator . '</code></label></p>';
	}
}

function bulmawp_breadcrumbs_icons() {
  $options = get_option( 'breadcrumbs_icons' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<p><label class="checkbox"><input type="checkbox" name="breadcrumbs_icons" value="1" ' . $checked . ' /></label></p>';
}

function bulmawp_get_breadcrumbs_icons() {
  $breadcrumbsIcons = get_option( 'breadcrumbs_icons' );
  $postIcon = get_post_meta( get_the_ID(), 'bulmawp_breadcrumbs_icon', true );
  if ( $breadcrumbsIcons == 1 ) {
    if ( empty( $postIcon ) ) {
    } else {
      echo '<span class="icon is-small"><i class="' . $postIcon . '"></i></span>';
    }
  }
}

function bulmawp_breadcrumbs_icon_size() {
  $iconSizes = get_option( 'breadcrumbs_sizes' );
  if ( $iconSizes == 'is-small' ) {
    echo 'is-small';
  } else if ( $iconSizes == 'is-medium' ) {
    echo 'is-medium';
  } else if ( $iconSizes == 'is-large' ) {
    echo 'is-large';
  }
}

function bulmawp_breadcrumbs_font_awesome_size() {
  $fontAwesomeSizes = get_option( 'breadcrumbs_sizes' );
  if ( $fontAwesomeSizes == 'is-small' ) {
    echo 'fa-sm';
  } else if ( $fontAwesomeSizes == 'is-large' ) {
    echo 'fa-lg';
  }
}

function bulmawp_breadcrumbs_sizes() {
  $options = get_option( 'breadcrumbs_sizes' );
	$sizes = array('Default', 'is-small', 'is-medium', 'is-large');
	foreach( $sizes as $size ) {
		$checked = ( @$options == $size ? 'checked' : '' );
		echo '<p><label class="radio"><input type="radio" name="breadcrumbs_sizes" value=' . $size . ' ' . $checked . '/><code>' . $size . '</code></label></p>';
	}
}
?>
