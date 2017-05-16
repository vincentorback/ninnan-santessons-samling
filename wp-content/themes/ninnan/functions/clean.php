<?php

/**
 * Hide the admin bar on the front-end
 * @link https://codex.wordpress.org/Function_Reference/show_admin_bar
 */
add_filter( 'show_admin_bar', '__return_false' );




/**
 * Hide admin menu items. Can be both parents and children in dropdowns.
 * Specify link to parent and link to child.
 * @link https://codex.wordpress.org/Function_Reference/remove_menu_page
 */
add_action( 'admin_head', function () {

  // Remove Posts
  remove_menu_page( 'edit.php' );

  // Remove Comments
  remove_menu_page( 'edit-comments.php' );



  if ( ! current_user_can( 'administrator' ) ) {
    // Remove Dashboard
    remove_menu_page( 'index.php' );

    // Remove Posts -> Categories
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
    // Remove Posts -> Tags
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );

    // Remove Media
    remove_menu_page( 'upload.php' );

    // Remove Appearance
    remove_menu_page( 'themes.php' );

    // Remove Plugins
    remove_menu_page( 'plugins.php' );

    // Remove Users
    remove_menu_page( 'users.php' );
    // Remove Users -> Users
    remove_submenu_page( 'users.php', 'users.php' );
    // Remove Users -> Your profile
    remove_submenu_page( 'users.php', 'profile.php' );

    // Remove Tools
    remove_menu_page( 'tools.php' );

    // Remove Settings
    remove_menu_page( 'options-general.php' );
  }
});




/**
 * Remove access to the dashboard
 */
add_action( 'admin_init', function () {
  if ( ! current_user_can( 'administrator' ) ) {
    global $pagenow; // Get current page
    $redirect = get_admin_url( null, 'edit.php?post_type=chapter' ); // Where to redirect

    if ( $pagenow == 'index.php' ) {
      wp_redirect( $redirect, 301 );
      exit;
    }
  }
});






/**
 * De-registers the WordPress stock jQuery script
 * @link https://codex.wordpress.org/Function_Reference/wp_deregister_script
 */
add_action( 'wp_enqueue_scripts', function () {
  if ( !is_admin() ) {
     wp_deregister_script( 'jquery' );
     wp_deregister_script( 'wp-embed' );
  }
});





/**
 * Disable the REST API
*/
add_action( 'init', function () {
  add_filter( 'rest_enabled', '__return_false' );
  add_filter( 'rest_jsonp_enabled', '__return_false' );

  remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
  remove_action( 'template_redirect', 'rest_output_link_header', 11 );
});






/**
 * Remove feeds and wordpress-specific content that is generated on the wp_head hook.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wp_head
 */
add_action( 'init', function () {
  // Remove the Really Simple Discovery service link
  remove_action( 'wp_head', 'rsd_link' );

  // Remove the link to the Windows Live Writer manifest
  remove_action( 'wp_head', 'wlwmanifest_link' );

  // Remove the general feeds
  remove_action( 'wp_head', 'feed_links', 2 );

  // Remove the extra feeds, such as category feeds
  remove_action( 'wp_head','feed_links_extra', 3 );

  // Remove the displayed XHTML generator
  remove_action( 'wp_head', 'wp_generator' );

  // Remove the REST API link tag
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
});






/**
 * Remove emoji support
 * @link https://codex.wordpress.org/Emoji
 */
add_action( 'init', function () {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'emoji_svg_url', '__return_false' );

  // Filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', function ( $plugins ) {
    if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
    }

    return array();
  });
});
