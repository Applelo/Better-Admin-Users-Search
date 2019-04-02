<?php


class Better_Admin_Users_Search_Hook
{

    private $utils;

    public function __construct()
    {
        add_action( 'pre_user_query', array($this, 'extend_admin_users_search'), 1);

    }

    public function extend_admin_users_search($query) {

        if( ! is_admin() && !empty($_GET["s"]))
            return;


        $search = $_GET["s"];

        preg_match("/{(.*?)}/", $query->query_where, $query_key);
        $query_key = $query_key[0];
        $query_key = ltrim($query_key, '{');
        $query_key = rtrim($query_key, '}');



        //echo "<pre>" . var_export($query_key, true) . "</pre>";
        //die();

    }



}