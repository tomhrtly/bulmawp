<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.1
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php bulmawp_get_navbar_is_fixed_html(); ?>">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <nav class="navbar <?php bulmawp_get_navbar_config(); ?>">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item" href="<?php echo site_url(); ?>"><?php
          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $custom_logo_id, 'full' );
          if( has_custom_logo() ) {
            echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo( 'name' ) . '"/>';
          } else {
            echo '<h1 class="subtitle">' . get_bloginfo( 'name' ) . '</h1>';
          }
      ?></a>
          <div class="navbar-burger burger" data-target="navbar">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>

        <div id="navbar" class="navbar-menu">
          <div class="navbar-start">
            <?php
              wp_nav_menu( array(
                'theme_location' => 'navbar_start',
                'menu'            => '',
            		'container'       => '',
            		'container_class' => '',
            		'container_id'    => '',
            		'menu_class'      => '',
            		'menu_id'         => '',
            		'echo'            => true,
            		'fallback_cb'     => 'BulmaWP_Walker::fallback',
            		'before'          => '',
            		'after'           => '',
            		'link_before'     => '',
            		'link_after'      => '',
                'items_wrap'      => '%3$s',
                'depth'           => 0,
                'walker' => new BulmaWP_Walker
              ));
            ?>
          </div>

          <div class="navbar-end">
            <?php
              wp_nav_menu( array(
                'theme_location' => 'navbar_end',
                'menu'            => '',
            		'container'       => '',
            		'container_class' => '',
            		'container_id'    => '',
            		'menu_class'      => '',
            		'menu_id'         => '',
            		'echo'            => true,
            		'fallback_cb'     => 'BulmaWP_Walker::fallback',
            		'before'          => '',
            		'after'           => '',
            		'link_before'     => '',
            		'link_after'      => '',
                'items_wrap'      => '%3$s',
                'depth'           => 0,
                'walker' => new BulmaWP_Walker
              ));
            ?>
            <div class="field is-grouped">
              <?php
              $socialFacebook = esc_attr( get_option( 'social_facebook' ) );
        			if( !empty( $socialFacebook ) ) {
          			echo '<a href="' . $socialFacebook . '" class="navbar-item">
                  <span class="icon is-facebook">
                    <i class="fab fa-facebook fa-lg"></i>
                  </span>
                </a>';
          		}
              ?>
              <?php
              $socialTwitter = esc_attr( get_option( 'social_twitter' ) );
        			if( !empty( $socialTwitter ) ) {
          			echo '<a href="' . $socialTwitter . '" class="navbar-item">
                  <span class="icon is-twitter">
                    <i class="fab fa-twitter fa-lg"></i>
                  </span>
                </a>';
          		}
              ?>
              <?php
              $socialGoogle = esc_attr( get_option( 'social_google' ) );
        			if( !empty( $socialGoogle ) ) {
          			echo '<a href="' . $socialGoogle . '" class="navbar-item">
                  <span class="icon is-googleplus">
                    <i class="fab fa-google-plus fa-lg"></i>
                  </span>
                </a>';
          		}
              ?>
              <?php
              $socialInstagram = esc_attr( get_option( 'social_instagram' ) );
        			if( !empty( $socialInstagram ) ) {
          			echo '<a href="' . $socialInstagram . '" class="navbar-item">
                  <span class="icon is-instagram">
                    <i class="fab fa-instagram fa-lg is-instagram"></i>
                  </span>
                </a>';
          		}
              ?>
              <?php
              $socialPinterest = esc_attr( get_option( 'social_pinterest' ) );
        			if( !empty( $socialPinterest ) ) {
          			echo '<a href="' . $socialPinterest . '" class="navbar-item">
                  <span class="icon is-pinterest">
                    <i class="fab fa-pinterest fa-lg"></i>
                  </span>
                </a>';
          		}
              ?>
              <?php
              $socialRSS = get_option( 'social_rss' );
              if( $socialRSS == 1 ) {
                  echo '<a href="' . site_url() . '/feed" class="navbar-item">
                  <span class="icon is-rss">
                    <i class="fas fa-rss fa-lg"></i>
                  </span>
                </a>';
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <section class="section">
      <div class="container">
        <div class="columns">
