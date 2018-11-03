<?php
/**
 * @package bulmawp
 * @since 0.1
 * @version 0.2.2
 */

/* FUNCTIONS */
function bulmawp_add_admin_page() {
  add_menu_page( 'Settings', 'BulmaWP', 'manage_options', 'bulmawp', 'bulmawp_create_page', 'dashicons-admin-appearance', 3 );
  add_submenu_page( 'bulmawp', 'Settings', 'Settings', 'manage_options', 'bulmawp', 'bulmawp_create_page' );
  add_action( 'admin_init', 'bulmawp_custom_settings' );
}
add_action( 'admin_menu', 'bulmawp_add_admin_page' );

function bulmawp_create_page() {
  require_once( get_template_directory() . '/inc/admin/settings-template.php' );
}

function bulmawp_custom_settings() {
  register_setting( 'bulmawp-settings', 'breadcrumbs_alignment' );
  register_setting( 'bulmawp-settings', 'breadcrumbs_alternative_seperators' );
  register_setting( 'bulmawp-settings', 'breadcrumbs_icons' );
  register_setting( 'bulmawp-settings', 'breadcrumbs_sizes' );
  register_setting( 'bulmawp-settings', 'breadcrumbs_enable' );
  add_settings_section( 'bulmawp-breadcrumbs', 'Breadcrumbs', 'bulmawp_breadcrumbs', 'bulmawp' );
  add_settings_field( 'breadcrumbs_enable', 'Show Breadcrumbs', 'bulmawp_breadcrumbs_enable', 'bulmawp', 'bulmawp-breadcrumbs' );
  add_settings_field( 'breadcrumbs_alignment', 'Alignment', 'bulmawp_breadcrumbs_alignment', 'bulmawp', 'bulmawp-breadcrumbs' );
  add_settings_field( 'breadcrumbs_alternative_seperators', 'Alternative Seperators', 'bulmawp_breadcrumbs_alternative_seperators', 'bulmawp', 'bulmawp-breadcrumbs' );
  add_settings_field( 'breadcrumbs_enable', 'Enable Breadcrumbs', 'bulmawp_breadcrumbs_enable', 'bulmawp', 'bulmawp-breadcrumbs' );
  add_settings_field( 'breadcrumbs_icons', 'Icons', 'bulmawp_breadcrumbs_icons', 'bulmawp', 'bulmawp-breadcrumbs' );
  add_settings_field( 'breadcrumbs_sizes', 'Sizes', 'bulmawp_breadcrumbs_sizes', 'bulmawp', 'bulmawp-breadcrumbs' );

  register_setting( 'bulmawp-settings', 'footer_copyright' );
  register_setting( 'bulmawp-settings', 'footer_text' );
  register_setting( 'bulmawp-settings', 'footer_enable' );
  add_settings_section( 'bulmawp-footer', 'Footer', 'bulmawp_footer', 'bulmawp' );
  add_settings_field( 'footer_enable', 'Enable Footer', 'bulmawp_footer_enable', 'bulmawp', 'bulmawp-footer' );
  add_settings_field( 'footer_copyright', 'Copyright', 'bulmawp_footer_copyright', 'bulmawp', 'bulmawp-footer' );
  add_settings_field( 'footer_text', 'Text', 'bulmawp_footer_text', 'bulmawp', 'bulmawp-footer' );

  register_setting( 'bulmawp-settings', 'navbar_transparent' );
  register_setting( 'bulmawp-settings', 'navbar_is_spaced' );
  register_setting( 'bulmawp-settings', 'navbar_is_fixed' );
  register_setting( 'bulmawp-settings', 'navbar_color' );
  add_settings_section( 'bulmawp-navbar', 'Navbar', 'bulmawp_navbar', 'bulmawp' );
  add_settings_field( 'navbar_is_fixed', 'Fixed', 'bulmawp_navbar_is_fixed', 'bulmawp', 'bulmawp-navbar' );
  add_settings_field( 'navbar_is_spaced', '<code>is-spaced</code>', 'bulmawp_navbar_is_spaced', 'bulmawp', 'bulmawp-navbar' );
  add_settings_field( 'navbar_transparent', '<code>is-transparent</code>', 'bulmawp_navbar_transparent', 'bulmawp', 'bulmawp-navbar' );
  add_settings_field( 'navbar_color', 'Color', 'bulmawp_navbar_color', 'bulmawp', 'bulmawp-navbar' );

  register_setting( 'bulmawp-settings', 'pagination_alignment' );
  register_setting( 'bulmawp-settings', 'pagination_sizes' );
  register_setting( 'bulmawp-settings', 'pagination_styles' );
  add_settings_section( 'bulmawp-pagination', 'Pagination', 'bulmawp_pagination', 'bulmawp' );
  add_settings_field( 'pagination_alignment', 'Alignment', 'bulmawp_pagination_alignment', 'bulmawp', 'bulmawp-pagination' );
  add_settings_field( 'pagination_sizes', 'Sizes', 'bulmawp_pagination_sizes', 'bulmawp', 'bulmawp-pagination' );
  add_settings_field( 'pagination_styles', 'Styles', 'bulmawp_pagination_styles', 'bulmawp', 'bulmawp-pagination' );

  register_setting( 'bulmawp-settings', 'search_color' );
  register_setting( 'bulmawp-settings', 'search_icon' );
  register_setting( 'bulmawp-settings', 'search_placeholder' );
  add_settings_section( 'bulmawp-search', 'Search Bar', 'bulmawp_search', 'bulmawp' );
  add_settings_field( 'search_color', 'Color', 'bulmawp_search_color', 'bulmawp', 'bulmawp-search' );
  add_settings_field( 'search_icon', 'Search Icon', 'bulmawp_search_icon', 'bulmawp', 'bulmawp-search' );
  add_settings_field( 'search_placeholder', 'Placeholder', 'bulmawp_search_placeholder', 'bulmawp', 'bulmawp-search' );

  register_setting( 'bulmawp-settings', 'social_facebook' );
  register_setting( 'bulmawp-settings', 'social_twitter' );
  register_setting( 'bulmawp-settings', 'social_google' );
  register_setting( 'bulmawp-settings', 'social_instagram' );
  register_setting( 'bulmawp-settings', 'social_pinterest' );
  register_setting( 'bulmawp-settings', 'social_rss' );
  add_settings_section( 'bulmawp-social', 'Social', 'bulmawp_social', 'bulmawp' );
  add_settings_field( 'social_facebook', 'Facebook', 'bulmawp_social_facebook', 'bulmawp', 'bulmawp-social' );
  add_settings_field( 'social_google', 'Google Plus', 'bulmawp_social_google', 'bulmawp', 'bulmawp-social' );
  add_settings_field( 'social_instagram', 'Instagram', 'bulmawp_social_instagram', 'bulmawp', 'bulmawp-social' );
  add_settings_field( 'social_pinterest', 'Pinterest', 'bulmawp_social_pinterest', 'bulmawp', 'bulmawp-social' );
  add_settings_field( 'social_rss', 'RSS', 'bulmawp_social_rss', 'bulmawp', 'bulmawp-social' );
  add_settings_field( 'social_twitter', 'Twitter', 'bulmawp_social_twitter', 'bulmawp', 'bulmawp-social' );
}

/* INCLUDES */

require get_template_directory() . '/inc/admin/function-breadcrumbs.php';
require get_template_directory() . '/inc/admin/function-footer.php';
require get_template_directory() . '/inc/admin/function-navbar.php';
require get_template_directory() . '/inc/admin/function-pagination.php';
require get_template_directory() . '/inc/admin/function-search.php';
require get_template_directory() . '/inc/admin/function-social.php';
