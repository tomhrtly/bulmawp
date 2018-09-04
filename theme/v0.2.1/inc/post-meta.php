<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.1
 */

/* FUNCTIONS */
function bulmawp_breadcrumbs_icon_meta_callback( $object ) {
  wp_nonce_field( basename(__FILE__), 'bulmawp_breadcrumbs_nonce' );
?>
<label><code>&lt;i class="</code></label><input name="bulmawp_breadcrumbs_icon" type="text" value="<?php echo get_post_meta( $object->ID, "bulmawp_breadcrumbs_icon", true ); ?>" /><label><code>"&gt;&lt;/i&gt;</code></label>
<?php
}

function bulmawp_save_breadcrumbs( $post_id, $post, $update ) {
  if ( !isset( $_POST['_namespace_form_metabox_process'] ) ) return;
		if ( !wp_verify_nonce( $_POST['_namespace_form_metabox_process'], '_namespace_form_metabox_nonce' ) ) {
			return $post->ID;
		}
		if ( !current_user_can( 'edit_post', $post->ID ) ) {
			return $post->ID;
		}
		if ( !isset( $_POST['bulmawp_breadcrumbs_icon'] ) ) {
			return $post->ID;
		}
		$sanitized = wp_filter_post_kses( $_POST['bulmawp_breadcrumbs_icon'] );
		update_post_meta( $post->ID, '_namespace', $sanitized );

    if ( !isset( $_POST['bulmawp_breadcrumbs_nonce'] ) || !wp_verify_nonce( $_POST['bulmawp_breadcrumbs_nonce'], basename(__FILE__) ) )
        return $post_id;

    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;

    $slug_post = 'post';
    if ( $slug_post != $post->post_type )
        return $post_id;

    if ( isset( $_POST['bulmawp_breadcrumbs_icon'] ) ) {
        $meta_box_text_value = $_POST['bulmawp_breadcrumbs_icon'];
    }
    update_post_meta( $post_id, 'bulmawp_breadcrumbs_icon', $meta_box_text_value );
}

add_action( 'save_post', 'bulmawp_save_breadcrumbs', 10, 3 );

function bulmawp_add_breadcrumbs_meta() {
    add_meta_box( 'bulmawp-breadcrumbs-icon-meta', 'Breadcrumbs (Font Awesome 5) Icon', 'bulmawp_breadcrumbs_icon_meta_callback', 'post', 'side', 'high' );
    add_meta_box( 'bulmawp-breadcrumbs-icon-meta', 'Breadcrumbs (Font Awesome 5) Icon', 'bulmawp_breadcrumbs_icon_meta_callback', 'page', 'side', 'high' );
}

add_action( 'add_meta_boxes', 'bulmawp_add_breadcrumbs_meta' );

function remove_custom_meta_form() {
    remove_meta_box( 'postcustom', 'post', 'normal' );
    remove_meta_box( 'postcustom', 'page', 'normal' );
}

add_action( 'admin_menu', 'remove_custom_meta_form' );
