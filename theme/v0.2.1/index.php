<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.1
 */
?>
<?php get_header(); ?>
  <div class="column is-9">
    <?php get_bulmawp_breadcrumbs(); ?>
    <div class="content">
      <?php
      if( have_posts() ) : while( have_posts() ) : the_post();
      get_template_part( 'content', get_post_format() );
      endwhile; endif;
      ?>
    </div>
    <?php
    $count_posts = wp_count_posts();
    $published_posts = $count_posts->publish;
    if( $published_posts > get_query_var( 'posts_per_page' ) ) {
      bulmawp_pagination();
    }
    ?>
  </div>
  <?php get_sidebar(); ?>
<?php get_footer(); ?>
