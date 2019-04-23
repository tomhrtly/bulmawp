<?php
/**
 * @package bulmawp
 * @since 0.1.0
 * @version 0.4.0
 */

if ( comments_open() ) :
?>
  <h3 id="comments" class="subtitle"><?php echo __( 'Comments' ); ?></h3>
  <?php
  if ( have_comments() ) :
    wp_list_comments( array(
      'max_depth'     => '3',
      'avatar_size'   => '128',
      'walker'        => new BulmaWP_Comment_Walker(),
    ) );
  endif;

  comment_form( array(
    'label_submit'            => __( 'Post comment' ),
    'class_submit'            => 'button',
    'comment_notes_before'    => '',
    'title_reply'             => '',
    'title_reply_to'          => '',
    'title_reply_before'      => '',
    'title_reply_after'       => '',
    'submit_field'            => '<div class="field"><p class="control">%1$s%2$s</p></div>',
    'cancel_reply_link'       => '<div class="delete"></div>',
    'fields'                  => array(
      'author'    => '<div class="field"><p class="control has-icons-left"><input name="author" class="input" type="text" placeholder="Name" required><span class="icon is-small is-left"><i class="fa fa-user"></i></span></p></div>',
      'email'     => '<div class="field"><p class="control has-icons-left"><input name="email" class="input" type="email" placeholder="Email address" required><span class="icon is-small is-left"><i class="fa fa-envelope"></i></span></p></div>',
      'url'       => '<div class="field"><p class="control has-icons-left"><input name="url" class="input" type="url" placeholder="Website address"><span class="icon is-small is-left"><i class="fa fa-globe"></i></span></p></div>',
    ),
    'comment_field'           => '<article class="media field"><div class="media-content"><div class="field"><p class="control"><textarea class="textarea" name="comment" placeholder="Add a comment..." required></textarea></p></div></div></article>'
  ) );
endif;
