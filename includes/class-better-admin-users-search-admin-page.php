<?php


class Better_Admin_Users_Search_Admin_Page
{

    private $utils;

public function __construct()
{
    $this->utils = new Better_Admin_Users_Admin_Utils();
    add_action( 'cmb2_admin_init', array( $this, 'add_metabox' ));
}

public function add_metabox() {

    $cmb_options = new_cmb2_box( array(
        'id'           => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_settings_page',
        'title'        => esc_html__( 'Better Admin Users Search', BETTER_ADMIN_USERS_SEARCH_PREFIX ),
        'object_types' => array( 'options-page' ),
        'option_key'      => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_options',
        'parent_slug'     => 'options-general.php',
        'capability'      => 'manage_options',
    ) );

    $cmb_options->add_field( array(
        'name'     => esc_html__( 'Default Search values', BETTER_ADMIN_USERS_SEARCH_PREFIX ),
        'desc'     => esc_html__( 'Default values used by Wordpress to do the search', BETTER_ADMIN_USERS_SEARCH_PREFIX ),
        'id'       => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_title_default_wp',
        'type'     => 'title',
        'on_front' => false,
    ) );

    foreach ($this->utils->get_default_value() as $entry) {
        $cmb_options->add_field( array(
            'name'    => $entry,
            'type'    => 'checkbox',
            'id'      => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_default_value_' . $entry,
            'default' => $this->cmb2_set_checkbox_default_for_new_post( true ),
            'description' => 'For you, this data is "' . wp_get_current_user()->get($entry) . '"'
        ) );
    }

    $cmb_options->add_field( array(
        'name'     => esc_html__( 'Additionnals Metas', BETTER_ADMIN_USERS_SEARCH_PREFIX),
        'desc'     => esc_html__( 'Add additional user metas to the admin user search', BETTER_ADMIN_USERS_SEARCH_PREFIX),
        'id'       => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_title_metas',
        'type'     => 'title',
        'on_front' => false,
    ) );

    
    $cmb_options->add_field( array(
        'name'    => 'UserMeta(s)',
        'id'      => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_metas',
        'desc'    => 'Select metas you want to add to your search',
        'type'    => 'pw_multiselect',
        'options' => $this->utils->get_user_metas()
    ));


}

private function cmb2_set_checkbox_default_for_new_post( $default ) {
    return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}



}