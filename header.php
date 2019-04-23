<?php
/**
 * @package bulmawp
 * @since 0.1.0
 * @version 0.4.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="<?php echo site_url(); ?>">
            <?php
            $logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
            if( has_custom_logo() ) : echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
            else : echo '<h1 class="subtitle">' . get_bloginfo( 'name' ) . '</h1>';
            endif;
            ?>
          </a>
          <div class="navbar-burger burger">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <div class="navbar-menu">
          <div class="navbar-start">
            <?php
            wp_nav_menu( array(
              'theme_location'  => 'navbar_start',
              'menu'            => '',
          		'container'       => '',
          		'container_class' => '',
          		'container_id'    => '',
          		'menu_class'      => '',
          		'menu_id'         => '',
          		'echo'            => true,
          		'fallback_cb'     => 'BulmaWP_Navbar_Walker::fallback',
          		'before'          => '',
          		'after'           => '',
          		'link_before'     => '',
          		'link_after'      => '',
              'items_wrap'      => '%3$s',
              'depth'           => 0,
              'walker'          => new BulmaWP_Navbar_Walker
            ));
            ?>
          </div>
          <div class="navbar-end">
            <?php
            wp_nav_menu( array(
              'theme_location'  => 'navbar_end',
              'menu'            => '',
          		'container'       => '',
          		'container_class' => '',
          		'container_id'    => '',
          		'menu_class'      => '',
          		'menu_id'         => '',
          		'echo'            => true,
          		'fallback_cb'     => 'BulmaWP_Navbar_Walker::fallback',
          		'before'          => '',
          		'after'           => '',
          		'link_before'     => '',
          		'link_after'      => '',
              'items_wrap'      => '%3$s',
              'depth'           => 0,
              'walker'          => new BulmaWP_Navbar_Walker
            ));
            ?>
            <div class="field is-grouped">
              <a class="navbar-item">
                <span class="icon">
                  <i class="fab fa-facebook fa-lg"></i>
                </span>
              </a>
              <a class="navbar-item">
                <span class="icon">
                  <i class="fab fa-twitter fa-lg"></i>
                </span>
              </a>
              <a class="navbar-item">
                <span class="icon">
                  <i class="fab fa-instagram fa-lg"></i>
                </span>
              </a>
              <a class="navbar-item">
                <span class="icon">
                  <i class="fab fa-pinterest fa-lg"></i>
                </span>
              </a>
              <a class="navbar-item">
                <span class="icon">
                  <i class="fas fa-rss fa-lg"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <section class="section">
      <div class="container">
        <div class="columns">
