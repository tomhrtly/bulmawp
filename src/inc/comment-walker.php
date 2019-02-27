<?php
/**
 * @package bulmawp
 * @since 0.2.2
 * @version 0.4.0
 */

if ( ! class_exists( 'BulmaWP_Comment_Walker' ) ) {
 	/**
 	 * BulmaWP_Comment_Walker class.
 	 *
 	 * @extends Walker_Comment
 	 */
	class BulmaWP_Comment_Walker extends Walker_Comment {
		/**
		 * Start Level.
		 *
		 * @see    Walker::start_lvl()
		 * @since  0.2.2
		 *
		 * @access public
		 *
		 * @param mixed $output 	Passed by reference. Used to append additional content.
		 * @param int   $depth  	(default: 0) Depth of comment item.
		 * @param array $args   	(default: array()) Arguments.
		 *
		 * @return void
		 */
		function start_lvl( &$output, $depth = 0, $args = array() ) {
		  return;
		}
		/**
		 * End Level.
		 *
		 * @see    Walker::end_lvl()
		 * @since  0.2.2
		 *
		 * @access public
		 *
		 * @param mixed $output 	Passed by reference. Used to append additional content.
		 * @param int   $depth  	(default: 0) Depth of comment item.
		 * @param array $args   	(default: array()) Arguments.
		 *
		 * @return void
		 */
		function end_lvl( &$output, $depth = 0, $args = array() ) {
		  return;
		}
		/**
		 * Start El.
		 *
		 * @see    Walker::start_el()
		 * @since  0.2.2
		 *
		 * @access public
		 *
		 * @param mixed $output 	Passed by reference. Used to append additional content.
		 * @param mixed $comment  Comment item data object.
		 * @param int   $depth  	(default: 0) Depth of comment item.
		 * @param array $args   	(default: array()) Arguments.
		 * @param int   $id     	(default: 0) Comment item ID.
		 *
		 * @return void
		 */
		function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;
			$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );
			if ( 'article' == $args['style'] ) {
				$tag = 'article';
				$add_below = 'comment';
			} else {
				$tag = 'article';
				$add_below = 'comment';
			}
			?>
			<article class="media" id="comment-<?php comment_ID() ?>">
				<figure class="media-left">
			    <p class="image is-64x64">
			      <?php echo get_avatar( $comment, 128 ); ?>
			    </p>
			  </figure>
				<div class="media-content">
			    <div class="content">
						<p>
	            <?php
	            if( get_comment_author_url() ) {
	              echo '<a href="', get_comment_author_url(), '" rel="nofollow"><strong>', comment_author(), '</strong></a>';
	            } else {
	              echo '<strong>', comment_author(), '</strong>';
	            } ?>
							<br>
			      	<?php echo get_comment_text(); ?>
							<br>
			        <small><?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?> · <?php printf( _x( '%s ago', '%s = human-readable time difference' ), human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ) ); ?></small>
			      </p>
					</div>
		<?php
		}
		/**
		 * End El.
		 *
		 * @see    Walker::end_el()
		 * @since  0.2.2
		 *
		 * @access public
		 *
		 * @param mixed $output 	Passed by reference. Used to append additional content.
		 * @param mixed $comment  Comment item data object.
		 * @param int   $depth  	(default: 0) Depth of comment item.
		 * @param array $args   	(default: array()) Arguments.
		 *
		 * @return void
		 */
		function end_el( &$output, $comment, $depth = 0, $args = array() ) {
			echo '</div></article>';
		}
	}
}
