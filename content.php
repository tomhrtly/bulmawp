<?php
/**
 * @package bulmawp
 * @since 0.1.0
 * @version 0.4.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <div class="content">
    <p class="is-size-7 <?php if( has_tag() ) : echo 'is-marginless'; endif; ?>">
      <?php
      echo __( 'In ' );
      the_category( ', ' );
      echo __( ' by ' );
      the_author();
      echo ' / ';
      echo apply_filters( 'the_date', get_the_date(), get_option( 'date_format' ), '', '' );
      ?> / <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></a>
    </p>
    <?php the_excerpt(); ?>
  </div>
</div>
