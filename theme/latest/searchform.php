<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.2
 */

/**
 * Retrieves the search placeholder text from the settings area if one is specified.
 *
 * @since 0.1
 */

function bulmawp_get_search_placeholder() {
  $searchPlaceholder = esc_attr( get_option( 'search_placeholder' ) );
  if( !empty( $searchPlaceholder ) ) :
    echo $searchPlaceholder;
  endif;
}


/**
 * Retrieves the search button color from the settings area.
 *
 * @since 0.1
 */

function bulmawp_get_search_color() {
  $searchColor = get_option( 'search_color' );
  if( $searchColor != 'Default' ) :
    echo ' ', $searchColor;
  endif;
}


/**
 * Displays the search icon from Font Awesome or text for the button.
 *
 * @since 0.1
 */

function bulmawp_get_search_icon() {
  $searchIcon = get_option( 'search_icon' );
  if( $searchIcon == 1 ) :
    echo '<i class="fa fa-search"></i>';
  else :
    echo 'Search';
  endif;
}
?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo site_url(); ?>">
  <div class="field has-addons">
    <div class="control is-expanded">
      <input type="text" name="s" id="s" class="input" placeholder="<?php bulmawp_get_search_placeholder(); ?>" required>
    </div>
    <div class="control">
      <button type="submit" id="searchsubmit" class="button<?php bulmawp_get_search_color(); ?>">
        <?php bulmawp_get_search_icon(); ?>
      </button>
    </div>
  </div>
</form>
