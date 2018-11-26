<?php

namespace Wcadmin\Classes; 

class Wcadmin_Tabs  {

    public function __construct() {
        if ( current_user_can( 'manage_woocommerce' ) ) {
        
            add_action( 'init', array( $this, 'store_admin_endpoint' ));
            add_filter( 'query_vars', array( $this, 'store_admin_query_vars'), 0 );
            add_filter( 'woocommerce_account_menu_items', array( $this, 'add_store_admin_link' ));
            add_action( 'woocommerce_account_store-admin_endpoint', array( $this, 'store_admin_content' ));
        } else {
            return false; //Store admin menu item will not show if not a shop mananager
        }
    }
 
    //Register new endpoint and save permalinks 
    function store_admin_endpoint() {
        add_rewrite_endpoint( 'store-admin', EP_ROOT | EP_PAGES );
        flush_rewrite_rules();
    }
 
    //Add new query var
    function store_admin_query_vars( $vars ) {
        $vars[] = 'store-admin';
        return $vars;
    }
        
    //Insert the new endpoint into the My Account menu
    function add_store_admin_link( $items ) {
        $items['store-admin'] = 'Store Admin';
        return $items;
    }

    //Add content to the new endpoint
    function store_admin_content() {
    echo '<h2>Welcome, Store Admin!</h2><p>May the force be with you</p>';
    echo do_shortcode( ' /* You can add some shortcode here */ ' );
    }
    



}