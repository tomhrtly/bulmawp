<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.1
 */
?>
        </div>
      </div>
    </section>
    <?php
    $footerEnable = get_option( 'footer_enable' );
    if( $footerEnable == 1 ) {
    ?>
    <footer class="footer">
      <div class="container">
        <div class="content has-text-centered">
          <?php
          $footerText = esc_attr( get_option( 'footer_text' ) );
    			if( !empty( $footerText ) ) {
      			echo '<p>' . $footerText . '</p>';
      		}
          ?>
          <?php
          $footerCopyright = get_option( 'footer_copyright' );
          if( $footerCopyright == 1 ) {
              echo '<p>&copy; ' . get_bloginfo('name') . ' ' . date('Y') . '. All rights reserved.</p>';
          }
          ?>
          <a href="https://bulma.io">
            <img src="https://bulma.io/images/made-with-bulma.png" alt="Made with Bulma" width="128" height="24">
          </a>
        </div>
      </div>
    </footer>
    <?php
    }
    ?>
    <?php wp_footer(); ?>
  </body>
</html>
