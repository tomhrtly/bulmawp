<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.1
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'class-name' ); ?>>
  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <p class="is-size-7 <?php if( has_tag() ) { echo 'is-marginless'; } ?>">In <?php the_category( ', ' ); ?> by <?php the_author(); ?> / <?php the_time('F j, Y'); ?> / <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></a></p>
  <?php if( has_tag() ) { echo the_tags( '<p class="is-size-7">Tags: ', ', ', '</p>' ); } ?>
    <div class="columns">
      <?php
      if( has_post_thumbnail() ) {
        echo '<div class="column is-4 has-text-centered">
        <a href="';
        the_permalink();
        echo '">';
        the_post_thumbnail( 'medium' );
        echo '</a>
        </div>';
      }
      ?>
      <div class="column">
        <?php the_excerpt(); ?>
      </div>
    </div>
  </div>
