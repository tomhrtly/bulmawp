<?php
/**
 * @package bulmawp
 * @since 0.1.0
 * @version 0.4.0
 */

get_header();
?>
  <div class="column">
    <?php bulmawp_breadcrumbs(); ?>
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
