<?php
/**
 * @package bulmawp
 * @since 0.1.0
 * @version 0.4.0
 */

get_header();
?>
  <div class="column is-9">
    <?php
    bulmawp_breadcrumbs();
    if( have_posts() ) : while( have_posts() ) : the_post();
    ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="content">
          <p class="is-size-7">
            <?php
            echo __( 'In ' );
            the_category( ', ' );
            echo __( ' by ' );
            the_author();
            echo ' ';
            the_date( '', '/ ' );
            ?> / <a href="<?php the_permalink(); ?>#comments"><?php comments_number( '0 comments', '1 comment', '% comments' ); ?></a>
          </p>
					<?php the_excerpt(); ?>
        </div>
	      <?php
	      $tags = get_tags();
	      if( has_tag() ) :
				?>
					<div class="level is-mobile">
						<div class="level-left">
							<div class="level-item">
								<p class="is-size-7"><?php echo __( 'Tags:' ); ?></p>
							</div>
							<div class="level-item">
								<div class="tags">
									<?php
									foreach( $tags as $tag ) {
										echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="tag">' . $tag->name . '</a>';
									}
									?>
								</div>
							</div>
						</div>
					</div>
				<?php	endif; ?>
        <?php comments_template(); ?>
      </div>
    <?php endwhile; endif; ?>
  </div>
  <?php get_sidebar(); ?>
<?php get_footer(); ?>
