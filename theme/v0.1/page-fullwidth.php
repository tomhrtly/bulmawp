<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.1
 * Template Name: Full-Width
 */
?>
<?php get_header();?>
<div class="column">
  <?php get_bulmawp_breadcrumbs(); ?>
  <div class="content">
  <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post">
  	   <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
       <?php the_content(); ?>
       <?php comments_template(); ?>
    </div>
  <?php endwhile; ?>
  <?php endif; ?>
<?php get_footer();?>
