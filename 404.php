<?php
/**
 * @package bulmawp
 * @since 0.1.0
 * @version 0.4.0
 */

get_header();
?>
<div class="column">
  <div class="content">
    <h1><?php echo __( '404 - Page Not Found' ); ?></h1>
    <p><?php echo __( 'Looks like this page was either deleted, moved or never existed.' ); ?></p>
    <p><?php echo __( 'Head back to the <a href="' . site_url() . '">homepage</a> or use the search bar below to find what you\'re looking for.' ); ?></p>
    <div class="columns">
      <div class="column is-6">
        <?php get_template_part( 'searchform' ); ?>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
