<?php
/**
 * Plugin Name:       Better Admin Users Search
 * Plugin URI:        https://github.com/Applelo/Better-Admin-Users-Search
 * Description:       A plugin to improve users admin search
 * Version:           1.0.0
 * Author:            Applelo
 * Author URI:        https://lois-boubault.me/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       baus
 * Domain Path:       i18n
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define('BETTER_ADMIN_USERS_SEARCH_VERSION', '1.0.0' );
define('BETTER_ADMIN_USERS_SEARCH_PREFIX', 'baus' );



require plugin_dir_path( __FILE__ ) . 'includes/class-better-admin-users-search.php';

function load_i18n() {
    load_plugin_textdomain( 'baus', FALSE, basename( dirname( __FILE__ ) ) . '/i18n/' );
}

function add_action_links ( $links ) {
    $mylinks = array(
        '<a href="' . admin_url( 'options-general.php?page=baus_options' ) . '">' . __('Settings', 'baus') . '</a>',
    );
    return array_merge( $links, $mylinks );
}



function baus() {
    add_action( 'plugins_loaded', 'load_i18n');
    add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );
    new Better_Admin_Users_Search();
}
baus();