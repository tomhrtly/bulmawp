<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2
 */

/* FUNCTIONS */

function bulmawp_get_search_placeholder() {
  $searchPlaceholder = esc_attr( get_option( 'search_placeholder' ) );
  if( !empty( $searchPlaceholder ) ) {
    echo $searchPlaceholder;
  }
}

function bulmawp_get_search_color() {
  $searchColor = get_option( 'search_color' );
  if( $searchColor == 'is-primary' ) {
    echo 'is-primary';
  } else if( $searchColor == 'is-link' ) {
    echo 'is-link';
  } else if( $searchColor == 'is-info' ) {
    echo 'is-info';
  } else if( $searchColor == 'is-success' ) {
    echo 'is-success';
  } else if( $searchColor == 'is-warning' ) {
    echo 'is-warning';
  } else if( $searchColor == 'is-danger' ) {
    echo 'is-danger';
  } else if( $searchColor == 'is-black' ) {
    echo 'is-black';
  } else if( $searchColor == 'is-dark' ) {
    echo 'is-dark';
  } else if( $searchColor == 'is-light' ) {
    echo 'is-light';
  } else if( $searchColor == 'is-white' ) {
    echo 'is-white';
  }
}

function bulmawp_get_search_icon() {
  $searchIcon = get_option( 'search_icon' );
  if( $searchIcon == 1 ) {
    echo '<i class="fa fa-search"></i>';
  } else {
    echo 'Search';
  }
}
?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo site_url(); ?>">
  <div class="field has-addons">
    <div class="control is-expanded">
      <input type="text" name="s" id="s" class="input" placeholder="<?php bulmawp_get_search_placeholder(); ?>" required>
    </div>
    <div class="control">
      <button type="submit" id="searchsubmit" class="button <?php bulmawp_get_search_color(); ?>">
        <?php bulmawp_get_search_icon(); ?>
      </button>
    </div>
  </div>
</form>
