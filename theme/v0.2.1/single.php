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
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'class-name' ); ?>>
      	   <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
           <p class="is-size-7 <?php if( has_tag() ) { echo 'is-marginless'; } ?>">In <?php the_category( ', ' ); ?> by <?php the_author(); ?> <?php the_date( '', '/ ' ); ?> / <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></a></p>
           <?php
           if( has_tag() ) { echo the_tags( '<p class="is-size-7">Tags: ', ', ', '</p>' ); }
           the_content();
           comments_template(); ?>
        </div>
      <?php
      endwhile;
      endif;
      ?>
    </div>
  </div>
  <?php get_sidebar(); ?>
<?php get_footer(); ?>
