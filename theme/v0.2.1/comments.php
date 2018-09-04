<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.1
 */
?>
<?php if ( comments_open() ) : ?>
  <h3 id="comments">Comments</h3>
<?php endif; ?>
<?php if ( have_comments() ) : ?>
  <div class="comments">
    <ul>
      <?php wp_list_comments( 'type=comment&callback=get_bulmawp_comments' ); ?>
    </ul>
  </div>
<?php endif; ?>
<div class="comments">
  <?php
  comment_form( array(
    'comment_notes_before' => ( '' ),
    'comment_form_before' => ( '<p>' ),
    'comment_form_after' => ( '</p>' ),
    'label_submit' => __( 'Submit' ),
    'class_submit' => 'button is-primary',
    'title_reply' => __( '' ),
    'title_reply_to' => __( '' ),
    'cancel_reply_link'    => __( 'Cancel reply' ),
    'fields' => array(
      'author' =>
      '<div class="field">
        <p class="control has-icons-left">
          <input id="author" name="author" class="input" type="text" placeholder="Name" required>
          <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
        </p>
      </div>',
      'email'  =>
        '<div class="field">
          <p class="control has-icons-left">
            <input id="email" name="email" class="input" type="email" placeholder="Email address" required>
            <span class="icon is-small is-left">
              <i class="fa fa-envelope"></i>
            </span>
          </p>
        </div>',
        'url'  =>
          '<div class="field">
            <p class="control has-icons-left">
              <input id="url" name="url" class="input" type="url" placeholder="Website address">
              <span class="icon is-small is-left">
                <i class="fas fa-globe"></i>
              </span>
            </p>
          </div>'
    ),
    'comment_field' =>
        '<div class="field">
          <textarea id="comment" class="textarea" name="comment" rows="3" required></textarea>
        </div>'
  ) );
  ?>
</div>
