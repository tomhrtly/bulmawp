<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.2
 */

get_header();
?>
  <div class="column is-9">
    <?php bulmawp_get_breadcrumbs(); ?>
    <div class="content">
      <?php
      if( have_posts() ) : while( have_posts() ) : the_post();
        get_template_part( 'content' );
      endwhile; endif;
      ?>
    </div>
    <?php bulmawp_pagination(); ?>
  </div>
  <?php get_sidebar(); ?>
<?php get_footer(); ?>
