<?php


class Better_Admin_Users_Search_Hook
{

    private $default_values = array();
    private $meta_values = array();
    private $options;
    private $search;


    public function __construct()
    {
        add_action( 'pre_user_query', array($this, 'extend_admin_users_search'), 1);

    }

    public function extend_admin_users_search($query) {
        if( ! is_admin() || empty($_GET["s"]) || $query->query_where == 'WHERE 1=1')
            return;

        $this->options = get_option(BETTER_ADMIN_USERS_SEARCH_PREFIX . '_options');
        if ($this->options == false) {
            return;
        }

        $this->search = $query->query_vars['search'];
        $this->search = '%'.trim($this->search, '*').'%';

        preg_match("/{(.*?)}/", $query->query_where, $query_key);
        $query_key = $query_key[0];

        //get default values
        foreach ($this->options as $key => $value) {
            if ($value == 'on') {
                $this->default_values[] = str_replace(BETTER_ADMIN_USERS_SEARCH_PREFIX . '_default_value_', "", $key);
            }
        }

        //get meta values
        $this->meta_values = $this->options['baus_metas'];


        $query_where = 'WHERE 1=1';

        if (count($this->default_values) + count($this->meta_values) > 0 ) {
            $query_where .= ' AND (';
        }

        if (count($this->default_values) > 0) {
            $i = 0;
            foreach ($this->default_values as $default_value) {
                if ($i > 0) {
                    $query_where .= ' OR ';
                }
                $query_where .= $default_value . ' LIKE \'' . $query_key . $this->search . $query_key . '\'';
                $i++;
            }
        }


        if (count($this->meta_values) > 0) {
            global $wpdb;

            $search_metas = "ID IN ( SELECT user_id FROM {$wpdb->usermeta} WHERE ( (";
            $i = 0;
            foreach ($this->meta_values as $meta_value) {
                if ($i > 0) {
                    $search_metas .= ' OR ';
                }
                $search_metas .= "meta_key='$meta_value'";
                $i++;
            }
            $search_metas .= ") AND {$wpdb->usermeta}.meta_value LIKE '%s'))";
            $search_metas = $wpdb->prepare($search_metas, $this->search);

            if (count($this->default_values) > 0) {
                $query_where .= " OR ";
            }
            $query_where .= $search_metas;
        }

        if (count($this->default_values) + count($this->meta_values) > 0 ) {
            $query_where .= ')';
        }

        $query->query_where = $query_where;


    }



}