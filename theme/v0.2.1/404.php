<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.1
 */
?>
<?php get_header(); ?>
<div class="column">
  <div class="content has-text-centered">
    <h1>404 - Page Not Found</h1>
    <p>Looks like this page was either deleted, moved or never existed.</p>
    <p>Head back to the <a href="<?php echo site_url(); ?>">homepage</a> or use the search bar below to find what you're looking for.</p>
    <div class="columns">
      <div class="column"></div>
      <div class="column is-6">
        <?php require_once 'searchform.php'; ?>
      </div>
      <div class="column"></div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
