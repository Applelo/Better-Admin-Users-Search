<?php
/**
 * @link              https://lois-boubault.me
 * @since             1.0.0
 * @package           Better_Admin_Users_Search
 *
 * @wordpress-plugin
 * Plugin Name:       Better Admin Users Search
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       A plugin to improve users admin search
 * Version:           1.0.0
 * Author:            Applelo
 * Author URI:        http://example.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       better-admin-users-search
 * Domain Path:       /i18n
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'BETTER_ADMIN_USERS_SEARCH_VERSION', '1.0.0' );

define( 'BETTER_ADMIN_USERS_SEARCH_PREFIX', 'baus' );


require plugin_dir_path( __FILE__ ) . 'includes/class-better-admin-users-search.php';


function baus() {
    new Better_Admin_Users_Search();
}
baus();