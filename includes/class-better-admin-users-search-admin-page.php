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
        'title'        => 'Better Admin Users Search',
        'object_types' => array( 'options-page' ),
        'option_key'      => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_options',
        'parent_slug'     => 'options-general.php',
        'capability'      => 'manage_options',
    ) );

    $cmb_options->add_field( array(
        'name'     => __( 'Default search values', 'baus' ),
        'desc'     => __( 'Default values used by WordPress to do the search', 'baus' ),
        'id'       => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_title_default_wp',
        'type'     => 'title',
        'on_front' => false,
    ) );

    foreach ($this->utils->get_default_value() as $entry) {
        $cmb_options->add_field( array(
            'name'    => esc_html($entry),
            'type'    => 'checkbox',
            'id'      => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_default_value_' . $entry,
            'default' => $this->cmb2_set_checkbox_default_for_new_post( true ),
            'description' => sprintf(
                esc_html__('For you, this data is "%s"', 'baus'),
                wp_get_current_user()->get($entry)
            )
        ) );
    }

    $cmb_options->add_field( array(
        'name'     => __('Additionals metas', 'baus'),
        'desc'     => __('Add additional user metas to the admin user search', 'baus'),
        'id'       => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_title_metas',
        'type'     => 'title',
        'on_front' => false,
    ) );


    $cmb_options->add_field( array(
        'name'    => __('User meta(s)', 'baus'),
        'id'      => BETTER_ADMIN_USERS_SEARCH_PREFIX . '_metas',
        'desc'    => esc_html__('Select metas you want to add to your search', 'baus'),
        'type'    => 'pw_multiselect',
        'options' => $this->utils->get_user_metas()
    ));


}

private function cmb2_set_checkbox_default_for_new_post( $default ) {
    return isset( $_GET['post'] ) ? '' : ( $default ? (string) $default : '' );
}



}