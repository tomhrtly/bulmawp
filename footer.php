<?php
/**
 * @package bulmawp
 * @since 0.1.0
 * @version 0.4.0
 */

if ( ! defined( 'ABSPATH' ) ) :	die; endif; // Exit if accessed directly.
?>
        </div>
      </div>
    </section>
    <footer class="footer">
      <div class="container">
        <div class="content has-text-centered">
          <p>&copy; <?php echo get_bloginfo( 'name' ); ?> <?php echo date( 'Y' ); ?><?php _e( '. All rights reserved.', 'bulmawp' ); ?></p>
          <a href="https://bulma.io">
            <img src="https://bulma.io/images/made-with-bulma.png" alt="Made with Bulma" width="128" height="24">
          </a>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
