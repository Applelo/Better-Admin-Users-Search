<?php


class Better_Admin_Users_Admin_Utils
{

    private $default_values;

    public function __construct()
    {
        $this->default_values = array(
            "user_login",
            "user_url",
            "user_email",
            "user_nicename",
            "display_name"
        );
    }

    public function get_user_metas() {
        $metas = array();
        global $wpdb;
        $select = "SELECT distinct $wpdb->usermeta.meta_key FROM $wpdb->usermeta";
        $user_metas = $wpdb->get_results($select, ARRAY_A);

        foreach ($user_metas as $meta) {
           $metas[] = htmlspecialchars($meta["meta_key"]);
        }
        return $metas;
    }

    public function get_default_value() {
        return $this->default_values;
    }
}